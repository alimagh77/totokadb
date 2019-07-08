<?php

namespace App\Http\Controllers;

use App\meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meeting = meeting::orderby('id', 'desc')->get();
        return View('meeting.index',['meeting'=>$meeting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meeting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        meeting::create([
            'topic' => $request['topic'],
            'keyPoints' => $request['birth'],
            'data' => $request['date'],
            'members' => $request['members'],
            'description' => $request['desc'],

        ]);

        return redirect('meeting.create')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $meeting = meeting::find($id);
        return View('meeting.edit', ['meeting' => $meeting]);
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
        $meeting = meeting::find($id);
        $meeting->update([
            'topic' => $request['topic'],
            'keyPoints' => $request['birth'],
            'data' => $request['date'],
            'members' => $request['members'],
            'description' => $request['desc'],
        ]);
        return redirect('meeting.edit')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        meeting::find($id)->delete();
        return redirect('meeting.index')->with('success', 'مطلب شما با موفقیت حذف شد');

    }
}
