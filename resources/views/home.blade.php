
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
    <style>
      * {
          box-sizing: border-box;
      }
      @font-face {
          font-family: JF-Flat-regular;
          font-style: normal;
          font-weight: 400;
          src: url("fonts/Flat_Font_Jozoor/JF-Flat-regular.ttf");
        }
        html,body,h1,h2,h3,h4,h5,h6,p,span {
          font-family: JF-Flat-regular, sans-serif;
        }
    </style>
  </head>

  <body class="w3-light-grey">
  <!-- Navigation Bar -->
  <nav class="container navbar navbar-expand-lg navbar-light" style="z-index: 999">
      <a class="navbar-brand" href="#">
        <img src="images/logo.png" width="50" height="50" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav" dir="rtl">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">الرئيسية <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('agars.agarsList') }}"> تصفح العقارات </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">تحميل التطبيق</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">عن برندا</a>
          </li>
        </ul>
      </div>
  </nav>


  <!-- Header -->
  <header class="container" style="z-index: 99">
    <img class="w3-image" src="{{ asset('images/1.jpg' )}}" alt="cover" width="1500" height="100" style="height: 500px!important">
    <div class="w3-display-middle" style="width:65%">
      <div class="container w3-white w3-padding-64 text-center" style="">
        <h3 class="">برندا دليل العقارات المفروشة في السودان</h3>
        <div class="row">
          <div class="col-md-12">
            <input style="position: relative;" class="form-control w3-padding-32 text-right" type="text" placeholder="ابحث عن عقار..">
            <button type="submit" class="btn w3-black" style="position: absolute; top: 0px; left: 15px;padding: 21px 35px"> <i class="fa fa-search w3-large"></i> </button>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Page content -->
  <div class="container w3-white text-center w3-margin-top w3-padding-32">
    <div class="row w3-large">
      <div class="col-md-4 w3-margin-bottom">
        <h4>فتش</h4>
        <div class="">
          <i class="fa fa-check w3-xxlarge w3-round w3-border"></i>
          <p class="">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
          </p>
        </div>
      </div>
      <div class="col-md-4 w3-margin-bottom">
        <h4>احجز</h4>
        <div class="">
          <i class="fa fa-check w3-xxlarge w3-round w3-border"></i>
          <p class="">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
          </p>
        </div>
      </div>
      <div class="col-md-4 w3-margin-bottom">
        <h4>اسكن</h4>
        <div class="">
          <i class="fa fa-check w3-xxlarge w3-round w3-border"></i>
          <p class="">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Explore Nature -->
  <div class="container text-right w3-margin-top">
    <h3>عقارات مميزة</h3>
  </div>
  <div class="container w3-white text-center w3-margin-top w3-padding-16">
    <div class="row w3-large">
      <div class="col-md-4 w3-margin-bottom">
        <div class="">
          <img src="{{ asset('images/x.png') }}" width="100%" height="200" />
        </div>
      </div>
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


  <div class="container w3-margin-top">
    <div class="row text-center">
      <div class="col-md-6 w3-margin-bottom">
        <div class="w3-white w3-padding-16">
          <h3>اسكن مرتاح</h3>
          <p class="w3-padding">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة
          </p>
          <button class="w3-button w3-border w3-margin-bottom">تعرف على خدماتنا</button>
        </div>
      </div>
      <div class="col-md-6 w3-margin-bottom">
        <div class="w3-white w3-padding-16">
          <h3>اجر مع برندا واكسب</h3>
          <p class="w3-padding">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة
          </p>
          <button class="w3-button w3-border w3-margin-bottom">تصفح العقارات</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-right w3-margin-top">
    <h3> اخر العقارات </h3>
  </div>
  <div class="container">
    <div class="row text-right">
      @foreach($agars as $agar)
        <div class="col-md-3 w3-margin-bottom">
          <div class="w3-white">
            @foreach($agar->image as $image)
              <img src="{{ asset('agar/images/'.$image->img_wide ) }}" width="100%" height="200" />
              <?php break; ?>
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


  <footer>
    <div class="container text-right w3-margin-top">
      <h3> عاوز تسكن وين  </h3>
    </div>
    <div class="container w3-margin-top">
      <div class="row w3-white  text-right w3-text-black">
        <div class="col-md-2 w3-margin-bottom">
          <div class="w3-padding-16">
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a>
          </div>
        </div>
        <div class="col-md-2 w3-margin-bottom">
          <div class="w3-padding-16">
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a>
          </div>
        </div>
        <div class="col-md-2 w3-margin-bottom">
          <div class="w3-padding-16">
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a>
          </div>
        </div>
        <div class="col-md-2 w3-margin-bottom">
          <div class="w3-padding-16">
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a>
          </div>
        </div>
        <div class="col-md-2 w3-margin-bottom">
          <div class="w3-padding-16">
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a>
          </div>
        </div>
        <div class="col-md-2 w3-margin-bottom">
          <div class="w3-padding-16">
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a><br>
            <a href="#"> <span> ادرمان </span> </a>
          </div>
        </div>
      </div>
    </div>
  </footer>


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
<!-- End page content -->
</div>

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


<script src="{{ asset('jquery-3.4.1.slim.min.js') }}"></script>
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
