<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
    <header class="w3-container w3-border-bottom">
        <h4><i class="fa fa-home"></i> نموذج عقار</h4>
        <a href="agar.php" class="w3-btn w3-display-topleft">&times;</a>
    </header>
    <div class="">
        <form id="agar" action="{{ route('agars.add') }}" method="post" enctype="multipart/form-data" class="w3-padding-large">
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
</div>
