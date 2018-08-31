
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 

            
            @include('partials.breadcrumb')
            <div class="checkout-box faq-page">
            <div class="container">
                <div class="col-md-12">
                    
                    
                    
                    
                    <div id="content" class="site-content" role="main">

						
				<article id="post-76" class="post-76 page type-page status-publish hentry">
					<header class="entry-header">
											</header><!-- .entry-header -->

					<h2>{{ ($page[0]->title) }}:</h2>
                                            <p>{!! ($page[0]->page_content) !!}</p>

					<footer class="entry-meta">
											</footer><!-- .entry-meta -->
				</article><!-- #post -->

				
<div id="comments" class="comments-area">

	
	
</div><!-- #comments -->			            
		</div>
                    
                    
                    
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        @stop
        
        