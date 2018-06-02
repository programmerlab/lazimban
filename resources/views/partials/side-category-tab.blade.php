      
   <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown">
          <div class="head"><i class="icon fa fa-baRS"></i> Categories  </div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav"> 

              @foreach($categories as $key => $value)
                  <li class="dropdown menu-item"> <a href="{{ url($value['slug']) }}" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$value['name']}}</a>
                    <ul class="dropdown-menu mega-menu">
                      
                   
                      <li class="yamm-content">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                              <ul class="links list-unstyled">
                                @if(count($value['child'])>0)
                                @foreach($value['child'] as $subCat)
                                  <li><a href="{{ url($subCat['slug']) }}">{{$subCat['name']}}</a></li> 
                                @endforeach
                                @else
                                 <li>
                                 <a href="{{ url($value['slug']) }}">{{$value['name']}}</a></li> 
                                @endif
                              </ul>
                            </div>  

                            <!-- /.col --> 
                          </div>
                          <!-- /.row --> 
                        </li>
                       
                        <!-- /.yamm-content -->
                      </ul>
                    <!-- /.dropdown-menu --> 
                  </li>
                <!-- /.menu-item -->
               @endforeach
             
              <!-- /.menu-item --> 
               
              </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 