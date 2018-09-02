<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <br>
  <br>
  <br>
  <!-- main menu header-->

  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

      <li class=" nav-item">
        <a href="{{ url('inventory') }}"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Inventory</span>
        </a>
        <ul class="menu-content">
        <li> <a href="{{ url('inventory') }}">
          <i class="icon-eye4"></i>
          Inventory List</a>
          </li>
          <li><a href="{{ route('sale.create') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Sales</a>
          </li>
          <li><a href="{{ route('sale.index') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Sales List</a>
          </li>
          <li><a href="{{ route('purchase.create') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Purchase</a>
          </li>
          <li><a href="{{ route('purchase.index') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Purchase List</a>
          </li>
          <li><a href="{{ route('supplier.create') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Supplier</a>
          </li>
          <li><a href="{{ route('supplier.index') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Supplier List</a>
          </li>
          <li><a href="{{ route('customer.create') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Customer</a>
          </li>
          <li><a href="{{ route('customer.index') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Customer List</a>
          </li>
          <li><a href="{{ route('item.create') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Item</a>
          </li>
          <li><a href="{{ route('item.index') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Item List</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">HR</span></a>
        <ul class="menu-content">
          
          <li><a href="{{ url('employee') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          HR List</a>
          </li>
       
        </ul>
      </li>
{{--        <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Categories</span></a>
        <ul class="menu-content">
          <li><a href="layout-1-column.html" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Categories</a>
          </li>
          <li><a href="{{ url('/user') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Categories List</a>
          </li>
       
        </ul>
      </li> --}}
       <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Gift Card</span></a>
        <ul class="menu-content">
          <li><a href="layout-1-column.html" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add Gift Card</a>
          </li>
          <li><a href="{{ url('giftcard') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Gift Card List</a>
          </li>
       
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Users</span></a>
        <ul class="menu-content">
          <li><a href="layout-1-column.html" data-i18n="nav.page_layouts.1_column" class="menu-item">
             <i class="icon-plus"></i>
          Add User</a>
          </li>
          <li><a href="{{ url('/user') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">
            <i class="icon-list3"></i>
          Users List</a>
          </li>
       
        </ul>
      </li>
      <li class=" nav-item">
      <a href="{{ route('report.index') }}">
      <i class="icon-support"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Reports</span></a>
      </li>
      <li class=" nav-item"><a href="#"><i class="icon-paint-format"></i><span data-i18n="nav.color_palette.main" class="menu-title">Sittings</span></a>
        <ul class="menu-content">
          <li><a href="{{ url('general') }}" data-i18n="nav.color_palette.color_palette_primary" class="menu-item">General Setting</a>
          </li>
      
        </ul>
      </li>

    </ul>
  </div>
  <!-- /main menu content-->
  <!-- main menu footer-->
  <!-- include includes/menu-footer-->
  <!-- main menu footer-->
</div>