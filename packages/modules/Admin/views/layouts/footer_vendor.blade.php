      
<!-- jQuery 2.1.4 -->
      <script src="{{ URL::asset('public/assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
      <script src="{{ URL::asset('public/assets/js/jquery.validate.js') }}"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="{{ URL::asset('public/assets/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- iCheck -->
      <!--<script src="{{ URL::asset('public/assets/plugins/iCheck/icheck.min.js') }}"></script>
       <script src="{{ URL::asset('public/assets/plugins/iCheck/datepicker.js') }}"></script>  
      <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>-->
     <script src="{{ URL::asset('public/assets/js/common.js') }}"></script>
     <script type="text/javascript">
        var email_req = '{{ Lang::get('admin-lang.email_req') }}';
        var password_req = '{{ Lang::get('admin-lang.password_req') }}';
     </script>
     <script>
        function vendor(type){
        //alert(type);
            if(type == 1){
                $('#company_name').hide();
                $('#manager_name').hide();
                $('#tax_name').hide();
                $('#tax_no').hide();
                $('#full_name').show();
                $('#tc_no').show();
            }
            if(type == 2){
                $('#company_name').show();
                $('#manager_name').show();
                $('#tax_name').show();
                $('#tax_no').show();
                $('#full_name').hide();
                $('#tc_no').hide();
            }
        }
     </script>
        <script src="{{ asset('public/new/js/bootstrap-select.min.js') }}"></script>
            <script>
        $('.selectpicker').selectpicker({
  style: 'btn',
  size: 4,
});
</script>
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
                    <a href="{{ url('/Yardım-Merkezi') }}">Yardým</a>
                    <a href="{{ url('/Yardım-Merkezi') }}">Ýletiþim</a>
                </div>
               
            </div>
        </div>
      </div>  
            </div>            
    </div>
</div>            
            
<!---------------------------------------------------------------------------->            

<div id="confirm" class="modal hide fade">
    <div class="modal-body">
        Are you sure?
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>

 
      
    
 <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('public/assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ URL::asset('public/assets/js/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ URL::asset('public/assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ URL::asset('public/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <!-- jQuery Knob Chart -->
    <script src="{{ URL::asset('public/assets/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ URL::asset('public/assets/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('public/assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('public/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ URL::asset('public/assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('public/assets/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('public/assets/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('public/assets/dist/js/demo.js') }}"></script>
     <script src="{{ URL::asset('public/assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/jquery.validate.js') }}"></script>

    <script src="{{ URL::asset('public/assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/bootbox.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/common.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/ckeditor/ckeditor.js') }}"></script>
    
    
    
    <script type="text/javascript">
        $(".select2").select2();
        var url = "{{ url('admin') }}";
        var email_req = '{{ Lang::get('immoclick-lang.email_req') }}';
        var password_req = '{{ Lang::get('immoclick-lang.password_req') }}';
    </script>  
    <script type="text/javascript">
      $(function(){  
            CKEDITOR.editorConfig = function( config ) {
              // Other configs
              config.filebrowserImageBrowseUrl = "<?php echo url('public/ckeditor/pictures'); ?>";
              config.filebrowserImageUploadUrl = "<?php echo url('public/ckeditor/pictures'); ?>";

            };

        });
    </script>
  
</script>
        
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
  
  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
  <script>
    $('#selectAll').click(function (e) {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });
    
    $('#activate').click(function (e) {
        $('#mytable').find('input[type="checkbox"]:checked').each(function () {
            //this is the current checkbox
            //alert($(this).val());
            activeStatus(($(this).val()),'product')
         });
    });
    $('#deactivate').click(function (e) {
        $('#mytable').find('input[type="checkbox"]:checked').each(function () {
            //this is the current checkbox
            //alert($(this).val());
            deactiveStatus(($(this).val()),'product')
         });
    });
  </script>
  <script>
    $(document).on("click", "#add_more_milestone", function () {
            var img_count = Number($("#milestone_field").val());
            
            //if(img_count <= 3){
                img_count = Number(img_count) + 1;
                $("#milestone_field").val(img_count);
                var html = '';
                html += "<div class='row' style='margin:5px'>";
                html += "<div class='col-sm-3' style='padding-right:20px'>";
                html += "<div class='form-group'>";
                html += "<label class='control-label'>Size</label>";
                html += "<select class='form-control milestone' id='s_"+img_count+"' name='size[]'>";
                html += "<option value=''>Select Size</option>";
                html += "<option value='xxs'>XXS</option>";
                html += "<option value='xs'>XS</option>";
                html += "<option value='s'>S</option>";
                html += "<option value='m'>M</option>";
                html += "<option value='l'>L</option>";
                html += "<option value='xl'>XL</option>";
                html += "<option value='xxl'>XXL</option>";
                html += "<option value='xxxl'>XXXL</option>";
                html += "<option value='24'>24'</option>";
                html += "<option value='32'>32'</option>";
                html += "</select>";                
                html += "</div>";
                html += "</div>";
                
                //html += "<div class='col-sm-3' style='padding-right:20px'>";
                //html += "<div class='form-group'>";
                //html += "<label class='control-label'>Color</label>";
                //html += "<select class='form-control milestone' id='"+img_count+"' name='color[]'>";
                //html += "<option value=''>Select Color</option>";
                //html += "<option value='Black'>Black</option>";
                //html += "<option value='Blue'>Blue</option>";
                //html += "<option value='Pink'>Pink</option>";
                //html += "<option value='Purple'>Purple</option>";
                //html += "<option value='Yellow'>Yellow</option>";
                //html += "<option value='Red'>Red</option>";
                //html += "</select>";                
                //html += "</div>";
                //html += "</div>";
                
                              html += "<div class='col-sm-6' style='padding-right:20px'>";
                              html += "<div class='form-group'>";
                              html += "<label class='control-label'>Color</label>";
                              html += "<input class='jscolor form-control' value='' id='"+img_count+"' name='color[]'>";                              
                              var a  = "'#f00'"; var b  = "'#000'"; var c = "'#FFFFFF'"; var d = "'#F0F'"; var e = "'#06F'"; var f = "'#FFD700'"; var g = "'#96F'"; var h = "'#777777'"; var h1 = "'mix'"; 
                              html += '<p style="background-color:#f00; width:10px; float:left; margin:3px;" onclick="document.getElementById('+img_count+').style.background='+a+'; document.getElementById('+img_count+').value = '+a+';">&nbsp;</p>';
                              html += '<p style="background-color:#000; width:10px; float:left; margin:3px;" onclick="document.getElementById('+img_count+').style.background='+b+'; document.getElementById('+img_count+').value = '+b+';">&nbsp;</p>';
                              html += '<p style="background-color:#FFFFFF; width:10px; float:left; margin:3px;  border:1px solid;" onclick="document.getElementById('+img_count+').style.background='+c+'; document.getElementById('+img_count+').value = '+c+';">&nbsp;</p>';
                              html += '<p style="background-color:#F0F; width:10px; float:left; margin:3px;" onclick="document.getElementById('+img_count+').style.background='+d+'; document.getElementById('+img_count+').value = '+d+';">&nbsp;</p>';
                              html += '<p style="background-color:#06F; width:10px; float:left; margin:3px;" onclick="document.getElementById('+img_count+').style.background='+e+'; document.getElementById('+img_count+').value = '+e+';">&nbsp;</p>';
                              html += '<p style="background-color:#FFD700; width:10px; float:left; margin:3px;" onclick="document.getElementById('+img_count+').style.background='+f+'; document.getElementById('+img_count+').value = '+f+';">&nbsp;</p>';
                              html += '<p style="background-color:#96F; width:10px; float:left; margin:3px;" onclick="document.getElementById('+img_count+').style.background='+g+'; document.getElementById('+img_count+').value = '+g+';">&nbsp;</p>';
                              html += '<p style="background-color:#777777; width:25px; float:left; margin:3px; border:1px solid;" onclick="document.getElementById('+img_count+').style.background='+h+'; document.getElementById('+img_count+').value = '+h+';">Mix</p>';                                                                                        
                              html += "</div>";
                              html += "</div>";
                
                html += "<div class='col-sm-2' style='padding-right:20px'>";
                html += "<div class='form-group'>";
                html += "<label class='control-label'>Quantity</label>";
                html += "<input type='number' class='form-control milestone' id='"+img_count+"' name='quantity[]' placeholder='quantity' required/>";
                html += "</div>";
                html += "</div>";
                
                html += "<div class='col-sm-1' style='padding-right:20px'>";
                html += "<label class='control-label'>&nbsp;</label>";
                html += "<div class='form-group'>";
                html += "&nbsp;<img src='http://mactosys.com/allAboutTheMusic/assets/dist/img/bt_delete.png' style='cursor:pointer; height:10px; width:10px;' title='Remove variation' class='remove_img_div'/>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                
                $("#milestone_upload_section").append(html);
                var color = new jscolor($("#milestone_upload_section").find('input.jscolor:last')[0]);
            //}else{
            //    alert('You can create maximum 3 milestones.');
            //}
            
	    $('input.milestone').each(function() {
                $(this).rules("add", 
                    {
                        required: true
                    })
            }); 
	    
        });
        
        //remove product image from page
        $(document).on("click", ".remove_img_div", function () {
            var img_count = Number($("#milestone_field").val());
            img_count = Number(img_count) - 1;
            $("#milestone_field").val(img_count);
            $(this).closest(".row").remove();
        });
	
	
  </script>
    <script src="{{ URL::asset('public/new/js/jscolor.js') }}"></script>
    
</body>
</html>