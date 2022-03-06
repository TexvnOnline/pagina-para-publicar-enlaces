@extends('layouts.errors')
@section('content')
<div class="account-form-inner">
    <div class="account-container">
        <div class="error-page">
            <h3>Ooopps :(</h3>
            <h2 class="error-title">403</h2>
            <h5>User does not have the right permissions.</h5>
            <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <div class="">
                <a href="{{ URL::previous() }}" class="btn m-r5">Preview</a>
                @guest
                <a href="{{route('client.index')}}" class="btn outline black">Back To Home</a>
                @else
                <a href="{{route('dashboard')}}" class="btn outline black">Back To Home</a>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection