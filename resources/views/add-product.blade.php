@extends('layouts.master')
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Product</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" aria-describedby="emailHelp">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price ( in INR)</label>
                  <input type="number" maxLength='5' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{ old('price') }}" class="form-control" id="price" name="price">
                  @error('price')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Rating</label>
                    <select class="form-control" name="rating">
                        <option value="" hidden>Select Rating</option>
                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>One</option>
                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>Two</option>
                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>Three</option>
                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>Four</option>
                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>Five</option>
                    </select>
                    @error('rating')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                     @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

</div>
           
 @endsection
   