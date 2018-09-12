<footer>
      <div class="page-wrapper">
          <div class="col-md-3">
              <h3>Kurumsal</h3>
              <ul>
                  <!--<li class="fiRSt"><a title="Your Account" href="{{ url('about') }}">Hakkımızda</a></li>
                    <li><a title="Information" href="{{ url('privacy-policy') }}">Gizlilik Politikası</a></li>
                    <li><a title="Addresses" href="{{ url('delivery-and-returns') }}">Teslimat ve iadeler</a></li>
                    <li><a title="Addresses" href="{{ url('distance-sales-contract') }}">Mesafeli Satış Sözleşmesi</a></li>
                    <li><a title="Blog" href="{{ url('blogs') }}">Blog</a></li>-->
                     <?php $pagelink = $helper->getPages(); ?>
                    
                    <li class="fiRSt"><a title="Your Account" href="{{ url('/Hakkimizda') }}">Hakkımızda</a></li>
                    <li><a title="Information" href="{{ url('/Gizlilik-Politikası') }}">Gizlilik Politikası</a></li>
                    <li><a title="Addresses" href="{{ url('/Teslimat-Ve-Iadeler') }}">Teslimat ve iadeler</a></li>
                    <li><a title="Addresses" href="{{ url('/Mesafeli-Satış-Sözleşmesi') }}">Mesafeli Satış Sözleşmesi</a></li>
                    <li><a title="Blog" href="{{ url('blog') }}">Blog</a></li>
              </ul>
          </div>
          <div class="col-md-3">
              <h3>Müşteri Hizmetleri</h3>
              <ul>
                 <li class="fiRSt"><a href="{{ url('hesabim') }}" title="Contact us">Hesabım</a></li>
                 <li><a href="{{ url('hesabim') }}" title="About us">Sipariş Geçmişi</a></li>
                 <li><a href="{{url('SSS')}}" title="faq">SSS</a></li> 
                 <!--<li class="last"><a href="{{ url('contact') }}" title="Where is my order?">Yardım Merkezi</a></li>-->
                 <li class="last"><a href="{{ url('/Yardım-Merkezi') }}" title="Where is my order?">Yardım Merkezi</a></li>
              </ul>
          </div>
          <div class="col-md-3">
              <h3>Bize Ulaşın</h3>
              @if ($errors->has('successMsgcontact'))
                    <span class="btn btn-success">{{ $errors->first('successMsgcontact') }} </span>
                     
                @endif
               <form method="post" action="{{ url('/contactus') }}">
                    <ul>
                        <li><input type="text" class="footer_input" name="name" placeholder="Adınız (Gerekli)" required></li>
                        <li><input type="text" class="footer_input" name="email" placeholder="Eposta Adresiniz (Gerekli)" required></li>
                        <li><textarea placeholder="Mesajınız" name="message" class="footer_textarea" required></textarea></li>
                        <li><input type="submit" value="Gönder" class="submit-btn"></li>
                    </ul>
                </form> 
          </div>                            
      </div>  
</footer>      
      <div class="bottom_footer" id="bottom">
        <div class="page-wrapper">
            <div class="col-md-5"><p>Lazimbana.com Tüm hakları saklıdır..</p></div>
            <div class="col-md-7">
                <div class="footer_link pull-right">
                    <a href="{{ url('/Hakkimizda') }}">Hakkımızda</a>
                    <a href="{{ url('/SSS') }}">Yardım</a>
                    <a href="{{ url('/Yardım-Merkezi') }}">İletişim</a>
                </div>
               
            </div>
        </div>
      </div>
</div>
</div>    
</div>
</body>
           
<script src="{{ asset('public/new/js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>            
<script>
            $( function() {
              $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ],
                slide: function( event, ui ) {
                  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
              });
              $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );
            } );
        </script>
        <script src="{{ asset('public/new/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/new/js/owl.carousel.js') }}"></script>
        <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                items:1,
                responsiveClass:true,
        
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:1,
                        nav:false
                    },
                    1000:{
                        items:4,
                        nav:true,
                        loop:false,
                        margin:0
                    }
                }
            })                                            
        });
        </script>
        <script src="{{ asset('public/new/js/easy-responsive-tabs.js') }}"></script>
        <script>
            $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
            }
            });
            $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
            });
            });
        </script>
        <script type="text/javascript" src="{{ asset('public/new/js/jquery.themepunch.plugins.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/new/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript">    
            var revapi;

            jQuery(document).ready(function() {

                   revapi = jQuery('.fullwidthbanner').revolution(
                    {
                        delay:15000,
                        startwidth:1170,
                        startheight:500,
                        hideThumbs:10,

                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:5,

                        navigationType:"both",
                        navigationArrows:"solo",
                        navigationStyle:"round",

                        touchenabled:"on",
                        onHoverStop:"on",

                        navigationHAlign:"center",
                        navigationVAlign:"bottom",
                        navigationHOffset:0,
                        navigationVOffset:0,

                        soloArrowLeftHalign:"left",
                        soloArrowLeftValign:"center",
                        soloArrowLeftHOffset:20,
                        soloArrowLeftVOffset:0,

                        soloArrowRightHalign:"right",
                        soloArrowRightValign:"center",
                        soloArrowRightHOffset:20,
                        soloArrowRightVOffset:0,

                        shadow:0,
                        fullWidth:"on",
                        fullScreen:"off",

                        stopLoop:"on",
                        stopAfterLoops:0,
                        stopAtSlide:1,


                        shuffle:"off",

                        autoHeight:"off",
                        forceFullWidth:"off",

                        hideThumbsOnMobile:"off",
                        hideBulletsOnMobile:"on",
                        hideArrowsOnMobile:"on",
                        hideThumbsUnderResolution:0,

                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:768,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0,
                        videoJsPath:"plugins/revslider/rs-plugin/videojs/",
                        fullScreenOffsetContainer: ""
                    });

            }); //ready

        </script>
        <script src="{{ asset('public/new/js/jquery.zoom.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('.ex1').zoom();
                $('#ex2').zoom({ on:'grab' });
                $('#ex3').zoom({ on:'click' });          
                $('#ex4').zoom({ on:'toggle' });
            });
        </script>
        <script type="text/javascript">
    
            function updateCart(value) {
                 // alert(value);
                  var href = $('#addToCart').attr('href');
        
                  $('#addToCart').attr('href',href+'?item='+value); 
            }
        </script>
        
        <script type="text/javascript">
        
        var url= "{{ url('/') }}";

        </script>
    <!-- ============================================================= FOOTER : END============================================================= --> 

    <!-- For demo purposes – can be removed on production --> 

    <!-- For demo purposes – can be removed on production : End --> 

    <!-- JavaScripts placed at the end of the document so the pages load faster --> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script type="text/javascript">
      
      $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
      });
    </script>

    
    <script src="{{ asset('public/enduser/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
    
    <script src="{{ asset('public/enduser/assets/js/echo.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/jquery.easing-1.3.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/bootstrap-slider.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/jquery.rateit.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('public/enduser/assets/js/lightbox.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/bootstrap-select.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/wow.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootbox.js') }}"></script>
    <script src="{{ asset('public/assets/js/common.js') }}"></script> 
      <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
		$(this).toggleClass("open-btn");
		$('body').toggleClass("toggled");
        
     
          });
	
	    
    </script>
    <script>
	@if(Request::url() === 'https://www.lazimbana.com')
	
	var i = 0;
$("#menu-toggle").on('click', function(){
    if(i == 0) {
        $("body").stop().animate({left:'0'},500);
        i = 1;
    } else {
        $("body").stop().animate({left:'250'},500);
        i = 0;
    }
	
	@else
    var i = 0;
$("#menu-toggle").on('click', function(){
    if(i == 0) {
        $("body").stop().animate({left:'250'},500);
        i = 1;
    } else {
        $("body").stop().animate({left:'0'},500);
        i = 0;
    }
@endif
	
	

});
	</script>
    
    <script>
    $(document).ready(function() {   
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
    $(sel).toggleClass('in');
    $(sel2).toggleClass('out');
    });
    });
    </script>
        
    <!-------------Image zoom and additional images  ------------>
    <script type="text/javascript" src="{{ asset('public/new/js/jqueryElevateZoom.js') }}"></script>
    <script src="{{ asset('public/new/js/ubislider.min612e.js') }}"></script>

        <script type="text/javascript">
    	    
		    $('#slider4').ubislider({
		        arrowsToggle: true,
		        type: 'ecommerce',
		        hideArrows: true,
		        autoSlideOnLastClick: true,
		        modalOnClick: true,
		        onTopImageChange: function(){
		        	$('#imageSlider4 img').elevateZoom();
		        }
		    }); 
		    
        </script>
       
        <script src="{{ asset('public/new/js/bootstrap-select.min.js') }}"></script>
            <script>
        $('.selectpicker').selectpicker({
  style: 'btn',
  size: 4,
});
</script>
    <script>
       function toggle_ship(){
        //$('#shipping').toggle();
       }
    </script>
    <script>
       function show_tax(){
            if($('#company_name').val() != ''){
                $('#tax1').show();
                $('#tax2').show();   
            }else{
                $('#tax1').hide();
                $('#tax2').hide();   
            }
       }
       
       function show_tax1(){
            if($('#company_name1').val() != ''){
                $('#tax11').show();
                $('#tax22').show();   
            }else{
                $('#tax11').hide();
                $('#tax22').hide();   
            }
       }
    </script>
    <!--- Google Tag script   --->    
    {!! $helper->getGoogleTag() !!}
    
    </html>
