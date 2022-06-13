<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('index') }}" class="brand-link">
      <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fund Me</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">
            {{ Auth::user()->name }}
            {{-- Fal --}}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link {{ Request::segment(2) == '' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.projects.index') }}" class="nav-link {{ Request::segment(2) == 'projects' ? 'active' : '' }}">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Projects
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ Request::segment(2) == 'transactions' ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Transactions
              </p>
            </a>
          </li>
          {{-- @auth
              @if (Auth::user()->role == 'admin')
              <li class="nav-item">
                <a href="#" class="nav-link {{ Request::segment(2) == 'users' ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>
              @endif
          @endauth --}}
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post" class="hidden" id="form-logout">
              @csrf
            </form>
            <button onclick="$('#form-logout').submit()" type="submit" class="btn btn-sm nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </button>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>