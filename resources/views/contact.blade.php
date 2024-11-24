@extends('layout.app')



@section('seo_tags')
    <title>Contact Us</title>
@stop

@section('css')
@section('content')
    <main>
        <div class="container" style="width: 600px; margin-top: 50px">
            <h1 style="margin-bottom: 20px">Contact Form</h1>
            @if (session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <ul style="color: red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('contact.handle') }}" method="post">
                @csrf
                <div class="mb-3">
                    <div class="col">
                        <label>Full Name</label>
                        <input type="text" required maxlength="50" class="form-control" id="full_name" name="full_name">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <label for="email_addr">Email</label>
                        <input type="email" required maxlength="50" class="form-control" id="email_addr" name="email"
                            placeholder="name@example.com">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col">
                        <label for="message">Subject</label>
                        <textarea class="form-control" id="message" name="subject" rows="3"></textarea>
                    </div>
                </div>
                <div class="mb-3">

                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                </div>
                <div class="col" style="margin-bottom: 50px">
                    <button type="submit" class="btn btn-primary px-4 btn-lg">Post</button>
                    <a href="{{ route('gallery') }}" class="btn btn-danger px-4 btn-lg">Cancel</a>
                </div>
            </form>
        </div>
    </main>
@endsection
@section('javascript')

@stop
