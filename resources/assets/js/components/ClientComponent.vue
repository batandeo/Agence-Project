<template xmlns="">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="app-title-wrapper">
                <div class="client-pannel">
                    <h2> Enregistrement des Clients </h2>
                </div>
            </div>
        </div>

        <form action="" @submit.prevent="addClient" method="post">
            <div class="row mybloc">
                <div class="col-2">
                    <label>Nom </label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"  v-model="nom" placeholder="">
                    <span v-if="errors.nom" class="error_title">{{errors.nom[0]}}</span>
                </div>
                <div class="col-2">
                    <label>Prénom </label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" v-model="prenom" placeholder="">
                    <span v-if="errors.prenom" class="error">{{errors.prenom[0]}}</span>
                </div>

                <div class="col-2">
                    <label>Sexe </label>
                </div>
                <div class="col-4">
                    <select class="custom-select" v-model="sexe" v-if="sexes && sexes.length">
                        <option v-for="sexe in sexes">
                            {{sexe}}
                        </option>
                    </select>
                    <span v-if="errors.sexe" class="error">{{errors.sexe[0]}}</span>
                </div>
                <div class="col-2">
                    <label>Contact </label>
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" v-model.number="contact" placeholder="">
                    <span v-if="errors.contact" class="error">{{errors.contact[0]}}</span>
                </div>

                <div class="col-2">
                    <label>email </label>
                </div>
                <div class="col-4">
                    <input type="text" v-model="mail" class="form-control" placeholder="">
                    <span v-if="errors.mail" class="error">{{errors.mail[0]}}</span>
                </div>

                <div class="col-2">
                    <label>Choix du dirigeant </label>
                </div>
                <div class="col-4">
                    <select class="custom-select"  v-model="dirigeant_id" v-if="dirigeants && dirigeants.length">
                        <option v-for="dirigeant in dirigeants" :value="dirigeant.id">
                            {{dirigeant.libelle}}
                        </option>
                    </select>
                    <!--<v-suggest v-if="dirigeants.length>0" :data="dirigeants" show-field="dirigeants.libelle" v-model="dirigeant_id"></v-suggest>-->
                    <span v-if="errors.dirigeant_id" class="error">{{errors.dirigeant_id[0]}}</span>
                </div>
                <div class="col-2">
                    <label>Date de création </label>
                </div>
                <div class="col-4">
                    <input type="date" v-model="datecreation" class="mydate"/>
                </div>

                <div class="col-4">
                    <button type="submit">
                        Enregistrer
                        <i class="ion  ion-ios-plus-outline"></i>
                    </button>
                </div>
            </div>
        </form>


        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>contact</th>
                <th>Email</th>
                <th>Dirigeants</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="listeclient in listeclients">
                <td>{{listeclient.nom}} {{listeclient.prenom}}</td>
                <td>{{listeclient.datecreation}}</td>
                <td>{{listeclient.contact}}</td>
                <td>{{listeclient.mail}}</td>
                <td >{{listeclient.dirigeant.libelle}}</td>
                <td>
                    <button @click="editer(listeclient)">
                        <i class="ion ion-ios-compose-outline"></i>
                        modifier
                    </button>
                    <button type="submit" @click="dell(listeclient.id)">
                        <i class="ion ion-ios-trash-outline"></i>
                        supprimer
                    </button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>contact</th>
                <th>Email</th>
                <th>Dirigeants</th>
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
                sexes: null,
                listeclients: null,
                listeclient: null,
                nom: null,
                prenom: null,
                sexe: null,
                contact: null,
                mail: null,
                dirigeants:null,
                dirigeant:null,
                dirigeant_id:null,
                libelle: null,
                id:null,
                errors: [],
                datecreation:null

            }
        },
        mounted() {
            axios
                .get('http://web.api/api/show_sexe')
                .then(response => (this.sexes = response.data)),
                axios
                    .get('http://web.api/api/liste_dirigeants')
                    .then(response => (this.dirigeants = response.data)),
                axios
                    .get('http://web.api/api/show')
                    .then(response => (this.listeclients = response.data))
        },

        methods: {
            editer(client) {

               console.log(client.datecreation)
                this.id = client.id
                this.nom = client.nom,
                    this.prenom = client.prenom,
                    this.sexe = client.sexe,
                    this.contact = client.contact,
                    this.mail = client.mail,
                   this.datecreation = client.datecreation,
                    this.dirigeant_id=client.dirigeant_id
            },
            dell(client_id) {
                if(confirm("Veuillez confirmer la suppresion du client")){
                    axios.delete('http://web.api/api/destroy_cli/'+client_id).then(() => {
                        this.listeclients = this.listeclients.filter((client) => client.id !== client_id)
                    })
                    console.log(client_id)
                }
            },

            addClient() {
                /*console.log(this.id)*/
                if (this.id) {
                        //console.log('cc')
                        axios.post('http://web.api/api/update', {
                            id: this.id,
                            nom: this.nom,
                            prenom: this.prenom,
                            sexe: this.sexe,
                            contact: this.contact,
                            mail: this.mail,
                            dirigeant_id:this.dirigeant_id,
                            datecreation: this.datecreation
                        }).then((response) => {
                            this.listeclients = this.listeclients.map((client) => {
                                if(client.id == this.id) {
                                    return response.data
                                }
                                else {
                                    return client
                                }
                            })
                            console.log(response.data);
                            Vue.toast('Client modifié!', {
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
                        this.sexe = null;
                        this.contact = null;
                        this.mail = null;
                        this.dirigeant_id=null;
                    this.datecreation = null
                    }

                else {
                    console.log('ccn')
                    if (this.nom != null && this.prenom != null && this.sexe != null && this.contact != null && !this.id ) {
                        axios.post('http://web.api/api/store', {
                            //client_id: this.client_id,
                            //this.listeclients.push()
                            nom: this.nom,
                            prenom: this.prenom,
                            sexe: this.sexe,
                            contact: this.contact,
                            mail: this.mail,
                            dirigeant_id: this.dirigeant_id,
                            datecreation : this.datecreation
                        }).then((response) => {
                            this.listeclients.push(response.data);
                            console.log(this.listeclients);
                            console.log(response.data);
                            Vue.toast('Client enrégistré!', {
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
                        this.sexe = null;
                        this.contact = null;
                        this.mail = null;
                        this.dirigeant_id = null;
                        this.datecreation = null

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
