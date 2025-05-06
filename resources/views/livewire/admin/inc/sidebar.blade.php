<div>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a wire:navigate class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="fa-solid fa-house menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link" href="{{url('admin/orders')}}">
              <i class="fa-solid fa-chart-simple menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic"
               aria-expanded="false" aria-controls="ui-basic">
              <i class="fa-solid fa-bars menu-icon"></i>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a wire:navigate class="nav-link" href="{{url('admin/category/create-category')}}">Add Category</a></li>
                  <li class="nav-item"> <a wire:navigate class="nav-link" href="{{url('admin/category')}}">View Category</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link" href="{{url('admin/sub-categories')}}">
                <i class="fa-solid fa-list-ul menu-icon"></i>
              <span class="menu-title">Sub Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#product-list" aria-expanded="false" aria-controls="product-list">
              <i class="fa-solid fa-circle-plus menu-icon"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product-list">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a wire:navigate class="nav-link" href="{{url('admin/products/create-product')}}">Add Product</a></li>
                  <li class="nav-item"> <a wire:navigate class="nav-link" href="{{url('admin/products')}}">View Product</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link" href="{{url('admin/brands')}}">
              <i class="fa-solid fa-tag menu-icon"></i>
              <span class="menu-title">Brands</span>
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link" href="{{url('admin/materials')}}">
              <i class="fa-solid fa-layer-group menu-icon"></i>
              <span class="menu-title">Materials</span>
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link" href="{{url('admin/colors')}}">
              <i class="fa-solid fa-palette menu-icon"></i>
              <span class="menu-title">Colors</span>
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link" href="{{url('admin/sizes')}}">
                <i class="fa-solid fa-up-right-and-down-left-from-center menu-icon"></i>
              <span class="menu-title">Sizes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="fa-solid fa-users menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a wire:navigate class="nav-link" href="{{url('admin/user/create-user')}}"> Add User </a></li>
                <li class="nav-item"> <a wire:navigate class="nav-link" href="{{url('admin/users')}}"> View Users </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link" href="{{url('admin/sliders')}}">
              <i class="fa-solid fa-images menu-icon"></i>
              <span class="menu-title">Home Slider</span>
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate  class="nav-link" href="{{url('admin/settings')}}">
              <i class="fa-solid fa-gear menu-icon"></i>
              <span class="menu-title">Site Settings</span>
            </a>
          </li>
        </ul>
    </nav>

</div>
