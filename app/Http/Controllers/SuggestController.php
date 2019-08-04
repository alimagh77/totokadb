<?php

namespace App\Http\Controllers;


use App\suggest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SuggestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggest = suggest::orderby('id', 'desc')->get();
        return View('suggest.index',['suggest'=>$suggest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suggest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $suggest=new suggest();


        $suggest->year = $request->year;
        $suggest->month = $request->month;
        $suggest->day = $request->day;
        $suggest->single = $request->single;
        $suggest->set = $request->set;
        $suggest->box = $request->box;
        $suggest->desc = $request->desc;
        $suggest->save();

        if ($request->file('file')!=null) {


            $fileName = 'suggestFile' . $suggest->id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageSuggest'), $fileName);

            $suggest->file = $fileName;
            $suggest->save();
        }

        return redirect('/suggest')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $suggest = suggest::find($id);
        return View('suggest.edit', ['suggest' => $suggest]);
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
        $suggest = suggest::find($id);

        if ($request->file('suggest')!=null) {
            $fileName = 'suggestFile' . $id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageSuggest'), $fileName);
            $suggest->update([
                'suggest'=>$fileName
            ]);
        }
        $suggest->update([
            'year' => $request['year'],
            'month' => $request['month'],
            'day' => $request['day'],
            'single' => $request['single'],
            'set' => $request['set'],
            'box' => $request['box'],
            'desc' => $request['desc'],
        ]);

        return redirect('/suggest')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        suggest::find($id)->delete();
        return redirect('/suggest')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(suggest::query())
            ->editColumn('edit', 'datatable.editSuggest')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
