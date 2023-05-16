<div class="left-side-menu">

    <div class="h-100" data-simplebar>


        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ url('/dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                @if (Auth::user()->can('pos.menu'))

                <li>
                    <a href="{{ route('pos') }}">
                        <span class="badge bg-pink float-end">Hot</span>
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> POS </span>
                    </a>
                </li>

                @endif


                <li class="menu-title mt-2">Apps</li>


                @if (Auth::user()->can('employee.menu'))

                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Employee Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">

                            @if (Auth::user()->can('all.employee'))
                            <li>
                                <a href="{{ route('all.employee') }}">All Employee</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('add.employee'))
                            <li>
                                <a href="{{ route('add.employee') }}">Add Employee</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </li>

                @endif


                @if (Auth::user()->can('customer.menu'))

                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Customer Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            @if (Auth::user()->can('all.customer'))

                            <li>
                                <a href="{{ route('all.customer') }}">All Cutomer</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('add.customer'))

                            <li>
                                <a href="{{ route('add.customer') }}">Add Cutomer</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </li>
                @endif


                @if (Auth::user()->can('supplier.menu'))

                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i class="mdi mdi-truck-fast"></i>
                        <span> Supplier Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">

                            @if (Auth::user()->can('all.supplier'))
                            <li>
                                <a href="{{ route('all.supplier') }}">All Supplier</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('add.supplier'))
                            <li>
                                <a href="{{ route('add.supplier') }}">Add Supplier</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </li>

                @endif


                @if (Auth::user()->can('salary.menu'))
                <li>
                    <a href="#sidebarSalary" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Employee Salary </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSalary">
                        <ul class="nav-second-level">

                            @if (Auth::user()->can('add.advance.salary'))
                            <li>
                                <a href="{{ route('add.advance.salary') }}">Add Advance Salary</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('all.advance.salary'))
                            <li>
                                <a href="{{ route('all.advance.salary') }}">All Advance Salary</a>
                            </li>
                            @endif

                            @if (Auth::user()->can('pay.salary'))
                            <li>
                                <a href="{{ route('pay.salary') }}">Pay Salary</a>
                            </li>
                            @endif

                            <li>
                                <a href="{{ route('month.salary') }}">Last Month Salary</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->can('attendence.menu'))
                <li>
                    <a href="#sidebarAttendance" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Employee Attendence </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAttendance">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('employee.attend.list') }}">Employee Attendance List</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->can('category.menu'))
                <li>
                    <a href="#sidebarCategory" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Categories </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCategory">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.category') }}"> All Category</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->can('product.menu'))
                <li>
                    <a href="#sidebarProduct" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProduct">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.product') }}"> All Product</a>
                            </li>
                            <li>
                                <a href="{{ route('add.product') }}"> Add Product</a>
                            </li>
                            <li>
                                <a href="{{ route('import.product') }}"> Import Product</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->can('orders.menu'))
                <li>
                    <a href="#sidebarOrder" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Orders </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarOrder">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('pending.order') }}"> Pending Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('complete.order') }}"> Complete Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('pending.due') }}"> Pending Due</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->can('stock.menu'))
                <li>
                    <a href="#sidebarStock" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Stock Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarStock">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('stock.manage') }}"> Stock Manage</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->can('roles.menu'))
                <li>
                    <a href="#sidebarPermission" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Roles And Permission </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPermission">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.permission') }}"> All Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles') }}"> All Roles</a>
                            </li>
                            <li>
                                <a href="{{ route('add.roles.permission') }}"> Roles in Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles.permission') }}"> All Roles in Permission</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if (Auth::user()->can('setting.admin'))
                <li>
                    <a href="#sidebarAdmin" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Setting Admin User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdmin">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admin') }}"> All Admin</a>
                            </li>
                            <li>
                                <a href="{{ route('add.admin') }}"> Add Admin</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <li class="menu-title mt-2">Custom</li>

                @if (Auth::user()->can('expense.menu'))
                <li>
                    <a href="#sidebarExpense" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span> Expense </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpense">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.expense') }}">Add Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('today.expense') }}">Today Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('month.expense') }}">Month Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('year.expense') }}">Year Expense</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <li>
                    <a href="#sidebarBackup" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Database Backup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBackup">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('database.backup') }}">Database Backup</a>
                            </li>
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