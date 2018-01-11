<template>
    <div class="container-fluid">
        <div class="row no-pad-grid">
            <div class="col-md-2"  v-for="(city, index) in cities" :key="index">
                 <div class="img-wrap" :style="{ backgroundImage: 'url(' + city.img + ')' }">
                    <div class="img-description_layer">
                        <h1 class="img-description">{{city.name}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <uiv-pagination class="pull-right" v-model="currentPage" :total-page="totalPage"/>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    data () {
      return {
          totalPage: 18,
        currentPage: 1,
          cities:[
              {img:'../images/city/jakarta.jpg',name:'Jakarta'},
             {img:'../images/city/bandung.jpg',name:'Bandung'},
             {img:'../images/city/langsa.jpg',name:'Langsa'},
             {img:'../images/city/bali.jpg',name:'Bali'},
             {img:'../images/city/banda_aceh.jpg',name:'Banda Aceh'},
             {img:'../images/city/yogyakarta.jpg',name:'Yogyakarta'},
             {img:'../images/city/lhokseumawe.jpg',name:'Lhokseumawe'}
            ]
      }
    }
  }
  
</script>