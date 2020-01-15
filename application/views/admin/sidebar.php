<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-2">GAOU MARKET</div>
</a>

<!-- Heading -->
<div class="sidebar-heading">
  Admin
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin'); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  User
</div>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/user'); ?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Data User</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<div class="sidebar-heading">
  Assets
</div>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/menu'); ?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Menu</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/histori'); ?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Histori Penjualan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Logout
</div>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Logout</span></a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
