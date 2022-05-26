<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $companies = Company::all();
       return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'logo'=>'nullable',
            'banar'=>'nullable',
            'overview'=>'string|nullable',
            'overviewImage'=>'nullable',
            'phone'=>'required|max:11|min:11',
            'email'=>'required|email',
            'address'=>'required'
        ]);
        // $request['logo'] = $request->file('logo')->store('uploads');
        // $request['banar'] = $request->file('banar')->store('uploads');
        // $request['overviewImage'] = $request->file('overviewImage')->store('uploads');
        // Company::create($request);
        // return redirect('company')->with('success', 'successfully added');
        $logo = $request->file('logo')->store('uploads');
        $banar = $request->file('banar')->store('uploads');
        $overviewImage = $request->file('overviewImage')->store('uploads');

        $data = [
        'name' => $request->name,
        'logo' => $logo,
        'banar' => $banar,
        'overviewImage' => $overviewImage,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'address'=>$request->address,
        'overview'=>$request->overview,
        ];
        Company::create($data);
        return redirect('company')->with('success', 'successfully added');
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
    public function edit(Company $company)
    {
      return view('admin.company.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name'=>'required',
            'logo'=>'nullable',
            'banar'=>'nullable',
            'overview'=>'string|nullable',
            'overviewImage'=>'nullable',
            'phone'=>'required|max:11|min:11',
            'email'=>'required|email',
            'address'=>'required'
        ]);
        if(isset($request->logo)){
            $logo = $request->file('logo')->store('uploads');
            }
        if(isset($request->banar)){
            $banar = $request->file('banar')->store('uploads');
            }
        if(isset($request->overviewImage)){
            $overviewImage = $request->file('overviewImage')->store('uploads');
            }
        $data = [
        'name' => $request->name,
        'logo' => $logo,
        'banar' => $banar,
        'overviewImage' => $overviewImage,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'address'=>$request->address,
        'overview'=>$request->overview,
        ];
        $company->update($data);
        return redirect('company')->with('success', 'successfully edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
