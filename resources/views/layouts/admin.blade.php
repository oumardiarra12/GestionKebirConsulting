<!DOCTYPE html>
<html lang="fr">
    @php
    $entreprise = DB::table('entreprises')->first();
@endphp
<head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- <meta name="author" content="DexignLab">
        <meta name="robots" content="" >
        <meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontend">
        <meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
        <meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
        <meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice." >
        <meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
        <meta name="format-detection" content="telephone=no"> --}}

        <!-- Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Page Title -->
        <title>{{ $entreprise->nom_entreprise ?? 'Gestion Kebir Consulting' }}</title>

        <!-- Favicon icon -->

  @if(!empty($entreprise->logo_entreprise))
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/'.$entreprise->logo_entreprise) }}">
@endif
        <!-- All StyleSheet -->
        {{-- <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet"> --}}
        <link href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}">
        {{-- <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet"> --}}
        <!-- Globle CSS -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        @stack('styles')
        @livewireStyles
    </head>


<body>

    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

       <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
          <!--**********************************
            Nav header start
        ***********************************-->
        @include('components.admin.NavHeader')
        <!--**********************************
            Nav header end
        ***********************************-->
        <!--**********************************
            Header start
        ***********************************-->
        @include('components.admin.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('components.admin.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
        <div class="content-body">


        {{ $slot ?? '' }}

</div>
@include('components.admin.Footer')



</div>
  <!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
{{-- <script src="{{asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" defer></script> --}}

<!-- Apex Chart -->
{{-- <script src="{{asset('assets/vendor/apexchart/apexchart.js')}}" defer></script>
<script src="{{asset('assets/vendor/chartjs/chart.bundle.min.js')}}" defer></script> --}}

<!-- Chart piety plugin files -->
{{-- <script src="{{asset('assets/vendor/peity/jquery.peity.min.js')}}" defer></script> --}}

<!-- Dashboard 1 -->
{{-- <script src="{{asset('assets/js/dashboard/dashboard-1.js')}}" defer></script> --}}
<!-- ck-editor -->
{{-- <script src="{{asset('assets/vendor/ckeditor/ckeditor.js')}}" defer></script> --}}
<script src="{{asset('assets/vendor/owl-carousel/owl.carousel.js')}}" defer></script>

<script src="{{asset('assets/vendor/global/global.min.js')}}" defer></script>
{{-- <script src="{{asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script> --}}
<script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}" defer></script>
{{-- <script src="{{asset('assets/js/plugins-init/select2-init.js')}}" defer></script> --}}
<script src="{{asset('assets/js/custom.min.js')}}" defer></script>
<script src="{{asset('assets/js/dlabnav-init.js')}}" defer></script>

{{--
<script>
    $(document).ready(function() {

      var counters = $(".count");
      var countersQuantity = counters.length;
      var counter = [];

      for (i = 0; i < countersQuantity; i++) {
        counter[i] = parseInt(counters[i].innerHTML);
      }

      var count = function(start, value, id) {
        var localStart = start;
        setInterval(function() {
          if (localStart < value) {
            localStart++;
            counters[id].innerHTML = localStart;
          }
        }, 40);
      }

      for (j = 0; j < countersQuantity; j++) {
        count(0, counter[j], j);
      }
    });
</script> --}}

</div>
@livewireScripts
@stack('scripts')

</body>
</html>
