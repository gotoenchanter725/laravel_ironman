
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>{{ env('APP_NAME') }}</title>

    {{-- Material Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">

    <!-- vendor css -->

    <link href="{{ asset('dashboard_assets') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/css/starlight.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> {{ env('APP_NAME') }}</a></div>
    <div class="sl-sideleft">
        <div class="input-group input-group-search">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <span class="input-group-btn">
            <button class="btn"><i class="fa fa-search"></i></button>
            </span><!-- input-group-btn -->
        </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    @if (Auth::user()->user_role == 1)
    <div class="sl-sideleft-menu">
      <a href="{{ route('home') }}" class="sl-menu-link {{ $activePage == 'home' ? 'active' : '' }}">
      <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('category.index') }}" class="sl-menu-link {{ $activePage == 'category' ? 'active' : '' }}">
          <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-navicon-round tx-20"></i>
          <span class="menu-item-label">Category</span>
          </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('product.index') }}" class="sl-menu-link {{ $activePage == 'product' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-plus-circled tx-20"></i>
        <span class="menu-item-label">Product</span>
        <span class="badge badge-danger">{{ alert_product_quantity() }}</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('orders.index') }}" class="sl-menu-link {{ $activePage == 'order' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-bag tx-20"></i>
        <span class="menu-item-label">Order</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('coupon.index') }}" class="sl-menu-link {{ $activePage == 'coupon' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion ion-code-working"></i>
        <span class="menu-item-label">Coupon</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('testimonial.index') }}" class="sl-menu-link {{ $activePage == 'testimonial' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-magnet tx-20"></i>
        <span class="menu-item-label">Testimonial</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('contact.index') }}" class="sl-menu-link {{ $activePage == 'contact' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-person-stalker tx-20"></i>
        <span class="menu-item-label">Contact</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('posts.index') }}" class="sl-menu-link {{ $activePage == 'blogspost' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-bookmark tx-20"></i>
        <span class="menu-item-label">Blogpost</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('todos.index') }}" class="sl-menu-link {{ $activePage == 'todo' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-calendar tx-20"></i>
        <span class="menu-item-label">Todo Tasks</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
    
      <a href="{{ route('profile.index') }}" class="sl-menu-link {{ ($activePage == 'userprofile' || $activePage == 'editprofile') ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-person tx-20"></i>
        <span class="menu-item-label">Profile</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link {{ $activePage == 'userprofile' ? 'active' : '' }}">Profile List</a></li>
        <li class="nav-item"><a href="{{ route('profile.edit') }}" class="nav-link {{ $activePage == 'editprofile' ? 'active' : '' }}">Edit Profile</a></li>
      </ul>

      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Charts</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>
        <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
        <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
        <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
        <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
      </ul>
    </div><!-- sl-sideleft-menu -->
    {{-- Customer Dashboard Layout --}}
    @else 
    <div class="sl-sideleft-menu">
      <a href="{{ route('customer.home') }}" class="sl-menu-link {{ $activePage == 'home' ? 'active' : '' }}">
      <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Customer Dashboard</span>
      </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('shop') }}" class="sl-menu-link {{ $activePage == 'shop' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-bag tx-20"></i>
        <span class="menu-item-label">Shop Page</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('cart.index') }}" class="sl-menu-link {{ $activePage == 'cart' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-cash tx-20"></i>
        <span class="menu-item-label">Cart Page</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('checkout') }}" class="sl-menu-link {{ $activePage == 'checkout' ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon  ion-checkmark-circled tx-20"></i>
        <span class="menu-item-label">Checkout Page</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
     
    </div>
    @endif
    <br>
  </div><!-- sl-sideleft -->


    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{ Auth::user()->name }}</span>
              <img src="{{ asset('uploads/profile_photos') }}/{{ Auth::user()->profile_image }}" class="wd-32 rounded-circle" alt="">
            </a>
            @if (Auth::user()->user_role ==2)
              <div class="dropdown-menu dropdown-menu-header wd-200 bg-dark">
            @else
              <div class="dropdown-menu dropdown-menu-header wd-200">
            @endif

              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ route('profile.edit') }}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                @if (Auth::user()->user_role == 1)
                  <li><a href=""><i class="icon ion-bag"></i>Settings</a></li>
                  <li><a href=""><i class="icon ion-cash"></i>Collections</a></li>
                @else
                  <li><a href="{{ route('shop') }}"><i class="icon ion-bag"></i>Shop Page</a></li>
                  <li><a href="{{ route('cart.index') }}"><i class="icon ion-cash"></i>Go to Cart</a></li>
                  <li><a href="{{ route('checkout') }}"><i class="icon ion-checkmark-circled"></i>Checkout</a></li>
                @endif
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
                <i class="icon ion-power"></i> Sign Out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                @csrf
                </form>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{ asset('dashboard_assets') }}/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_assets') }}/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <div class="sl-mainpanel">
        @yield('breadcrub_content')
        <div class="sl-pagebody">

        {{-- Start Extends here for code --}}
        @yield('dashboard_content')

        </div>
    </div>
    <script src="{{ asset('dashboard_assets') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/select2/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    @yield('dashboard_scripts')
  </body>
</html>
