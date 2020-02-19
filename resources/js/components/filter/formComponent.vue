<template>
  <section>
    <!-- filter header for web screen -->
    <div class="container w3-card w3-padding filter-header filter-header-web">
      <form class="form-inline">
        <div class="form-group mb-2">
          <select name="type_id" v-model=type_id class="form-control">
            <option v-for="type in agarType" @change="filter()"  :value="type.type_id"> {{ type.type_name }} </option>
          </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <select name="floor_id" v-model="floor_id" class="form-control">
              <option v-for="floor in agarFloor" @change="filter()" :value="floor.floor_id"> {{ floor.floor_name }} </option>
          </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <p> تاريخ الحجز <date-picker v-model="range" range @change="filter()" lang="en" type="date" formate="YYYY-MM-dd"></date-picker> </p>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <p>عدد الغرف <input type="number" @change="filter()" class="form-control" v-model="rooms_number" name="rooms_number" /> </p>
        </div>
        <!--<div class="form-group mx-sm-3 mb-2">
          <p> عدد الحمامات <input type="number" @change="filter()" class="form-control" v-model="bathroms_number" name="bathroms_number" style="width: 50px!important" /> </p>
        </div> -->
      </form>
    </div>

    <!-- filter header for mobile screen -->
    <section class="w3-card w3-padding filter-header filter-header-mobile" style="margin-bottom: 50px;">
      <div class="container">
        <form class="">
          <div class="form-group filter-header-mobile-datepicker">
            <p> تاريخ الحجز <date-picker v-model="range" range @change="filter()" lang="en" type="date" formate="YYYY-MM-dd"></date-picker> </p>
          </div>
          <div class="form-group open-slider-btn">
            <a href="javascript::void()" id="openNav" class="w3-button w3-black w3-xlarge" onclick="open_filter()"> <i class="fa fa-sliders"></i> </a>
          </div>
        </form>
      </div>
    </section>

    <br>

    <!-- sidebar for web screen -->
    <div class="w3-third filter_web_sidebar">
      <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            سعر الايجار لليوم الواحد
            <vue-slider  @change="filter()"
              v-model="price"
              :min="0"
              :max="400"
              :interval="1" >
            </vue-slider>
          </li>
        </ul>
      </div> <br>

      <div class="card" style="width: 18rem;">
        <div class="card-header">
          الخصائص
        </div>
        <ul class="list-group list-group-flush ">
          <li class="list-group-item">
            <h4> المزايا الاضافية </h4>
            <div>
              <span> انترنت </span>
              <input value="انترنت" @change="filter()"   v-model="a_extra" type="checkbox" class="" />
            </div>
            <div>
              <span> غسالة </span>
              <input value="غسالة" @change="filter()"  v-model="a_extra" type="checkbox" class="" />
            </div>
            <div>
              <span> مصعد </span>
              <input value="مصعد" @change="filter()"  v-model="a_extra" type="checkbox" class="" />
            </div>
          </li>
          <li class="list-group-item">
            <h4> مزايا خاصة </h4>
            <div>
              <span> حراسة امنية </span>
              <input value="حراسة امنية" v-model="sf_extra" type="checkbox" class="" />
            </div>
            <div>
              <span> توصيل من المطار </span>
              <input value="توصيل من المطار" v-model="sf_extra" type="checkbox" class="" />
            </div>
            <div>
              <span> امكانية الاستلام على مدار اليوم </span>
              <input value="امكانية الاستلام على مدار اليو" v-model="sf_extra" type="checkbox" class="" />
            </div>
          </li>
        </ul>
      </div>
      <br>
      <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            العملة
            <select name="currency" class="form-control" >
              <option value="sdg"> SDG </option>
              <option value="usd"> USD </option>
            </select>
          </li>
        </ul>
      </div>
      <br>
      <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <button type="button" @click="filter()" name="search_btn" class="w3-button w3-black">بحث</button>
          </li>
        </ul>
      </div>
    </div>

    <!-- sidebar for mobile screen -->
    <div class="w3-sidebar w3-animate-left" id="filter_sidebar" style="display: none">
      <a href="javascript::void()" class="w3-button w3-large"
      onclick="close_filter()"> <i class="fa fa-times w3-large w3-hover-none w3-text-black"></i> </a>
      <div class="">
        <div class="card" >
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              سعر الايجار لليوم الواحد
              <vue-slider  @change="filter()"
                v-model="price"
                :min="0"
                :max="400"
                :interval="1" >
              </vue-slider>
            </li>
          </ul>
        </div>
        </form>
        <br>
        <div class="card">
          <div class="card-header">
            الخصائص
          </div>
          <ul class="list-group list-group-flush ">
            <li class="list-group-item">
              <h4> المزايا الاضافية </h4>
              <div>
                <span> انترنت </span>
                <input type="checkbox" value="انترنت" v-model="a_extra" class="" />
              </div>
              <div>
                <span> غسالة </span>
                <input type="checkbox" value="غسالة" v-model="a_extra" class="" />
              </div>
              <div>
                <span> مصعد </span>
                <input type="checkbox" value="مصعد" v-model="a_extra" class="" />
              </div>
            </li>
            <li class="list-group-item">
              <h4> مزايا خاصة </h4>
              <div>
                <span> حراسة امنية </span>
                <input type="checkbox" value=" حراسة امني" v-model="sf_extra" class="" />
              </div>
              <div>
                <span> توصيل من المطار </span>
                <input type="checkbox" value="توصيل من المطا" v-model="sf_extra" class="" />
              </div>
              <div>
                <span> امكانية الاستلام على مدار اليوم </span>
                <input type="checkbox" value="امكانية الاستلام على مدار اليو" v-model="sf_extra" class="" />
              </div>
            </li>
          </ul>
        </div>
        <br>
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <span>عدد الغرف</span>
              <input type="number" @change="filter()" class="form-control" v-model="rooms_number" name="rooms_number" >
              <span>عدد الحمامات</span>
              <input type="number" @change="filter()" v-model="bathroms_number" name="bathroms_number" class="form-control" >
            </li>
          </ul>
        </div>
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <span>نوع العقار</span>
              <select name="type_id" v-model=type_id class="form-control">
                <option v-for="type in agarType" @change="filter()"  :value="type.type_id"> {{ type.type_name }} </option>
              </select>
              <span>الطابق</span>
              <select name="floor_id" v-model="floor_id" class="form-control">
                  <option v-for="floor in agarFloor" @change="filter()" :value="floor.floor_id"> {{ floor.floor_name }} </option>
              </select>
            </li>
          </ul>
        </div>
        <br>
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              العملة
              <select name="currency" class="form-control" >
                <option value="sdg"> SDG </option>
                <option value="usd"> USD </option>
              </select>
            </li>
          </ul>
        </div>
        <br>
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <button type="submit" name="search_btn" class="w3-button w3-black">بحث</button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

</template>

<script>
  // to import datepicker component
  import DatePicker from 'vue2-datepicker';
  import 'vue2-datepicker/index.css';
  // to import slider component
  import VueSlider from 'vue-slider-component';
  import 'vue-slider-component/theme/antd.css';

	export default{
    components: { DatePicker ,VueSlider },
    props:{
      agarType: {
          type: Array,
          default: []
      },
      agarFloor: {
        type: Array,
        default: []
      }
    },
		data(){
			return{
        date: '',
        range: '',
        rooms_number: Number,
        bathrooms_number: Number,
        floor_id: Number,
        type_id: Number,
        date: '',
				price: 0,
        a_extra: [],
        sf_extra: []
			}
		},
		methods:{
      filter(){
  			axios.post('agars/filter',{
          rooms_number: this.rooms_number,
          bathrooms_number: this.bathrooms_number,
          floor_id: this.floor_id,
          type_id: this.type_id,
          range: this.range,
          price: this.price,
          a_extra: this.a_extra,
          sf_extra: this.sf_extra,
          _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }).then((response) => {
            this.$emit('new', response.data);
        });
  		}
    }
	}
</script>
