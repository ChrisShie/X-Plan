<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-20 col-sm-12 col-xs-12" v-for="(rate, index) in rates">
                <div class="card">
                    <div class="img-wrapper" :style="{ backgroundImage: 'url(' + rate.img + ')' }">
                    </div>
                    <div class="card-text">
                        <h3>{{rate.title}}</h3>
                        <p>{{rate.detail}}</p>
                        <a href=""><span>Read more <span class="glyphicon glyphicon-arrow-right"></span></span></a>
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
        rates:[
            {img:'./images/location/lake_toba.jpg',title:'Lake Toba', detail:'Lake Toba is one of the awesome natural wonders of the world. This enormous crater lake has...'},
            {img:'./images/location/flores_island.jpg',title:'Flores Island', detail:'Lying to the east of Sumbawa and to the west of Lembata in Nusa Tenggara, the long island...'},
            {img:'./images/location/bali.jpg',title:'Bali', detail:'The varied landscape, rugged coastlines, tropical beaches, lush rice terraces and volcanic hillsides all...'},
            {img:'./images/location/torajaland.jpg',title:'Tana Toraja', detail:'Torajaland (Tana Toraja) is a highland region of South Sulawesi, home of the Toraja people...'},
            {img:'./images/location/raja_ampat.jpg',title:'Raja Ampat', detail:'Located off the northwest tip of the island of New Guinea, Raja Ampat (the Four Kings) is...'}
        ]
      }
    }
  }
  </script>