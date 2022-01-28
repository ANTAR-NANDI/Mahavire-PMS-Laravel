      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="{{Route::currentRouteName() == 'admin-home' ? 'nav-item menu-open' : 'nav-item'}}">
            <a href="{{ route('admin-home') }}">
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <li class="{{Route::currentRouteName() == 'admin-add-category' || Route::currentRouteName() == 'admin-all-categories' ? 'nav-item menu-open' : 'nav-item'}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin-add-category') }}" class="{{Route::currentRouteName() == 'admin-add-category' ? 'nav-link active' : 'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-all-categories')}}" class="{{Route::currentRouteName() == 'admin-all-categories' ? 'nav-link active' : 'nav-link'}}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>All Category</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="{{Route::currentRouteName() == 'admin-add-category' || Route::currentRouteName() == 'admin-all-employees' || Route::currentRouteName() == 'admin-employee-payroll' || Route::currentRouteName() == 'admin-payroll-all' ? 'nav-item menu-open' : 'nav-item'}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin-add-employee')}}" class="{{Route::currentRouteName() == 'admin-add-employee' ? 'nav-link active' : 'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-all-employees')}}" class="{{Route::currentRouteName() == 'admin-all-employees' ? 'nav-link active' : 'nav-link'}}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>All Employees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-employee-payroll')}}" class="{{Route::currentRouteName() == 'admin-employee-payroll' ? 'nav-link active' : 'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Payroll</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-payroll-all')}}" class="{{Route::currentRouteName() == 'admin-payroll-all' ? 'nav-link active' : 'nav-link'}}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>All Payroll</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="{{Route::currentRouteName() == 'admin-add-product' || Route::currentRouteName() == 'admin-product-all' || Route::currentRouteName() == 'admin-add-product-csv' ? 'nav-item menu-open' : 'nav-item'}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin-add-product')}}" class="{{Route::currentRouteName() == 'admin-add-product' ? 'nav-link active' : 'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-product-all')}}" class="{{Route::currentRouteName() == 'admin-product-all' ? 'nav-link active' : 'nav-link'}}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>All Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-add-product-csv')}}" class="{{Route::currentRouteName() == 'admin-add-product-csv' ? 'nav-link active' : 'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import CSV</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="{{Request::is('admin/add-sales-info') || Request::is('admin/sale-history-by-month/*') || Request::is('admin/post-sale-history-by-month') || Request::is('admin/sale-history-by-year/*') || Request::is('admin/post-sale-history-by-year') || Route::currentRouteName() == 'edit-sales-info' || Request::is('admin/add-amazon-csv') ? 'nav-item menu-open' : 'nav-item'}}">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Sales History
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin-sales-info')}}" class="{{Route::currentRouteName() == 'admin-sales-info' ? 'nav-link active' : 'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sales Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('admin/sale-history-by-year').'/'.now()->year}}" class="{{Request::is('admin/sale-history-by-year/*') || Request::is('admin/post-sale-history-by-year') ? 'nav-link active' : 'nav-link'}}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Sales By Year </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('admin/sale-history-by-month').'/'.now()->year}}" class="{{Request::is('admin/sale-history-by-month/*') || Request::is('admin/post-sale-history-by-month') ? 'nav-link active' : 'nav-link'}}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Sales By Month</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-add-amazon-csv') }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Add Amazon Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-amazon-all') }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>All Amazon Sales</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
      </aside>