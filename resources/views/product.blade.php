@extends('layouts.master')
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key=>$product)
                        <tr>
                            <th scope="row"> {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</th>
                            <td>{{ $product->name }}</td>
                            <td>₹ {{ number_format($product->price ,2)}}</td>
                            <td>{{ $product->rating }}</td>
                            <td>{{ strlen($product->description) > 300 ? substr($product->description, 0, 300) . '...more' : $product->description }}</td>
                            <td><a href="{{ route('product-details', $product->id) }}">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
           
 @endsection
   