@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Edit category</h3>
        <form method="post" action="/category/{{$category->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row mb-3">
            <x-form.input name="title" :value="old('title',$category->title)"/>
            <div class="col-md-6  mt-3">
                <div class="form-group">
                 <label for="role">Select Parent Category</label>
                 <select name="parent_id" class="form-select">
                    <option value="">No Parent</option>
               @foreach ($parentCat as $parent)
                   <option value="{{$parent->id}}" {{old($parent->id, $parent->id)==$category->parent_id ? 'selected':''}}>{{$parent->title}}</option>
               @endforeach
                </select>
                </div>
            </div>
        <div class="mt-4 mb-0">
           <x-form.button>Update</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection