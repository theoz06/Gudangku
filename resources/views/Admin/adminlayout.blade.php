<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> GudangKu || @yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="/js/jquery-3.6.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.13.1/pagination/simple_incremental_bootstrap.js">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/Style.css')); ?>">
  </head>
  <body>

    <div class="grid-container">

        <!-- Header start -->
        <header class="header">
                <div class="header-left">
                    <button class="btn menu-icon" type="button" id="menu-button">
                        <i class="uil uil-bars btn-icon"></i>
                    </button>
                    </div>
                <div class="header-right">
                    <ul class="notification">
                            
                        <li class="notif-item">
                            <div class="dropdown">                                    
                                <button class="btn login-info" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   <i class="uil uil-user-circle"></i>
                                    <span class="dropdown-toggle login-as">Admin</span>
                                </button>

                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">
                                        Log Out
                                    <i class="uil uil-sign-out-alt"></i>
                                    </a></li>
                                </ul>
                            </div>    
                        </li>    
                     </ul>
                </div>
        </header>
        <!-- Header End -->


        <!--Sidebar Start-->
        <aside class="sidebar" id="sidebar">
            <nav class="sidebar-container">
            <div class="sidebar-header">
                <div class="sidebar-header-container">
                    <div class="sidebar-brand">
                        <ul class="sidebar-brand-item">
                            <li class="header-item">
                                <i class="uil uil-shop"></i>
                            </li>
                            <li class="header-item-brand">
                                <a href="/Admin/dashboard" class="brand-name ">GudangKu</a>
                                <span class="header-subtitle">Inventory Sistem</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="sidebar-divider">

            <div class="sidebar-menu">
                <div class="menu">
                    <ul class="sidebar-list">
                        <li class="sidebar-list-item">
                            <div class="sidebar-list-container">
                                <div class="sidebar-list-icon">
                                    <i class=" uil uil-home"></i>
                                </div>
                                <a href="/Admin/dashboard" class="sidebar-link sidebar-title">Dashboard</a>
                            </div>
                        </li>
                    </ul>

                    <hr class="sidebar-divider">

                    <ul class="sidebar-list">
                        <li class="sidebar-list-item">
                            <div class="sidebar-list-container">
                                <div class="sidebar-list-icon">
                                    <i class="uil uil-user"></i>
                                </div>
                                <a href="/Admin/managUser" class="sidebar-link sidebar-title">Management User</a>
                            </div>
                        </li>
                    </ul>

                    <hr class="sidebar-divider">
                </div>
            </div>
            </nav>
        </aside>
        <!--Sidebar End-->

        <!--main Start-->
           <main class="main-container">

           @yield('content')
                
           </main>
        <!--main end-->

    </div>
    
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>