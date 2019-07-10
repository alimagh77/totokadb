<?php

namespace App\Http\Controllers;

use App\manufacturer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturer = manufacturer::orderby('id', 'desc')->get();
        return View('manufacturer.index',['manufacturer'=>$manufacturer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        manufacturer::create([
            'brand' => $request['brand'],
            'name' => $request['name'],
            'realm' => $request['realm'],
            'products' => $request['products'],
            'mobile' => $request['mobile'],
            'phone' => $request['phone'],
            'size' => $request['size'],
            'description' => $request['desc'],

        ]);

        return redirect('manufacturer.create')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $manufacturer = manufacturer::find($id);
        return View('manufacturer.edit', ['manufacturer' => $manufacturer]);
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
        $manufacturer = manufacturer::find($id);
        $manufacturer->update([
            'brand' => $request['brand'],
            'name' => $request['name'],
            'realm' => $request['realm'],
            'products' => $request['products'],
            'mobile' => $request['mobile'],
            'phone' => $request['phone'],
            'size' => $request['size'],
            'description' => $request['desc'],
        ]);
        return redirect('manufacturer.edit')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        manufacturer::find($id)->delete();
        return redirect('manufacturer.index')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(manufacturer::query())->make(true);

    }
}
