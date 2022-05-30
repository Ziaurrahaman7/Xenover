@extends('admin.layouts.master')
@section('content')
<x-table link="/news/create" name="Add news" title="news">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<thead>
    <tr>
        <th>Title</th>
        <th>Banner</th>
        <th>Details</th>
        <th>Status</th>
        <th>logo</th>
        <th>Overview</th>
    </tr>
</thead>
<tbody>
    @foreach ($companies as  $news)
        <tr>
            <td>{{ucwords($news->name)}}</td>
            <td>{{$news->phone }}</td>
            <td>{{$news->email }}</td>
            <td>{{$news->address }}</td>
            <td>{{$news->logo }}</td>
            <td>{{$news->overview }}</td>
            <td> <a href="/news/{{$news->id}}/edit/" target="_blank" rel="noopener noreferrer">Edit</a> | 
                
                <form action="/news/{{$news->id}}" method="post">
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