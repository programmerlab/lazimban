@extends('packages::layouts.master')
@section('content') 
@include('packages::partials.main-header')

<style type="text/css">		
		
		a,a:visited {
			color: #4183C4;
			text-decoration: none;
		}
		
		a:hover {
			text-decoration: underline;
		}
		
		pre,code {
			font-size: 12px;
		}
		
		pre {
			width: 100%;
			overflow: auto;
		}
		
		small {
			font-size: 90%;
		}
		
		small code {
			font-size: 11px;
		}
		
		.placeholder {
			outline: 1px dashed #4183C4;
		}
		
		.mjs-nestedSortable-error {
			background: #fbe3e4;
			border-color: transparent;
		}
		
		#tree {
			width: 550px;
			margin: 0;
		}
		
		ol {
			max-width: 450px;
			padding-left: 25px;
		}
		
		ol.sortable,ol.sortable ol {
			list-style-type: none;
		}
		
		.sortable li div {
			border: 1px solid #d4d4d4;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			cursor: move;
			border-color: #D4D4D4 #D4D4D4 #BCBCBC;
			margin: 0;
			padding: 3px;
		}
		
		li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
			border-color: #999;
		}
		
		.disclose, .expandEditor {
			cursor: pointer;
			width: 20px;
			display: none;
		}
		
		.sortable li.mjs-nestedSortable-collapsed > ol {
			display: none;
		}
		
		.sortable li.mjs-nestedSortable-branch > div > .disclose {
			display: inline-block;
		}
		
		.sortable span.ui-icon {
			display: inline-block;
			margin: 0;
			padding: 0;
		}
		
		.menuDiv {
			background: #EBEBEB;
		}
		
		.menuEdit {
			background: #FFF;
		}
		
		.itemTitle {
			vertical-align: middle;
			cursor: pointer;
		}
		
		.deleteMenu {
			float: right;
			cursor: pointer;
		}
		
		h1 {
			font-size: 2em;
			margin-bottom: 0;
		}
		
		h2 {
			font-size: 1.2em;
			font-weight: 400;
			font-style: italic;
			margin-top: .2em;
			margin-bottom: 1.5em;
		}
		
		h3 {
			font-size: 1em;
			margin: 1em 0 .3em;
		}
		
		p,ol,ul,pre,form {
			margin-top: 0;
			margin-bottom: 1em;
		}
		
		dl {
			margin: 0;
		}
		
		dd {
			margin: 0;
			padding: 0 0 0 1.5em;
		}
		
		code {
			background: #e5e5e5;
		}
		
		input {
			vertical-align: text-bottom;
		}
		
		.notice {
			color: #c33;
		}
    </style>    
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
                                        <span style="font-size: 30px;"> Category & Sub-Category List   </span>
                                        <span>
                                        <a href="{{ route('sub-category.create')}}" class="col-md-2 pull-right"  style="margin-right:20px">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Add Sub Category</button> 
                                                </a>
                                                 <a href="{{ route('category.create')}}" class="col-md-2 pull-right">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Add Category</button> 
                                                </a>
                                              </span>
                                        
                                      </div><!-- /.box-header -->
                                       <hr>
                                
                                      @if(Session::has('flash_alert_notice'))
                                           <div class="alert alert-success alert-dismissable" >
                                              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                            <i class="icon fa fa-check"></i>  
                                           {{ Session::get('flash_alert_notice') }} 
                                           </div>
                                      @endif
                                      
                                      
                                <section id="demo">
                                    <ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded"> 
                                      @foreach ($all_cat as $key => $childs)
                                        
                                                <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_{{ $childs['id'] }}">
                                                <div class="menuDiv">			   
                                                    <span data-id="{{ $childs['id'] }}" class="itemTitle">{{ $childs['name'] }}</span>			   
                                                </div>
						<ol>
						@foreach ($childs['child'] as $key => $child)
							<li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_{{ $child['id'] }}">
							<div class="menuDiv">			   
							    <span data-id="{{ $child['id'] }}" class="itemTitle">{{ $child['name'] }}</span>			   
							</div>
								<ol>
								@foreach ($child['child'] as $key => $chil)
									<li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_{{ $chil['id'] }}">
									<div class="menuDiv">			   
									    <span data-id="{{ $chil['id'] }}" class="itemTitle">{{ $chil['name'] }}</span>			   
									</div>
										<ol>
										@foreach ($chil['child'] as $key => $chi)
											<li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_{{ $chi['id'] }}">
											<div class="menuDiv">			   
											    <span data-id="{{ $chi['id'] }}" class="itemTitle">{{ $chi['name'] }}</span>			   
											</div>
										@endforeach
										</ol>
								@endforeach
								</ol>
						@endforeach
						</ol>						 
                                        </li>		                                           
				      @endforeach
                                   </ol>                               
                                        <p><input id="toArray" name="toArray" type="submit" value=
					"Save Menu"></p><p id="preloader" style="display:none">....saving</p>
					<p id="menu_success" style="color:red;"></p>   
                                </section><!-- END #demo -->
                                      
                        
                                      
                                      
                                      
                                      <div class="box-body table-responsive no-padding" >
                                      <!--{!!  $category_listing !!}-->
                                        <!--<form method="post" action="{{ url('admin/category/save_menu') }}">
                                        <ul id="sortable">
                                        @foreach ($result_set as $key => $childs)
                                            
                                              @foreach ($childs as $key => $child) 
                                                  
                                                        @if($child['parent_id']==0) 
                                                        <?php  $pid = $child['id']; ?>
                                                        @endif  
                                                          
                                                          @if($child['parent_id']== $pid)
                                                            
                                                           <li class="ui-state-default">{!! str_repeat('---', $child['level']) !!} {{ ucfirst($child['cname']) }} <input type="hidden" name="parent[]" value="{{ ucfirst($child['parent_id']) }}"> <input type="hidden" name="order[]" value="{{ ($child['parent_id']).'-'.($child['id']).'-'.($child['order_id']) }}"> </li>
                                                          @else 
                                                         <?php $pid = $child['id']; ?>
                                                         
                                                         <li class="ui-state-default">{!! str_repeat('---', $child['level']) !!} {{ ucfirst($child['cname']) }} <input type="hidden" name="parent[]" value="{{ ucfirst($child['parent_id']) }}"> <input type="hidden" name="order[]" value="{{ ($child['parent_id']).'-'.($child['id']).'-'.($child['order_id']) }}"> </li>
                                                       
                                                        @endif
                                                        
                                                                                                               
                                              @endforeach                                              
                                             @endforeach
                                          </ul>
                                          <button type="submit"  class="btn btn-primary">Save menu</button>
                                        </form>-->
                                        
                                        <table class="table table-hover table-condensed">
                                          <thead>
                                            <tr>
                                                  <th>Category - Sub-Category list</th> 
                                                  <th>Action</th>
                                              </tr>
                                              @if(count($result_set )==0)
                                              <tr>
                                                <td colspan="7">
                                                  <div class="alert alert-danger alert-dismissable">
                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                    <i class="icon fa fa-check"></i>  
                                                    {{ 'Record not found. Try again !' }}
                                                  </div>
                                                </td>
                                              </tr>
                                           </thead>    
                                            @endif
                                            <?php $i=1; ?>
                                            @foreach ($result_set as $key => $childs) 
                                              @foreach ($childs as $key => $child) 
                                                  <tr>
                                                      <td style="border-left: 0px solid">  
                                                       <ul style="padding-top: 10px" >
                                                        @if($child['parent_id']==0) 
                                                        <?php  $pid = $child['id']; ?>
                                                        @endif  
                                                         
                                                          @if($child['parent_id']== $pid)
                                                           {!! str_repeat('<li style="border: 1px solid #3c8dbc; display: inline;  padding: 5px 7px; background-color: #3c8dbc;"></li>', $child['level']) !!} 
                                                           <li style="border: 1px solid #ccc; display: inline; margin-right: 5px; padding: 5px 7px;"> {{ ucfirst($child['cname']) }} </li>
                                                          @else 
                                                         <?php $pid = $child['id']; ?>
                                                         {!! str_repeat('<li style="border: 1px solid #3c8dbc; display: inline;  padding: 5px 7px; background-color: #3c8dbc;"></li>', $child['level']) !!} <li style="border: 1px solid #ccc; display: inline; margin-right: 5px; padding: 5px 7px;"> {{ ucfirst($child['cname']) }} </li>
                                                       
                                                        @endif
                                                        </ul>
                                                         
                                                      </td> 
                                                      <td> @if($child['parent_id']==0)
                                                         <a href="{{ route('category.edit',$child['id'])}}">
                                                            <i class="fa fa-fw fa-pencil-square-o" title="edit"></i> 
                                                        </a>@else
                                                          <a href="{{ route('sub-category.edit',$child['id'])}}">
                                                            <i class="fa fa-fw fa-pencil-square-o" title="edit"></i> 
                                                        </a>
                                                        @endif
                                                          {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$child['id'], 'route' => array('sub-category.destroy', $child['id']))) !!}
                                                          <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$child['id']}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                          
                                                           {!! Form::close() !!}

                                                      </td>
                                                  </tr> 
                                              @endforeach
                                             @endforeach   
                                          </table>
                                        </div>
                                        
                                        
                                           
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
