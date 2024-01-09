<!-- resources/views/create.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h2>Create Products</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                <p>{{ $message }}</p>
            </div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
                @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="body_html" name="body_html" required></textarea>
                @error('body_html')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
            </div>
            <div class="form-group">
                <label for="product_type">product type:</label>
                <input type="text" class="form-control" id="product_type" name="product_type" required>
                @error('product_type')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-group">
    <option value="active">active</option>
    <option value="draft">draft</option>
    <option value="archived">archived</option>
  </select>
            </div>
            @error('status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image" required>
                @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
