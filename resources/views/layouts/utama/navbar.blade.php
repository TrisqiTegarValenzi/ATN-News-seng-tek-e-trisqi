<nav id="site-navigation" class="main-menu-wrap" aria-label="main menu">
    <ul id="menu-main" class="main-menu rb-menu large-menu" itemscope itemtype="https://www.schema.org/SiteNavigationElement">
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1697">
            <a href="{{ url('/') }}"><span>Beranda</span></a>

        </li>

        @foreach ($kategori as $row)
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1697">
            <a href="/isikategori/{{ $row->id }}" aria-current="page"><span>{{ $row->name }}</span></a>

        </li>
        @endforeach

    </ul>
    </li>
    </ul>

</nav>
@if ($kategori->count() >= 6)
<div class="more-section-outer menu-has-child-flex menu-has-child-mega-columns layout-col-3">
    <a class="more-trigger icon-holder" href="#" data-title="Lainnya" aria-label="more"> <span class="dots-icon"><span></span><span></span><span></span></span> </a>
    <div id="rb-more" class="more-section flex-dropdown">
        <div class="more-section-inner">
            <div class="more-content">

                <div class="mega-columns">
                    @foreach ($kategori2 as $row)
                    <a href="/isikategori/{{ $row->id }}">
                        <div class="more-col">
                            <div id="nav_menu-4" class="rb-section clearfix widget_nav_menu">
                                <div class="block-h widget-heading heading-layout-10">
                                    <div class="heading-inner">
                                        <h5 class="heading-title">
                                            <span>{{ $row->name }}</span>
                                        </h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                    @endforeach



                </div>
            </div>

        </div>
    </div>
</div>
@else

@endif


</div>
<div class="navbar-right">
    @if (Route::has('login'))

    @auth
    @if (Auth::user()->role_id == 1)
    <div class="wnav-holder widget-h-login header-dropdown-outer">
        <a href="{{ url('dashboard admin') }}" class="is-btn header-element">Beranda</a>
    </div>
    @endif
    @if (Auth::user()->role_id == 2)
    <div class="wnav-holder widget-h-login header-dropdown-outer">
        <a href="{{ url('dashboard') }}" class="is-btn header-element">Beranda</a>
    </div>
    @endif
    @if (Auth::user()->role_id == 3)
    <div class="wnav-holder widget-h-login header-dropdown-outer">
        <a href="{{ url('home') }}" class="is-btn header-element">Beranda</a>
    </div>
    @endif
    @if (Auth::user()->role_id == 4)
    <div class="wnav-holder widget-h-login header-dropdown-outer">
        <a href="{{ url('logout') }}" class="is-btn header-element">Keluar</a>
    </div>
    @endif
    @else
    <div class="wnav-holder widget-h-login header-dropdown-outer">
        <a href="/register" class="is-btn header-element">Gabung Kami</a>
    </div>
    @endauth

    @endif

    <div class="hubungi kami">
        <a href="{{ url('kontak') }}" class="is-btn header-element"><span>Hubungi
                Kami</span>
        </a>
    </div>

    @if (Route::has('login'))

    @auth
    @if (Auth::user()->role_id == 4)
    <div class="wnav-holder header-dropdown-outer">
        <a href="#" class="dropdown-trigger notification-icon" data-notification="1819">
            <span class="notification-icon-inner" data-title="Notifkasi">
                <span class="notification-icon-svg"> </span> <span class="notification-info"></span>
                @if ( $notif->count() > 0 )
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle notif"></span>
                @endif
            </span> </a>
        <div class="header-dropdown notification-dropdown">
            <div class="notification-popup light-scheme">
                <div class="notification-header"> <span class="h4">Notifikasi
                        <a href="javascript:void(0)" class="text-white" style="margin-left: 165px;" id="all">
                            <small>Baca Semua</small>
                        </a>
                    </span>
                </div>
                <div class="notification-content">
                    <div class="scroll-holder">
                        <div class="notification-bookmark"></div>
                        <div class="notification-latest">
                            <div id="uid_notification" class="block-wrap block-small block-list block-list-small-2 short-pagination rb-columns rb-col-1 p-middle">
                                <div class="block-inner">
                                    @foreach ($notif as $row)
                                    {{-- @foreach ($row->childs as $childs) --}}
                                    {{-- @foreach ($childs->childs as $childs2) --}}

                                    <div class="p-wrap p-small p-list-small-2 notif-{{$row->id}} notif">
                                        <div class="p-content">
                                            <h5 class="entry-title" class="margin-left: 10%;" class="text">
                                                <a class="p-url" href="/baca/{{ $row->id }}" id="link-{{ $row->id }}" rel="bookmark">
                                                {{ $row->users->username }} {{$row->message}} '{{ $row->komentar->komentar}}'
                                                </a>

                                                <a href="javascript:void(0)" data-id="{{$row->id}}" class="centang">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                                    </svg>
                                                </a>
                                        </div>
                                    </div>

                                    {{-- @endforeach --}}
                                    {{-- @endforeach --}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('a[data-id]').on('click', function(event) {
                var el = $(this);
                var id = el.attr('data-id');


                $.ajax({
                    type: 'GET',
                    url: '/update_notif/' + id,
                    data: {
                        'is_read': "1"
                    },
                    success: function(response) {
                        $('.notif-' + id).hide();
                    },
                    error: function(response) {
                        alert(response);
                    }
                });
            });
        </script>
        <script>
            $('#all').on('click', function(event) {

                $.ajax({
                    type: 'GET',
                    url: '/update_notif/0',
                    data: {
                        'is_read': "1"
                    },
                    success: function(response) {
                        $('.notif').hide();
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        </script>

    </div>
    @endif
    @endauth

    @endif