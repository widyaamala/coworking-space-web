@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-flex justify-content-center align-items-center col-md-4 col-lg-6">
		<div class="text-center">
		<h2 class="login-heading">Welcome to</br>Ezo Coworking Space</h2>
		</div>
	</div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-12 mx-auto">
				
			<h6 class="mb-4">You have to login first.</h6>
              
               <form action="{{ route('login') }}" method="POST" id="logForm">
 
                 @csrf
 
                <div class="form-label-group">
                  <input type="email" id="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  <label for="email">Email address</label>
 
                  @if ($errors->has('email'))
                  <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                  @endif    
                </div> 
 
                <div class="form-label-group">
                  <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  <label for="password">Password</label>
                   
                  @if ($errors->has('password'))
                  <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                  @endif  
                </div>
				</br>
				
				<div class="form-label-group">
                    <div class="custom-control custom-checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
 
                <button class="btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
				<div class="text-center"><a class="btn btn-link" href="{{ route('password.request') }}">
				{{ __('auth.forgot') }}</a></div>
                
				<p class="text-center mb-3">
                    Or Login with
                </p>

                    @include('partials.socials-icons')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('auth.forgot') }}
                                </a>
                            </div>
                        </div>

                        <p class="text-center mb-4">
                            Or Login with
                        </p>

                        @include('partials.socials-icons')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
