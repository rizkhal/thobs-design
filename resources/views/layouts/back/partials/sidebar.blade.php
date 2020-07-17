<!-- left sidebar -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ active('dashboard') }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.index') }}" class="{{ active('manage/blog*') }}"><i class="lnr lnr-bullhorn"></i> <span>Blog</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="{{ active('manage/projects*') }}"><i class="lnr lnr-store"></i> <span>Project</span></a>
                </li>
                <li>
                    <a href="#setting" data-toggle="collapse" class="{{ active(['manage/setting*']) }}">
                        <i class="lnr lnr-cog"></i><span>Setting</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="setting" class="collapse {{ active(['manage/setting*']) }}">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.setting.profile.index') }}" class="{{ active('manage/setting/profile*') }}"><i class="lnr lnr-cog"></i> <span>Profile</span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.setting.social.index') }}" class="{{ active('manage/setting/social*') }}"><i class="lnr lnr-star-half"></i> <span>Social Media</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#master" data-toggle="collapse" class="{{ active('manage/category') }}">
                        <i class="lnr lnr-database"></i><span>Data Master</span>
                        <i class="icon-submenu lnr lnr-chevron-left"></i>
                    </a>
                    <div id="master" class="collapse {{ active('manage/category') }}">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.category.index') }}" class="{{ active('manage/category') }}"><i class="lnr lnr-list"></i> <span>Category</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- end left sidebar -->
