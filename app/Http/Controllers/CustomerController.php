<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer::orderby('id', 'desc')->get();
        return View('customer.index',['customer'=>$customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        customer::create([
            'name' => $request['name'],
            'use' => $request['use'],
            'address' => $request['address'],
            'pos' => $request['pos'],
            'phone' => $request['phone'],
            'job' => $request['job'],
            'description' => $request['desc'],

        ]);

        return redirect('/customer')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customer = customer::find($id);
        return View('customer.edit', ['customer' => $customer]);
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
        $customer=customer::find($id);
        $customer->update([
            'name' => $request['name'],
            'pos' => $request['pos'],
            'address' => $request['address'],
            'use' => $request['use'],
            'phone' => $request['phone'],
            'job' => $request['job'],
            'description' => $request['desc'],
        ]);
        return redirect('/customer')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customer::find($id)->delete();
        return redirect('/customer')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(customer::query())
            ->editColumn('edit', 'datatable.editCustomer')
            ->rawColumns(['edit', 'edit'])
            ->make(true);

    }
}
