<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
    <link rel="icon" type="image/gif/png" href="{{ asset('img/icon.png') }}">
    <title>E-TATIB SMKN 1 SURABAYA</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="POST" action="{{ route('login') }}" class="sign-in-form">
            @csrf
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="email" placeholder="Email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                        <strong style="color: red; position: fixed; right: 100px; top: 125px;">{{ $message }}</strong>
                @enderror
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="submit" class="btn solid" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3 >E-TATIB</h3>
            <p>
              Silahkan login untuk mendapatkan <strong>QR Code</strong> dan melihat <strong>Profil</strong> siswa beserta pelanggaran yang dilakukan.
            </p>
          </div>
          <img  src="{{asset('img/login.svg')}}" class="image" alt="" />
        </div>
      </div>
    </div>

  </body>
</html>
