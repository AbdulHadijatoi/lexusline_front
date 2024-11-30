<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header">
        <a class="font-semibold text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">LEXUSLINE</span>
        </a>
       
        <div>
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>


    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('admin/dashboard') ? ' active' : '' }}" href="/admin/dashboard">
                        <i class="nav-main-link-icon si si-cursor"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>

                 <!-- Tracking Section -->
                <li class="nav-main-heading">Tracking Management</li>
                <li class="nav-main-item">
                    <a href="{{ route('admin.ports.index') }}" class="nav-main-link{{ request()->is('admin/ports') ? ' active' : '' }}">
                        <i class="nav-main-link-icon fa fa-anchor"></i>
                        <span class="nav-main-link-name">Manage Ports</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a href="{{ route('admin.terminals.index') }}" class="nav-main-link{{ request()->is('admin/terminals') ? ' active' : '' }}">
                        <i class="nav-main-link-icon fa fa-terminal"></i>
                        <span class="nav-main-link-name">Manage Terminals</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a href="{{ route('admin.vessel-trackings.index') }}" class="nav-main-link{{ request()->is('admin/vessel-trackings') ? ' active' : '' }}">
                        <i class="nav-main-link-icon fa fa-ship"></i>
                        <span class="nav-main-link-name">Vessel Trackings</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a href="{{ route('admin.container-trackings.index') }}" class="nav-main-link{{ request()->is('admin/container-trackings') ? ' active' : '' }}">
                        <i class="nav-main-link-icon fa fa-box"></i>
                        <span class="nav-main-link-name">Container Trackings</span>
                    </a>
                </li>

                <li class="nav-main-heading">Blogs & News</li>
                <li class="nav-main-item">
                    <a href="{{ route('admin.blogs.index') }}" class="nav-main-link{{ request()->is('admin/blogs*') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon fa fa-list"></i>
                        <span class="nav-main-link-name">Blogs</span>
                    </a>
                </li>
                
                <li class="nav-main-item">
                    <a href="{{ route('admin.subscribers.index') }}" class="nav-main-link{{ request()->is('admin/subscribers*') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">Subscribers</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">System</li>
                <li class="nav-main-item">
                    <a href="{{ route('admin.settings.edit') }}" class="nav-main-link{{ request()->is('admin/settings*') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon fa fa-wrench"></i>
                        <span class="nav-main-link-name">Home Settings</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">Page Setting</li>
                <li class="nav-main-item {{ Request::is('admin/page-setting*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon si si-energy"></i>
                        <span class="nav-main-link-name">Pages</span>
                    </a>
                    <ul class="nav-main-submenu">
                        @foreach (getAllPages() as $page)    
                            <li class="nav-main-item">
                                <a href="{{ url('/admin/page-setting/'.$page->slug) }}" class="nav-main-link{{ request()->is('admin/page-setting/'.$page->slug) ? ' active' : '' }}" href="#">
                                    <span class="nav-main-link-name">{{ $page->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                


                
            </ul>
        </div>
    </div>
</nav>