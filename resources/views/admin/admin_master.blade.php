<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin | Food</title>
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/css/demo_1/style.css')}}">
  <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  <link rel="stylesheet" href="{{asset('backend/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('backend/date/daterangepicker.css')}}">
  <link rel="shortcut icon" href="{{asset('backend/assets/images/chicken-logo.jpg')}}"/>
</head>

<body class="sidebar-dark">
  <div class="main-wrapper">
      @include('admin.body.navbar')
      @include('admin.body.sidebar')
    <div class="page-wrapper">
     @include('admin.body.head')
      <div>
        @yield('admin')
      </div>
          @include('admin.body.footer')
    </div>
  </div>

<script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
<script src="{{asset('backend/assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('backend/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('backend/assets/js/template.js')}}"></script>
<script src="{{asset('backend/assets/js/dashboard.js')}}"></script>
<script src="{{asset('backend/assets/js/datepicker.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- plugin js for this page -->
<script src="{{asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<!-- custom js for this page -->
<script src="{{asset('backend/assets/js/data-table.js')}}"></script>
<!-- end custom js for this page -->
<script type="text/javascript" src="{{asset('backend/date/jquery.daterangepicker.js')}}"></script>
<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif
 
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/dist/js/code.js') }}"></script>

<script type="text/javascript">
  $.ajaxSetup({
      headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
  })
</script>
{{-- <script>
      //select2
      $(function () {   
				$('.select2').select2();
			});
    //
</script> --}}
</body>
</html>
