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
                            <span><a href="#">Home</a> </span>
                                                  
                            <span> Blog </span>  
                       </div>
                </div>
            </div>
            <div id="main" class="site-main">
              	<div class="page-wrapper">
                	
                    <section class="blog_outer">
                        <div class="">
                            <div class="row">
                                @foreach($blogs as $blog)
                                    <div class="col-md-4">
                                        <div class="blog_item">
                                            <div class="blog-image">
                                                        <a href="#"><img src="{{ asset('storage/uploads/blogs/'.$blog->image) }}" class="img-responsive img-full" alt=""> </a>
                                            </div>
                                            <div class="blog_content">
                                                <h4 class="text-capitalize"><a href="blog-detail/{!! $blog->id !!}">{{ $blog->title }}</a></h4>
                                                <p>{!! substr($blog->description,0,200) !!}..</p>
                                                <a href="blog-detail/{!! $blog->id !!}" class="block-read-more">Read More<i class="fa fa-arrow-circle-right"></i></a>
                                                <div class="block-info">
                                                    <ul class="list-info">
                                                        <li class="author">
                                                            <span class="author-label">By </span><a  class="link"><span class="author-text">Admin</span></a></li>
                                                        <li class="date"><a href="#" class="link date">{!! date('d M Y h:i:s', strtotime($blog->created_at)) !!}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach                                                                                            
                            </div>
                        </div>
                    </section>
                    
                                                                                  
                </div>
            </div>
        @stop



