<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Shopify Products</title>
</head>
<body>
    <h1>All Shopify Products</h1>
    <a class="btn btn-success" href="{{ route('products.create') }}">Create Products</a>
    @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                <p>{{ $message }}</p>
            </div>
        @endif
    <table class="table table-bordered mt-3" style="text-align:center;">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Product Type</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['title'] }}</td>
                    <td>{{ $product['body_html'] }}</td>
                    <td>{{ $product['product_type'] }}</td>                    
                    <td>{{ $product['created_at'] }}</td>
                    <td>{{ $product['updated_at'] }}</td>
                    <td>{{ $product['status'] }}</td>
                    <td>
                        @if(isset($product['image']['src']))
                            <img src="{{ $product['image']['src'] }}" height="100" alt="Product Image">
                        @else
                            No image available
                        @endif
                    </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
   
</body>
</html>
