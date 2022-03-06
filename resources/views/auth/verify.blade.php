@extends('auth.template')
@section('content')
<div class="account-form-inner">
    <div class="account-container">
        <div class="heading-bx left">
            <h2 class="title-head">Verify Your Email Address</h2>
        </div>
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        
            <div class="row placeani">
                <div class="col-lg-12">

                    <div class="form-group">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                    </div>
                    {{--  <div class="form-group">
                        <div class="input-group">
                            <label>Your Email Address</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required="" class="form-control @error('email') is-invalid @enderror" autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>  --}}
                </div>
                <div class="col-lg-12 m-b30">

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf

                    <button name="submit" type="submit" value="Submit" class="btn button-md">{{ __('click here to request another') }}</button>

                    </form>
                </div>
            </div>
       
    </div>
</div>
@endsection
