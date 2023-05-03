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

                <li>
                    <a href="{{ route('pos') }}">
                        <span class="badge bg-pink float-end">Hot</span>
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> POS </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Employee Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.employee') }}">All Employee</a>
                            </li>
                            <li>
                                <a href="{{ route('add.employee') }}">Add Employee</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Customer Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.customer') }}">All Cutomer</a>
                            </li>
                            <li>
                                <a href="{{ route('add.customer') }}">Add Cutomer</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i class="mdi mdi-truck-fast"></i>
                        <span> Supplier Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.supplier') }}">All Supplier</a>
                            </li>
                            <li>
                                <a href="{{ route('add.supplier') }}">Add Supplier</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSalary" data-bs-toggle="collapse">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span> Employee Salary </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSalary">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.advance.salary') }}">Add Advance Salary</a>
                            </li>
                            <li>
                                <a href="{{ route('all.advance.salary') }}">All Advance Salary</a>
                            </li>
                            <li>
                                <a href="{{ route('pay.salary') }}">Pay Salary</a>
                            </li>
                            <li>
                                <a href="{{ route('month.salary') }}">Last Month Salary</a>
                            </li>
                        </ul>
                    </div>
                </li>

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
                        </ul>
                    </div>
                </li>

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
                                <a href="{{ route('all.admin') }}"> Add Admin</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Custom</li>

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

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="pages-starter.html">Starter</a>
                            </li>
                            <li>
                                <a href="pages-timeline.html">Timeline</a>
                            </li>
                            <li>
                                <a href="pages-sitemap.html">Sitemap</a>
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