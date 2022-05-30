@extends('admin.layouts.master')
@section('content')
<x-table link="/sitesetting/create" name="Update sitesetting" title="Site setting">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<thead>
    <tr>
        <th>Logo</th>
        <th>Favicon</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Facebook</th>
        <th>Youtube</th>
        <th>Linkdin</th>
        <th>Whatsapp</th>
        <th>Map</th>
        <th>Copyright</th>
    </tr>
</thead>
<tbody>
    @foreach ($sitesettings as  $sitesetting)
        <tr>
            <td> <img width="50px" src="{{asset($sitesetting->logo)}}" alt=""></td>
            <td><img  width="50px"  src="{{asset($sitesetting->favicon)}}" alt=""></td>
            <td>{{$sitesetting->phone }}</td>
            <td>{{$sitesetting->email }}</td>
            <td>{{$sitesetting->address }}</td>
            <td>{{$sitesetting->facebook }}</td>
            <td>{{$sitesetting->youtube }}</td>
            <td>{{$sitesetting->linkdin }}</td>
            <td>{{$sitesetting->whatsapp }}</td>
            <td>{{$sitesetting->map }}</td>
            <td>{{$sitesetting->copyright }}</td>
            {{-- <td> <a href="/sitesetting/{{$sitesetting->id}}/edit/" target="_blank" rel="noopener noreferrer">Edit</a> | 
                
                <form action="/sitesetting/{{$sitesetting->id}}" method="post">
                @csrf
                @method('delete')
                <button> Delete</button>
            </form> 
                </td> --}}
        </tr>
        @endforeach
</tbody>
</x-table>
@endsection