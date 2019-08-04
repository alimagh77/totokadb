<?php

namespace App\Http\Controllers;

use App\article;
use App\file;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = file::orderby('id', 'desc')->get();
        return View('file.index',['file'=>$file]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file=new file();


        $file->desc = $request->desc;
        $file->save();

        if ($request->file('file')!=null) {


            $fileName = 'provFile' . $file->id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('provFile'), $fileName);

            $file->file = $fileName;
            $file->save();
        }

        return redirect('/file')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $file = file::find($id);
        return View('file.edit', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $file = file::find($id);

        if ($request->file('file')!=null) {
            $fileName = 'provFile' . $id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('provFile'), $fileName);
            $file->update([
                'file'=>$fileName
            ]);
        }
        $file->update([
            'desc' => $request['desc'],
        ]);

        return redirect('/file')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        file::find($id)->delete();
        return redirect('/file')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(file::query())
            ->editColumn('edit', 'datatable.editFile')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
