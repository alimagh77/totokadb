<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::orderby('id', 'desc')->get();
        return View('product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        product::create([
            'category' => $request['category'],
            'categoryDetails' => $request['categoryDetails'],
            'manufacturers' => $request['manufacturer'],
            'details' => $request['details'],
            'color' => $request['color'],
            'description' => $request['desc'],

        ]);

        return redirect('product.index')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = product::find($id);
        return View('product.edit', ['product' => $product]);
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
        $product = product::find($id);
        $product->update([
            'category' => $request['category'],
            'categoryDetails' => $request['categoryDetails'],
            'manufacturers' => $request['manufacturer'],
            'details' => $request['details'],
            'color' => $request['color'],
            'description' => $request['desc'],
        ]);
        return redirect('product.edit')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::find($id)->delete();
        return redirect('product.index')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(product::query())->make(true);

    }
}
