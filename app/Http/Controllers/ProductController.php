<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
       return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $companies = Company::all();
       return view('admin.product.create',compact('cats','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        // dd($request->all());

      $product =request()->validate([
            'name'=> 'required',
            'category_id'=>'required',
            'company_id'=>'required',
            'image'=>'required',
            'price'=>'required',
            'sku'=>'required',
            'quantity'=>'string|nullable',
            'details'=>'string|nullable',
        ]);

        // $request['image']=  $request->file('image')->store('uploads');
        $product['image']=  request()->file('image')->store('uploads');
        Product::create($product);
        return redirect('product')->with('success', 'Succesfully Added');
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
    public function edit(Product $product)
    {
        $cats = Category::all();
        $companies = Company::all();
        return view('admin.product.edit', compact('cats','product','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        $data =request()->validate([
            'name'=> 'required',
            'category_id'=>'required',
            'company_id'=>'required',
            'image'=>'required',
            'price'=>'required',
            'sku'=>'required',
            'quantity'=>'string|nullable',
            'details'=>'string|nullable',
        ]);

        // $request['image']=  $request->file('image')->store('uploads');
       if(isset($data['image'])){
        $data['image']=  request()->file('image')->store('uploads');
       }
        $product->update($data);
        return redirect('product')->with('success', 'Succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      return redirect('product')->with('success', 'Succesfully deleted');
    }
}
