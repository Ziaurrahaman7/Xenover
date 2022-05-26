@extends('admin.layouts.master')
@section('content')
<x-table link="/company/create" name="Add company" title="company">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<thead>
    <tr>
        <th>company Name</th>
        <th>Phone</th>
        <th>email</th>
        <th>address</th>
        <th>logo</th>
        <th>Overview</th>
    </tr>
</thead>
<tbody>
    @foreach ($companies as  $company)
        <tr>
            <td>{{ucwords($company->name)}}</td>
            <td>{{$company->phone }}</td>
            <td>{{$company->email }}</td>
            <td>{{$company->address }}</td>
            <td>{{$company->logo }}</td>
            <td>{{$company->overview }}</td>
            <td> <a href="/company/{{$company->id}}/edit/" target="_blank" rel="noopener noreferrer">Edit</a> | 
                
                <form action="/company/{{$company->id}}" method="post">
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