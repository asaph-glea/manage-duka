<div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            
            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    <li class="menu-title">Navigation</li>

                        @if(Auth::user()->can('dashboard.menu'))
                        <li>
                            <a href="{{ url('/dashboard') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>
                        @endif


                        @if(Auth::user()->can('pos.menu'))
                        <li>
                            <a href="{{ route('pos') }}">
                                <span class="badge bg-pink float-end">Hot</span>
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span> POS </span>
                            </a>
                        </li>
                        @endif


                        <li class="menu-title mt-2">Apps</li>

                        <!-- Employee Menu  -->

                         @if(Auth::user()->can('employee.menu'))
                            <li>
                                <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                                    <i class="mdi mdi-cart-outline"></i>
                                    <span> Employee Manage  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarEcommerce">
                                    <ul class="nav-second-level">
                                    @if(Auth::user()->can('employee.all'))
                                    <li>
                                        <a href="{{ route('all.employee') }}">All Employee</a>
                                    </li>
                                    @endif
                                    @if(Auth::user()->can('employee.add'))
                                    <li>
                                        <a href="{{ route('add.employee') }}">Add Employee </a>
                                    </li>
                                    @endif
                                    </ul>
                                </div>
                            </li>
                        @endif

                        <!-- Customer Menu -->

                        @if(Auth::user()->can('customer.menu'))
                        <li>
                            <a href="#sidebarCrm" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-multiple-outline"></i>
                                <span> Customer Manage   </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCrm">
                                    <ul class="nav-second-level">
                                        @if(Auth::user()->can('customer.all'))
                                        <li>
                                        <a href="{{ route('all.customer') }}">All Customer</a>
                                        </li>
                                        @endif

                                        @if(Auth::user()->can('customer.add'))
                                        <li>
                                        <a href="{{ route('add.customer') }}">Add Customer</a>
                                        </li>
                                        @endif          
                                    </ul>
                            </div>
                        </li>
                        @endif

                        <!-- Supplier Manage -->

                        @if(Auth::user()->can('supplier.menu'))
                        <li>
                            <a href="#sidebarEmail" data-bs-toggle="collapse">
                                <i class="mdi mdi-email-multiple-outline"></i>
                                <span> Supplier Manage </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="nav-second-level">

                                    @if(Auth::user()->can('supplier.all'))
                                    <li>
                                        <a href="{{ route('all.supplier') }}">All Supplier</a>
                                    </li>
                                    @endif
                                    @if(Auth::user()->can('supplier.add'))
                                    <li>
                                        <a href="{{ route('add.supplier') }}">Add Supplier</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif

                        <!-- Employee Salary -->
                        @if(Auth::user()->can('salary.menu'))
                        <li>
                            <a href="#salary" data-bs-toggle="collapse">
                            <i class="mdi mdi-email-multiple-outline"></i>
                            <span> Employee Salary </span>
                            <span class="menu-arrow"></span>
                            </a>
                                <div class="collapse" id="salary">
                                <ul class="nav-second-level">
                                    @if(Auth::user()->can('salary.add'))
                                    <li>
                                        <a href="{{ route('add.advance.salary') }}">Add Advance Salary</a>
                                    </li>
                                    @endif

                                    @if(Auth::user()->can('salary.all'))
                                    <li>
                                        <a href="{{ route('all.advance.salary') }}">All Advance Salary</a>
                                    </li>
                                     @endif

                                    @if(Auth::user()->can('salary.pay'))
                                    <li>
                                        <a href="{{ route('pay.salary') }}">Pay Salary</a>
                                    </li> 
                                    @endif

                                    @if(Auth::user()->can('salary.monthly'))
                                    <li>
                                        <a href="{{ route('month.salary') }}">Last Month Salary</a>
                                    </li>
                                    @endif
                                    
                                </ul>
                                </div>
                        </li>
                        @endif

                        <!-- Employee attendance -->

                        @if(Auth::user()->can('attendence.menu'))
                        <li>
                        <a href="#attendence" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Employee Attendence </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="attendence">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('employee.attend.list') }}">Employee Attendence List </a>
                            </li>

                        </ul>
                        </div>
                        </li>
                        @endif

                        <!-- categories list -->
                        @if(Auth::user()->can('category.menu'))
                        
                        <li>
                        <a href="#category" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="category">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.category') }}">All Category </a>
                            </li>

                        </ul>
                        </div>
                        </li>
                        @endif

                        <!-- Product sidebar -->

                        @if(Auth::user()->can('product.menu'))

                        <li>
                        <a href="#product" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Products  </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="product">
                        <ul class="nav-second-level">

                        @if(Auth::user()->can('product.all'))
                            <li>
                                <a href="{{ route('all.product') }}">All Product </a>
                            </li>
                        @endif

                        @if(Auth::user()->can('product.add'))

                            <li>
                                <a href="{{ route('add.product') }}">Add Product </a>
                            </li>
                        @endif

                        @if(Auth::user()->can('product.import'))
                            <li>
                                <a href="{{ route('import.product') }}">Import Product </a>
                            </li>
                        @endif


                        </ul>
                        </div>
                        </li>

                        @endif

                        <!-- orders menu -->
                        @if(Auth::user()->can('orders.menu'))

                        <li>
                        <a href="#orders" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Orders  </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="orders">
                        <ul class="nav-second-level">
                        <li>
                        <a href="{{ route('pending.order') }}">Pending Orders </a>
                        </li>

                        <li>
                        <a href="{{ route('complete.order') }}">Complete Orders </a>
                        </li>

                        <li>
                        <a href="{{ route('pending.due') }}">Pending Due Orders </a>
                        </li>
                        </ul>
                        </div>
                        </li>
                        @endif

                        <!-- stock menu -->
                        @if(Auth::user()->can('stock.menu'))
                        <li>
                        <a href="#stock" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Stock Manage   </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="stock">
                        <ul class="nav-second-level">
                        <li>
                        <a href="{{ route('stock.manage') }}">Stock </a>
                        </li>
                        </ul>
                        </div>
                        </li>
                        @endif

                        <!-- roles and permissions -->
                        @if(Auth::user()->can('roles.menu'))
                        <li>
                            <a href="#permission" data-bs-toggle="collapse">
                            <i class="mdi mdi-email-multiple-outline"></i>
                            <span> Roles And Permission    </span>
                            <span class="menu-arrow"></span>
                            </a>
                                <div class="collapse" id="permission">
                                    <ul class="nav-second-level">
                                        <li>
                                        <a href="{{ route('all.permission') }}">All Permission </a>
                                        </li>

                                        <li>
                                        <a href="{{ route('all.roles') }}">All Roles </a>
                                        </li>

                                        <li>
                                        <a href="{{ route('add.roles.permission') }}">Roles in Permission </a>
                                        </li>

                                        <li>
                                        <a href="{{ route('all.roles.permission') }}">All Roles in Permission </a>
                                        </li>
                                    </ul>
                                </div>
                        </li>
                        @endif

                        <!-- Admin menu -->
                        @if(Auth::user()->can('admin.menu'))
                        <li>
                        <a href="#admin" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Setting Admin User    </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="admin">
                        <ul class="nav-second-level">
                        @if(Auth::user()->can('admin.all'))
                        <li>
                        <a href="{{ route('all.admin') }}">All Admin </a>
                        </li>
                         @endif

                        @if(Auth::user()->can('admin.add'))
                        <li>
                        <a href="{{ route('add.admin') }}">Add Admin </a>
                        </li> 
                        @endif
                        </ul>
                        </div>
                        </li>
                        @endif

                            <li class="menu-title mt-2">Custom</li>
                                @if(Auth::user()->can('expense.menu'))
                                <li>
                                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                                        <i class="mdi mdi-account-circle-outline"></i>
                                        <span>Expense </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarAuth">
                                        <ul class="nav-second-level">

                                        @if(Auth::user()->can('expense.add'))
                                        <li>
                                        <a href="{{ route('add.expense') }}">Add Expense</a>
                                        </li>
                                        @endif

                                        @if(Auth::user()->can('expense.today'))

                                        <li>
                                        <a href="{{ route('today.expense') }}">Today Expense</a>
                                        </li>
                                        @endif

                                        @if(Auth::user()->can('expense.monthly'))

                                        <li>
                                        <a href="{{ route('month.expense') }}">Monthly Expense</a>
                                        </li>
                                        @endif

                                        @if(Auth::user()->can('expense.yearly'))

                                        <li>
                                        <a href="{{ route('year.expense') }}">Yearly Expense</a>
                                        </li>
                                        @endif

                                        </ul>
                                    </div>
                                </li>
                                @endif

                                @if(Auth::user()->can('database.menu'))

                                <li>
                                    <a href="#backup" data-bs-toggle="collapse">
                                        <i class="mdi mdi-account-circle-outline"></i>
                                        <span>Database Backup  </span>
                                        <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="backup">
                                            <ul class="nav-second-level">
                                                <li>
                                                    <a href="{{ route('database.backup') }}">Database Backup </a>
                                                </li> 

                                            </ul>
                                                </div>
                                </li>
                                @endif
                            </ul>

                        </div>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

</div>