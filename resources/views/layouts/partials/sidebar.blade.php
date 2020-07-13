<!-- left sidebar -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li>
                    <a href="{{ route('admin.index') }}" class="{{ active('home') }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.index') }}" class="{{ active('home') }}"><i class="lnr lnr-bullhorn"></i> <span>Blog</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.index') }}" class="{{ active('home') }}"><i class="lnr lnr-store"></i> <span>Project</span></a>
                </li>
                <li>
                    <a href="#master" data-toggle="collapse" class="{{ active('category') }}">
                        <i class="lnr lnr-database"></i><span>Data Master</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="master" class="collapse {{ active('category') }}">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.category.index') }}" class="{{ active('category') }}"><i class="lnr lnr-select"></i> <span>Category</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- end left sidebar -->
