<template>
  <div>
    <div>
      <ul>
        <!-- <input type="text" class="" value="" v-model="plant.plant_name"> -->
        <!-- <input type="hidden" value="1" v-model="plant.user_id"> -->
        <button v-on:click="save" class="btn btn-primary">登録</button>
      </ul>
      <ul v-for="(plant, index) in plants" :key="index">
        <div>{{ index }}</div>
        <div>{{ plant.plant_name }}</div>
      </ul>
    </div>
    plant index
  </div>
</template>

<script>
   export default {
     data: function(){
       return {
         plants: []
       }
     },
     methods: {
       getPlants(){
         axios.get('/api/plant/index')
          .then((res) => {
            this.plants = res.data;
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
