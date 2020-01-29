<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
  <div class="sidebar-brand-icon">
    <i class="fas fa-mug-hot"></i>
  </div>
  <div class="sidebar-brand-text mx-2">GAOU CAFE</div>
</a>

<!-- Heading -->  
<div class="sidebar-heading">
  Admin
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin'); ?>">
    <i class="fas fa-fw fa-home"></i>
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
    <i class="fas fa-fw fa-users"></i>
    <span>Data User</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<div class="sidebar-heading">
  Assets
</div>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/menu'); ?>">
    <i class="fas fa-fw fa-bars"></i>
    <span>Menu</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/kategori'); ?>">
    <i class="fas fa-fw fa-list-alt"></i>
    <span>Kategori</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/histori'); ?>">
    <i class="fas fa-fw fa-history"></i>
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
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
