
<div class="col-md-6">

    <div class="form-group{{ $errors->first('full_name', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Full Name <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('full_name',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('full_name', ':message') }}</span>
        </div>
    </div> 
    <div class="form-group{{ $errors->first('company_name', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Company Name <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('company_name',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('company_name', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('phone', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Phone</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('phone',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('phone', ':message') }}</span>
        </div>
    </div>

    <div class="form-group{{ $errors->first('email', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Email</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::email('email',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('email', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>
    
    <div class="form-group{{ $errors->first('address', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Address</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('address',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('address', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('city', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">City</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('city',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('city', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('country', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Country</label>
        <div class="col-lg-8 col-md-8">             
            <select name="country" id="country_list" class="form-control" tabindex="-1" aria-hidden="true">
                        <option value="">Select Country</option>
                        <option value="AF" {{ ($vendor->country == 'AF') ? 'selected' : ''}} >Afghanistan</option>
                        <option value="AL" {{ ($vendor->country == 'AL') ? 'selected' : ''}}>Albania</option>
                        <option value="DZ" {{ ($vendor->country == 'DZ') ? 'selected' : ''}}>Algeria</option>
                        <option value="AS" {{ ($vendor->country == 'AS') ? 'selected' : ''}}>American Samoa</option>
                        <option value="AD" {{ ($vendor->country == 'AD') ? 'selected' : ''}}>Andorra</option>
                        <option value="AO" {{ ($vendor->country == 'AO') ? 'selected' : ''}}>Angola</option>
                        <option value="AI" {{ ($vendor->country == 'AI') ? 'selected' : ''}}>Anguilla</option>
                        <option value="AR" {{ ($vendor->country == 'AR') ? 'selected' : ''}}>Argentina</option>
                        <option value="AM" {{ ($vendor->country == 'AM') ? 'selected' : ''}}>Armenia</option>
                        <option value="AW" {{ ($vendor->country == 'AW') ? 'selected' : ''}}>Aruba</option>
                        <option value="AU" {{ ($vendor->country == 'AU') ? 'selected' : ''}}>Australia</option>
                        <option value="AT" {{ ($vendor->country == 'AT') ? 'selected' : ''}}>Austria</option>
                        <option value="AZ" {{ ($vendor->country == 'AZ') ? 'selected' : ''}}>Azerbaijan</option>
                        <option value="BS" {{ ($vendor->country == 'BS') ? 'selected' : ''}}>Bahamas</option>
                        <option value="BH" {{ ($vendor->country == 'BH') ? 'selected' : ''}}>Bahrain</option>
                        <option value="BD" {{ ($vendor->country == 'BD') ? 'selected' : ''}}>Bangladesh</option>
                        <option value="BB" {{ ($vendor->country == 'BB') ? 'selected' : ''}}>Barbados</option>
                        <option value="BY" {{ ($vendor->country == 'BY') ? 'selected' : ''}}>Belarus</option>
                        <option value="BE" {{ ($vendor->country == 'BE') ? 'selected' : ''}}>Belgium</option>
                        <option value="BZ" {{ ($vendor->country == 'BZ') ? 'selected' : ''}}>Belize</option>
                        <option value="BJ" {{ ($vendor->country == 'BJ') ? 'selected' : ''}}>Benin</option>
                        <option value="BM" {{ ($vendor->country == 'BM') ? 'selected' : ''}}>Bermuda</option>
                        <option value="BT" {{ ($vendor->country == 'BT') ? 'selected' : ''}}>Bhutan</option>
                        <option value="BO" {{ ($vendor->country == 'BO') ? 'selected' : ''}}>Bolivia</option>
                        <option value="BA" {{ ($vendor->country == 'BA') ? 'selected' : ''}}>Bosnia and Herzegowina</option>
                        <option value="BW" {{ ($vendor->country == 'BW') ? 'selected' : ''}}>Botswana</option>
                        <option value="BV" {{ ($vendor->country == 'BV') ? 'selected' : ''}}>Bouvet Island</option>
                        <option value="BR" {{ ($vendor->country == 'BR') ? 'selected' : ''}}>Brazil</option>
                        <option value="IO" {{ ($vendor->country == 'IO') ? 'selected' : ''}}>British Indian Ocean Territory</option>
                        <option value="BN" {{ ($vendor->country == 'BN') ? 'selected' : ''}}>Brunei Darussalam</option>
                        <option value="BG" {{ ($vendor->country == 'BG') ? 'selected' : ''}}>Bulgaria</option>
                        <option value="BF" {{ ($vendor->country == 'BF') ? 'selected' : ''}}>Burkina Faso</option>
                        <option value="BI" {{ ($vendor->country == 'BI') ? 'selected' : ''}}>Burundi</option>
                        <option value="KH" {{ ($vendor->country == 'KH') ? 'selected' : ''}}>Cambodia</option>
                        <option value="CM" {{ ($vendor->country == 'CM') ? 'selected' : ''}}>Cameroon</option>
                        <option value="CA" {{ ($vendor->country == 'CA') ? 'selected' : ''}}>Canada</option>
                        <option value="CV" {{ ($vendor->country == 'CV') ? 'selected' : ''}}>Cape Verde</option>
                        <option value="KY" {{ ($vendor->country == 'KY') ? 'selected' : ''}}>Cayman Islands</option>
                        <option value="CF" {{ ($vendor->country == 'CF') ? 'selected' : ''}}>Central African Republic</option>
                        <option value="TD" {{ ($vendor->country == 'TD') ? 'selected' : ''}}>Chad</option>
                        <option value="CL" {{ ($vendor->country == 'CL') ? 'selected' : ''}}>Chile</option>
                        <option value="CN" {{ ($vendor->country == 'CN') ? 'selected' : ''}}>China</option>
                        <option value="CX" {{ ($vendor->country == 'CX') ? 'selected' : ''}}>Christmas Island</option>
                        <option value="CC" {{ ($vendor->country == 'CC') ? 'selected' : ''}}>Cocos (Keeling) Islands</option>
                        <option value="CO" {{ ($vendor->country == 'CO') ? 'selected' : ''}}>Colombia</option>
                        <option value="KM" {{ ($vendor->country == 'KM') ? 'selected' : ''}}>Comoros</option>
                        <option value="CG" {{ ($vendor->country == 'CG') ? 'selected' : ''}}>Congo</option>
                        <option value="CD" {{ ($vendor->country == 'CD') ? 'selected' : ''}}>Congo, the Democratic Republic of the</option>
                        <option value="CK" {{ ($vendor->country == 'CK') ? 'selected' : ''}}>Cook Islands</option>
                        <option value="CR" {{ ($vendor->country == 'CR') ? 'selected' : ''}}>Costa Rica</option>
                        <option value="CI" {{ ($vendor->country == 'CI') ? 'selected' : ''}}>Cote d'Ivoire</option>
                        <option value="HR" {{ ($vendor->country == 'HR') ? 'selected' : ''}}>Croatia (Hrvatska)</option>
                        <option value="CU" {{ ($vendor->country == 'CU') ? 'selected' : ''}}>Cuba</option>
                        <option value="CY" {{ ($vendor->country == 'CY') ? 'selected' : ''}}>Cyprus</option>
                        <option value="CZ" {{ ($vendor->country == 'CZ') ? 'selected' : ''}}>Czech Republic</option>
                        <option value="DK" {{ ($vendor->country == 'DK') ? 'selected' : ''}}>Denmark</option>
                        <option value="DJ" {{ ($vendor->country == 'DJ') ? 'selected' : ''}}>Djibouti</option>
                        <option value="DM" {{ ($vendor->country == 'DM') ? 'selected' : ''}}>Dominica</option>
                        <option value="DO" {{ ($vendor->country == 'DO') ? 'selected' : ''}}>Dominican Republic</option>
                        <option value="EC" {{ ($vendor->country == 'EC') ? 'selected' : ''}}>Ecuador</option>
                        <option value="EG" {{ ($vendor->country == 'EG') ? 'selected' : ''}}>Egypt</option>
                        <option value="SV" {{ ($vendor->country == 'SV') ? 'selected' : ''}}>El Salvador</option>
                        <option value="GQ" {{ ($vendor->country == 'GQ') ? 'selected' : ''}}>Equatorial Guinea</option>
                        <option value="ER" {{ ($vendor->country == 'ER') ? 'selected' : ''}}>Eritrea</option>
                        <option value="EE" {{ ($vendor->country == 'EE') ? 'selected' : ''}}>Estonia</option>
                        <option value="ET" {{ ($vendor->country == 'ET') ? 'selected' : ''}}>Ethiopia</option>
                        <option value="FK" {{ ($vendor->country == 'FK') ? 'selected' : ''}}>Falkland Islands (Malvinas)</option>
                        <option value="FO" {{ ($vendor->country == 'FO') ? 'selected' : ''}}>Faroe Islands</option>
                        <option value="FJ" {{ ($vendor->country == 'FJ') ? 'selected' : ''}}>Fiji</option>
                        <option value="FI" {{ ($vendor->country == 'FI') ? 'selected' : ''}}>Finland</option>
                        <option value="FR" {{ ($vendor->country == 'FR') ? 'selected' : ''}}>France</option>
                        <option value="GF" {{ ($vendor->country == 'GF') ? 'selected' : ''}}>French Guiana</option>
                        <option value="PF" {{ ($vendor->country == 'PF') ? 'selected' : ''}}>French Polynesia</option>
                        <option value="TF" {{ ($vendor->country == 'TF') ? 'selected' : ''}}>French Southern Territories</option>
                        <option value="GA" {{ ($vendor->country == 'GA') ? 'selected' : ''}}>Gabon</option>
                        <option value="GM" {{ ($vendor->country == 'GM') ? 'selected' : ''}}>Gambia</option>
                        <option value="GE" {{ ($vendor->country == 'GE') ? 'selected' : ''}}>Georgia</option>
                        <option value="DE" {{ ($vendor->country == 'DE') ? 'selected' : ''}}>Germany</option>
                        <option value="GH" {{ ($vendor->country == 'GH') ? 'selected' : ''}}>Ghana</option>
                        <option value="GI" {{ ($vendor->country == 'GI') ? 'selected' : ''}}>Gibraltar</option>
                        <option value="GR" {{ ($vendor->country == 'GR') ? 'selected' : ''}}>Greece</option>
                        <option value="GL" {{ ($vendor->country == 'GL') ? 'selected' : ''}}>Greenland</option>
                        <option value="GD" {{ ($vendor->country == 'GD') ? 'selected' : ''}}>Grenada</option>
                        <option value="GP" {{ ($vendor->country == 'GP') ? 'selected' : ''}}>Guadeloupe</option>
                        <option value="GU" {{ ($vendor->country == 'GU') ? 'selected' : ''}}>Guam</option>
                        <option value="GT" {{ ($vendor->country == 'GT') ? 'selected' : ''}}>Guatemala</option>
                        <option value="GN" {{ ($vendor->country == 'GN') ? 'selected' : ''}}>Guinea</option>
                        <option value="GW" {{ ($vendor->country == 'GW') ? 'selected' : ''}}>Guinea-Bissau</option>
                        <option value="GY" {{ ($vendor->country == 'GY') ? 'selected' : ''}}>Guyana</option>
                        <option value="HT" {{ ($vendor->country == 'HT') ? 'selected' : ''}}>Haiti</option>
                        <option value="HM" {{ ($vendor->country == 'HM') ? 'selected' : ''}}>Heard and Mc Donald Islands</option>
                        <option value="VA" {{ ($vendor->country == 'VA') ? 'selected' : ''}}>Holy See (Vatican City State)</option>
                        <option value="HN" {{ ($vendor->country == 'HN') ? 'selected' : ''}}>Honduras</option>
                        <option value="HK" {{ ($vendor->country == 'HK') ? 'selected' : ''}}>Hong Kong</option>
                        <option value="HU" {{ ($vendor->country == 'HU') ? 'selected' : ''}}>Hungary</option>
                        <option value="IS" {{ ($vendor->country == 'IS') ? 'selected' : ''}}>Iceland</option>
                        <option value="IN" {{ ($vendor->country == 'IN') ? 'selected' : ''}}>India</option>
                        <option value="ID" {{ ($vendor->country == 'ID') ? 'selected' : ''}}>Indonesia</option>
                        <option value="IR" {{ ($vendor->country == 'IR') ? 'selected' : ''}}>Iran (Islamic Republic of)</option>
                        <option value="IQ" {{ ($vendor->country == 'IQ') ? 'selected' : ''}}>Iraq</option>
                        <option value="IE" {{ ($vendor->country == 'IE') ? 'selected' : ''}}>Ireland</option>
                        <option value="IL" {{ ($vendor->country == 'IL') ? 'selected' : ''}}>Israel</option>
                        <option value="IT" {{ ($vendor->country == 'IT') ? 'selected' : ''}}>Italy</option>
                        <option value="JM" {{ ($vendor->country == 'JM') ? 'selected' : ''}}>Jamaica</option>
                        <option value="JP" {{ ($vendor->country == 'JP') ? 'selected' : ''}}>Japan</option>
                        <option value="JO" {{ ($vendor->country == 'JO') ? 'selected' : ''}}>Jordan</option>
                        <option value="KZ" {{ ($vendor->country == 'KZ') ? 'selected' : ''}}>Kazakhstan</option>
                        <option value="KE" {{ ($vendor->country == 'KE') ? 'selected' : ''}}>Kenya</option>
                        <option value="KI" {{ ($vendor->country == 'KI') ? 'selected' : ''}}>Kiribati</option>
                        <option value="KP" {{ ($vendor->country == 'KP') ? 'selected' : ''}}>Korea, Democratic People's Republic of</option>
                        <option value="KR" {{ ($vendor->country == 'KR') ? 'selected' : ''}}>Korea, Republic of</option>
                        <option value="KW" {{ ($vendor->country == 'KW') ? 'selected' : ''}}>Kuwait</option>
                        <option value="KG" {{ ($vendor->country == 'KG') ? 'selected' : ''}}>Kyrgyzstan</option>
                        <option value="LA" {{ ($vendor->country == 'LA') ? 'selected' : ''}}>Lao People's Democratic Republic</option>
                        <option value="LV" {{ ($vendor->country == 'LV') ? 'selected' : ''}}>Latvia</option>
                        <option value="LB" {{ ($vendor->country == 'LB') ? 'selected' : ''}}>Lebanon</option>
                        <option value="LS" {{ ($vendor->country == 'LS') ? 'selected' : ''}}>Lesotho</option>
                        <option value="LR" {{ ($vendor->country == 'LR') ? 'selected' : ''}}>Liberia</option>
                        <option value="LY" {{ ($vendor->country == 'LY') ? 'selected' : ''}}>Libyan Arab Jamahiriya</option>
                        <option value="LI" {{ ($vendor->country == 'LI') ? 'selected' : ''}}>Liechtenstein</option>
                        <option value="LT" {{ ($vendor->country == 'LT') ? 'selected' : ''}}>Lithuania</option>
                        <option value="LU" {{ ($vendor->country == 'LU') ? 'selected' : ''}}>Luxembourg</option>
                        <option value="MO" {{ ($vendor->country == 'MO') ? 'selected' : ''}}>Macau</option>
                        <option value="MK" {{ ($vendor->country == 'MK') ? 'selected' : ''}}>Macedonia, The Former Yugoslav Republic of</option>
                        <option value="MG" {{ ($vendor->country == 'MG') ? 'selected' : ''}}>Madagascar</option>
                        <option value="MW" {{ ($vendor->country == 'MW') ? 'selected' : ''}}>Malawi</option>
                        <option value="MY" {{ ($vendor->country == 'MY') ? 'selected' : ''}}>Malaysia</option>
                        <option value="MV" {{ ($vendor->country == 'MV') ? 'selected' : ''}}>Maldives</option>
                        <option value="ML" {{ ($vendor->country == 'ML') ? 'selected' : ''}}>Mali</option>
                        <option value="MT" {{ ($vendor->country == 'MT') ? 'selected' : ''}}>Malta</option>
                        <option value="MH" {{ ($vendor->country == 'MH') ? 'selected' : ''}}>Marshall Islands</option>
                        <option value="MQ" {{ ($vendor->country == 'MQ') ? 'selected' : ''}}>Martinique</option>
                        <option value="MR" {{ ($vendor->country == 'MR') ? 'selected' : ''}}>Mauritania</option>
                        <option value="MU" {{ ($vendor->country == 'MU') ? 'selected' : ''}}>Mauritius</option>
                        <option value="YT" {{ ($vendor->country == 'YT') ? 'selected' : ''}}>Mayotte</option>
                        <option value="MX" {{ ($vendor->country == 'MX') ? 'selected' : ''}}>Mexico</option>
                        <option value="FM" {{ ($vendor->country == 'FM') ? 'selected' : ''}}>Micronesia, Federated States of</option>
                        <option value="MD" {{ ($vendor->country == 'MD') ? 'selected' : ''}}>Moldova, Republic of</option>
                        <option value="MC" {{ ($vendor->country == 'MC') ? 'selected' : ''}}>Monaco</option>
                        <option value="MN" {{ ($vendor->country == 'MN') ? 'selected' : ''}}>Mongolia</option>
                        <option value="MS" {{ ($vendor->country == 'MS') ? 'selected' : ''}}>Montserrat</option>
                        <option value="MA" {{ ($vendor->country == 'MA') ? 'selected' : ''}}>Morocco</option>
                        <option value="MZ" {{ ($vendor->country == 'MZ') ? 'selected' : ''}}>Mozambique</option>
                        <option value="MM" {{ ($vendor->country == 'MM') ? 'selected' : ''}}>Myanmar</option>
                        <option value="NA" {{ ($vendor->country == 'NA') ? 'selected' : ''}}>Namibia</option>
                        <option value="NR" {{ ($vendor->country == 'NR') ? 'selected' : ''}}>Nauru</option>
                        <option value="NP" {{ ($vendor->country == 'NP') ? 'selected' : ''}}>Nepal</option>
                        <option value="NL" {{ ($vendor->country == 'NL') ? 'selected' : ''}}>Netherlands</option>
                        <option value="AN" {{ ($vendor->country == 'AN') ? 'selected' : ''}}>Netherlands Antilles</option>
                        <option value="NC" {{ ($vendor->country == 'NC') ? 'selected' : ''}}>New Caledonia</option>
                        <option value="NZ" {{ ($vendor->country == 'NZ') ? 'selected' : ''}}>New Zealand</option>
                        <option value="NI" {{ ($vendor->country == 'NI') ? 'selected' : ''}}>Nicaragua</option>
                        <option value="NE" {{ ($vendor->country == 'NE') ? 'selected' : ''}}>Niger</option>
                        <option value="NG" {{ ($vendor->country == 'NG') ? 'selected' : ''}}>Nigeria</option>
                        <option value="NU" {{ ($vendor->country == 'NU') ? 'selected' : ''}}>Niue</option>
                        <option value="NF" {{ ($vendor->country == 'NF') ? 'selected' : ''}}>Norfolk Island</option>
                        <option value="MP" {{ ($vendor->country == 'MP') ? 'selected' : ''}}>Northern Mariana Islands</option>
                        <option value="NO" {{ ($vendor->country == 'NO') ? 'selected' : ''}}>Norway</option>
                        <option value="OM" {{ ($vendor->country == 'OM') ? 'selected' : ''}}>Oman</option>
                        <option value="PK" {{ ($vendor->country == 'PK') ? 'selected' : ''}}>Pakistan</option>
                        <option value="PW" {{ ($vendor->country == 'PW') ? 'selected' : ''}}>Palau</option>
                        <option value="PA" {{ ($vendor->country == 'PA') ? 'selected' : ''}}>Panama</option>
                        <option value="PG" {{ ($vendor->country == 'PG') ? 'selected' : ''}}>Papua New Guinea</option>
                        <option value="PY" {{ ($vendor->country == 'PY') ? 'selected' : ''}}>Paraguay</option>
                        <option value="PE" {{ ($vendor->country == 'PE') ? 'selected' : ''}}>Peru</option>
                        <option value="PH" {{ ($vendor->country == 'PH') ? 'selected' : ''}}>Philippines</option>
                        <option value="PN" {{ ($vendor->country == 'PN') ? 'selected' : ''}}>Pitcairn</option>
                        <option value="PL" {{ ($vendor->country == 'PL') ? 'selected' : ''}}>Poland</option>
                        <option value="PT" {{ ($vendor->country == 'PT') ? 'selected' : ''}}>Portugal</option>
                        <option value="PR" {{ ($vendor->country == 'PR') ? 'selected' : ''}}>Puerto Rico</option>
                        <option value="QA" {{ ($vendor->country == 'QA') ? 'selected' : ''}}>Qatar</option>
                        <option value="RE" {{ ($vendor->country == 'RE') ? 'selected' : ''}}>Reunion</option>
                        <option value="RO" {{ ($vendor->country == 'RO') ? 'selected' : ''}}>Romania</option>
                        <option value="RU" {{ ($vendor->country == 'RU') ? 'selected' : ''}}>Russian Federation</option>
                        <option value="RW" {{ ($vendor->country == 'RW') ? 'selected' : ''}}>Rwanda</option>
                        <option value="KN" {{ ($vendor->country == 'KN') ? 'selected' : ''}}>Saint Kitts and Nevis</option>
                        <option value="LC" {{ ($vendor->country == 'LC') ? 'selected' : ''}}>Saint LUCIA</option>
                        <option value="VC" {{ ($vendor->country == 'VC') ? 'selected' : ''}}>Saint Vincent and the Grenadines</option>
                        <option value="WS" {{ ($vendor->country == 'WS') ? 'selected' : ''}}>Samoa</option>
                        <option value="SM" {{ ($vendor->country == 'SM') ? 'selected' : ''}}>San Marino</option>
                        <option value="ST" {{ ($vendor->country == 'ST') ? 'selected' : ''}}>Sao Tome and Principe</option>
                        <option value="SA" {{ ($vendor->country == 'SA') ? 'selected' : ''}}>Saudi Arabia</option>
                        <option value="SN" {{ ($vendor->country == 'SN') ? 'selected' : ''}}>Senegal</option>
                        <option value="SC" {{ ($vendor->country == 'SC') ? 'selected' : ''}}>Seychelles</option>
                        <option value="SL" {{ ($vendor->country == 'SL') ? 'selected' : ''}}>Sierra Leone</option>
                        <option value="SG" {{ ($vendor->country == 'SG') ? 'selected' : ''}}>Singapore</option>
                        <option value="SK" {{ ($vendor->country == 'SK') ? 'selected' : ''}}>Slovakia (Slovak Republic)</option>
                        <option value="SI" {{ ($vendor->country == 'SI') ? 'selected' : ''}}>Slovenia</option>
                        <option value="SB" {{ ($vendor->country == 'SB') ? 'selected' : ''}}>Solomon Islands</option>
                        <option value="SO" {{ ($vendor->country == 'SO') ? 'selected' : ''}}>Somalia</option>
                        <option value="ZA" {{ ($vendor->country == 'ZA') ? 'selected' : ''}}>South Africa</option>
                        <option value="GS" {{ ($vendor->country == 'GS') ? 'selected' : ''}}>South Georgia and the South Sandwich Islands</option>
                        <option value="ES" {{ ($vendor->country == 'ES') ? 'selected' : ''}}>Spain</option>
                        <option value="LK" {{ ($vendor->country == 'LK') ? 'selected' : ''}}>Sri Lanka</option>
                        <option value="SH" {{ ($vendor->country == 'SH') ? 'selected' : ''}}>St. Helena</option>
                        <option value="PM" {{ ($vendor->country == 'PM') ? 'selected' : ''}}>St. Pierre and Miquelon</option>
                        <option value="SD" {{ ($vendor->country == 'SD') ? 'selected' : ''}}>Sudan</option>
                        <option value="SR" {{ ($vendor->country == 'SR') ? 'selected' : ''}}>Suriname</option>
                        <option value="SJ" {{ ($vendor->country == 'SJ') ? 'selected' : ''}}>Svalbard and Jan Mayen Islands</option>
                        <option value="SZ" {{ ($vendor->country == 'SZ') ? 'selected' : ''}}>Swaziland</option>
                        <option value="SE" {{ ($vendor->country == 'SE') ? 'selected' : ''}}>Sweden</option>
                        <option value="CH" {{ ($vendor->country == 'CH') ? 'selected' : ''}}>Switzerland</option>
                        <option value="SY" {{ ($vendor->country == 'SY') ? 'selected' : ''}}>Syrian Arab Republic</option>
                        <option value="TW" {{ ($vendor->country == 'TW') ? 'selected' : ''}}>Taiwan, Province of China</option>
                        <option value="TJ" {{ ($vendor->country == 'TJ') ? 'selected' : ''}}>Tajikistan</option>
                        <option value="TZ" {{ ($vendor->country == 'TZ') ? 'selected' : ''}}>Tanzania, United Republic of</option>
                        <option value="TH" {{ ($vendor->country == 'TH') ? 'selected' : ''}}>Thailand</option>
                        <option value="TG" {{ ($vendor->country == 'TG') ? 'selected' : ''}}>Togo</option>
                        <option value="TK" {{ ($vendor->country == 'TK') ? 'selected' : ''}}>Tokelau</option>
                        <option value="TO" {{ ($vendor->country == 'TO') ? 'selected' : ''}}>Tonga</option>
                        <option value="TT" {{ ($vendor->country == 'TT') ? 'selected' : ''}}>Trinidad and Tobago</option>
                        <option value="TN" {{ ($vendor->country == 'TN') ? 'selected' : ''}}>Tunisia</option>
                        <option value="TR" {{ ($vendor->country == 'TR') ? 'selected' : ''}}>Turkey</option>
                        <option value="TM" {{ ($vendor->country == 'TM') ? 'selected' : ''}}>Turkmenistan</option>
                        <option value="TC" {{ ($vendor->country == 'TC') ? 'selected' : ''}}>Turks and Caicos Islands</option>
                        <option value="TV" {{ ($vendor->country == 'TV') ? 'selected' : ''}}>Tuvalu</option>
                        <option value="UG" {{ ($vendor->country == 'UG') ? 'selected' : ''}}>Uganda</option>
                        <option value="UA" {{ ($vendor->country == 'UA') ? 'selected' : ''}}>Ukraine</option>
                        <option value="AE" {{ ($vendor->country == 'AE') ? 'selected' : ''}}>United Arab Emirates</option>
                        <option value="GB" {{ ($vendor->country == 'GB') ? 'selected' : ''}}>United Kingdom</option>
                        <option value="US" {{ ($vendor->country == 'US') ? 'selected' : ''}}>United States</option>
                        <option value="UM" {{ ($vendor->country == 'UM') ? 'selected' : ''}}>United States Minor Outlying Islands</option>
                        <option value="UY" {{ ($vendor->country == 'UY') ? 'selected' : ''}}>Uruguay</option>
                        <option value="UZ" {{ ($vendor->country == 'UZ') ? 'selected' : ''}}>Uzbekistan</option>
                        <option value="VU" {{ ($vendor->country == 'VU') ? 'selected' : ''}}>Vanuatu</option>
                        <option value="VE" {{ ($vendor->country == 'VE') ? 'selected' : ''}}>Venezuela</option>
                        <option value="VN" {{ ($vendor->country == 'VN') ? 'selected' : ''}}>Viet Nam</option>
                        <option value="VG" {{ ($vendor->country == 'VG') ? 'selected' : ''}}>Virgin Islands (British)</option>
                        <option value="VI" {{ ($vendor->country == 'VI') ? 'selected' : ''}}>Virgin Islands (U.S.)</option>
                        <option value="WF" {{ ($vendor->country == 'WF') ? 'selected' : ''}}>Wallis and Futuna Islands</option>
                        <option value="EH" {{ ($vendor->country == 'EH') ? 'selected' : ''}}>Western Sahara</option>
                        <option value="YE" {{ ($vendor->country == 'YE') ? 'selected' : ''}}>Yemen</option>
                        <option value="ZM" {{ ($vendor->country == 'ZM') ? 'selected' : ''}}>Zambia</option>
                        <option value="ZW" {{ ($vendor->country == 'ZW') ? 'selected' : ''}}>Zimbabwe</option>
                    </select>
            <span class="label label-danger">{{ $errors->first('country', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('iban', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">IBAN</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('iban',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('iban', ':message') }}</span>
            
        </div>
    </div>
    <div class="form-group{{ $errors->first('password', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Password</label>
        <div class="col-lg-8 col-md-8">   
            <input type="password" name="password" id="password" class="form-control form-cascade-control input-small" value="">
            <span class="label label-danger">{{ $errors->first('password', ':message') }}</span>
        </div>
    </div> 
     
    
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('vendor')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 