@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card my-2">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group"><textarea placeholder="what's on your mind" name="contents" cols="30" rows="4" class="form-control">{{ $post->contents }}</textarea></div>
                            <button class="btn btn-primary" type="submit">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
