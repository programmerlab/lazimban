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
 @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                @endif
                @if(session()->has('message'))                    
                    <div class="alert alert-success">
                        <ul>
                           
                                <li>{{ session()->get('message') }}</li>
                            
                        </ul>
                    </div>
                @endif
                     <!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

    <!-- panel-heading -->
        <div class="panel-heading">
        <h4 class="unicase-checkout-title"> 
            <a  data-toggle="collapse" class="{{ ($tab==0)?'':'collapse'}}"  data-parent="#accordion" href="index.htm#collapseOne">
              <span>1.</span>Kişisel Bilgiler
            </a>
         </h4>
    </div>
    <!-- panel-heading -->
    
    <div id="collapseOne" class="panel-collapse collapse {{ ($tab==0)?'in':''}}">

        <!-- panel-body  -->
        <div class="panel-body">
            <div class="row">       
                
                <!-- guest-login -->
                <form method="post" action="{{ url('/updateProfile') }}">
                <!-- already-registered-login -->
                    <div class="col-md-6 col-sm-6 already-registered-login">
                        {!! csrf_field() !!}
                           
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> Adınız </label>                        
                            <div class="input-icon">                         
                                <input class="form-control placeholder-no-fix" type="text" id="first_name" placeholder="Adınız" name="first_name" value="{{ $userData->first_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> Soyadınız </label>                        
                            <div class="input-icon">                         
                                <input class="form-control placeholder-no-fix" type="text" id="last_name" placeholder="Soyadınız" name="last_name" value="{{ $userData->last_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> Eposta Adresiniz </label>                        
                            <div class="input-icon">                         
                                <input class="form-control placeholder-no-fix" type="text" id="email" placeholder="Eposta Adresiniz" name="email" value="{{ $userData->email }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> Şifreniz </label>                        
                            <div class="input-icon">                         
                                <input class="form-control placeholder-no-fix" type="password" id="password" placeholder="Şifreniz" name="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> Şifre (Tekrar) </label>                        
                            <div class="input-icon">                         
                                <input class="form-control placeholder-no-fix" type="password" id="confirm_password" placeholder="Şifre (Tekrar)" name="confirm_password" value="">
                            </div>
                        </div>
                           
                        <button type="submit"  class="btn-upper btn btn-primary checkout-page-button">Gönder</button>
                            
                    </div>
                </form>
                <!-- already-registered-login -->       

            </div>          
        </div>
        <!-- panel-body  -->

    </div><!-- row -->
</div>

 
<!-- checkout-step-01  -->
                        <!-- checkout-step-02  -->

                  
                   

                    <div class="panel panel-default checkout-step-02">
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="{{($tab==1)?'':'collapsed'}}"  id="" data-parent="#accordion" href="#collapseTwo" id="collapsed_biling">
                                    <span>2.</span>Fatura Bilgileri 
                                </a>
                            </h4> 
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse {{($tab==1)?'in':''}}">
                            <div class="panel-body">
                                     <div class="col-md-6 col-sm-6 already-registered-login"> 
                                        <form method="post" class="register-form" role="form" id="billing" action="{{route('updateBilling')}}"> 
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
                                                    
                                                    <option data-tokens="Adana" {{ ($billing->city == 'Adana') ? 'selected' : '' }} value="Adana">Adana</option>
                                                    <option data-tokens="Adıyaman" {{ ($billing->city == 'Adıyaman') ? 'selected' : '' }} value="Adıyaman">Adıyaman</option>
                                                    <option data-tokens="Afyon" {{ ($billing->city == 'Afyon') ? 'selected' : '' }} value="Afyon" >Afyon</option>
                                                    <option data-tokens="Ağrı" {{ ($billing->city == 'Ağrı') ? 'selected' : '' }} value="Ağrı" >Ağrı</option>
                                                    <option data-tokens="Amasya" {{ ($billing->city == 'Amasya') ? 'selected' : '' }} value="Amasya" >Amasya</option>
                                                    <option data-tokens="Ankara" {{ ($billing->city == 'Ankara') ? 'selected' : '' }} value="Ankara" >Ankara</option>
                                                    <option data-tokens="Antalya" {{ ($billing->city == 'Antalya') ? 'selected' : '' }} value="Antalya" >Antalya</option>
                                                    <option data-tokens="Artvin" {{ ($billing->city == 'Artvin') ? 'selected' : '' }} value="Artvin" >Artvin</option>
                                                    <option data-tokens="Aydın" {{ ($billing->city == 'Aydın') ? 'selected' : '' }} value="Aydın" >Aydın</option>
                                                        
                                                    <option data-tokens="Balıkesir" {{ ($billing->city == 'Balıkesir') ? 'selected' : '' }} value="Balıkesir" >Balıkesir</option>
                                                    <option data-tokens="Bilecik" {{ ($billing->city == 'Bilecik') ? 'selected' : '' }} value="Bilecik" >Bilecik</option>
                                                    <option data-tokens="Bingöl" {{ ($billing->city == 'Bingöl') ? 'selected' : '' }} value="Bingöl" >Bingöl</option>
                                                    <option data-tokens="Bitlis" {{ ($billing->city == 'Bitlis') ? 'selected' : '' }} value="Bitlis" >Bitlis</option>
                                                    <option data-tokens="Bolu" {{ ($billing->city == 'Bolu') ? 'selected' : '' }} value="Bolu" >Bolu</option>
                                                    <option data-tokens="Burdur" {{ ($billing->city == 'Burdur') ? 'selected' : '' }} value="Burdur" >Burdur</option>
                                                    <option data-tokens="Bursa" {{ ($billing->city == 'Bursa') ? 'selected' : '' }} value="Bursa" >Bursa</option>
                                                        
                                                    <option data-tokens="Çanakkale" {{ ($billing->city == 'Çanakkale') ? 'selected' : '' }} value="Çanakkale" >Çanakkale</option>
                                                    <option data-tokens="Çankırı" {{ ($billing->city == 'Çankırı') ? 'selected' : '' }} value="Çankırı" >Çankırı</option>
                                                    <option data-tokens="Çorum" {{ ($billing->city == 'Çorum') ? 'selected' : '' }} value="Çorum" >Çorum</option>
                                                        
                                                    <option data-tokens="Denizli" {{ ($billing->city == 'Denizli') ? 'selected' : '' }} value="Denizli" >Denizli</option>                                                        
                                                    <option data-tokens="Diyarbakır" {{ ($billing->city == 'Afyon') ? 'selected' : '' }} value="Afyon" >Diyarbakır</option>
                                                    <option data-tokens="Edirne" {{ ($billing->city == 'Edirne') ? 'selected' : '' }} value="Edirne" >Edirne</option>
                                                    <option data-tokens="Giresun" {{ ($billing->city == 'Giresun') ? 'selected' : '' }} value="Giresun" >Giresun</option>
                                                        
                                                    <option data-tokens="Gümüşhane" {{ ($billing->city == 'Gümüşhane') ? 'selected' : '' }} value="Gümüşhane" >Gümüşhane</option>
                                                    <option data-tokens="Hakkari" {{ ($billing->city == 'Hakkari') ? 'selected' : '' }} value="Hakkari" >Hakkari</option>
                                                    <option data-tokens="Hatay" {{ ($billing->city == 'Hatay') ? 'selected' : '' }} value="Hatay" >Hatay</option>
                                                    <option data-tokens="Isparta" {{ ($billing->city == 'Isparta') ? 'selected' : '' }} value="Isparta" >Isparta</option>
                                                    <option data-tokens="Mersin" {{ ($billing->city == 'Mersin') ? 'selected' : '' }} value="Mersin" >Mersin</option>
                                                    <option data-tokens="İstanbul" {{ ($billing->city == 'İstanbul') ? 'selected' : '' }} value="İstanbul" >İstanbul</option>
                                                    <option data-tokens="İzmir" {{ ($billing->city == 'İzmir') ? 'selected' : '' }} value="İzmir" >İzmir</option>
                                                    <option data-tokens="Kars" {{ ($billing->city == 'Kars') ? 'selected' : '' }} value="Kars" >Kars</option>
                                                    <option data-tokens="Kastamonu" {{ ($billing->city == 'Kastamonu') ? 'selected' : '' }} value="Kastamonu" >Kastamonu</option>
                                                    <option data-tokens="Konya" {{ ($billing->city == 'Konya') ? 'selected' : '' }} value="Konya" >Konya</option>
                                                    <option data-tokens="Kütahya" {{ ($billing->city == 'Kütahya') ? 'selected' : '' }} value="Kütahya" >Kütahya</option>
                                                    <option data-tokens="Malatya" {{ ($billing->city == 'Malatya') ? 'selected' : '' }} value="Malatya" >Malatya</option>
                                                    <option data-tokens="Manisa" {{ ($billing->city == 'Manisa') ? 'selected' : '' }} value="Manisa" >Manisa</option>
                                                    <option data-tokens="Kahramanmaraş" {{ ($billing->city == 'Kahramanmaraş') ? 'selected' : '' }} value="Kahramanmaraş" >Kahramanmaraş</option>
                                                    <option data-tokens="Mardin" {{ ($billing->city == 'Mardin') ? 'selected' : '' }} value="Mardin" >Mardin</option>
                                                    <option data-tokens="Muğla" {{ ($billing->city == 'Muğla') ? 'selected' : '' }} value="Muğla" >Muğla</option>
                                                    <option data-tokens="Muş" {{ ($billing->city == 'Muş') ? 'selected' : '' }} value="Muş" >Muş</option>
                                                    <option data-tokens="Nevşehir" {{ ($billing->city == 'Nevşehir') ? 'selected' : '' }} value="Nevşehir" >Nevşehir</option>
                                                    <option data-tokens="Niğde" {{ ($billing->city == 'Niğde') ? 'selected' : '' }} value="Niğde" >Niğde</option>
                                                    <option data-tokens="Ordu" {{ ($billing->city == 'Ordu') ? 'selected' : '' }} value="Ordu" >Ordu</option>
                                                    <option data-tokens="Rize" {{ ($billing->city == 'Rize') ? 'selected' : '' }} value="Rize" >Rize</option>
                                                    <option data-tokens="Sakarya" {{ ($billing->city == 'Sakarya') ? 'selected' : '' }} value="Sakarya" >Sakarya</option>
                                                    <option data-tokens="Samsun" {{ ($billing->city == 'Samsun') ? 'selected' : '' }} value="Samsun" >Samsun</option>
                                                    <option data-tokens="Siirt" {{ ($billing->city == 'Siirt') ? 'selected' : '' }} value="Siirt" >Siirt</option>
                                                    <option data-tokens="Sinop" {{ ($billing->city == 'Sinop') ? 'selected' : '' }} value="Sinop" >Sinop</option>
                                                    <option data-tokens="Sivas" {{ ($billing->city == 'Sivas') ? 'selected' : '' }} value="Sivas" >Sivas</option>
                                                    <option data-tokens="Tekirdağ" {{ ($billing->city == 'Tekirdağ') ? 'selected' : '' }} value="Tekirdağ" >Tekirdağ</option>
                                                    <option data-tokens="Tokat" {{ ($billing->city == 'Tokat') ? 'selected' : '' }} value="Tokat" >Tokat</option>
                                                    <option data-tokens="Trabzon" {{ ($billing->city == 'Trabzon') ? 'selected' : '' }} value="Trabzon" >Trabzon</option>
                                                        
                                                    <option data-tokens="Tunceli" {{ ($billing->city == 'Tunceli') ? 'selected' : '' }} value="Tunceli" >Tunceli</option>
                                                    <option data-tokens="Şanlıurfa" {{ ($billing->city == 'Şanlıurfa') ? 'selected' : '' }} value="Şanlıurfa" >Şanlıurfa</option>
                                                    <option data-tokens="Uşak" {{ ($billing->city == 'Uşak') ? 'selected' : '' }} value="Uşak" >Uşak</option>
                                                    <option data-tokens="Van" {{ ($billing->city == 'Van') ? 'selected' : '' }} value="Van" >Van</option>
                                                    <option data-tokens="Yozgat" {{ ($billing->city == 'Yozgat') ? 'selected' : '' }} value="Yozgat" >Yozgat</option>
                                                    <option data-tokens="Zonguldak" {{ ($billing->city == 'Zonguldak') ? 'selected' : '' }} value="Zonguldak" >Zonguldak</option>
                                                    <option data-tokens="Aksaray" {{ ($billing->city == 'Aksaray') ? 'selected' : '' }} value="Aksaray" >Aksaray</option>
                                                    <option data-tokens="Bayburt" {{ ($billing->city == 'Bayburt') ? 'selected' : '' }} value="Bayburt" >Bayburt</option>
                                                    <option data-tokens="Karaman" {{ ($billing->city == 'Karaman') ? 'selected' : '' }} value="Karaman" >Karaman</option>
                                                    <option data-tokens="Kırıkkale" {{ ($billing->city == 'Kırıkkale') ? 'selected' : '' }} value="Kırıkkale" >Kırıkkale</option>
                                                    <option data-tokens="Batman" {{ ($billing->city == 'Batman') ? 'selected' : '' }} value="Batman" >Batman</option>
                                                    <option data-tokens="Şırnak" {{ ($billing->city == 'Şırnak') ? 'selected' : '' }} value="Şırnak" >Şırnak</option>
                                                    <option data-tokens="Bartın" {{ ($billing->city == 'Bartın') ? 'selected' : '' }} value="Bartın" >Bartın</option>
                                                    <option data-tokens="Ardahan" {{ ($billing->city == 'Ardahan') ? 'selected' : '' }} value="Ardahan" >Ardahan</option>
                                                    <option data-tokens="Iğdır" {{ ($billing->city == 'Iğdır') ? 'selected' : '' }} value="Iğdır" >Iğdır</option>
                                                    <option data-tokens="Yalova" {{ ($billing->city == 'Yalova') ? 'selected' : '' }} value="Yalova" >Yalova</option>
                                                    <option data-tokens="Karabük" {{ ($billing->city == 'Karabük') ? 'selected' : '' }} value="Karabük" >Karabük</option>
                                                    <option data-tokens="Kilis" {{ ($billing->city == 'Kilis') ? 'selected' : '' }} value="Kilis" >Kilis</option>
                                                    <option data-tokens="Osmaniye" {{ ($billing->city == 'Osmaniye') ? 'selected' : '' }} value="Osmaniye" >Osmaniye</option>
                                                    <option data-tokens="Düzce" {{ ($billing->city == 'Düzce') ? 'selected' : '' }} value="Düzce" >Düzce</option>
                                                    <option data-tokens="Diğer" {{ ($billing->city == 'Diğer') ? 'selected' : '' }} value="Diğer" >Diğer</option>
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
                                                
                                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button" >Gönder</button>
                                            <br>
                                           <!--<input type="checkbox"  name="same_billing" <?php if(Session::get('same_address') == 1) { echo "checked"; }?> value="1" >Fatura adresinizden farklı bir adrese mi gönderilsin?-->
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
                                    <span>3.</span>Nakliye Bilgileri
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse {{($tab==2)?'in':''}}">
                              <div class="panel-body">
                                   <div class="col-md-6 col-sm-6 already-registered-login" id="shopping"> 
                                        <form method="post" class="register-form" role="form" id="shipping" action="{{route('updateShipping')}}">  
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
                                                    
                                                    <option data-tokens="Adana" {{ ($shipping->city == 'Adana') ? 'selected' : '' }} value="Adana">Adana</option>
                                                    <option data-tokens="Adıyaman" {{ ($shipping->city == 'Adıyaman') ? 'selected' : '' }} value="Adıyaman">Adıyaman</option>
                                                    <option data-tokens="Afyon" {{ ($shipping->city == 'Afyon') ? 'selected' : '' }} value="Afyon" >Afyon</option>
                                                    <option data-tokens="Ağrı" {{ ($shipping->city == 'Ağrı') ? 'selected' : '' }} value="Ağrı" >Ağrı</option>
                                                    <option data-tokens="Amasya" {{ ($shipping->city == 'Amasya') ? 'selected' : '' }} value="Amasya" >Amasya</option>
                                                    <option data-tokens="Ankara" {{ ($shipping->city == 'Ankara') ? 'selected' : '' }} value="Ankara" >Ankara</option>
                                                    <option data-tokens="Antalya" {{ ($shipping->city == 'Antalya') ? 'selected' : '' }} value="Antalya" >Antalya</option>
                                                    <option data-tokens="Artvin" {{ ($shipping->city == 'Artvin') ? 'selected' : '' }} value="Artvin" >Artvin</option>
                                                    <option data-tokens="Aydın" {{ ($shipping->city == 'Aydın') ? 'selected' : '' }} value="Aydın" >Aydın</option>
                                                        
                                                    <option data-tokens="Balıkesir" {{ ($shipping->city == 'Balıkesir') ? 'selected' : '' }} value="Balıkesir" >Balıkesir</option>
                                                    <option data-tokens="Bilecik" {{ ($shipping->city == 'Bilecik') ? 'selected' : '' }} value="Bilecik" >Bilecik</option>
                                                    <option data-tokens="Bingöl" {{ ($shipping->city == 'Bingöl') ? 'selected' : '' }} value="Bingöl" >Bingöl</option>
                                                    <option data-tokens="Bitlis" {{ ($shipping->city == 'Bitlis') ? 'selected' : '' }} value="Bitlis" >Bitlis</option>
                                                    <option data-tokens="Bolu" {{ ($shipping->city == 'Bolu') ? 'selected' : '' }} value="Bolu" >Bolu</option>
                                                    <option data-tokens="Burdur" {{ ($shipping->city == 'Burdur') ? 'selected' : '' }} value="Burdur" >Burdur</option>
                                                    <option data-tokens="Bursa" {{ ($shipping->city == 'Bursa') ? 'selected' : '' }} value="Bursa" >Bursa</option>
                                                        
                                                    <option data-tokens="Çanakkale" {{ ($shipping->city == 'Çanakkale') ? 'selected' : '' }} value="Çanakkale" >Çanakkale</option>
                                                    <option data-tokens="Çankırı" {{ ($shipping->city == 'Çankırı') ? 'selected' : '' }} value="Çankırı" >Çankırı</option>
                                                    <option data-tokens="Çorum" {{ ($shipping->city == 'Çorum') ? 'selected' : '' }} value="Çorum" >Çorum</option>
                                                        
                                                    <option data-tokens="Denizli" {{ ($shipping->city == 'Denizli') ? 'selected' : '' }} value="Denizli" >Denizli</option>                                                        
                                                    <option data-tokens="Diyarbakır" {{ ($shipping->city == 'Afyon') ? 'selected' : '' }} value="Afyon" >Diyarbakır</option>
                                                    <option data-tokens="Edirne" {{ ($shipping->city == 'Edirne') ? 'selected' : '' }} value="Edirne" >Edirne</option>
                                                    <option data-tokens="Giresun" {{ ($shipping->city == 'Giresun') ? 'selected' : '' }} value="Giresun" >Giresun</option>
                                                        
                                                    <option data-tokens="Gümüşhane" {{ ($shipping->city == 'Gümüşhane') ? 'selected' : '' }} value="Gümüşhane" >Gümüşhane</option>
                                                    <option data-tokens="Hakkari" {{ ($shipping->city == 'Hakkari') ? 'selected' : '' }} value="Hakkari" >Hakkari</option>
                                                    <option data-tokens="Hatay" {{ ($shipping->city == 'Hatay') ? 'selected' : '' }} value="Hatay" >Hatay</option>
                                                    <option data-tokens="Isparta" {{ ($shipping->city == 'Isparta') ? 'selected' : '' }} value="Isparta" >Isparta</option>
                                                    <option data-tokens="Mersin" {{ ($shipping->city == 'Mersin') ? 'selected' : '' }} value="Mersin" >Mersin</option>
                                                    <option data-tokens="İstanbul" {{ ($shipping->city == 'İstanbul') ? 'selected' : '' }} value="İstanbul" >İstanbul</option>
                                                    <option data-tokens="İzmir" {{ ($shipping->city == 'İzmir') ? 'selected' : '' }} value="İzmir" >İzmir</option>
                                                    <option data-tokens="Kars" {{ ($shipping->city == 'Kars') ? 'selected' : '' }} value="Kars" >Kars</option>
                                                    <option data-tokens="Kastamonu" {{ ($shipping->city == 'Kastamonu') ? 'selected' : '' }} value="Kastamonu" >Kastamonu</option>
                                                    <option data-tokens="Konya" {{ ($shipping->city == 'Konya') ? 'selected' : '' }} value="Konya" >Konya</option>
                                                    <option data-tokens="Kütahya" {{ ($shipping->city == 'Kütahya') ? 'selected' : '' }} value="Kütahya" >Kütahya</option>
                                                    <option data-tokens="Malatya" {{ ($shipping->city == 'Malatya') ? 'selected' : '' }} value="Malatya" >Malatya</option>
                                                    <option data-tokens="Manisa" {{ ($shipping->city == 'Manisa') ? 'selected' : '' }} value="Manisa" >Manisa</option>
                                                    <option data-tokens="Kahramanmaraş" {{ ($shipping->city == 'Kahramanmaraş') ? 'selected' : '' }} value="Kahramanmaraş" >Kahramanmaraş</option>
                                                    <option data-tokens="Mardin" {{ ($shipping->city == 'Mardin') ? 'selected' : '' }} value="Mardin" >Mardin</option>
                                                    <option data-tokens="Muğla" {{ ($shipping->city == 'Muğla') ? 'selected' : '' }} value="Muğla" >Muğla</option>
                                                    <option data-tokens="Muş" {{ ($shipping->city == 'Muş') ? 'selected' : '' }} value="Muş" >Muş</option>
                                                    <option data-tokens="Nevşehir" {{ ($shipping->city == 'Nevşehir') ? 'selected' : '' }} value="Nevşehir" >Nevşehir</option>
                                                    <option data-tokens="Niğde" {{ ($shipping->city == 'Niğde') ? 'selected' : '' }} value="Niğde" >Niğde</option>
                                                    <option data-tokens="Ordu" {{ ($shipping->city == 'Ordu') ? 'selected' : '' }} value="Ordu" >Ordu</option>
                                                    <option data-tokens="Rize" {{ ($shipping->city == 'Rize') ? 'selected' : '' }} value="Rize" >Rize</option>
                                                    <option data-tokens="Sakarya" {{ ($shipping->city == 'Sakarya') ? 'selected' : '' }} value="Sakarya" >Sakarya</option>
                                                    <option data-tokens="Samsun" {{ ($shipping->city == 'Samsun') ? 'selected' : '' }} value="Samsun" >Samsun</option>
                                                    <option data-tokens="Siirt" {{ ($shipping->city == 'Siirt') ? 'selected' : '' }} value="Siirt" >Siirt</option>
                                                    <option data-tokens="Sinop" {{ ($shipping->city == 'Sinop') ? 'selected' : '' }} value="Sinop" >Sinop</option>
                                                    <option data-tokens="Sivas" {{ ($shipping->city == 'Sivas') ? 'selected' : '' }} value="Sivas" >Sivas</option>
                                                    <option data-tokens="Tekirdağ" {{ ($shipping->city == 'Tekirdağ') ? 'selected' : '' }} value="Tekirdağ" >Tekirdağ</option>
                                                    <option data-tokens="Tokat" {{ ($shipping->city == 'Tokat') ? 'selected' : '' }} value="Tokat" >Tokat</option>
                                                    <option data-tokens="Trabzon" {{ ($shipping->city == 'Trabzon') ? 'selected' : '' }} value="Trabzon" >Trabzon</option>
                                                        
                                                    <option data-tokens="Tunceli" {{ ($shipping->city == 'Tunceli') ? 'selected' : '' }} value="Tunceli" >Tunceli</option>
                                                    <option data-tokens="Şanlıurfa" {{ ($shipping->city == 'Şanlıurfa') ? 'selected' : '' }} value="Şanlıurfa" >Şanlıurfa</option>
                                                    <option data-tokens="Uşak" {{ ($shipping->city == 'Uşak') ? 'selected' : '' }} value="Uşak" >Uşak</option>
                                                    <option data-tokens="Van" {{ ($shipping->city == 'Van') ? 'selected' : '' }} value="Van" >Van</option>
                                                    <option data-tokens="Yozgat" {{ ($shipping->city == 'Yozgat') ? 'selected' : '' }} value="Yozgat" >Yozgat</option>
                                                    <option data-tokens="Zonguldak" {{ ($shipping->city == 'Zonguldak') ? 'selected' : '' }} value="Zonguldak" >Zonguldak</option>
                                                    <option data-tokens="Aksaray" {{ ($shipping->city == 'Aksaray') ? 'selected' : '' }} value="Aksaray" >Aksaray</option>
                                                    <option data-tokens="Bayburt" {{ ($shipping->city == 'Bayburt') ? 'selected' : '' }} value="Bayburt" >Bayburt</option>
                                                    <option data-tokens="Karaman" {{ ($shipping->city == 'Karaman') ? 'selected' : '' }} value="Karaman" >Karaman</option>
                                                    <option data-tokens="Kırıkkale" {{ ($shipping->city == 'Kırıkkale') ? 'selected' : '' }} value="Kırıkkale" >Kırıkkale</option>
                                                    <option data-tokens="Batman" {{ ($shipping->city == 'Batman') ? 'selected' : '' }} value="Batman" >Batman</option>
                                                    <option data-tokens="Şırnak" {{ ($shipping->city == 'Şırnak') ? 'selected' : '' }} value="Şırnak" >Şırnak</option>
                                                    <option data-tokens="Bartın" {{ ($shipping->city == 'Bartın') ? 'selected' : '' }} value="Bartın" >Bartın</option>
                                                    <option data-tokens="Ardahan" {{ ($shipping->city == 'Ardahan') ? 'selected' : '' }} value="Ardahan" >Ardahan</option>
                                                    <option data-tokens="Iğdır" {{ ($shipping->city == 'Iğdır') ? 'selected' : '' }} value="Iğdır" >Iğdır</option>
                                                    <option data-tokens="Yalova" {{ ($shipping->city == 'Yalova') ? 'selected' : '' }} value="Yalova" >Yalova</option>
                                                    <option data-tokens="Karabük" {{ ($shipping->city == 'Karabük') ? 'selected' : '' }} value="Karabük" >Karabük</option>
                                                    <option data-tokens="Kilis" {{ ($shipping->city == 'Kilis') ? 'selected' : '' }} value="Kilis" >Kilis</option>
                                                    <option data-tokens="Osmaniye" {{ ($shipping->city == 'Osmaniye') ? 'selected' : '' }} value="Osmaniye" >Osmaniye</option>
                                                    <option data-tokens="Düzce" {{ ($shipping->city == 'Düzce') ? 'selected' : '' }} value="Düzce" >Düzce</option>
                                                    <option data-tokens="Diğer" {{ ($shipping->city == 'Diğer') ? 'selected' : '' }} value="Diğer" >Diğer</option>
                                                    
                                                    
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
                                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Gönder</button>
                                        </form>
                                    </div>  
                              </div>
                            </div>
                        </div>
                        <!-- checkout-step-03  -->

                        <!-- checkout-step-04  -->
                       <!-- <div class="panel panel-default checkout-step-04">
                            <div class="panel-heading">
                              <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="{{($tab==3)?'':'collapsed'}}" data-parent="#accordion" href="index.htm#collapseFour">
                                    <span>4.</span>Nakliye Yöntemi
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
                                           
                                        </form>
                                    </div>  
                                </div>
                            </div>
                        </div> -->

                        <!-- checkout-step-06  -->
                        <div class="panel panel-default checkout-step-06">
                            <div class="panel-heading">
                              <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="index.htm#collapseSix">
                                    <span>4.</span>Siparişlerim 
                                </a>
                              </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                            <div class="">
                        <div class="shopping-cart">
                            <div class="shopping-cart-table ">
                                <div class="table-responsive">
                                 @if(count($transaction))
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="cart-product-name item">Ürün adı</th>
                                            <th class="cart-edit item">Miktar</th> 
                                            <th class="cart-edit item">Fiyat</th>
                                            <th class="cart-edit item">Ara Toplam</th>                                                
                                            <th class="cart-sub-total item">tarih</th> 
                                             <th class="cart-sub-total item">Ödeme şekli</th> 
                                        </tr>
                                        </thead><!-- /thead -->
                              
                                     <tbody>
                                        @foreach($transaction as  $item)
                                        <tr> 
                                            <th class="cart_description">
                                                    <h4><a href="">{{$item->product_name}}</a></h4> 
                                            </th>
                                            <th class="cart_price">
                                                <p><font style="vertical-align: inherit;"></font> {{$item->qty}}</p>
                                            </th>
                                            <th class="cart_price">
                                                <p><font style="vertical-align: inherit;">₺</font> {{$item->total_price}}</p>
                                            </th>
                                           <th class="cart_price">
                                                <p><font style="vertical-align: inherit;">₺</font> {{ $item->qty * $item->total_price}}</p>
                                            </th>
                                           
                                             <th class="cart_total">
                                                <p class=""> {{ $item->created_at }}</p>
                                            </th> 
                                            <th>  {{ strtoupper($item->payment_mode) }}</th>
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
                                <h4 class="unicase-checkout-title">Hoşgeldiniz : {{ $userData->first_name or ''}}</h4>
                            </div>
                            <br>    
                            <div class="">
                                <ul class="nav nav-checkout-progress list-unstyled">
                                  
                                </ul>  
                                 <a href="{{url('/')}}" class="btn btn-success">Alışverişe devam</a> 
                                  <!--<a href="{{url('orderSuccess')}}" class="btn btn-primary">Sipariş vermek</a>   -->
                                        
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