<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('store_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/stores*") ? "c-show" : "" }} {{ request()->is("admin/brands*") ? "c-show" : "" }} {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/orders*") ? "c-show" : "" }} {{ request()->is("admin/order-details*") ? "c-show" : "" }} {{ request()->is("admin/wishlists*") ? "c-show" : "" }} {{ request()->is("admin/product-reviews*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-store c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.storeManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('store_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stores.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stores") || request()->is("admin/stores/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-store-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.store.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('brand_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.brands.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/brands") || request()->is("admin/brands/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-code-branch c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.brand.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-product-hunt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.order.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.order-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-details") || request()->is("admin/order-details/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.orderDetail.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('wishlist_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.wishlists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/wishlists") || request()->is("admin/wishlists/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.wishlist.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-reviews") || request()->is("admin/product-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productReview.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('clinic_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clinics*") ? "c-show" : "" }} {{ request()->is("admin/clinic-services*") ? "c-show" : "" }} {{ request()->is("admin/clinic-appointments*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-medkit c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clinicManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('clinic_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clinics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clinics") || request()->is("admin/clinics/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clinic.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('clinic_service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clinic-services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clinic-services") || request()->is("admin/clinic-services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clinicService.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('clinic_appointment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clinic-appointments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clinic-appointments") || request()->is("admin/clinic-appointments/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clinicAppointment.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('rescue_case_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.rescue-cases.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/rescue-cases") || request()->is("admin/rescue-cases/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-ambulance c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.rescueCase.title') }}
                </a>
            </li>
        @endcan
        @can('adoption_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/refuges*") ? "c-show" : "" }} {{ request()->is("admin/refuge-pets*") ? "c-show" : "" }} {{ request()->is("admin/adoption-requests*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-paw c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.adoptionManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('refuge_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.refuges.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/refuges") || request()->is("admin/refuges/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-award c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.refuge.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('refuge_pet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.refuge-pets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/refuge-pets") || request()->is("admin/refuge-pets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-affiliatetheme c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.refugePet.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('adoption_request_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.adoption-requests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/adoption-requests") || request()->is("admin/adoption-requests/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-jedi-order c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.adoptionRequest.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('client_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/customers*") ? "c-show" : "" }} {{ request()->is("admin/user-pets*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clientManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_pet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-pets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-pets") || request()->is("admin/user-pets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-paw c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userPet.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('missing_pet_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.missing-pets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/missing-pets") || request()->is("admin/missing-pets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bullhorn c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.missingPet.title') }}
                </a>
            </li>
        @endcan
        @can('delivery_pet_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.delivery-pets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/delivery-pets") || request()->is("admin/delivery-pets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-truck c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.deliveryPet.title') }}
                </a>
            </li>
        @endcan
        @can('post_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/posts*") ? "c-show" : "" }} {{ request()->is("admin/comments*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-map-pin c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.postManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/posts") || request()->is("admin/posts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-pen-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.post.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('comment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.comments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/comments") || request()->is("admin/comments/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comment c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.comment.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('subscription_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.subscriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subscriptions") || request()->is("admin/subscriptions/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-envelope c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subscription.title') }}
                </a>
            </li>
        @endcan
        @can('contactu_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contactus.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contactus") || request()->is("admin/contactus/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contactu.title') }}
                </a>
            </li>
        @endcan
        @can('review_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-comments c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.review.title') }}
                </a>
            </li>
        @endcan
        @can('volunteer_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.volunteers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/volunteers") || request()->is("admin/volunteers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-astronaut c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.volunteer.title') }}
                </a>
            </li>
        @endcan
        @can('general_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sliders*") ? "c-show" : "" }} {{ request()->is("admin/countries*") ? "c-show" : "" }} {{ request()->is("admin/pet-types*") ? "c-show" : "" }} {{ request()->is("admin/settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.generalSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('slider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-image c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.slider.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('country_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.country.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pet_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pet-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pet-types") || request()->is("admin/pet-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-paw c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.petType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>