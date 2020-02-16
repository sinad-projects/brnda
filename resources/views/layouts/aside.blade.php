<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-animate-right" style="z-index:3;width:300px;display: none;position: relative; right: 0px" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="{{ asset('images/avatar2.png') }}" class="w3-circle w3-margin-right" style="width:46px">
        </div>

        <div class="w3-col s8 w3-bar" dir="auto">
            <span class="w3-bar-item">مرحباُ يا, <strong> {{ Auth::user()->name }} </strong></span><br>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" name="logout" class="w3-bar-item w3-btn"><i class="fa fa-sign-out"></i></button>
            </form>
        </div>
    </div>
    <hr>
    <div class="w3-bar-block">
        <a href="javascript::void()" class="w3-bar-item text-right w3-btn w3-padding-16 w3-hide-large1 w3-dark-grey w3-hover-black"onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  اغلق القائمة</a>

        <a href="{{ route('home') }}" class="w3-bar-item w3-btn w3-padding text-right">
          <i class="fa fa-home"></i> الرئيسية
        </a>

        <a href="{{ route('agars.myAgars') }}" class="w3-bar-item w3-btn w3-padding w3-flat-belize-hole text-right w3-animate-zoom">
          <i class="fa fa-hotel"></i>  عقاراتي
        </a>

        <a href="{{ route('reservation.index') }}" class="w3-bar-item w3-btn w3-padding w3-flat-belize-hole text-right w3-animate-zoom">
          <i class="fa fa-inbox"></i> طلبات الايجار
        </a>

        <a href="{{ route('agars.agarsList') }}" class="w3-bar-item text-right w3-btn w3-padding">
          <i class="fa fa-building-o"></i>  العقارات
        </a>

    </div>
</nav>
