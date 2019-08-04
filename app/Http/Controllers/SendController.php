<?php

namespace App\Http\Controllers;


use App\send;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $send = send::orderby('id', 'desc')->get();
        return View('send.index',['send'=>$send]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('send.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $send=new send();

        $send->year = $request->year;
        $send->month = $request->month;
        $send->day = $request->day;
        $send->price = $request->price;
        $send->desc = $request->desc;
        $send->save();


        if ($request->file('file')!=null) {


            $fileName = 'sendFile' . $send->id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageSend'), $fileName);

            $send->file = $fileName;
            $send->save();
        }

        return redirect('/send')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $send = send::find($id);
        return View('send.edit', ['send' => $send]);
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
        $send = send::find($id);

        if ($request->file('send')!=null) {
            $fileName = 'sendFile' . $id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageSend'), $fileName);
            $send->update([
                'send'=>$fileName
            ]);
        }
        $send->update([
            'year' => $request['year'],
            'month' => $request['month'],
            'day' => $request['day'],
            'price' => $request['price'],
            'desc' => $request['desc'],
        ]);

        return redirect('/send')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        send::find($id)->delete();
        return redirect('/send')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(send::query())
            ->editColumn('edit', 'datatable.editSend')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
