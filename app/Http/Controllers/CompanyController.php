<?php

namespace App\Http\Controllers;

use App\company;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = company::orderby('id', 'desc')->get();
        return View('company.index',['company'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        company::create([
            'name'=>$request['name'],
            'date'=>$request['support'],
            'partner'=>$request['partner'],
            'founder'=>$request['founder'],
            'service'=>$request['service'],
            'support'=>$request['support'],
            'realm'=>$request['realm'],
            'phone'=>$request['phone'],
            'mobile'=>$request['mobile'],
            'website'=>$request['web'],
            'description'=>$request['desc'],

        ]);

        return redirect('/company')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company $company
     * @return void
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $company = company::find($id);
        return View('company.edit', ['company' => $company]);
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
        $company=company::find($id);
        $company->update([
            'name'=>$request['name'],
            'date'=>$request['support'],
            'partner'=>$request['partner'],
            'founder'=>$request['founder'],
            'service'=>$request['service'],
            'support'=>$request['support'],
            'realm'=>$request['realm'],
            'phone'=>$request['phone'],
            'mobile'=>$request['mobile'],
            'website'=>$request['web'],
            'description'=>$request['desc'],
        ]);
        return redirect('/company')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        company::find($id)->delete();
        return redirect('/company')->with('success', 'مطلب شما با موفقیت حذف شد');

    }


    public function getData()

    {

        return Datatables::of(company::query())
            ->editColumn('edit', 'datatable.editCompany')
            ->rawColumns(['edit', 'edit'])
            ->make(true);

    }
}
