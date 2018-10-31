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
                       <span>Ürün EKLE</span> 
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
            ÜRÜN EKLE          
          </h1>         
        </section>
        <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
              <div class="row">
                  <div class="col-md-12">
                       <div class="panel panel-cascade">
                          <div class="panel-body ">
                              <div class="row">  
                                      <div id="iyzipay-checkout-form" class="responsive"></div>
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
