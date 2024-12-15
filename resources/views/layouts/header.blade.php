<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> --}}
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                   {{-- <img src="{{asset('assets/img/CUR8_logo.svg')}}" width="94px" alt=""> --}}
                </div>
                <div class="sidebar-brand-text mx-3">CUR8</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('scraping') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('scraping')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Web Scraping</span></a>
            </li>
            <li class="nav-item {{ Request::is('product-add') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('product-add') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span> Add Product</span></a>
            </li>
            <li class="nav-item {{ Request::is('product-list') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('product-list') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span> Product List</span></a>
            </li>
            <li class="nav-item {{ Request::is('analysis') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('analysis') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Analysis & Summarization </span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">

          
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            {{-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{asset('assets/img/undraw_rocket.svg')}}" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> --}}

        </ul>
        <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
    
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <div class="col-lg-12"> <h1 class="text-center text-primary text-bold">Assignment</h1></div>

                        <!-- Sidebar Toggle (Topbar) -->
                        
    
                       
    
                    </nav>