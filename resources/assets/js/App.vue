<template>
    <div id="app">
        <header>
            <nav id="nav-head" class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>  
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Branding Image -->
                        <div class="navbar-brand">
                            <a href="/"><img :src="'./images/app_head_logo.png'" alt="logo"></a>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            <router-link tag="li" to="/">
                                <a>Home</a>
                            </router-link>
                            <router-link tag="li" to="/destination">
                                <a>Destination</a>
                            </router-link>
                            <router-link tag="li" to="/tips">
                                <a>Tips & Tricks</a>
                            </router-link>
                                <li class="dropdown" v-if="'(Auth::check())'">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        {{ user.name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="logout"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="logout" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <router-view></router-view>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                showNavbar: false,
                user: {
                    name: '',
                    email: ''
                }
            }
        },
        mounted()
        {
            this.getProfile();
        },
        methods: {
            getProfile()
            {
                axios.get('/').then(response => {
                    console.log(response.data)
                    this.user = response.data.user;
                });
            },
        }
    }
</script>