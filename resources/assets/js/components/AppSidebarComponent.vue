<template>
    <div class="app-sidebar">
        <div class="app-sidebar-top">
            <a href="/" class="app-sidebar-top__name">{{ appname }}</a>
            <a href="#" class="app-sidebar-top__icon"><i class="ion ion-navicon"></i></a>
        </div>
        <ul class="app-sidebar-menu bloccolor">
            <li class="app-sidebar-menu__item">
                <router-link class="app-sidebar-menu__link" :to="{name: 'client'}">
                    <i class="ion ion-ios-people"></i>
                    <span class="app-sidebar-menu__name">Clients</span>
                </router-link>
            </li>

            <li class="app-sidebar-menu__item">
                <router-link class="app-sidebar-menu__link" :to="{name: 'rdv'}">
                    <i class="ion ion ion-android-cloud-outline"></i>
                    <span class="app-sidebar-menu__name">Rdv</span>
                </router-link>
            </li>

            <li class="app-sidebar-menu__item">
                <router-link class="app-sidebar-menu__link" :to="{name: 'audiances'}">
                    <i class="ion ion-android-attach"></i>
                    <span class="app-sidebar-menu__name">Audiances</span>
                </router-link>
            </li>

            <li class="app-sidebar-menu__item">
                <router-link class="app-sidebar-menu__link" :to="{name: 'employe'}">
                    <i class="ion ion-android-people"></i>
                    <span class="app-sidebar-menu__name">Employés</span>
                </router-link>
            </li>

            <li class="app-sidebar-menu__item">
                <router-link class="app-sidebar-menu__link" :to="{name: 'imprimer'}">
                    <i class="ion ion-android-print"></i>
                    <span class="app-sidebar-menu__name">Imprimer</span>
                </router-link>
            </li>

            <li class="app-sidebar-menu__item">
                <router-link class="app-sidebar-menu__link" :to="{name: 'administration'}">
                    <i class="ion ion-android-options"></i>
                    <span class="app-sidebar-menu__name">Administration</span>
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