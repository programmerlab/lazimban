<footer>
                          <div class="page-wrapper">
                              <div class="col-md-3">
                                  <h3>Corporation</h3>
                                  <ul>
                                      <li class="fiRSt"><a title="Your Account" href="##">About us</a></li>
                                        <li><a title="Information" href="{{ url('contact') }}">Customer Service</a></li>
                                        <li><a title="Addresses" href="{{ url('contact') }}">Company</a></li>
                                        <li><a title="Addresses" href="{{ url('contact') }}">Investor Relations</a></li>
                                  </ul>
                              </div>
                              <div class="col-md-3">
                                  <h3>Customer Services</h3>
                                  <ul>
                                     <li class="fiRSt"><a href="{{ url('myaccount') }}" title="Contact us">My Account</a></li>
                                     <li><a href="{{ url('myaccount') }}" title="About us">Order History</a></li>
                                     <li><a href="{{url('faq')}}" title="faq">FAQ</a></li> 
                                     <li class="last"><a href="{{ url('contact') }}" title="Where is my order?">Help Center</a></li>
                                  </ul>
                              </div>
                              <div class="col-md-3">
                                  <h3>Vendor Application Form</h3>
                                  <ul>
                                      <li><input type="text" class="footer_input" placeholder="Your Name (required)"></li>
                                      <li><input type="text" class="footer_input" placeholder="Your Email (required)"></li>
                                      <li><textarea placeholder="Enter Your Message Here" class="footer_textarea"></textarea></li>
                                      <li><input type="submit" value="submit" class="submit-btn"></li>
                                  </ul>
                              </div>                            
                          </div>  
                      </footer>      
                      <div class="bottom_footer">
                        <div class="page-wrapper">
                            <div class="col-md-5"><p>Lazimbana.com All rights reserved..</p></div>
                            <div class="col-md-7">
                                <div class="footer_link pull-right">
                                    <a href="#">About us</a>
                                    <a href="#">Help</a>
                                    <a href="#">Contact</a>
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

            });	//ready

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
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
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
	</html>
