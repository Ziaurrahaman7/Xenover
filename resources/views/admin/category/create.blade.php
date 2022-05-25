@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Create category</h3>
        <form method="post" action="/category" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <x-form.input name="title"/>
            <div  class="col-md-6  mt-3">
                <label for="role">Parent Category</label>
                <div class="form-group">
                 <select name="parent_id" class="form-select">
                    <option value="">No Parent</option>
                    @foreach ($parentCat as $parent)
                    <option value="{{$parent->id}}">
                       {{$parent->title}}
                    </option>
                    @endforeach
                 </select>
                </div>
            </div>
        </div>
        <div class="mt-4 mb-0">
           <x-form.button>Submit</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection