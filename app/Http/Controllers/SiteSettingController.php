<?php

namespace App\Http\Controllers;

use App\Models\Sitesetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sitesettings = Sitesetting::all();
       return view('admin.sitesetting.index', compact('sitesettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sitesetting = Sitesetting::first();
        if(isset($sitesetting)){
            return view('admin.sitesetting.update', compact('sitesetting'));
        }
        return view('admin.sitesetting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sitesetting $sitesetting)
    {
        $sitesetting = request()->validate([
            'logo'=>'image|nullable',
            'favicon'=>'image|nullable',
            'phone'=>'required|min:11|max:11',
            'email'=>'required|email',
            'address'=>'required',
            'facebook'=>'required',
            'youtube'=>'string|nullable',
            'linkdin'=>'string|nullable',
            'whatsapp'=>'string|nullable',
            'map'=>'string|nullable',
            'copyright'=>'string|nullable',
        ]);
    //   dd($sitesetting);
        $id = Sitesetting::pluck('id')->first();
        if(isset($sitesetting['logo'])){
            $sitesetting['logo']=  request()->file('logo')->store('uploads');
           }
        if(isset($sitesetting['favicon'])){
        $sitesetting['favicon']=  request()->file('favicon')->store('uploads');
        }
        // $sitesetting['logo']= request()->file('logo')->store('uploads');
        // $sitesetting['favicon']= request()->file('favicon')->store('uploads');
        Sitesetting::updateOrCreate(['id'=>$id], $sitesetting);
        return redirect('sitesetting')->with('success', 'Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('sitesetting');
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
        return redirect('sitesetting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('sitesetting');
    }
}
