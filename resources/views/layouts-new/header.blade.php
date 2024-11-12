<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                                                                                                   data-feather="menu"></i></a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-notification" style="font-family: 'Cairo';">
                <a class="nav-link dropdown-toggle dropdown-user-link"
                   id="dropdown-not" href="javascript:void(0);"
                   data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-not"
                     style="margin-left: 335%;font-family: 'Cairo';">
                    <ul tabindex="-1" class="dropdown-menu dropdown-menu-media "
                        aria-labelledby="__BVID__79__BV_toggle_" style="top: 0 !important;font-family: 'Cairo';">

                    
                    </ul>
                </div>
            </li>
           

            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link"
                   id="dropdown-user" href="javascript:void(0);"
                   data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                       
                        <span class="user-name font-weight-bolder">{{auth()->user()->name}}</span>
                        <span class="user-status">{{auth()->user()->getRoleNames()->first()}}</span></div>
                    <span class="avatar"><img class="round"
                                              src="https://up.yimg.com/ib/th?id=OIP.bJpr9jpclIkXQT-hkkb1KQHaHa&%3Bpid=Api&rs=1&c=1&qlt=95&w=121&h=121"
                                              alt="avatar" height="40" width="40"><span
                            class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{url('admin/logout')}}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mr-50" data-feather="power"></i> تسجيل الخروج</a>
                    <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
@push('script')
    <script>
        $( document ).ready(function() {
            setInterval(function () {
                $("#notifiactions").load(location.href + " #notifiactions");
                $("#notifiactions_count").load(location.href + " #notifiactions_count");

                console.log('reload');
            }, 40000);
        })
    </script>
@endpush
