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
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('public/new/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/custom.css') }}"> 
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
  
  
  <div class="account_login">
  	<div class="container">
  		<div class="col-md-6">
        	<h2>Satıcı Giriş</h2>
             
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
                <!--<div class="form-group">                    
                    <div class="input-icon">
                         
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Şehir" name="city"  value="{{old('city')}}"> </div>
                </div>-->
                <!--<div class="form-group">                    
                    <select name="country" id="country_list" class="select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option value="">Select Ülke</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegowina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Cote d'Ivoire</option>
                        <option value="HR">Croatia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard and Mc Donald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN" selected="" >India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran (Islamic Republic of)</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libyan Arab Jamahiriya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macau</option>
                        <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint LUCIA</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia (Slovak Republic)</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SH">St. Helena</option>
                        <option value="PM">St. Pierre and Miquelon</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen Islands</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands (British)</option>
                        <option value="VI">Virgin Islands (U.S.)</option>
                        <option value="WF">Wallis and Futuna Islands</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>-->
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