<aside class="main-sidebar">
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
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      
      <li class="active treeview">
        <a href="{{ url('admin') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> </i>
        </a>
          
      </li>  

      @if(Auth::guard('admin')->user()->user_type==1)

      <li class="treeview {{ (isset($page_action) && $page_title=='User')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Users</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create User')?"active":'' }}" ><a href="{{ route('user.create')}}"><i class="fa fa-user-plus"></i> Create User</a></li>
           <li class="{{ (isset($page_action) && $page_action=='View User')?"active":'' }}"><a href="{{ route('user')}}"><i class="fa  fa-list"></i> View User</a></li>
        </ul>
      </li>
 
      <li class="treeview {{ (isset($page_action) && $page_title=='Category')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage category</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create category')?"active":'' }}" ><a href="{{ route('category.create')}}"><i class="fa fa-user-plus"></i> Create Category</a></li>
           <li class="{{ (isset($page_action) && $page_action=='Create Sub-category')?"active":'' }}" ><a href="{{ route('sub-category.create')}}"><i class="fa fa-user-plus"></i> Add Sub-category</a></li>
          <li class="{{ (isset($page_action) && $page_action=='View Category')?"active":'' }}"><a href="{{ route('category')}}"><i class="fa  fa-list"></i> View Category</a></li>
        </ul>
      </li>

      <li class="treeview {{ (isset($page_action) && $page_title=='Default Category')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Set Default Menu</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        
           <li class="{{ (isset($page_action) && $page_action=='Default Category List')?"active":'' }}" ><a href="{{ route('category-dashboard')}}"><i class="fa fa-user-plus"></i> Set default menu</a></li>
           
        </ul>
      </li> 

      <li class="treeview {{ (isset($page_action) && $page_title=='Product')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Product</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create Product')?"active":'' }}" ><a href="{{ route('product.create')}}"><i class="fa fa-user-plus"></i> Create Product</a></li>
          <li class="{{ (isset($page_action) && $page_action=='View Product')?"active":'' }}"><a href="{{ route('product')}}"><i class="fa  fa-list"></i> View Product</a></li>
        </ul>
      </li>  
        
      <li class="treeview {{ (isset($page_action) && $page_title=='Transaction')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Transactions</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='View Transaction')?"active":'' }}"><a href="{{ route('transaction')}}"><i class="fa  fa-list"></i> Transactions</a></li>
        </ul>
      </li>  
       <li class="treeview {{ (isset($page_action) && $page_title=='Blog')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Blog</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create Blog')?"active":'' }}" ><a href="{{ route('blog.create')}}"><i class="fa fa-user-plus"></i> Create Blog</a></li>
          <li class="{{ (isset($page_action) && $page_action=='View Blog')?"active":'' }}"><a href="{{ route('blog')}}"><i class="fa  fa-list"></i> View Blog</a></li>
        </ul>
      </li>
      <li class="treeview {{ (isset($page_action) && $page_title=='Blog')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Faq</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create Faq')?"active":'' }}" ><a href="{{ route('faq.create')}}"><i class="fa fa-user-plus"></i> Create Question</a></li>
          <li class="{{ (isset($page_action) && $page_action=='View Faq')?"active":'' }}"><a href="{{ route('faq')}}"><i class="fa  fa-list"></i> View Question</a></li>
        </ul>
      </li>

      <li class="treeview {{ (isset($page_action) && $page_title=='setting')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Website Setting</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='View setting')?"active":'' }}"><a href="{{ route('setting')}}"><i class="fa  fa-list"></i> Website Setting</a></li>
        </ul>
      </li>
      <li class="treeview {{ (isset($page_action) && $page_title=='Vendor')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Vendors</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create Vendor')?"active":'' }}" ><a href="{{ route('vendor.create')}}"><i class="fa fa-user-plus"></i> Create Vendor</a></li>
           <li class="{{ (isset($page_action) && $page_action=='View Vendor')?"active":'' }}"><a href="{{ route('vendor')}}"><i class="fa  fa-list"></i> View Vendor</a></li>
        </ul>
      </li>
      <li class="treeview {{ (isset($page_action) && $page_title=='Pages')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Pages</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">          
           <li class="{{ (isset($page_action) && $page_action=='View Pages')?"active":'' }}"><a href="{{ route('page')}}"><i class="fa  fa-list"></i> View Pages</a></li>
        </ul>
      </li>
        <li class="treeview">
        <a href="{{ url('admin/robots') }}" target="_blank">
          <i class="fa fa-dashboard"></i> <span>Upload robots.txt</span> </i>
        </a>
          
      </li>
     <li class="treeview">
        <a href="{{ url('admin/sitemap') }}" target="_blank">
          <i class="fa fa-dashboard"></i> <span>Generate Sitemap</span> </i>
        </a>
          
      </li>
       <li class="treeview">
        <a href="{{ url('admin/redirect-301') }}" >
          <i class="fa fa-dashboard"></i> <span>301 Redirection</span> </i>
        </a>
          
      </li>
      @else


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
          <span>Manage Product</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='Create Product')?"active":'' }}" ><a href="{{ route('product.create')}}"><i class="fa fa-user-plus"></i> Create Product</a></li>
          <li class="{{ (isset($page_action) && $page_action=='View Product')?"active":'' }}"><a href="{{ route('product')}}"><i class="fa  fa-list"></i> View Product</a></li>
        </ul>
      </li>  

      <li class="treeview {{ (isset($page_action) && $page_title=='Transaction')?"active":'' }} ">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Transactions</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
          <li class="{{ (isset($page_action) && $page_action=='View Transaction')?"active":'' }}"><a href="{{ route('transaction')}}"><i class="fa  fa-list"></i> Transactions</a></li>
        </ul>
      </li>  

      @endif

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
 
