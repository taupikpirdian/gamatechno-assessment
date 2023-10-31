<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ url('/dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo/logo-white.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo/logo-white.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ url('/dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo/logo-white.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo/logo-white.png')}}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                @hasanyrole('admin')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse show menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/users" class="nav-link" id="urlUser"> User</a>
                            </li>
                            <li class="nav-item">
                                <a href="/blogs" class="nav-link" id="urlBlog"> Blog</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarRj" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-archive-drawer-line"></i> <span data-key="t-dashboards">Restorative Justice</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarRj">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/rekapitulasi" class="nav-link"> Laporan Rekapitulasi</a>
                                <a href="/rekapitulasi/penghentian" class="nav-link"> Laporan Rekapitulasi Penghentian</a>
                                <a href="/rekapitulasi/tolak" class="nav-link"> Laporan Rekapitulasi Penolakan</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end rj Menu -->
                @endhasanyrole

                @hasanyrole('kejari|seksi')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarFirstStep" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-archive-drawer-line"></i> <span data-key="t-dashboards">Tahap Awal</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarFirstStep">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                @hasanyrole('kejari')
                                <a href="/restorative-justice/application" class="nav-link" id="urlApplication"> Permohonan</a>
                                @endhasanyrole
                                @hasanyrole('kejari')
                                <a href="/restorative-justice/reject" class="nav-link" id="urlReject"> Penolakan</a>
                                @endhasanyrole
                            </li>
                        </ul>
                    </div>
                </li> <!-- end rj Menu -->
                @endhasanyrole

                @hasanyrole('kejari')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarNarkotika" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-archive-drawer-line"></i> <span data-key="t-dashboards">Penerimaan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarNarkotika">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/restorative-justice/accept?m=narkotika" class="nav-link" id="urlAccpetNarkotika"> Narkotika</a>
                            </li>
                            <li class="nav-item">
                                <a href="/restorative-justice/accept?m=non-narkotika" class="nav-link" id="urlAccpetNonNarkotika"> Non Narkotika</a>
                            </li>
                        </ul>
                    </div>
                </li> 
                @endhasanyrole

                @hasanyrole('seksi-kejati')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarNarkotika" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-archive-drawer-line"></i> <span data-key="t-dashboards">Form RJ</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarNarkotika">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/restorative-justice/accept" class="nav-link" id="urlAccpetNarkotika"> Penerimaan</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end rj Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPraEkspose" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-archive-drawer-line"></i> <span data-key="t-dashboards">Pra Ekspose</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPraEkspose">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/pra-ekspose/index" class="nav-link" id="urlPraEkspose"> Data RJ</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end rj Menu -->
                @endhasanyrole
                @hasanyrole('seksi-kejati|kejari')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarEkspose" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-archive-drawer-line"></i> <span data-key="t-dashboards">Ekspose</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarEkspose">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/ekspose" class="nav-link" id="urlAccpetNonNarkotika"> List Data</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end rj Menu -->
                @endhasanyrole
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>