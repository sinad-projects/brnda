<!DOCTYPE html>
<html>
  <head>
      <title>
          برندة            </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{  asset('lib/dropzone/dropzone.css') }}" type="text/css">
      <link rel="stylesheet"  href="{{  asset('lib/lightslider-master/src/css/lightslider.css') }}"/>
      <link rel="stylesheet" href="{{  asset('css/w3.css') }}">
      <link rel="stylesheet" href="{{  asset('css/w3-colors-windows.css') }}">
      <link rel="stylesheet" href="{{  asset('css/w3-colors-flat.css') }}">
      <link rel="stylesheet" href="{{  asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css') }}">
      <link rel="stylesheet" href="{{  asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/webfonts/FontAwesome.otf') }}">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/home.css') }}">
      <link rel="stylesheet" href="style.css">
  </head>
<body class="">

  <!-- Top container -->

  @include('layouts/aside')

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  <!-- -->

  <br>
  <div class="w3-content  w3-card w3-responsive">
  <div class="w3-container">
    <h2> طلبات الايجار المرسلة </h2>
  </div>

  <div class="w3-bar w3-border-bottom w3-card">
    <button style="cursor: pointer"  class="w3-bar-item w3-white w3-border-brnda tablink w3-border-bottom-brnda" onclick="openTab(event,'all')"><i class="fa fa-plus-square"></i> كل الطلبات </button>
    <button style="cursor: pointer"  class="w3-bar-item w3-white w3-hover-border-bottom-brnda tablink" onclick="openTab(event,'accepted')"><i class="fa fa-check-square"></i> الطلبات المقبولة</button>
    <button style="cursor: pointer" class="w3-bar-item w3-white w3-hover-border-bottom-brnda tablink" onclick="openTab(event,'confirmable')"><i class="fa fa-check-square"></i> الطلبات المؤكدة</button>
    <button style="cursor: pointer" class="w3-bar-item w3-white w3-hover-border-bottom-brnda tablink" onclick="openTab(event,'rejected')"><i class="fa fa-check-square"></i> الطلبات المرفوضة</button>
  </div>

  <div id="all" class="w3-container tabs">
   <div class="w3-margin-bottom w3-margin-top">
        <div id="id62" class="w3-modal">
            <div class="w3-modal-content">

            </div>
          </div>
          <div class="w3-responsive"> <!-- START table data -->
              <table class="w3-table w3-striped w3-margin-bottom">
                  <thead>
                  <tr class="">
                      <th class="">#</th>
                      <th class="">اسم المستأجر</th>
                      <th class="">اسم العقار</th>
                      <th class="">بداية الإيجار</th>
                      <th class="">نهاية الإيجار</th>
                      <th class="	"> تاريخ الطلب</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td><a href="#">{{ $reservation->user->name }}</a></td>
                            <td><a href="#">{{ $reservation->agar->agar_name }}</a></td>
                            <td>{{ $reservation->start_date  }}</td>
                            <td>{{ $reservation->end_date }}</td>
                            <td>{{ $reservation->created_at->diffForHumans() }}</td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
          </div><!-- END table data -->
      </div><!-- END list -->
  </div>

  <!-- accepted reservation only -->
  <div id="accepted" class="w3-container tabs">
     <div class="w3-margin-bottom w3-margin-top">
       <div class="w3-responsive"> <!-- START table data -->
         <table class="w3-table w3-striped w3-margin-bottom">
            <thead>
              <tr class="">
                  <th class="">#</th>
                  <th class="">اسم المستأجر</th>
                  <th class="">اسم العقار</th>
                  <th class="">بداية الإيجار</th>
                  <th class="">نهاية الإيجار</th>
                  <th class="	"> تاريخ الطلب</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($accepted_reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td><a href="#">{{ $reservation->user->name }}</a></td>
                        <td><a href="#">{{ $reservation->agar->agar_name }}</a></td>
                        <td>{{ $reservation->start_date  }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>{{ $reservation->created_at->diffForHumans() }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- END table data -->
          </div><!-- END list -->
      </div>

      <!-- confirmable reservation only -->
      <div id="confirmable" class="w3-container tabs">
         <div class="w3-margin-bottom w3-margin-top">
            <div class="w3-responsive"> <!-- START table data -->
                <table class="w3-table w3-striped w3-margin-bottom">
                    <thead>
                      <tr class="">
                          <th class="">#</th>
                          <th class="">اسم المستأجر</th>
                          <th class="">اسم العقار</th>
                          <th class="">بداية الإيجار</th>
                          <th class="">نهاية الإيجار</th>
                          <th class="	"> تاريخ الطلب</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($confirmable_reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td><a href="#">{{ $reservation->user->name }}</a></td>
                            <td><a href="#">{{ $reservation->agar->agar_name }}</a></td>
                            <td>{{ $reservation->start_date  }}</td>
                            <td>{{ $reservation->end_date }}</td>
                            <td>{{ $reservation->created_at->diffForHumans() }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- END table data -->
        </div><!-- END list -->
      </div>

      <!-- rejected reservation only -->
      <div id="rejected" class="w3-container tabs">
         <div class="w3-margin-bottom w3-margin-top">
            <div class="w3-responsive"> <!-- START table data -->
                <table class="w3-table w3-striped w3-margin-bottom">
                    <thead>
                      <tr class="">
                          <th class="">#</th>
                          <th class="">اسم المستأجر</th>
                          <th class="">اسم العقار</th>
                          <th class="">بداية الإيجار</th>
                          <th class="">نهاية الإيجار</th>
                          <th class="	"> تاريخ الطلب</th>
                          <th class="">العمليات </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($rejected_reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td><a href="#">{{ $reservation->user->name }}</a></td>
                            <td><a href="#">{{ $reservation->agar->agar_name }}</a></td>
                            <td>{{ $reservation->start_date  }}</td>
                            <td>{{ $reservation->end_date }}</td>
                            <td>{{ $reservation->created_at->diffForHumans() }}</td>
                            <td>
                              <div class="w3-bar">
                                  <button type="button" onclick="document.getElementById('delete_rejected_reservation_{{ $reservation->id }}').style.display='block'" class="w3-btn w3-mobile"><i class="fa fa-times w3-text-gray w3-border" style="padding: 5px;"></i></button>
                              </div>
                            </td>
                          </tr>
                          <!-- START reservation_confirm MODAL -->
                          <div id="delete_rejected_reservation_{{ $reservation->id }}" class="w3-modal">
                            <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:480px">
                                <header class="w3-container brnda-card">
                                    <span onclick="document.getElementById('delete_rejected_reservation_{{ $reservation->id }}').style.display='none'"
                                      class="w3-btn w3-display-topleft">&times;</span>
                                    <h4>حذف</h4>
                                </header>
                                <form action="{{ route('reservation.index') }}" method="post" id="delete_rejected_reservation_form_{{ $reservation->id }}">
                                    @csrf
                                    <div class="w3-container">
                                        <div class="w3-section">
                                            <p><i class="fa fa-2x w3-padding fa-trash-o w3-text-flat-midnight-blue w3-text-gray"></i><span> هل أنت متأكد من أنك تريد حذف هذا العنصر؟، هذه العملية لا يمكن التراجع عنها.</span></p>
                                        </div>
                                    </div>

                                    <footer class="w3-container ">
                                        <div class="w3-margin-top w3-margin-bottom w3-left">
                                            <input type="hidden" value="{{ $reservation->id }}" name="reserv_id" />
                                                <button form="delete_rejected_reservation_form_{{ $reservation->id }}" name="disable_reserv" value="موافق"class="w3-btn brnda-card w3-ripple w3-margin-left"><i class="fa fa-check-square"></i> موافق</button>
                                                <button type="button" onclick="document.getElementById('delete_rejected_reservation_{{ $reservation->id }}').style.display='none'"class="w3-btn w3-white w3-ripple"><i class="fa fa-arrow-right"></i> إلغاء</button>
                                            </div>
                                      </footer>
                                    </form>
                                </div>
                            </div><!-- END rejected_confirm MODAL -->
                        @endforeach
                    </tbody>
                </table>
            </div><!-- END table data -->
        </div><!-- END list -->
      </div>

  </div>
</div>


<script>
  function openTab(evt, TabName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("tabs");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-white", "");
    }
    document.getElementById(TabName).style.display = "block";
    evt.currentTarget.className += " w3-white";
  }
  // Click on the first tablink on load
  document.getElementsByClassName("tablink")[0].click();

</script>

<footer class="w3-container w3-padding-16">
    <h4>برندة</h4>
    <p>جميع الحقوق محفوظة لـ <b>برندة</b> 2019</p>
</footer>

</body>
</html>
