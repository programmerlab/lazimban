@extends('packages::layouts.master_vendor')
@section('content') 
@include('packages::partials.vendor-header')
<!-- Left side column. contains the logo and sidebar -->
<div class="page_title">
           <div class="page-wrapper">
               <div class="col-md-6"></div>
               <div class="col-md-6 text-right">
                       <span><a href="{{ url('/bana-ozel/satici-paneli') }}">Anasayfa</a> </span>
                       <span>Satıcı Paneli &nbsp;></span>
                       <span>işlemler</span> 
                  </div>
           </div>
       </div>


<!-- Content Wrapper. Contains page content -->
<div class="row vendor_sidebar">
<div class="col-md-3">
    @include('packages::partials.vendor-sidebar')
</div>
 <div class="col-md-9">
    <section class="content-header">
          <h1>
            işlemler            
          </h1>         
        </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="panel panel-cascade">
                        <div class="panel-body ">
                            <div class="row">
                                <div class="box">
                                    <div class="box-header">
                                         
                                    </div><!-- /.box-header -->

                                    
                                    @if(Session::has('flash_alert_notice'))
                                         <div class="alert alert-success alert-dismissable" style="margin:10px">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                          <i class="icon fa fa-check"></i>  
                                         {{ Session::get('flash_alert_notice') }} 
                                         </div>
                                    @endif
                                    
                                    @if(Session::has('flash_alert_warning'))
                                         <div class="alert alert-danger alert-dismissable" style="margin:10px">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                          <i class="icon fa fa-check"></i>  
                                         {{ Session::get('flash_alert_warning') }} 
                                         </div>
                                    @endif
                                      
                                   <div class="box-body table-responsive no-padding" >
                                        <table class="table table-hover table-condensed">
                                            <thead><tr>
                                                    <th>Sıra</th> 
                                                    <th>Alıcı adı</th>
                                                    <th>Alıcı e-posta</th>
                                                    <th>ürün başlığı</th>
                                                    <th>Fiyat</th>
                                                    <th>Adet</th>
                                                    <th>Ara toplam</th>
                                                    <th>Ödeme şekli</th>
                                                    <!--<th>Vendor</th>-->
                                                    <th>Sipariş tarihi</th>
                                                    <th>durum</th>
                                                    
                                                   <th>Aksiyon</th>
                                                </tr>
                                                @if(count($transaction)==0)
                                                    <tr>
                                                      <td colspan="7">
                                                        <div class="alert alert-danger alert-dismissable">
                                                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                          <i class="icon fa fa-check"></i>  
                                                          {{ 'Kayıt bulunamadı. Tekrar deneyin !' }}
                                                        </div>
                                                      </td>
                                                    </tr>
                                                  @endif
                                              </thead>
                                                @foreach ($transaction as $key => $result)  
                                             
                                            
                                              <tbody>    
                                               @if(isset($result->user->email))
                                                <tr>
                                                    <td>{{ ++$key }}</td> 
                                                    <td>{{ $result->user->first_name }} </td>
                                                <td>{{ $result->user->email }} </td>
                                                    <td>{{ isset($result->product->product_title)?$result->product_name:'' }} </td>
                                                     <td>{{ $result->total_price }} </td>
                                                    <td>{{ $result->qty }} </td>
                                                    <td>{{ $result->total_price * $result->qty }} </td>
                                                       <td>{{ $result->payment_mode }} </td> 
                                                   <!--<td>
                                                    {{ isset($result->product->id)? $helper->getVendorName($result->product->id):'' }}
                                                   </td>-->
                                                    <td>
                                                        {!! Carbon\Carbon::parse($result->created_at)->format('d-M-Y'); !!}
                                                    </td>
                                                    <td>
                                                        <span class="label label-{{ ($result->status==1)?'success':'warning'}} status" id="{{$result->id}}"  data="{{$result->status}}"  >
                                                             @if($result->status==1)
                                                             kadar
                                                             @elseif($result->status==2)
                                                             Devam etmekte
                                                             @elseif($result->status==3)
                                                             başarı
                                                             @elseif($result->status==4)
                                                             İptal etmek
                                                             @else
                                                             kadar
                                                             @endif
                                                        </span>
                                                    </td>
                                                    @if($result->payment_mode == 'card')
                                                        @if($result->status != '3')
                                                        <td>
                                                            <a href="{{ 'transaction/approve/'.$result->id }}"><button class="btn-xs btn-info">onaylamak</button></a>
                                                            <!--<a href="{{ 'transaction/decline/'.$result->id }}"><button class="btn-xs btn-danger">Decline</button></a>-->
                                                        </td>
                                                        @else
                                                            <td>
                                                                <span class="btn-xs btn-success">onaylı</span>                                                                
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            N/A
                                                        </td>
                                                    @endif        
                                                 <!--    <td>  

                                                        {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('transaction.destroy', $result->id))) !!}
                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                        
                                                         {!! Form::close() !!}

                                                    </td> -->
                                                </tr>
                                                @endif
                                                @endforeach 
                                            </tbody></table>
                                    </div><!-- /.box-body --> 
                                    <div class="center" align="center">  {!! $transaction->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render() !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div> 
        <!-- Main row --> 
    </section><!-- /.content -->
</div>
</div>

@stop
