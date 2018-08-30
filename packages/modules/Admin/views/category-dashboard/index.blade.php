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
                                        <form action="{{route('category')}}" method="get">
                                           
                                            <div class="col-md-3">
                                                <input value="{{ (isset($_REQUEST['search']))?$_REQUEST['search']:''}}" placeholder="search by category" type="text" name="search" id="search" class="form-control" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Search" class="btn btn-primary form-control">
                                            </div>
                                           
                                        </form>
                                         <div class="col-md-2">
                                             <a href="{{ route('category') }}">   <input type="submit" value="Reset" class="btn btn-default form-control"> </a>
                                        </div>
                                        <div class="col-md-2 pull-right">
                                            <div style="width: 150px;" class="input-group"> 
                                                <a href="{{ route('category.create')}}">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Create Category</button> 
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
            
						                {!! Form::model($category, ['route' => ['category-dashboard.store'],'class'=>'','id'=>'user-form','enctype'=>'multipart/form-data']) !!}
						              
						                 <table class="table table-hover table-condensed"  >
						                    <thead>
						                        <tr>
						                            <th> Category List</th>
						                            <th>  Move  Category </th> 
						                            <th> Set Default Category </th> 
						                             
						                        </tr>
						                    </thead>
						                    <tbody>
						                      <tr>
						                            <td>  
						                        <div class="form-group">
						                               
						                              <ul>
						                             @foreach ($categories as $key => $result)  
						                               
						                                <div class="">
						                                    <label title="@if(in_array($result->id,$cat_id)) Already moved @endif " class="mt-checkbox mt-checkbox-outline" style="@if(in_array($result->id,$cat_id)) color:red; @endif">  
						                                       
						                                        <input type="checkbox" value="{{$result->id.'_'.$result->name}}" name="name[{{$result->id}}][]" 
						                                        @if(in_array($result->id,$cat_id)) disabled @endif > {{ucfirst($result->name)}}
						                                        <span></span>
						                                    </label> 
						                                </div>

						                            @endforeach
						                            </ul> 
						                        


						                        </td>
						                        <td> <div style="width: 150px; padding-top: 50px" class="input-group"> 
						                            
						                                <button class="btn btn-success" type="submit">
						                                Move Right <i class="fa fa-arrow-right"></i> </button 
						                            </a>
						                        </div>

						                        </td>
						                            <td>  <ol>
						                            @if($categoryDashboard->count()==0)
						                            Default category not found!
						                            @endif
						                            @foreach ($categoryDashboard as $value)
						                             <li>{{ ucfirst($value->name)}}  
						                                
						                                 <a href="{{ route('category-dashboard.destroy',$value->id)}}" id="{{$value->id}}" onclick="popupAlert('{{ route('category-dashboard.destroy',$value->id)}}',{{$value->id}})">
						                                       <i class="fa fa-remove"></i>  
						                                    </a>
						                            </li>
						                             @endforeach
						                             </ol></td> 
						                        </tr> 
						                        
						                    </tbody>
						                </table>
						              
						              {!! Form::close() !!}       
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
