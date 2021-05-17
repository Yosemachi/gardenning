<template>
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-sm-6">
         <div class="form-group row">
           <label for="title" class="col-sm-3 col-form-label">Title</label>
           <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
         </div>
         <div class="form-group row">
           <label for="content" class="col-sm-3 col-form-label">Content</label>
           <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
         </div>
         <div class="form-group row">
           <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
           <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_change">
         </div>
         <div class="form-group row">
           <label for="img" class="col-sm-3 col-form-label">IMG</label>
           <input type="file" class="col-sm-9 form-control" @change="onFileChange">
           <button type="button" class="bg-indigo-500 text-indigo-50 p-2 rounded mb-3" @click="transform">押す</button>
           <div class="pt-3" v-if="imageData">
            <img id="img" :src="imageData" v-if="imageData">
            <canvas id="outputCanvas"></canvas>
          </div>
         </div>
         <button v-on:click="submit" class="btn btn-primary">Submit</button>
       </div>
     </div>
   </div>
</template>

<script>
import analyze from 'rgbaster';

   export default {
     data: function(){
       return {
       imageData: null,
         task: {},
       }
     },
     methods: {
      onFileChange(e){
       const files = e.target.files;
       // console.log(files);
       // const aaa = analyze(files[0]);
       // console.log(aaa);
       if(files.length > 0){
         const file = files[0];
         const reader = new FileReader();
         reader.onload = (e) => {
           this.imageData = e.target.result;
         };
         reader.readAsDataURL(file);
       }
      },
      transform(){
        const sample = analyze(document.getElementById('img'));
        console.log(sample[0].color);
        // analyze.colors(sample, {
        //   paletteSize: 30,
        //   exclude: ['rgb(0,0,0)'],
        //   success: function(payload){
        //     console.log(payload.dominant);
        //     console.log(payload.secondary);
        //     console.log(payload.palette);
        //   }
        // });
      },
      submit(){
       axios.post('/api/tasks', this.task)
       .then((res) => {
         this.$router.push({name: 'task.list'});
       });
      }
     }
   }
</script>
