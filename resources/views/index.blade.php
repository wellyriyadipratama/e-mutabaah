<!DOCTYPE html>


<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>E-Tahfizh</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets')}}/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets')}}/images/favicon/logo-white1.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/animate-css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/chartist-js/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/chartist-js/chartist-plugin-tooltip.css">
    <link href="{{asset('assets')}}/css/demo.css" rel="stylesheet"/>
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/flag-icon/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/data-tables/js/jquery.dataTables.min.js">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/vendors/data-tables/css/select.dataTables.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css/themes/vertical-modern-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css/themes/vertical-modern-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css/pages/dashboard-modern.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css/pages/intro.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets')}}/css/custom/custom.css">
    <!-- END: Custom CSS-->
    <style>
          .disabled-li {
              pointer-events:none;
              background: #D3D3D3;
          }
    </style>
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('include.header')
    <!-- END: Header-->
    <ul class="display-none" id="default-search-main">
      <li class="auto-suggestion-title"><a class="collection-item" href="#">
          <h6 class="search-title">FILES</h6></a></li>
      <li class="auto-suggestion"><a class="collection-item" href="#">
          <div class="display-flex">
            <div class="display-flex align-item-center flex-grow-1">
              <div class="avatar"><img src="{{asset('app-assets')}}/images/icon/pdf-image.png" width="24" height="30" alt="sample image"></div>
              <div class="member-info display-flex flex-column"><span class="black-text">Two new item submitted</span><small class="grey-text">Marketing Manager</small></div>
            </div>
            <div class="status"><small class="grey-text">17kb</small></div>
          </div></a></li>
      <li class="auto-suggestion"><a class="collection-item" href="#">
          <div class="display-flex">
            <div class="display-flex align-item-center flex-grow-1">
              <div class="avatar"><img src="{{asset('app-assets')}}/images/icon/doc-image.png" width="24" height="30" alt="sample image"></div>
              <div class="member-info display-flex flex-column"><span class="black-text">52 Doc file Generator</span><small class="grey-text">FontEnd Developer</small></div>
            </div>
            <div class="status"><small class="grey-text">550kb</small></div>
          </div></a></li>
      <li class="auto-suggestion"><a class="collection-item" href="#">
          <div class="display-flex">
            <div class="display-flex align-item-center flex-grow-1">
              <div class="avatar"><img src="{{asset('app-assets')}}/images/icon/xls-image.png" width="24" height="30" alt="sample image"></div>
              <div class="member-info display-flex flex-column"><span class="black-text">25 Xls File Uploaded</span><small class="grey-text">Digital Marketing Manager</small></div>
            </div>
            <div class="status"><small class="grey-text">20kb</small></div>
          </div></a></li>
      <li class="auto-suggestion"><a class="collection-item" href="#">
          <div class="display-flex">
            <div class="display-flex align-item-center flex-grow-1">
              <div class="avatar"><img src="{{asset('app-assets')}}/images/icon/jpg-image.png" width="24" height="30" alt="sample image"></div>
              <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small class="grey-text">Web Designer</small></div>
            </div>
            <div class="status"><small class="grey-text">37kb</small></div>
          </div></a></li>
      <li class="auto-suggestion-title"><a class="collection-item" href="#">
          <h6 class="search-title">MEMBERS</h6></a></li>
      <li class="auto-suggestion"><a class="collection-item" href="#">
          <div class="display-flex">
            <div class="display-flex align-item-center flex-grow-1">
              <div class="avatar"><img class="circle" src="{{asset('app-assets')}}/images/avatar/avatar-7.png" width="30" alt="sample image"></div>
              <div class="member-info display-flex flex-column"><span class="black-text">John Doe</span><small class="grey-text">UI designer</small></div>
            </div>
          </div></a></li>
      <li class="auto-suggestion"><a class="collection-item" href="#">
          <div class="display-flex">
            <div class="display-flex align-item-center flex-grow-1">
              <div class="avatar"><img class="circle" src="{{asset('app-assets')}}/images/avatar/avatar-8.png" width="30" alt="sample image"></div>
              <div class="member-info display-flex flex-column"><span class="black-text">Michal Clark</span><small class="grey-text">FontEnd Developer</small></div>
            </div>
          </div></a></li>
      <li class="auto-suggestion"><a class="collection-item" href="#">
          <div class="display-flex">
            <div class="display-flex align-item-center flex-grow-1">
              <div class="avatar"><img class="circle" src="{{asset('app-assets')}}/images/avatar/avatar-10.png" width="30" alt="sample image"></div>
              <div class="member-info display-flex flex-column"><span class="black-text">Milena Gibson</span><small class="grey-text">Digital Marketing</small></div>
            </div>
          </div></a></li>
      <li class="auto-suggestion"><a class="collection-item" href="#">
          <div class="display-flex">
            <div class="display-flex align-item-center flex-grow-1">
              <div class="avatar"><img class="circle" src="{{asset('app-assets')}}/images/avatar/avatar-12.png" width="30" alt="sample image"></div>
              <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small class="grey-text">Web Designer</small></div>
            </div>
          </div></a></li>
    </ul>
    <ul class="display-none" id="page-search-title">
      <li class="auto-suggestion-title"><a class="collection-item" href="#">
          <h6 class="search-title">PAGES</h6></a></li>
    </ul>
    <ul class="display-none" id="search-not-found">
      <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
    </ul>



    <!-- BEGIN: SideNav-->
    @include('include.sidebar')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="content-wrapper-before" style="background-color: #2c3e50"></div>
        <div class="col s12">
          <div class="container">
            @if(session()->has('error'))
            <div class="card-alert card {{session()->get('error')?'red':'green'}}">
               <div class="card-content white-text">
                   <p>{{session()->get('message')}}</p>
               </div>
               <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           @endif
    @yield('content')
        </div>
        <div class="content-overlay"></div>
      </div>
      </div>
      </div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->
    <footer class="page-footer footer footer-static footer-dark gradient-shadow navbar-border navbar-shadow" style="background-color: #2c3e50">
      <div class="footer-copyright">
        <div class="container">
         <span class="right hide-on-small-only">&copy;2022, made with <i class="fa fa-heart heart"></i> by Rumah Qur'an Creative Team</span></div>
      </div>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets')}}/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('app-assets')}}/vendors/chartjs/chart.min.js"></script>
    <script src="{{asset('app-assets')}}/vendors/chartist-js/chartist.min.js"></script>
    <script src="{{asset('app-assets')}}/vendors/chartist-js/chartist-plugin-tooltip.js"></script>
    <script src="{{asset('app-assets')}}/vendors/chartist-js/chartist-plugin-fill-donut.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('app-assets')}}/js/plugins.js"></script>
    <script src="{{asset('app-assets')}}/js/search.js"></script>
    <script src="{{asset('app-assets')}}/js/custom/custom-script.js"></script>
    <script src="{{asset('app-assets')}}/js/scripts/customizer.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('app-assets')}}/js/scripts/dashboard-modern.js"></script>
    <script src="{{asset('app-assets')}}/js/scripts/intro.js"></script>
    <!-- END PAGE LEVEL JS-->
    </body>
</html>