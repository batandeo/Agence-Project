<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="send">
                    <div class="form-group">
                        <label class="app-label">
                            <span>E-mail</span>
                            <input type="email" :class="{'form-control': true, 'is-invalid': errors['email']}" v-model="login.email" />
                            <span class="invalid-feedback" v-if="errors['email']">{{ errors['email'].join(',') }}</span>
                        </label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary d-block">Envoyer</button>
                    </div>
                    <br/>
                    <div class="text-center">
                        <a href="#" data-to="signin" class="text-muted">Revenir à la page de connexion</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                errors: [],
                login: {
                    email: "",
                }
            }
        },
        methods: {
            async send(){
                try{
                    const url = "/password/email";
                    const res = await axios.post(url, this.login);

                    if(res.data.status) window.location.reload();
                }catch(err){
                    this.errors = handleError(err);
                }
            }
        }
    }
</script>