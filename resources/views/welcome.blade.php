<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>Check-Bee</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

    html,body{ 
    height: 100vh;
    margin: 0;
    font-family: 'Raleway', sans-serif;
    background:#fff;
}

html{
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

body{
  font:normal 75% Arial, Helvetica, sans-serif;
}

canvas{
  display:block;
  vertical-align:bottom;
}

#particles-js{
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 0;
  background-color: #482628;
  background-image: url('');
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
}
#overlay{
    position: relative;
    padding: 50px;
}

.full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
        </style>
    </head>
    <body>
      
          
        <div id="particles-js"></div>
          
    
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md f-color" style="color: white" >
                    CHECK-BEE APP
                </div>

                <div class="links" >

                    <a href="{{ url('/login') }}" style="color: white;" >Login</a>
                    <a href="{{ url('/register')}}" style="color: white;" >Register</a>

                </div>
            </div>
        </div>

        <script src="{{ asset('js/particles.min.js') }}"></script>
        <script src="{{ asset('js/parts.js') }}"></script>
    </body>
</html>
