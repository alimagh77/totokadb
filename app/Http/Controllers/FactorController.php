<?php

namespace App\Http\Controllers;


use App\factor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factor = factor::orderby('id', 'desc')->get();
        return View('factor.index',['factor'=>$factor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('factor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $factor=new factor();


        $factor->year = $request->year;
        $factor->month = $request->month;
        $factor->day = $request->day;
        $factor->side = $request->side;
        $factor->without = $request->without;
        $factor->amount = $request->amount;
        $factor->desc = $request->desc;
        $factor->save();

        if ($request->file('file')!=null) {


            $fileName = 'factorFile' . $factor->id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageFactor'), $fileName);

            $factor->file = $fileName;
            $factor->save();
        }

        return redirect('/factor')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $factor = factor::find($id);
        return View('factor.edit', ['factor' => $factor]);
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
        $factor = factor::find($id);

        if ($request->file('factor')!=null) {
            $fileName = 'factorFile' . $id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageFactor'), $fileName);
            $factor->update([
                'factor'=>$fileName
            ]);
        }
        $factor->update([
            'year' => $request['year'],
            'month' => $request['month'],
            'day' => $request['day'],
            'side' => $request['side'],
            'without' => $request['without'],
            'amount' => $request['amount'],
            'desc' => $request['desc'],
        ]);

        return redirect('/factor')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        factor::find($id)->delete();
        return redirect('/factor')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(factor::query())
            ->editColumn('edit', 'datatable.editFactor')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
