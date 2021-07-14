<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/post-categories') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.post-category.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tagging-tags') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.tagging-tag.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/site-images') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.site-image.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/site-contents') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.site-content.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/nav-items') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.nav-item.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/posts') }}"><i class="nav-icon icon-user"></i> {{ __('Posts') }}</a></li>
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
