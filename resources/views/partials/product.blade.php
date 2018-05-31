 <div class="col-md-9"> 
        <!--  SECTION – HERO ========================================= -->
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="index.htm#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
           
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
           
            <div class="tab-pane  " id="grid-container">
              <div class="category-product">
                <div class="row">
                 @if($products->count()==0) Record not found @endif 
                 @foreach($products as $key => $product)
                  <div style="visibility: hidden; animation-name: none;" class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> 
                          <a href="product-details">

                          <img  style="float: left;height: 200px;border: 1px solid #ccc;" src="{{ asset('storage/uploads/products/'. $product->photo) }}" alt="{{ $product->product_title }}"> 

                          </a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="product-details">{{ $product->product_title }}</a></h3>
                          
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> RS {{ $product->price-($product->price*$product->discount)/100}} </span> <span class="price-before-discount">RS {{ $product->price}}</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                                 <li class="lnk wishlist"> <a class="add-to-cart" href="{!! url($product->url) !!}" title="Show product details"> <i class="fa fa-shopping-cart"></i>  View Details </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item --> 
                 @endforeach  
                  
                  <!-- /.item --> 
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
             
            <div class="tab-pane active" id="list-container">
               @if($products->count()==0) Record not found @endif 
              <div class="category-product">
               @foreach($products as $key => $product) 
              <div style="visibility: visible; animation-name: fadeInUp;" class="category-product-inner wow fadeInUp animated">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image" style="float: left"> 
                            <a href="{!! url($product->url) !!}" > 
                              <img src="{{ asset('storage/uploads/products/'. $product->photo) }}" alt="">
                            </a>
                             </div>
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="{!! url($product->url) !!}">{{$product->product_title}}</a></h3>
                            <br>
                            
                            <div class="product-price"> 
                              <span class="price"> 
                              RS {{ $product->price-($product->price*$product->discount)/100}} </span> 
                            <span class="price-before-discount">
                              RS {{$product->price}}</span> 
                            </div>
                            <!-- /.product-price -->
                            <div class="description m-t-10">{!! str_limit($product->description,100) !!}

                            <a href="{!! url($product->url) !!}"> More</a>   </div>
                            <div class="cart clearfix animate-effect">
                              <div class="action" col-md-12> 
                                  
                                <div class="col-sm-7" > 
                                  <a href="{{ url('addToCart/'.$product->id) }}" id="addToCart" class="btn btn-primary"> <i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                              </div> 
                            <div class="col-sm-4">
                                <a href="{{ url('buyNow/'.$product->id) }}" class="btn btn-success">
                                <i class="fa fa-shopping-cart inner-right-vs"></i> BUY </a>
                            </div>
                                   
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                            
                          </div>
                          <!-- /.product-info --> 
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-list-row -->
                      <div class="tag new"><span>new</span></div>
                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.category-product-inner -->
                 @endforeach
                
                  <!-- /.products --> 
                </div>
              </div>
             


              <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
          </div> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>