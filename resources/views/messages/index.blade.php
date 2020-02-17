@include('layouts/header')


  <body dir="" class="text-right">
    <div class="w3-white">


    <!-- sidebar menu -->
      @include('layouts/aside')


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <!-- -->

<br><br>
<div class="container w3-margin-top">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header w3-right-align">
                قائمة الاتصال الخاصة بك     <i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
                </div>

                <div class="card-body" id="contact">
                    <chat-app :user="{{ Auth::user() }}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Footer -->
<script type="text/javascript" src="{{ asset('js/script.js') }}">

</script>
