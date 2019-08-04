<?php

namespace App\Http\Controllers;

use App\article;
use App\file;
use App\price;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = price::orderby('id', 'desc')->get();
        return View('price.index',['price'=>$price]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $price=new price();

        $price->year = $request->year;
        $price->month = $request->month;
        $price->day = $request->day;
        $price->price = $request->price;
        $price->desc = $request->desc;
        $price->save();

        if ($request->file('file')!=null) {


            $fileName = 'priceFile' . $price->id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imagePrice'), $fileName);

            $price->file = $fileName;
            $price->save();
        }

        return redirect('/price')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $price = price::find($id);
        return View('price.edit', ['price' => $price]);
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
        $price = price::find($id);

        if ($request->file('file')!=null) {
            $fileName = 'priceFile' . $id . '.' . $request->file('price')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imagePrice'), $fileName);
            $price->update([
                'price'=>$fileName
            ]);
        }
        $price->update([
            'year' => $request['year'],
            'month' => $request['month'],
            'day' => $request['day'],
            'price' => $request['price'],
            'desc' => $request['desc'],
        ]);

        return redirect('/price')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        price::find($id)->delete();
        return redirect('/price')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(price::query())
            ->editColumn('edit', 'datatable.editPrice')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
