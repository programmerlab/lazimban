
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
                            <span> Hakkimizda </span>  
                       </div>
                </div>
            </div>
            <!--<div class="breadcrumb">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <ul class="list-inline list-unstyled">
                            <li><a href="home.html">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div><!-- /.breadcrumb-inner --
                </div><!-- /.container --
            </div>-->
            <div class="inner_page_outer">
            <div class="page-wrapper">
            	<div class="about_panel">
            	<div class="col-md-6"><img class="alignnone wp-image-86" src="{{ asset('storage/uploads/e-ticaret.jpg') }}"/></div>
                <div class="col-md-6">
                	<h2>{{ ($page[0]->title) }}</h2>
                    <p>{!! ($page[0]->page_content) !!}</p>
                </div>
                </div>
                <div class="testinomial_outer">
                	<div class="col-md-12"><h2>Ekibimiz</h2></div>
                        <div class="col-md-3 col-sm-6">
                        <div class="team-content-wrap">
                        <div class="team-thumbnail">
                        <img src="{{ asset('storage/uploads') }}/3-1-600x600.jpg" class="post-th-image" alt="" >
                        </div>
                        <h4 class="entry-title"><a href="https://www.lazimbana.com/?team=gamze-yurduseven">Gamze Yurduseven</a></h4>
                        <h5>Koordinatör</h5>
                        <div class="team-social">
                        <ul>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="skype:#" target="_blank"><i class="fa fa-skype"></i></a></li> 
                        </ul>
                        </div>                
                        </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                        <div class="team-content-wrap">
                        <div class="team-thumbnail">
                        <img src="{{ asset('storage/uploads') }}/2-2-600x600.jpg" class="post-th-image" alt="" >
                        </div>
                        <h4 class="entry-title"> <a href="https://www.lazimbana.com/?team=leyla-ozturk">Leyla Öztürk</a></h4>
                        <h5>Grafiker</h5>
                        <div class="team-social">
                        <ul>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="skype:#" target="_blank"><i class="fa fa-skype"></i></a></li> 
                        </ul>
                        </div>                
                        </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                        <div class="team-content-wrap">
                        <div class="team-thumbnail">
                        <img src="{{ asset('storage/uploads') }}/1-1-600x600.jpg" class="post-th-image" alt="" >
                        </div>
                        <h4 class="entry-title"> <a href="https://www.lazimbana.com/?team=akin-yilmaz">Akın Yılmaz</a></h4>
                        <h5>Yazılım Mühendisi</h5>
                        <div class="team-social">
                        <ul>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="skype:#" target="_blank"><i class="fa fa-skype"></i></a></li> 
                        </ul>
                        </div>                
                        </div>
                        </div>
                        
                <div class="col-md-3 col-sm-6">
                        <div class="team-content-wrap">
                        <div class="team-thumbnail">
                        <img src="{{ asset('storage/uploads') }}/5-1-600x600.jpg" class="post-th-image" alt="" >
                        </div>
                        <h4 class="entry-title"><a href="https://www.lazimbana.com/?team=secil-bozok">Seçil Bozok</a></h4>
                        <h5>Pazarlama </h5>
                        <div class="team-social">
                        <ul>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="skype:#" target="_blank"><i class="fa fa-skype"></i></a></li> 
                        </ul>
                        </div>                
                        </div>
                        </div>
                
               
                 </div>
                 </div>   
           


                

            
      

		
        @stop