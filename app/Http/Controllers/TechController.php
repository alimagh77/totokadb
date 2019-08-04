<?php

namespace App\Http\Controllers;

use App\article;
use App\industry;
use App\tech;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tech = tech::orderby('id', 'desc')->get();
        return View('tech.index',['tech'=>$tech]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tech.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tech=new tech();


        $tech->name = $request->name;

        $tech->save();


        return redirect('/tech')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tech = tech::find($id);
        return View('tech.edit', ['tech' => $tech]);
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
        $tech = tech::find($id);

        $tech->update([
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
        tech::find($id)->delete();
        return redirect('/tech')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(tech::query())
            ->editColumn('edit', 'datatable.editTech')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
