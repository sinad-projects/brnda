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

          <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"> ادارة عمليات الدفع في الموقع </h1>
                      </div>

                      <div class="container">
                        @foreach($reservations as $reservation)
                        <div class="card shadow mb-4" dir="rtl">
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr class="text-right">
                                    <th> اسم العقار   </th>
                                    <th> مقدم طلب الاستئجار </th>
                                    <th>العمليات</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr class="text-right">
                                    <th> اسم العقار   </th>
                                    <th> مقدم طلب الاستئجار </th>
                                    <th>العمليات</th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                  <tr class="text-right">
                                    <td>{{ $reservation->agar->agar_name }}</td>
                                    <td>{{ $reservation->user->name }}</td>
                                    <td>
                                      <form class="user" id="payment_{{ $reservation->id }}" method="post" action="{{ route('dashboard.payment') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $reservation->id }}" name="reservation_id" />
                                        <div class="form-group text-right">
                                          <div class="">
                                            <label for="confirm"> تم الدفع </label>
                                            <input id="confirm" type="radio" class="form-control-user" name="action" value="confirm">
                                          </div>
                                          <div class="">
                                            <label for="disable"> تعطيل الطلب  </label>
                                            <input id="disable" type="radio" class="form-control-user" name="action" value="disable">
                                          </div>
                                        </div>
                                        <button type="submit" form="payment_{{ $reservation->id }}" class="btn btn-primary w3-right">
                                          اتمام
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="w3-clear"></div>
                        <hr>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


      @include('dashboard/layouts/footer')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('dashboard/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dashboard/js/demo/chart-pie-demo.js') }}"></script>

  </body>

  </html>
