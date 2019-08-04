<?php

namespace App\Http\Controllers;


use App\req;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $req = req::orderby('id', 'desc')->get();
        return View('req.index',['req'=>$req]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('req.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $req=new req();

        $req->year = $request->year;
        $req->month = $request->month;
        $req->day = $request->day;
        $req->price = $request->price;
        $req->desc = $request->desc;
        $req->save();

        if ($request->file('file')!=null) {


            $fileName = 'reqFile' . $req->id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageReq'), $fileName);

            $req->file = $fileName;
            $req->save();
        }

        return redirect('/req')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $req = req::find($id);
        return View('req.edit', ['req' => $req]);
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
        $req = req::find($id);

        if ($request->file('req')!=null) {
            $fileName = 'reqFile' . $id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageReq'), $fileName);
            $req->update([
                'req'=>$fileName
            ]);
        }
        $req->update([
            'year' => $request['year'],
            'month' => $request['month'],
            'day' => $request['day'],
            'price' => $request['price'],
            'desc' => $request['desc'],
        ]);

        return redirect('/req')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        req::find($id)->delete();
        return redirect('/req')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(req::query())
            ->editColumn('edit', 'datatable.editReq')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
