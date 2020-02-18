<template>
    <div class="w3-row-padding">
      <br>
      <formfilter :agarType="agarType" :agarFloor="agarFloor" @new="pushResult"/>
      <agars :agars="agars"/>
    </div>
</template>

<script>
    import formfilter from './formComponent';
    import agars from './agarsComponent';

    export default {
        props:{
          agarType: {
            type: Array
          },
          agarFloor: {
            type: Array
          }
        },
        data() {
            return {
                agars: {
                    type: [],
                    required: true
                }
            }
        },
        mounted() {
            axios.get('/agars/json')
            .then((response) => {
                this.agars = response.data;
            });

        },
        methods: {
            pushResult(result) {
              console.log(result)
              this.agars = result;
            }
        },
        components: {agars , formfilter}
    }
</script>
