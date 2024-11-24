@extends('layout.app')



@section('seo_tags')
    <title>Home</title>
@stop

@section('css')

@stop
@section('content')
    <main>
        <div class="container mt-5" style="width: 800px; margin-top: 50px">
            <div class="list-group">
                @foreach ($articles as $article)
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $article->title }}</h5>
                            <small>{{ $article->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1"><i>{{ $article->theme }}</i></p>
                        {{-- <p class="mb-1">{{ $article->content }}</p> --}}
                        <small>{{ $article->author_name }}</small>
                        <a href="{{ route('publish.details', $article->title) }}" class="btn btn-outline-primary mt-3">Read
                            Full story</a>

                    </a>
                @endforeach
            </div>
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </main>
@endsection

@section('javascript')

@stop
