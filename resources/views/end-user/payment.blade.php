
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 

            @include('partials.breadcrumb')
            <!-- Left side column. contains the logo and sidebar -->
            <div class="body-content">
                <div class="container">
                    <div class="checkout-box ">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div id="iyzipay-checkout-form" class="responsive"></div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    </div>        
                </div>
            </div>        
        @stop
