<template>
    <div>
        <div class="mn-content">
            <app-header></app-header>
            <main class="mn-inner container">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <app-sidebar></app-sidebar>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <router-view></router-view>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
    import Header from './layouts/Header'
    import Sidebar from './layouts/Sidebar'

    export default {
        name: "App",
        components: {
            'app-header': Header,
            'app-sidebar': Sidebar
        }
    }
</script>

<style>
    @import "../assets/css/materialize.min.css";
    @import "https://fonts.googleapis.com/icon?family=Material+Icons";
    @import "../assets/css/alpha.min.css";
</style>
