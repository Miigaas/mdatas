<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::getAllFile();
        return view('backend.filemanager.index')->with('files', $files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.filemanager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'filenames' => 'required',
            'filenames.*' => 'mimes:doc,pdf,docx,txt,zip'
        ]);

        if ($request->hasfile('filenames')) {

            foreach ($request->file('filenames') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $filename);
                $insert[]['filenames'] = "$filename";
            }
        }

        $check = File::insert($insert);
        if ($check) {
            request()->session()->flash('success', 'Таны файлууд амжилттай нэмэгдэв');
        } else {
            request()->session()->flash('error', 'Алдаа гарлаа, дахин оролдоно уу!');
        }
        return redirect()->route('file.index');
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
        $files = File::findOrFail($id);
        return view('backend.filemanager.edit')->with('files', $files);
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
        $file = File::findOrFail($id);
        $this->validate($request, [
            'filenames' => 'string|required',
        ]);
        $data = $request->all();
        $status = $file->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Файл амжилттай шинэчлэгдлээ');
        } else {
            request()->session()->flash('error', 'Алдаа гарлаа, дахин оролдоно уу!');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = File::findOrFail($id);
        // return $child_cat_id;
        $status = $files->delete();

        if ($status) {
            request()->session()->flash('success', 'Амжилттай устлаа');
        } else {
            request()->session()->flash('error', 'Error while deleting category');
        }
        return redirect()->route('file.index');
    }
}
