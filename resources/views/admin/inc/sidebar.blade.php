<aside class="main-sidebar elevation-4 " style="position: fixed;top:0;left: 0;background-color: #1012b7;">
    <style>
        .nav-item .nav-link.active {
            background-color: #082465;
            color: #ffffff;
        }
    </style>
    <a href="/admin/Dashboard" class="brand-link text-center">
        <img src="{{asset('images/logoo.png')}}" alt="logo" class="img-fluid rounded" style="height:70px;width:200px">
    </a> 
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link " style="color: rgb(255, 255, 255)">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/courses" class="nav-link" style="color: rgb(255, 255, 255)">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Courses</p>
                    </a>
                </li>  

                <li class="nav-item">
                    <a href="/admin/students" class="nav-link" style="color: rgb(255, 255, 255)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                        </svg>
                        <p style="margin-left:3px">Étudiants</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/users" class="nav-link" style="color: rgb(255, 255, 255)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-standing" viewBox="0 0 16 16">
                            <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M6 6.75v8.5a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2.75a.75.75 0 0 0 1.5 0v-2.5a.25.25 0 0 1 .5 0"/>
                        </svg>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <script>
       $(document).ready(function() {
            // Get the current URL or route
            var currentUrl = window.location.pathname;

            // Find the corresponding navigation item and add the active class
            $('.nav-item a').each(function() {
                var href = $(this).attr('href');
                if (currentUrl.startsWith(href)) {
                    $(this).addClass('active');
                }
            });
        });

    </script>
</aside>