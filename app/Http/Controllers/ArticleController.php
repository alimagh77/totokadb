<?php

namespace App\Http\Controllers;

use App\article;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = article::orderby('id', 'desc')->get();
        return View('article.index',['article'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $article=new article();


        $article->title = $request->title;
        $article->keys = $request->keys;
        $article->explain = $request->explain;
        $article->description = $request->desc;
        $article->save();

        if ($request->file('file')!=null) {


            $fileName = 'articleFile' . $article->id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageArticle'), $fileName);

            $article->file = $fileName;
            $article->save();
        }

        return redirect('/article')->with('success', 'مطلب شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = article::find($id);
        return View('article.edit', ['article' => $article]);
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
        $article = article::find($id);

        if ($request->file('file')!=null) {
            $fileName = 'articleFile' . $id . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('imageArticle'), $fileName);
            $article->update([
               'file'=>$fileName
            ]);
        }
        $article->update([
            'title' => $request['title'],
            'keys' => $request['keys'],
            'explain' => $request['explain'],
            'description' => $request['desc'],
        ]);

        return redirect('/article')->with('success', 'مطلب شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        article::find($id)->delete();
        return redirect('/article')->with('success', 'مطلب شما با موفقیت حذف شد');

    }

    public function getData()

    {

        return Datatables::of(article::query())
            ->editColumn('edit', 'datatable.editArticle')
            ->rawColumns(['edit', 'edit'])

            ->make(true);
    }
}
