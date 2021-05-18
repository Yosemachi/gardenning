<template>
  <div>
    <div>
      <ul>
        <input type="text" class="" value="" v-model="plants.plant_name">
        <input type="hidden" value="1" v-model="plants.user_id">
        <button v-on:click="save" class="btn btn-primary">登録</button>
      </ul>
    </div>
    plant index
  </div>
</template>

<script>
   export default {
     data: function(){
       return {
         tasks: []
       }
     },
     methods: {
       getPlants(){
         axios.get('/api/plant/index')
          .then((res) => {
            this.plant = res.data;
          });
       },
       save(){
         axios.post('/api/plant/save', this.plants)
         .then((res) => {
           this.$router.push({name: 'plant.index'});
         });
       }
     },
     mounted(){
       this.getPlants();
     }
   }
</script>
