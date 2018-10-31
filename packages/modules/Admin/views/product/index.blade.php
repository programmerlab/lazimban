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
                       <span>Ürün</span> 
                  </div>
           </div>
       </div>


<!-- Content Wrapper. Contains page content -->

  <div class="row vendor_sidebar">
    <div class="col-md-3">
        @include('packages::partials.vendor-sidebar')
    </div>
    <div class="col-md-9">
    <!-- Main content -->
        <section class="content-header">
          <h1>
            ÜRÜNLaR            
          </h1>         
        </section>
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
                                            
                                             
                                            <div class="col-md-3 pull-right">
                                                <div class="input-group"> 
                                                    <a href="{{ url('satici-paneli/urun/ekle') }}">
                                                        <button class="btn  btn-primary"><i class="fa fa-user-plus"></i>  ÜRÜN EKLE</button> 
                                                    </a>
                                                </div>
                                            </div> 
                                        </div><!-- /.box-header -->
    
                                        
                                        @if(Session::has('flash_alert_notice'))
                                             <div class="alert alert-success alert-dismissable" style="margin:10px">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                              <i class="icon fa fa-check"></i>  
                                             {{ Session::get('flash_alert_notice') }} 
                                             </div>
                                        @endif
                                        <div class="box-header">
                                            
                                             
                                            <!--<div class="col-md-12">
                                                <form method="post" action="{{ url('admin/products') }}">
                                                    <div class="col-sm-3">
                                                        <label class="">Search By Vendor</label>    
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select name="vendor" class="form-control">
                                                            <option value="">Select vendor</option>
                                                            @foreach($vendorlist as $vl)                                                            
                                                                <option value="{!! $vl->id !!}">{!! ($vl->company_name) ? ($vl->company_name) : ($vl->full_name) !!}</option>                                                            
                                                            @endforeach    
                                                        </select>
                                                    </div>
                                                     <div class="col-sm-2">
                                                        <button name="search" type="submit" class="btn btn-primary" value="Search">Search</button>
                                                    </div>
                                                </form>
                                            </div> -->
                                        </div>
                                            <br>
                                            
                                       <div class="box-body table-responsive no-padding" >
                                            
                                            <table class="table table-hover table-condensed" id="mytable">
                                                <thead><tr>
                                                        
                                                        <th>Sıra No</th> 
                                                        <th>Ürün İsmi</th>
                                                        <th>Kategori</th>
                                                        <th>Alt Kategori</th>
                                                        <th>Resim</th> 
                                                        <th>Fiyat</th> 
                                                        <th>Oluşturma Tarihi</th>
                                                        @if(Session::get('current_vendor_type') == 1)
                                                        <th>Created By</th>
                                                        @endif
                                                        <th>Durum</th>
                                                        <th>Eylem</th>
                                                    </tr>
                                                    @if(count($products )==0)
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
                                                    @foreach ($products  as $key => $result)  
                                                 <thead>
                                                  <tbody>    
                                                    <tr>
                                                        
                                                        <td>{{ ++$key }}</td>
                                                        <td>{!! ucfirst($result->product_title)     !!}
    
                                                        </td>
                                                        <td>
                                                        {{ ($helper->getCategoryName($result->category->parent_id)==null)?$result->category->name:$helper->getCategoryName($result->category->parent_id) }}
    
                                                        </td>
                                                        <td>    {{ $result->category->name }}</td>
                                                         <td> 
                                                          <!--   {!!  substr(html_entity_decode($result->description, ENT_QUOTES, 'UTF-8'),0,50)  !!}.. -->
                                                            <img src="{!! Url::to('storage/uploads/products/'.$result->photo) !!}" width="100px">
                                                         </td>
                                                        <td>    {{ number_format($result->price, 2, '.', ',') }}</td>
                                                        <td>
                                                            {!! Carbon\Carbon::parse($result->created_at)->format('d-M-Y'); !!}
                                                        </td>
                                                        @if(Session::get('current_vendor_type') == 1)
                                                        <td>
                                                            {{ $result->company_name }} 
                                                        </td>
                                                        @endif
                                                        <td>
                                                            <span class="label label-{{ ($result->status==1)?'success':'warning'}} status" id="{{$result->id}}"  data="{{$result->status}}"   >
                                                                {{ ($result->status==1)?'Aktif':'Onay Bekliyor'}}
                                                            </span>
                                                        </td>
                                                        <td> 
                                                            <a href="{{ route('product.edit',$result->id)}}">
                                                                <i class="fa fa-fw fa-pencil-square-o" title="edit"></i> 
                                                            </a>
    
                                                            {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('product.destroy', $result->id))) !!}
                                                            <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                            
                                                             {!! Form::close() !!}
    
                                                        </td>
                                                    </tr>
                                                    @endforeach 
                                                </tbody></table>
                                        </div><!-- /.box-body --> 
                                        <div class="center" align="center">  {!! $products->render() !!}</div>
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
