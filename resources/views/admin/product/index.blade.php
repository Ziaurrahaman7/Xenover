@extends('admin.layouts.master')
@section('content')
<x-table link="/product/create" name="Add product" title="product">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<thead>
    <tr>
        <th>Product Name</th>
        <th>Product Category</th>
        <th>Under Company</th>
        <th>Image</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($products as  $product)
        <tr>
            <td>{{ucwords($product->name)}}</td>
            <td>{{$product->category_id }}</td>
            <td>{{$product->company_id }}</td>
            <td>{{$product->image }}</td>
            <td>{{$product->price }}</td>
            <td> <a href="/product/{{$product->id}}/edit/" target="_blank" rel="noopener noreferrer">Edit</a> | 
                
                <form action="/product/{{$product->id}}" method="post">
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