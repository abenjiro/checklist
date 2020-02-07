<nav class="navbar navbar-default navbar-fixed-side">
            <div class="container">
              <div class="navbar-header">
                <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('todo.dashboard')}}">MY CHECKLIST</a>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="{{active_menu(Route::currentRouteName(), 'todo.dashboard' , 0, 2)}}">
                    <a href="{{route('todo.dashboard')}}"><span class="fa fa-tachometer"> DashBoard</span> </a>
                  </li>
                  <li class="{{active_menu(Route::currentRouteName(), 'todo.history' , 0, 4)}}">
                    <a href="{{route('todo.history')}}"><span class="fa fa-calendar"> History</span></a>
                  </li>
                 
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span class="fa fa-sign-out" style="color: red"> Logout</span> 
                  </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  </form>
                </li>
                </ul>
                
                 <p class="navbar-text">
                  USER <span class="fa fa-user"></span>
                  <a href="#">{{ Auth::user()->name }}</a>
                </p>
              </div>
            </div>
          </nav>