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
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
            </span> </a>

        <div class="header-dropdown notification-dropdown">

            <div class="notification-popup light-scheme">
                <div class="notification-header"> <span class="h4">Notifikasi

                        <a href="/baca_semua" class="text-white" class="margin-left: 50%;">
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

                                    <div class="p-wrap p-small p-list-small-2" data-pid="1599">
                                        <form action="/baca_semua/{{ $row->id }}" method="post">
                                            @csrf
                                            <a href="/baca_semua/{{ $row->id }}">
                                            <input type="checkbox" >
                                            </a>
                                        </form>

                                        
                                            <!-- <a href="/baca_semua/{{ $row->id }}">
                                            <input type="checkbox" name="notif">                                        
                                            </a> -->
                                       
                                        <!-- <input type="checkbox" name="notif" onclick=""> -->
                                       

                                        <div class="p-content">
                                            <h5 class="entry-title" class="margin-left: 10%;">
                                                <a class="p-url" href="/baca/{{ $row->id }}" id="link-{{ $row->id }}" rel="bookmark">
                                                    {{ $row->users->username }} {{$row->message}} '{{ $row->komentar->komentar }}'
                                                </a>
                                                <!-- <form action="/baca_semua" method="post">
                                                    @csrf
                                                    <div class="col-sm-10"><button type="submit" id="submitBtn" disabled>SIMPAN</button></div>
                                            </h5>
                                            </form> -->

                                        </div>
                                    </div>

                                    {{-- @endforeach --}}
                                    {{-- @endforeach --}}
                                    @endforeach
                                    <!-- <div class="col-sm-10"><button type="submit" name="select-all-btn">pilih</button></div>
                                    <div class="col-sm-10"><button type="submit" name="cancel-select-all-btn">batal</button></div> -->
                                    <!-- <form action="/baca_semua/{{ $row->id }}" method="post">
                                        @csrf
                                    <div class="col-sm-10"><button type="submit" >SIMPAN</button></div>
                                    </form> -->

                                    <!-- <div class="col-sm-10"><button type="submit" id="submitBtn" disabled>SIMPAN</button></div>
                                            </h5> -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script type="text/javascript">
            function getClick(str) {
                alert(str);
            }
            </script> -->
        <script>
                document.getElementById("cancel-select-all-btn").addEventListener("click", function() {
                    var checkboxes = document.querySelectorAll("input[type=checkbox]");
                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].checked = false;
                    }
                });
                </script>
        

        <script>
            document.getElementById("select-all-btn").addEventListener("click", function() {
                var checkboxes = document.querySelectorAll("input[type=checkbox]");
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = true;
                }
            });
            </script>
            

        <!-- // $("#myCheckbox").on("change", function() {
        // // Ketika status checkbox berubah, ambil ID-nya
        // if ($(this).is(":checked")) {
        // var id = $(this).attr("id");
        // console.log("ID checkbox yang dicentang: " + id);
        // // Lakukan sesuatu dengan ID yang ditemukan
        // }
        // });

        // // Ambil ID menggunakan jQuery
        // var id = $("#id").val();

        // Lakukan sesuatu dengan ID yang diambil
        // $.ajax({
        // url: "/baca_semua/" + id,
        // method: "POST",
        // success: function(response) {
        // // Lakukan sesuatu setelah mendapatkan respons
        // },
        // error: function(jqXHR, textStatus, errorThrown) {
        // console.log(textStatus + ": " + errorThrown);
        // }
        // });

        // const termsCheck = document.querySelector('#termsCheck');
        // const submitBtn = document.querySelector('#submitBtn');

        // // Memeriksa checkbox setiap kali diperbarui
        // termsCheck.addEventListener('change', function() {
        // if (this.checked) {
        // // Checkbox dicentang, aktifkan tombol submit
        // submitBtn.removeAttribute('disabled');
        // } else {
        // // Checkbox tidak dicentang, nonaktifkan tombol submit
        // submitBtn.setAttribute('disabled', true);
        // }
        // }); -->
        <!-- </script> -->
        <!-- <script>
            // // Ambil ID menggunakan JavaScript murni
            // var element = document.getElementById("id");
            // var id = element.value;

            // // Lakukan sesuatu dengan ID yang diambil
        </script> -->
    </div>
    @endif
    @endauth

    @endif