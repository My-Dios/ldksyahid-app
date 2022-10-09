<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postarticle = Article::orderBy('dateevent','desc')->get();
        return view('LandingPageView.LandingPageViewArticle.landingpageviewarticle', compact('postarticle'),["title" => "Artikel"]);
    }

    public function indexadmin()
    {
        $postarticle = Article::orderBy('created_at','desc')->get();
        return view('AdminPageView.AdminPageViewArticle.adminpageviewarticle', compact('postarticle'), ["title" => "Article"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPageView.AdminPageViewArticle.adminpageviewarticlecreate', ["title" => "Article"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->poster;
        $new_gambar = time() . ' . ' . $gambar->getClientOriginalName();

        $postarticle = Article::create([
            "title" => $request["title"],
            "theme" => $request["theme"],
            "dateevent" => $request["datearticle"],
            "writer" => $request["writer"],
            "editor" => $request["editor"],
            'poster' => $new_gambar,
            "embedpdf" => $request["embedpdf"],
        ]);

        $gambar->move('Images/uploads/articlesposter/',$new_gambar);
        Alert::success('Success', 'Article has been uploaded !');
        return redirect('/admin/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dt = Carbon::now();
        $postarticle = Article::find($id);
        return view('LandingPageView.LandingPageViewArticle.landingpageviewarticleshow',  compact('postarticle'),["title" => "Artikel"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postarticle = Article::find($id);
        return view('AdminPageView.AdminPageViewArticle.adminpageviewarticleedit', compact('postarticle'), ["title" => "Article"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gambar = $request->poster;
        $new_gambar = time() . ' . ' . $gambar->getClientOriginalName();

        $update = Article::where("id", $id)-> update([
            "title" => $request["title"],
            "theme" => $request["theme"],
            "dateevent" => $request["datearticle"],
            "writer" => $request["writer"],
            "editor" => $request["editor"],
            'poster' => $new_gambar,
            "embedpdf" => $request["embedpdf"],
        ]);

        toast('Article has been edited !', 'success')->autoClose(1500)->width('400px');
        $gambar->move('Images/uploads/articlesposter/',$new_gambar);
        return redirect('/admin/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Article::findOrFail($id);
        $data->delete();
    }
}
