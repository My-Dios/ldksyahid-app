<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postnews = News::orderBy('datepublish','desc')->get();
        return view('LandingPageView.LandingPageViewNews.landingpageviewnews', compact('postnews'), ["title" => "Berita"]);
    }

    public function indexadmin()
    {
        $postnews = News::orderBy('created_at','desc')->get();
        return view('AdminPageView.AdminPageViewNews.adminpageviewnews', compact('postnews'), ["title" => "News"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPageView.AdminPageViewNews.adminpageviewnewscreate', ["title" => "News"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = time().$request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('Images/uploads/news',$filename);


        $postnews = News::create([
            "datepublish" => $request["datepublish"],
            "publisher" => $request["publisher"],
            "title" => $request["title"],
            "reporter" => $request["reporter"],
            "editor" => $request["editor"],
            'picture' => $path,
            "descpicture" => $request["descpicture"],
            "body" => $request["body"],
        ]);

        Alert::success('Success', 'News has been uploaded !');
        return redirect('/admin/news');
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
        $postnews = News::find($id);
        return view('LandingPageView.LandingPageViewNews.landingpageviewnewsshow', compact('postnews'), ["title" => "Berita"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postnews = News::find($id);
        return view('AdminPageView.AdminPageViewNews.adminpageviewnewsedit', compact('postnews'), ["title" => "News"]);
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

        if ($request->file('picture')) {
            $filename = time().$request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('Images/uploads/news',$filename);

            // hapus file
            $gambar = News::where('id',$id)->first();
            File::delete($gambar->picture);

            // upload file
            $update = News::where("id", $id)-> update([
                'picture' => $path,
            ]);
        }

        $updatenews = News::where("id", $id)-> update([
            "datepublish" => $request["datepublish"],
            "publisher" => $request["publisher"],
            "title" => $request["title"],
            "reporter" => $request["reporter"],
            "editor" => $request["editor"],
            "descpicture" => $request["descpicture"],
            "body" => $request["body"],
        ]);

        toast('News has been edited !', 'success')->autoClose(1500)->width('400px');
        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $gambar = News::where('id',$id)->first();
        File::delete($gambar->picture);

        // hapus data
        News::where('id',$id)->delete();
        return redirect()->back();
    }
}
