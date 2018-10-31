
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
                <div class="col-md-12">
                    <div class="panel panel-cascade">
                        <div class="panel-body ">
                            <div class="row">
                                <div class="box">
                                    <div class="box-header"> 
                                         
                                         
                                         <form action="{{url('admin/redirect-302')}}" method="get">
                                         <div class="col-md-10 pull-right">
                                            <div class="col-md-6"> 
                                              <input type="text" class="form-control" name="search"  value="{{$_REQUEST['search'] or ''}}">
                                          </div>
                                            <div class="col-md-2"> 
                                              <input type="submit" class="form-control btn btn-primary"   value="Search">
                                            </div>
                                        </div> 
                                    </form>

                                    </div><!-- /.box-header -->

                                    
                                    @if(Session::has('flash_alert_notice'))
                                         <div class="alert alert-success alert-dismissable" style="margin:10px">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                          <i class="icon fa fa-check"></i>  
                                         {{ Session::get('flash_alert_notice') }} 
                                         </div>
                                    @endif
                                      
                                   <div class="box-body table-responsive no-padding" >
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th> 
                                                    <th>Code</th>
                                                    <th>Old Url</th>
                                                    <th>New Url </th>                                                
                                                    
                                                    <th>Action</th>
                                                </tr>

                                                @foreach($u as $key => $value)

                                                    <form action="{{url('admin/redirect-302')}}" method="post">
                                                        <tr>
                                                            <th>{{++$key}}</th> 
                                                            <th>302</th>
                                                            
                                                            <input type="hidden"  name="category_id"  value="{{$value->id}}">   

                                                            <th> <input type="text" class="form-control" name="old_url" readonly=""  value="{{$value->oldslug_302 or $value->slug}}"> </th>
                                                             <th> <input type="text" class="form-control" name="new_url"    value="{{$value->slug}}"> </th>

                                                            <th><input type="submit" class="form-control btn btn-primary"   value="Update"></th>
                                                        </tr>
                                                    </form>

                                                    @if($value->product)
                                                     @foreach($value->product as $key2 => $result)

                                                        <form action="{{url('admin/redirect-302')}}" method="post">
                                                            <tr>
                                                                <th>{{++$key2}}</th> 
                                                                <th>302</th>
                                                                
                                                                <input type="hidden"  name="product_id"  value="{{$result->id}}">   

                                                                <th> <input type="text" class="form-control" name="old_url" readonly=""  value="{{$result->oldurl_302 or $result->url}}"> </th>
                                                                 <th> <input type="text" class="form-control" name="new_url"  value="{{$result->url}}"> </th>
                                                                
                                                                <th><input type="submit" class="form-control btn btn-primary"   value="Update"></th>
                                                            </tr>
                                                        </form>
                                                   
                                                    @endforeach
                                                    @endif

                                               
                                                @endforeach

                                                 

                                             <thead>
                                        </table> 
                                          <div class="center" align="center">  {!! $u->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render() !!}</div>
                                    </div><!-- /.box-body --> 
                                     
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

@stop
