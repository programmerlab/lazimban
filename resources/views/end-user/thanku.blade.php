@extends('layouts.master')
    @section('title', 'HOME')
        @section('header')
        <h1>Home</h1>
        @stop
        @section('content') 
            
              @include('partials.breadcrumb')
            <!-- Left side column. contains the logo and sidebar -->
            <div class="">&nbsp;
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive" style="padding-bottom:50px">
                            <h2 class="heading-title">Verdiğiniz sipariş için çok teşekkür ederiz!</h2>
                            <span class="title-tag">Siparişinizin hazırlık işlemlerine hemen başlıyoruz...!</span>
                            <a href="{{url('myaccount')}}"><button>Siparişlerim</button></a>
                        </div>
                    </div>
                </div>
            </div>    
        @stop
