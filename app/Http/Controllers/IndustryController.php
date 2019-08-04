<?php

namespace App\Http\Controllers;

use App\article;
use App\industry;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industry = industry::orderby('id', 'desc')->get();
        return View('industry.index',['industry'=>$industry]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('industry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $industry=new industry();


        $industry->name = $request->name;

        $industry->save();


        return redirect('/industry')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $industry = industry::find($id);
        return View('industry.edit', ['industry' => $industry]);
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
        $industry = industry::find($id);

        $industry->update([
            'name' => $request['name'],
        ]);

        return redirect('/industry')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        industry::find($id)->delete();
        return redirect('/industry')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(industry::query())
            ->editColumn('edit', 'datatable.editIndustry')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
