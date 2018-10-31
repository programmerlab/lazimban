
@extends('packages::layouts.master_vendor')
  @section('title', 'Dashboard')
    @section('header_vendor')
    
    @stop
    @section('content') 
      @include('packages::partials.vendor-header')
      <!-- Left side column. contains the logo and sidebar -->
      <div class="page_title">
            <div class="page-wrapper">
                <div class="col-md-6"></div>
                <div class="col-md-6 text-right">
                        <span><a href="{{ url('/bana-ozel/satici-paneli') }}">Anasayfa</a> </span>                                            
                        <span>{{ $page_title or '' }}</span> 
                   </div>
            </div>
        </div>

      <!-- Content Wrapper. Contains page content -->
      <div class="row vendor_sidebar">
      <div class="col-md-3">
        @include('packages::partials.vendor-sidebar')
      </div>
        <div class="col-md-9">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Satıcı Yönetim Paneli
           <!-- <small>Control panel</small>-->
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>-->
        </section>

        <section style="margin:15px 30px -30px 30px">
        @if(Input::has('error'))
                 <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                 <h4> <i class="icon fa fa-check"></i>  
                    Sorry! You are trying to access invalid URL. <a href="{{url('admin')}}"> Reset</a></h4>

                 </div>
            @endif
       <hr>  
      </section>
        @if(!Input::has('error'))
          <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->                      
              <div class="col-lg-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>{{ $user }}</h3> 
                    <p>Toplam Müşteri</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{ (Session::get('current_vendor_type') == 1) ? route('user') : '#' }}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->

                <div class="col-lg-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{ $product }}</h3> 
                    <p>Toplam Ürün</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{route('product')}}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->

                <div class="col-lg-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-blue">
                  <div class="inner">
                    <h3>{{ $category }}</h3> 
                    <p>Toplam Kategori</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{ (Session::get('current_vendor_type') == 1) ? route('category') : '#' }}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->

               <div class="col-lg-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{ $order }}</h3> 
                    <p>Toplam Sipariş</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{route('transaction')}}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col --> 
               <div class="col-lg-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{ $today_order }}</h3> 
                    <p>Bugünkü Toplam Sipariş </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{route('transaction')}}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col --> 
               @if(Session::get('current_vendor_type') == 1)
               <div class="col-lg-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>Site Settings</h3> 
                    <p>Update Site information </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{route('setting')}}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col --> 
              @endif
              
            
 

            </div><!-- /.row -->
            <!-- Main row -->  
          </section>
        @endif 
      </div><!-- /.content-wrapper -->
     </div>

@stop
