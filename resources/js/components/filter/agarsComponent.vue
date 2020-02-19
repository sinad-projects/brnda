<template>
  <div id="main">
    <div class="w3-third agars-body">
      <div v-for="agar in agars" :id="`carousel_${agar.id}`" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <span style="display: none">{{ counter = 0 }}</span>
          <div v-if="counter == 0" v-for="image in agar.image" class="carousel-item active">
            <img class="d-block w-100" :src="`agar/images/${image.thumbnail}`" height="200px" alt="صورة العقار">
            <span style="display: none">{{ counter = counter + 1 }}</span>
          </div>
          <div v-else v-for="image in agar.image" class="carousel-item">
            <img class="d-block w-100" :src="`agar/images/${image.thumbnail}`" height="200px" alt="صورة العقار">
          </div>
        </div>
        <a class="carousel-control-prev" :href="`#carousel_${agar.id}`" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" :href="`#carousel_${agar.id}`" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> <br>
      </div><br>
    </div>
    <div class="w3-third agars-body" dir="rtl">
        <div v-for="agar in agars">
         <div>
           <a :href="`agars/${agar.id}`"><h4> {{ agar.agar_name }} </h4></a>
             <p>الخرطوم - السودان - امدرمان</p>
         </div>
         <div><p> <span>{{ agar.rooms_number }} غرف</span> و <span>{{ agar.bathrooms_number }} حمامات</span> </p></div>
         <div><p>ابتداءا من  : {{ agar.price.day }} $ / لليوم</p></div>
         <hr>
        </div><br>
    </div>

  </div>
</template>

<script>
	export default{
    props: {
      agars: {
        type: Array,
        default: []
      }
    },
    date() {
      return{
        counter: 0
      }
    }

	}
</script>
