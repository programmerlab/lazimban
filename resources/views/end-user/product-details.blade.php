@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content')
            @include('partials.breadcrumb')
            <div id="main" class="site-main">
              	<div class="page-wrapper">
                	
                    <div class="col-md-6">
                    	<div class='zoom ex1' id='ex1'>
                            <img src="{{ asset('storage/uploads/products/'. $product->photo) }}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="product_discription">
                        	<h2 class="product_name">{{$product->product_title}}</h2>
                            <h3 class="product_price">RS {{$product->price-($product->price*$product->discount/100)}}  </h3> <h5><p style="text-decoration: line-through">RS {{$product->price}}</p></h5>
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

                                <button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed">Add to Cart</button></a>
                                
                                <a href="{{ url(str_slug($product->product_title,'-').'/buyNow/'.$product->id) }}" >
                                <button type="submit" class="single_add_to_cart_button button alt disabled wc-variation-selection-needed">Buy</button></a>                                    
                            </div>
                            <div class="category_list">
                            	<span><strong>Description:</strong></span> <span>{!! str_limit($product->description,100) !!}</span>
                            </div>
                        </div>                        
                    </div>
                    
                    <div class="col-md-12">
                    	<div class="product_info">
                        	<div id="horizontalTab">
                                <ul class="resp-tabs-list">
                                    <li>Description </li>
                                    <!--<li>Ek bilgi </li>-->
                                    <!--<li>Yorumlar (0) </li>-->
                                    <!--<li>Satıcı Bilgisi </li>-->
                                    <li>More Product </li>
                                    <!--<li>Product Enquiry </li>-->
                                </ul>
                                <div class="resp-tabs-container">
                                        <div>
                                            <h2>Description</h2>
                                            <p>{!! $product->description !!}.</p>
                                        </div>
                                        <!--<div>
                                            <h2>Ek bilgi</h2>
                                            <table class="shop_attributes">                
                                                    <tbody>
                                                        <tr>
                                                                <th>Beden</th>
                                                                <td><p>XXS, XS, S, L, M, XL, XXL</p></td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>-->
                                        <!--<div>
                                            <h2 class="woocommerce-Reviews-title">İncelemeler</h2>
                                            <p>Henüz yorum yapılmadı.</p>
                                            <div id="review_form_wrapper">
                                                <span>“Shoei Qwest Mat Siyah Kask” için yorum yapan ilk kişi siz olun </span>
                                                <p>Yorum yapabilmek için giriş yapmanız gerekmektedir.</p>
                                            </div>
                                        </div>-->
                                    
                                        <!--<div>
                                           <h2>Satıcı Bilgileri</h2>
                                           <ul class="list-unstyled">
                                       
                                                   <li class="store-name">
                                                       <span>Mağaza  adı :</span>
                                                       <span class="details">
                                                           lazımbana
                                                       </span>
                                                   </li>    
                                                   <li class="seller-name">
                                                       <span>
                                                           Satıcı:
                                                       </span>
                                       
                                                       <span class="details">
                                                           <a href="#">lazimbana</a>
                                                       </span>
                                                   </li>
                                                   <li>
                                                       <b>Adres :</b>
                                                       <span class="details">
                                                           İstanbul
                                                       </span>
                                                   </li>    
                                                   <li>
                                                       Henüz bir değerlendirme bulunamadı!
                                                   </li>
                                           </ul>
                                        </div>-->  
                                        <div>    
                                            <div class="owl-carousel owl-theme">
                                            @foreach($hot_products as $result)
                                                    <div class="item">
                                                         <a href="#"><img src="{{ asset('storage/uploads/products/'. $result->photo) }}" alt="Gıda Ürünleri">								
                                                            <h2>{{ $result->product_title }} </h2>
                                                        </a>
                                                    </div>
                                            @endforeach
                                                                     
                                                
                                            </div>	    
                                        </div>
                                        <div>
                                        <h2>Product Enquiry</h2>
                                        
                                            <form id="dokan-product-enquiry" method="post" class="form" role="form">
                                                                                <div class="row">
                                                                                                <div class="col-md-12 form-group">
                                                                        <input class="form-control" id="name" name="author" placeholder="Your Name" required type="text">
                                                                    </div>
                                    
                                                                    <div class="col-md-12 form-group">
                                                                        <input class="form-control" id="email" name="email" placeholder="you@example.com" required type="email">
                                                                    </div>
                                    
                                                                 
                                                                                        </div>
                                                                                                    <div class="form-group">
                                                                <textarea class="form-control" id="dokan-enq-message" name="enq_message" placeholder="Details about your enquiry..." rows="5" required></textarea>
                                                            </div>
                                    
                                                            
                                                          
                                    
                                                            <input class="submit-btn" value="Submit Enquiry" type="submit">
                                                                        </form>
                                        
                                        
                                        </div>                
                                </div>
                            </div>	
                        </div>
                    </div>                                                        
                </div>
            </div>
        @stop
        
