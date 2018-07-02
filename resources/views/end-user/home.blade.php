
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 
            
            <!-- Left side column. contains the logo and sidebar -->
            
                
                @include('partials.home-slider')
           

            
                <div id="main" class="site-main">
                          <div class="page-wrapper">
                              
                              @include('partials.home-left-deals-offer-sidebar')
                              
                              @include('partials.home-right-product-panel')
                              
                          </div>
                      </div>   

            
        @stop