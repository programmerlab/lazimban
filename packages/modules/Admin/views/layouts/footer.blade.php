<div id="confirm" class="modal hide fade">
    <div class="modal-body">
        Are you sure?
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>

<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="{{ url('/')}}"></a>.</strong> All rights reserved.
      </footer>
 
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
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
  <!--<script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>-->
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
                
                              html += "<div class='col-sm-3' style='padding-right:20px'>";
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
                
                html += "<div class='col-sm-3' style='padding-right:20px'>";
                html += "<div class='form-group'>";
                html += "<label class='control-label'>Quantity</label>";
                html += "<input type='number' class='form-control milestone' id='"+img_count+"' name='quantity[]' placeholder='quantity' required/>";
                html += "</div>";
                html += "</div>";
                
                html += "<div class='col-sm-3' style='padding-right:20px'>";
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
        
        
        
        
        
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/darkness/jquery-ui.css" />
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>-->
	<script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Plugin-To-Sort-Nested-Lists-Using-Drag-Drop-nestedSortable/jquery.mjs.nestedSortable.js"></script>
	
	<script>
		$().ready(function(){
			var ns = $('ol.sortable').nestedSortable({
				forcePlaceholderSize: true,
				handle: 'div',
				helper:	'clone',
				items: 'li',
				opacity: .6,
				placeholder: 'placeholder',
				revert: 250,
				tabSize: 25,
				tolerance: 'pointer',
				toleranceElement: '> div',
				maxLevels: 4,
				isTree: true,
				expandOnHover: 700,
				startCollapsed: false,
				change: function(){
					console.log('Relocated item');
				}
			});
			
			$('.expandEditor').attr('title','Click to show/hide item editor');
			$('.disclose').attr('title','Click to show/hide children');
			$('.deleteMenu').attr('title', 'Click to delete item.');
		
			$('.disclose').on('click', function() {
				$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
				$(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
			});
			
			$('.expandEditor, .itemTitle').click(function(){
				var id = $(this).attr('data-id');
				$('#menuEdit'+id).toggle();
				$(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
			});
			
			$('.deleteMenu').click(function(){
				var id = $(this).attr('data-id');
				$('#menuItem_'+id).remove();
			});
				
			$('#serialize').click(function(){
				serialized = $('ol.sortable').nestedSortable('serialize');
				$('#serializeOutput').text(serialized+'\n\n');
			})
	
			$('#toHierarchy').click(function(e){
				hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
				hiered = dump(hiered);
				(typeof($('#toHierarchyOutput')[0].textContent) != 'undefined') ?
				$('#toHierarchyOutput')[0].textContent = hiered : $('#toHierarchyOutput')[0].innerText = hiered;
			})
	
			$('#toArray').click(function(e){
				arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});				                				                			
                
                $.ajax({
                    url: '{{ url('admin/category/save_menu') }}',
                    type: "POST",
                    data: {"array":arraied},
                    beforeSend: function() {
                            $("#preloader").show();                            
                         },
                    success: function (data) {                       
                        console.log(data);
                        $("#menu_success").html('Menu saved successfully');
                        $("#preloader").hide();                        
                        location.reload();
                    }
                });
                arraied = dump(arraied);
//                (typeof($('#toArrayOutput')[0].textContent) != 'undefined') ?
//				$('#toArrayOutput')[0].textContent = arraied : $('#toArrayOutput')[0].innerText = arraied;
                console.log(arraied);
			});
		});			
	
		function dump(arr,level) {
			var dumped_text = "";
			if(!level) level = 0;
	
			//The padding given at the beginning of the line.
			var level_padding = "";
			for(var j=0;j<level+1;j++) level_padding += "    ";
	
			if(typeof(arr) == 'object') { //Array/Hashes/Objects
				for(var item in arr) {
					var value = arr[item];
	
					if(typeof(value) == 'object') { //If it is an array,
						dumped_text += level_padding + "'" + item + "' ...\n";
						dumped_text += dump(value,level+1);
					} else {
						dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
					}
				}
			} else { //Strings/Chars/Numbers etc.
				dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
			}
			return dumped_text;
		}
	</script>
        
        
        
        

        
        
  </body>
</html>
