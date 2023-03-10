<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Food
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Products</li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
          <i class="link-icon" data-feather="layers"></i>
          <span class="link-title">Products</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="emails">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('category.all')}}" class="nav-link">Categories</a>
            </li>
          
            <li class="nav-item">
              <a href="{{route('product.all')}}" class="nav-link">Add New Products</a>
            </li>
            <li class="nav-item">
              <a href="{{route('product.list')}}" class="nav-link">All Products</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">Customer Orders</li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
          <i class="link-icon" data-feather="feather"></i>
          <span class="link-title">Customer Orders</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="uiComponents">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('order.all')}}" class="nav-link">Customer All Orders</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">Returns</li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
          <i class="link-icon" data-feather="database"></i>
          <span class="link-title">Return  Orders</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="advancedUI">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('all.request')}}" class="nav-link">All Request</a>
            </li>
            <li class="nav-item">
              <a href="{{route('return.request')}}" class="nav-link">Customer Return Request</a>
            </li>
          </ul>
        </div>
      </li>



      <li class="nav-item nav-category">Reports</li>
      <li class="nav-item">
        <a class="nav-link"  data-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
          <i class="link-icon" data-feather="pie-chart"></i>
          <span class="link-title">Reports</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="reports">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('report.sales')}}" class="nav-link">Sales</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">Shop Settings</li>
      <li class="nav-item">
        <a class="nav-link"  data-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">
          <i class="link-icon" data-feather="pie-chart"></i>
          <span class="link-title">Settings</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav sub-menu">
            {{-- <li class="nav-item">
              <a href="{{route('about.all')}}" class="nav-link">Company About</a>
            </li>
            <li class="nav-item">
              <a href="{{route('policy.all')}}" class="nav-link">Company Policies</a>
            </li> --}}
            <li class="nav-item">
              <a href="{{route('slider.all')}}" class="nav-link">Home Slider Setup</a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{route('information.all')}}" class="nav-link">Shop Information</a>
            </li> --}}
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>