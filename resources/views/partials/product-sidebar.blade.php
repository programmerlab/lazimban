 <div class="col-md-3 sidebar"> 
    <!-- ================================== TOP NAVIGATION ================================== -->
     @include('partials.side-category-tab')
    <!-- /.side-menu --> 
    <!-- ================================== TOP NAVIGATION : END ================================== -->
    <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
              <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
               <br> 
              <div style="visibility: visible; animation-name: fadeInUp;" class="sidebar-widget wow fadeInUp animated">
               
                <h3 class="section-title">shop by</h3> 
                <div class="widget-header">
                  <h4 class="widget-title">Category</h4>
                </div>
                <div class="sidebar-widget-body">
                  <div class="accordion">
                    
                <!-- /.accordion-group -->
                       @foreach($categories as $key => $value)
                      <div class="accordion-group">
                        <div class="accordion-heading"> <a href="#collapse{{$key }}" data-toggle="collapse" class="accordion-toggle collapsed"> {{$value['name']}} </a> </div>
                        <!-- /.accordion-heading -->
                         
                          <div class="accordion-body collapse" id="collapse{{$key}}" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                               @if(count($value['child'])>0)
                                    @foreach($value['child'] as $subCat)
                                      <li><a href="{{ url(str_slug($value['name'],'-').'/'.str_slug($subCat['name'],'-')) }}">{{$subCat['name']}}</a></li> 

                                                    
                                    @endforeach
                                    @else
                                     <li>
                                     <a href="{{ url(str_slug($value['name'],'-').'/'.str_slug($value['name'],'-')) }}">{{$value['name']}}</a></li> 
                                @endif
                              </ul>
                            </div>
                            <!-- /.accordion-inner --> 
                          </div>
                        
                        <!-- /.accordion-body --> 
                      </div>
                       @endforeach
                <!-- /.accordion-group -->
                
              </div>
              <!-- /.accordion --> 
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
           
        </div>
  <!-- /.sidebar-filter --> 
    </div>
<!-- /.sidebar-module-container --> 
</div>