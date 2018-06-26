<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="author" content=""> 

      <meta name="description" content="{{$meta_description or '' }}"/>

      <meta name="keywords" content="{{$meta_key or ''}}"/>


      <link rel="icon" href="../../favicon.ico">

      <title> Lazımbana:
            @if(isset($category))    
            {{ isset($category)?$category:''}}                             
                    @else
                {{  $main_title  or $product->category->name }}

                @endif                      
                
        </title>

      <link href="{{ asset('public/new/css/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/new/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/new/css/owl.carousel.min.css') }}" rel="stylesheet" >
        <link href="{{ asset('public/new/css/jquery-ui.css') }}" rel="stylesheet" >
        <link href="{{ asset('public/new/css/settings.css') }}" rel="stylesheet" type="text/css"  media="screen" />
      <link href="{{ asset('public/new/css/easy-responsive-tabs.css') }}" rel="stylesheet">
        <link href="{{ asset('public/new/css/style.css') }}" rel="stylesheet">
        


      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

        <body>
            <div class="container">
                <div class="container_bg row">
                      <div class="top_bar">
                          <div class="page-wrapper">
                              <div class="col-md-5 col-sm-5">
                                  <ul class="woocom">
                                      @if($userData==null)                                        
                                        
                                      <li class="top-login"><a href="#" onclick="return false">Login / Register</a>
                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                      {{ csrf_field() }}
                                      <ul>
                                      <li><label for="username">Email <span class="required">*</span></label></li>
                                      <li><input class="input-text" name="email" id="email" value="" type="email"></li>
                                      <li><label for="password">Password <span class="required">*</span></label></li>
                                      <li><input class="input-text" name="password" id="password" type="password"></li>
                                      <li><input class="button" name="login" value="Login" type="submit"></li>
                                      <li class="reg-link"><a href="{{ url('myaccount/signup') }}" class="resig">Register</a><a href="{{ url('password/reset') }}" class="forgot">Reset password</a></li>
                                      </ul>                                      
                                      </form>
                                      </li>
                                      @else
                                      <li class="topcart"> <a href="{{url('myaccount')}}">My Account</a> 

                                      </li>
                                       <li class="topcart"> <a href="{{url('signout')}}">Logout</a> </li>
                                      @endif
                                      <li class="topcart"><a href="{{ url('/checkout') }}">Cart<span class="cart-counts">{{$total_item}}</span></a><div class="cartdrop widget_shopping_cart nx-animate animated" style="visibility: visible;"><div class="widget_shopping_cart_content"><ul class="cart_list product_list_widget">Total : {{$sub_total}}</ul></div></div></li>
                                  </ul>
                              </div>
                              
                              <div class="col-md-7 col-sm-7">
                                  <div class="sf_search">
                                  
                                  <form>
                                        
                                    <input class="sf_input" autocomplete="off" value="{{ $q or ''}}" name="q" type="text">
                                    <button class="sf_button searchsubmit" type="submit"><span>Search</span></button>
                                  </form>
                                        
                                  </div>
                              </div>
                          </div>                            
                      </div>
                      
                      <div class="social-bar">              
                              <ul class="social">
                              <li class="twitter"><a href="#" title="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li> 
                              <li class="facebook"><a href="#" title="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li> 
                              <li class="skype"><a href="#" title="skype" target="_blank"><i class="fa fa-skype"></i></a></li> 
                              <li class="googleplus"><a href="#" title="googleplus" target="_blank"><i class="fa fa-google-plus"></i></a></li> 
                              <li class="flickr"><a href="#" title="flickr" target="_blank"><i class="fa fa-flickr"></i></a></li> 
                              <li class="youtube"><a href="#" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li> 
                              <li class="instagram"><a href="#" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li> 
                              <li class="pinterest"><a href="#" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li> 
                              <li class="linkedin"><a href="#" title="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                              </ul>
                      </div>    
                              
                      <header>
                          <div class="page-wrapper">
                              <div class="col-md-4"><a href="{{ url('/') }}" class="logo"><img src="{{ asset('public/new/images/logo-lazimbana.png') }}"></a></div>
                              <div class="col-md-8">
                              <div class="navbar-header">
                                      <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                  </div>
                                  <div class="header-icons woocart">
                                      <a href="{{ url('/checkout') }}" class="reversed">
                                          <span class="fa fa-cart-plus"></span>
                                          <span class="cart-counts">{{$total_item}}</span>  
                                      </a>
                                  </div>
                                  
                                  <div class="navbar-inverse side-collapse in">

                                      <nav role="navigation" class="navbar-collapse">
                                      @if(isset($category_menu) && $category_menu->count()==0) 
                                        <ul class="nav navbar-nav">
                                            @foreach ($category_list as $key => $value) 
                                                <li><a href="{{ url($value->slug) }}">{!! ucfirst($value->name) !!}</a> 
                                                @if(isset($mega_menu[$value->id]))
                                                
                                                    <ul>
                                                     @foreach ($mega_menu[$value->id] as $key => $result)
                                                        @foreach ($result as $url => $menu)
                                                        <li class="col-md-3">
                                                            <ul>
                                                                 <li><a href="{{url($url)}}">{{ucfirst($menu) }}</a></li>
                                                            </ul>
                                                        </li> 
                                                        @endforeach 
                                                     @endforeach         
                                                    </ul>
                                                </li>
                                                @endif
                                            @endforeach    
                                        </ul>
                                      @endif
                                      </nav>
                                 </div>

                                <div class="navbar-inverse side-collapse in">
                                    <nav role="navigation" class="navbar-collapse">
                                        <ul class="nav navbar-nav">
                                        @foreach ($category_menu as $key => $value)  
                                            <li><a href="{{ url($value->category->slug) }}">{!! ucfirst($value->category->name) !!}</a>
                                            @if(isset($mega_menu[$value->category_id]))
                                           
                                                <ul>
                                                 @foreach ($mega_menu[$value->category_id] as $key => $result)
                                                    @foreach ($result as $url => $menu)
                                                    <li class="col-md-3">
                                                        <ul>
                                                            <li><a href="{{url($url)}}">{{ucfirst($menu) }}</a></li>
                                                        </ul>
                                                    </li> 
                                                    @endforeach 
                                                 @endforeach         
                                                </ul>
                                            </li>
                                            @endif
                                        @endforeach    
                                        </ul>
                                    </nav>
                                </div>

                              </div>
                          </div>
                      </header>