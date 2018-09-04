
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 

            @include('partials.menu')
            <div class="track-order-page">
              <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-title">Siparişinizi takip edin</h2>
                    <span class="title-tag inner-top-ss">Lütfen aşağıdaki kutuya Sipariş Kimliğinizi girin ve Enter tuşuna basın. Bu size makbuzunuzda ve aldığınız onay e-postasında verilmiştir. </span>
                    <form class="register-form outer-top-xs" role="form">
                      <div class="form-group">
                          <label class="info-title" for="exampleOrderId1">Sipariş Kimliği</label>
                          <input type="text" class="form-control unicase-form-control text-input" id="exampleOrderId1" >
                      </div>
                        <div class="form-group">
                          <label class="info-title" for="exampleBillingEmail1">Fatura E-postası</label>
                          <input type="email" class="form-control unicase-form-control text-input" id="exampleBillingEmail1" >
                      </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Izlemek</button>
                    </form> 
                    </div>      
                  </div><!-- /.row -->
                </div>
        @stop
		