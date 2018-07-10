
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 

            @include('partials.breadcrumb')
            <!-- Left side column. contains the logo and sidebar -->
            <div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
 

 @if($userData==null)                       <!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

    <!-- panel-heading -->
        <div class="panel-heading">
        <h4 class="unicase-checkout-title"> 
            <a  data-toggle="collapse" class="{{ ($tab==0)?'':'collapse'}}"  data-parent="#accordion" href="index.htm#collapseOne">
              <span># </span>Ödeme Yöntemi
            </a>
         </h4>
    </div>
    <!-- panel-heading -->

    <div id="collapseOne" class="panel-collapse collapse {{ ($tab==0)?'in':''}}">

        <!-- panel-body  -->
        <div class="panel-body">
            <div class="row">       

                <!-- guest-login -->            
                <div class="col-md-6 col-sm-6 guest-login">
                    <h4 class="checkout-subtitle">Misafir veya Kayıt Giriş</h4>
                    <p class="text title-tag-line">Gelecekteki kolaylıklar için bize kaydolun:</p>

                    <!-- radio-form  -->
                    <form class="register-form" role="form">
                        <div class="radio radio-checkout-unicase">  
                            <input id="guest" name="text" value="konuk" checked="" type="radio">  
                          <!--   <label class="radio-button guest-check" for="guest">Checkout as Guest</label>  
                              <br> -->
                            <input id="register" name="text" value="kayıt olmak" type="radio" checked="checked">  
                            <label class="radio-button" for="register">Kayıt olmak</label>  
                        </div>  
                    </form>
                    <!-- radio-form  -->

                    <h4 class="checkout-subtitle outer-top-vs">Kayıt ol ve zaman kazan</h4>
                    <p class="text title-tag-line ">Gelecekteki kolaylıklar için bize kaydolun:</p>
                    
                    <ul class="text instruction inner-bottom-30">
                        <li class="save-time-reg">- Hızlı ve kolay kontrol</li>
                        <li>- Sipariş geçmişinize ve durumunuza kolay erişim</li>
                    </ul>
                     <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="index.htm#collapseTwo2">
                    <button   type="button" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Devam et</button> </a>
                </div>
                <!-- guest-login -->

                <!-- already-registered-login -->
                <div class="col-md-6 col-sm-6 already-registered-login">
                    <h4 class="checkout-subtitle">Zaten kayıtlı?</h4> 

                       <form method="POST" action="{{ url('Ajaxlogin') }}"  class="form-horizontal" role="form" id="loginForm">
                        {!! csrf_field() !!}
                        <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Adres <span>*</span></label>
                        <input class="form-control unicase-form-control text-input" name="email" id="exampleInputEmail1" placeholder="" type="email">
                      </div>
                      <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Parola <span>*</span></label>
                        <input class="form-control unicase-form-control text-input" name="password" id="exampleInputPassword1" placeholder="" type="password">
                        <a href="index.htm#" class="forgot-password">Parolanızı mı unuttunuz?</a>
                      </div>
                      <button type="button"  class="btn-upper btn btn-primary checkout-page-button"  onclick="loginBtn()">Oturum aç</button>
                      <span id="loginError" style="padding: 5px; color: red"></span>
                    </form>
                </div>  
                <!-- already-registered-login -->       

            </div>          
        </div>
        <!-- panel-body  -->

    </div><!-- row -->
</div>

  <div class="panel panel-default checkout-step-022 closeREG" id="register">
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="collapsed" id="collapseTwo22" data-parent="#accordion" href="index.htm#collapseTwo2">
                                    <span>#</span>kayıt
                                </a>
                            </h4>
                    </div>

                        <div id="collapseTwo2" class="panel-collapse collapse">
                            <div class="panel-body">
                                    <div class="col-md-6 col-sm-6 already-registered-login"> 
                                        <form class="register-form" role="form" id="register">
                                              {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">İsim <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" type="text" name="first_name">
                                            </div> 

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Soyadı <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" type="text" name="last_name">
                                            </div> 

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Email Adres <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" type="email" name="email">
                                            </div>
                                          <div class="form-group">
                                            <label class="info-title" for="exampleInputPassword1">Parola <span>*</span></label>
                                            <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" name="password" type="password">
                                             
                                          </div>

                                          <div class="form-group">
                                            <label class="info-title" for="exampleInputPassword1">Şifreyi Onayla <span>*</span></label>
                                            <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" name="confirm_password" type="password">
                                             
                                          </div> 
                                          
                                          <button type="button" onclick="signUp()"  class="btn-upper btn btn-primary checkout-page-button">Devam et</button> 

                                        </form>
                                        <span id="regErr" style="color: red"></span>
                                    </div>  
                            </div>
                        </div>
                    </div>
@endif
<!-- checkout-step-01  -->
                        <!-- checkout-step-02  -->

                  
                   

                    <div class="panel panel-default checkout-step-02">
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="{{($tab==1)?'':'collapsed'}}"  id="" data-parent="#accordion" href="#collapseTwo" id="collapsed_biling">
                                    <span>#</span>Fatura bilgileri
  
                                </a>
                            </h4> 
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse {{($tab==1)?'in':''}}">
                            <div class="panel-body">
                                     <div class="col-md-6 col-sm-6 already-registered-login"> 
                                        <form method="post" class="register-form" role="form" id="billing" action="{{route('billing')}}"> 
                                              {!! csrf_field() !!}
                                              <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">isim <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="name" placeholder="" value="{{$billing->name or ''}}" type="text" name="name" required="required">
                                            </div> 

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Email Addres <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" value="{{$billing->email or ''}}" type="email" name="email" required="required">
                                            </div>
                                          <div class="form-group">
                                            <label class="info-title" for="exampleInputPassword1">Telefon/seyyar <span>*</span></label>
                                            <input class="form-control unicase-form-control text-input" name="mobile" id="mobile" placeholder="" value="{{$billing->mobile or ''}}" type="text">
                                             
                                          </div> 

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1"> Addres
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" value="{{$billing->address1 or ''}}"  name="address1" type="text"> 
                                            </div>
                                                   
                                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button" onclick="billing()">Devam et</button> 
                                        </form>
                                    </div>  
                            </div>
                        </div>
                    </div> 

                        <!-- checkout-step-02  -->

                        <!-- checkout-step-03  -->
                        <div class="panel panel-default checkout-step-03">
                            <div class="panel-heading">
                              <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="{{($tab==2)?'':'collapsed'}}" id="collapse_three" data-parent="#accordion" href="index.htm#collapseThree">
                                    <span>#</span>Nakliye Bilgisi
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse {{($tab==2)?'in':''}}">
                              <div class="panel-body">
                                   <div class="col-md-6 col-sm-6 already-registered-login" id="shopping"> 
                                        <form method="post" class="register-form" role="form" id="billing" action="{{route('shipping')}}">  
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">isim <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="name" placeholder="" value="{{$shipping->name or ''}}" type="text" name="name" required="required">
                                            </div> 

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Email Addres <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" value="{{$shipping->email or ''}}" type="email" name="email" required="required">
                                            </div>
                                          <div class="form-group">
                                            <label class="info-title" for="exampleInputPassword1">Telefon/seyyar <span>*</span></label>
                                            <input class="form-control unicase-form-control text-input" name="mobile" id="mobile" placeholder="" value="{{$shipping->mobile or ''}} "type="text">
                                             
                                          </div>

                                            <div class="form-group">
                                                <label class="info-title" for="zip_code"> PIN Kodu
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="zip_code" placeholder=""  value="{{$shipping->zip_code or '' }}" name="zip_code" type="text">  
                                            </div>


                                            <div class="form-group">
                                                <label class="info-title" for="city"> Kent
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="city" placeholder="" type="text" name="city" value="{{$shipping->city or '' }}"> 
                                            </div>
 

                                            <div class="form-group">
                                                <label class="info-title" for="state"> Belirtmek, bildirmek

                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="state" placeholder="state" value="{{$shipping->state or ''}}" name="state" type="text"> 
                                            </div>


                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1"> Addres1
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" value="{{$shipping->address1 or '' }}"" type="text" name="address1"> 
                                            </div>

                                               <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1"> Addres2
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" value="{{$shipping->address2 or '' }}"" type="text" name="address2"> 
                                            </div>
                                    
                                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Devam et</button>
                                        </form>
                                    </div>  
                              </div>
                            </div>
                        </div>
                        <!-- checkout-step-03  -->

                        <!-- checkout-step-04  -->
                        <div class="panel panel-default checkout-step-04">
                            <div class="panel-heading">
                              <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="{{($tab==3)?'':'collapsed'}}" data-parent="#accordion" href="index.htm#collapseFour">
                                    <span>#</span>Nakliye Yöntemi
                                </a>
                              </h4> 
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse {{($tab==3)?'in':''}}">
                                <div class="panel-body">
                                  <div class="col-md-6 col-sm-6 already-registered-login"> 
                                        <form method="post" class="register-form" role="form" id="billing" action="{{route('shippingMethod')}}">  
                                            {!! csrf_field() !!}
                                            
                                            <div class="form-group"> 
                                                <input class="form-control  " id="cod" placeholder="" type="hidden" value="cod">Kapıda ödeme
                                            </div> 
                                         <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="index.htm#collapseSix">
                                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Devam et</button></a>
                                        </form>
                                    </div>  
                                </div>
                            </div>
                        </div> 

                        <!-- checkout-step-06  -->
                        <div class="panel panel-default checkout-step-06">
                            <div class="panel-heading">
                              <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="index.htm#collapseSix">
                                    <span>#</span>Sipariş İnceleme
                                </a>
                              </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                            <div class="">
                        <div class="shopping-cart">
                            <div class="shopping-cart-table ">
                                <div class="table-responsive">
                                 @if(count($cart))
                                    <table class="table">
                                        <thead>
                                                <tr>
                                            <th class="cart-product-name item">Ürün adı</th>
                                            <th class="cart-edit item">Fiyat</th>
                                            <th class="cart-qty item">miktar</th>
                                            <th class="cart-sub-total item">ara toplam</th> 
                                        </tr>
                                        </thead><!-- /thead -->
                              
                                     <tbody>
                                        @foreach($cart as  $item)
                                        <tr> 
                                            <td class="cart_description">
                                                    <h4><a href="">{{$item->name}}</a></h4> 
                                            </td>
                                            <td class="cart_price">
                                                <p>$ {{$item->price}}</p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    {{$item->qty}} 
                                                    
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">$ {{ money_format('%!i', $item->subtotal) }}</p>
                                            </td>  
                                        </tr> 
                                        @endforeach
                                    @else
                                <p>Alışveriş sepetinizde ürün yok</p>
                                @endif
                                </tbody>
                            </table><!-- /table -->
                        </div>
                        <hr>
                    </div><!-- /.shopping-cart-table -->                
                   
 

                        <div class="col-md-12 col-sm-12 cart-shopping-total">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="cart-sub-total">
                                                <span class="inner-left-md">ara toplam $ {{$sub_total}} </span>
                                            </div>
                                            <div class="cart-grand-total">
                                                <span class="inner-left-md">Genel Toplam $ {{$sub_total}} </span>
                                            </div>
                                             <div class="cart-grand-total">
                                             <br><br>
                                               <a href="{{url('orderSuccess')}}" class="btn btn-primary">Sipariş Vermek</a>
                                            </div>
                                        </th>
                                    </tr>
                                </thead><!-- /thead -->

                            </table><!-- /table -->
                        </div><!-- /.cart-shopping-total -->            
                    </div><!-- /.shopping-cart -->
                </div> <!-- /.row -->
                                </div>
                            </div>
                        </div>
                        <!-- checkout-step-06  -->
                        
                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                <div class="checkout-progress-sidebar ">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title"> 
                                    <a data-toggle="collapse" class="" data-parent="#accordion" aria-expanded="true">
                                      <span># </span>Ödeme Yöntemi
                                    </a>
                                 </h4>
                            </div>
                            <div class="">
                                <ul class="nav nav-checkout-progress list-unstyled" style="padding: 5px;"> 
                                 <li> Toplam tutar  :  {{ $sub_total }} <li><br>
                                  <li> Toplam madde :  {{ $total_item }} </li> <br>
                               
                                </ul>  
                                 <a href="{{url('/')}}" class="btn btn-success">Alışverişe devam</a> 
                                  <a href="{{url('orderSuccess')}}" class="btn btn-primary">Sipariş Vermek</a>   
                                        
                            </div>
                        </div>
                    </div>
                </div> 
<!-- checkout-progress-sidebar -->              </div>
            </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
        </div>

            
    @stop

    <style type="text/css">
        .unicase-checkout-title{
            background: #ccc;
        }
    </style>

