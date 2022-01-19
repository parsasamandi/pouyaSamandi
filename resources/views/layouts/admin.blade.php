<!DOCTYPE html>
<html lang="en">
    @section('stylesheet')
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        {{-- Admin Style --}}
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
        {{-- Mix App --}}
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @show       

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="/">Pouya Samandi</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        {{-- Main Menu --}}
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            {{-- CV --}}
                            <div class="sb-sidenav-menu-heading">CV</div>

                            {{-- <x-admin.urlAddress text="Experience" fontAwesome="fas fa-columns" route="{{ route('experience.table') }}" />
                            {{-- Publication list --}}
                            {{-- <x-admin.urlAddress text="Publication" fontAwesome="fas fa-newspaper" route="{{ route('publication.table') }}" /> --}} 
                            {{-- Skill List --}}
                            <x-admin.urlAddress text="Skill" fontAwesome="fa fa-cogs" route="{{ url('skill/list') }}" />
                            {{-- Refree List --}}

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                {{-- Content --}}
                <main>
                    @yield('content')
                </main>
                {{-- Footer --}}
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; pouyasamandi.ir</div>
                            <div>
                                Privacy Policy
                                &middot;
                                Terms &amp; Conditions
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        @section('scripts')
            {{-- App Script --}}
            <script src="{{ mix('js/app.js') }}"></script>
            <script src="{{ mix('js/vendor.js') }}"></script>
            <script src="{{ mix('js/manifest.js') }}"></script>
            {{-- Ajax Requests --}}
            <script src="{{ asset('js/RequestHandler.js') }}"></script>
            
            <script src="/js/all.min.js" crossorigin="anonymous"></script>
            <script src="/js/scripts.js"></script>

            <script>
                // Ajax Setup
                $.ajaxSetup({ 
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    processing: true,
                    dataType: "json"
                });
                // Select2
                $('select').select2({ width: '100%'});
            </script>
        @show      
         
    </body>
</html>

