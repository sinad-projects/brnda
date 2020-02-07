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
    <link rel="stylesheet"
          href="{{  asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet"
          href="{{  asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/webfonts/FontAwesome.otf') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <link rel="stylesheet" href="style.css">
</head>
<body class="">

<!-- Top container -->
<div class="w3-bar w3-large w3-border-bottom" style="z-index:4; height: 100px">
    <button class="w3-bar-item w3-button w3-hover-none
      w3-hover-text-grey w3-xxlarge" style="padding: 20px"
            onclick="w3_open();">
        <i class="fa fa-bars"></i></button>
    <!--span class="w3-bar-item w3-left">برندة</span-->
        <span class="w3-bar-item w3-left" style="padding: 20px;">
        <img height="60px" width="60px" src="{{ asset('images/branda_logo.png') }}" alt="شعار برندة" /></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar  w3-animate-right" style="z-index:3;width:300px; display: none" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
        </div>

        <div class="w3-col s8 w3-bar">
            <span class="w3-bar-item">مرحباُ يا, <strong>أحمد تبن</strong></span><br>
            <a href="logout.php" class="w3-bar-item w3-btn"><i class="fa fa-sign-out-alt"></i></a>
            <a href="settings.php" class="w3-bar-item w3-btn"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <hr>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-btn w3-padding-16 w3-hide-large1 w3-dark-grey w3-hover-black"
           onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  اغلق القائمة</a>
        <a href="cpanel.php" class="w3-bar-item w3-btn w3-padding
        "><i class="fa fa-eye fa-fw
        "></i> الرئيسية </a>
        <a href="agar.php" class="w3-bar-item w3-btn w3-padding
         w3-flat-belize-hole w3-animate-zoom"><i class="fa fa-hands-helping fa-fw
         w3-spin"></i>  عقاراتي</a>
        <a href="account.php" class="w3-bar-item w3-btn w3-padding
        "><i class="fa fa-briefcase fa-fw
        "></i>  العقارات</a>

    </div>
</nav>


    <!-- -->
<div class="w3-content  w3-card w3-responsive">
<div class="w3-container">
  <h2>طلبات الايجار</h2>
</div>

<div class="w3-bar w3-border-bottom w3-card">
  <button class="w3-bar-item w3-white w3-border-brnda tablink w3-border-bottom-brnda" onclick="openCity(event,'London')"><i class="fa fa-plus-square"></i> الطلبات الجديدة</button>
  <button class="w3-bar-item w3-white w3-hover-border-bottom-brnda tablink" onclick="openCity(event,'Paris')"><i class="fa fa-check-square"></i> الطلبات المقبولة</button>
  <button class="w3-bar-item w3-white w3-hover-border-bottom-brnda tablink" onclick="openCity(event,'confirm')"><i class="fa fa-check-square"></i> الطلبات المؤكدة</button>
  <button class="w3-bar-item w3-white w3-hover-border-bottom-brnda tablink" onclick="openCity(event,'Tokyo')"><i class="fa fa-archive"></i> الارشفة</button>
</div>

<div id="London" class="w3-container city">
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
	                  <th class="">العمليات </th>
                </tr>
                </thead>
                <tbody>
                  @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td><a href=""><img src="a.png" class="w3-circle" style="margin-left: 3px; width: 35px; height: 35px;">{{ $reservation->user->name }}</a></td>
                        <td><a href="">{{ $reservation->agar }}</a></td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>{{ $reservation->created_at }}</td>
			                  <td>
                            <div class="">
                                <div class="w3-bar">

                                    <a href="agar.php?tab=New&agar_id=1&status=1"
                                       class=" w3-btn w3-mobile w3-text-gray w3-border" style="padding: 0;"><i class="fa fa-check" style="padding: 5px;"></i></a>
                                    <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='block'"
                                            class="w3-btn w3-mobile"><i class="fa fa-times w3-text-gray w3-border" style="padding: 5px;"></i></button>

                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- END table data -->
    </div><!-- END list -->
</div>



            <div id="Paris" class="w3-container city" style="display:none">
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
                                            <tr>
                                                <td>1</td>
                                                <td><a href="">  <img src="a.png" class="w3-circle" style="margin-left: 3px; width: 35px; height: 35px;">اسم المستأجر</a></td>
                                                <td><a href="">الطلبات المقبولة</a></td>
                                                <td>12/12/2020</td>
                                                <td>12/12/2020</td>
                                                <td> منذ شهر</td>
                                                <td>
                                                    <div class="">
                                                        <div class="w3-bar">

                                                            <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='block'"
                                                                    class="w3-btn w3-mobile"><i class="fa fa-times w3-text-gray w3-border" style="padding: 5px;"></i></button>
                                                            <a href="agar.php?tab=New&agar_id=1&status=1"
                                                                    class=" w3-btn w3-mobile w3-text-gray w3-border" style="padding: 0;"><i class="fa fa-trash-o" style="padding: 5px;"></i></a>

                                                        </div>
                                                    </div>
                                                </td>
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- END table data -->
                                </div><!-- END list -->
                            </div>

<div id="Tokyo" class="w3-container city" style="display:none">
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
								                  <tr>
                                        <td>3</td>
                                        <td><a href="">  <img src="a.png" class="w3-circle" style="margin-left: 3px; width: 35px; height: 35px;">اسم المستأجر</a></td>
                                        <td><a href="">الطلبات المؤرشفة</a></td>
                                        <td>12/12/2020</td>
                                        <td>12/12/2020</td>
                                        <td> منذ شهر</td>
                                        <td>
                                            <div class="">
                                                <div class="w3-bar">


                                                    <a href="agar.php?tab=New&agar_id=1&status=1"
                                                            class=" w3-btn w3-mobile w3-text-gray w3-border" style="padding: 0;"><i class="fa fa-times" style="padding: 5px;"></i></a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- END table data -->
                    </div><!-- END list -->
</div>
<div id="confirm" class="w3-container city" style="display:none">
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
                                <tr>
                                    <td>1</td>
                                    <td><a href="">  <img src="a.png" class="w3-circle" style="margin-left: 3px; width: 35px; height: 35px;">اسم المستأجر</a></td>

                                    <td><a href="">اسم العقار</a></td>
                                                    <td>12/12/2020</td>
                                                    <td>12/12/2020</td>
                                                    <td> منذ شهر</td>
									<td>
                                        <div class="">
                                            <div class="w3-bar">

                                                <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='block'"
                                                        class="w3-btn w3-mobile w3-text-gray w3-border"><img class="w3-text-gray" src="images/iconfinder_message_214645.png" style="width: 15px;height:15px;padding: 0;"></button>

                                                <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='block'"
                                                        class="w3-btn w3-mobile w3-text-gray w3-border"><img class="w3-text-gray" src="images/iconfinder_icon-archive_2867859.png" style="width: 15px;height:15px;padding: 0;"></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

								<tr>
                                        <td>2</td>
                                        <td><a href="">  <img src="a.png" class="w3-circle" style="margin-left: 3px; width: 35px; height: 35px;">اسم المستأجر</a></td>

                                        <td><a href="">اسم العقار</a></td>
                                                        <td>12/12/2020</td>
                                                        <td>12/12/2020</td>
                                                        <td> منذ شهر</td>
                                        <td>
                                            <div class="">
                                                <div class="w3-bar">

                                                        <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='block'"
                                                        class="w3-btn w3-mobile w3-text-gray w3-border"><img class="w3-text-gray" src="images/iconfinder_message_214645.png" style="width: 15px;height:15px;padding: 0;"></button>

                                                <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='block'"
                                                        class="w3-btn w3-mobile w3-text-gray w3-border"><img class="w3-text-gray" src="images/iconfinder_icon-archive_2867859.png" style="width: 15px;height:15px;padding: 0;"></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                            <td>3</td>
                                            <td><a href="">  <img src="a.png" class="w3-circle w3-border" style="margin-left: 3px; width: 35px; height: 35px;">اسم المستأجر</a></td>

                                            <td><a href="">اسم العقار</a></td>
                                                            <td>12/12/2020</td>
                                                            <td>12/12/2020</td>
                                                            <td> منذ شهر</td>
                                            <td>
                                                <div class="">
                                                    <div class="w3-bar">
                                                            <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='block'"
                                                            class="w3-btn w3-mobile w3-text-gray w3-border"><img class="w3-text-gray" src="images/iconfinder_message_214645.png" style="width: 15px;height:15px;padding: 0;"></button>

                                                    <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='block'"
                                                            class="w3-btn w3-mobile w3-text-gray w3-border"><img class="w3-text-gray" src="images/iconfinder_icon-archive_2867859.png" style="width: 15px;height:15px;padding: 0;"></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                </tbody>
                            </table>
                        </div><!-- END table data -->
                    </div><!-- END list -->
</div>
    </div>
<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("w3-white", "w3-white");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += "w3-white";
}


</script>



    <!-- -->



<!-- Footer -->
<footer class="w3-container w3-padding-16">
    <h4>برندة</h4>
    <p>جميع الحقوق محفوظة لـ <b>برندة</b> 2019</p>
</footer>


<script>
    function delete_a_img(img_id) {
        $.ajax({
            type    :'POST',
            url     :'delete.ajax.php?agar_id=19&img_id='+img_id,
            /* Add Files Script*/
            success: function(images){
                $("#agar_images").html(images);
                //setTimeout(function(){window.location.href="index.php"},800);
            }
        });
    }

</script>

<script>
    function save_reservation() {
        $.ajax({
            type    :'GET',
            url     :'handle_reservation.ajax.php?agar_id=19',
            /* Add Files Script */
            success: function(images){
                $("#agar_images").html(images);
                //setTimeout(function(){window.location.href="index.php"},800);
            }
        });
    }

</script>

<!--Only these JS files are necessary-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="lib/dropzone/dropzone.js"></script>
<script>
    //Dropzone script
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#myDrop",
            {
                paramName: "files", // The name that will be used to transfer the file
                addRemoveLinks: true,
                uploadMultiple: true,
                autoProcessQueue: false,
                parallelUploads: 50,
                maxFilesize: 2, // MB
                acceptedFiles: ".png, .jpeg, .jpg, .gif",
                url: "delete.ajax.php?agar_id=",
    });


    /* Add Files Script*/
    myDropzone.on("success", function(file, images){
        //$("#msg").html(message);
        $("#agar_images").html(images);
        //setTimeout(function(){window.location.href="index.php"},800);
    });

    myDropzone.on("error", function (data) {
        $("#msg").html('<div class="alert alert-danger">There is some thing wrong, Please try again!</div>');
    });

    myDropzone.on("complete", function(file) {
        myDropzone.removeFile(file);
    });

    $("#add_agar_img").on("click",function (){
        myDropzone.processQueue();
    });
</script>
<script src="lib/lightslider-master/src/js/lightslider.js"></script>
<script>
    //$(document).ready(function() {
    /*$("#content-slider").lightSlider({
     loop:true,
     keyPress:true
     });*/
    $('#image-gallery').lightSlider({
        item: 3,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,

        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////

        speed: 400, //ms'
        auto: true,
        pauseOnHover: true,
        loop: true,
        slideEndAnimation: true,
        pause: 2000,

        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',

        rtl:true,
        adaptiveHeight:false,

        vertical:false,
        verticalHeight:500,
        vThumbWidth:100,

        thumbItem:8,
        pager: true,
        gallery: true,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',

        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,

        responsive : [],

        onBeforeStart: function (el) {},
        onSliderLoad: function() {
            $('#image-gallery').removeClass('cS-hidden');
        },
        onBeforeSlide: function (el) {},
        onAfterSlide: function (el) {},
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}

    });
    //});
</script>

<script>
    function opent(evt, Name) {
        var i, x, tablinks;
        x = document.getElementsByClassName("tab-el");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-blue", "");
        }
        document.getElementById(Name).style.display = "block";
        evt.currentTarget.className += " w3-blue";
    }
</script>
<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }
</script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <!-- custom scrollbar plugin -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
<script src="js/jQuery.js"></script>
<script src="js/app.js"></script>
</body>
</html>
