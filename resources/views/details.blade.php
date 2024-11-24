@extends('layout.app')



@section('seo_tags')
    <title>Home</title>
@stop

@section('css')
    <style>
        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card-meta {
            font-size: 0.9em;
            color: #6c757d;
            margin-bottom: 15px;
        }

        .card-body {
            font-size: 1em;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .posts-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 12px;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
    </style>
@stop

@section('content')
    <main>
        {{-- <div class="container posts-container">
            {{ $posts }} --}}
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="display-4">{{ $posts->title }}</h1>
                    <p class="text-muted">

                        <strong>Category:</strong> {{ $posts->category->name ?? 'Uncategorized' }} |
                        <strong>Published:</strong> {{ $posts->created_at->format('M d, Y') }}
                    </p>

                    <!-- Featured Image -->
                    @if ($posts->image)
                        <img src="{{ asset('storage/' . $posts->image) }}" width="50%" class="img-fluid mb-4"
                            alt="{{ $posts->title }}">
                    @endif

                    <!-- Excerpt -->
                    <p class="lead">{{ $posts->excerpt }}</p>

                    <!-- Main Content -->
                    <div class="post-body">
                        {!! $posts->body !!}
                    </div>

                    <!-- Additional Information -->
                    <hr>
                    <p><strong>Status:</strong> {{ ucfirst(strtolower($posts->status)) }}</p>
                    <p><strong>Featured:</strong> {{ $posts->featured ? 'Yes' : 'No' }}</p>

                    <!-- Metadata -->
                    <div class="mt-3">
                        <p><strong>Meta Description:</strong> {{ $posts->meta_description }}</p>
                        <p><strong>Meta Keywords:</strong> {{ $posts->meta_keywords }}</p>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-4">
                        <a href="{{ route('gallery') }}" class="btn btn-secondary">Back to Posts</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}

    </main>
@endsection

@section('javascript')

@stop
