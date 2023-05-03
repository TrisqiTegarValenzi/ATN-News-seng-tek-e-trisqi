<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/ATN News/layouts/vertical/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 10:31:56 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Pesan | RAWR News </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <!-- Plugin css -->
    <link href="{{asset('assets/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <link rel="stylesheet" href="{{asset('css/batas.css')}}">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        @include('layouts.admin.topbar')


        @include('layouts.admin.sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Modal -->
                @include('layouts.modal')
                <!--End Modal-->
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">RAWR News</a></li>
                                        <li class="breadcrumb-item active">Pesan</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Pesan</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        @foreach ($kontak as $row)


                        <div class="col-md-4 ">
                            <div class="row col-14">
                                <div class="card" style="width: 18rem; height: 10rem; margin: 17px; ">
                                    <a href="/tampilpesan/{{ $row->id }}">
                                        <div class="card-body d-flex">
                                            <div class="col-1 inbox-item-img">
                                                <!-- <img src="profile.jpg" width="50" class="rounded-circle" alt=""> -->
                                                @if ($row->foto == 'profile.jpg')
                                                <img src="{{asset('profile.jpg')}}" width="50" height="50" class="rounded-circle" />
                                                @else
                                                <img src="{{asset('storage/' . $row->foto)}}" width="50" height="50" class="rounded-circle" />
                                                @endif
                                            </div>
                                            <div class="" style="display: block;">
                                                <div class="inbox-item-img">
                                                    <div class="ellipsis card-text" style="font-weight:bold; color:black; margin-left: 50px; max-width: 150px;">{{$row->name}}</div>
                                                </div>
                                                <div class="inbox-item-img">
                                                    <div class="ellipsis card-text" style="color: black; margin-left: 50px; max-height: 150px; max-width: 155px;">{{$row->pesan}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>



                        @endforeach

                        <!-- BEGIN MODAL -->
                        <div class="modal fade none-border" id="event-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Event</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body p-3"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                                            event</button>
                                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Add Category -->
                        <div class="modal fade none-border" id="add-category">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add a category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body p-3">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Category Name</label>
                                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Choose Category Color</label>
                                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                        <option value="success">Success</option>
                                                        <option value="danger">Danger</option>
                                                        <option value="info">Info</option>
                                                        <option value="pink">Pink</option>
                                                        <option value="primary">Primary</option>
                                                        <option value="warning">Warning</option>
                                                        <option value="inverse">Inverse</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MODAL -->
                    </div>
                    <!-- end col-12 -->
                </div> <!-- end row -->

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->
        {{ $kontak->links() }}


        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        &copy; RAWR Admin
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-18 m-0 text-white">Penyesuaian Tema</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-4">
                <div class="alert alert-warning" role="alert">
                    <strong>Penyesuaian </strong>
                    skema warna keseluruhan, tata letak, dll.
                </div>
                <div class="mb-2">
                    <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Mode Terang</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Mode Gelap</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">Mode RTL</label>
                </div>

                <a href="https://1.envato.market/XY7j5" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Unduh Sekarang</a>
            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>



    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- plugin js -->
    <script src="{{asset('assets/libs/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>

    <!-- Calendar init -->
    <script src="{{asset('assets/js/pages/calendar.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>

</body>

<!-- Mirrored from coderthemes.com/ATN News/layouts/vertical/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 10:31:57 GMT -->

</html>