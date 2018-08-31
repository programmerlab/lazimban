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
                                                <a href="{{ route('product.create')}}">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Create Product</button> 
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
                                        
                                         
                                        <div class="col-md-12">
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
                                        </div> 
                                    </div>
                                        <br>
                                        
                                   <div class="box-body table-responsive no-padding" >
                                        <span class="label label-success status" id="activate"  >
                                             Activate
                                        </span>
                                            &nbsp;
                                        <span class="label label-warning status" id="deactivate"   >
                                            Deactivate
                                        </span>
                                        <table class="table table-hover table-condensed" id="mytable">
                                            <thead><tr>
                                                    <th><input type="checkbox" id="selectAll"></th>
                                                    <th>Sno</th> 
                                                    <th>Product Title</th>
                                                    <th>Category</th>
                                                    <th>Sub Category </th>
                                                    <th>Photo </th> 
                                                    <th>Price </th> 
                                                    <th>Created Date</th>
                                                    @if(Session::get('current_vendor_type') == 1)
                                                    <th>Created By</th>
                                                    @endif
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                @if(count($products )==0)
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
                                                @foreach ($products  as $key => $result)  
                                             <thead>
                                              <tbody>    
                                                <tr>
                                                    <td><input type="checkbox" name="vendor_p_id" id="v{!! ($result->id) !!}" value="{!! ($result->id) !!}"></td>
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
                                                        <span class="label label-{{ ($result->status==1)?'success':'warning'}} status" id="{{$result->id}}"  data="{{$result->status}}"  onclick="changeStatus({{$result->id}},'product')" >
                                                            {{ ($result->status==1)?'Active':'Inactive'}}
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

@stop
