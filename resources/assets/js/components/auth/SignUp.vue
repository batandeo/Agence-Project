<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="send">
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
                            <input type="password" :class="{'form-control': true, 'is-invalid': errors['password']}" v-model="sign.password"/>
                            <span class="invalid-feedback" v-if="errors['password']">{{ errors['password'].join(',') }}</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="app-label">
                            <span>Confirmation de mot de pass</span>
                            <input type="password" :class="{'form-control': true, 'is-invalid': errors['password_confirmation']}" v-model="sign.password_confirmation"/>
                            <span class="invalid-feedback" v-if="errors['password_confirmation']">{{ errors['password_confirmation'].join(',') }}</span>
                        </label>
                    </div>
                    <br/>
                    <button class="btn btn-primary">S'inscrire</button>
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
                    const url = "/register";
                    const res = await axios.post(url, this.sign);

                    if(res.data.length) window.location.reload();
                }catch(err){
                    this.errors = handleError(err);
                }
            }
        }
    }
</script>