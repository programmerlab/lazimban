@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
		
        <h1>Home</h1>
        @stop

        @section('content')
            @include('partials.breadcrumb')
            <div id="main" class="site-main">
              	<div class="page-wrapper">
                	@if(session()->has('message1'))
                        <div class="alert alert-success">
                            {{ session()->get('message1') }} <a href="{{ url('/checkout') }}"><button class="btn btn-success">Sepeti Görüntüle</button>
                                </a>
                        </div>
                    @endif
                    <div class="col-md-6 col-sm-6">
                    	<!--<div class='zoom ex1' id='ex1'>
                            <img src="{{ asset('storage/uploads/products/'. $product->photo) }}"/>
                        </div>-->
                        <div class="ubislider-image-container" data-ubislider="#slider4" id="imageSlider4"></div>
		                <div id="slider4" class="ubislider">
		                    <a class="arrow prev"></a>
		                    <a class="arrow next"></a>
		                    <ul id="gal1" class="ubislider-inner">
		                    	<li> 
		                    		<a> 
		                    			<img class="product-v-img" src="{{ asset('storage/uploads/products/'. $product->photo) }}" alt="{{ $product->img_alt }}" title="{{ $product->img_alt }}"> 
		                    		</a> 
		                    	</li>
                                @if(!empty($product->additional_images))
                                    @foreach(json_decode($product->additional_images) as $rows)                                        
                                        <li> 
                                            <a> 
                                                <img class="product-v-img" src="{{ asset('storage/uploads/products/'. $rows) }}"> 
                                            </a> 
                                        </li>
                                    @endforeach                                        
                                 @endif    
		                    			                    	
		                    </ul>
		                </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    	<div class="product_discription">
                        	<h1 class="product_name">{{$product->product_title}}</h1>
                            <h3 class="product_price"><font style="vertical-align: inherit;">₺</font> {{$product->price-($product->price*$product->discount/100)}}  </h3> <h5><p style="text-decoration: line-through"><font style="vertical-align: inherit;">₺</font> {{$product->price}}</p></h5>
                            <table class="variations" cellspacing="0">
                                <tbody>
                                        <!--<tr>
                                            <td ><label for="pa_beden">Qty</label></td>
                                            <td>
                                                <select id="pa_beden" class="" name="attribute_pa_beden" data-attribute_name="attribute_pa_beden" data-show_option_none="yes"><option value="">Bir seçim yapın</option><option value="xxs" class="attached enabled">XXS</option><option value="xs" class="attached enabled">XS</option><option value="s" class="attached enabled">S</option><option value="l" class="attached enabled">L</option><option value="m" class="attached enabled">M</option><option value="xl" class="attached enabled">XL</option><option value="xxl" class="attached enabled">XXL</option></select><a class="reset_variations" href="#" style="visibility: hidden;">Temizle</a>						</td>
                                        </tr>-->
                                </tbody>
                            </table>
							<?php $size = []; if(isset(json_decode($product->options)->size)) { $size = (json_decode($product->options)->size); }?>
							<?php $color = []; if(isset(json_decode($product->options)->color)) { $color = (json_decode($product->options)->color); }?>
							<?php $sizes = []; $colors = []; ?>
							<?php foreach($variations as $size){ if($size->size) { $sizes[] = $size->size; } $s_quantity[] = $size->quantity; } ?>
							<?php foreach($variations as $color){ if($color->color) { $colors[] = $color->color; } $c_quantity[] = $color->quantity; } ?>
							
                            @if($product->qty)    
        					<div class="quantity_outer">
                            	<input type="number" value="1" onchange="updateCart(this.value)" min=1 id="number">
								@if((count($sizes) > 0) || (count($colors) > 0))
									<a href="{{ url(str_slug($product->product_title,'-').'/addToCart/'.$product->id) }}" id="addToCart" onclick="var s = check_option(); return false; if(!s) return false;">
								@else
									<a href="{{ url(str_slug($product->product_title,'-').'/addToCart/'.$product->id) }}" id="addToCart">
								@endif	
                                <button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed">Sepete Ekle</button></a>
                                
								
								@if((count($sizes) > 0) || (count($colors) > 0))								
									<a href="{{ url(str_slug($product->product_title,'-').'/buyNow/'.$product->id) }}" onclick="var s = check_option(); return false; if(!s) return false;">
								@else
									<a href="{{ url(str_slug($product->product_title,'-').'/buyNow/'.$product->id) }}" >
								@endif	
                                
                                <button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed">HEMEN AL</button></a>                                    
                            </div>
                            @else
                            <div class="quantity_outer">
                                <button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed">Out of Stock</button>                                                                
                            </div>    
                            @endif
                            <div class="category_list">
                            	<span><strong>Açıklama:</strong></span> <span>{!! ($product->short_description) !!}</span>                                
                            </div>
							
							@if(!empty($sizes))
								<div class="quantity_outer">
									<h5>Beden</h5>
									<?php $ss = []; ?>
									<div class="size_radio">
									@foreach($sizes as $key=>$s)
										<?php $quantity = $s_quantity[$key]; ?>
										@if(!in_array($s,$ss))
										<!--<input type="radio" name="product_size" id="product_size" value="{{ strtoupper($s) }}"  onclick="disable_color(this.value);"><span>{{ strtoupper($s) }}</span>-->
										<div class="radio">
											<input type="radio" class="allsize" name="product_size" id="product_size_{{$s}}" value="{{ strtoupper($s) }}"  onclick="disable_color(this.value);" title="{{ ($quantity <= 0)? 'Out of Stock':'available'}}">
											<label class="{{ strtolower($s) }} allsize" for="product_size_{{$s}}">{{ strtoupper($s) }}</label>
										</div>
										@endif
										<?php $ss[] = $s; ?>
									@endforeach
									</div>
								</div>
							@else
								<input type="radio" name="product_size" value="0" style="display:none" checked>
							@endif
							@if(!empty($colors))
								<div class="quantity_outer">
									<h5>Renk</h5>
									<?php $cc = []; ?>
									<div class="color_radio">
									@foreach($colors as $key=>$s)
										<?php $quantity = $c_quantity[$key]; ?>
										@if(!in_array($s,$cc))
										<!--<input type="radio" name="product_color" id="product_color" value="{{ strtoupper($s) }}" onclick="disable_size(this.value);"><span>{{ strtoupper($s) }}</span>-->
										<div class="radio">
											<input type="radio" class="allcolor" name="product_color" id="product_color_{{$s}}" value="{{ strtoupper($s) }}"  onclick="disable_size(this.value);" title="{{ ($quantity <= 0)? 'Out of Stock':'available'}}">
											@if(strtolower($s) == '777777')
												<label style="background-color:777777" class="c_{{ strtolower($s) }} allcolor" for="product_color_{{$s}}"></label>
											@else
												<label style="background-color:{{ strtolower($s) }}" class="c_{{ strtolower($s) }} allcolor" for="product_color_{{$s}}"></label>
											@endif
											
										</div>
										@endif
										<?php $cc[] = $s; ?>
									@endforeach
									</div>
								</div>
							@else
								<input type="radio" name="product_color" value="0" style="display:none" checked>
							@endif
							<div>
                                <h6>  @if($product->shipping_charge)
												 Shipping - {{ '₺ '.$product->shipping_charge }}
												@else  
												  Free Shipping
												@endif  
								</h6>
                                
                            </div>
                            <div>
                                <h6>Satıcı -  {{ ($helper->getVendorName($product->id)) ? $helper->getVendorName($product->id) : 'Admin' }}</h6>
                                
                            </div>
                            <div>
								<b>Paylaş:</b>
                                <a class="color1" title="Share it on Facebook" href="http://www.facebook.com/sharer.php?s=100&p[url]={{url()->current()}}&p[images][0]={{ asset('storage/uploads/products/'. $product->photo) }}&p[title]={{$product->product_title}}&p[summary]={!! str_limit($product->description,100) !!}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="http://twitter.com/share?text=Check out {{$product->product_title}} at Lazimbana.com!&url={{url()->current()}}&hashtags=Lazimbana" class="color2" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title={{$product->product_title}}&summary=Check out {{$product->product_title}} at Lazimbana.com!&source=LinkedIn" target="_blank" class="color4"><i class="fa fa-linkedin"></i></a>
                                <a href="https://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{ asset('storage/uploads/products/'. $product->photo) }}&description={!! str_limit($product->description,100) !!}" target="_blank" class="color5"><i class="fa fa-pinterest"></i></a>
                                
                            </div>    
                        </div>                        
                    </div>
                    
                    
                    	<div class="product_info">
                        	<div id="horizontalTab">
                                <ul class="resp-tabs-list">
                                    <li>Açıklama </li>
                                    <!--<li>Ek bilgi </li>-->
                                    <!--<li>Yorumlar (0) </li>-->
                                    <!--<li>Satıcı Bilgisi </li>-->
                                    <li>İlginizi Çekebilir </li>
                                     <li>Yorumlar</li> 
                                </ul>
                                <div class="resp-tabs-container">
                                        <div>
                                            <h2>Açıklama</h2>
                                            <p>{!! $product->description !!}.</p>
                                            <h6>Satıcı -  {{ ($helper->getVendorName($product->id)) ? $helper->getVendorName($product->id) : 'Admin' }}</h6>
                                        </div>
                                         
                                        <div>    
                                            <div class="owl-carousel owl-theme">
                                            @foreach($hot_products as $result)
                                                    <div class="item">
                                                         <a href="{{url($result->url)}}"><img src="{{ asset('storage/uploads/products/'. $result->photo) }}" alt="{{ $result->img_alt }}" title="{{ $result->img_alt }}">								
                                                            <h2>{{ $result->product_title }} </h2>
                                                            <h6>satıcı -  {{ ($helper->getVendorName($result->id)) ? $helper->getVendorName($result->id) : 'Admin' }}</h6>
                                                        </a>
                                                    </div>
                                            @endforeach 
                                            </div>  
                                        </div>

                                        <div>
                                               
                                        <?php 
                                            $comment= $helper->getComments($product->id);  
                                            ?>
                                            @if($comment)

                                            @foreach($comment as $rs)
                                            <p style="
    color: brown;
    background-color: beige;
    padding: 5px; margin: 3px; border-radius: 5px; 
"> <b>  {{ucfirst($rs->name)}}  </b> tarafından <b> {!! Carbon\Carbon::parse($rs->created_at)->format('d-M-Y'); !!}</b> tarihinde: <br>{{$rs->comments}} </p>
                                            @endforeach
                                            @endif
                                        </div>
                                         
                                </div>
                            </div>	
                        </div>
                    <hr>    
                    <div class="product-review-outer">
                        <div class="col-md-6">
                            <div class="product-review">
                                
                                           
                                       
                                        <h2>Yorum Yaz</h2>
                                        @if ($errors->has('successMsg'))
                                           <span class="btn btn-success">{{ $errors->first('successMsg') }} </span>
                                            
                                       @endif
								
                                       <div class="comment_form row" id="comments">
                                        <form class="contact-form" action="{{url('submitComment')}}" method="post">
                                           <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                                   <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                                        <div class="col-md-6">
                                           <span class="label label-danger" style="color:#ffffff">{{ $errors->first('name', ':message') }}</span> <br>
                                           <input class="input-text" type="text" placeholder="İsminiz" name="name" value="{{old('name')}}">
                                       </div>
                                           <div class="col-md-6">
                                               <span class="label label-danger" style="color:#ffffff">{{ $errors->first('email', ':message') }}</span> <br>
                                               <input class="input-text" type="email" placeholder="E-posta" name="email" value="{{old('email')}}">
                                           </div>
                                           <div class="col-md-12">
                                               <span class="label label-danger" style="color:#ffffff">{{ $errors->first('comments', ':message') }}</span> <br>
                                               <textarea class="input-text" placeholder="Yorumunuz" name="comments">{{old('comments')}}</textarea>  
                                           </div>
                                           <div class="col-md-12"><input value="Gönder" class="submit-btn" type="submit"></div>
                                       </div>
                                   </form>
                                      <h2  id="displayRating" data="{{$product->rating or 0}}">Ürün Puanı </h2>
       
                                   <div class="rating_outer"><span class="fa fa-star" id="star1" onclick="rating(1,{{$product->id}})"></span>
                                       <span class="fa fa-star" id="star2" onclick="rating(2,{{$product->id}})"></span>
                                       <span class="fa fa-star" id="star3" onclick="rating(3,{{$product->id}})"></span>
                                       <span class="fa fa-star" id="star4" onclick="rating(4,{{$product->id}})"></span>
                                       <span class="fa fa-star" id="star5" onclick="rating(5,{{$product->id}})"></span>
                                      <br> <span id="rating"></span>
                                   </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if($product->video){
                                $v1 = explode('=',$product->video);
                                $v2 = explode('/',$product->video);                                
                            }
                            ?>
                            
                            <iframe width="420" height="315"
                                src="https://www.youtube.com/embed/{{ isset($v1[1]) ? $v1[1] : (isset($v2[3]) ? $v2[3] : '') }}">
                            </iframe>
                        </div>
                    </div>
                    
                </div>
            </div>
        @stop
        
<style>
    .checked {
        color: orange;
    }
    .comment_form .input-text{ height:50px; margin-bottom:15px;}
    .comment_form textarea.input-text{ height:200px; resize:none;}
</style>
<script>
      function check_option(){	  
            var size = $("input[name='product_size']:checked").val();
			var color = $("input[name='product_color']:checked").val();
			//alert(size);
			var qty = ($('#number').val());
            if(size == '' || size == undefined){                  
                  alert('Lütfen beden seçin');
                  return false;                  
            }
			if(color == '' || color == undefined){                  
                  alert('Lütfen Renk Seçiniz');
                  return false;                  
            }
            //alert(size);
            var url = '{{ url(str_slug($product->product_title,'-').'/addToCart/'.$product->id) }}';
            $.ajax({
                       type: "GET",
                       url: url,
                       data: { size : size, color : color , qty : qty}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
						  <?php Session::flash('message', 'sepetinize başarıyla eklendi.'); ?>						  
                          location.reload();
                       }
                     });
            return false;
      }
    </script>
	<style>
		.radio label.disable_options {
			background:#f4f4f4 !important;
			border : 1px dashed #ccc !important;
			cursor : default !important;
		}
		
		.radio label.disable_options_outofstock {
			background:#f4f4f4 !important;
			border : 1px dashed #ccc !important;
			cursor : default !important;
		}
		
		.radio label.disable_options_outofstock:after{    position: absolute;
			content: "\f00d";
			left: 0;
			right: 0;
			margin: 0 auto;
			font-family: 'FontAwesome';
			top: 0;
			font-size: 11px;
			color: #dd3333;
			line-height: 16px;
			}
					
		
	</style>	
	<script>
		function disable_color(size){
			//alert(size);
			var url = '{{ url('check_variation') }}';
            $.ajax({
                       type: "POST",
                       url: url,
                       data: { size : size, product_id : {{ $product->id }} }, // serializes the form's elements.
					   dataType: 'json',
                       success: function(response)
                       {
                          console.log(response[0]);
								$('.allcolor').attr('disabled',false);
								$('.allcolor').removeClass('disable_options');
								$('.allcolor').removeClass('disable_options_outofstock');
								$('.allcolor').attr('title','');
								//$('.allcolor').css('background','red');
								$('.allsize').attr('disabled',false);
								$('.allsize').removeClass('disable_options');
								$('.allsize').removeClass('disable_options_outofstock');
								$('.allsize').attr('title','');
								
							for (var i = 0; i < response[0].length; i++) {
								$('#product_color_'+response[0][i]).attr('disabled',true);
								var clas = response[0][i].toLowerCase();
								$('.c_'+clas).addClass('disable_options');
								$('#product_color_'+response[0][i]).attr('checked',false);
							}
							
							for (var i = 0; i < response[1].length; i++) {
								var k = response[1][i].split(";");
								if(k[1] <= 0){
									console.log(response[1][i]);
									$('#product_color_'+k[0]).attr('disabled',true);									
									var clas = k[0].toLowerCase();
									$('.c_'+clas).addClass('disable_options_outofstock');
									$('.disable_options_outofstock').attr('title','Out of Stock');
								}								
							}
						  
                       }
                     });
            return false;
		}
		
		function disable_size(color){
			//alert(color);
			var url = '{{ url('check_variation_size') }}';
            $.ajax({
                       type: "POST",
                       url: url,
                       data: { color : color, product_id : {{ $product->id }} }, // serializes the form's elements.
					   dataType: 'json',
                       success: function(response)
                       {
                          console.log(response);
								$('.allsize').attr('disabled',false);
								$('.allsize').removeClass('disable_options');
								$('.allsize').removeClass('disable_options_outofstock');
								$('.allsize').attr('title','');
								//$('.allcolor').css('background','red');
								$('.allcolor').attr('disabled',false);
								$('.allcolor').removeClass('disable_options');
								$('.allcolor').removeClass('disable_options_outofstock');
								$('.allcolor').attr('title','');
								
							for (var i = 0; i < response[0].length; i++) {
								$('#product_size_'+response[0][i]).attr('disabled',true);
								var clas = response[0][i].toLowerCase();
								$('.'+clas).addClass('disable_options');
								$('#product_size_'+response[0][i]).attr('checked',false);
							}						  																
							
							for (var i = 0; i < response[1].length; i++) {
								var k = response[1][i].split(";");
								if(k[1] <= 0){
									console.log(response[1][i]);
									$('#product_size_'+k[0]).attr('disabled',true);
									var clas = k[0].toLowerCase();
									$('.'+clas).addClass('disable_options_outofstock');
									$('.disable_options_outofstock').attr('title','Out of Stock');
								}								
							}
                       }
                     });
            return false;
		}
	</script>
