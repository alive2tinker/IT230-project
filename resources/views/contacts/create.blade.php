@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4">Contact Us</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam hic exercitationem facilis, aperiam commodi sapiente quam error culpa ab est quasi. Dignissimos, quae architecto odio totam deserunt eum dolor earum.</p>
    <form class="col-md-8" action="{{ route('contacts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ old('name') }}" type="text" id="name" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" value="{{ old('email') }}" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="4" class="form-control">
                {{ old('message') }}
            </textarea>
        </div>
        <div class="form-group"><button class="btn btn-primary" type="submit">Submit</button></div>
    </form>
</div>
@endsection
