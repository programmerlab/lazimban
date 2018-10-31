
@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hoşgeldiniz</div>
                <div class="panel-body">
                   
                    <div align="center">
                      
                        <div class="alert alert-success">
                           Satıcı başvurunuzu aldık. İnceleyip, size mümkün olan en kısa sürede geri dönüş sağlayacağız!
                        </div>  
                          <div class="alert alert-default">
                          <a href="{{url('satici/giris-kayit')}}"> Onayınızın ardından buradan giriş yapabilirsiniz. </a>
                        </div>    
                      
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection