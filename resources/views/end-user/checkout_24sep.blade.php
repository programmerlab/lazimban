
@extends('layouts.master')
    @section('title', 'HOME')
        @section('header')
        <h1>Home</h1>
        @stop
        @section('content') 
            
              @include('partials.breadcrumb')
            <!-- Left side column. contains the logo and sidebar -->
            <div class="">&nbsp;
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                         
                         @if(count($cart))
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">Çıkart</th>
                                        <th class="cart-description item">Ürün Resmi</th>
                                        <th class="cart-product-name item">Ürün Adı</th>
                                        <th class="cart-edit item">Fiyat</th>
                                        <th class="cart-qty item">Miktar</th>
                                        <th class="cart-sub-total item">Ara Toplam</th> 
                                    </tr>
                                </thead><!-- /thead -->
                               <!--  <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="shopping-cart-btn">
                                                <span class="">
                                                    <a href="{{url('/')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                    <a href="index.htm#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
                                                </span>
                                            </div><!-- /.shopping-cart-btn -->
                                        </td>
                                    </tr>
                                </tfoot>  
                                 <tbody>
                                @foreach($cart as  $item)
                                <tr>
                                    <td class="cart_delete">
                                      <a class="cart_quantity_delete" href="{{ url('removeItem/'.$item->id) }}"><i class="fa fa-times"></i>
                                      </a>
                                   
                                    </td>
                                    <td class=" cart-description item">
                                    @foreach($product_photo as $key => $photo)
                                    
                                        @if($photo['id']==$item->id)
                                         <img style="width: 100px;height: 100px;" src="{{ asset('storage/uploads/products/'. $photo['photo']) }}" alt="">
                                         @endif
                                     @endforeach
                                    </td>

                                    <td class="cart_description">
                                        <h4><a href="">{{$item->name}}</a></h4>
                                        <p>Web ID: {{$item->id}}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p><font style="vertical-align: inherit;">₺</font> {{$item->price}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <a class="cart_quantity_up" href="{{ url('updateCart?product_id='.$item->id.'&increment=1')}}"> + </a>
                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                            <a class="cart_quantity_down" href="{{ url('updateCart?product_id='.$item->id.'&decrease=1')}}"> - </a>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><font style="vertical-align: inherit;">₺</font> {{ money_format('%!i', $item->subtotal) }}</p>
                                    </td>  
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
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">ALIŞVERİŞE DEVAM </span>
                                        <p>Daha fazla almak istermisiniz ...</p>
                                    </th>
                                       <tr>
                                    <td>
                                        <a href="{{url('/')}}" class="btn btn-upper btn-primary outer-left-xs">ALIŞVERİŞE DEVAM</a>
                                    </td>
                                </tr>
                                </tr>
                            </thead><!-- /thead -->
                            
                        </table>
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 estimate-ship-tax">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">İndirim Kodu</span>
                                        <p>Varsa Kupon Kodunuzu Girin..</p>
                                    </th>
                                </tr>
                             
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control unicase-form-control text-input" placeholder="Kupon Kodunuz.." type="text">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary">KUPONU ONAYLA</button>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            <span class="inner-left-md">ara toplam <font style="vertical-align: inherit;">₺</font> {{$sub_total}} </span>
                                        </div>
                                        <div class="cart-grand-total">
                                            <span class="inner-left-md">Genel Toplam <font style="vertical-align: inherit;">₺</font> {{$sub_total}} </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                    <tr>
                                        <td>
                                            <div class="cart-checkout-btn pull-right">
                                                <a href="{{route('order')}}">
                                                <button type="submit" class="btn btn-primary checkout-btn">ALIŞVERİŞİ TAMAMLA</button>
                                                </a>
                                               
                                            </div>
                                        </td>
                                    </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->            
                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
                    <!--  BRANDS CAROUSEL -->
         <!-- /.logo-slider -->
<!--BRANDS CAROUSEL : END  -->     
@stop