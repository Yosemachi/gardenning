<template>
  <div>
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
            this.plants = res.data;
          });
       }
     },
     mounted(){
       this.getPlants();
     }
   }
</script>
