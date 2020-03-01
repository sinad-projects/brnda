<template>
  <div>
    <div class="w3-section">
      <label for="start_date">تاريخ الوصول</label>
      <date-picker v-model="start_date"  lang="en" type="date" formate="YYYY-MM-dd" style="width: 100%"></date-picker>
    </div>
    <div class="w3-section">
      <label for="end_date">تاريخ المغادرة</label>
      <date-picker v-model="end_date"  lang="en" type="date" formate="YYYY-MM-dd" style="width: 100%"></date-picker>
    </div>


    <div class="w3-section">
        <button form="booking_form" type="button" @click="sent()" id="request_booking" name="request_booking" value="" class="w3-btn w3-block w3-brnda">
            <i class="fa fa-calendar"></i> طلب الحجز</button>
    </div>
  </div>
</template>

<script>
  // to import datepicker component
  import DatePicker from 'vue2-datepicker';
  import 'vue2-datepicker/index.css';
  import 'vue2-datepicker/locale/zh-cn';

	export default{
    components: { DatePicker },
    props:{
      agar_id: {
        require: true,
        type: Number
      },
      owner_id: {
        require: true,
        type: Number
      }
    },
    data(){
			return{
        start_date: '',
        end_date: ''
			}
		},
    methods: {
      sent(){
        axios.post('/reservation/add',{
          reciver_id: this.owner_id,
          start_date: this.start_date,
          end_date: this.end_date,
          agar_id: this.agar_id,
          _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }).then((response) => {
          if(response.data.code == 200){
              document.getElementById('reservation_success').style.display = 'block';
          }
          else document.getElementById('reservation_error').style.display = 'block';

        });
      }
    }
	}
</script>
