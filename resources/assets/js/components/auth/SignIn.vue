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
                    <div class="form-group">
                        <label class="app-label">
                            Mot de pass
                            <input type="password" :class="{'form-control': true, 'is-invalid': errors['password']}" v-model="login.password" />
                            <span class="invalid-feedback" v-if="errors['password']">{{ errors['password'].join(',') }}</span>
                        </label>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <div class="checkbox">
                                    <label class="mb-0">
                                        <input type="checkbox" v-model="login.remember">
                                        <span>Se souvenir de moi</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-link" href="#" data-to="reset">Mot de pass oublié?</a>
                        </div>
                    </div>
                    <br/>
                    <button class="btn btn-primary d-block">Se connecter</button>
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
                    password: "",
                    remember: "",
                }
            }
        },
        methods: {
            async send(){
                try{
                    const url = "/login";
                    const res = await axios.post(url, this.login);

                    if(res.data.length) window.location.reload();
                }catch(err){
                    this.errors = handleError(err);
                }
            }
        }
    }
</script>