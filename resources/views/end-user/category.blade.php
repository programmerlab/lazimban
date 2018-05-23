
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 
         <div class="row">
            @include('partials.menu')
            @include('partials.breadcrumb')
         
            
               @include('partials.product-sidebar') 
               
                @include('partials.product') 
            </div> 
    @stop
 