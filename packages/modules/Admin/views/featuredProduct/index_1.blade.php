
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
                                        
                                         
                                        <div class="col-md-2 pull-right">
                                            <div style="width: 150px;" class="input-group"> 
                                                <a href="{{ route('featuredProduct.create')}}">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Add Product</button> 
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
                                      
                                   <div class="box-body table-responsive no-padding" >
                                        <table class="table table-hover table-condensed">
                                            <thead><tr>
                                                    <th>Sno</th> 
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Created By</th>
                                                    <th>Status</th>
                                                    <th>Validity</th>    
                                                    <th>Created Date</th>                                                    
                                                    <th>Action</th>
                                                </tr>
                                                @if(count($featuredProducts )==0)
                                                    <tr>
                                                      <td colspan="7">
                                                        <div class="alert alert-danger alert-dismissable">
                                                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                          <i class="icon fa fa-check"></i>  
                                                          {{ 'Record not found. Try again !' }}
                                                        </div>
                                                      </td>
                                                    </tr>
                                                  @endif
                                                @foreach ($featuredProducts  as $key => $result)  
                                             <thead>
                                              <tbody>    
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>
                                                        {!! $result->product_title  or ''    !!}
                                                    </td>
                                                    
                                                    
                                                     <td>                                                      
                                                        <img src="{!! Url::to('storage/uploads/products/'.$result->photo) !!}" width="100px">
                                                     </td>
                                                     <td>
                                                        
                                                        {!! ($result->user_id) ? $helper->getVendorName($result->product_id) : ''    !!}
                                                    </td>
                                                                                                       
                                                    <td>
                                                        @if($result->status == 1)
                                                                  @if($result->validity >= strtotime(date('d M Y')))
                                                                             Active
                                                                   @else
                                                                             Expire
                                                                   @endif
                                                            @elseif($result->status == 0)
                                                                  Pending
                                                            @elseif($result->status == 3)
                                                                  Expire
                                                            @endif 
                                                    </td>
                                                    <td>
                                                    @if($result->user_id)
                                                        {!! date('d M Y',($result->validity)) !!}
                                                    @else
                                                        N/A
                                                    @endif    
                                                    </td>
                                                    <td>
                                                        {!! date('d M Y',strtotime($result->created_at)) !!}
                                                    </td>
                                                    <td>                                                        
                                                        {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('featuredProduct.destroy', $result->id))) !!}
                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                        
                                                         {!! Form::close() !!}

                                                    </td>
                                                </tr>
                                                @endforeach 
                                            </tbody></table>
                                    </div><!-- /.box-body --> 
                                    <div class="center" align="center">  </div>
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
