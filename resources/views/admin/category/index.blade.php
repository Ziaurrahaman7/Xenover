@extends('admin.layouts.master')
@section('content')
<x-table link="/category/create" name="Add category" title="category">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<thead>
    <tr>
        <th>Category Name</th>
        <th>Parent Name</th>
    </tr>
</thead>
<tbody>
    @foreach ($categories as  $category)
        <tr>
            <td>{{ucwords($category->title)}}</td>
            <td>{{$category->parent ? $category->parent->title :'Parent' }}</td>
            <td> <a href="/category/{{$category->id}}/edit/" target="_blank" rel="noopener noreferrer">Edit</a> | 
                
                <form action="/category/{{$category->id}}" method="post">
                @csrf
                @method('delete')
                <button> Delete</button>
            </form> 
                </td>
        </tr>
        @endforeach
</tbody>
</x-table>
@endsection