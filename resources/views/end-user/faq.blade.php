
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 
            
            <div class="page_title">
                <div class="page-wrapper">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 text-right">
                            <span><a href="#">Home</a> </span>                                            
                            <span> SSS </span>  
                       </div>
                </div>
            </div>            
            <div class="checkout-box faq-page">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-title">Frequently Asked Questions</h2>
                    <span class="title-tag">Last Updated on November 02, 2014</span>
                    <div class="panel-group checkout-steps" id="accordion">
                    <?php $i=1; ?>
                    @if($page)
                        @foreach($page as $p)
                        <div class="panel panel-default checkout-step-02">
                            <div class="panel-heading">
                              <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="index.htm#collapse{{$p->id}}">
                                  <span>{{ $i }} </span>{!! $p->title !!}  
                                </a>
                              </h4>
                            </div>
                            <div id="collapse{{$p->id}}" class="panel-collapse collapse">
                              <div class="panel-body">
                                   {!! $p->description !!}                                 
                              </div>
                            </div>
                        </div>
                        <?php $i++;?>    
                        @endforeach    
                    @endif        

                        
                    </div><!-- /.checkout-steps -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        @stop