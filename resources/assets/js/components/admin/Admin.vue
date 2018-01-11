<template>
    <main class="admin">
        <div class="container-fluid wrapper">
            <aside>
                <nav class="sidebar" :class="{ active: toggleSidebar}">
                    <ul class="list-unstyled components">
                        <li><router-link :to="'cities'">Cities</router-link></li>
                        <li><router-link :to="'destinations'" >Destinations</router-link></li>
                        <li><router-link :to="'events'" >Events</router-link></li>
                        <li><router-link :to="'articles'" >Articles</router-link></li>
                    </ul>
                    <p class="footer">Powered by X-Plan</p>
                </nav>
            </aside>
            <section class="admin-content container-fluid">
                <router-view></router-view>
            </section>
        </div>
    </main>
</template>
<script>
  export default {
    data () {
      return {
        sidebarState:'cities',
        toggleSidebar:false,
        totalPage: 18,
        currentPage: 1
      }
    }
  }
  </script>