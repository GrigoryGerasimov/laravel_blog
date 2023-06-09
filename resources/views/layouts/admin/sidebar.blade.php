<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.post.index') }}" class="brand-link d-flex justify-content-center">
        <span class="brand-text font-weight-light">BLOG Admin</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/meta-image.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin User</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.post.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-align-justify"></i>
                        <p>
                            Posts
                            <span class="badge badge-info right">{{$postsList->total()}}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
