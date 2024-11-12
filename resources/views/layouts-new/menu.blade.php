<style>
.dropbtn {
  background-color: #ffffff;
  color: red;
  font-size: 20px;
  border: none;
 
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #ffffff;
  min-width: 100%;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

</style>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('home')}}">

                    <span class="brand-logo">
                        <img src="{{asset('asset/images/logo.jpeg')}}" width="100%;">
                            </span>
                    <h2 class="brand-text">مركز الوادي</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    
    
    <div class="main-menu" style="height: 750px">
        
        <br><br>
        <div class="dropdown">
              <button class=" nav-item dropbtn">الرئيسية</button>
                <div class="dropdown-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                
                        <li class=" nav-item  {{ (\Request::route()->getName() == "home") ? 'active' : '' }} "><a
                                class="d-flex align-items-center" href="{{url('/')}}"><i data-feather="home"
                                                                                         class="text-primary"></i><span
                                    class="menu-title text-truncate" data-i18n="Dashboards">الرئيسية</span></a></li>
                        
                        @can('users.show')
                            <li class=" nav-item  {{ (\Request::route()->getName() == "users.index") ? 'active' : '' }} "><a
                                    class="d-flex align-items-center" href="{{url('/users')}}"><i data-feather="user"
                                                                                                  class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">المستخدمين</span></a></li>
                        @endcan
                        @can('roles.show')
                            <li class=" nav-item  {{ (\Request::route()->getName() == "roles.index") ? 'active' : '' }} "><a
                                    class="d-flex align-items-center" href="{{url('/roles')}}"><i data-feather="lock"
                                                                                                  class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">الصلاحيات</span></a></li>
                        @endcan
            
                        @can('branches.show')
                            <li class=" nav-item  {{ (\Request::route()->getName() == "branches.index") ? 'active' : '' }} "><a
                                    class="d-flex align-items-center" href="{{url('/branches')}}"><i data-feather="lock"
                                                                                                  class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">الافرع</span></a></li>
                        @endcan
    
                        @can('specials.show')
                            <li class=" nav-item  {{ (\Request::route()->getName() == "specials.index") ? 'active' : '' }} "><a
                                    class="d-flex align-items-center" href="{{url('/specials')}}"><i data-feather="lock"
                                                                                                  class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">الاختصاصات</span></a></li>
                        @endcan
            
                        @can('subjects.show')
                            <li class=" nav-item  {{ (\Request::route()->getName() == "subjects.index") ? 'active' : '' }} "><a
                                    class="d-flex align-items-center" href="{{url('/subjects')}}"><i data-feather="lock"
                                                                                                  class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">المواد</span></a></li>
                        @endcan
                    </ul>
                </div>
        </div>
        <hr>
        <br>
        <div class="dropdown">
              <button class=" nav-item dropbtn">شؤون الطلاب</button>
                <div class="dropdown-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        
                        @can('students.show')
                            <li class=" nav-item  {{ (\Request::route()->getName() == "students.index") ? 'active' : '' }} "><a
                                    class="d-flex align-items-center" href="{{url('/students')}}"><i data-feather="lock"
    الطلاب              class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">الطلاب</span></a></li>
                        @endcan
                        @can('registering.show')
                            <li class=" nav-item  {{ (\Request::route()->getName() == "registering.index") ? 'active' : '' }} "><a
                                    class="d-flex align-items-center" href="{{url('/registering')}}"><i data-feather="users"
                                                                                                      class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">طلب تسجيل</span></a></li>
                        @endcan
                        
                        @can('promises.show')
                            <li class=" nav-item {{ (\Request::route()->getName() == "promises.index") ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{url('/promises')}}"><i data-feather="users"
                                                                                                      class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">تعهد</span></a></li>
                        @endcan
            
                        @can('receipts.show')
                            <li class=" nav-item {{ (\Request::route()->getName() == "receipts.index") ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{url('/receipts')}}"><i data-feather="users" class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">ايصال دفع</span></a></li>
                        
                        @endcan
        
                        @can('ides.show')
                            <li class=" nav-item {{ (\Request::route()->getName() == "ides.index") ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{url('/ides')}}"><i data-feather="users"
                                                                                                      class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">بطاقة طالب</span></a></li>
                        
                        @endcan
            
                        @can('workdocs.show')
                            <li class=" nav-item {{ (\Request::route()->getName() == "workdocs.index") ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{url('/workdocs')}}"><i data-feather="users"
                                                                                                      class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">وثيقة دوام/ تأجيل</span></a></li>
                       
                        @endcan
                            <li class=" nav-item "><a
                                    class="d-flex align-items-center" href=""><i data-feather="circle"
                                                                                                         class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">بيان وضع</span></a></li>
            
                            <li class=" nav-item "><a
                                    class="d-flex align-items-center" href=""><i data-feather="circle"
                                                                                                         class="text-primary"></i><span
                                        class="menu-title text-truncate" data-i18n="Dashboards">كشف علامات</span></a></li>
            
                            <li class=" nav-item "><a
                                class="d-flex align-items-center" href=""><i data-feather="circle"
                                                                                                     class="text-primary"></i><span
                                    class="menu-title text-truncate" data-i18n="Dashboards">الدورات</span></a></li>
                
                    </ul>
                </div>
            </div>
            
        
    </div>
</div>
