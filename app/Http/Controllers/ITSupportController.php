<?php

namespace App\Http\Controllers;

use App\Models\ITSupport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class ITSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postitsupport = ITSupport::orderBy('created_at','desc')->get();
        return view('LandingPageView.LandingPageViewITSupport.landingpageviewitsupport', compact('postitsupport'),["title" => "Tentang Kami"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexadmin()
    {
        $postitsupport = ITSupport::orderBy('created_at','desc')->get();
        return view('AdminPageView.AdminPageViewAboutUs.AdminPageViewAboutUsITSupport.adminpageviewaboutusitsupport', compact('postitsupport'),["title" => "About Us"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPageView.AdminPageViewAboutUs.AdminPageViewAboutUsITSupport.adminpageviewaboutusitsupportcreate', ["title" => "About Us"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = time().$request->file('photoProfile')->getClientOriginalName();
        $path = $request->file('photoProfile')->storeAs('Images/uploads/itsupport',$filename);

        $postitsupport = ITSupport::create([
            "name" => $request["name"],
            "forkat" => $request["forkat"],
            "position" => $request["position"],
            "linkInstagram" => $request["linkInstagram"],
            "linkLinkedin" => $request["linkLinkedin"],
            'photoProfile' => $path,
        ]);

        Alert::success('Success', 'IT Support has been uploaded !');
        return redirect('/admin/about/itsupport');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ITSupport  $iTSupport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postitsupport = ITSupport::find($id);
        return view('AdminPageView.AdminPageViewAboutUs.AdminPageViewAboutUsITSupport.adminpageviewaboutusitsupportedit',  compact('postitsupport'),["title" => "About Us"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ITSupport  $iTSupport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('photoProfile')) {
            $filename = time().$request->file('photoProfile')->getClientOriginalName();
            $path = $request->file('photoProfile')->storeAs('Images/uploads/itsupport',$filename);

            // hapus file
            $gambar = ITSupport::where('id',$id)->first();
            File::delete($gambar->photoProfile);

            // upload file
            $update = ITSupport::where("id", $id)-> update([
                'photoProfile' => $path,
            ]);
        }

        $update = ITSupport::where("id", $id)-> update([
            "name" => $request["name"],
            "forkat" => $request["forkat"],
            "position" => $request["position"],
            "linkInstagram" => $request["linkInstagram"],
            "linkLinkedin" => $request["linkLinkedin"],
        ]);

        toast('IT Support has been edited !', 'success')->autoClose(1500)->width('400px');
        return redirect('/admin/about/itsupport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ITSupport  $iTSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $gambar = ITSupport::where('id',$id)->first();
        File::delete($gambar->photoProfile);

        // hapus data
        ITSupport::where('id',$id)->delete();
        return redirect()->back();
    }
}
