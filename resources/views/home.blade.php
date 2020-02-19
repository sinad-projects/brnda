
<!DOCTYPE html>
<html>
<head>
    <title>برندة </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="{{ asset('lib/lightslider-master/src/css/lightslider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3-colors-windows.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3-colors-flat.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/webfonts/FontAwesome.otf') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  </head>

  <body class="" dir="rtl">
  <!-- Navigation Bar -->
  <nav class="container navbar navbar-expand-lg navbar-light w3-light-grey" style="z-index: 999">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}" width="50" height="50" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse home-nav" id="navbarNav" dir="rtl">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link w3-large" href="{{ route('home') }}">الرئيسية <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link w3-large" href="{{ route('agars.agarsList') }}"> تصفح العقارات </a>
          </li>
          <li class="nav-item">
            <a class="nav-link w3-large" href="#">تحميل التطبيق</a>
          </li>
          <li class="nav-item">
            <a class="nav-link w3-large" href="#services">   خدماتنا </a>
          </li>
        </ul>
      </div>
  </nav>

  <br>
  <!-- Header -->
  <header class="container w3-light-grey" style="z-index: 99;height: 500px!important">
    <div class="w3-display-middle home-search-model">
      <div class="container w3-padding-64 text-center" style="">
        <h3 class="">برندا دليل العقارات المفروشة في السودان</h3>
        <div class="row">
          <div class="col-md-12">
            <form action="{{ route('home.search') }}" method="post">
              @csrf
              <input style="position: relative;" class="form-control w3-padding-32 text-right" name="query" type="text" placeholder="ابحث عن عقار..">
              <button type="submit" class="btn w3-black" style="position: absolute; top: 0px; left: 18px;padding: 21px 35px"> <i class="fa fa-search w3-large"></i> </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Page content -->
  <div class="container w3-white text-center w3-padding-32" style="margin-top: 50px;" id="services">
    <div class="row w3-large">
      <div class="col-md-4 w3-margin-bottom">
        <h4 class="w3-xlarge">فتش</h4>
        <div class="">
          <i class="fa fa-check w3-xxlarge w3-right about_brnda_icons"></i>
          <p class="">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
          </p>
        </div>
      </div>
      <div class="col-md-4 w3-margin-bottom">
        <h4 class="w3-xlarge">احجز</h4>
        <div class="">
          <i class="fa fa-check w3-xxlarge w3-right about_brnda_icons"></i>
          <p class="">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
          </p>
        </div>
      </div>
      <div class="col-md-4 w3-margin-bottom">
        <h4 class="w3-xlarge">اسكن</h4>
        <div class="">
          <i class="fa fa-check w3-xxlarge w3-right about_brnda_icons"></i>
          <p class="">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
          </p>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Explore Nature -->
  <div class="container text-right" style="margin-top: 50px;">
    <h3>عقارات مميزة</h3>
  </div>
  <div class="container w3-white text-center w3-margin-top w3-padding-16">
    <div class="row w3-large">
      @foreach($featured_agars as $agar)
        <div class="col-md-4 w3-margin-bottom">
          @foreach($agar->image as $image)
            <div class="">
              <img src="{{ asset('agar/images/'.$image->img_wide) }}" width="100%" height="200" />
            </div>
            @break
          @endforeach
        </div>
      @endforeach
      <div class="col-md-4 w3-margin-bottom">
        <div class="">
          <img src="{{ asset('images/2.jpg') }}" width="100%" height="200" />
        </div>
      </div>
      <div class="col-md-4 w3-margin-bottom">
        <div class="">
          <img src="{{ asset('images/1.jpg') }}" width="100%" height="200" />
        </div>
      </div>
    </div>
  </div>

  <hr>

  <div class="container" style="margin-top: 50px;">
    <div class="row text-center w3-light-grey w3-padding-32">
      <div class="col-md-6 w3-margin-bottom">
        <div class="w3-white w3-padding-16">
          <h3>اسكن مرتاح</h3>
          <p class="w3-padding">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة
          </p>
          <a href="#places" class="w3-button w3-border w3-margin-bottom"> تعرف على اماكن السكن </a>
        </div>
      </div>
      <div class="col-md-6 w3-margin-bottom">
        <div class="w3-white w3-padding-16">
          <h3>اجر مع برندا واكسب</h3>
          <p class="w3-padding">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة
          </p>
          <a href="{{ route('agars.agarsList') }}" class="w3-button w3-border w3-margin-bottom">تصفح العقارات</a>
        </div>
      </div>
    </div>
  </div>

  <hr>


  <div class="container text-right" style="margin-top: 50px;">
    <h3> اخر العقارات </h3>
  </div>
  <div class="container">
    <div class="row text-right">
      @foreach($agars as $agar)
        <div class="col-md-3 w3-margin-bottom">
          <div class="w3-white  card">
            @foreach($agar->image as $image)
              <img src="{{ asset('agar/images/'.$image->img_wide ) }}" width="100%" height="200" />
              @break
            @endforeach
            <div class="w3-padding">
              <h3> {{ $agar->agar_name }}  </h3>
              <p>{{ $agar->price->day }} جنيه <span> / اليوم </span> </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <hr>

  <footer style="margin-top: 50px;" dir="rtl">
    <div class="container text-right w3-margin-top">
      <h3>  عاوز تسكن وين ! </h3>
    </div>
    <div class="container w3-margin-top" id="places">
      <div class="row w3-white  text-right w3-text-black">
        @foreach($citys as $city)
          <div class="col-md-3 col-sm-2 w3-margin-bottom">
            <div class="">
              <a class="w3-button" href="#"> <span> {{$city->city_name }} </span> </a><br>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </footer>

<!--
  <div class="container text-right w3-margin-top">
    <h3> قم بتحميل التطبيق </h3>
  </div>
  <div class="container w3-margin-top">
    <div class="w3-right">
      <a href="#" class="">
        <img src="{{ asset('images/google_play_icon.png') }}"  />
      </a>
    </div>
  </div>
-->
<!-- End page content -->
</div>

@include('layouts/footer')


<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

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

</body>
</html>
