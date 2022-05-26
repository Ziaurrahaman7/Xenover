@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Create company</h3>
        <form method="post" action="/company" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <x-form.input name="name"/>
            <x-form.input type="file" name="logo"/>
            <x-form.input name="phone"/>
            <x-form.input name="email"/>
            <x-form.input name="address"/>
            <x-form.input type="file" name="banar"/>
            <x-form.textarea  name="overview"/>
            <x-form.input type="file"  name="overviewImage"/>
        </div>
        <div class="mt-4 mb-0">
           <x-form.button>Submit</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection