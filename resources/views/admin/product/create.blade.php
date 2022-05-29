@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Create product</h3>
        <form method="post" action="/product" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <x-form.input name="name"/>
            <x-form.input type="file" name="image"/>
            <div class="col-md-6 mt-3">
                <label>Select Category</label>
            <select class="form-select" name="category_id">
                <option value="">Select</option>
           @foreach ($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->title}}</option>
           @endforeach
        </select>
        @error('category_id')
        <p style="color:red">{{$message}}</p>  
        @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label>Under  Company</label>
                <select class="form-select" name="company_id">
                <option value="">Select</option>
                @foreach ($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
        </select>
        @error('company_id')
        <p style="color:red">{{$message}}</p>  
        @enderror
        </div>
            <x-form.input name="price"/>
            <x-form.input name="sku"/>
            <x-form.input name="quantity"/>
            <x-form.textarea  name="details"/>
        </div>
        <div class="mt-4 mb-0">
           <x-form.button>Submit</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection