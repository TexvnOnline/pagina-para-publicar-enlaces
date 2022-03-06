@extends('layouts.errors')
@section('content')
<div class="account-form-inner">
    <div class="account-container">
        <div class="error-page">
            <h3>Ooopps :(</h3>
            <h2 class="error-title">404</h2>
            <h5>The Page you were looking for, couldnt be found.</h5>
            <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <div class="">
                <a href="{{ URL::previous() }}" class="btn m-r5">Preview</a>
                <a href="{{route('client.index')}}" class="btn outline black">Back To Home</a>
            </div>
        </div>
    </div>
</div>
@endsection