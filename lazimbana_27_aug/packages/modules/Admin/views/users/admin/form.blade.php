

<div class="form-group{{ $errors->first('full_name', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label">Full Name <span class="error">*</span></label>
    <div class="col-lg-9 col-md-9"> 
        {!! Form::text('full_name',$users->full_name, ['class' => 'form-control form-cascade-control input-small'])  !!} 
          <span class="label label-danger">{{ $errors->first('full_name', ':message') }}</span>
    </div>
  </div>
    
  <div class="form-group{{ $errors->first('company_name', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label">Company Name <span class="error">*</span></label>
    <div class="col-lg-9 col-md-9"> 
        {!! Form::text('company_name',$users->company_name, ['class' => 'form-control form-cascade-control input-small'])  !!} 
          <span class="label label-danger">{{ $errors->first('company_name', ':message') }}</span>
    </div>
  </div>
    
    <div class="form-group{{ $errors->first('phone', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label">Phone <span class="error">*</span></label>
    <div class="col-lg-9 col-md-9"> 
        {!! Form::text('phone',$users->phone, ['class' => 'form-control form-cascade-control input-small'])  !!} 
          <span class="label label-danger">{{ $errors->first('phone', ':message') }}</span>
    </div>
  </div>
    
   <div class="form-group{{ $errors->first('address', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label">Address <span class="error"></span></label>
    <div class="col-lg-9 col-md-9"> 
        {!! Form::text('address',$users->address, ['class' => 'form-control form-cascade-control input-small'])  !!} 
          <span class="label label-danger">{{ $errors->first('address', ':message') }}</span>
    </div>
  </div>
    
   <div class="form-group{{ $errors->first('city', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label">City <span class="error"></span></label>
    <div class="col-lg-9 col-md-9"> 
        {!! Form::text('city',$users->city, ['class' => 'form-control form-cascade-control input-small'])  !!} 
          <span class="label label-danger">{{ $errors->first('city', ':message') }}</span>
    </div>
  </div>
    
    <div class="form-group{{ $errors->first('country', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label">Country<span class="error"></span></label>
    <div class="col-lg-9 col-md-9"> 
        
        <select name="country" id="country_list" class="form-control" tabindex="-1" aria-hidden="true">
                        <option value="">Select Country</option>
                        <option value="AF" {{ ($users->country == 'AF') ? 'selected' : ''}} >Afghanistan</option>
                        <option value="AL" {{ ($users->country == 'AL') ? 'selected' : ''}}>Albania</option>
                        <option value="DZ" {{ ($users->country == 'DZ') ? 'selected' : ''}}>Algeria</option>
                        <option value="AS" {{ ($users->country == 'AS') ? 'selected' : ''}}>American Samoa</option>
                        <option value="AD" {{ ($users->country == 'AD') ? 'selected' : ''}}>Andorra</option>
                        <option value="AO" {{ ($users->country == 'AO') ? 'selected' : ''}}>Angola</option>
                        <option value="AI" {{ ($users->country == 'AI') ? 'selected' : ''}}>Anguilla</option>
                        <option value="AR" {{ ($users->country == 'AR') ? 'selected' : ''}}>Argentina</option>
                        <option value="AM" {{ ($users->country == 'AM') ? 'selected' : ''}}>Armenia</option>
                        <option value="AW" {{ ($users->country == 'AW') ? 'selected' : ''}}>Aruba</option>
                        <option value="AU" {{ ($users->country == 'AU') ? 'selected' : ''}}>Australia</option>
                        <option value="AT" {{ ($users->country == 'AT') ? 'selected' : ''}}>Austria</option>
                        <option value="AZ" {{ ($users->country == 'AZ') ? 'selected' : ''}}>Azerbaijan</option>
                        <option value="BS" {{ ($users->country == 'BS') ? 'selected' : ''}}>Bahamas</option>
                        <option value="BH" {{ ($users->country == 'BH') ? 'selected' : ''}}>Bahrain</option>
                        <option value="BD" {{ ($users->country == 'BD') ? 'selected' : ''}}>Bangladesh</option>
                        <option value="BB" {{ ($users->country == 'BB') ? 'selected' : ''}}>Barbados</option>
                        <option value="BY" {{ ($users->country == 'BY') ? 'selected' : ''}}>Belarus</option>
                        <option value="BE" {{ ($users->country == 'BE') ? 'selected' : ''}}>Belgium</option>
                        <option value="BZ" {{ ($users->country == 'BZ') ? 'selected' : ''}}>Belize</option>
                        <option value="BJ" {{ ($users->country == 'BJ') ? 'selected' : ''}}>Benin</option>
                        <option value="BM" {{ ($users->country == 'BM') ? 'selected' : ''}}>Bermuda</option>
                        <option value="BT" {{ ($users->country == 'BT') ? 'selected' : ''}}>Bhutan</option>
                        <option value="BO" {{ ($users->country == 'BO') ? 'selected' : ''}}>Bolivia</option>
                        <option value="BA" {{ ($users->country == 'BA') ? 'selected' : ''}}>Bosnia and Herzegowina</option>
                        <option value="BW" {{ ($users->country == 'BW') ? 'selected' : ''}}>Botswana</option>
                        <option value="BV" {{ ($users->country == 'BV') ? 'selected' : ''}}>Bouvet Island</option>
                        <option value="BR" {{ ($users->country == 'BR') ? 'selected' : ''}}>Brazil</option>
                        <option value="IO" {{ ($users->country == 'IO') ? 'selected' : ''}}>British Indian Ocean Territory</option>
                        <option value="BN" {{ ($users->country == 'BN') ? 'selected' : ''}}>Brunei Darussalam</option>
                        <option value="BG" {{ ($users->country == 'BG') ? 'selected' : ''}}>Bulgaria</option>
                        <option value="BF" {{ ($users->country == 'BF') ? 'selected' : ''}}>Burkina Faso</option>
                        <option value="BI" {{ ($users->country == 'BI') ? 'selected' : ''}}>Burundi</option>
                        <option value="KH" {{ ($users->country == 'KH') ? 'selected' : ''}}>Cambodia</option>
                        <option value="CM" {{ ($users->country == 'CM') ? 'selected' : ''}}>Cameroon</option>
                        <option value="CA" {{ ($users->country == 'CA') ? 'selected' : ''}}>Canada</option>
                        <option value="CV" {{ ($users->country == 'CV') ? 'selected' : ''}}>Cape Verde</option>
                        <option value="KY" {{ ($users->country == 'KY') ? 'selected' : ''}}>Cayman Islands</option>
                        <option value="CF" {{ ($users->country == 'CF') ? 'selected' : ''}}>Central African Republic</option>
                        <option value="TD" {{ ($users->country == 'TD') ? 'selected' : ''}}>Chad</option>
                        <option value="CL" {{ ($users->country == 'CL') ? 'selected' : ''}}>Chile</option>
                        <option value="CN" {{ ($users->country == 'CN') ? 'selected' : ''}}>China</option>
                        <option value="CX" {{ ($users->country == 'CX') ? 'selected' : ''}}>Christmas Island</option>
                        <option value="CC" {{ ($users->country == 'CC') ? 'selected' : ''}}>Cocos (Keeling) Islands</option>
                        <option value="CO" {{ ($users->country == 'CO') ? 'selected' : ''}}>Colombia</option>
                        <option value="KM" {{ ($users->country == 'KM') ? 'selected' : ''}}>Comoros</option>
                        <option value="CG" {{ ($users->country == 'CG') ? 'selected' : ''}}>Congo</option>
                        <option value="CD" {{ ($users->country == 'CD') ? 'selected' : ''}}>Congo, the Democratic Republic of the</option>
                        <option value="CK" {{ ($users->country == 'CK') ? 'selected' : ''}}>Cook Islands</option>
                        <option value="CR" {{ ($users->country == 'CR') ? 'selected' : ''}}>Costa Rica</option>
                        <option value="CI" {{ ($users->country == 'CI') ? 'selected' : ''}}>Cote d'Ivoire</option>
                        <option value="HR" {{ ($users->country == 'HR') ? 'selected' : ''}}>Croatia (Hrvatska)</option>
                        <option value="CU" {{ ($users->country == 'CU') ? 'selected' : ''}}>Cuba</option>
                        <option value="CY" {{ ($users->country == 'CY') ? 'selected' : ''}}>Cyprus</option>
                        <option value="CZ" {{ ($users->country == 'CZ') ? 'selected' : ''}}>Czech Republic</option>
                        <option value="DK" {{ ($users->country == 'DK') ? 'selected' : ''}}>Denmark</option>
                        <option value="DJ" {{ ($users->country == 'DJ') ? 'selected' : ''}}>Djibouti</option>
                        <option value="DM" {{ ($users->country == 'DM') ? 'selected' : ''}}>Dominica</option>
                        <option value="DO" {{ ($users->country == 'DO') ? 'selected' : ''}}>Dominican Republic</option>
                        <option value="EC" {{ ($users->country == 'EC') ? 'selected' : ''}}>Ecuador</option>
                        <option value="EG" {{ ($users->country == 'EG') ? 'selected' : ''}}>Egypt</option>
                        <option value="SV" {{ ($users->country == 'SV') ? 'selected' : ''}}>El Salvador</option>
                        <option value="GQ" {{ ($users->country == 'GQ') ? 'selected' : ''}}>Equatorial Guinea</option>
                        <option value="ER" {{ ($users->country == 'ER') ? 'selected' : ''}}>Eritrea</option>
                        <option value="EE" {{ ($users->country == 'EE') ? 'selected' : ''}}>Estonia</option>
                        <option value="ET" {{ ($users->country == 'ET') ? 'selected' : ''}}>Ethiopia</option>
                        <option value="FK" {{ ($users->country == 'FK') ? 'selected' : ''}}>Falkland Islands (Malvinas)</option>
                        <option value="FO" {{ ($users->country == 'FO') ? 'selected' : ''}}>Faroe Islands</option>
                        <option value="FJ" {{ ($users->country == 'FJ') ? 'selected' : ''}}>Fiji</option>
                        <option value="FI" {{ ($users->country == 'FI') ? 'selected' : ''}}>Finland</option>
                        <option value="FR" {{ ($users->country == 'FR') ? 'selected' : ''}}>France</option>
                        <option value="GF" {{ ($users->country == 'GF') ? 'selected' : ''}}>French Guiana</option>
                        <option value="PF" {{ ($users->country == 'PF') ? 'selected' : ''}}>French Polynesia</option>
                        <option value="TF" {{ ($users->country == 'TF') ? 'selected' : ''}}>French Southern Territories</option>
                        <option value="GA" {{ ($users->country == 'GA') ? 'selected' : ''}}>Gabon</option>
                        <option value="GM" {{ ($users->country == 'GM') ? 'selected' : ''}}>Gambia</option>
                        <option value="GE" {{ ($users->country == 'GE') ? 'selected' : ''}}>Georgia</option>
                        <option value="DE" {{ ($users->country == 'DE') ? 'selected' : ''}}>Germany</option>
                        <option value="GH" {{ ($users->country == 'GH') ? 'selected' : ''}}>Ghana</option>
                        <option value="GI" {{ ($users->country == 'GI') ? 'selected' : ''}}>Gibraltar</option>
                        <option value="GR" {{ ($users->country == 'GR') ? 'selected' : ''}}>Greece</option>
                        <option value="GL" {{ ($users->country == 'GL') ? 'selected' : ''}}>Greenland</option>
                        <option value="GD" {{ ($users->country == 'GD') ? 'selected' : ''}}>Grenada</option>
                        <option value="GP" {{ ($users->country == 'GP') ? 'selected' : ''}}>Guadeloupe</option>
                        <option value="GU" {{ ($users->country == 'GU') ? 'selected' : ''}}>Guam</option>
                        <option value="GT" {{ ($users->country == 'GT') ? 'selected' : ''}}>Guatemala</option>
                        <option value="GN" {{ ($users->country == 'GN') ? 'selected' : ''}}>Guinea</option>
                        <option value="GW" {{ ($users->country == 'GW') ? 'selected' : ''}}>Guinea-Bissau</option>
                        <option value="GY" {{ ($users->country == 'GY') ? 'selected' : ''}}>Guyana</option>
                        <option value="HT" {{ ($users->country == 'HT') ? 'selected' : ''}}>Haiti</option>
                        <option value="HM" {{ ($users->country == 'HM') ? 'selected' : ''}}>Heard and Mc Donald Islands</option>
                        <option value="VA" {{ ($users->country == 'VA') ? 'selected' : ''}}>Holy See (Vatican City State)</option>
                        <option value="HN" {{ ($users->country == 'HN') ? 'selected' : ''}}>Honduras</option>
                        <option value="HK" {{ ($users->country == 'HK') ? 'selected' : ''}}>Hong Kong</option>
                        <option value="HU" {{ ($users->country == 'HU') ? 'selected' : ''}}>Hungary</option>
                        <option value="IS" {{ ($users->country == 'IS') ? 'selected' : ''}}>Iceland</option>
                        <option value="IN" {{ ($users->country == 'IN') ? 'selected' : ''}}>India</option>
                        <option value="ID" {{ ($users->country == 'ID') ? 'selected' : ''}}>Indonesia</option>
                        <option value="IR" {{ ($users->country == 'IR') ? 'selected' : ''}}>Iran (Islamic Republic of)</option>
                        <option value="IQ" {{ ($users->country == 'IQ') ? 'selected' : ''}}>Iraq</option>
                        <option value="IE" {{ ($users->country == 'IE') ? 'selected' : ''}}>Ireland</option>
                        <option value="IL" {{ ($users->country == 'IL') ? 'selected' : ''}}>Israel</option>
                        <option value="IT" {{ ($users->country == 'IT') ? 'selected' : ''}}>Italy</option>
                        <option value="JM" {{ ($users->country == 'JM') ? 'selected' : ''}}>Jamaica</option>
                        <option value="JP" {{ ($users->country == 'JP') ? 'selected' : ''}}>Japan</option>
                        <option value="JO" {{ ($users->country == 'JO') ? 'selected' : ''}}>Jordan</option>
                        <option value="KZ" {{ ($users->country == 'KZ') ? 'selected' : ''}}>Kazakhstan</option>
                        <option value="KE" {{ ($users->country == 'KE') ? 'selected' : ''}}>Kenya</option>
                        <option value="KI" {{ ($users->country == 'KI') ? 'selected' : ''}}>Kiribati</option>
                        <option value="KP" {{ ($users->country == 'KP') ? 'selected' : ''}}>Korea, Democratic People's Republic of</option>
                        <option value="KR" {{ ($users->country == 'KR') ? 'selected' : ''}}>Korea, Republic of</option>
                        <option value="KW" {{ ($users->country == 'KW') ? 'selected' : ''}}>Kuwait</option>
                        <option value="KG" {{ ($users->country == 'KG') ? 'selected' : ''}}>Kyrgyzstan</option>
                        <option value="LA" {{ ($users->country == 'LA') ? 'selected' : ''}}>Lao People's Democratic Republic</option>
                        <option value="LV" {{ ($users->country == 'LV') ? 'selected' : ''}}>Latvia</option>
                        <option value="LB" {{ ($users->country == 'LB') ? 'selected' : ''}}>Lebanon</option>
                        <option value="LS" {{ ($users->country == 'LS') ? 'selected' : ''}}>Lesotho</option>
                        <option value="LR" {{ ($users->country == 'LR') ? 'selected' : ''}}>Liberia</option>
                        <option value="LY" {{ ($users->country == 'LY') ? 'selected' : ''}}>Libyan Arab Jamahiriya</option>
                        <option value="LI" {{ ($users->country == 'LI') ? 'selected' : ''}}>Liechtenstein</option>
                        <option value="LT" {{ ($users->country == 'LT') ? 'selected' : ''}}>Lithuania</option>
                        <option value="LU" {{ ($users->country == 'LU') ? 'selected' : ''}}>Luxembourg</option>
                        <option value="MO" {{ ($users->country == 'MO') ? 'selected' : ''}}>Macau</option>
                        <option value="MK" {{ ($users->country == 'MK') ? 'selected' : ''}}>Macedonia, The Former Yugoslav Republic of</option>
                        <option value="MG" {{ ($users->country == 'MG') ? 'selected' : ''}}>Madagascar</option>
                        <option value="MW" {{ ($users->country == 'MW') ? 'selected' : ''}}>Malawi</option>
                        <option value="MY" {{ ($users->country == 'MY') ? 'selected' : ''}}>Malaysia</option>
                        <option value="MV" {{ ($users->country == 'MV') ? 'selected' : ''}}>Maldives</option>
                        <option value="ML" {{ ($users->country == 'ML') ? 'selected' : ''}}>Mali</option>
                        <option value="MT" {{ ($users->country == 'MT') ? 'selected' : ''}}>Malta</option>
                        <option value="MH" {{ ($users->country == 'MH') ? 'selected' : ''}}>Marshall Islands</option>
                        <option value="MQ" {{ ($users->country == 'MQ') ? 'selected' : ''}}>Martinique</option>
                        <option value="MR" {{ ($users->country == 'MR') ? 'selected' : ''}}>Mauritania</option>
                        <option value="MU" {{ ($users->country == 'MU') ? 'selected' : ''}}>Mauritius</option>
                        <option value="YT" {{ ($users->country == 'YT') ? 'selected' : ''}}>Mayotte</option>
                        <option value="MX" {{ ($users->country == 'MX') ? 'selected' : ''}}>Mexico</option>
                        <option value="FM" {{ ($users->country == 'FM') ? 'selected' : ''}}>Micronesia, Federated States of</option>
                        <option value="MD" {{ ($users->country == 'MD') ? 'selected' : ''}}>Moldova, Republic of</option>
                        <option value="MC" {{ ($users->country == 'MC') ? 'selected' : ''}}>Monaco</option>
                        <option value="MN" {{ ($users->country == 'MN') ? 'selected' : ''}}>Mongolia</option>
                        <option value="MS" {{ ($users->country == 'MS') ? 'selected' : ''}}>Montserrat</option>
                        <option value="MA" {{ ($users->country == 'MA') ? 'selected' : ''}}>Morocco</option>
                        <option value="MZ" {{ ($users->country == 'MZ') ? 'selected' : ''}}>Mozambique</option>
                        <option value="MM" {{ ($users->country == 'MM') ? 'selected' : ''}}>Myanmar</option>
                        <option value="NA" {{ ($users->country == 'NA') ? 'selected' : ''}}>Namibia</option>
                        <option value="NR" {{ ($users->country == 'NR') ? 'selected' : ''}}>Nauru</option>
                        <option value="NP" {{ ($users->country == 'NP') ? 'selected' : ''}}>Nepal</option>
                        <option value="NL" {{ ($users->country == 'NL') ? 'selected' : ''}}>Netherlands</option>
                        <option value="AN" {{ ($users->country == 'AN') ? 'selected' : ''}}>Netherlands Antilles</option>
                        <option value="NC" {{ ($users->country == 'NC') ? 'selected' : ''}}>New Caledonia</option>
                        <option value="NZ" {{ ($users->country == 'NZ') ? 'selected' : ''}}>New Zealand</option>
                        <option value="NI" {{ ($users->country == 'NI') ? 'selected' : ''}}>Nicaragua</option>
                        <option value="NE" {{ ($users->country == 'NE') ? 'selected' : ''}}>Niger</option>
                        <option value="NG" {{ ($users->country == 'NG') ? 'selected' : ''}}>Nigeria</option>
                        <option value="NU" {{ ($users->country == 'NU') ? 'selected' : ''}}>Niue</option>
                        <option value="NF" {{ ($users->country == 'NF') ? 'selected' : ''}}>Norfolk Island</option>
                        <option value="MP" {{ ($users->country == 'MP') ? 'selected' : ''}}>Northern Mariana Islands</option>
                        <option value="NO" {{ ($users->country == 'NO') ? 'selected' : ''}}>Norway</option>
                        <option value="OM" {{ ($users->country == 'OM') ? 'selected' : ''}}>Oman</option>
                        <option value="PK" {{ ($users->country == 'PK') ? 'selected' : ''}}>Pakistan</option>
                        <option value="PW" {{ ($users->country == 'PW') ? 'selected' : ''}}>Palau</option>
                        <option value="PA" {{ ($users->country == 'PA') ? 'selected' : ''}}>Panama</option>
                        <option value="PG" {{ ($users->country == 'PG') ? 'selected' : ''}}>Papua New Guinea</option>
                        <option value="PY" {{ ($users->country == 'PY') ? 'selected' : ''}}>Paraguay</option>
                        <option value="PE" {{ ($users->country == 'PE') ? 'selected' : ''}}>Peru</option>
                        <option value="PH" {{ ($users->country == 'PH') ? 'selected' : ''}}>Philippines</option>
                        <option value="PN" {{ ($users->country == 'PN') ? 'selected' : ''}}>Pitcairn</option>
                        <option value="PL" {{ ($users->country == 'PL') ? 'selected' : ''}}>Poland</option>
                        <option value="PT" {{ ($users->country == 'PT') ? 'selected' : ''}}>Portugal</option>
                        <option value="PR" {{ ($users->country == 'PR') ? 'selected' : ''}}>Puerto Rico</option>
                        <option value="QA" {{ ($users->country == 'QA') ? 'selected' : ''}}>Qatar</option>
                        <option value="RE" {{ ($users->country == 'RE') ? 'selected' : ''}}>Reunion</option>
                        <option value="RO" {{ ($users->country == 'RO') ? 'selected' : ''}}>Romania</option>
                        <option value="RU" {{ ($users->country == 'RU') ? 'selected' : ''}}>Russian Federation</option>
                        <option value="RW" {{ ($users->country == 'RW') ? 'selected' : ''}}>Rwanda</option>
                        <option value="KN" {{ ($users->country == 'KN') ? 'selected' : ''}}>Saint Kitts and Nevis</option>
                        <option value="LC" {{ ($users->country == 'LC') ? 'selected' : ''}}>Saint LUCIA</option>
                        <option value="VC" {{ ($users->country == 'VC') ? 'selected' : ''}}>Saint Vincent and the Grenadines</option>
                        <option value="WS" {{ ($users->country == 'WS') ? 'selected' : ''}}>Samoa</option>
                        <option value="SM" {{ ($users->country == 'SM') ? 'selected' : ''}}>San Marino</option>
                        <option value="ST" {{ ($users->country == 'ST') ? 'selected' : ''}}>Sao Tome and Principe</option>
                        <option value="SA" {{ ($users->country == 'SA') ? 'selected' : ''}}>Saudi Arabia</option>
                        <option value="SN" {{ ($users->country == 'SN') ? 'selected' : ''}}>Senegal</option>
                        <option value="SC" {{ ($users->country == 'SC') ? 'selected' : ''}}>Seychelles</option>
                        <option value="SL" {{ ($users->country == 'SL') ? 'selected' : ''}}>Sierra Leone</option>
                        <option value="SG" {{ ($users->country == 'SG') ? 'selected' : ''}}>Singapore</option>
                        <option value="SK" {{ ($users->country == 'SK') ? 'selected' : ''}}>Slovakia (Slovak Republic)</option>
                        <option value="SI" {{ ($users->country == 'SI') ? 'selected' : ''}}>Slovenia</option>
                        <option value="SB" {{ ($users->country == 'SB') ? 'selected' : ''}}>Solomon Islands</option>
                        <option value="SO" {{ ($users->country == 'SO') ? 'selected' : ''}}>Somalia</option>
                        <option value="ZA" {{ ($users->country == 'ZA') ? 'selected' : ''}}>South Africa</option>
                        <option value="GS" {{ ($users->country == 'GS') ? 'selected' : ''}}>South Georgia and the South Sandwich Islands</option>
                        <option value="ES" {{ ($users->country == 'ES') ? 'selected' : ''}}>Spain</option>
                        <option value="LK" {{ ($users->country == 'LK') ? 'selected' : ''}}>Sri Lanka</option>
                        <option value="SH" {{ ($users->country == 'SH') ? 'selected' : ''}}>St. Helena</option>
                        <option value="PM" {{ ($users->country == 'PM') ? 'selected' : ''}}>St. Pierre and Miquelon</option>
                        <option value="SD" {{ ($users->country == 'SD') ? 'selected' : ''}}>Sudan</option>
                        <option value="SR" {{ ($users->country == 'SR') ? 'selected' : ''}}>Suriname</option>
                        <option value="SJ" {{ ($users->country == 'SJ') ? 'selected' : ''}}>Svalbard and Jan Mayen Islands</option>
                        <option value="SZ" {{ ($users->country == 'SZ') ? 'selected' : ''}}>Swaziland</option>
                        <option value="SE" {{ ($users->country == 'SE') ? 'selected' : ''}}>Sweden</option>
                        <option value="CH" {{ ($users->country == 'CH') ? 'selected' : ''}}>Switzerland</option>
                        <option value="SY" {{ ($users->country == 'SY') ? 'selected' : ''}}>Syrian Arab Republic</option>
                        <option value="TW" {{ ($users->country == 'TW') ? 'selected' : ''}}>Taiwan, Province of China</option>
                        <option value="TJ" {{ ($users->country == 'TJ') ? 'selected' : ''}}>Tajikistan</option>
                        <option value="TZ" {{ ($users->country == 'TZ') ? 'selected' : ''}}>Tanzania, United Republic of</option>
                        <option value="TH" {{ ($users->country == 'TH') ? 'selected' : ''}}>Thailand</option>
                        <option value="TG" {{ ($users->country == 'TG') ? 'selected' : ''}}>Togo</option>
                        <option value="TK" {{ ($users->country == 'TK') ? 'selected' : ''}}>Tokelau</option>
                        <option value="TO" {{ ($users->country == 'TO') ? 'selected' : ''}}>Tonga</option>
                        <option value="TT" {{ ($users->country == 'TT') ? 'selected' : ''}}>Trinidad and Tobago</option>
                        <option value="TN" {{ ($users->country == 'TN') ? 'selected' : ''}}>Tunisia</option>
                        <option value="TR" {{ ($users->country == 'TR') ? 'selected' : ''}}>Turkey</option>
                        <option value="TM" {{ ($users->country == 'TM') ? 'selected' : ''}}>Turkmenistan</option>
                        <option value="TC" {{ ($users->country == 'TC') ? 'selected' : ''}}>Turks and Caicos Islands</option>
                        <option value="TV" {{ ($users->country == 'TV') ? 'selected' : ''}}>Tuvalu</option>
                        <option value="UG" {{ ($users->country == 'UG') ? 'selected' : ''}}>Uganda</option>
                        <option value="UA" {{ ($users->country == 'UA') ? 'selected' : ''}}>Ukraine</option>
                        <option value="AE" {{ ($users->country == 'AE') ? 'selected' : ''}}>United Arab Emirates</option>
                        <option value="GB" {{ ($users->country == 'GB') ? 'selected' : ''}}>United Kingdom</option>
                        <option value="US" {{ ($users->country == 'US') ? 'selected' : ''}}>United States</option>
                        <option value="UM" {{ ($users->country == 'UM') ? 'selected' : ''}}>United States Minor Outlying Islands</option>
                        <option value="UY" {{ ($users->country == 'UY') ? 'selected' : ''}}>Uruguay</option>
                        <option value="UZ" {{ ($users->country == 'UZ') ? 'selected' : ''}}>Uzbekistan</option>
                        <option value="VU" {{ ($users->country == 'VU') ? 'selected' : ''}}>Vanuatu</option>
                        <option value="VE" {{ ($users->country == 'VE') ? 'selected' : ''}}>Venezuela</option>
                        <option value="VN" {{ ($users->country == 'VN') ? 'selected' : ''}}>Viet Nam</option>
                        <option value="VG" {{ ($users->country == 'VG') ? 'selected' : ''}}>Virgin Islands (British)</option>
                        <option value="VI" {{ ($users->country == 'VI') ? 'selected' : ''}}>Virgin Islands (U.S.)</option>
                        <option value="WF" {{ ($users->country == 'WF') ? 'selected' : ''}}>Wallis and Futuna Islands</option>
                        <option value="EH" {{ ($users->country == 'EH') ? 'selected' : ''}}>Western Sahara</option>
                        <option value="YE" {{ ($users->country == 'YE') ? 'selected' : ''}}>Yemen</option>
                        <option value="ZM" {{ ($users->country == 'ZM') ? 'selected' : ''}}>Zambia</option>
                        <option value="ZW" {{ ($users->country == 'ZW') ? 'selected' : ''}}>Zimbabwe</option>
                    </select>
          <span class="label label-danger">{{ $errors->first('country', ':message') }}</span>
    </div>
  </div>
    
    
   <div class="form-group{{ $errors->first('email', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label"> Email <span class="error">*</span></label>
    <div class="col-lg-9 col-md-9"> 
        {!! Form::text('email',$users->email, ['class' => 'form-control form-cascade-control input-small'])  !!} 
          <span class="label label-danger">{{ $errors->first('email', ':message') }}</span>
    </div>
  </div>
    
   <div class="form-group{{ $errors->first('password', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label"> Password <span class="error">*</span></label>
    <div class="col-lg-9 col-md-9"> 
        {!! Form::text('password',null, ['class' => 'form-control form-cascade-control input-small','placeholder'=>'******'])  !!} 
          <span class="label label-danger">{{ $errors->first('password', ':message') }}</span>
    </div>
  </div> 
    
  <div class="form-group{{ $errors->first('image', ' has-error') }}">
    <label class="col-lg-3 col-md-3 control-label"> Profile Picture <span class="error"></span></label>
    <div class="col-lg-9 col-md-9"> 
        <input type="file"  class="form-control" name="image">
          <span class="label label-danger">{{ $errors->first('image', ':message') }}</span>
    </div>
  </div>
    
    
  <div class="form-group">
      <label class="col-lg-3 col-md-3 control-label"></label>
      <div class="col-lg-9 col-md-9">
          {!! Form::submit('Update', ['class'=>'btn btn-primary text-white']) !!}
      </div>
  </div> 
