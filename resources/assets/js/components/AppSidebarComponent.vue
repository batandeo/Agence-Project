<template>
    <div class="app-sidebar">
        <div class="app-sidebar-top">
            <a href="/" class="app-sidebar-top__name">{{ appname }}</a>
            <a href="#" class="app-sidebar-top__icon"><i class="ion ion-navicon"></i></a>
        </div>
        <ul class="app-sidebar-menu bloccolor">

            <li class="app-sidebar-menu__item">
                <router-link class="app-sidebar-menu__link" :to="{name: 'societe'}">
                    <i class="ion ion ion-android-cloud-outline"></i>
                    <span class="app-sidebar-menu__name">Sociétés</span>
                </router-link>
            </li>

            <li class="app-sidebar-menu__item">
                <router-link class="app-sidebar-menu__link" :to="{name: 'employe'}">
                    <i class="ion ion-android-people"></i>
                    <span class="app-sidebar-menu__name">Employés</span>
                </router-link>
            </li>

        </ul>

    </div>
</template>

<script>
    export default {
        props: {
            appname: {
                type: String
            }
        },
        data(){
            return{}
        },
        methods: {
            openPlaylistDrawer(e){
                $(e.target).toggleClass('router-link-active');
                $('#playlist-drawer').toggleClass('is-open');
            }
        }
    }
</script>