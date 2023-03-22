<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        {{-- fungsi * di dalam {{ Request::is('dashboard/posts*') ? 'active' : '' }} adalah agar url yang berada di
        dashnoard/posts dan seterusnya akan terus aktive. misalkan dashboard/posts/create atau update, maka tampilan
        nya akan aktif--}}
        <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="{{route('user.index')}}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Data User
        </a>
      </li>

      <li class="nav-item">
        {{-- fungsi * di dalam {{ Request::is('dashboard/posts*') ? 'active' : '' }} adalah agar url yang berada di
        dashnoard/posts dan seterusnya akan terus aktive. misalkan dashboard/posts/create atau update, maka tampilan
        nya akan aktif--}}
        <a class="nav-link {{ Request::is('swap*') ? 'active' : '' }}" href="{{route('swap-index')}}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Swap
        </a>
      </li>

      <li class="nav-item">
        {{-- fungsi * di dalam {{ Request::is('dashboard/posts*') ? 'active' : '' }} adalah agar url yang berada di
        dashnoard/posts dan seterusnya akan terus aktive. misalkan dashboard/posts/create atau update, maka tampilan
        nya akan aktif--}}
        <a class="nav-link {{ Request::is('bilangan*') ? 'active' : '' }}" href="{{route('bilangan')}}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Bilangan
        </a>
      </li>

      <li class="nav-item">
        {{-- fungsi * di dalam {{ Request::is('dashboard/posts*') ? 'active' : '' }} adalah agar url yang berada di
        dashnoard/posts dan seterusnya akan terus aktive. misalkan dashboard/posts/create atau update, maka tampilan
        nya akan aktif--}}
        <a class="nav-link {{ Request::is('product*') ? 'active' : '' }}" href="{{route('product')}}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Product Stock
        </a>
      </li>

      <li class="nav-item">
        {{-- fungsi * di dalam {{ Request::is('dashboard/posts*') ? 'active' : '' }} adalah agar url yang berada di
        dashnoard/posts dan seterusnya akan terus aktive. misalkan dashboard/posts/create atau update, maka tampilan
        nya akan aktif--}}
        <a class="nav-link {{ Request::is('user-api*') ? 'active' : '' }}" href="{{route('user-api.index')}}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          User API
        </a>
      </li>
    </ul>
  </div>
</nav>