<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">АДМИН</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Хяналтын самбар</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->

    <!-- Divider -->
        <!-- Heading -->
        <div class="sidebar-heading">
            Микро мэдээллийн сан
        </div>

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
          <i class="fas fa-sitemap"></i>
          <span>Ангилал</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ангиллын сонголтууд:</h6>
            <a class="collapse-item" href="{{route('category.index')}}">Ангилал</a>
            <a class="collapse-item" href="{{route('category.create')}}">Ангилал нэмэх</a>
          </div>
        </div>
    </li>
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Судалгаа</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Судалгааны сонголт:</h6>
            <a class="collapse-item" href="{{route('survey.index')}}">Судалгаанууд</a>
            <a class="collapse-item" href="{{route('survey.create')}}">Судалгаа нэмэх</a>
          </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Файлын сан</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Файлын удаирдлага:</h6>
            <a class="collapse-item" href="{{route('file.index')}}">Файлууд</a>
            <a class="collapse-item" href="{{route('file.create')}}">Файл нэмэх</a>
          </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
       Ерөнхий тохиргоо
    </div>
     <!-- Users -->
     <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-users"></i>
            <span>Хэрэглэгч</span></a>
    </li>
     <!-- General settings -->
     <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-cog"></i>
            <span>Тохиргоо</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
