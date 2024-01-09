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
                @foreach ($restaurents as $restaurent)
                    <tr>
                        <td>{{ $restaurent->id }}</td>
                        <td>{{ $restaurent->name }}</td>
                        <td>{{ $restaurent->code }}</td>
                        <td>{{ $restaurent->location }}</td>
                        <td>
                        <td>
                            <a href="{{ route('restaurants.show', $restaurent->id) }}" class="btn btn-primary">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
