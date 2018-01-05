<template>
    <main>
        <section id="home-adv" class="hidden-sm hidden-xs">
            <uiv-carousel :indicators="adv.indicators" :controls="adv.controls" :interval="adv.interval" ref="carousel">
                <uiv-slide v-for="(slide, index) in adv.slides" :key="index">
                    <div class="img-holder">
                        <img :src="slide.img">
                    </div>
                    <div class="carousel-caption">
                        <h3>{{slide.title}}</h3>
                    </div>
                </uiv-slide>
            </uiv-carousel>
        </section>
        <section id="home-login" class="container-fluid text-center">
            <h2><strong><i>Find out</i></strong> amazing destination and <strong><i>Schedule</i></strong> your travelling plan to Indonesia</h2>
            <h4>Login for better trip planning experience here</h4>
            <a class="btn btn-orangered with-arrow" href="login">Login <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
            <p>Don't have an account ? Register new account <a href="register">here</a></p>
        </section>
        <section id="home-fav-des" class="container-fluid">
            <h1>Favorite Destinations</h1>
            <div class="row">
                <div class="col-20 col-sm-12 col-xs-12" v-for="(fav, index) in favs">
                    <div class="card">
                        <div class="img-wrapper" :style="{ backgroundImage: 'url(' + fav.img + ')' }">
                        </div>
                        <div class="card-text">
                            <h3>{{fav.title}}</h3>
                            <p>{{fav.detail}}</p>
                            <router-link :to="'/location/'+fav.id">Read more <span class="glyphicon glyphicon-arrow-right"></span></router-link>
                            <!--<a href=""><span>Read more <span class="glyphicon glyphicon-arrow-right"></span></span></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="home-about" class="container-fluid">
            <h1 class="text-center">About Indonesia</h1>
            <article class="row">
                <div class="col-md-4">
                    <img :src="'./images/timezone.png'" alt="Timezones">
                </div>
                <div class="col-md-8">
                    <h2>Timezones</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <strong>GMT +7 | Western Indonesia Time</strong>
                                </br>
                                Covering Sumatra, Java, Madura, West Kalimantan, Central Kalimantan
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <strong>GMT +8 | Central Indonesia Time</strong>
                                </br>
                                Covering East and South Kalimantan, Sulawesi, Bali, Nusa Tenggara
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <strong>GMT +9 | Eastern Indonesia Time</strong>
                                </br>
                                Covering Maluku and Irian Jaya
                            </p>
                        </div>
                    </div>
                </div>
            </article>
            <article class="row">
                <div class="col-md-10">
                    <h2>Climate</h2>
                    <p>Being a tropical country, Indonesia is blessed with two seasons, named dry and rainy, with temperatures ranging between 21 and 33 degrees Centigrade.</br>Dry usually occurs from June to September and the rainfall is heaviest between November to February.</p>
                </div>
                <div class="col-md-2">
                    <img :src="'./images/climate.png'" alt="Climate">
                </div>
            </article>
            <article class="row">
                <div class="col-md-2">
                    <img :src="'./images/currency.png'" alt="Currency">
                </div>
                <div class="col-md-10">
                    <h2>Currency & Money Exchange</h2>
                    <p>The Rupiah is the currency used in Indonesia.</br>There are many places available to exchange your money.</p> 
                </div>
            </article>
            <article class="row">
                <div class="col-md-10">
                    <h2>Language</h2>
                    <p>The official language of Indonesia is "Bahasa Indonesia". There are also several hundred local languages, such as Javanese or Papuan languages. Most Indonesians speak their ethnic language as their mother tongue as well as the official language of Bahasa Indonesia.</p> 
                </div>
                <div class="col-md-2">
                    <img :src="'./images/language.png'" alt="Language">
                </div>
            </article>
            <article class="row">
                <div class="col-md-2">
                    <img :src="'./images/transport.png'" alt="Transportation">
                </div>
                <div class="col-md-10">
                    <h2>Transportation</h2>
                    <p>The most common modes of transportation in Indonesia include ferries and other ships, as well as a wide range of road vehicles, with limited railway services, and extensive commercial aviation services.</p> 
                </div>
            </article>
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
            {title: 'Explore Indonesia’s natural wonders',img:'./images/nature.jpg'},
            {title: 'Many delicious culinaries are waiting for you',img:'./images/culinary.jpg'},
            {title: 'Fresh your mind in this wonderful country "Indonesia"',img:'./images/leisure.jpg'},
            {title: 'Various art and culture',img:'./images/art.jpg'},
            {title: 'Don’t miss out on experiencing amazing adventures',img:'./images/adventure.jpg'}
            ]
        },
        favs:[
            {id:1,img:'./images/location/bali.jpg',title:'Bali', detail:'The varied landscape, rugged coastlines, tropical beaches, lush rice terraces and volcanic hillsides all...'},
            {id:2,img:'./images/location/lake_toba.jpg',title:'Lake Toba', detail:'Lake Toba is one of the awesome natural wonders of the world. This enormous crater lake has...'},
            {id:3,img:'./images/location/flores_island.jpg',title:'Flores Island', detail:'Lying to the east of Sumbawa and to the west of Lembata in Nusa Tenggara, the long island...'},
            {id:4,img:'./images/location/torajaland.jpg',title:'Tana Toraja', detail:'Torajaland (Tana Toraja) is a highland region of South Sulawesi, home of the Toraja people...'},
            {id:5,img:'./images/location/raja_ampat.jpg',title:'Raja Ampat', detail:'Located off the northwest tip of the island of New Guinea, Raja Ampat (the Four Kings) is...'}
        ]
      }
    }
  }
  </script>