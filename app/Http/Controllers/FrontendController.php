<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Category;
use App\File;
use App\User;
use Auth;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Session;
use Newsletter;
use DB;
use Facade\FlareClient\Http\Response;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Response as ImageResponse;
use Symfony\Component\HttpKernel\HttpCache\Store;
use UniSharp\LaravelFilemanager\Lfm;
use PDF;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return redirect()->route($request->user()->role);
    }

    public function home()
    {
        $surveys = Survey::where('status', 'active')->orderBy('id', 'DESC')->limit(8)->get();
        $categories = Category::where('status', 'active')->where('is_parent', 1)->orderBy('title', 'ASC')->get();
        $files = File::all();
        // return $category;
        return view('frontend.index')->with('survey_lists', $surveys)
            ->with('category_lists', $categories)->with('files', $files);
    }

    public function login()
    {
        return view('frontend.pages.login');
    }
    public function loginSubmit(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 'active'])) {
            Session::put('user', $data['email']);
            request()->session()->flash('success', 'Successfully login');
            return redirect()->route('home');
        } else {
            request()->session()->flash('error', 'Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success', 'Logout successfully');
        return back();
    }

    public function register()
    {
        return view('frontend.pages.register');
    }
    public function registerSubmit(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'string|required|min:2',
            'email' => 'string|required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $data = $request->all();
        // dd($data);
        $check = $this->create($data);
        Session::put('user', $data['email']);
        if ($check) {
            request()->session()->flash('success', 'Амжилттай бүртэглээ');
            return redirect()->route('home');
        } else {
            request()->session()->flash('error', 'Дахин оролдоно уу!');
            return back();
        }
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'active'
        ]);
    }
    // Reset password
    public function showResetForm()
    {
        return view('auth.passwords.old-reset');
    }
    public function surveyFilter(Request $request)
    {
        $data = $request->all();
        // return $data;
        $showURL = "";
        if (!empty($data['show'])) {
            $showURL .= '&show=' . $data['show'];
        }

        $sortByURL = '';
        if (!empty($data['sortBy'])) {
            $sortByURL .= '&sortBy=' . $data['sortBy'];
        }

        $catURL = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catURL)) {
                    $catURL .= '&category=' . $category;
                } else {
                    $catURL .= ',' . $category;
                }
            }
        }
        return redirect()->route('survey-lists', $catURL . $showURL . $sortByURL);
    }
    public function surveySearch(Request $request)
    {
        $recent_surveys = Survey::where('status', 'active')->orderBy('id', 'ASC')->limit(3)->get();
        $surveys = Survey::orwhere('title', 'like', '%' . $request->search . '%')
            ->orwhere('slug', 'like', '%' . $request->search . '%')
            ->orwhere('child_cat_id', 'like', '%' . $request->search . '%')
            ->orwhere('review', 'like', '%' . $request->search . '%')
            ->orwhere('sampling', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'ASC')
            ->paginate('9');
        return view('frontend.pages.survey-lists')->with('surveys', $surveys)->with('recent_surveys', $recent_surveys);
    }
    public function surveyLists()
    {
        $surveys = Survey::query();

        if (!empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            //dd($slug);
            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $surveys->whereIn('cat_id', $cat_ids)->paginate;
            // return $products;
        }
        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'title') {
                $surveys = $surveys->where('status', 'active')->orderBy('title', 'ASC');
            }
            if ($_GET['sortBy'] == 'price') {
                $surveys = $surveys->orderBy('price', 'ASC');
            }
        }
        $recent_surveys = Survey::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        // Sort by number
        if (!empty($_GET['show'])) {
            $surveys = $surveys->where('status', 'active')->paginate($_GET['show']);
        } else {
            $surveys = $surveys->where('status', 'active')->paginate(6);
        }
        return view('frontend.pages.survey-lists')->with('surveys', $surveys)->with('recent_surveys', $recent_surveys);
    }
    public function surveyCat(Request $request)
    {
        $surveys = Category::getSurveyByCat($request->slug);
        $recent_surveys = Survey::where('status', 'active')->orderBy('id', 'ASC')->limit(3)->get();
        // return $request->slug;
        return view('frontend.pages.survey-lists')->with('surveys', $surveys->surveys)->with('recent_surveys', $recent_surveys);
    }
    public function surveySubCat(Request $request)
    {
        $surveys = Category::getSurveyBySubCat($request->sub_slug);

        // return $products;
        $recent_surveys = Survey::where('status', 'active')->orderBy('id', 'ASC')->limit(3)->get();
        return view('frontend.pages.survey-lists')->with('surveys', $surveys->sub_survey)->with('recent_surveys', $recent_surveys);
    }
    public function surveyDetail($slug)
    {
        $detail = Survey::getSurveyBySlug($slug);
        $files = File::all();
        //dd($detail);
        return view('frontend.pages.surveydetail')->with('detail', $detail)->with('files', $files);
    }
    public function sampling()
    {
        return View::make('frontend.pages.sampling')->render();
    }
    function createPDF()
    {
        $data = Survey::all();
        // share data to view
        view()->share('survey', $data);
        $pdf = PDF::loadView('pdf_view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function downloadFile($id)
    {
        $path = Survey::find($id);
        return Storage::download($path->dirpath);
    }
}
