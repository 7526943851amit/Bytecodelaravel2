<!-- resources/views/restaurents.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h2>Restaurants</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fooditems as $fooditem)
                    <tr>
                        <td>{{ $fooditem->id }}</td>
                        <td><img src="{{ asset('images/'.$fooditem->image) }}" alt="Food Image" style="max-width: 100px;"></td>

                        <td>{{ $fooditem->name }}</td>
                        <td>{{ $fooditem->description }}</td>
                        <td>{{ $fooditem->price }}</td>
                        <td>{{ $fooditem->status }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
