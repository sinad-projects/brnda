@include('dashboard/layouts/header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('dashboard/layouts/aside')



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">


      <!-- Main Content -->
      <div id="content">

        @include('dashboard/layouts/nav')


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة العقارات في الموقع </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right"> جدول العفارات</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-right">
                      <th>اسم العقار</th>
                      <th>نوع العقار</th>
                      <th>موقع العقار</th>
                      <th>صاحب العقار</th>
                      <th>حالة العقار</th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th>اسم العقار</th>
                      <th>نوع العقار</th>
                      <th>موقع العقار</th>
                      <th>صاحب العقار</th>
                      <th>حالة العقار</th>
                      <th>العمليات</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($agars as $agar)
                      <tr class="text-right">
                        <td>{{ $agar->agar_name }}</td>
                        <td>{{ $agar->type->type_name }}</td>
                        <td>
                          {{ $agar->location->state->state_name }} /
                          {{ $agar->location->city->city_name }} /
                          {{ $agar->location->area }}
                        </td>
                        <td><a href="#">{{ $agar->user->name }}</a></td>
                        <td>{{ $agar->status }}</td>
                        <td>
                          <form action="{{ route('dashboard.agars') }}" method="post">
                            @csrf
                            <input type="hidden" name="agar_id" value="{{ $agar->id }}" />
                            <button type="submit" name="delete_btn" class="btn btn-danger" > حذف العقار  </button>
                            @if($agar->featured == 0)
                              <button class="btn btn-success" name="featured_btn" type="submit"> تحويل الى مميز </button>
                            @else
                              <button class="btn btn-info" name="notfeatured_btn" type="submit"> تحويل الى عادي  </button>
                            @endif
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('dashboard/layouts/footer')


  <!-- Bootstrap core JavaScript-->
  <script src="{{  asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('dashboard/js/demo/datatables-demo.js') }}"></script>

</body>

</html>
