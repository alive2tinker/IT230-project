@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="profile-img-container">
                    <img class="profile-img" src="https://www.flaticon.com/svg/static/icons/svg/1527/1527391.svg" alt="...">
                </div>
                <h3 class="my-3 text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->description ? $user->description : 'no description' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled my-3">
                    @forelse ($user->posts as $post)
                        <li class="media my-3">
                            <img style="width:64px;height:64px;" src="https://www.flaticon.com/svg/static/icons/svg/1527/1527391.svg" class="mr-3" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{{ $post->user->name }}</h5>
                                <a href="{{ route('posts.show', $post->id) }}">
                                    {{ $post->contents }}
                                </a>
                                <ul class="list-unstyled m-0 d-flex justify-content-between">
                                    <li>{{ $post->created_at->diffForHumans() }}</li>
                                    <li>Comments: {{ count($post->comments) }}</li>
                                    @if(\Illuminate\Support\Facades\Auth::user()->id === $post->user->id)
                                        <li><a href="#" data-toggle="modal" class="text-danger" data-target="#post-{{ $post->id }}-delete-modal">Delete</a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="modal" tabindex="-1" id="post-{{ $post->id }}-delete-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <span class="fas fa-exclamation-triangle fa-5x text-warning"></span>
                                            <h3 class="mt-3">Are you sure?<small><br>This action cannot be reversed!</small></h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="media">
                            <div class="media-body">
                                <h4 class="text-center">No Posts</h4>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
