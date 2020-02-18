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
          <p>تاريخ الحجز <input type="date" @change="filter()" v-model="date" name="date" id="datepicker"></p>
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <p>عدد الغرف <input type="number" @change="filter()" class="form-control" v-model="rooms_number" name="rooms_number" /> </p>
        </div>
        <button type="button" @click="filter()" class="w3-button w3-black" name="search_btn"> <i class="fa fa-search"></i> بحث </button>
      </form>
    </div>

    <!-- filter header for mobile screen -->
    <section class="w3-card w3-padding filter-header filter-header-mobile" style="margin-bottom: 50px;">
      <div class="container">
        <form class="">
          <div class="form-group filter-header-mobile-datepicker">
            <p>تاريخ الحجز <input type="text" id="datepicker_mobile"></p>
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
            <input type="number" @change="filter()" class="form-control" name="price" v-model="price" />
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
              <input value="انترنت"  v-model="a_extra" type="checkbox" class="" />
            </div>
            <div>
              <span> غسالة </span>
              <input value="غسالة" v-model="a_extra" type="checkbox" class="" />
            </div>
            <div>
              <span> مصعد </span>
              <input value="مصعد" v-model="a_extra" type="checkbox" class="" />
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
              <input type="text" id="price_mobile_range" class="js-range-slider" name="my_range" value=""/>
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
                <input type="checkbox" class="" />
              </div>
              <div>
                <span> غسالة </span>
                <input type="checkbox" class="" />
              </div>
              <div>
                <span> مصعد </span>
                <input type="checkbox" class="" />
              </div>
            </li>
            <li class="list-group-item">
              <h4> مزايا خاصة </h4>
              <div>
                <span> حراسة امنية </span>
                <input type="checkbox" class="" />
              </div>
              <div>
                <span> توصيل من المطار </span>
                <input type="checkbox" class="" />
              </div>
              <div>
                <span> امكانية الاستلام على مدار اليوم </span>
                <input type="checkbox" class="" />
              </div>
            </li>
          </ul>
        </div>
        <br>
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <span>عدد الغرف</span>
              <input type="number" name="rooms_number" class="form-control" >
              <span>عدد الحمامات</span>
              <input type="number" name="bathroms_number" class="form-control" >
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
	export default{
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
        rooms_number: Number,
        bathrooms_number: Number,
        floor_id: Number,
        type_id: Number,
        date: '',
				price: '',
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
          date: this.date,
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
