<!-- left sidebar -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li>
                    <a href="{{ route('admin.index') }}" class="{{ active('home') }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.index') }}" class="{{ active('blog*') }}"><i class="lnr lnr-bullhorn"></i> <span>Blog</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="{{ active('projects*') }}"><i class="lnr lnr-store"></i> <span>Project</span></a>
                </li>
                <li>
                    <a href="#setting" data-toggle="collapse" class="{{ active('setting*') }}">
                        <i class="lnr lnr-cog"></i><span>Setting</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="setting" class="collapse {{ active('setting*') }}">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.setting.social.index') }}" class="{{ active('setting/social*') }}"><i class="lnr lnr-star-half"></i> <span>Social Media</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#master" data-toggle="collapse" class="{{ active('category') }}">
                        <i class="lnr lnr-database"></i><span>Data Master</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="master" class="collapse {{ active('category') }}">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.category.index') }}" class="{{ active('category') }}"><i class="lnr lnr-list"></i> <span>Category</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- end left sidebar -->
