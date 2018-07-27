@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content')
            @include('partials.breadcrumb')
            <div id="main" class="site-main">
              	<div class="page-wrapper">
                	@if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
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
		                    			<img class="product-v-img" src="{{ asset('storage/uploads/products/'. $product->photo) }}"> 
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
                            <h3 class="product_price">$ {{$product->price-($product->price*$product->discount/100)}}  </h3> <h5><p style="text-decoration: line-through">$ {{$product->price}}</p></h5>
                            <table class="variations" cellspacing="0">
                                <tbody>
                                        <!--<tr>
                                            <td ><label for="pa_beden">Qty</label></td>
                                            <td>
                                                <select id="pa_beden" class="" name="attribute_pa_beden" data-attribute_name="attribute_pa_beden" data-show_option_none="yes"><option value="">Bir seçim yapın</option><option value="xxs" class="attached enabled">XXS</option><option value="xs" class="attached enabled">XS</option><option value="s" class="attached enabled">S</option><option value="l" class="attached enabled">L</option><option value="m" class="attached enabled">M</option><option value="xl" class="attached enabled">XL</option><option value="xxl" class="attached enabled">XXL</option></select><a class="reset_variations" href="#" style="visibility: hidden;">Temizle</a>						</td>
                                        </tr>-->
                                </tbody>
                            </table>
        					<div class="quantity_outer">
                            	<input type="number" value="1" onchange="updateCart(this.value)" min=1>
                                 <a href="{{ url(str_slug($product->product_title,'-').'/addToCart/'.$product->id) }}" id="addToCart" >

                                <button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed">Sepete Ekle</button></a>
                                
                                <a href="{{ url(str_slug($product->product_title,'-').'/buyNow/'.$product->id) }}" >
                                <button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed">HEMEN AL</button></a>                                    
                            </div>
                            <div class="category_list">
                            	<span><strong>Açıklama:</strong></span> <span>{!! str_limit($product->description,100) !!}</span>                                
                            </div>
                            <div>
                                <h6>Satýcý -  {{ ($helper->getVendorName($product->id)) ? $helper->getVendorName($product->id) : 'Admin' }}</h6>
                                
                            </div>
                            <div><b>Pay:</b>
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
                                    <li>Ýlginizi Çekebilir </li>
                                     <li>Yorumlar</li> 
                                </ul>
                                <div class="resp-tabs-container">
                                        <div>
                                            <h2>Açıklama</h2>
                                            <p>{!! $product->description !!}.</p>
                                            <h6>Satýcý -  {{ ($helper->getVendorName($product->id)) ? $helper->getVendorName($product->id) : 'Admin' }}</h6>
                                        </div>
                                         
                                        <div>    
                                            <div class="owl-carousel owl-theme">
                                            @foreach($hot_products as $result)
                                                    <div class="item">
                                                         <a href="{{url($result->url)}}"><img src="{{ asset('storage/uploads/products/'. $result->photo) }}" alt="Gıda Ürünleri">								
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
"> <b> By  {{ucfirst($rs->name)}} de </b> on {!! Carbon\Carbon::parse($rs->created_at)->format('d-M-Y'); !!}: <br>{{$rs->comments}} </p>
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
                                
                                           
                                       
                                        <h2>Yorumlar</h2>
                                        @if ($errors->has('successMsg'))
                                           <span class="btn btn-success">{{ $errors->first('successMsg') }}</span>
                                            
                                       @endif
       
                                       <div class="comment_form row" id="comments">
                                        <form class="contact-form" action="{{url('submitComment')}}" method="post">
                                           <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                                   <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                                        <div class="col-md-6">
                                           <span class="label label-danger" style="color:#ffffff">{{ $errors->first('name', ':message') }}</span> <br>
                                           <input class="input-text" type="text" placeholder="Ýsminiz" name="name" value="{{old('name')}}">
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
                                      <h2  id="displayRating" data="{{$product->rating or 0}}">Yorumlar </h2>
       
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


