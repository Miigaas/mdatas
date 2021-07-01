<?php

namespace App\Http\Controllers;

use App\Category;
use App\File;
use App\Survey;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::getAllSurvey();
        return view('backend.survey.index')->with('surveys', $surveys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('is_parent', 1)->get();
        $file = File::where('id')->get();
        // return $category;
        return view('backend.survey.create')->with('categories', $category)->with('file', $file);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'idno' => 'string|required',
            'authoring_entity' => 'string|nullable',
            'nation' => 'string|nullable',
            'year_start' => 'string|nullable',
            'nation' => 'string|nullable',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:active,inactive',

        ]);

        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = Survey::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        $status = Survey::create($data);
        if ($status) {
            request()->session()->flash('success', 'Амжилттай нэмэгдлээ');
        } else {
            request()->session()->flash('error', 'Дахин оролдоно уу!!');
        }
        return redirect()->route('survey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $survey = Survey::findOrFail($id);
        $category = Category::where('is_parent', 1)->get();
        $items = Survey::where('id', $id)->get();
        // return $items;
        return view('backend.survey.edit')->with('survey', $survey)->with('categories', $category)->with('items', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $survey = Survey::findOrFail($id);
        $this->validate($request, [
            'title' => 'string|required',
            'year_start' => 'string|nullable',
            'idno' => 'string|nullable',
            'nation' => 'string|nullable',
            'authoring_entity' => 'string|nullable',
            'dirpath' => 'string|nullable',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:active,inactive',

        ]);
        $data = $request->all();
        $data['is_featured'] = $request->input('is_featured', 0);
        $size = $request->input('size');
        if ($size) {
            $data['size'] = implode(',', $size);
        } else {
            $data['size'] = '';
        }
        // return $data;
        $status = $survey->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Амжилттай засагдлаа');
        } else {
            request()->session()->flash('error', 'Дахин оролдоно уу!!');
        }
        return redirect()->route('survey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
