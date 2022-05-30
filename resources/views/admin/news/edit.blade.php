@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Edit company</h3>
        <form method="post" action="/company/{{$company->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row mb-3">
            <x-form.input name="name" :value="old('name',$company->name)"/>
            <x-form.input name="logo" type="file" :value="old('logo',$company->logo)"/>
            <img style="width:80px; height:80px" src="{{asset($company->logo)}}">

            <x-form.input name="phone" :value="old('phone',$company->phone)"/>
            <x-form.input name="email" :value="old('email',$company->email)"/>
            <x-form.input name="address" :value="old('email',$company->address)"/>
            <x-form.input name="banar" type="file" :value="old('banar',$company->banar)"/>
             <img style="width:80px; height:80px" src="{{asset($company->banar)}}">
             <x-form.textarea  name="overview">{{old('overview',$company->overview)}}</x-form.textarea>
             <x-form.input name="overviewImage" type="file" :value="old('overviewImage',$company->overviewImage)"/>
                <img style="width:80px; height:80px" src="{{asset($company->overviewImage)}}">
        <div class="mt-4 mb-0">
           <x-form.button>Update</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection