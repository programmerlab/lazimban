
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 
                                            
               @include('partials.breadcrumb_search')
               <div id="main" class="site-main">
              	<div class="page-wrapper">
                	<div class="col-md-3">
                    	
                    	<div class="product_categories">
                        	<h3>Kategoriler</h3>
                            <ul class="product-categories">
                                @foreach($categories as $key => $value)
                                    <li class="cat-item cat-parent"><a href="#">{{$value['name']}}</a>
                                        <ul class="children">                                                      
                                              @if(count($value['child'])>0)
                                                @foreach($value['child'] as $subCat)
                                                  <li class="cat-item"><a href="{{ url($subCat['slug']) }}">{{$subCat['name']}}</a></li>
                                                @endforeach
                                              @else                                                        
                                              <li class="cat-item"><a href="{{ url($value['slug']) }}">{{$value['name']}}</a></li> 
                                              @endif                                                                                                            
                                       </ul>
                                    </li>
                                @endforeach                 
                            </ul>            
                        </div>
                         
                         <div class="top_rated_products">
                         	<h3>Yüksek Puanlı Ürünler</h3>
                            <ul class="product_list">
                                @foreach($hot_products as $result)
                                    <li>                                        
                                        <div class="product_cont">
                                            <span class="product-title">{{ $result->product_title }}</span>
                                            <span class="amount"><font style="vertical-align: inherit;">₺</font> {{ $result->price - ($result->price*$result->discount)/100 }}<span class="woocommerce-Price-currencySymbol"></span></span>
                                            <span class="price-before-discount" style="text-decoration: line-through;"><font style="vertical-align: inherit;">₺</font> {{ $result->price }}</span> 
                                        </div>
                                        <div class="product_img"><a href="{{ url($result->url) }}">  <img src="{{ asset('storage/uploads/products/'. $result->photo) }}"> </a></div>
                                    </li>
                                @endforeach    
                            </ul>
                         </div>
                    </div>
                    
                    
                    <div class="col-md-9">                    	                                                
                        <div class="product_list_outer">
                        	<h3><span>{!! $products->count() !!} </span> Ürün Listeleniyor</h3>                                                    
                            <ul>
                                @if($products->count()==0) Aramnıza uygun ürün bulunamadı. Lütfen yeni bir arama yapınız. @endif 
                                    @foreach($products as $key => $product)
                                        <li>
                                            <div class="col-md-3"><a href="{{ url($product->url) }}"><img src="{{ asset('storage/uploads/products/'. $product->photo) }}" alt="{{ $product->product_title }}" alt="{{ $product->product_title }}"></a></div>
                                            <div class="col-md-4"><h2><a href="{{ url($product->url) }}">{{ $product->product_title }}</a></h2></div>
                                             <div class="col-md-3"><span class="price-product"> <font style="vertical-align: inherit;">₺</font> {{ $product->price-($product->price*$product->discount)/100}}</span></div>
                                              <div class="col-md-2"><a href="{{ url($product->url) }}" class="product_link">Ürünü İncele</a>
                                              <h6>Satıcı -  {{ ($helper->getVendorName($product->id)) ? $helper->getVendorName($product->id) : 'Admin' }}</h6>
                                              <h6  id="displayRating" data="{{$product->rating or 0}}"> </h6>
                                                                <div class="rating_outer"><span class="fa fa-star" id="star1" onclick="rating(1,{{$product->id}})"></span>
                                                                    <span class="fa fa-star" id="star2"></span>
                                                                    <span class="fa fa-star" id="star3""></span>
                                                                    <span class="fa fa-star" id="star4"></span>
                                                                    <span class="fa fa-star" id="star5"></span>
                                                                   <br> <span id="rating"></span>
                                                                </div>
                                              </div>
                                                
                                        </li>
                                    @endforeach                                
                            </ul>
                        </div>
                        
                        
                        
                        
                        <!--<div class="product_list_outer">                        	                                                        
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                     <a href="#"><img src="images/1.jpg" alt="Gıda Ürünleri">								
                                     	<h2>Gıda Ürünleri </h2>
									</a>
                                </div>
                                 <div class="item">
                                     <a href="#"><img src="images/4.jpg" alt="Gıda Ürünleri">								
                                        <h2>Gıda Ürünleri </h2>
                                    </a>
                                </div>
                                 <div class="item">
                                     <a href="#"><img src="images/2.jpg" alt="Gıda Ürünleri">								
                                     	<h2>Gıda Ürünleri</h2>
									</a>
                                </div>
                                 <div class="item">
                                     <a href="#"><img src="images/3.jpg" alt="Gıda Ürünleri">								
                                        <h2>Gıda Ürünleri </h2>
                                    </a>
                                </div>
                                <div class="item">
                                     <a href="#"><img src="images/1.jpg" alt="Gıda Ürünleri">								
                                     	<h2>Gıda Ürünleri </h2>
									</a>
                                </div>
                                 <div class="item">
                                     <a href="#"><img src="images/4.jpg" alt="Gıda Ürünleri">								
                                        <h2>Gıda Ürünleri </h2>
                                    </a>
                                </div>
                                 <div class="item">
                                     <a href="#"><img src="images/2.jpg" alt="Gıda Ürünleri">								
                                     	<h2>Gıda Ürünleri</h2>
									</a>
                                </div>
                                 <div class="item">
                                     <a href="#"><img src="images/3.jpg" alt="Gıda Ürünleri">								
                                        <h2>Gıda Ürünleri </h2>
                                    </a>
                                </div>
            
                            </div>	
                        </div>-->
                        
                    </div>
 

                 <div class="col-md-12">
                        <div class="product_info">
                            <div id="horizontalTab">
                                <ul class="resp-tabs-list">
                                    
                                    
                                    <li>Diğer Kategoriler </li> 
                                </ul>
                                <div class="resp-tabs-container">
                                        
                                         
                                        <div>    
                                            <div class="owl-carousel owl-theme">
                                            @foreach($categories as $result)
                                                    <div class="item" style="padding: 10px; border: 1px solid; margin: 10px; height: 100px">
                                                         <a href="{{url($result['slug'])}}">                            
                                                            <h2>{{ $result['name'] }} </h2>
                                                        </a>
                                                    </div>
                                            @endforeach
                                                                     
                                                
                                            </div>      
                                        </div>
                                         
                                </div>
                            </div>  
                        </div>
                    </div>      

              </div>  
         
    @stop
 