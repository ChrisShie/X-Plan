<template>
    <div class="container-fluid wrapper">
        <aside>
            <nav class="sidebar" :class="{ active: toggleSidebar}">
                <ul class="list-unstyled components">
                    <li :class="{ active: sidebarState == 'all'}"><a>All</a></li>
                    <li :class="{ active: sidebarState == 'rate'}"><a>Rating</a></li>
                    <li :class="{ active: sidebarState == 'popular'}"><a>Popular</a></li>
                    <li :class="{ active: sidebarState == 'new'}"><a>Latest</a></li>
                    <li :class="{ active: sidebarState == 'near'}">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Nearest</a>
                        <div class="collapse list-unstyled" id="homeSubmenu">
                            <select name="city" id="city">
                                <option value="-"></option>
                            </select>
                            <a class="btn btn-default">Filter</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>
        <section class="content">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn visible-sm visible-xs" v-on:click="toggleSidebar=!toggleSidebar">
                <i class="glyphicon glyphicon-align-left"></i>
            </button>
            <div>
                <article class="row record" v-for="(event, index) in events">
                    <div class="col-md-3">
                        <div class="img-wrapper" :style="{ backgroundImage: 'url(' + event.img + ')' }">
                        </div>
                    </div>
                    <div class="col-md-9 record-text">
                        <h1>{{event.title}}</h1>
                        <p class="text-muted">{{event.date | moment("dddd, MMMM Do YYYY")}} - {{event.location}}</p>
                        <p>{{event.description}}</p>
                        <a href=""><span>Read more <span class="glyphicon glyphicon-arrow-right"></span></span></a>
                    </div>
                </article>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <uiv-pagination class="pull-right" v-model="currentPage" :total-page="totalPage"/>
                </div>
            </div>
        </section>
        
    </div>
</template>
<script>
  export default {
    data () {
      return {
          sidebarState:'all',
        toggleSidebar:false,
        totalPage: 18,
        currentPage: 1,
        events:[
            {title:'Indonesia Menari',img:'./images/events/Indonesia_Menari.jpg',date:new Date(),location:'Jakarta',description:'Indonesia Dancing is a joint dance movement to bring Jakarta people back to life with traditional Indonesian dance by packing Indonesian dances in a modern and fun concept for young people, held every three weeks in November...'},
            {title:'Bali Spirit Festival',img:'./images/events/Bali_Spirit_Festival.jpg',date:new Date(),location:'Bali',description:'Bali Spirit Festival 2018 will see its 11th annual running this April 2-8, once again gathering like-minded yoga instructors and practitioners of all different levels from Bali and around the world. The festival is...'},
            {title:'Bau Nyale Festival',img:'./images/events/Bau_Nyale_Festival.jpg',date:new Date(),location:'Lombok',description:'The island of Lombok in the West Nusa Tenggara Province will once again celebrate the age-old tradition of Bau Nyale, a folk festival that celebrates the annual appearance of the Nyale sea worms when hordes of people flock...'},
            {title:'Lovely December Tana Toraja',img:'./images/events/Lovely_December.jpg',date:new Date(),location:'Tana Toraja',description:'Lovely Toraja or Lovely December is an annual program featuring various potentials of Toraja art and culture in the form of cultural arts attractions. In addition, this event also features Coffee & International...'},
            {title:'Lake Toba Festival',img:'./images/events/Lake_Toba_Festival.jpg',date:new Date(),location:'Lake Toba',description:'From Medan, the capital of North Sumatra, it is a 5 hour drive to the much cooler town of Balige (800 m above sea level) on beautiful Danau (Lake) Toba. We are invited for the Festival Danau Toba...'}
        ]
      }
    }
  }
  </script>