<!DOCTYPE html>
<html>
<head>
    <title>  برندة    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"  href="{{ asset('lib/lightslider-master/src/css/lightslider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('lib/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3-colors-windows.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3-colors-flat.css') }}">
    <link rel="stylesheet"
          href="{{ asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">


</head>


  <body dir="rtl" class="text-right">
    <div class="w3-white">


    <!-- sidebar menu -->
      @include('layouts/aside')

      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="wrapper"><!-- START view agar -->
       <div class="w3-container w3-margin-top brnda-card-4">
           <header class="w3-bar w3-section w3-large"> <!-- START HEADER -->
               <span class="w3-bar-item w3-right" style="padding-right: 0"><i class="fa fa-picture-o"></i> صور العقار</span>
           </header>

           <!-- begin agars images -->
           <div class="w3-animate-zoom w3-margin-bottom w3-responsive">
              <div id="agar_info_bar" class="w3-bar w3-white w3-border-bottom w3-padding">
                  <div class="wrapper w3-row">
                      <a href="#agar_desc" class="w3-bar-item w3-button w3-large w3-hover-none w3-hover-text-gray" style="width:25%">الوصف</a>
                      <a href="#agar_loc" class="w3-bar-item w3-button w3-large w3-hover-none w3-hover-text-gray" style="width:25%">الموقع</a>
                      <a href="#agar_feature" class="w3-bar-item w3-button w3-large w3-hover-none w3-hover-text-gray" style="width:25%">المميزات</a>
                      <a href="#agar_policy" class="w3-bar-item w3-button w3-large w3-hover-none w3-hover-text-gray" style="width:25%">الشروط</a>
                  </div>
              </div>
                <!-- !PAGE CONTENT! -->
            <div class="w3-main" style=""><!-- START view agar -->
              <!-- Container for the image gallery -->
              <div class="container">
                  <!-- slider -->
                  <div class="w3-content w3-display-container">
                    @foreach($agar->image as $image)
                      <div class="w3-display-container w3-tooltip">
                          <img width="100%" class="w3-hover-grayscale mySlides" src="{{ asset('agar/images/'.$image->img_wide) }}" alt="{{$image->img_wide}}">
                      </div>
                    @endforeach
                    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                  </div>
              </div>

              <br>

              <div class="wrapper">
                <div class="w3-row-padding">
                  <section class="w3-twothird">
                      <div class="w3-bar">

                          <a href="#" class="w3-bar-item w3-button w3-hover-none w3-text-gray" style="padding: 4px 8px">
                              <i class="fa fa-info-circle"> <span>أعرف معلومات أكثر</span></i>
                          </a>
                      </div>
                      <section class="w3-section">
                          <h2>{{ $agar->agar_name }}</h2>
                          <h6>
                              موقع العقار
                              <i class="fa fa-map-marker-alt w3-margin-left-8"></i>
                              <span>
                                <a class="decoration-none hover-underline" href="#">{{ $agar->location->state->state_name }} /</a>
                                <a class="decoration-none hover-underline" href="#">{{ $agar->location->city->city_name }} /</a>
                                <a class="decoration-none hover-underline" href="#">{{ $agar->location->area }}</a>
                              </span>
                          </h6>
                      </section>
                      <section class="w3-section" style="margin-bottom: 64px !important;">
                          <div class="w3-bar">
                              <span class="w3-bar-item w3-margin-left-8 w3-text-gray">
                                  <i class="fa fa-bed w3-margin-left-8"></i>
                                  <span>{{ $agar->rooms_number }} غرف نوم</span>
                              </span>
                              <span class="w3-bar-item w3-margin-left-8 w3-text-gray">
                                  <i class="fa fa-bath w3-margin-left-8"></i>
                                  <span>{{ $agar->bathrooms_number }} دورات مياه</span>
                              </span>
                              <span class="w3-bar-item w3-margin-left-8 w3-text-gray">
                                  <i class="fa fa-building w3-margin-left-8"></i>
                                  <span>{{ $agar->floor->floor_name }}<span>
                              </span>
                          </div>
                          <div id="agar_desc"></div>
                      </section>
                      <section class="w3-section" style="margin-bottom: 64px !important;">
                          <h3>الوصف</h3>
                          <span class="more">{{ $agar->agar_desc }}</span>
                          <div id="agar_loc"></div>
                      </section>
                      <section class="w3-section" style="margin-bottom: 64px !important;" >
                          <h3>الموقع على الخريطة</h3>
                          <div>
                              <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Innovation%20platform%2C%20khartoum%2C%20sudan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                              <!-- Special 20% Discount for Elegant Themes Divi Page Builder https://www.embedgooglemap.net/divi-sale/ -->
                          </div>
                          <div id="agar_feature"></div>
                      </section>
                      <section class="w3-section">
                          <h3>المميزات</h3>
                          <hr/>
                          <h4>المرافق الأساسية</h4>
                          <section>
                            <span class="w3-show-inline-block w3-padding w3-margin-left-8 w3-text-dark-gray">
                                <i class="fa fa-check w3-margin-left-8"></i>
                                <?php if($agar->agar_extra->b_extra != null): ?>
                                  <?php $b_extra = json_decode($agar->agar_extra->b_extra); foreach ($b_extra as $b_extra):?>
                                    <span class=""> <?php echo $b_extra; ?> </span>
                                  <?php endforeach ; ?>
                                <?php else: ?>
                                  <div class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">
                                      <h3 class="">فارغ! لا توجد بيانات هنا.</h3>
                                  </div>
                                <?php endif ; ?>
                            </span>
                          </section>
                          <hr/>
                          <h4>المرافق الإضافية</h4>
                          <section class="w3-section">
                            <span class="w3-show-inline-block w3-padding w3-margin-left-8 w3-text-black-gray">
                              <i class="fa fa-check w3-margin-left-8"></i>
                              <?php if($agar->agar_extra->a_extra != null): ?>
                                <?php $a_extra = json_decode($agar->agar_extra->a_extra); foreach ($a_extra as $a_extra):?>
                                  <span class=""> <?php echo $a_extra; ?> </span>
                                <?php endforeach ; ?>
                              <?php else: ?>
                                <div class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">
                                    <h3 class="">فارغ! لا توجد بيانات هنا.</h3>
                                </div>
                              <?php endif ; ?>
                            </span>
                          </section>
                          <hr/>
                          <h4>الميزات الخاصة</h4>
                          <section class="w3-section">
                              <span class="w3-show-inline-block w3-padding w3-margin-left-8 w3-text-black-gray">
                                  <i class="fa fa-check w3-margin-left-8"></i>
                                  <?php if($agar->agar_extra->sf_extra != null): ?>
                                    <?php $sf_extra = json_decode($agar->agar_extra->sf_extra); foreach ($sf_extra as $sf_extra):?>
                                      <span class=""> <?php echo $sf_extra; ?> </span>
                                    <?php endforeach ; ?>
                                  <?php else: ?>
                                    <div class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">
                                        <h3 class="">فارغ! لا توجد بيانات هنا.</h3>
                                    </div>
                                  <?php endif ; ?>
                              </span>
                              <div id="agar_policy"></div>
                          </section>
                          <h3>شروط السكن</h3>
                          <hr/>
                          <section class="w3-section">
                            <span class="w3-show-inline-block w3-padding w3-margin-left-8 w3-text-black-gray">
                                <i class="fa fa-check w3-margin-left-8"></i>
                                <?php if($agar->agar_extra->cond_extra != null): ?>
                                  <?php $cond_extra = json_decode($agar->agar_extra->cond_extra); foreach ($cond_extra as $cond_extra):?>
                                    <span class=""> <?php echo $cond_extra; ?> </span>
                                  <?php endforeach ; ?>
                                <?php else: ?>
                                  <div class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">
                                      <h3 class="">فارغ! لا توجد بيانات هنا.</h3>
                                  </div>
                                <?php endif ; ?>
                              </span>
                          </section>
                      </section>
                  </section>
                  <section class="w3-third">
                      <div class="w3-card w3-animate-zoom w3-flat-clouds"><!-- START CALENDAR_FORM -->
                          <div class="w3-container">
                              <div id="booking_msg"></div>
                              <form id="booking_form" action="{{ route('reservation.add') }}" method="post" class="w3-padding-16">
                                @csrf
                                  <input type="hidden" name="agar_id" value="{{ $agar->id }}">
                                  <input type="hidden" name="calendar_id" value="{{ $agar->calender }}">
                                  <div class="">
                                      <div class="w3-section">
                                          <label for="start_date">تاريخ الوصول</label>
                                          <input id="start_date"  name="start_date" class="w3-input" type="date"
                                          placeholder="من" required value="{{ $agar->calender }}">
                                      </div>
                                      <div class="w3-section">
                                          <label for="end_date">تاريخ المغادرة</label>
                                          <input id="end_date"  name="end_date" class="w3-input" type="date"
                                          placeholder="إلى" required  value="{{ $agar->calender }}">
                                      </div>
                                      <input type="hidden" name="reciver_id" value="{{ $agar->owner_id }}">
                                      <div class="w3-section">
                                          <button form="booking_form" type="submit" id="request_booking" name="request_booking" value="" class="w3-btn w3-block w3-flat-peter-river">
                                              <i class="fa fa-calendar"></i> طلب الحجز</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div><!-- END CALENDAR_FORM -->
                  </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    @include('layouts/footer')
    
    <script>
      var slideIndex = 1;
      showDivs(slideIndex);

      function plusDivs(n) {
        showDivs(slideIndex += n);
      }

      function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
      }
    </script>

</body>
</html>
