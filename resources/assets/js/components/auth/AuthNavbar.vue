<template>
    <div>
        <auth-switch :modal="modal"></auth-switch>
        <ul class="app-content-top-list">
            <li class="app-content-top-list__item"><a class="app-content-top-list__link" href="#" @click="authModal('signin')">M'inscrire</a></li>
            <li class="app-content-top-list__item"><a class="app-content-top-list__link" href="#" @click="authModal('signup')">Me connecter</a></li>
        </ul>
    </div>
</template>

<script>
    import AuthSwitch from "./AuthSwitch.vue";

    export default {
        components: { AuthSwitch },
        data(){
            return{
                modal: false,
            }
        },
        methods: {
            authModal(type){
                console.log(type);
                this.modal = true;
            }
        }
    }
</script>