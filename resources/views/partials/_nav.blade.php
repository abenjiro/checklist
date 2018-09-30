<nav class="navbar navbar-default navbar-fixed-side">
            <div class="container">
              <div class="navbar-header">
                <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">MY CHECKLIST</a>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="active">
                    <a href="{{route('todo.dashboard')}}">DashBoard</a>
                  </li>
                  <li class="">
                    <a href="#">History</a>
                  </li>
                 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                  </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  </form>
                </li>
                </ul>
                
                 <p class="navbar-text">
                  USER NAME
                  <a href="#">{{ Auth::user()->name }}</a>
                </p>
              </div>
            </div>
          </nav>