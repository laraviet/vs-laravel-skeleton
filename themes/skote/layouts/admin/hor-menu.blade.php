<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    @if(Module::find('adminhome') && Module::find('adminhome')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('admin.home') }}" aria-expanded="false">
                                <i class="bx bxs-home-circle mr-2"></i>{{ _t('home') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('product') && Module::find('product')->isEnabled())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bxs-cube mr-2"></i>{{ _t('ecommerce') }}
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('brands.index') }}"
                                   class="dropdown-item">{{ _t('brand') }}</a>
                                <a href="{{ route('product-tags.index') }}"
                                   class="dropdown-item">{{ _t('tag') }}</a>
                                <a href="{{ route('product-categories.index') }}"
                                   class="dropdown-item">{{ _t('product_category') }}</a>
                                <a href="{{ route('products.index') }}"
                                   class="dropdown-item">{{ _t('product') }}</a>
                                @if(Module::find('order') && Module::find('order')->isEnabled())
                                    <a href="{{ route('orders.index') }}"
                                       class="dropdown-item">{{ _t('order') }}</a>
                                @endif
                                @if(Module::find('payment') && Module::find('payment')->isEnabled())
                                    <a href="{{ route('payments.index') }}"
                                       class="dropdown-item">{{ _t('payment') }}</a>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if(Module::find('blog') && Module::find('blog')->isEnabled())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-archive mr-2"></i>{{ _t('blog_management') }}
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('blog-categories.index') }}"
                                   class="dropdown-item">{{ _t('blog_category') }}</a>
                                <a href="{{ route('blog-tags.index') }}"
                                   class="dropdown-item">{{ _t('tag') }}</a>
                                <a href="{{ route('blog-posts.index') }}"
                                   class="dropdown-item">{{ _t('post') }}</a>
                            </div>
                        </li>
                    @endif

                    @if(Module::find('core') && Module::find('core')->isEnabled())
                        @if(config('core.role_management'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                   role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bxs-user mr-2"></i>{{ _t('user_management') }}
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                    <a href="{{ route('users.index') }}"
                                       class="dropdown-item">{{ _t('user') }}</a>
                                    <a href="{{ route('roles.index') }}"
                                       class="dropdown-item">{{ _t('role') }}</a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link arrow-none" href="{{ route('users.index') }}" aria-expanded="false">
                                    <i class="bx bxs-user mr-2"></i>{{ _t('user') }}
                                </a>
                            </li>
                        @endif
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</div>
