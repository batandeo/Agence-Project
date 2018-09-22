<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form @submit.prevent="send">
                    <h2 class="">Inscription</h2>

                    <div class="form-group">
                        <label class="app-label">
                            <span>Nom</span>
                            <input type="text" :class="{'form-control': true, 'is-invalid': errors['lastname']}"  v-model="sign.lastname"/>
                            <span class="invalid-feedback" v-if="errors['lastname']">{{ errors['lastname'].join(',') }}</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="app-label">
                            <span>Prenom</span>
                            <input type="text" :class="{'form-control': true, 'is-invalid': errors['firstname']}" v-model="sign.firstname"/>
                            <span class="invalid-feedback" v-if="errors['firstname']">{{ errors['firstname'].join(',') }}</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="app-label">
                            <span>E-mail</span>
                            <input type="text" :class="{'form-control': true, 'is-invalid': errors['email']}" v-model="sign.email"/>
                            <span class="invalid-feedback" v-if="errors['email']">{{ errors['email'].join(',') }}</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="app-label">
                            <span>Nom d'utilisateur</span>
                            <input type="text" :class="{'form-control': true, 'is-invalid': errors['username']}" v-model="sign.username"/>
                            <span class="invalid-feedback" v-if="errors['username']">{{ errors['username'].join(',') }}</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="app-label">
                            <span>Mot de pass</span>
                            <input type="text" :class="{'form-control': true, 'is-invalid': errors['password']}" v-model="sign.password"/>
                            <span class="invalid-feedback" v-if="errors['password']">{{ errors['password'].join(',') }}</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="app-label">
                            <span>Confirmation de mot de pass</span>
                            <input type="text" :class="{'form-control': true, 'is-invalid': errors['password_confirmation']}" v-model="sign.password_confirmation"/>
                            <span class="invalid-feedback" v-if="errors['password_confirmation']">{{ errors['password_confirmation'].join(',') }}</span>
                        </label>
                    </div>
                    <br/>
                    <button class="btn btn-primary">S'inscrire</button>
                    <div class="form-muted-box">
                        <p class="form-muted-box__text">Vous possédez déjà un compte ? </p>
                        <button class="form-muted-box__link" data-to="signup">se connecter</button>
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
                sign: {
                    lastname: "",
                    firstname: "",
                    email: "",
                    username: "",
                    password: "",
                    password_confirmation: "",
                }
            }
        },
        methods: {
            async send(){
                try{
                    const url = "/api/users/signup";
                    const res = await axios.post(url, this.sign);

                    if(res.data.status) window.location.reload();
                }catch(err){
                    this.errors = handleError(err);
                }
            }
        }
    }
</script>