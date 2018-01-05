<template>
    <main>  
        <section class="view-carousel hidden-sm hidden-xs">
            <uiv-carousel :indicators="adv.indicators" :controls="adv.controls" :interval="adv.interval" ref="carousel">
                <uiv-slide v-for="(slide, index) in adv.slides" :key="index">
                    <div class="img-holder">
                        <img :src="slide.img">
                    </div>
                </uiv-slide>
            </uiv-carousel>
        </section>
        <section class="container-fluid">
            <h1 class="text-center"> {{ loc.name }}</h1>
            <p>{{loc.description}}</p>
        </section>
        <section class="container-fluid">
            <h2>Attraction in Bali</h2>
            <div class="row no-pad-grid information-below">
                <div class="col-md-2" v-for="(attract, index) in loc.attractions" :key="index">
                    <div class="img-wrap" :style="{ backgroundImage: 'url(' + attract.img + ')' }">
                        <div class="img-description_layer">
                            <h1 class="img-description">{{attract.name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid">
            <h2>Recent Event or Festival in Bali</h2>
            <div class="row no-pad-grid information-below">
                <div class="col-md-2" v-for="(event, index) in loc.events" :key="index">
                    <div class="img-wrap" :style="{ backgroundImage: 'url(' + event.img + ')' }">
                        <div class="img-description_layer">
                            <h1 class="img-description">{{event.name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid">
            <button class="btn btn-border-cyan">Add to Schedule</button>
        </section>
        <section class="container-fluid">
            Rate and Comment
        </section>
    </main>
</template>
<script>
  export default {
    data () {
      return {
          adv:{
            interval: 5000,
            indicators: false,
            controls: true,
            slides: [
                {img:'./images/location/bali/1.jpg'},
                {img:'./images/location/bali/2.jpg'},
                {img:'./images/location/bali/3.jpg'}
            ]
        },
        loc:{
            name:'Bali',
            description:'Bali is an Indonesian island known for its forested volcanic mountains, iconic rice paddies, beaches and coral reefs. The island is home to religious sites such as cliffside Uluwatu Temple. To the south, the beachside city of Kuta has lively bars, while Seminyak, Sanur and Nusa Dua are popular resort towns. The island is also known for its yoga and meditation retreats.',
            attractions:[{
                name:'Attraction 1',img:'./images/app_logo.png',description:''
            }],
            events:[{
                name:'Event 1',img:'./images/app_logo.png',description:''  
            }]
        }
      }
    }
  }
  </script>