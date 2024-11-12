<!-- sa-app__sidebar -->
<div class="sa-app__sidebar">
    <div class="sa-sidebar">
        <div class="sa-sidebar__header"><a class="sa-sidebar__logo" href="index-2.html"><!-- logo -->
                <div class="sa-sidebar-logo">
                    <img src="{{asset('asset/images/logo.png')}}" width="200" height="45">

                </div><!-- logo / end --></a></div>
        <div class="sa-sidebar__body" data-simplebar="">
            <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                <li class="sa-nav__section">
                    <div class="sa-nav__section-title"><span>Application</span></div>
                    <ul class="sa-nav__menu sa-nav__menu--root">
                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"><a href="{{route('home')}}"
                                                                                     class="sa-nav__link"><span
                                        class="sa-nav__icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                  height="1em" viewBox="0 0 16 16"
                                                                  fill="currentColor"><path
                                                d="M8,13.1c-4.4,0-8,3.4-8-3C0,5.6,3.6,2,8,2s8,3.6,8,8.1C16,16.5,12.4,13.1,8,13.1zM8,4c-3.3,0-6,2.7-6,6c0,4,2.4,0.9,5,0.2C7,9.9,7.1,9.5,7.4,9.2l3-2.3c0.4-0.3,1-0.2,1.3,0.3c0.3,0.5,0.2,1.1-0.2,1.4l-2.2,1.7c2.5,0.9,4.8,3.6,4.8-0.2C14,6.7,11.3,4,8,4z"></path></svg></span><span
                                        class="sa-nav__title">Dashboard</span></a></li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                            data-sa-collapse-item="sa-nav__menu-item--open"><a href="#" class="sa-nav__link"
                                                                               data-sa-collapse-trigger=""><span
                                        class="sa-nav__icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                  height="1em" viewBox="0 0 16 16"
                                                                  fill="currentColor"><path
                                                d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"></path></svg></span><span
                                        class="sa-nav__title">Customers</span><span class="sa-nav__arrow"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="6" height="9"
                                            viewBox="0 0 6 9" fill="currentColor"><path
                                                d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"></path></svg></span></a>
                            <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                <li class="sa-nav__menu-item"><a href="app-customers-list.html"
                                                                 class="sa-nav__link"><span
                                                class="sa-nav__menu-item-padding"></span><span
                                                class="sa-nav__title">Customers List</span></a></li>
                                <li class="sa-nav__menu-item"><a href="app-customer.html" class="sa-nav__link"><span
                                                class="sa-nav__menu-item-padding"></span><span
                                                class="sa-nav__title">Customer</span></a></li>
                            </ul>
                        </li>
                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                            <a href="{{route('services.index')}}" class="sa-nav__link">

                                <i class="sa-nav__icon fas fa-archive"></i>
                                <span class="sa-nav__title">الخدمات</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="sa-app__sidebar-shadow"></div>
    <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
</div><!-- sa-app__sidebar / end --><!-- sa-app__content -->