<template>
    <div class="w3-row-padding">
      <br>
      <formfilter
          :agarType="agarType"
          :agarFloor="agarFloor"
          :agar_b_extra="agar_b_extra"
          :agar_a_extra="agar_a_extra"
          :agar_s_extra="agar_s_extra"
          :agar_cond="agar_cond"
          @new="pushResult"/>
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
          },
          agar_b_extra: {
            type: Array,
          },
          agar_a_extra: {
            type: Array,
          },
          agar_s_extra: {
            type: Array,
          },
          agar_cond: {
            type: Array,
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
