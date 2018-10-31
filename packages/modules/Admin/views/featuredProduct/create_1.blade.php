@extends('packages::layouts.master') 
    @section('content') 
      @include('packages::partials.main-header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('packages::partials.main-sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"> 
       @include('packages::partials.breadcrumb')
        <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
              <div class="row">
                  <div class="col-md-12">
                       <div class="panel panel-cascade">
                          <div class="panel-body ">
                                  @if(Session::has('flash_alert_notice'))
                                         <div class="alert alert-danger alert-dismissable" style="margin:10px">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                            
                                         {{ Session::get('flash_alert_notice') }} 
                                         </div>
                                    @endif
                              <div class="row">  
                                      {!! Form::model($featuredProduct, ['route' => ['featuredProduct.store'],'class'=>'form-horizontal','id'=>'users_form','files' => true]) !!}
                                        @include('packages::featuredProduct.form_1')
                                      {!! Form::close() !!}
                              </div>
                          </div>
                    </div>
                </div>            
              </div>  
            <!-- Main row --> 
          </section><!-- /.content -->
      </div> 
@stop
