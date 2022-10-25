@extends('layouts.login')

@section('konten')

{{-- <img src="{{asset('img/sekolah.jfif')}}" style="opacity:0.2;
        position:fixed;
        width:1400px;
        bottom:0px"> --}}
        
<div class="container">
    <center>
    <div class="middle">
          <div id="login">
    
                <form method="POST" action="{{ route('login') }}">
        @csrf

            <p ><span class="fa fa-user"></span>
                <input id="email" placeholder="Email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>
            <p><span class="fa fa-lock"></span>
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
    </form>
    
            <div class="clearfix"></div>
    
          </div> <!-- end login -->
          <div class="logo ml-4"><img src="{{asset('img/logo.png')}}" alt="" srcset="" style="height:100px">
          </div>
          
          </div>
    </center>
        </div>
    
    </div>
@endsection

