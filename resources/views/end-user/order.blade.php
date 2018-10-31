
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
              <span># </span>Üye Giriş/Kayıt
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
                    <h4 class="checkout-subtitle">Kayıt Ol veya Giriş Yap</h4>
                    <p class="text title-tag-line">Gelecekteki kolaylıklar için bize kaydolun:</p>

                    <!-- radio-form  -->
                    <form class="register-form" role="form">
                        <div class="radio radio-checkout-unicase">  
                            <input id="guest" name="text" value="konuk" checked="" type="radio">  
                          <!--   <label class="radio-button guest-check" for="guest">Checkout as Guest</label>  
                              <br> -->
                            <input id="registers" name="text" value="kayıt olmak" type="radio" checked="checked">  
                            <label class="radio-button" for="registers">Üye Ol</label>  
                        </div>  
                    </form>
                    <!-- radio-form  -->

                    <h4 class="checkout-subtitle outer-top-vs">Üyemiz Olun ve Zaman Kazanın</h4>
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
                    <h4 class="checkout-subtitle">Zaten Üyemiz Misiniz?</h4> 

                       <form method="POST" action="{{ url('Ajaxlogin') }}"  class="form-horizontal" role="form" id="loginForm">
                        {!! csrf_field() !!}
                        <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Eposta Adresiniz <span>*</span></label>
                        <input class="form-control unicase-form-control text-input" name="email" id="exampleInputEmail1" placeholder="" type="email">
                      </div>
                      <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Şifreniz <span>*</span></label>
                        <input class="form-control unicase-form-control text-input" name="password" id="exampleInputPassword1" placeholder="" type="password">
                        <a href="index.htm#" class="forgot-password">Şifreniznızı mı unuttunuz?</a>
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
                                                <label class="info-title" for="exampleInputEmail1">Adınız <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" type="text" name="first_name">
                                            </div> 

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Soyadınız <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" type="text" name="last_name">
                                            </div> 

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Eposta Adresiniz <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="" type="email" name="email">
                                            </div>
                                          <div class="form-group">
                                            <label class="info-title" for="exampleInputPassword1">Şifreniz <span>*</span></label>
                                            <input class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="" name="password" type="password">
                                             
                                          </div>

                                          <div class="form-group">
                                            <label class="info-title" for="exampleInputPassword1">Şifre (Tekrar) <span>*</span></label>
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
                                    <span>#</span>Fatura Bilgileri
  
                                </a>
                            </h4> 
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse {{($tab==1)?'in':''}}">
                            <div class="panel-body">
                                     <div class="col-md-6 col-sm-6 already-registered-login"> 
                                        <form method="post" class="register-form" role="form" id="billing" action="{{route('billing')}}"> 
                                              {!! csrf_field() !!}
                                            
                                            <div class="form-group">
                                                <label class="info-title" for="name">İsminiz (Ad/Soyad) <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="name" placeholder="" value="{{$billing->name or ''}}" type="text" name="name" required="required">
                                            </div>
                                                
                                            <div class="form-group">
                                                <label class="info-title" for="company_name">Firma Adı <span></span></label>
                                                <input class="form-control unicase-form-control text-input" id="company_name" placeholder="" value="{{$billing->company_name or ''}}" type="text" name="company_name" onchange="show_tax();">
                                            </div>
                                            
                                            <div class="form-group" id="tax1" style="display:none">
                                                <label class="info-title" for="tax1">Vergi Dairesi <span></span></label>
                                                <input class="form-control unicase-form-control text-input"  placeholder="" value="{{$billing->tax1 or ''}}" type="text" name="tax1" >
                                            </div>
                                                
                                            <div class="form-group" id="tax2" style="display:none">
                                                <label class="info-title" for="tax12">Vergi No. <span></span></label>
                                                <input class="form-control unicase-form-control text-input"  placeholder="" value="{{$billing->tax2 or ''}}" type="text" name="tax2" >
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="email">Email Adres <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="email" placeholder="" value="{{$billing->email or ''}}" type="email" name="email" required="required">
                                            </div>
                                          <div class="form-group">
                                            <label class="info-title" for="mobile">Telefon (Mobil/Sabit) <span>*</span></label>
                                            <input class="form-control unicase-form-control text-input" name="mobile" id="mobile" placeholder="" value="{{$billing->mobile or ''}} "type="text" required>
                                             
                                          </div>

                                            <div class="form-group">
                                                <label class="info-title" for="zip_code"> Posta Kodu
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="zip_code" placeholder=""  value="{{$billing->zip_code or '' }}" name="zip_code" type="text" required>  
                                            </div>


                                            <div class="form-group">
                                                <label class="info-title" for="city"> Şehir
                                                <span>*</span></label>
                                                <!--<input class="form-control unicase-form-control text-input" id="city" placeholder="" type="text" name="city" value="{{$shipping->city or '' }}">-->
                                                <select class="selectpicker form-control" data-live-search="true" name="city" required>
                                                    <option selected="selected" value="">Şehir Seçiniz </option>
                                                    
                                                    <option data-tokens="Adana" {{ ( isset($billing) && $billing->city == 'Adana') ? 'selected' : '' }} value="Adana">Adana</option>
                                                    <option data-tokens="Adıyaman" {{ ( isset($billing) && $billing->city == 'Adıyaman') ? 'selected' : '' }} value="Adıyaman">Adıyaman</option>
                                                    <option data-tokens="Afyon" {{ ( isset($billing) && $billing->city == 'Afyon') ? 'selected' : '' }} value="Afyon" >Afyon</option>
                                                    <option data-tokens="Ağrı" {{ ( isset($billing) && $billing->city == 'Ağrı') ? 'selected' : '' }} value="Ağrı" >Ağrı</option>
                                                    <option data-tokens="Amasya" {{ ( isset($billing) && $billing->city == 'Amasya') ? 'selected' : '' }} value="Amasya" >Amasya</option>
                                                    <option data-tokens="Ankara" {{ ( isset($billing) && $billing->city == 'Ankara') ? 'selected' : '' }} value="Ankara" >Ankara</option>
                                                    <option data-tokens="Antalya" {{ ( isset($billing) && $billing->city == 'Antalya') ? 'selected' : '' }} value="Antalya" >Antalya</option>
                                                    <option data-tokens="Artvin" {{ ( isset($billing) && $billing->city == 'Artvin') ? 'selected' : '' }} value="Artvin" >Artvin</option>
                                                    <option data-tokens="Aydın" {{ ( isset($billing) && $billing->city == 'Aydın') ? 'selected' : '' }} value="Aydın" >Aydın</option>
                                                        
                                                    <option data-tokens="Balıkesir" {{ ( isset($billing) && $billing->city == 'Balıkesir') ? 'selected' : '' }} value="Balıkesir" >Balıkesir</option>
                                                    <option data-tokens="Bilecik" {{ ( isset($billing) && $billing->city == 'Bilecik') ? 'selected' : '' }} value="Bilecik" >Bilecik</option>
                                                    <option data-tokens="Bingöl" {{ ( isset($billing) && $billing->city == 'Bingöl') ? 'selected' : '' }} value="Bingöl" >Bingöl</option>
                                                    <option data-tokens="Bitlis" {{ ( isset($billing) && $billing->city == 'Bitlis') ? 'selected' : '' }} value="Bitlis" >Bitlis</option>
                                                    <option data-tokens="Bolu" {{ ( isset($billing) && $billing->city == 'Bolu') ? 'selected' : '' }} value="Bolu" >Bolu</option>
                                                    <option data-tokens="Burdur" {{ ( isset($billing) && $billing->city == 'Burdur') ? 'selected' : '' }} value="Burdur" >Burdur</option>
                                                    <option data-tokens="Bursa" {{ ( isset($billing) && $billing->city == 'Bursa') ? 'selected' : '' }} value="Bursa" >Bursa</option>
                                                        
                                                    <option data-tokens="Çanakkale" {{ ( isset($billing) && $billing->city == 'Çanakkale') ? 'selected' : '' }} value="Çanakkale" >Çanakkale</option>
                                                    <option data-tokens="Çankırı" {{ ( isset($billing) && $billing->city == 'Çankırı') ? 'selected' : '' }} value="Çankırı" >Çankırı</option>
                                                    <option data-tokens="Çorum" {{ ( isset($billing) && $billing->city == 'Çorum') ? 'selected' : '' }} value="Çorum" >Çorum</option>
                                                        
                                                    <option data-tokens="Denizli" {{ ( isset($billing) && $billing->city == 'Denizli') ? 'selected' : '' }} value="Denizli" >Denizli</option>                                                        
                                                    <option data-tokens="Diyarbakır" {{ ( isset($billing) && $billing->city == 'Afyon') ? 'selected' : '' }} value="Afyon" >Diyarbakır</option>
                                                    <option data-tokens="Edirne" {{ ( isset($billing) && $billing->city == 'Edirne') ? 'selected' : '' }} value="Edirne" >Edirne</option>
                                                    <option data-tokens="Giresun" {{ ( isset($billing) && $billing->city == 'Giresun') ? 'selected' : '' }} value="Giresun" >Giresun</option>
                                                        
                                                    <option data-tokens="Gümüşhane" {{ ( isset($billing) && $billing->city == 'Gümüşhane') ? 'selected' : '' }} value="Gümüşhane" >Gümüşhane</option>
                                                    <option data-tokens="Hakkari" {{ ( isset($billing) && $billing->city == 'Hakkari') ? 'selected' : '' }} value="Hakkari" >Hakkari</option>
                                                    <option data-tokens="Hatay" {{ ( isset($billing) && $billing->city == 'Hatay') ? 'selected' : '' }} value="Hatay" >Hatay</option>
                                                    <option data-tokens="Isparta" {{ ( isset($billing) && $billing->city == 'Isparta') ? 'selected' : '' }} value="Isparta" >Isparta</option>
                                                    <option data-tokens="Mersin" {{ ( isset($billing) && $billing->city == 'Mersin') ? 'selected' : '' }} value="Mersin" >Mersin</option>
                                                    <option data-tokens="İstanbul" {{ ( isset($billing) && $billing->city == 'İstanbul') ? 'selected' : '' }} value="İstanbul" >İstanbul</option>
                                                    <option data-tokens="İzmir" {{ ( isset($billing) && $billing->city == 'İzmir') ? 'selected' : '' }} value="İzmir" >İzmir</option>
                                                    <option data-tokens="Kars" {{ ( isset($billing) && $billing->city == 'Kars') ? 'selected' : '' }} value="Kars" >Kars</option>
                                                    <option data-tokens="Kastamonu" {{ ( isset($billing) && $billing->city == 'Kastamonu') ? 'selected' : '' }} value="Kastamonu" >Kastamonu</option>
                                                    <option data-tokens="Konya" {{ ( isset($billing) && $billing->city == 'Konya') ? 'selected' : '' }} value="Konya" >Konya</option>
                                                    <option data-tokens="Kütahya" {{ ( isset($billing) && $billing->city == 'Kütahya') ? 'selected' : '' }} value="Kütahya" >Kütahya</option>
                                                    <option data-tokens="Malatya" {{ ( isset($billing) && $billing->city == 'Malatya') ? 'selected' : '' }} value="Malatya" >Malatya</option>
                                                    <option data-tokens="Manisa" {{ ( isset($billing) && $billing->city == 'Manisa') ? 'selected' : '' }} value="Manisa" >Manisa</option>
                                                    <option data-tokens="Kahramanmaraş" {{ ( isset($billing) && $billing->city == 'Kahramanmaraş') ? 'selected' : '' }} value="Kahramanmaraş" >Kahramanmaraş</option>
                                                    <option data-tokens="Mardin" {{ ( isset($billing) && $billing->city == 'Mardin') ? 'selected' : '' }} value="Mardin" >Mardin</option>
                                                    <option data-tokens="Muğla" {{ ( isset($billing) && $billing->city == 'Muğla') ? 'selected' : '' }} value="Muğla" >Muğla</option>
                                                    <option data-tokens="Muş" {{ ( isset($billing) && $billing->city == 'Muş') ? 'selected' : '' }} value="Muş" >Muş</option>
                                                    <option data-tokens="Nevşehir" {{ ( isset($billing) && $billing->city == 'Nevşehir') ? 'selected' : '' }} value="Nevşehir" >Nevşehir</option>
                                                    <option data-tokens="Niğde" {{ ( isset($billing) && $billing->city == 'Niğde') ? 'selected' : '' }} value="Niğde" >Niğde</option>
                                                    <option data-tokens="Ordu" {{ ( isset($billing) && $billing->city == 'Ordu') ? 'selected' : '' }} value="Ordu" >Ordu</option>
                                                    <option data-tokens="Rize" {{ ( isset($billing) && $billing->city == 'Rize') ? 'selected' : '' }} value="Rize" >Rize</option>
                                                    <option data-tokens="Sakarya" {{ ( isset($billing) && $billing->city == 'Sakarya') ? 'selected' : '' }} value="Sakarya" >Sakarya</option>
                                                    <option data-tokens="Samsun" {{ ( isset($billing) && $billing->city == 'Samsun') ? 'selected' : '' }} value="Samsun" >Samsun</option>
                                                    <option data-tokens="Siirt" {{ ( isset($billing) && $billing->city == 'Siirt') ? 'selected' : '' }} value="Siirt" >Siirt</option>
                                                    <option data-tokens="Sinop" {{ ( isset($billing) && $billing->city == 'Sinop') ? 'selected' : '' }} value="Sinop" >Sinop</option>
                                                    <option data-tokens="Sivas" {{ ( isset($billing) && $billing->city == 'Sivas') ? 'selected' : '' }} value="Sivas" >Sivas</option>
                                                    <option data-tokens="Tekirdağ" {{ ( isset($billing) && $billing->city == 'Tekirdağ') ? 'selected' : '' }} value="Tekirdağ" >Tekirdağ</option>
                                                    <option data-tokens="Tokat" {{ ( isset($billing) && $billing->city == 'Tokat') ? 'selected' : '' }} value="Tokat" >Tokat</option>
                                                    <option data-tokens="Trabzon" {{ ( isset($billing) && $billing->city == 'Trabzon') ? 'selected' : '' }} value="Trabzon" >Trabzon</option>
                                                        
                                                    <option data-tokens="Tunceli" {{ ( isset($billing) && $billing->city == 'Tunceli') ? 'selected' : '' }} value="Tunceli" >Tunceli</option>
                                                    <option data-tokens="Şanlıurfa" {{ ( isset($billing) && $billing->city == 'Şanlıurfa') ? 'selected' : '' }} value="Şanlıurfa" >Şanlıurfa</option>
                                                    <option data-tokens="Uşak" {{ ( isset($billing) && $billing->city == 'Uşak') ? 'selected' : '' }} value="Uşak" >Uşak</option>
                                                    <option data-tokens="Van" {{ ( isset($billing) && $billing->city == 'Van') ? 'selected' : '' }} value="Van" >Van</option>
                                                    <option data-tokens="Yozgat" {{ ( isset($billing) && $billing->city == 'Yozgat') ? 'selected' : '' }} value="Yozgat" >Yozgat</option>
                                                    <option data-tokens="Zonguldak" {{ ( isset($billing) && $billing->city == 'Zonguldak') ? 'selected' : '' }} value="Zonguldak" >Zonguldak</option>
                                                    <option data-tokens="Aksaray" {{ ( isset($billing) && $billing->city == 'Aksaray') ? 'selected' : '' }} value="Aksaray" >Aksaray</option>
                                                    <option data-tokens="Bayburt" {{ ( isset($billing) && $billing->city == 'Bayburt') ? 'selected' : '' }} value="Bayburt" >Bayburt</option>
                                                    <option data-tokens="Karaman" {{ ( isset($billing) && $billing->city == 'Karaman') ? 'selected' : '' }} value="Karaman" >Karaman</option>
                                                    <option data-tokens="Kırıkkale" {{ ( isset($billing) && $billing->city == 'Kırıkkale') ? 'selected' : '' }} value="Kırıkkale" >Kırıkkale</option>
                                                    <option data-tokens="Batman" {{ ( isset($billing) && $billing->city == 'Batman') ? 'selected' : '' }} value="Batman" >Batman</option>
                                                    <option data-tokens="Şırnak" {{ ( isset($billing) && $billing->city == 'Şırnak') ? 'selected' : '' }} value="Şırnak" >Şırnak</option>
                                                    <option data-tokens="Bartın" {{ ( isset($billing) && $billing->city == 'Bartın') ? 'selected' : '' }} value="Bartın" >Bartın</option>
                                                    <option data-tokens="Ardahan" {{ ( isset($billing) && $billing->city == 'Ardahan') ? 'selected' : '' }} value="Ardahan" >Ardahan</option>
                                                    <option data-tokens="Iğdır" {{ ( isset($billing) && $billing->city == 'Iğdır') ? 'selected' : '' }} value="Iğdır" >Iğdır</option>
                                                    <option data-tokens="Yalova" {{ ( isset($billing) && $billing->city == 'Yalova') ? 'selected' : '' }} value="Yalova" >Yalova</option>
                                                    <option data-tokens="Karabük" {{ ( isset($billing) && $billing->city == 'Karabük') ? 'selected' : '' }} value="Karabük" >Karabük</option>
                                                    <option data-tokens="Kilis" {{ ( isset($billing) && $billing->city == 'Kilis') ? 'selected' : '' }} value="Kilis" >Kilis</option>
                                                    <option data-tokens="Osmaniye" {{ ( isset($billing) && $billing->city == 'Osmaniye') ? 'selected' : '' }} value="Osmaniye" >Osmaniye</option>
                                                    <option data-tokens="Düzce" {{ ( isset($billing) && $billing->city == 'Düzce') ? 'selected' : '' }} value="Düzce" >Düzce</option>
                                                    <option data-tokens="Diğer" {{ ( isset($billing) && $billing->city == 'Diğer') ? 'selected' : '' }} value="Diğer" >Diğer</option>
                                                </select>
                                            </div>
 

                                            <div class="form-group">
                                                <label class="info-title" for="state"> Belirtmek, bildirmek

                                                </label>
                                                <input class="form-control unicase-form-control text-input" id="state" placeholder="state" value="{{$billing->state or ''}}" name="state" type="text"> 
                                            </div>


                                            <div class="form-group">
                                                <label class="info-title" for="address1"> Adres1
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="address1" placeholder="" value="{{$billing->address1 or '' }}"" type="text" name="address1" required> 
                                            </div>

                                               <div class="form-group">
                                                <label class="info-title" for="address1"> Adres2
                                                </label>
                                                <input class="form-control unicase-form-control text-input" id="address1" placeholder="" value="{{$billing->address2 or '' }}"" type="text" name="address2"> 
                                            </div>
                                                
                                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button" >Devam et</button>
                                            <br>
                                           <input type="checkbox"  name="same_billing" <?php if(Session::get('same_address') == 1) { echo "checked"; }?> value="1" >Fatura adresinizden farklı bir adrese mi gönderilsin?
                                        </form>
                                            
                                    </div>  
                            </div>
                        </div>
                    </div> 

                        <!-- checkout-step-02  -->

                        <!-- checkout-step-03  -->
                        
                        <div class="panel panel-default checkout-step-03" id="shipping" <?php if(Session::get('same_address') == 1) { ?>  style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
                            <div class="panel-heading">
                              <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="{{($tab==2)?'':'collapsed'}}" id="collapse_three" data-parent="#accordion" href="index.htm#collapseThree">
                                    <span>#</span>Nakliye Bilgileri
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse {{($tab==2)?'in':''}}">
                              <div class="panel-body">
                                   <div class="col-md-6 col-sm-6 already-registered-login" id="shopping"> 
                                        <form method="post" class="register-form" role="form" id="shipping" action="{{route('shipping')}}">  
                                            {!! csrf_field() !!}
                                            
                                            <div class="form-group">
                                                <label class="info-title" for="name1">İsminiz (Ad/Soyad) <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="name1" placeholder="" value="{{$shipping->name or ''}}" type="text" name="name" required="required">
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label class="info-title" for="company_name1">Firma Adı <span></span></label>
                                                <input class="form-control unicase-form-control text-input" id="company_name1" placeholder="" value="{{$shipping->company_name or ''}}" type="text" name="company_name" onchange="show_tax1();">
                                            </div>
                                            
                                            <div class="form-group" id="tax11" style="display:none">
                                                <label class="info-title" for="exampleInputEmail1">Vergi Dairesi<span></span></label>
                                                <input class="form-control unicase-form-control text-input"  placeholder="" value="{{$shipping->tax1 or ''}}" type="text" name="tax1" >
                                            </div>
                                                
                                            <div class="form-group" id="tax22" style="display:none">
                                                <label class="info-title" for="exampleInputEmail1">Vergi No. <span></span></label>
                                                <input class="form-control unicase-form-control text-input"  placeholder="" value="{{$shipping->tax2 or ''}}" type="text" name="tax2" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="info-title" for="email1">Email Adres <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="email1" placeholder="" value="{{$shipping->email or ''}}" type="email" name="email" required="required">
                                            </div>
                                          <div class="form-group">
                                            <label class="info-title" for="mobile1">Telefon (Mobil/Sabit) <span>*</span></label>
                                            <input class="form-control unicase-form-control text-input" name="mobile" id="mobile1" placeholder="" value="{{$shipping->mobile or ''}} "type="text" required>
                                             
                                          </div>

                                            <div class="form-group">
                                                <label class="info-title" for="zip_code1"> Posta Kodu
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="zip_code1" placeholder=""  value="{{$shipping->zip_code or '' }}" name="zip_code" type="text" required>  
                                            </div>


                                            <div class="form-group">
                                                <label class="info-title" for="city1"> Şehir
                                                <span>*</span></label>
                                                <!--<input class="form-control unicase-form-control text-input" id="city" placeholder="" type="text" name="city" value="{{$shipping->city or '' }}">-->
                                                <select class="selectpicker form-control" data-live-search="true" name="city" required>
                                                    <option selected="selected" value="">Şehir Seçiniz </option>
                                                    
                                                   <option data-tokens="Adana" {{ ( isset($shipping) && $shipping->city == 'Adana') ? 'selected' : '' }} value="Adana">Adana</option>
                                                    <option data-tokens="Adıyaman" {{ ( isset($shipping) && $shipping->city == 'Adıyaman') ? 'selected' : '' }} value="Adıyaman">Adıyaman</option>
                                                    <option data-tokens="Afyon" {{ ( isset($shipping) && $shipping->city == 'Afyon') ? 'selected' : '' }} value="Afyon" >Afyon</option>
                                                    <option data-tokens="Ağrı" {{ ( isset($shipping) && $shipping->city == 'Ağrı') ? 'selected' : '' }} value="Ağrı" >Ağrı</option>
                                                    <option data-tokens="Amasya" {{ ( isset($shipping) && $shipping->city == 'Amasya') ? 'selected' : '' }} value="Amasya" >Amasya</option>
                                                    <option data-tokens="Ankara" {{ ( isset($shipping) && $shipping->city == 'Ankara') ? 'selected' : '' }} value="Ankara" >Ankara</option>
                                                    <option data-tokens="Antalya" {{ ( isset($shipping) && $shipping->city == 'Antalya') ? 'selected' : '' }} value="Antalya" >Antalya</option>
                                                    <option data-tokens="Artvin" {{ ( isset($shipping) && $shipping->city == 'Artvin') ? 'selected' : '' }} value="Artvin" >Artvin</option>
                                                    <option data-tokens="Aydın" {{ ( isset($shipping) && $shipping->city == 'Aydın') ? 'selected' : '' }} value="Aydın" >Aydın</option>
                                                        
                                                    <option data-tokens="Balıkesir" {{ ( isset($shipping) && $shipping->city == 'Balıkesir') ? 'selected' : '' }} value="Balıkesir" >Balıkesir</option>
                                                    <option data-tokens="Bilecik" {{ ( isset($shipping) && $shipping->city == 'Bilecik') ? 'selected' : '' }} value="Bilecik" >Bilecik</option>
                                                    <option data-tokens="Bingöl" {{ ( isset($shipping) && $shipping->city == 'Bingöl') ? 'selected' : '' }} value="Bingöl" >Bingöl</option>
                                                    <option data-tokens="Bitlis" {{ ( isset($shipping) && $shipping->city == 'Bitlis') ? 'selected' : '' }} value="Bitlis" >Bitlis</option>
                                                    <option data-tokens="Bolu" {{ ( isset($shipping) && $shipping->city == 'Bolu') ? 'selected' : '' }} value="Bolu" >Bolu</option>
                                                    <option data-tokens="Burdur" {{ ( isset($shipping) && $shipping->city == 'Burdur') ? 'selected' : '' }} value="Burdur" >Burdur</option>
                                                    <option data-tokens="Bursa" {{ ( isset($shipping) && $shipping->city == 'Bursa') ? 'selected' : '' }} value="Bursa" >Bursa</option>
                                                        
                                                    <option data-tokens="Çanakkale" {{ ( isset($shipping) && $shipping->city == 'Çanakkale') ? 'selected' : '' }} value="Çanakkale" >Çanakkale</option>
                                                    <option data-tokens="Çankırı" {{ ( isset($shipping) && $shipping->city == 'Çankırı') ? 'selected' : '' }} value="Çankırı" >Çankırı</option>
                                                    <option data-tokens="Çorum" {{ ( isset($shipping) && $shipping->city == 'Çorum') ? 'selected' : '' }} value="Çorum" >Çorum</option>
                                                        
                                                    <option data-tokens="Denizli" {{ ( isset($shipping) && $shipping->city == 'Denizli') ? 'selected' : '' }} value="Denizli" >Denizli</option>                                                        
                                                    <option data-tokens="Diyarbakır" {{ ( isset($shipping) && $shipping->city == 'Afyon') ? 'selected' : '' }} value="Afyon" >Diyarbakır</option>
                                                    <option data-tokens="Edirne" {{ ( isset($shipping) && $shipping->city == 'Edirne') ? 'selected' : '' }} value="Edirne" >Edirne</option>
                                                    <option data-tokens="Giresun" {{ ( isset($shipping) && $shipping->city == 'Giresun') ? 'selected' : '' }} value="Giresun" >Giresun</option>
                                                        
                                                    <option data-tokens="Gümüşhane" {{ ( isset($shipping) && $shipping->city == 'Gümüşhane') ? 'selected' : '' }} value="Gümüşhane" >Gümüşhane</option>
                                                    <option data-tokens="Hakkari" {{ ( isset($shipping) && $shipping->city == 'Hakkari') ? 'selected' : '' }} value="Hakkari" >Hakkari</option>
                                                    <option data-tokens="Hatay" {{ ( isset($shipping) && $shipping->city == 'Hatay') ? 'selected' : '' }} value="Hatay" >Hatay</option>
                                                    <option data-tokens="Isparta" {{ ( isset($shipping) && $shipping->city == 'Isparta') ? 'selected' : '' }} value="Isparta" >Isparta</option>
                                                    <option data-tokens="Mersin" {{ ( isset($shipping) && $shipping->city == 'Mersin') ? 'selected' : '' }} value="Mersin" >Mersin</option>
                                                    <option data-tokens="İstanbul" {{ ( isset($shipping) && $shipping->city == 'İstanbul') ? 'selected' : '' }} value="İstanbul" >İstanbul</option>
                                                    <option data-tokens="İzmir" {{ ( isset($shipping) && $shipping->city == 'İzmir') ? 'selected' : '' }} value="İzmir" >İzmir</option>
                                                    <option data-tokens="Kars" {{ ( isset($shipping) && $shipping->city == 'Kars') ? 'selected' : '' }} value="Kars" >Kars</option>
                                                    <option data-tokens="Kastamonu" {{ ( isset($shipping) && $shipping->city == 'Kastamonu') ? 'selected' : '' }} value="Kastamonu" >Kastamonu</option>
                                                    <option data-tokens="Konya" {{ ( isset($shipping) && $shipping->city == 'Konya') ? 'selected' : '' }} value="Konya" >Konya</option>
                                                    <option data-tokens="Kütahya" {{ ( isset($shipping) && $shipping->city == 'Kütahya') ? 'selected' : '' }} value="Kütahya" >Kütahya</option>
                                                    <option data-tokens="Malatya" {{ ( isset($shipping) && $shipping->city == 'Malatya') ? 'selected' : '' }} value="Malatya" >Malatya</option>
                                                    <option data-tokens="Manisa" {{ ( isset($shipping) && $shipping->city == 'Manisa') ? 'selected' : '' }} value="Manisa" >Manisa</option>
                                                    <option data-tokens="Kahramanmaraş" {{ ( isset($shipping) && $shipping->city == 'Kahramanmaraş') ? 'selected' : '' }} value="Kahramanmaraş" >Kahramanmaraş</option>
                                                    <option data-tokens="Mardin" {{ ( isset($shipping) && $shipping->city == 'Mardin') ? 'selected' : '' }} value="Mardin" >Mardin</option>
                                                    <option data-tokens="Muğla" {{ ( isset($shipping) && $shipping->city == 'Muğla') ? 'selected' : '' }} value="Muğla" >Muğla</option>
                                                    <option data-tokens="Muş" {{ ( isset($shipping) && $shipping->city == 'Muş') ? 'selected' : '' }} value="Muş" >Muş</option>
                                                    <option data-tokens="Nevşehir" {{ ( isset($shipping) && $shipping->city == 'Nevşehir') ? 'selected' : '' }} value="Nevşehir" >Nevşehir</option>
                                                    <option data-tokens="Niğde" {{ ( isset($shipping) && $shipping->city == 'Niğde') ? 'selected' : '' }} value="Niğde" >Niğde</option>
                                                    <option data-tokens="Ordu" {{ ( isset($shipping) && $shipping->city == 'Ordu') ? 'selected' : '' }} value="Ordu" >Ordu</option>
                                                    <option data-tokens="Rize" {{ ( isset($shipping) && $shipping->city == 'Rize') ? 'selected' : '' }} value="Rize" >Rize</option>
                                                    <option data-tokens="Sakarya" {{ ( isset($shipping) && $shipping->city == 'Sakarya') ? 'selected' : '' }} value="Sakarya" >Sakarya</option>
                                                    <option data-tokens="Samsun" {{ ( isset($shipping) && $shipping->city == 'Samsun') ? 'selected' : '' }} value="Samsun" >Samsun</option>
                                                    <option data-tokens="Siirt" {{ ( isset($shipping) && $shipping->city == 'Siirt') ? 'selected' : '' }} value="Siirt" >Siirt</option>
                                                    <option data-tokens="Sinop" {{ ( isset($shipping) && $shipping->city == 'Sinop') ? 'selected' : '' }} value="Sinop" >Sinop</option>
                                                    <option data-tokens="Sivas" {{ ( isset($shipping) && $shipping->city == 'Sivas') ? 'selected' : '' }} value="Sivas" >Sivas</option>
                                                    <option data-tokens="Tekirdağ" {{ ( isset($shipping) && $shipping->city == 'Tekirdağ') ? 'selected' : '' }} value="Tekirdağ" >Tekirdağ</option>
                                                    <option data-tokens="Tokat" {{ ( isset($shipping) && $shipping->city == 'Tokat') ? 'selected' : '' }} value="Tokat" >Tokat</option>
                                                    <option data-tokens="Trabzon" {{ ( isset($shipping) && $shipping->city == 'Trabzon') ? 'selected' : '' }} value="Trabzon" >Trabzon</option>
                                                        
                                                    <option data-tokens="Tunceli" {{ ( isset($shipping) && $shipping->city == 'Tunceli') ? 'selected' : '' }} value="Tunceli" >Tunceli</option>
                                                    <option data-tokens="Şanlıurfa" {{ ( isset($shipping) && $shipping->city == 'Şanlıurfa') ? 'selected' : '' }} value="Şanlıurfa" >Şanlıurfa</option>
                                                    <option data-tokens="Uşak" {{ ( isset($shipping) && $shipping->city == 'Uşak') ? 'selected' : '' }} value="Uşak" >Uşak</option>
                                                    <option data-tokens="Van" {{ ( isset($shipping) && $shipping->city == 'Van') ? 'selected' : '' }} value="Van" >Van</option>
                                                    <option data-tokens="Yozgat" {{ ( isset($shipping) && $shipping->city == 'Yozgat') ? 'selected' : '' }} value="Yozgat" >Yozgat</option>
                                                    <option data-tokens="Zonguldak" {{ ( isset($shipping) && $shipping->city == 'Zonguldak') ? 'selected' : '' }} value="Zonguldak" >Zonguldak</option>
                                                    <option data-tokens="Aksaray" {{ ( isset($shipping) && $shipping->city == 'Aksaray') ? 'selected' : '' }} value="Aksaray" >Aksaray</option>
                                                    <option data-tokens="Bayburt" {{ ( isset($shipping) && $shipping->city == 'Bayburt') ? 'selected' : '' }} value="Bayburt" >Bayburt</option>
                                                    <option data-tokens="Karaman" {{ ( isset($shipping) && $shipping->city == 'Karaman') ? 'selected' : '' }} value="Karaman" >Karaman</option>
                                                    <option data-tokens="Kırıkkale" {{ ( isset($shipping) && $shipping->city == 'Kırıkkale') ? 'selected' : '' }} value="Kırıkkale" >Kırıkkale</option>
                                                    <option data-tokens="Batman" {{ ( isset($shipping) && $shipping->city == 'Batman') ? 'selected' : '' }} value="Batman" >Batman</option>
                                                    <option data-tokens="Şırnak" {{ ( isset($shipping) && $shipping->city == 'Şırnak') ? 'selected' : '' }} value="Şırnak" >Şırnak</option>
                                                    <option data-tokens="Bartın" {{ ( isset($shipping) && $shipping->city == 'Bartın') ? 'selected' : '' }} value="Bartın" >Bartın</option>
                                                    <option data-tokens="Ardahan" {{ ( isset($shipping) && $shipping->city == 'Ardahan') ? 'selected' : '' }} value="Ardahan" >Ardahan</option>
                                                    <option data-tokens="Iğdır" {{ ( isset($shipping) && $shipping->city == 'Iğdır') ? 'selected' : '' }} value="Iğdır" >Iğdır</option>
                                                    <option data-tokens="Yalova" {{ ( isset($shipping) && $shipping->city == 'Yalova') ? 'selected' : '' }} value="Yalova" >Yalova</option>
                                                    <option data-tokens="Karabük" {{ ( isset($shipping) && $shipping->city == 'Karabük') ? 'selected' : '' }} value="Karabük" >Karabük</option>
                                                    <option data-tokens="Kilis" {{ ( isset($shipping) && $shipping->city == 'Kilis') ? 'selected' : '' }} value="Kilis" >Kilis</option>
                                                    <option data-tokens="Osmaniye" {{ ( isset($shipping) && $shipping->city == 'Osmaniye') ? 'selected' : '' }} value="Osmaniye" >Osmaniye</option>
                                                    <option data-tokens="Düzce" {{ ( isset($shipping) && $shipping->city == 'Düzce') ? 'selected' : '' }} value="Düzce" >Düzce</option>
                                                    <option data-tokens="Diğer" {{ ( isset($shipping) && $shipping->city == 'Diğer') ? 'selected' : '' }} value="Diğer" >Diğer</option>
                                                    
                                                    
                                                </select>
                                            </div>
 

                                            <div class="form-group">
                                                <label class="info-title" for="state1"> Belirtmek, bildirmek

                                                </label>
                                                <input class="form-control unicase-form-control text-input" id="state1" placeholder="state" value="{{$shipping->state or ''}}" name="state" type="text"> 
                                            </div>


                                            <div class="form-group">
                                                <label class="info-title" for="address11"> Adres1
                                                <span>*</span></label>
                                                <input class="form-control unicase-form-control text-input" id="address11" placeholder="" value="{{$shipping->address1 or '' }}"" type="text" name="address1" required> 
                                            </div>

                                               <div class="form-group">
                                                <label class="info-title" for="address22"> Adres2
                                                </label>
                                                <input class="form-control unicase-form-control text-input" id="address22" placeholder="" value="{{$shipping->address2 or '' }}"" type="text" name="address2"> 
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
                                    <span>#</span>Ödeme Yöntemi
                                </a>
                              </h4> 
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse {{($tab==3)?'in':''}}">
                                <div class="panel-body">
                                  <div class="col-md-6 col-sm-6 already-registered-login"> 
                                        <form method="post" class="register-form" role="form" id="billing" action="{{route('shippingMethod')}}">  
                                            {!! csrf_field() !!}
                                            
                                            <div class="form-group"> 
                                                <!--<input class="form-control  " id="cod" placeholder="" type="hidden" value="cod">Kapıda ödeme-->
                                                <input class="" id="cod" placeholder="" {{ (Session::get('paymentMethod') == 'COD') ? 'checked': '' }} name="paymentMethod" type="radio" value="COD">Kapıda Ödeme<br>
                                                <input class="" id="cod" placeholder="" {{ (Session::get('paymentMethod') == 'card') ? 'checked': '' }} name="paymentMethod" type="radio" value="card">Kredi Kartı
                                            </div> 
                                         <!--<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="index.htm#collapseSix">-->
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
                                    <span>#</span>Siparişi Tamamla
                                </a>
                              </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse {{($tab==4)?'in':''}}">
                                <div class="panel-body">
                                            <div class="">
                        <div class="shopping-cart">
                            <div class="shopping-cart-table ">
                                <div class="table-responsive">
                                 @if(count($cart))
                                    <table class="table">
                                        <thead>
                                                <tr>
                                            <th class="cart-product-name item">Ürün Adı</th>
                                            <th class="cart-edit item">Fiyat</th>
                                            <th class="cart-qty item">Miktar</th>
                                            <th class="cart-sub-total item">Ara Toplam</th> 
                                        </tr>
                                        </thead><!-- /thead -->
                              
                                     <tbody>
                                        @foreach($cart as  $item)
                                        <tr> 
                                            <td class="cart_description">
                                                    <h4><a href="">{{$item->name}} {{ ($item->options->size) ? '('.$item->options->size.')' : ''}}</a></h4>
                                                     @if($item->options->color)
                                                        <p style="background-color:#{{$item->options->color}}; width:25px;">&nbsp;</p>
                                                    @endif   
                                            </td>
                                            <td class="cart_price">
                                                <p><font style="vertical-align: inherit;">₺</font> {{$item->price}}</p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    {{$item->qty}} 
                                                    
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price"><font style="vertical-align: inherit;">₺</font> {{ money_format('%!i', $item->subtotal) }}</p>
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
                                                <span class="inner-left-md">Ara Toplam <font style="vertical-align: inherit;">₺</font> {{$sub_total}} </span>
                                            </div>
                                            <div class="cart-grand-total">
                                                <span class="inner-left-md">Genel Toplam <font style="vertical-align: inherit;">₺</font> {{$sub_total}} </span>
                                            </div>
                                             <div class="cart-grand-total">
                                             <br><br>
                                               <a href="{{url('orderSuccess')}}" class="btn btn-primary">SİPARİŞİ VER</a>
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
                                      <span># </span>Sepetiniz
                                    </a>
                                 </h4>
                            </div>
                            <div class="">
                                <ul class="nav nav-checkout-progress list-unstyled" style="padding: 5px;"> 
                                 <li> Toplam Tutar  : <font style="vertical-align: inherit;">₺</font> {{ $sub_total }} <li><br>
                                  <li> Toplam Ürün :  {{ $total_item }} </li> <br>
                               
                                </ul>  
                                 <a href="{{url('/')}}" class="btn btn-success">ALIŞVERİŞE DEVAM</a> 
                                  <!--<a href="{{url('orderSuccess')}}" class="btn btn-primary">Sipariş Vermek</a> -->  
                                        
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

