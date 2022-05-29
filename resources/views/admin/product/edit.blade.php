@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Edit product</h3>
        <form method="post" action="/product/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row mb-3">
            <x-form.input name="name" :value="old('name',$product->name)"/>
                <x-form.input name="image" type="file" :value="old('image',$product->image)"/>
                    <img style="width:80px; height:80px" src="{{asset($product->image)}}">
            <div class="col-md-6  mt-3">
                <div class="form-group">
                    <label for="role">Select Category</label>
                    <select name="category_id" class="form-select">
                    <option value="">Select</option>
                @foreach ($cats as $cat)
                    <option value="{{$cat->id}}" {{old($cat->id, $cat->id)==$product->category_id ? 'selected':''}}>{{$cat->title}}</option>
                @endforeach
                </select>
                @error('category_id')
                <p style="color:red">{{$message}}</p>  
                @enderror
                </div>
            </div>  
            <div class="col-md-6  mt-3">
                <div class="form-group">
                    <label for="role">Under Company</label>
                    <select name="company_id" class="form-select">
                    <option value="">Select</option>
                @foreach ($companies as $company)
                    <option value="{{$company->id}}" {{old($company->id, $company->id)==$product->company_id ? 'selected':''}}>{{$company->name}}</option>
                @endforeach
                </select>
                @error('company_id')
                <p style="color:red">{{$message}}</p>  
                @enderror
                </div>
            </div> 
            <x-form.input name="price" :value="old('price',$product->price)"/>
            <x-form.input name="sku" :value="old('sku',$product->sku)"/>
            <x-form.input name="quantity" :value="old('quantity',$product->quantity)"/>
            <x-form.textarea  name="details">{{old('details',$product->details)}}</x-form.textarea>
        <div class="mt-4 mb-0">
            <x-form.button>Update</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection