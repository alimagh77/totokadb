<?php

namespace App\Http\Controllers;

use App\meeting;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


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

        $meeting=new meeting();


        $meeting->topic = $request->topic;
        $meeting->keyPoints = $request->key;
        $meeting->date = $request->date;
        $meeting->members = $request->members;
        $meeting->description = $request->desc;
        $meeting->save();

        $imageName='meetingImage'.$meeting->id.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('imageMeeting'),$imageName);

        $fileName='meetingFile'.$meeting->id.'.'.$request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(public_path('imageMeeting'),$fileName);

        $meeting->image=$imageName;
        $meeting->file=$fileName;
        $meeting->save();


        return redirect('/meeting')->with('success', 'مطلب شما با موفقیت ثبت شد');
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

        $imageName='meetingImage'.$id.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('imageMeeting'),$imageName);

        $fileName='meetingFile'.$id.'.'.$request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(public_path('imageMeeting'),$fileName);

        $meeting->update([
            'topic' => $request['topic'],
            'keyPoints' => $request['key'],
            'data' => $request['date'],
            'members' => $request['members'],
            'description' => $request['desc'],
            'image' => $imageName,
            'file' => $fileName
        ]);
        return redirect('/meeting')->with('success', 'مطلب شما با موفقیت ویرایش شد');
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
        return redirect('/meeting')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(meeting::query())
            ->editColumn('edit', 'datatable.editMeeting')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
