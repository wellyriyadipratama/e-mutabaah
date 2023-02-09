<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>E-Tahfizh</title>
	  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <link href="{{asset('assets')}}/css/bootstrap.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/css/ct-paper.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/css/demo.css" rel="stylesheet" />

</head>
<body>
<nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
           <div class="logo-container">
                <div class="logo">
                    <img src="app-assets/images/logo/logo1.png">
                </div>
                <div class="brand">
                   Rumah Qur'an <br> Al-Mubarok
                </div>
            </div>
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="/login" target="_blank" class="btn btn-primary">Login</a>
          </li>
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>


<div class="wrapper">
    <div class="demo-header demo-header-image">
            <div class="motto">
                <h1 class="title-uppercase">Rumah Qur'an <br> Al-Mubarok</h1>
                <h3>Membangun Generasi Qur'ani</h3>
            </div>
    </div>
</div>

{{-- <div class="container">
  <div class="row">
    @foreach($dataInformasi as $value)
    <div class="col-md-4" style="padding: 2rem">
      <div class="card" style="width: 100%">
        <div class="card-body">
          <h3 class="card-title">{{$value->judul}}</h3>
          <p class="card-text" style="height: 50vh">{{$value->content}}</p>
          <label for="">Tanggal Dibuat {{$value->created_at}}</label>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div> --}}

<!-- BEGIN: Card-->
<div class="container">
  <div class="row">
    <div style="padding: 2rem">
      <div class="card text-center">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END: Card-->

<!-- BEGIN: Footer-->
<footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
  <div class="footer-copyright">
    <div class="container">
     <span class="right hide-on-small-only">&copy;2022, made with <i class="fa fa-heart heart"></i> by Rumah Qur'an Creative Team</span></div>
  </div>
</footer>
<!-- END: Footer-->
</div>
</body>

<!--  Plugins -->
  <script src="{{asset('assets')}}/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="{{asset('assets')}}/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
	<script src="{{asset('assets')}}/js/bootstrap.js" type="text/javascript"></script>
	<script src="{{asset('assets')}}/js/ct-paper-checkbox.js"></script>
	<script src="{{asset('assets')}}/js/ct-paper-radio.js"></script>
	<script src="{{asset('assets')}}/js/bootstrap-select.js"></script>
	<script src="{{asset('assets')}}/js/bootstrap-datepicker.js"></script>
	<script src="{{asset('assets')}}/js/ct-paper.js"></script>
  
</html>
