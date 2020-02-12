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
                      <form class="user" method="post" action="{{ route('dashboard.payment') }}">
                        @csrf
                        <div class="form-group text-right">
                            <label for="reservation">اختار طلب الحجز</label>
                            <select id="reservation" name="reservation_id" class="form-control">
                              @foreach($reservations as $reservation)
                                <option value="{{ $reservation->id }}">{{ $reservation->id }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group text-right">
                          <div class="">
                            <label for="confirm"> تم الدفع </label>
                            <input id="confirm" type="radio" class="form-control-user" name="action" value="confirm">
                          </div>
                          <div class="">
                            <label for="delete"> حذف الطلب </label>
                            <input id="delete" type="radio" class="form-control-user" name="action" value="delete">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary w3-right">
                          اتمام
                        </button>
                      </form>
                      <div class="w3-clear"></div>
                      <hr>
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
