<template>
    <main>
        <nav class="navbar">
            <div class="container-fluid">
                <form class="navbar-left">
                    <div class="btn-group" role="group" aria-label="navigation">
                        <router-link :to="'city'" class="btn btn-cyan">City</router-link>
                        <router-link :to="'favorite'" class="btn btn-cyan">Favorite</router-link>
                        <router-link :to="'rating'" class="btn btn-cyan">Rating</router-link>
                        <router-link :to="'event'" class="btn btn-cyan">Event</router-link>
                    </div>
                </form>
                <form class="navbar-right">
                    <span class="glyphicon glyphicon-search"></span>
                    <input type="text" placeholder="Search location or event" class="form-control" role="Search">
                </form>
            </div>
        </nav>
        <router-view></router-view>
    </main>
</template>