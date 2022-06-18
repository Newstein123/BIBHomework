<nav class="navbar navbar-expand-lg bg-light text-center">
    <div class="container-fluid">
      <a class="navbar-brand" href="/posts"> Home Page  </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link " aria-current="page" href="/posts/create"> Create a post </a>

          @if(Auth::user()) 
       
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="logout"> Logout </a></li>
            
            </ul>
          </div>

          @else 
          
          <a class="nav-link " aria-current="page" href="register"> Register </a>
          <a class="nav-link " aria-current="page" href="login"> Login </a>
          
          @endif

         
        </div>
      </div>
    </div>
  </nav>