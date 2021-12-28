<!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('/')}}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('/admin')}}"
                                aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                    class="hide-menu">Pemesanan</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('/admin')}}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Pengadaan</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Data Master Admin</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Pemesanan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{url('admin/katpem')}}" class="sidebar-link"><span
                                            class="hide-menu"> Kategori Pemesanan
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('admin/pemesanan')}}" class="sidebar-link"><span
                                            class="hide-menu"> Data Pemesanan
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Barang </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{url('admin/katbar')}}" class="sidebar-link"><span
                                            class="hide-menu"> Kategori Barang
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('admin/barang')}}" class="sidebar-link"><span
                                            class="hide-menu"> Data Barang
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                    class="hide-menu">Profil Website </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{url('admin/katprof')}}" class="sidebar-link"><span
                                            class="hide-menu"> Kategori Profil
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('admin/profil')}}" class="sidebar-link"><span
                                            class="hide-menu"> Data Profil
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Menu </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{url('admin/katmenu')}}" class="sidebar-link"><span
                                            class="hide-menu"> Kategori Menu
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{url('admin/menu')}}" class="sidebar-link"><span
                                            class="hide-menu"> Data Menu
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                    
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->