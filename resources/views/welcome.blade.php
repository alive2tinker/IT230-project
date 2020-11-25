@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to epiphany blog</h1>
            <p class="lead">world's loveliest blog</p>
            <hr class="my-4">
            <p>we use the latest technology to enable you to share your thoughts with others</p>
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register Now</a>
        </div>
        <div class="row">
            <div class="col-md-4 text-center slim-border"><i class="fa fa-globe bg-green-gradient fa-5x my-3"></i>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aliquam aliquid, aperiam architecto dolor doloribus enim error et ex fugiat in magni mollitia natus nemo qui quod rerum sapiente ut!</p>
            </div>
            <div class="col-md-4 text-center slim-border"><i class="fa fa-heart bg-red-gradient fa-5x my-3"></i>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores, at commodi corporis doloremque doloribus dolorum ea earum eius expedita facere incidunt laborum maxime nisi odit omnis reprehenderit voluptate voluptatem.</p>
            </div>
            <div class="col-md-4 text-center slim-border"><i class="fa fa-check text-success bg-blue-gradient fa-5x my-3"></i>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis id nostrum nulla obcaecati provident quas sint soluta! Aperiam, at autem beatae eaque enim excepturi explicabo inventore, molestias, odit optio unde.</p>
            </div>
        </div>
    </div>
@endsection
