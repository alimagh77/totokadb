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
        $product=new product();


        $product->category = $request->category;
        $product->categoryDetails = $request->categoryDetails;
        $product->manufacturers = $request->manufacturers;
        $product->details = $request->details;
        $product->color = $request->color;
        $product->quality = $request->quality;
        $product->value = $request->value;
        $product->use = $request->use;
        $product->pack = $request->pack;
        $product->valueEco = $request->valueEco;
        $product->ability = $request->ability;
        $product->capacity = $request->capacity;
        $product->supplies = $request->supplies;
        $product->description = $request->desc;
        $product->save();
        if ($request->file('image')!=null) {
            $imageName = 'productImage' . $product->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('imageProduct'), $imageName);

            $product->image = $imageName;

            $product->save();
        }
        return view('product.index')->with('success', 'مطلب شما با موفقیت ثبت شد');
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
        $imageName='';
        if ($request->file('image')!=null) {
            $imageName = 'productImage' . $id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('productMeeting'), $imageName);
        }
        $product->update([
            'category' => $request['category'],
            'value' => $request['value'],
            'image' => $imageName,
            'quality' => $request['quality'],
            'use' => $request['use'],
            'pack' => $request['pack'],
            'valueEco' => $request['valueEco'],
            'ability' => $request['ability'],
            'capacity' => $request['capacity'],
            'supplies' => $request['supplies'],
            'categoryDetails' => $request['categoryDetails'],
            'manufacturers' => $request['manufacturers'],
            'details' => $request['details'],
            'color' => $request['color'],
            'description' => $request['desc'],
        ]);
        return redirect('/product')->with('success', 'مطلب شما با موفقیت ویرایش شد');
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
        return redirect('/product')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(product::query())
            ->editColumn('edit', 'datatable.editProduct')
            ->rawColumns(['edit', 'edit'])

            ->make(true);

    }
}
