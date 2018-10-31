<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ ucwords(Request::segment(1)) }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/font-awesome.min.css') }}">
    
    <link href="{{ asset('public/new/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('public/new/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/custom.css') }}">
    <link href="{{ asset('public/new/css/style.css') }}" rel="stylesheet">
    <style>
	.account_login {
    float: left;
    width: 100%;
    background: #fff; padding:50px 0;
}
.account_login h2 {
    margin: 0 0 15px;
}
.login-box-body {
    background: #fff;
    border: 1px solid #eee;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0px 2px 0px 0px rgba(204,204,204,1); float:left; width:100%;
}
.form-control{ border-color:#eee; height:40px; border-radius:3px; color: #868686;}
.btn-primary {

    float: left;
    width: auto !important;
    background: #DD3333;
    border-color: #DD3333;
    text-transform: uppercase;
    border-radius: 20px !important;
    padding: 10px 35px;

}
.btn-primary:hover{ background:#000 !important}
.link {

    float: left;
    margin: 10px;
    color: #666;
    font-size: 16px;
    text-transform: capitalize;

}
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
 text-transform: capitalize;
}
::-moz-placeholder { /* Firefox 19+ */
  text-transform: capitalize;
}
:-ms-input-placeholder { /* IE 10+ */
  text-transform: capitalize;
}
:-moz-placeholder { /* Firefox 18- */
  text-transform: capitalize;
}


	</style>
  </head>

  <body class="hold-transition login-page">
  
<div class="container">
    <div class="container_bg row">
        <div id="wrapper">
            <div class="top_bar">
                <div class="page-wrapper">
                    <div class="col-md-5 col-sm-5">
                        <ul class="woocom">
                                                                   
                             @if($userData==null)   
                            <li class="top-login"><a href="#" onclick="return false">Giriş / Kayıt</a>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <ul>
                            <li><label for="username">E-posta <span class="required">*</span></label></li>
                            <li><input class="input-text" name="email" id="email" value="" type="email"></li>
                            <li><label for="password">Parola <span class="required">*</span></label></li>
                            <li><input class="input-text" name="password" id="password" type="password"></li>
                            <li><input class="button" name="login" value="Oturum Aç" type="submit"></li>
                            <li class="reg-link"><a href="{{ url('myaccount/signup') }}" class="resig">KAYIT OL</a><a href="{{ url('password/reset') }}" class="forgot">SIFRENI SIFIRLA</a></li>
                            <li class="reg-link">
                              <a href="{{ url('satici/giris-kayit') }}" class="resig">SATICI OL / GİRİŞ</a>
                              <!--<a href="{{ url('vendor/signUp') }}" class="resig pull-right">SATICI GİRİŞİ</a>-->
                            </li>
                            
                              
                            </ul>                                      
                            </form>
                            </li>
                            @else
                            <li class="topcart"> <a href="{{url('myaccount')}}">Hesabım</a> 

                            </li>
                             <li class="topcart"> <a href="{{url('signout')}}">Çıkış Yap</a> </li>
                            @endif
                            <li class="topcart">
                                        <a href="{{ url('/checkout') }}">Sepet<span class="cart-counts">{{$total_item}}</span></a>
                                        <div class="cartdrop widget_shopping_cart nx-animate animated" style="visibility: visible;">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="cart_list product_list_widget">
                                                @if($cart)
                                                    <table class="cart-table">
                                                    <tbody>
                                                    <?php $helper = new Helper(); ?>
                                                        @foreach($cart as  $item)
                                                        <tr>
                                                            <td width='20%'>
                                                                <!--<a href="{{ url('/removeitem/'.$item->id) }}" class=""><i class="fa fa-times"></i></a>-->
                                                                <a class="cart_quantity_delete" href="{{ url('/removeItem/'.$item->id) }}"><i class="fa fa-times"></i></a>
                                                            </td>
                                                            <td width='40%'>
                                                                <div class="product-content">                                                     
                                                                    <div class="">
                                                                        <h3><a href="{{ url($helper->getProduct($item->id)->url) }}"> {{$item->name}}</a></h3>
                                                                        
                                                                    </div>                                                                    
                                                                </div>
                                                                <span>Satıcı: {{ ($helper->getVendorName($item->id)) ? $helper->getVendorName($item->id) : 'Admin' }}</span>
                                                            </td>
                                                            <td width='40%'>
                                                                <div class="product-media">                                                                 
                                                                    <a href="#">
                                                                        <!--<img src="{{ asset('public/new/images/small-1.png') }}" alt=" ">-->
                                                                        @foreach($product_photo as $key => $photo)
                                    
                                                                            @if($photo->id==$item->id)
                                                                             <img style="width: 100px;height: 100px;" src="{{ asset('storage/uploads/products/'. $photo->photo) }}" alt="">
                                                                             @endif
                                                                         @endforeach
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="product-price">
                                                                         <h5 class="price"> <b>{{$item->qty}} </b> x <b> ₺ {{$item->price}} </b></h5>
                                                                        <!--<a href="{{ url('/removeitem/'.$item->id) }}" class="delete fa fa-close">  </a>-->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        @endforeach
                                                   
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan='3'>
                                                                <div class="sub-total">
                                                                    
                                                                    <span class="amount"> Genel Toplam :  ₺{{$sub_total}} </b> </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                    <div class="chk-out">
                                                        <a href="{{ url('/checkout') }}"><button class="btn default-btn">Çıkış yapmak</button></a>
                                                    </div>
                                                @endif    
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                      </li>
                        </ul>
                    </div>
                    
                    <div class="col-md-7 col-sm-7">
                        <div class="sf_search">
                        
                        <form action="" method = "get">
                              
                          <input class="sf_input" autocomplete="" value="" name="q" type="text">
                          <button class="sf_button searchsubmit" type="submit"><span>Ara</span></button>
                        </form>
                              
                        </div>
                    </div>
                </div>                            
            </div>
            <?php $arr = $helper->getSociallink() ?>
                      
            <div class="social-bar">              
                    <ul class="social">
                    <li class="twitter"><a href="{{ $arr['twitter_id']}}" title="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li> 
                    <li class="facebook"><a href="{{ $arr['fb_id']}}" title="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li> 
                    <li class="skype"><a href="{{ $arr['skype_id']}}" title="skype" target="_blank"><i class="fa fa-skype"></i></a></li> 
                    <li class="googleplus"><a href="{{ $arr['google_id']}}" title="googleplus" target="_blank"><i class="fa fa-google-plus"></i></a></li> 
                    <li class="flickr"><a href="{{ $arr['flicker_id']}}" title="flickr" target="_blank"><i class="fa fa-flickr"></i></a></li> 
                    <li class="youtube"><a href="{{ $arr['youtube_id']}}" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li> 
                    <li class="instagram"><a href="{{ $arr['instagram_id']}}" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li> 
                    <li class="pinterest"><a href="{{ $arr['pinterest_id']}}" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li> 
                    <li class="linkedin"><a href="{{ $arr['linkedin_id']}}" title="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
            </div>
            <header>
                          <div class="page-wrapper">
                              <div class="col-md-4"><a href="{{ url('/') }}" class="logo"><img src="{{ asset('public/new/images/logo-lazimbana.png') }}"></a></div>
                              <div class="col-md-8">
                              <div class="navbar-header">
                                      <button id="menu-toggle" data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                  </div>
                                  <div class="header-icons woocart">
                                      <a href="{{ url('/checkout') }}" class="reversed">
                                          <!--<span class="fa fa-cart-plus"></span>-->
                                            <img src="{{ asset('public/new/images/view_cart.png') }}" height="15px">
                                          <span class="cart-counts">{{$total_item}}</span>  
                                      </a>
                                  </div>
                                  
                                  <div class="navbar-inverse side-collapse in">
                                    
                                      <!--<nav role="navigation" class="navbar-collapse">
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
                                      </nav>-->
                                 </div>

                                <div class="navbar-inverse side-collapse in">
                                    <nav role="navigation" class="navbar-collapse">
                                        <ul class="nav navbar-nav">
                                        
                                        @foreach ($cats as $key => $value)
                                            @if($value['name'] != NULL)
                                                <li><a href="{{ url($value['slug']) }}">{!! ucfirst($value['name']) !!}</a>
                                            @endif
                                            @if(isset($value['child']) && count($value['child'] > 0) && $value['name'] != NULL )
                                                <ul class="dropdown">
                                                    <li class="category_menu_list">
                                                    
                                                        @foreach ($value['child'] as $key => $result)
                                                            @if($result['name'] != NULL)
                                                            <ul onmouseenter="func();">
                                                                <li class="category_title">
                                                                    <a href="{{ url($result['slug']) }}">{!! ucfirst($result['name']) !!}</a></li>
                                                                       @if(isset($result['child']) && count($result['child'] > 0) && $result['name'] != NULL )
                                                                           
                                                                                @foreach ($result['child'] as $key => $menu)
                                                                                    @if($menu['name'] != NULL)
                                                                                        <li>
                                                                                            <a href="{{ url($menu['slug']) }}">{!! ucfirst($menu['name']) !!}</a>
                                                                                                @if(isset($menu['child']) && count($menu['child'] > 0) && $menu['name'] != NULL )
                                                                                                    <ul>
                                                                                                       @foreach ($menu['child'] as $key => $submenu)
                                                                                                            @if($submenu['name'] != NULL)
                                                                                                                <li><a href="{{ url($submenu['slug']) }}">{!! ucfirst($submenu['name']) !!}</a></li>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                @endif
                                                                                        </li>
                                                                                    @endif       
                                                                                @endforeach    
                                                                           
                                                                       @endif
                                                                </li>
                                                            </ul>
                                                            @endif
                                                        @endforeach                                                   
                                                    </li>                                                        
                                                    <li class="category_img_menu"><a href="#"><img src="{{ file_exists(public_path('/new/images/category/'.$value['slug'].'.png')) ? asset('public/new/images/category/'.$value['slug'].'.png') : asset('public/new/images/category/default.png') }}"></a></li>
                                                      
                                                </ul>
                                            @endif
                                            </li>
                                            
                                        @endforeach    
                                        </ul>
                                    </nav>
                                </div>
                                
                            </div>
                        </div>
                      </header>
												<div class="page_title">
                <div class="page-wrapper">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 text-right">
                            <span><a href="#">Home</a> </span>                                            
                            <span> giris-kayit </span>  
                       </div>
                </div>
            </div>
            <div class="account_login">            
                <div class="container">
                    <div class="col-md-6">
                        <h2>Satıcı Girişi</h2>
                         
                          <div class="login-box-body"> 
                            <div class="login-box-msg"> 
                              @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                            @endif
                    
                              {!! Form::model($user, ['url' => ['admin/login'],'class'=>'form-horizontal','files' => true]) !!}
                                @include('packages::auth.form')
                              {!! Form::close() !!}
                    
                          </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <h2>  Satıcı Kayıt Formu </h2>
                         
                          <div class="login-box-body"> 
                             <form class="register-form" action="{{url('admin/registration')}}" method="post" novalidate>
                            
                            <!--<p> Kiþisel bilgilerinizi giriniz: </p>-->               
                            @if(session()->has('message'))                    
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach (session()->get('message') as $error1)
                                            <li>{{ $error1 }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Þehir</label>-->
                                
                                <div class="input-icon">
                                    <select name="vendor_type" id="vendor_type" class="select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" onchange="vendor(this.value)">
                                        <option value="">Satıcı Tipini Seçiniz</option>
                                        <option value="1">Bireysel</option>
                                        <option value="2">Kurumsal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Ad-Soyad</label>-->
                                <div class="input-icon">
                                     
                                    <input class="form-control placeholder-no-fix" type="text" id="full_name" style="display:none;" placeholder="Ad-Soyad" name="full_name" value="{{old('full_name')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Þirket Ýsmi</label>-->
                                <div class="input-icon">                         
                                    <input class="form-control placeholder-no-fix" id="tc_no" style="display:none;" type="text" placeholder="Kimlik No" name="tc_no" value="{{old('tc_no')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Þirket Ýsmi</label>-->
                                <div class="input-icon">                         
                                    <input class="form-control placeholder-no-fix" id="company_name" style="display:none;" type="text" placeholder="Şirket Ünvanı" name="company_name" value="{{old('company_name')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Þirket Ýsmi</label>-->
                                <div class="input-icon">                         
                                    <input class="form-control placeholder-no-fix" id="manager_name" style="display:none;" type="text" placeholder="Yetkili Adı" name="manager_name" value="{{old('manager_name')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                               <!-- <label class="control-label visible-ie8 visible-ie9">Telefon</label>-->
                                <div class="input-icon">
                                    
                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Telefon" name="phone"  value="{{old('phone')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Þirket Ýsmi</label>-->
                                <div class="input-icon">                         
                                    <input class="form-control placeholder-no-fix" id="bank_name"  type="text" placeholder="Banka Adı" name="bank_name" value="{{old('bank_name')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                <!--<label class="control-label visible-ie8 visible-ie9">IBAN No.</label>-->
                                <div class="input-icon">
                                    
                                    <input class="form-control placeholder-no-fix" type="text" placeholder="IBAN No." name="iban"  value="{{old('iban')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Þirket Ýsmi</label>-->
                                <div class="input-icon">                         
                                    <input class="form-control placeholder-no-fix" id="tax_name" style="display:none;" type="text" placeholder="Vergi Dairesi" name="tax_name" value="{{old('tax_name')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Þirket Ýsmi</label>-->
                                <div class="input-icon">                         
                                    <input class="form-control placeholder-no-fix" id="tax_no" style="display:none;" type="text" placeholder="Vergi No." name="tax_no" value="{{old('tax_no')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Address</label>-->
                                <div class="input-icon">
                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Adres" name="address"  value="{{old('address')}}"> </div>
                            </div>
                            
                            <div class="form-group">                                                
                                    <!--<input class="form-control unicase-form-control text-input" id="city" placeholder="" type="text" name="city" value="{{$shipping->city or '' }}">-->
                                    <select class="selectpicker form-control" data-live-search="true" name="city" required>
                                        <option selected="selected" value="">Şehir Seçiniz </option>
                                        
                                        <option data-tokens="Adana" value="Adana">Adana</option>
                                        <option data-tokens="Adıyaman" value="Adıyaman">Adıyaman</option>
                                        <option data-tokens="Afyon" value="Afyon" >Afyon</option>
                                        <option data-tokens="Ağrı" value="Ağrı" >Ağrı</option>
                                        <option data-tokens="Amasya" value="Amasya" >Amasya</option>
                                        <option data-tokens="Ankara" value="Ankara" >Ankara</option>
                                        <option data-tokens="Antalya" value="Antalya" >Antalya</option>
                                        <option data-tokens="Artvin" value="Artvin" >Artvin</option>
                                        <option data-tokens="Aydın" value="Aydın" >Aydın</option>
                                            
                                        <option data-tokens="Balıkesir" value="Balıkesir" >Balıkesir</option>
                                        <option data-tokens="Bilecik" value="Bilecik" >Bilecik</option>
                                        <option data-tokens="Bingöl" value="Bingöl" >Bingöl</option>
                                        <option data-tokens="Bitlis" value="Bitlis" >Bitlis</option>
                                        <option data-tokens="Bolu" value="Bolu" >Bolu</option>
                                        <option data-tokens="Burdur" value="Burdur" >Burdur</option>
                                        <option data-tokens="Bursa" value="Bursa" >Bursa</option>
                                            
                                        <option data-tokens="Çanakkale" value="Çanakkale" >Çanakkale</option>
                                        <option data-tokens="Çankırı" value="Çankırı" >Çankırı</option>
                                        <option data-tokens="Çorum" value="Çorum" >Çorum</option>
                                            
                                        <option data-tokens="Denizli" value="Denizli" >Denizli</option>                                                        
                                        <option data-tokens="Diyarbakır" value="Afyon" >Diyarbakır</option>
                                        <option data-tokens="Edirne" value="Edirne" >Edirne</option>
                                        <option data-tokens="Giresun" value="Giresun" >Giresun</option>
                                            
                                        <option data-tokens="Gümüşhane" value="Gümüşhane" >Gümüşhane</option>
                                        <option data-tokens="Hakkari" value="Hakkari" >Hakkari</option>
                                        <option data-tokens="Hatay" value="Hatay" >Hatay</option>
                                        <option data-tokens="Isparta" value="Isparta" >Isparta</option>
                                        <option data-tokens="Mersin" value="Mersin" >Mersin</option>
                                        <option data-tokens="İstanbul" value="İstanbul" >İstanbul</option>
                                        <option data-tokens="İzmir" value="İzmir" >İzmir</option>
                                        <option data-tokens="Kars" value="Kars" >Kars</option>
                                        <option data-tokens="Kastamonu" value="Kastamonu" >Kastamonu</option>
                                        <option data-tokens="Konya" value="Konya" >Konya</option>
                                        <option data-tokens="Kütahya" value="Kütahya" >Kütahya</option>
                                        <option data-tokens="Malatya" value="Malatya" >Malatya</option>
                                        <option data-tokens="Manisa" value="Manisa" >Manisa</option>
                                        <option data-tokens="Kahramanmaraş" value="Kahramanmaraş" >Kahramanmaraş</option>
                                        <option data-tokens="Mardin" value="Mardin" >Mardin</option>
                                        <option data-tokens="Muğla" value="Muğla" >Muğla</option>
                                        <option data-tokens="Muş" value="Muş" >Muş</option>
                                        <option data-tokens="Nevşehir" value="Nevşehir" >Nevşehir</option>
                                        <option data-tokens="Niğde" value="Niğde" >Niğde</option>
                                        <option data-tokens="Ordu" value="Ordu" >Ordu</option>
                                        <option data-tokens="Rize" value="Rize" >Rize</option>
                                        <option data-tokens="Sakarya" value="Sakarya" >Sakarya</option>
                                        <option data-tokens="Samsun" value="Samsun" >Samsun</option>
                                        <option data-tokens="Siirt" value="Siirt" >Siirt</option>
                                        <option data-tokens="Sinop" value="Sinop" >Sinop</option>
                                        <option data-tokens="Sivas" value="Sivas" >Sivas</option>
                                        <option data-tokens="Tekirdağ" value="Tekirdağ" >Tekirdağ</option>
                                        <option data-tokens="Tokat" value="Tokat" >Tokat</option>
                                        <option data-tokens="Trabzon" value="Trabzon" >Trabzon</option>
                                            
                                        <option data-tokens="Tunceli" value="Tunceli" >Tunceli</option>
                                        <option data-tokens="Şanlıurfa" value="Şanlıurfa" >Şanlıurfa</option>
                                        <option data-tokens="Uşak" value="Uşak" >Uşak</option>
                                        <option data-tokens="Van" value="Van" >Van</option>
                                        <option data-tokens="Yozgat" value="Yozgat" >Yozgat</option>
                                        <option data-tokens="Zonguldak" value="Zonguldak" >Zonguldak</option>
                                        <option data-tokens="Aksaray" value="Aksaray" >Aksaray</option>
                                        <option data-tokens="Bayburt" value="Bayburt" >Bayburt</option>
                                        <option data-tokens="Karaman" value="Karaman" >Karaman</option>
                                        <option data-tokens="Kırıkkale" value="Kırıkkale" >Kırıkkale</option>
                                        <option data-tokens="Batman" value="Batman" >Batman</option>
                                        <option data-tokens="Şırnak" value="Şırnak" >Şırnak</option>
                                        <option data-tokens="Bartın" value="Bartın" >Bartın</option>
                                        <option data-tokens="Ardahan" value="Ardahan" >Ardahan</option>
                                        <option data-tokens="Iğdır" value="Iğdır" >Iğdır</option>
                                        <option data-tokens="Yalova" value="Yalova" >Yalova</option>
                                        <option data-tokens="Karabük" value="Karabük" >Karabük</option>
                                        <option data-tokens="Kilis" value="Kilis" >Kilis</option>
                                        <option data-tokens="Osmaniye" value="Osmaniye" >Osmaniye</option>
                                        <option data-tokens="Düzce" value="Düzce" >Düzce</option>
                                        <option data-tokens="Diğer" value="Diğer" >Diğer</option>
                                        
                                        
                                    </select>
                                </div>
                            <!--<p> <b> Hesap ayrýntýlarýnýzý giriniz: </b> </p>-->
                             <div class="form-group">
                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                              <!--  <label class="control-label visible-ie8 visible-ie9">E-posta</label>-->
                                <div class="input-icon">
                                    
                                    <input class="form-control placeholder-no-fix" type="text" placeholder="E-posta" name="email"  value="{{old('email')}}"> </div>
                            </div>
            
                            <div class="form-group">
                               <!-- <label class="control-label visible-ie8 visible-ie9">Þifre</label>-->
                                <div class="input-icon">
                                     
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Şifre" name="password"  value="{{old('password')}}"> </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label visible-ie8 visible-ie9">Re-type Your Þifre</label>-->
                                <div class="controls">
                                    <div class="input-icon">
                                         
                                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Şifre (Tekrar)" name="password_confirmation"  value="{{old('password_confirmation')}}"> </div>
                                </div>
                            </div>
                           
                            
                            <div class="form-actions">
                                <button type="submit" id="register-submit-btn" class="btn btn-primary btn-block btn-flat"> KAYDOL </button>
                               <!--<a href="{{url('admin')}}" class="link"> Giriþ </a>-->
                                
                            </div>
                        </form>
                    
                          </div>
                    </div>
                    
                    </div>
                </div>
<footer>
      <div class="page-wrapper">
          <div class="col-md-3">
              <h3>Kurumsal</h3>
              <ul>
                  <!--<li class="fiRSt"><a title="Your Account" href="{{ url('about') }}">Hakkımızda</a></li>
                    <li><a title="Information" href="{{ url('privacy-policy') }}">Gizlilik Politikası</a></li>
                    <li><a title="Addresses" href="{{ url('delivery-and-returns') }}">Teslimat ve iadeler</a></li>
                    <li><a title="Addresses" href="{{ url('distance-sales-contract') }}">Mesafeli Satış Sözleşmesi</a></li>
                    <li><a title="Blog" href="{{ url('blogs') }}">Blog</a></li>-->
                     <?php $pagelink = $helper->getPages(); ?>
                    
                    <li class="fiRSt"><a title="Your Account" href="{{ url('/Hakkimizda') }}">Hakkımızda</a></li>
                    <li><a title="Information" href="{{ url('/Gizlilik-Politikası') }}">Gizlilik Politikası</a></li>
                    <li><a title="Addresses" href="{{ url('/Teslimat-Ve-Iadeler') }}">Teslimat ve iadeler</a></li>
                    <li><a title="Addresses" href="{{ url('/Mesafeli-Satış-Sözleşmesi') }}">Mesafeli Satış Sözleşmesi</a></li>
                    <li><a title="Blog" href="{{ url('blog') }}">Blog</a></li>
              </ul>
          </div>
          <div class="col-md-3">
              <h3>Müşteri Hizmetleri</h3>
              <ul>
                 <li class="fiRSt"><a href="{{ url('hesabim') }}" title="Contact us">Hesabım</a></li>
                 <li><a href="{{ url('hesabim') }}" title="About us">Sipariş Geçmişi</a></li>
                 <li><a href="{{url('SSS')}}" title="faq">SSS</a></li> 
                 <!--<li class="last"><a href="{{ url('contact') }}" title="Where is my order?">Yardım Merkezi</a></li>-->
                 <li class="last"><a href="{{ url('/Yardım-Merkezi') }}" title="Where is my order?">Yardım Merkezi</a></li>
              </ul>
          </div>
          <div class="col-md-3">
              <h3>Bize Ulaşın</h3>
              @if ($errors->has('successMsgcontact'))
                    <span class="btn btn-success">{{ $errors->first('successMsgcontact') }} </span>
                     
                @endif
               <form method="post" action="{{ url('/contactus') }}">
                    <ul>
                        <li><input type="text" class="footer_input" name="name" placeholder="Adınız (Gerekli)" required></li>
                        <li><input type="text" class="footer_input" name="email" placeholder="Eposta Adresiniz (Gerekli)" required></li>
                        <li><textarea placeholder="Mesajınız" name="message" class="footer_textarea" required></textarea></li>
                        <li><input type="submit" value="Gönder" class="submit-btn"></li>
                    </ul>
                </form> 
          </div>                            
      </div>  
</footer>      
      <div class="bottom_footer" id="bottom">
        <div class="page-wrapper">
            <div class="col-md-5"><p>Lazimbana.com Tüm hakları saklıdır..</p></div>
            <div class="col-md-7">
                <div class="footer_link pull-right">
                    <a href="{{ url('/Hakkimizda') }}">Hakkımızda</a>
                    <a href="{{ url('/Yardım-Merkezi') }}">Yardým</a>
                    <a href="{{ url('/Yardım-Merkezi') }}">Ýletiþim</a>
                </div>
               
            </div>
        </div>
      </div>  
            </div>            
    </div>
</div>
    <!-- jQuery 2.1.4 -->
      <script src="{{ URL::asset('public/assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
      <script src="{{ URL::asset('public/assets/js/jquery.validate.js') }}"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="{{ URL::asset('public/assets/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- iCheck -->
      <script src="{{ URL::asset('public/assets/plugins/iCheck/icheck.min.js') }}"></script>
       <script src="{{ URL::asset('public/assets/plugins/iCheck/datepicker.js') }}"></script>  
      <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
     <script src="{{ URL::asset('public/assets/js/common.js') }}"></script>
     <script type="text/javascript">
        var email_req = '{{ Lang::get('admin-lang.email_req') }}';
        var password_req = '{{ Lang::get('admin-lang.password_req') }}';
     </script>
     <script>
        function vendor(type){
        //alert(type);
            if(type == 1){
                $('#company_name').hide();
                $('#manager_name').hide();
                $('#tax_name').hide();
                $('#tax_no').hide();
                $('#full_name').show();
                $('#tc_no').show();
            }
            if(type == 2){
                $('#company_name').show();
                $('#manager_name').show();
                $('#tax_name').show();
                $('#tax_no').show();
                $('#full_name').hide();
                $('#tc_no').hide();
            }
        }
     </script>
        <script src="{{ asset('public/new/js/bootstrap-select.min.js') }}"></script>
            <script>
        $('.selectpicker').selectpicker({
  style: 'btn',
  size: 4,
});
</script>
  </body>
</html>