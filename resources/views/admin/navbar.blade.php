<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.kategori') }}"><i class="fa fa-tags"></i> Kategori</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.produk') }}"><i class="fa fa-box"></i> Produk</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> Users</a>
</li>
<li class="nav-item">
    <a class="nav-link text-danger" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       <i class="fa fa-sign-out-alt"></i> Logout
    </a>
</li>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

