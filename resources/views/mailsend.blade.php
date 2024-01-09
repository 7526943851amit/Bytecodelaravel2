

@extends('layout')

@section('content')
    <div class="container">
        <h2>Mail Send</h2>

        <form action="{{ route('mail.send') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="to">Send Mail to:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>            
            <div class="form-group">
                <label for="phone">Contact Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>           
            <div class="form-group">
                <label for="MEssage">MEssage:</label>
                <textarea class="form-control" id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
