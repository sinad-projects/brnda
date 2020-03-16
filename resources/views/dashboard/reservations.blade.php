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
          <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة طلبات الحجز في الموقع    </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right"> جدول طلبات الحجز</h6>
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
                      <th>مرسل الطلب</th>
                      <th>تاريخ البداية</th>
                      <th>تاريخ النهاية</th>
                      <th>حالة الطلب</th>
                      <th>العمليات</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($reservations as $reservation)
                      <tr class="text-right">
                        <td>{{ $reservation->agar->agar_name }}</td>
                        <td><a href="#">{{ $reservation->user->name }}</a></td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>
                          @if($reservation->status == 0)
                            <p>لم يتم القبول بعد</p>
                          @elseif($reservation->status == 1)
                            <p> تم القبول </p>
                          @elseif($reservation->status == 2)
                            <p> تم التأكيد </p>
                          @endif
                        </td>
                        <td style="width: 50px">
                          <form action="{{ route('dashboard.reservations') }}" method="post">
                            @csrf
                            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}" />
                            <button type="submit" name="delete_btn" class="btn btn-danger" >
                              <i class="fa fa-times-circle"></i>
                             </button>
                            <!--
                            <button class="btn btn-info" type="submit">تعديل الصلاحية</button>
                          -->
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
