<!DOCTYPE html>
<html>
<title>برندا</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css')}}"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/ion.rangeSlider.js') }}"></script>


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('datepicker/css/bootstrap-datepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('css/agarsList.css') }}">

<style>
  * {
      box-sizing: border-box;
  }
  @font-face {
      font-family: JF-Flat-regular;
      font-style: normal;
      font-weight: 400;
      src: url("{{ asset('fonts/Flat_Font_Jozoor/JF-Flat-regular.ttf') }}");
    }
    html,body,h1,h2,h3,h4,h5,h6,p,span {
      font-family: JF-Flat-regular, sans-serif;
    }
    .navbar-toggler{
      width: 50px!important;
      background: inherit!important;
    }
    .ui-shadow{
      border: 0px!important;
      box-shadow: 0 0px 0px rgba(0,0,0,.15);
      -webkit-box-shadow: 0 0px 0px rgba(0,0,0,.15);
    }

</style>

  <body dir="" class="text-right">
    <div class="w3-white">
  <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg w3-white" style="z-index: 999">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}" width="50" height="50" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-reorder"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav" dir="rtl">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link w3-text-black" href="#">الرئيسية <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link w3-text-black" href="#">تحميل التطبيق</a>
          </li>
          <li class="nav-item">
            <a class="nav-link w3-text-black" href="#">عن برندا</a>
          </li>
        </ul>
      </div>
  </nav>

  <!-- for web screen only -->
  <section class="w3-card w3-padding filter-header filter-header-web" style="margin-bottom: 50px;">
    <div class="container">
      <form class="form-inline"  action="{{ route('agars.filter') }}" method="post">
        @csrf
        <div class="form-group mb-2">
          <select name="type_id" class="form-control">
            @foreach($agarType as $type)
              <option value="{{ $type->type_id }}"> {{ $type->type_name }} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <select name="floor_id" class="form-control">
            @foreach($agarFloor as $floor)
              <option value="{{ $floor->id }}"> {{ $floor->floor_name }} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <p>تاريخ الحجز <input type="text" name="start_date" id="datepicker"></p>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <p>عدد الغرف <input type="number" class="form-control" name="rooms_number" /> </p>
        </div>
        <button type="submit" class="w3-button w3-black" name="search_btn"> <i class="fa fa-search"></i> بحث </button>
      </form>
    </div>
  </section>
  <!-- end filter header for web screen -->

  <!-- filter header for mobile only  -->
  <section class="w3-card w3-padding filter-header filter-header-mobile" style="margin-bottom: 50px;">
    <div class="container">
      <form class="">
        <div class="form-group filter-header-mobile-datepicker">
          <p>تاريخ الحجز <input type="text" id="datepicker_mobile"></p>
        </div>
        <div class="form-group open-slider-btn">
          <a href="javascript::void()" id="openNav" class="w3-button w3-black w3-xlarge" onclick="w3_open()"> <i class="fa fa-sliders"></i> </a>
        </div>
      </form>
    </div>
  </section>
  <!-- end filter header for mobile screen only -->


  <section class="container">
      <!-- sidebar for mobile screen only -->
      <!-- sidebar section-->
      <div class="w3-sidebar w3-animate-left" id="filter_sidebar" style="display: none">
        <a href="javascript::void()" class="w3-button w3-large"
        onclick="w3_close()"> <i class="fa fa-times w3-large w3-hover-none w3-text-black"></i> </a>
        <div class="">
          <div class="card" >
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                سعر الايجار لليوم الواحد
                <input type="text" id="price_mobile_range" class="js-range-slider" name="my_range" value=""
                    data-type="double"
                    data-min="0"
                    data-max="1000"
                    data-from="200"
                    data-to="500"
                    data-grid="true"/>
              </li>
            </ul>
          </div>
          <br>
          <div class="card">
            <div class="card-header">
              الخصائص
            </div>
            <ul class="list-group list-group-flush ">
              <li class="list-group-item">
                <h4> المزايا الاضافية </h4>
                <div>
                  <span> انترنت </span>
                  <input type="checkbox" class="" />
                </div>
                <div>
                  <span> غسالة </span>
                  <input type="checkbox" class="" />
                </div>
                <div>
                  <span> مصعد </span>
                  <input type="checkbox" class="" />
                </div>
              </li>
              <li class="list-group-item">
                <h4> مزايا خاصة </h4>
                <div>
                  <span> حراسة امنية </span>
                  <input type="checkbox" class="" />
                </div>
                <div>
                  <span> توصيل من المطار </span>
                  <input type="checkbox" class="" />
                </div>
                <div>
                  <span> امكانية الاستلام على مدار اليوم </span>
                  <input type="checkbox" class="" />
                </div>
              </li>
            </ul>
          </div>
          <br>
          <div class="card">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <span>عدد الغرف</span>
                <input type="number" name="rooms_number" class="form-control" >
                <span>عدد الحمامات</span>
                <input type="number" name="bathroms_number" class="form-control" >
              </li>
            </ul>
          </div>
          <br>
          <div class="card">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                العملة
                <select name="currency" class="form-control" >
                  <option value="sdg"> SDG </option>
                  <option value="usd"> USD </option>
                </select>
              </li>
            </ul>
          </div>
          <br>
          <div class="card">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <button type="submit" name="search_btn" class="w3-button w3-black">بحث</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- main containt section -->
      <section id="main">
        @foreach($agars as $agar)
            <div class="row">
              <div class="col-md-6">
                <div id="mobile_carousel_{{ $agar->id }}" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <?php $to_check_image_numbers = 0; ?>
                    @foreach($agar->image as $image)
                      <?php if($to_check_image_numbers == 0) : ?>
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="{{ asset('agar/images/'.$image->thumbnail) }}" height="200px" alt="صورة العقار">
                        </div>
                      <?php else : ?>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="{{ asset('agar/images/'.$image->thumbnail) }}" height="200px" alt="صورة العقار">
                        </div>
                      <?php endif ; ?>
                      <?php $to_check_image_numbers += 1 ?>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#mobile_carousel_{{ $agar->id }}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#mobile_carousel_{{ $agar->id }}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><br>
              </div>

              <div class="col-md-6">
                <div class="w3-margin">
                 <div><h4> {{ $agar->agar_name }} </h4><p>الخرطوم - السودان - امدرمان</p></div><hr>
                 <div><p> <span>{{ $agar->rooms_number }} غرف</span> و <span>{{ $agar->bathrooms_number }} حمامات</span> </p></div><hr>
                 <div><p>from : {{ $agar->price->day }} $ / night</p></div>
               </div><br>
              </div>
            </div>
          @endforeach
      </section>
      <!-- end sidebar for mobile screnn only -->

      <!-- for web screen only -->
      <section class="filter-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  سعر الايجار لليوم الواحد
                  <input type="text" id="price_range" class="js-range-slider" name="my_range" value=""
                      data-type="double"
                      data-min="0"
                      data-max="1000"
                      data-from="200"
                      data-to="500"
                      data-grid="true"/>
                </li>
              </ul>
            </div> <br>

            <div class="card" style="width: 18rem;">
              <div class="card-header">
                الخصائص
              </div>
              <ul class="list-group list-group-flush ">
                <li class="list-group-item">
                  <h4> المزايا الاضافية </h4>
                  <div>
                    <span> انترنت </span>
                    <input type="checkbox" class="" />
                  </div>
                  <div>
                    <span> غسالة </span>
                    <input type="checkbox" class="" />
                  </div>
                  <div>
                    <span> مصعد </span>
                    <input type="checkbox" class="" />
                  </div>
                </li>
                <li class="list-group-item">
                  <h4> مزايا خاصة </h4>
                  <div>
                    <span> حراسة امنية </span>
                    <input type="checkbox" class="" />
                  </div>
                  <div>
                    <span> توصيل من المطار </span>
                    <input type="checkbox" class="" />
                  </div>
                  <div>
                    <span> امكانية الاستلام على مدار اليوم </span>
                    <input type="checkbox" class="" />
                  </div>
                </li>
              </ul>
            </div>
            <br>
            <div class="card" style="width: 18rem;">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  العملة
                  <select name="currency" class="form-control" >
                    <option value="sdg"> SDG </option>
                    <option value="usd"> USD </option>
                  </select>
                </li>
              </ul>
            </div>
            <br>
            <div class="card" style="width: 18rem;">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <button type="submit" name="search_btn" class="w3-button w3-black">بحث</button>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-4">
            @foreach($agars as $agar)
              <div id="carousel_{{ $agar->id }}" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php $to_check_image_numbers = 0; ?>
                  @foreach($agar->image as $image)
                    <?php if($to_check_image_numbers == 0) : ?>
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('agar/images/'.$image->thumbnail) }}" height="200px" alt="صورة العقار">
                      </div>
                    <?php else : ?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('agar/images/'.$image->thumbnail) }}" height="200px" alt="صورة العقار">
                      </div>
                    <?php endif ; ?>
                    <?php $to_check_image_numbers += 1 ?>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carousel_{{ $agar->id }}" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel_{{ $agar->id }}" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div><br>
            @endforeach
          </div>
          <div class="col-md-4" dir="rtl">
            @foreach($agars as $agar)
              <div>
               <div><h4> {{ $agar->agar_name }} </h4><p>الخرطوم - السودان - امدرمان</p></div><hr>
               <div><p> <span>{{ $agar->rooms_number }} غرف</span> و <span>{{ $agar->bathrooms_number }} حمامات</span> </p></div><hr>
               <div><p>from : {{ $agar->price->day }} $ / night</p></div>
             </div><br>
            @endforeach
          </div>

        </div>
      </section>
    </section>


  <div class="w3-clear"></div>
  <!-- Footer -->
  <footer class="w3-center w3-white w3-padding-32 w3-opacity w3-margin-top" style="margin-top: 100px!important">
    <h5> تابع صفحاتنا على مواقع اتواصل الاجتماعي  </h5>
    <div class="w3-xlarge w3-padding-16">
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-twitter w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>تم التطوير بواسطة <a href="#" target="_blank" class="w3-hover-text-green">شركة سناد للحلول البرمجية</a></p>
  </footer>

  <script type="text/javascript">
      $("#price_range").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: 200,
        to: 500,
        grid: true
      });

      $("#price_mobile_range").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: 200,
        to: 500,
        grid: true
      });
  </script>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



  <script>
  function w3_open() {
    document.getElementById("main").style.marginLeft = "25%";
    document.getElementById("filter_sidebar").style.width = "25%";
    document.getElementById("filter_sidebar").style.display = "block";
  //  document.getElementById("openNav").style.display = 'none';
  }
  function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("filter_sidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
  }
  </script>

  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(agar_slide,n) {
      console.log(agar_slide);
      showDivs(agar_slide,slideIndex += n);
    }

    function showDivs(agar_slide,n) {
      var i;
      var x = document.getElementsByClassName(agar_slide);
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex-1].style.display = "block";
    }
  </script>
  <!-- this for mobile screen only -->
  <script>
    var slideIndex = 1;
    showMobileDivs(slideIndex);

    function plusMobileDivs(n) {
      showMobileDivs(slideIndex += n);
    }

    function showMobileDivs(n) {
      var i;
      var x = document.getElementsByClassName("mobile-Slides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex-1].style.display = "block";
    }
  </script>

  <script>
  // Tabs
  function openLink(evt, linkName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("myLink");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
    }
    document.getElementById(linkName).style.display = "block";
    evt.currentTarget.className += " w3-red";
  }

  // Click on the first tablink on load
  document.getElementsByClassName("tablink")[0].click();
  </script>


  <!-- date picker -->
  <script src="{{ asset('datepicker/js/bootstrap-datepicker.js') }}" ></script>
  <script>
    $( function() {
      $( "#datepicker" ).datepicker({
        multidate: true
      });
    } );
  </script>

  <script>
    $( function() {
      $( "#datepicker_mobile" ).datepicker({
        multidate: true
      });
    } );
  </script>

  </div>
</body>
</html>
