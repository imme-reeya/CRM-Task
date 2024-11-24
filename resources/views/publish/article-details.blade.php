@extends('layout.app')



@section('seo_tags')
    <title>Article-Details</title>
@stop

@section('css')
@stop

@section('content')
    <div class="container mt-5" style="width: 800px;">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $articles->title }}</h1>
                <h6 class="card-subtitle mb-2 text-muted">By {{ $articles->author_name }} |
                    {{ $articles->created_at->format('F j, Y') }}</h6>
                <p class="card-text">{{ $articles->content }}</p>
                <hr>
                <p><strong>Theme:</strong> {{ $articles->theme }}</p>
                <a href="{{ route('publish.index') }}" class="btn btn-primary">Back to Articles</a>
            </div>
        </div>
    </div>
@endsection
@section('javascript')

@stop
