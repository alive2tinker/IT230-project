@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <article>{{ $post->contents }}</article>
                            <p class="text-muted">{{ $post->user->name }}</p>
                        </div>
                    </div>
                    <h1 class="my-3">Comments</h1>
                    <comments post="{{ $post->id }}" user="{{ Auth::check() ? Auth::user()->id : null }}"></comments>
                </div>
            </div>
        </div>
@endsection
