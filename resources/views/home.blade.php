
<!DOCTYPE html>
<html>
<head>
    <title>
        برندة            </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('lib/dropzone/dropzone.css') }}" type="text/css">
    <link rel="stylesheet"  href="{{ asset('lib/lightslider-master/src/css/lightslider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3-colors-windows.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3-colors-flat.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome-free-5.0.13/web-fonts-with-css/webfonts/FontAwesome.otf') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
            <img src="{{ asset('images/avatar2.png') }}" class="w3-circle w3-margin-right" style="width:46px">
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


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity"
     onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="wrapper">
    <div class="w3-container w3-margin-top">
        <div class="w3-card-4">
            <header class="w3-bar w3-padding " style="position: relative">
                <span class="w3-bar-item w3-right"> <h5><strong><i class="fa fa-building-o"></i> &nbsp;عقاراتي</strong></h5></span>
                <span id="addNewAgar" onclick="document.getElementById('NEW_AGAR_FORM').style.display='block'" class=" w3-large w3-hover-light-gray w3-display-left w3-margin-left w3-white w3-border w3-border-gray w3-round w3-text-gray" style="padding: 7px 15px">
                    <i style="font-weight: 50;" class="fa fa-plus"></i>
                </span>
            </header>

            <div class="w3-margin">
                <div id="I_New" class="tab-el" style="display:block">
                    <div class="w3-margin-bottom w3-margin-top">
                        <div class="w3-responsive"> <!-- START table data -->
                            <table class="w3-table w3-striped w3-margin-bottom ">
                                <thead>
                                <tr class="w3-card">
                                    <th class="w3-center">#</th>
                                    <th class="w3-center">الإسم</th>
                                    <th class="w3-center">نوع العقار</th>
                                    <th class="w3-center">الطابق</th>
                                    <th class="w3-center">الموقع الجغرافي</th>
                                    <th class="w3-center">عدد الغرف</th>
                                    <th class="w3-center">عدد الحمامات</th>
                                    <th class="w3-center">الوصف</th>
                                    <th class="w3-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody class="w3-text-dark-grey">
                                  @foreach($agars as $agar)
                                    <tr>
                                        <td>{{ $agar->id }}</td>
                                        <td> {{ $agar->agar_name }} </td>
                                        <td>{{ $agar->type_id }}</td>
                                        <td>{{ $agar->floor_id }}</td>
                                        <td>{{ $agar->geo_loc_id }}</td>
                                        <td>{{ $agar->rooms_number }}</td>
                                        <td>{{ $agar->bathrooms_number }}</td>
                                        <td> {{ $agar->agar_desc }} </td>                                                                                                           </td>
                                        <td>
                                            <div class="w3-center">
                                                <div class="w3-bar">
                                                    <a href="{{ route('agars.single',['agar_id' => $agar->id]) }}"
                                                       class="w3-bar-item w3-btn w3-mobile"><i class="fa fa-info"></i></a>
                                                    <a href="agar.php?tab=New&agar_id=17&status=1"
                                                       class="w3-bar-item w3-btn w3-mobile"><i class="fa fa-edit"></i></a>
                                                    <button type="button" onclick="document.getElementById('delete_agar_confirm_{{ $agar->id }}').style.display='block'"
                                                            class="w3-bar-item w3-btn w3-mobile"><i class="fa fa-trash-o"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div><!-- END table data -->
                    </div><!-- END list -->
                </div><!-- END New -->
                <div id="I_Accepted" class="tab-el"
                     style="display:none">
                </div><!-- END Accepted -->
                <!-- START Done -->
                <div id="I_Done" class="tab-el"
                     style="display:none">
                </div><!-- END Done -->
                <div id="I_Undone" class="tab-el"
                     style="display:none">
                </div>
                <div id="I_Canceled" class="tab-el"
                     style="display:none">
                </div><!-- END New Canceled -->
            </div>
        </div>
    </div>
    <br>
    <!-- START MODALS -->
    <div id="NEW_AGAR_FORM" class="w3-modal" style="
         display: none"><!-- START NEW_AGAR_FORM -->
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
            <header class="w3-container w3-border-bottom">
                <h4><i class="fa fa-home"></i> نموذج عقار</h4>
                <a href="agar.php" class="w3-btn w3-display-topleft">&times;</a>
            </header>
            <div class="">
                <form id="agar" action="{{ route('agars.store') }}" method="post" enctype="multipart/form-data" class="w3-padding-large">
                   @csrf
                    <div class="w3-row-padding">
                        <div class="w3-margin-bottom w3-third">
                            <label for="agar_name">الاسم</label>
                            <input id="agar_name"  name="agar_name" class="w3-input" type="text" placeholder="الاسم"
                                   required value="" value="">
                        </div>
                        <div class="w3-margin-bottom w3-third">
                            <label for="type_id">نوع العقار</label>
                            <select id="type_id" class="w3-input" name="type_id">
                              @foreach($agarType as $type)
                                <option required="required" id="type_id_1"
                                        value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div id="floor_container" class="w3-margin-bottom w3-third">
                            <label for="floor_id">الطابق</label>
                            <select id="floor_id" class="w3-input" name="floor_id">
                              @foreach($agarFloor as $floor)
                                <option id="floor_id_0"
                                        value="{{ $floor->floor_id }}">{{ $floor->floor_name }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w3-margin-bottom">الموقع الجغرافي</div>
                    <div class="w3-row-padding">
                        <div class="w3-margin-bottom w3-third">
                            <label for="state_id">الولاية</label>
                            <select id="state_id" class="w3-input" name="state_id">
                              @foreach($states as $state)
                                <option id="state_id_1"
                                        selected value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="w3-margin-bottom w3-third">
                            <label for="city_id">المدينة</label>
                            <select id="city_id" class="w3-input" name="city_id">
                              @foreach($citys as $city)
                                <option id="city_id_1"
                                        value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="w3-margin-bottom w3-third">
                            <label for="area">الحي</label>
                            <input id="area"  name="area" class="w3-input" type="text"
                                   placeholder="الحي" required value=""
                                   value="">
                        </div>
                    </div>
                    <div class="w3-row-padding">
                        <div class="w3-margin-bottom w3-half">
                            <label for="rooms_number">عدد الغرف</label>
                            <input id="rooms_number"  name="rooms_number" class="w3-input" type="number"
                                   placeholder="عدد الغرف" required  value=""
                                   value="">
                        </div>
                        <div class="w3-margin-bottom w3-half">
                            <label for="bathrooms_number">عدد الحمامات</label>
                            <input id="bathrooms_number"  name="bathrooms_number" class="w3-input" type="number"
                                   placeholder="عدد الحمامات" required value=""
                                   value=""
                        </div>
                    </div>
                    <div class="w3-margin-bottom"> سعر العقار </div>
                    <div class="w3-row-padding">
                        <div class="w3-margin-bottom w3-quarter">
                            <label for="day">اليوم</label>
                            <input id="day" type="text" name="day" class="w3-input" required />
                        </div>
                        <div class="w3-margin-bottom w3-quarter">
                          <label for="week">الاسبوع</label>
                          <input id="week" type="text" name="week" class="w3-input" required />
                        </div>
                        <div class="w3-margin-bottom w3-quarter">
                          <label for="month">الشهر</label>
                          <input id="month" type="text" name="month" class="w3-input" required />
                        </div>
                        <div class="w3-margin-bottom w3-quarter">
                          <label for="month">العملة</label>
                          <select id="currency" class="w3-input" name="currency">
                              <option value="1">دولار</option>
                              <option value="2">جنيه</option>
                          </select>
                        </div>
                    </div>
                    <div class="w3-margin-bottom"> متوفر من تاريخ  </div>
                    <div class="w3-row-padding">
                        <div class="w3-margin-bottom w3-half">
                            <input id="start_date" type="date" name="start_date" class="w3-input" required />
                        </div>
                        <div class="w3-margin-bottom w3-half">
                            <input id="end_date" type="date" name="end_date" class="w3-input" required />
                        </div>
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="agar_desc">الوصف</label>
                        <textarea id="agar_desc" name="agar_desc" class="w3-input"
                                  required>                            </textarea>
                    </div>
                </form>
            </div>
            <footer class="w3-container">
                <div class="w3-section w3-left">
                    <button form="agar" type="submit" name="save_agar" value="حفظ"
                    class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;">
                        <i class="fa fa-save"></i> حفظ</button>
                    <a href="agar.php"  class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;"><i class="fa fa-close"></i> إلغاء</a>
                </div>
            </footer>
        </div><!-- END New agar Form -->
    </div></div> <!-- END NEW_AGAR_FORM -->


<div><!-- START delete_agar_confirm_ MODALS -->
  @foreach($agars as $agar)
    <div id="delete_agar_confirm_{{ $agar->id }}" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:480px">

            <header class="w3-container w3-border-bottom">
                <span onclick="document.getElementById('delete_agar_confirm_{{ $agar->id }}').style.display='none'"
                                                                  class="w3-btn w3-display-topleft">&times;</span>
                <h4>حذف</h4>
            </header>

            <div class="w3-container">
                <div class="w3-section">
                    <p><i class="fa fa-2x w3-padding fa-trash-o w3-text-flat-midnight-blue"></i><span> هل أنت متأكد من أنك تريد حذف هذا العنصر؟، هذه العملية لا يمكن التراجع عنها.</span></p>
                </div>
                <div class="w3-row-padding w3-section">

                    <div class="w3-twothird">
                        <table class="w3-table w3-responsive">
                            <tr>
                                <th>الإسم</th>
                                <td>{{ $agar->agar_name }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ الإنشاء</th>
                                <td>{{ $agar->created_at }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <footer class="w3-container">
                <div class="w3-margin-top w3-margin-bottom w3-left">
                    <form id="delete_agar_form_1" action="{{ route('agars.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="agar_id" value="{{ $agar->id }}"/>
                        <button type="submit" form="delete_agar_form_1" autofocus type="submit" name="delete_agar" value="موافق"
                            class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px"><i class="fa fa-check-square"></i> موافق</button>
                        <button type="button" onclick="document.getElementById('delete_agar_confirm_1').style.display='none'"
                            class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px"><i class="fa fa-arrow-right"></i> إلغاء</button>
                    </form>
                </div>
            </footer>
        </div>
    </div><!-- END delete_agar_confirm MODAL -->
    @endforeach

</div><!-- END delete_agar_confirm_ MODALS -->

<!-- END MODALS -->

<!-- Footer -->
<footer class="w3-container w3-padding-16">
    <h4>برندة</h4>
    <p>جميع الحقوق محفوظة لـ <b>برندة</b> 2019</p>
</footer>

<!-- End page content -->
</div>

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
                url: "delete.ajax.php?agar_id=<br />
                <b>Notice</b>:  Undefined index: agar_id in <b>E:\xampp\htdocs\brnda-obsolete\template\footer.php</b> on line <b>62</b><br />
    ",
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
<script src="js/jQuery.js"></script>
<script src="js/app.js"></script>
</body>
</html>
