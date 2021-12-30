<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">

          @can('admin')
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
          </h6>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="{{ route('dashboard.categories.index') }}">
              <span data-feather="edit-3"></span>
              Categories
            </a>
          </li>
          @endcan

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Master</span>
          </h6>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="{{ route('dashboard.posts.index') }}">
              <span data-feather="edit-3"></span>
              Posts
            </a>
          </li>

    
    
        </ul>
      
      </div>
    </nav>