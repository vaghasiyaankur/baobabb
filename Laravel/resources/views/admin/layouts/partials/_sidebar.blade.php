<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22">
            </span>
        </a>

        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="22">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm-light.png') }}" alt="" height="22">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @can('dashboard-list')
                <ul class="metismenu list-unstyled" id="side-menu3">
                    <li class="menu-title" data-key="t-dashboards">Dashboards</li>

                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Dashboard</span>
                        </a>
                    </li>

                </ul>
            @endcan
            @canany(['category-list', 'product-type-list', 'product-list', 'custom-field-list', 'picture-list'])
                <ul class="metismenu list-unstyled" id="side-menu34">
                    <li class="menu-title" data-key="t-dashboards">CATELOG</li>
                    @can('product-list')
                        <li>
                            <a href="{{ route('admin.product.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">List</span>
                            </a>
                        </li>
                    @endcan
                    @can('category-list')
                        <li>
                            <a href="{{ route('admin.category.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Category</span>
                            </a>
                        </li>
                    @endcan
                    @can('picture-list')
                        <li>
                            <a href="{{ route('admin.picture.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Picture</span>
                            </a>
                        </li>
                    @endcan
                    @can('product-type-list')
                        <li>
                            <a href="{{ route('admin.product.type.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Listing Type</span>
                            </a>
                        </li>
                    @endcan
                    @can('field-list')
                        <li>
                            <a href="{{ route('admin.custom.field.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Custom Fields</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            @endcanany
            @canany(['user-list', 'user-role-list', 'permission-list'])
                <ul class="metismenu list-unstyled" id="side-menu34">
                    <li class="menu-title" data-key="t-dashboards">USER</li>
                    @can('user-list')
                        <li>
                            <a href="{{ route('admin.user.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">User</span>
                            </a>
                        </li>
                    @endcan
                    @can('role-list')
                        <li>
                            <a href="{{ route('admin.role.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">User Role</span>
                            </a>
                        </li>
                    @endcan
                    @can('permission-list')
                        <li>
                            <a href="{{ route('admin.permission.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Permission</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            @endcanany
            @canany(['country-list', 'currency-list', 'languages-list', 'pages-list'])
                <ul class="metismenu list-unstyled" id="side-menu34">
                    <li class="menu-title" data-key="t-dashboards">GEO</li>
                    @can('country-list')
                        <li>
                            <a href="{{ route('admin.country.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Country</span>
                            </a>
                        </li>
                    @endcan
                    @can('currency-list')
                        <li>
                            <a href="{{ route('admin.currency.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Currency</span>
                            </a>
                        </li>
                    @endcan
                    @can('language-list')
                        <li>
                            <a href="{{ route('admin.language.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Languages</span>
                            </a>
                        </li>
                    @endcan
                    @can('pages-list')
                        <li>
                            <a href="{{ route('admin.pages.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Pages</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            @endcanany
            @canany(['setting-list'])
                <ul class="metismenu list-unstyled" id="side-menu34">
                    <li class="menu-title" data-key="t-dashboards">SETTINGs</li>
                    @can('setting-list')
                        <li>
                            <a href="{{ route('admin.setting.index') }}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Setting</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            @endcanany
            @can('setting-element-list')
            <ul class="metismenu list-unstyled" id="side-menu34">
                <li class="menu-title" data-key="t-dashboards">Ads</li>
                <li>
                    <a href="{{ route('admin.setting.element.index', ['element' => 'ads']) }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Ads</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.element.index', ['element' => 'location']) }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Location</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.element.index', ['element' => 'phoneVerification']) }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Phone Verification</span>
                    </a>
                </li>
            </ul>
                <ul class="metismenu list-unstyled" id="side-menu34">
                    <li class="menu-title" data-key="t-dashboards">General</li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'style']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Style</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'list']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">List & Search</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'single']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Single (Page & Form)</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'upload']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Upload</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'security']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Security</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'social-login']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Social Login</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'optimization']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Optimization</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'seo']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">SEO</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'other']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Others</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'backup']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Backup</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'review']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Reviews</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.element.index', ['element' => 'watermark']) }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Watermark</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.advertising.index') }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Advertising</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.blacklist.index') }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">BlackList</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.report.type.index') }}">
                            <i class="icon nav-icon" data-feather="monitor"></i>
                            <span class="menu-item" data-key="t-sales">Report Type</span>
                        </a>
                    </li>
                </ul>
            @endcan
            {{-- <ul class="metismenu list-unstyled" id="side-menu22">
                        <li class="menu-title" data-key="t-dashboards">PRODUCTS MANAGEMENT</li>
                        <li>
                            <a href="{{route('admin.brand.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Brands</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.attribute.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Attribute</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.product.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.banner.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Banner</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.coupons.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Coupons</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.notification.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Push notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.deal.index')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Flash deals</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.deal.index_deal')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Deal of the Day</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.deal.add-new')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Featured Deal</span>
                            </a>
                        </li>
                    </ul> --}}
            {{-- <ul class="metismenu list-unstyled" id="side-menu1">
                        <li class="menu-title" data-key="t-dashboards">BUSINESS SECTION</li>
                        <li>
                            <a href="{{route('admin.stock.product-stock')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Product Stock</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.review.review-list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Customer Reviews</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.stock.product-wishlist')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Product In Wish List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.transaction.transaction-list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Order Transactions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.transaction.refund-list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Refund Transactions</span>
                            </a>
                        </li>
                  </ul> --}}
            {{-- <ul class="metismenu list-unstyled" id="side-menu">
                       <li class="menu-title" data-key="t-dashboards">USER SECTION</li>
                       <li>
                            <a href="javascript: void(0);" class="has-arrow">
                            <i class="fas fa-users me-2"></i>
                                <span class="menu-item" data-key="t-error-pages">Seller</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('admin.seller.seller-list')}}" data-key="t-error-404-basic">List</a></li>
                                <li><a href="{{route('admin.seller.withdraw-list')}}" data-key="t-error-404-cover">Withdraws</a></li>
                            </ul>
                        </li>
                   </ul> --}}
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
