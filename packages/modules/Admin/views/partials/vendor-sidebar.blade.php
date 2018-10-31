<aside class="main-sidebars">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img alt="User Image" class="img-circle" src="{{ URL::asset('public/new/images/profile/'.Session::get('current_vendor_image')) }}">
      </div>
      <div class="pull-left info">
        <p>
           @if(Auth::guard('admin')->user()->user_type==1)
           Admin
           @else
           {{ Auth::guard('admin')->user()->full_name}} 
           @endif
         </p>
        
      </div>
    </div>
    <?php $helper1 = new Helper();?>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      
      
      <li class="treeview {{ (isset($page_action) && $page_title=='Satıcı Paneli')?"active":'' }}">
        <a href="{{ url('bana-ozel/satici-paneli') }}">
          <i class="fa fa-dashboard"></i> <span>Yönetim Paneli</span> </i>
        </a>
          
      </li>  
      <li class="treeview {{ (isset($page_action) && $page_title=='Profil')?"active":'' }}">
        <a href="{{ url('bana-ozel/satici-paneli/profil') }}">
          <i class="fa fa-dashboard"></i> <span>Profil</span> </i>
        </a>
          
      </li> 
     


      <!--<li class="treeview {{ (isset($page_action) && $page_title=='User')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Users</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create User')?"active":'' }}" ><a href="{{ route('user.create')}}"><i class="fa fa-user-plus"></i> Create User</a></li>
           <li class="{{ (isset($page_action) && $page_action=='View User')?"active":'' }}"><a href="{{ route('user')}}"><i class="fa  fa-list"></i> View User</a></li>
        </ul>
      </li>-->

      <li class="treeview {{ (isset($page_action) && $page_title=='Product')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Ürün Yönetimi</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create Product')?"active":'' }}" ><a href="{{ url('satici-paneli/urun/ekle')}}"><i class="fa fa-user-plus"></i>ÜRÜN EKLE</a></li>
          <li class="{{ (isset($page_action) && $page_action=='View Product')?"active":'' }}"><a href="{{ route('product')}}"><i class="fa  fa-list"></i>Tüm Ürünler</a></li>
        </ul>
      </li>
        
       <li class="treeview {{ (isset($page_action) && $page_title=='Product')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Featured Products</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create Product')?"active":'' }}" ><a href="{{ url('satici-paneli/featuredProduct/create')}}"><i class="fa fa-user-plus"></i>Add</a></li>
          <li class="{{ (isset($page_action) && $page_action=='View Product')?"active":'' }}"><a href="{{ url('satici-paneli/featuredProduct')}}"><i class="fa  fa-list"></i>List</a></li>
        </ul>
      </li>
        
        
      <li class="treeview {{ (isset($page_action) && $page_title=='Transaction')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Sipariş Yönetimi
          @if(($helper1->getVendorOrderNotifications()))
              <button class="btn btn-danger btn-sm">{{ ($helper1->getVendorOrderNotifications()) }}</button></span>
          @endif
          </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='View Transaction')?"active":'' }}"><a href="{{ url('satici-paneli/işlem')}}"><i class="fa  fa-list"></i> Işlem</a></li>
        </ul>
      </li>  

     
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
 
