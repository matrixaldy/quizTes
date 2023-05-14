    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('admin/dashboard' )}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Session::get('user')->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a onclick="profiles()" class="dropdown-item" title="Profile" style="cursor:pointer"><i class="fas fa-edit"></i> Profile</a>
            <a class="dropdown-item" href="{{ url('/logout') }}" title="Logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>