                 	                                                
                        
                        	<h3><span>{!! (count($products)) !!} </span> Ürün Listeleniyor</h3>                                                    
                            <ul>
                                @if((count($products))==0) Aramnıza uygun ürün bulunamadı. Lütfen yeni bir arama yapınız. @endif 
                                    @foreach($products as $key => $product)
                                        <li>
                                            <div class="col-md-3"><a href="{{ url($product->url) }}"><img src="{{ asset('storage/uploads/products/'. $product->photo) }}" alt="{{ $product->product_title }}" alt="{{ $product->product_title }}"></a></div>
                                            <div class="col-md-4"><h2><a href="{{ url($product->url) }}">{{ $product->product_title }}</a></h2></div>
                                             <div class="col-md-3"><span class="price-product"> <font style="vertical-align: inherit;">₺</font> {{ $product->price-($product->price*$product->discount)/100}}</span></div>
                                              <div class="col-md-2"><a href="{{ url($product->url) }}" class="product_link">Ürünü İncele</a>
												<div>
													<h6>  @if($product->shipping_charge)																	 
																	@else  
																	  Free Shipping
																	@endif  
													</h6>
													
												</div>
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
                        
                                                
                                            