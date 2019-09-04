<template xmlns="">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="app-title-wrapper">
                <div class="client-pannel">
                    <h2> Enregistrement des Employe </h2>
                </div>
            </div>
        </div>

        <form action="" @submit.prevent="addEmploye" method="post">
            <div class="row mybloc">
                <div class="col-2">
                    <label>Prénom </label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"  v-model="prenom" placeholder="">
                    <span v-if="errors.prenom" class="error_title">{{errors.prenom[0]}}</span>
                </div>
                <div class="col-2">
                    <label>Nom </label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" v-model="nom" placeholder="">
                    <span v-if="errors.nom" class="error">{{errors.nom[0]}}</span>
                </div>

                <div class="col-2">
                    <label>Contact </label>
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" v-model.number="tel" placeholder="">
                    <span v-if="errors.tel" class="error">{{errors.tel[0]}}</span>
                </div>

                <div class="col-2">
                    <label>email </label>
                </div>
                <div class="col-4">
                    <input type="text" v-model="email" class="form-control" placeholder="">
                    <span v-if="errors.email" class="error">{{errors.email[0]}}</span>
                </div>

                <div class="col-2">
                    <label>Choix de la société </label>
                </div>
                <div class="col-4">
                    <select class="custom-select"  v-model="societe_id" v-if="societes && societes.length">
                        <option v-for="societe in societes" :value="societe.id">
                            {{societe.nom}}
                        </option>
                    </select>
                    <!--<v-suggest v-if="dirigeants.length>0" :data="dirigeants" show-field="dirigeants.libelle" v-model="dirigeant_id"></v-suggest>-->
                    <span v-if="errors.societe_id" class="error">{{errors.societe_id[0]}}</span>
                </div>

                <div class="col-4">
                    <button type="submit">
                        Enregistrer
                        <i class="ion  ion-ios-plus-outline"></i>
                    </button>
                </div>
            </div>
        </form>


        <table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 20px;">
            <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Tel</th>
                <th>Email</th>
                <th>Sociétés</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="listeemploye in listeemployes">
                <td>{{listeemploye.prenom}}</td>
                <td>{{listeemploye.nom}}</td>
                <td>{{listeemploye.tel}}</td>
                <td>{{listeemploye.email}}</td>
                <td >{{listeemploye.societe.nom}}</td>
                <td>
                    <button @click="editer(listeemploye)">
                        <i class="ion ion-ios-compose-outline"></i>
                        modifier
                    </button>
                    <button type="submit" @click="dell(listeemploye.id)">
                        <i class="ion ion-ios-trash-outline"></i>
                        supprimer
                    </button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Tel</th>
                <th>Email</th>
                <th>Sociétés</th>
                <th>Action</th>
            </tr>

            </tfoot>
        </table>
    </div>

</template>

<script>
    import Vue from 'vue'
    /* import jQuery from 'jQuery'*/
    export default {
        data() {
            return {
                affichmodal: true,
                listeemployes: null,
                listeemploye: null,
                nom: null,
                prenom: null,
                tel: null,
                email: null,
                employes:null,
                employe:null,
                employe_id:null,
                societes:null,
                societe_id:null,
                societe:null,
                id:null,
                errors: [],

            }
        },
        mounted() {
            axios
                .get('http://127.0.0.1/api/liste_societe')
                .then(response => (this.societes = response.data)),
                axios
                    .get('http://127.0.0.1/api/show_emp')
                    .then(response => (this.listeemployes = response.data))
        },

        methods: {
            editer(employe) {

                this.id = employe.id
                this.nom = employe.nom,
                    this.prenom = employe.prenom,
                    this.tel = employe.tel,
                    this.email = employe.email,
                    this.societe_id=employe.societe_id
            },
            dell(employe_id) {
                if(confirm("Veuillez confirmer la suppresion de l'employé")){
                    axios.delete('http://127.0.0.1/api/destroy_emp/'+employe_id).then(() => {
                        this.listeemployes = this.listeemployes.filter((employe) => employe.id !== employe_id)
                    })
                    console.log(employe_id)
                }
            },

            addEmploye() {
                /*console.log(this.id)*/
                if (this.id) {
                    //console.log('cc')
                    axios.post('http://127.0.0.1/api/update_emp', {
                        id: this.id,
                        nom: this.nom,
                        prenom: this.prenom,
                        tel: this.tel,
                        email: this.email,
                        societe_id:this.societe_id
                    }).then((response) => {
                        this.listeemployes = this.listeemployes.map((employe) => {
                            if(employe.id == this.id) {
                                return response.data
                            }
                            else {
                                return employe
                            }
                        })
                        console.log(response.data);
                        Vue.toast('Employe modifié!', {
                            id: 'my-toast',
                            className: ['toast-warning'],
                            horizontalPosition: 'center',
                            verticalPosition: 'top',
                            duration: 12000,
                            mode: 'queue',
                            transition: 'slide-right'
                        });
                    });
                    this.nom = null;
                    this.prenom = null;
                    this.tel = null;
                    this.email = null;
                    this.societe_id=null;
                }

                else {
                    console.log('ccn')
                    if (this.nom != null && this.prenom != null  && this.tel != null && !this.id ) {
                        axios.post('http://127.0.0.1/api/store', {
                            nom: this.nom,
                            prenom: this.prenom,
                            tel: this.tel,
                            email: this.email,
                            societe_id: this.societe_id,
                        }).then((response) => {
                            this.listeemployes.push(response.data);
                            console.log(this.listeemployes);
                            console.log(response.data);
                            Vue.toast('Employe enrégistré!', {
                                id: 'my-toast',
                                className: ['toast-warning'],
                                horizontalPosition: 'center',
                                verticalPosition: 'top',
                                duration: 12000,
                                mode: 'queue',
                                transition: 'slide-right'
                            });

                        }).catch(error => {

                            if(error.response.status== 422) {
                                this.errors = error.response.data.errors
                            }
                        })
                        this.nom = null;
                        this.prenom = null;

                    } else {
                        Vue.toast('Vueillez remplir tous les champs!', {
                            id: 'my-toast',
                            className: ['et-alert'],
                            horizontalPosition: 'center',
                            verticalPosition: 'top',
                            duration: 3000,
                            mode: 'queue',
                            transition: 'slide-right'
                        });
                    }

                }


            }
        }
    }

</script>

<!--<style lang="css">-->
<!--@import url("/public/css/firsttable.css");-->
<!--@import url("/public/css/secondettable.css");-->
<!--@import url("/public/css/mystyle.css");-->

<!--</style>-->
