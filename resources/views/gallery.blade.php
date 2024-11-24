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
        <div class="container posts-container">
            @foreach ($posts as $post)
                <div class="card" style="height: 100%">
                    <!-- Post Image -->
                    <img src="{{ asset('/storage/' . $post['image']) }}" alt="{{ $post['title'] }}">

                    <!-- Post Content -->
                    <div class="card-content">
                        <!-- Title -->
                        <h2 class="card-title">{{ $post['title'] }}</h2>

                        <!-- Meta Info -->
                        <p class="card-meta">
                            <strong>Published:</strong> {{ \Carbon\Carbon::parse($post['created_at'])->format('M d, Y') }}
                            | <strong>Status:</strong> {{ $post['status'] }}
                        </p>

                        <!-- Excerpt -->
                        <p class="card-body">{{ $post['excerpt'] }}</p>

                        <!-- Read More Button -->
                        <a href="{{ route('post.details', $post['slug']) }}" class="btn btn-secondary">See Details</a>
                    </div>
                </div>
            @endforeach
            <div>
                {{ $posts->links() }}
            </div>

        </div>

    </main>
@endsection

@section('javascript')

@stop
