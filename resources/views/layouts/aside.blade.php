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
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" name="logout" class="w3-bar-item w3-btn"><i class="fa fa-sign-out"></i></button>
            </form>
            <a href="settings.php" class="w3-bar-item w3-btn"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <hr>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-btn w3-padding-16 w3-hide-large1 w3-dark-grey w3-hover-black"onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  اغلق القائمة</a>

        <a href="cpanel.php" class="w3-bar-item w3-btn w3-padding">
          <i class="fa fa-eye fa-fw"></i> الرئيسية
        </a>

        <a href="{{ route('agars.list') }}" class="w3-bar-item w3-btn w3-padding w3-flat-belize-hole w3-animate-zoom">
          <i class="fa fa-hands-helping fa-fw w3-spin"></i>  عقاراتي
        </a>

        <a href="{{ route('reservation.index') }}" class="w3-bar-item w3-btn w3-padding w3-flat-belize-hole w3-animate-zoom">
          <i class="fa fa-hands-helping fa-fw w3-spin"></i> طلبات الايجار
        </a>

        <a href="{{ route('home') }}" class="w3-bar-item w3-btn w3-padding">
          <i class="fa fa-briefcase fa-fw"></i>  العقارات
        </a>

    </div>
</nav>
