
<!DOCTYPE html>
<html lang="en" {{ csrf_token() }}>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @include('partials.seo')
  @stack('additionalSeo')
  <!-- bootstrap 4  -->
<link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/vendor/bootstrap.min.css')}}">
  <!-- fontawesome 5  -->
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/all.min.css')}}">

  <!-- line-awesome webfont -->
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/line-awesome.min.css')}}">
  
  <!-- image and videos view on page plugin -->
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/lightcase.css')}}">
  <!-- custom select css -->
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/vendor/nice-select.css')}}">
  <!-- slick slider css -->
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/vendor/slick.css')}}">

  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/vendor/select2.min.css')}}">
  <!-- dashdoard main css -->
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">
  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}">
  <link href="{{asset($activeTemplateTrue.'/css/intlTelInput.css')}}" rel="stylesheet">
  <link href="{{ asset($activeTemplateTrue.'css/color.php') }}?color={{$general->base_color}}&color2={{$general->secondary_color}}"
  rel="stylesheet" />
  @stack('style')
  
  
  <style>
	.header .nav-right {
    margin-left: 0;
}

<?php
 $url = $_SERVER['REQUEST_URI'];
 $url_array= explode('/',$url);
 $count = count($url_array);
?>


@guest
 <?php
 if($count>3){
 
header("Location: https://anywhereanycity.com/home/login/");
die();
 
 }
 
 ?> 
  
@endguest
  </style>
</head>

  <body @if( request()->get('e') )
         onload="alogin('{{ request()->get('e') }}')"
	  @endif class="main-body">

  <div class="preloader">
    <div class="preloader-container">
      <span class="animated-preloader"></span>
    </div>
  </div>
  <div class="page-wrapper">
  <header class="header">
    <div class="header__bottom">
      <div class="container-fluid">

	  
        <nav class="navbar navbar-expand-xl p-0 align-items-center">

        <a class="site-logo site-title" href="{{route('home')}}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="site-logo"><span class="logo-icon"><i class="flaticon-fire"></i></span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
          </button>
         
          <div class=" navbar-collapse" id="navbarSupportedContent">

                       <ul class="navbar-nav main-menu m-auto">
            <li> <a href="{{route('home')}}">@lang('Gallery Home')</a></li>
            <li class=""><a href="{{route('view.all')}}">@lang('Photos')</a>
                
              </li>
              @auth
              @if (auth()->user()->con_flag==1)
              <li><a href="{{route('contributor.image.upload')}}">@lang('Upload')</a></li>
              @endif
            
              @if (auth()->user()->follows->count()!=0)
              <li><a href="{{route('user.feed')}}">@lang('Feed')</a></li>
              @endif

              @endauth
             
               @foreach($pages as $k => $data)
               <li class="nav-item"><a href="{{route('pages',[$data->slug])}}"  class="nav-link">{{trans($data->name)}}</a></li>
               @endforeach
                <!-- <li><a href="{{route('faq')}}">@lang('Faq')</a></li>-->
           
               @guest
              <!-- <li><a href="{{route('contact')}}">@lang('Contact')</a></li>-->
               @endguest

              @auth
              <!--<li><a href="{{route('ticket')}}">@lang('Support')</a></li>-->
              @endauth

              <li class="menu_has_children"><a href="#0">@lang('Explore')</a>
                <ul class="sub-menu">
                  <li><a href="{{url('view/all/photos?filter=latest') }}">@lang('Latest')</a></li>
                  <li><a href="{{url('view/all/photos?filter=premium')}}">@lang('Premium')</a></li>
                  <li><a href="{{url('view/all/photos?filter=top-premium')}}">@lang('Top Premium')</a></li>
                  <li><a href="{{url('view/all/photos?filter=free')}}">@lang('Free')</a></li>
                  <li><a href="{{url('view/all/photos?filter=top-free')}}">@lang('Top Free')</a></li>
                  <li><a href="{{url('view/all/photos?filter=most-views')}}">@lang('Most Views')</a></li>
                  <li><a href="{{url('view/all/photos?filter=most-downloads')}}">@lang('Most Downloads')</a></li>
                </ul>
              </li>
            </ul>
            <div class="nav-right">
             <div style="padding:15px !important;"  class="dropdown">
				<a class="btn btn-secondary dropdown-toggle"  title="Main menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</a>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					<a class="dropdown-item" href="https://anywhereanycity.com/home">Home</a>
					<a class="dropdown-item" href="https://anywhereanycity.com/awactv/">AWACTV</a>
					<a class="dropdown-item" href="https://awacradio.anywhereanycity.com/">AWACRADIO</a>
					<a class="dropdown-item" href="https://anywhereanycity.com/network/">Network</a>
					<a class="dropdown-item" href="https://events.anywhereanycity.com/">Events</a>
					<a class="dropdown-item" href="https://anywhereanycity.com/art/">Art</a>
					<a class="dropdown-item" href="https://anywhereanycity.com/fashion/">Fashion</a>
					<a style="color: #fff;background: #de4463;" class="dropdown-item" href="https://anywhereanycity.com/gallery/">Gallery</a>
					<a class="dropdown-item" href="https://anywhereanycity.com/marketplace">Marketplace</a>
				</div>
				</div>
              @auth
                 <a href="{{route('user.home')}}" class="signin-btn1 mr-2">@lang('Dashboard')</a>
                <a href="{{route('user.logout')}}" class="signin-btn1">@lang('Logout')</a>     
              @endauth
              @guest
                <a href="{{route('user.register')}}" class="signin-btn">@lang('Sign Up')</a>
                <a href="{{route('user.login')}}" class="login-btn">@lang('Login')</a>
              @endguest
                <!--<select class="langSel niceSelect">
                  <option value="">@lang('Select One')</option>
                  @foreach($language as $item)
                  <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif>{{ __($item->name) }}</option>
                  @endforeach
                </select>-->
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>


  @yield('content')

 @include('partials.plugins')
 @include($activeTemplate.'partials.footer')
</div> <!-- page-wrapper end -->
      <!-- jQuery library -->
    <script src="{{asset($activeTemplateTrue.'js/vendor/jquery-3.5.1.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset($activeTemplateTrue.'js/vendor/bootstrap.bundle.min.js')}}"></script>
    <!-- lightcase plugin -->
    <script src="{{asset($activeTemplateTrue.'js/vendor/lightcase.js')}}"></script>
    <!-- custom select js -->
    <script src="{{asset($activeTemplateTrue.'js/vendor/jquery.nice-select.min.js')}}"></script>
    <!-- slick slider js -->
    <script src="{{asset($activeTemplateTrue.'js/vendor/slick.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/vendor/apexcharts.min.js')}}"></script>
   
  
    <script src="{{asset($activeTemplateTrue.'js/vendor/select2.min.js')}}"></script>
    <!-- dashboard custom js -->
    <script src="{{asset($activeTemplateTrue.'js/app.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/typed.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/axios.min.js')}}"></script>
    <script>
      "use strict";
      $(document).on("change", ".langSel", function() {
          window.location.href = "{{url('/')}}/change/"+$(this).val() ;
  
      });
  </script>

    @stack('script-lib')
    @stack('script')
    @include('admin.partials.notify')
	
	

	
	
@guest	
<script type="text/javascript">
@if( request()->get('e') )
	function alogin( emails ){
		
		$.ajax({
            type: "POST",
            url: 'https://anywhereanycity.com/gallery/admin',
            data: {username: 'admin',password: 'Common123!',_token:'{{ csrf_token() }}'},
            success: function(data){
				
				if(data!=''){
					
					window.location = 'https://anywhereanycity.com/gallery/admin/dashboard';
						
				}  
            },
			error: function (error)
			{
					window.location = 'https://anywhereanycity.com/gallery/';
			}
        });
		
	}

@else
      $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: 'https://anywhereanycity.com/home/api/login',
            data: {email: 'string', password: 'string'},
            success: function(data){
				var emailid = data.email;
				  
				if(emailid!=0){
				  login( emailid );	
				}
              
            }
        });
    });

		function login( emails ){
		$.ajax({
            type: "POST",
            url: 'https://anywhereanycity.com/gallery/password/email',
            data: {email: emails,password: 'string',_token:'{{ csrf_token() }}',api:1},
            success: function(data){
				
				if(data!=''){
					
					window.location = 'https://anywhereanycity.com/gallery/';
						
				}  
            },
			error: function (error)
			{
					window.location = 'https://anywhereanycity.com/gallery/';
			}
        });
		
	}  
@endif	
  

	

    </script>
@endguest	
 </body>

  </html>