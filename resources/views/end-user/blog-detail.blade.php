@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content')
            <div class="page_title">
                <div class="page-wrapper">
                    <div class="col-md-6"><h1></h1>   </div>
                    <div class="col-md-6 text-right">
                            <span><a href="{{ url('/') }}">Anasayfa</a> </span>
                                                  
                            <span> Blog </span>  
                       </div>
                </div>
            </div>
            <div id="main" class="site-main">            
                <div class="page-wrapper">
                    <div class="blog-outer">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="blog_list">
                                        <div class="blog-thumbnail">
                                            <a href=""><img src="{{ asset('storage/uploads/blogs/'.$blog->image) }}"></a>
                                        </div>
                                        <div class="blog-content-wrap">
                                            
                                            <h3 class="text-capitalize"><a href="#">{!! $blog->title !!}</a></h3>
                                                <?php
                                                $mc = array("01"=>"ocak","02"=>"şubat","03"=>"mart",
                                                            "04"=>"nisan","05"=>"mayıs","06"=>"haziran",
                                                            "07"=>"temmuz","08"=>"ağustos","09"=>"eylül",
                                                            "10"=>"ekim","11"=>"kasım","12"=>"aralık");
                                                $month = (date('m', strtotime($blog->created_at)));
                                                
                                                ?>
                                            <ul class="blog-meta text-capitalize">
                                                <li class="entry-meta-author"><a href=""><i class="fa fa-user"></i> Ekleyen</a> </li>
                                                <li class="entry-meta-date"><i class="fa fa-calendar"></i> {!! date('d', strtotime($blog->created_at)) !!} {!! $mc[$month] !!} {!! date('Y h:i:s', strtotime($blog->created_at)) !!}	</li>                                                
                                            </ul> 
                                            <p>
                                                {!! $blog->description !!}
                                            </p>
                                        
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h3 class="text-capitalize">Etiket</h3>
                                                    <ul class="tag-list">
                                                        @foreach(explode(',',$blog->tags) as $tag)
                                                            <li><a href="">{!! $tag !!}</a></li>
                                                        @endforeach    
                                                    </ul>
                                                </div>
                                                                        
                                                <!--<div class="col-lg-6 text-right">
                                                    <h3 class="text-capitalize">share</h3>
                                                    <ul class="social-link">
                                                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>-->
                                            </div>                     
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">            	
                                    <aside class="widget widget-contact">
                                        <h3 class="widget-title">Diğer Bloglar</h3>
                                        <ul class="list-unstyled list-cat">
                                             @foreach($other_blog as $b)
                                                 <li><a href="{!! $b->slug !!}">{!! $b->title !!}</a> <span>  </span></li>
                                             @endforeach                                                                                          
                                        </ul>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>                                                              
                </div>
            </div>
        @stop



