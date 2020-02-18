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

  <body class="" dir="rtl">

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
                <div class="w3-margin-bottom">
                    <span title="إضافة" onclick="document.getElementById('AGAR_IMG_FORM').style.display='block'" class="w3-btn w3-text-flat-peter-black">
                      <i class="fa w3-large fa-plus-square-o w3-margin-left-8"></i>
                      <span>إضافة</span>
                  </span>
                </div>

                <div id="agar_images" class="w3-row w3-stretch w3-responsive">
                    @foreach($agar->image as $image)
                      <div class="w3-col l2 m3 s4 w3-mobile">
                          <div class="w3-display-container w3-tooltip">
                              <img width="100%" class="w3-hover-grayscale" src="{{ asset('agar/images/'.$image->img_wide) }}" alt="{{$image->img_wide}}" height="150px" width="100%">
                                <a onclick="document.getElementById('delete_agar_img_confirm_{{ $image->id }}').style.display='block'"
                                  class="w3-btn w3-block w3-text w3-display-bottommiddle w3-flat-pomegranate"><i class="fa fa-trash-o"></i></a>
                          </div>
                      </div>
                      <div id="delete_agar_img_confirm_{{ $image->id }}" class="w3-modal"><!-- START delete_agar_img_confirm MODAL -->
                        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:480px">
                            <header class="w3-container brnda-card">
                                <span onclick="document.getElementById('delete_agar_img_confirm_{{ $image->id }}').style.display='none'"
                                  class="w3-btn w3-display-topleft">&times;</span>
                                <h4>حذف</h4>
                            </header>
                            <form action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post">
                              @csrf
                              <div class="w3-container">
                                  <div class="w3-section">
                                      <p><i class="fa fa-2x w3-padding fa-trash-o w3-text-flat-midnight-blue w3-text-gray"></i><span> هل أنت متأكد من أنك تريد حذف هذا العنصر؟، هذه العملية لا يمكن التراجع عنها.</span></p>
                                  </div>
                                  <div class="w3-section">
                                      <img width="100%" class="w3-border w3-round" src="{{ asset('agar/images/'.$image->img_wide) }}" alt="x.png" height="150px">
                                  </div>
                              </div>

                              <footer class="w3-container ">
                                  <div class="w3-margin-top w3-margin-bottom w3-left">
                                      <input type="hidden" value="{{ $image->id }}" name="image_id" />
                                      <button onclick="delete_a_img({{ $image->id }});" name="delete_agar_image" value="موافق"
                                              class="w3-btn brnda-card w3-ripple w3-margin-left"><i class="fa fa-check-square"></i> موافق</button>
                                      <button type="button" onclick="document.getElementById('delete_agar_img_confirm_{{ $image->id }}').style.display='none'"
                                              class="w3-btn w3-white w3-ripple"><i class="fa fa-arrow-right"></i> إلغاء</button>
                                  </div>
                              </footer>
                            </form>
                        </div>
                    </div><!-- END delete_agar_img_confirm MODAL -->
                @endforeach
              </div>
            </div>
            <!-- end agars images div -->

            <header class="w3-bar w3-section w3-large"> <!-- START HEADER -->
                <span class="w3-bar-item w3-right" style="padding-right: 0"><i class="fas fa-info-circle"></i> البيانات الأساسية</span>
            </header><!-- END HEADER -->
            <div class="w3-animate-zoom w3-margin-bottom w3-responsive">
                    <table class="w3-table w3-striped">
                        <thead>
                        <tr class="brnda-card">
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
                        <tbody>
                          <tr class="w3-flat-clouds">
                              <td class="w3-center">{{ $agar->agar_id }}</td>
                              <td class="w3-center">{{ $agar->agar_name }}</td>
                              <td class="w3-center">{{ $agar->type->type_name }}</td>
                              <td class="w3-center">{{ $agar->floor->floor_name }}</td>
                              <td class="w3-center">
                                {{ $agar->location->state->state_name }} /
                                {{ $agar->location->city->city_name }} /
                                {{ $agar->location->area }}
                              </td>
                              <td class="w3-center">{{ $agar->rooms_number }}</td>
                              <td class="w3-center">{{ $agar->bathrooms_number }}</td>
                              <td class="w3-center">{{ $agar->agar_desc }}</td>
                              <td class="w3-center">
                                  <div class="w3-center">
                                      <div class="w3-bar">
                                          <a href="home-listing.php?agar_id=1"
                                             class="w3-bar-item w3-btn w3-mobile"><i class="fa fa-info"></i></a>
                                          <a href="view_agar.php?agar_id=1&action=edit"
                                             class="w3-bar-item w3-btn w3-mobile"><i class="fa fa-edit"></i></a>
                                          <button type="button" onclick="document.getElementById('delete_agar_confirm_{{ $agar->id }}').style.display='block'"
                                                  class="w3-bar-item w3-btn w3-mobile"><i class="fa fa-trash-o"></i></button>
                                      </div>
                                  </div>
                              </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <header class="w3-bar w3-section w3-large"> <!-- START HEADER -->
                <span class="w3-bar-item w3-right" style="padding-right: 0"><i class="fas fa-info-circle"></i> المرافق الأساسية</span>
            </header><!-- END HEADER -->

            <div class="w3-bar w3-margin-bottom"> <!-- START B -->
                <div class="w3-margin-bottom">
                    <span title="تعديل" onclick="document.getElementById('NEW_B_FORM').style.display='block'" class="w3-btn w3-text-flat-peter-black">
                      <i class="fa w3-large fa-edit w3-margin-left-8"></i>
                      <span>تعديل</span>
                    </span>
                </div>
                <div class="w3-panel w3-light-gray w3-leftbar w3-rightbar w3-border-black w3-padding">
                  <?php if($agar->agar_extra->b_extra != null): ?>
                    <?php $b_extra = json_decode($agar->agar_extra->b_extra); foreach ($b_extra as $b_extra):?>
                      <span class="w3-button w3-white w3-border w3-border-gray w3-round w3-hover-light-gray"> <?php echo $b_extra; ?> </span>
                    <?php endforeach ; ?>
                  <?php else: ?>
                    <h3 class="">فارغ! لا توجد بيانات هنا.</h3>
                  <?php endif ; ?>
                </div>
            </div><!-- END B -->

            <header class="w3-bar w3-section w3-large"> <!-- START HEADER -->
                <span class="w3-bar-item w3-right" style="padding-right: 0"><i class="fas fa-info-circle"></i> المرافق الإضافية</span>
            </header><!-- END HEADER -->
            <div class="w3-bar w3-margin-bottom"> <!-- START A -->
                <div class="w3-margin-bottom">
                    <span title="تعديل" onclick="document.getElementById('NEW_A_FORM').style.display='block'" class="w3-btn w3-text-flat-peter-black">
                          <i class="fa w3-large fa-edit w3-margin-left-8"></i>
                      <span>تعديل</span>
                    </span>
                </div>
                <br />
              <div class="w3-panel w3-light-gray w3-leftbar w3-rightbar w3-border-black">
                <?php if($agar->agar_extra->a_extra != null): ?>
                  <?php $a_extra = json_decode($agar->agar_extra->a_extra); foreach ($a_extra as $a_extra):?>
                    <span class="w3-button w3-white w3-border w3-border-gray w3-round w3-hover-light-gray"> <?php echo $a_extra; ?> </span>
                  <?php endforeach ; ?>
                <?php else: ?>
                  <h3 class="">فارغ! لا توجد بيانات هنا.</h3>
                <?php endif ; ?>
              </div>
            </div><!-- END A -->

            <header class="w3-bar w3-section w3-large"> <!-- START HEADER -->
                <span class="w3-bar-item w3-right" style="padding-right: 0"><i class="fas fa-info-circle"></i> مميزات خاصة</span>
            </header><!-- END HEADER -->
            <div class="w3-bar w3-margin-bottom"> <!-- START SF -->
                <div class="w3-margin-bottom">
                    <span title="تعديل" onclick="document.getElementById('NEW_SF_FORM').style.display='block'" class="w3-btn w3-text-flat-peter-black">
                        <i class="fa w3-large fa-edit w3-margin-left-8"></i>
                        <span>تعديل</span>
                    </span>
                </div>
                <br />
                <div class="w3-panel w3-light-gray w3-leftbar w3-rightbar w3-border-black">
                  <?php if($agar->agar_extra->sf_extra != null): ?>
                    <?php $sf_extra = json_decode($agar->agar_extra->sf_extra); foreach ($sf_extra as $sf_extra):?>
                      <span class="w3-button w3-white w3-border w3-border-gray w3-round w3-hover-light-gray"> <?php echo $sf_extra; ?> </span>
                    <?php endforeach ; ?>
                  <?php else: ?>
                    <h3 class="">فارغ! لا توجد بيانات هنا.</h3>
                  <?php endif ; ?>
                </div>
            </div><!-- END SF -->

            <header class="w3-bar w3-section w3-large"> <!-- START HEADER -->
                <span class="w3-bar-item w3-right" style="padding-right: 0"><i class="fas fa-info-circle"></i> شروط السكن</span>
            </header><!-- END HEADER -->
            <div class="w3-bar w3-margin-bottom"> <!-- START COND -->
                <div class="w3-margin-bottom">
                    <span title="تعديل" onclick="document.getElementById('NEW_COND_FORM').style.display='block'"
                          class="w3-btn w3-text-flat-peter-black">
                          <i class="fa w3-large fa-edit w3-margin-left-8"></i>
                          <span>تعديل</span>
                    </span>
                  </div>
                <br />
                <div class="w3-panel w3-light-gray w3-leftbar w3-rightbar w3-border-black">
                  <?php if($agar->agar_extra->cond_extra != null): ?>
                    <?php $cond_extra = json_decode($agar->agar_extra->cond_extra); foreach ($cond_extra as $cond_extra):?>
                      <span class="w3-button w3-white w3-border w3-border-gray w3-round w3-hover-light-gray"> <?php echo $cond_extra; ?> </span>
                    <?php endforeach ; ?>
                  <?php else: ?>
                    <h3 class="">فارغ! لا توجد بيانات هنا.</h3>
                  <?php endif ; ?>
                </div>
            </div><!-- END COND -->

            <header class="w3-bar w3-section w3-large"> <!-- START HEADER -->
                <span class="w3-bar-item w3-right" style="padding-right: 0"><i class="fas fa-info-circle"></i> تفاصيل السعر</span>
            </header><!-- END HEADER -->
            <div class="w3-animate-zoom w3-margin-bottom w3-responsive">
                <div class="w3-margin-bottom">
                    <span title="تعديل" onclick="document.getElementById('PRICE_FORM').style.display='block'" class="w3-btn w3-text-flat-peter-black">
                      <i class="fa w3-large fa-edit w3-margin-left-8"></i>
                      <span>تعديل</span>
                    </span>
                </div>
                <table class="w3-table w3-striped">
                  <thead>
                    <tr class="brnda-card">
                        <th class="w3-center">اليوم</th>
                        <th class="w3-center">الأسبوع</th>
                        <th class="w3-center">الشهر</th>
                        <th class="w3-center">العملة</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td class="w3-center">{{ $agar->price->day }}</td>
                        <td class="w3-center">{{ $agar->price->week }}</td>
                        <td class="w3-center">{{ $agar->price->month }}</td>
                        @if($agar->price->currency == 1)
                          <td class="w3-center">جنيه</td>
                        @elseif($agar->price->currency == 2)
                          <td class="w3-center">دولار</td>
                        @endif
                    </tr>
                </tbody>
              </table>
            </div>

            <header class="w3-bar w3-section w3-large"> <!-- START HEADER -->
                <span class="w3-bar-item w3-right" style="padding-right: 0"><i class="fas fa-info-circle"></i> التقويم</span>
            </header><!-- END HEADER -->
            <div class="w3-animate-zoom w3-margin-bottom w3-responsive">
                  <div class="w3-margin-bottom">
                      <span title="إضافة" onclick="document.getElementById('CALENDAR_FORM').style.display='block'" class="w3-btn w3-text-flat-peter-black">
                        <i class="fa w3-large fa-edit w3-margin-left-8"></i>
                        <span>إضافة</span>
                      </span>
                  </div>
                    <table class="w3-table w3-striped">
                      <thead>
                        <tr class="brnda-card">
                            <th class="w3-center">من</th>
                            <th class="w3-center">إلى</th>
                            <th class="w3-center">التاريخ</th>
                            <th class="w3-center">العمليات</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($agar->calendar as $calendar)
                          <tr>
                            <td class="w3-center">{{ $calendar->start_date }}</td>
                            <td class="w3-center">{{ $calendar->end_date }}</td>
                            <td class="w3-center">{{ $calendar->created_at->diffForHumans() }}</td>
                            <td class="w3-center">
                                <div class="w3-center">
                                    <div class="w3-bar">
                                        <button type="button" onclick="document.getElementById('calendar_edit_{{$calendar->id}}').style.display='block'" class="w3-bar-item w3-btn w3-mobile"><i class="fa fa-edit"></i></button>
                                        <button type="button" onclick="document.getElementById('delete_agar_calendar_confirm_{{ $calendar->id }}').style.display='block'" class="w3-bar-item w3-btn w3-mobile"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <!-- delete calender model -->
                              <div id="delete_agar_calendar_confirm_{{ $calendar->id }}" class="w3-modal">
                                  <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:480px">
                                      <header class="w3-container brnda-card">
                                          <span onclick="document.getElementById('delete_agar_calendar_confirm_{{ $calendar->id }}').style.display='none'" class="w3-btn w3-display-topleft">&times;</span>
                                          <h4> حذف</h4>
                                      </header>
                                      <div class="w3-container">
                                          <div class="w3-section">
                                              <p><i class="fa fa-2x w3-padding fa-trash-o w3-text-flat-midnight-blue"></i><span> هل أنت متأكد من أنك تريد حذف هذا العنصر؟، هذه العملية لا يمكن التراجع عنها.</span></p>
                                          </div>
                                      </div>
                                      <footer class="w3-container ">
                                          <div class="w3-margin-top w3-margin-bottom w3-left">
                                              <form id="delete_agar_calendar_form_{{ $calendar->id }}" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post">
                                                  @csrf
                                                  <input type="hidden" name="calendar_id" value="{{ $calendar->id }}"/>
                                                  <button form="delete_agar_calendar_form_{{ $calendar->id }}" autofocus type="submit" name="delete_agar_calendar" value="موافق"
                                                      class="w3-border w3-btn brnda-card w3-ripple w3-margin-left"><i class="fa fa-check-square"></i> موافق</button>
                                                  <button type="button" onclick="document.getElementById('delete_agar_calendar_confirm_{{ $calendar->id }}').style.display='none'"
                                                       class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;"><i class="fa fa-arrow-right"></i> إلغاء</button>
                                              </form>
                                          </div>
                                      </footer>
                                  </div>
                              </div><!-- END delete_agar_confirm MODAL -->

                              <!-- Edit CALENDAR FORM data -->
                              <div id="calendar_edit_{{$calendar->id}}" class="w3-modal">
                                <!-- START CALENDAR_FORM -->
                                  <div class="w3-modal-content w3-border-bottom w3-animate-zoom" style="max-width:400px">
                                      <header class="w3-container w3-border-bottom">
                                          <h4><i class="fa fa-calendar-o"></i>التقويم</h4>
                                          <a href="javascript::void()" onclick="document.getElementById('calendar_edit_{{$calendar->id}}').style.display='none'" class="w3-btn w3-display-topleft">×</a>
                                      </header>
                                      <form id="calendar_edit_form_{{ $calendar->id }}" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post" class="w3-padding-16">
                                        @csrf
                                        <div class="w3-container">
                                          <input type="hidden" name="agar_id" value="{{ $agar->id }}">
                                          <input type="hidden" name="calendar_id" value="{{ $calendar->id }}">
                                          <div class="w3-row-padding">
                                              <div class="w3-margin-bottom w3-half">
                                                  <label for="start_date" class="w3-text-gray">من</label>
                                                  <input id="start_date"  name="start_date" class="w3-input" type="date"
                                                         placeholder="من" required value="{{ $calendar->start_date }}">
                                              </div>
                                              <div class="w3-margin-bottom w3-half">
                                                  <label for="end_date" class="w3-text-gray">إلى</label>
                                                  <input id="end_date"  name="end_date" class="w3-input" type="date"
                                                         placeholder="إلى" required value="{{ $calendar->end_date }}">
                                              </div>
                                          </div>
                                        </div>
                                        <footer class="w3-container ">
                                            <div class="w3-section w3-left">
                                                <button form="calendar_edit_form_{{ $calendar->id }}" type="submit" name="edit_calendar" value="حفظ" class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px">
                                                <i class="fa fa-save w3-margin-left-8 w3-text-gray"></i> حفظ</button>
                                                <button class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;"><a href="view_agar.php?agar_id=1" onclick="document.getElementById('CALENDAR_FORM').style.display='none'" class=""><i class="fa fa-close"></i> إلغاء</a></button>
                                            </div>
                                        </footer>
                                      </form>
                                  </div>
                              </div><!-- END Edit CALENDARFORM -->

                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- END view agar -->

    <!-- START Add Photo MODALS -->
    <div id="AGAR_IMG_FORM" class="w3-modal" style="display: none;"><!-- START AGAR_IMG_FORM -->
        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:880px">
            <div class="brnda-card">
                <header class="w3-container w3-padding brnda-card"><i class="glyphicon glyphicon-upload"></i>
                    <h6><i class="fa fa-image w3-margin-left-8"></i>صور العقار</h6>
                    <span onclick="document.getElementById('AGAR_IMG_FORM').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                </header>

                <div class="">
                    <form multiple action="{{ route('dropzone.store') }}" method="post" class="dropzone" id="image-upload" enctype="multipart/form-data">
                      @csrf
                    <div>
                        <h3> اضغط على الصندوق لتحميل صور العقار </h3>
                    </div>
                    <input type="hidden" value="{{ $agar->id }}" name="agar_id" />
                  </form>
                </div>

            </div>
        </div>
    </div><!-- END AGAR_IMG_FORM -->


    <!-- START delete_agar_confirm_ MODALS -->
    <div id="delete_agar_confirm_{{ $agar->id }}" class="w3-modal">
        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:480px">

            <header class="w3-container w3-border-bottom">
                <span onclick="document.getElementById('delete_agar_confirm_{{ $agar->id }}').style.display='none'" class="w3-btn w3-display-topleft">&times;</span>
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
                                <td>{{ $agar->created_at->diffForHumans() }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <footer class="w3-container ">
                <div class="w3-margin-top w3-margin-bottom w3-left">
                    <form id="delete_agar_calendar_form_1" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post">
                      @csrf
                      <input type="hidden" name="agar_id" value="{{ $agar->id }}"/>
                       <button  autofocus type="submit" name="delete_agar_btn"
                        class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px"><i class="fa fa-check-square-o  w3-margin-left-8  w3-text-gray"></i> موافق</button>

                        <button type="button" onclick="document.getElementById('delete_agar_calendar_confirm_1').style.display='none'"
                           class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;"><i class="fa fa-arrow-right"></i> إلغاء</button>
                    </form>
                </div>
            </footer>
        </div>
    </div><!-- END delete_agar_confirm MODAL -->
    <!-- END delete_agar_confirm_ MODALS -->


    <!-- START NEW_B_FORM -->
    <div id="NEW_B_FORM" class="w3-modal" style="display: none;"><!-- START NEW_B_FORM -->
        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:320px">
            <header class="w3-container w3-border-bottom">
                <h6><i class="fa fa-tags w3-margin-left-8"></i>المرافق الأساسية</h6>
                <span onclick="document.getElementById('NEW_B_FORM').style.display='none'" class="w3-btn w3-display-topleft">×</span>
            </header>
            <form id="b_form" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post">
              @csrf
              <div class="w3-container w3-section">
                <input type="hidden" name="agar_id" value="{{ $agar->id }}">
                @foreach($agar_b_extra as $b_extra)
                  <div class="w3-bar-block">
                    <label onclick="statusToggle(event)" for="b_extra_{{ $b_extra->id }}" class="w3-btn w3-bar-item w3-animate-color" />
                    <span class="w3-right w3-text-gray"><i class="fa fa-tag w3-margin-left w3-text-gray"></i>{{ $b_extra->name }}</span>
                    <i class="fa fa-check-circle-o w3-left w3-text-gray"></i>
                    <input id="b_extra_{{ $b_extra->id }}" name="b_extra[]" value="{{ $b_extra->name }}" class="w3-hide" type="checkbox">
                    <div class="w3-clear"></div>
                  </div>
                @endforeach
              </div>
              <footer class="w3-container">
                  <div class="w3-section w3-left">
                      <button tabindex="1" title="حفظ" form="b_form" type="submit" name="save_b" value="حفظ" class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px">
                          <i class="fa fa-save w3-margin-left-8 w3-text-gray"></i><span>حفظ</span></button>
                          <span tabindex="2" title="إلغاء" onclick="document.getElementById('NEW_B_FORM').style.display='none'" class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;">
                              <i class="fa fa-times w3-margin-left-8 "></i><span>إلغاء</span>
                          </span>
                      </span>
                  </div>
              </footer>
            </form>
        </div>
    </div><!-- END NEW_B_FORM -->


    <div id="NEW_A_FORM" class="w3-modal" style="display: none;"><!-- START NEW_A_FORM -->
        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:320px">
            <header class="w3-container w3-border-bottom">
                <h6><i class="fa fa-tags w3-margin-left-8"></i>المرافق الإضافية</h6>
                <span onclick="document.getElementById('NEW_A_FORM').style.display='none'" class="w3-btn w3-display-topleft">×</span>
            </header>
            <form id="a_form" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post">
              <div class="w3-container w3-section">
                @csrf
                <input type="hidden" name="agar_id" value="{{ $agar->id }}">
                @foreach($agar_a_extra as $a_extra)
                  <div class="w3-bar-block">
                    <label onclick="statusToggle(event)" for="a_extra_{{ $a_extra->id }}" class="w3-btn w3-bar-item w3-animate-color" />
                    <span class="w3-right w3-text-gray"><i class="fa fa-tag w3-margin-left w3-text-gray"></i>{{ $a_extra->name }}</span>
                    <i class="fa fa-check-circle-o w3-left w3-text-gray"></i>
                    <input id="a_extra_{{ $a_extra->id }}" name="a_extra[]" value="{{ $a_extra->name }}" class="w3-hide" type="checkbox">
                    <div class="w3-clear"></div>
                  </div>
                @endforeach
              </div>
              <footer class="w3-container ">
                  <div class="w3-section w3-left">
                      <button tabindex="1" title="حفظ" form="a_form" type="submit" name="save_a" value="حفظ" class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px">
                          <i class="fa fa-save w3-margin-left-8 w3-text-gray"></i><span>حفظ</span></span></button>
                      <span tabindex="2" title="إلغاء" onclick="document.getElementById('NEW_A_FORM').style.display='none'"  class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;">
                          <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                  </div>
              </footer>
            </form>
        </div>
    </div><!-- END NEW_A_FORM -->


    <div id="NEW_SF_FORM" class="w3-modal" style="display: none;"><!-- START NEW_SF_FORM -->
        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:320px">
            <header class="w3-container w3-border-bottom">
                <h6><i class="fa fa-tags w3-margin-left-8"></i>مميزات خاصة</h6>
                <span onclick="document.getElementById('NEW_SF_FORM').style.display='none'" class="w3-btn w3-display-topleft">×</span>
            </header>
            <form id="sf_form" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post">
              @csrf
              <div class="w3-container w3-section">
                <input type="hidden" name="agar_id" value="{{ $agar->id }}">
                @foreach($agar_s_extra as $s_extra)
                <div class="w3-bar-block">
                  <label onclick="statusToggle(event)" for="s_extra_{{ $s_extra->id }}" class="w3-btn w3-bar-item w3-animate-color" />
                  <span class="w3-right w3-text-gray"><i class="fa fa-tag w3-margin-left w3-text-gray"></i>{{ $s_extra->name }}</span>
                  <i class="fa fa-check-circle-o w3-left w3-text-gray"></i>
                  <input id="s_extra_{{ $s_extra->id }}" name="sf_extra[]" value="{{ $s_extra->name }}" class="w3-hide" type="checkbox">
                  <div class="w3-clear"></div>
                </div>
                @endforeach
              </div>
              <footer class="w3-container ">
                  <div class="w3-section w3-left">
                      <button tabindex="1" title="حفظ" form="sf_form" type="submit" name="save_sf" value="حفظ" class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray"  style="padding: 7px 15px">
                          <i class="fa fa-save w3-margin-left-8 w3-text-gray"></i><span>حفظ</span></span></button>

                      <span tabindex="2" title="إلغاء" onclick="document.getElementById('NEW_SF_FORM').style.display='none'"  class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;">
                          <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                  </div>
              </footer>
            </form>
        </div>
    </div><!-- END NEW_SF_FORM -->


    <div id="NEW_COND_FORM" class="w3-modal" style="display: none;"><!-- START NEW_COND_FORM -->
        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:320px">
            <header class="w3-container w3-border-bottom">
                <h6><i class="fa fa-tags w3-margin-left-8"></i>شروط السكن</h6>
                <span onclick="document.getElementById('NEW_COND_FORM').style.display='none'" class="w3-btn w3-display-topleft">×</span>
            </header>
            <form id="cond_form" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post">
              @csrf
              <div class="w3-container w3-section">
                  <input type="hidden" name="agar_id" value="{{ $agar->id }}">
                  @foreach($agar_cond as $cond)
                    <div class="w3-bar-block">
                      <label onclick="statusToggle(event)" for="cond_extra_{{ $cond->id }}" class="w3-btn w3-bar-item w3-animate-color" />
                      <span class="w3-right w3-text-gray"><i class="fa fa-tag w3-margin-left w3-text-gray"></i>{{ $cond->name }}</span>
                      <i class="fa fa-check-circle-o w3-left w3-text-gray"></i>
                      <input id="cond_extra_{{ $cond->id }}" name="cond_extra[]" value="{{ $cond->name }}" class="w3-hide" type="checkbox">
                      <div class="w3-clear"></div>
                    </div>
                  @endforeach
              </div>
              <footer class="w3-container ">
                  <div class="w3-section w3-left">
                      <button tabindex="1" title="حفظ" form="cond_form" type="submit" name="save_cond" value="حفظ" class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px">
                          <i class="fa fa-save w3-margin-left-8 w3-text-gray"></i><span>حفظ</span></span></button>
                      <span tabindex="2" title="إلغاء" onclick="document.getElementById('NEW_COND_FORM').style.display='none'"  class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;">
                          <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                  </div>
              </footer>
            </form>
        </div>
    </div><!-- END NEW_COND_FORM -->


    <div id="PRICE_FORM" class="w3-modal" style="display: none;"><!-- START PRICE_FORM -->
        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:400px">
            <header class="w3-container w3-border-bottom">
                <h4><i class="fa fa-money-bill"></i> تفاصيل السعر</h4>
                <span onclick="document.getElementById('PRICE_FORM').style.display='none'" class="w3-btn w3-display-topleft">×</span>
            </header>
            <div class="w3-container">
                <form id="price_form" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post" class="w3-padding-large">
                    @csrf
                    <input type="hidden" name="agar_id" value="{{ $agar->id }}">
                    <input type="hidden" name="price_id" value="{{ $agar->price->price_id }}">
                    <div class="w3-row">
                      <div class="w3-margin-bottom w3-third">
                        <label for="day" class="w3-text-gray">اليوم</label>
                        <input id="day"  name="day" class="w3-input" type="number"
                               placeholder="اليوم" required value="{{ $agar->price->day }}"
                               value="" class="w3-text-gray">
                      </div>
                      <div class="w3-margin-bottom w3-third">
                          <label for="week" class="w3-text-gray">الأسبوع</label>
                          <input id="week"  name="week" class="w3-input" type="text"
                                 placeholder="الأسبوع" required value="{{ $agar->price->week }}"
                                 value="" class="w3-text-gray">
                      </div>
                      <div class="w3-margin-bottom w3-third">
                          <label for="month" class="w3-text-gray">الشهر</label>
                          <input id="month"  name="month" class="w3-input" type="text"
                                 placeholder="الشهر" required value="{{ $agar->price->month }}"
                                 value="" class="w3-text-gray">
                      </div>
                    </div>
                    <div class="w3-margin-bottom">
                        <label for="currency"  class="w3-text-gray">العملة</label>
                        <select id="currency" name="currency" class="w3-input">
                            <option  value="1"  class="w3-text-gray">جنيه سوداني</option>
                            <option selected value="2"  class="w3-text-gray">دولار</option>
                        </select>
                    </div>
                </form>
            </div>
            <footer class="w3-container ">
                <div class="w3-section w3-left">
                    <button form="price_form" type="submit" name="save_price" value="حفظ" class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px">
                        <i class="fa fa-save w3-margin-left-8 w3-text-gray"></i> حفظ</button>
                    <button onclick="document.getElementById('PRICE_FORM').style.display='none'"  class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;"><i class="fa fa-close"></i> إغلاق</button>
                </div>
            </footer>
        </div>
    </div><!-- END PRICE_FORM -->


    <div id="CALENDAR_FORM" class="w3-modal" style="display: none">
      <!-- START CALENDAR_FORM -->
        <div class="w3-modal-content w3-border-bottom w3-animate-zoom" style="max-width:400px">
            <header class="w3-container w3-border-bottom">
                <h4><i class="fa fa-calendar-o"></i>التقويم</h4>
                <a href="javascript::void()" onclick="document.getElementById('CALENDAR_FORM').style.display='none'" class="w3-btn w3-display-topleft">×</a>
            </header>
            <div class="w3-container">
                <form id="calendar_form" action="{{ route('agar.dashboard',['agar_id' => $agar->id]) }}" method="post" class="w3-padding-16">
                    @csrf
                    <input type="hidden" name="agar_id" value="{{ $agar->id }}">
                    <div class="w3-row-padding">
                        <div class="w3-margin-bottom w3-half">
                            <label for="start_date" class="w3-text-gray">من</label>
                            <input id="start_date"  name="start_date" class="w3-input" type="date"
                                   placeholder="من" required value=""
                                   value="">
                        </div>
                        <div class="w3-margin-bottom w3-half">
                            <label for="end_date" class="w3-text-gray">إلى</label>
                            <input id="end_date"  name="end_date" class="w3-input" type="date"
                                   placeholder="إلى" required value=""
                                   value="">
                        </div>
                    </div>
                </form>
            </div>
            <footer class="w3-container ">
                <div class="w3-section w3-left">
                    <button form="calendar_form" type="submit" name="save_calendar" value="حفظ" class="w3-button w3-white w3-border w3-border-gray w3-round w3-text-gray w3-hover-light-gray w3-hover-text-gray" style="padding: 7px 15px">
                    <i class="fa fa-save w3-margin-left-8 w3-text-gray"></i> حفظ</button>
                    <button class="w3-button w3-border w3-hover-light-gray w3-text-gray w3-round" style="padding: 7px 15px;"><a href="javascript::void()" onclick="document.getElementById('CALENDAR_FORM').style.display='none'" class=""><i class="fa fa-close"></i> إلغاء</a></button>
                </div>
            </footer>
        </div>
    </div><!-- END CALENDAR_FORM -->



    <br>
    <!-- END MODALS -->

    <!-- Footer -->
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
    </footer>

    <!-- End page content -->
    </div>


    <script src="{{ asset('js/script.js') }}"></script>

    <!--Only these JS files are necessary-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>


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




    </body>
    </html>
