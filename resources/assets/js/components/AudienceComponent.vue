<template xmlns="">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="app-title-wrapper">
                <div class="client-pannel">
                    <h2> Enregistrement des Audiences</h2>
                </div>
            </div>
        </div>

        <form action="" @submit.prevent="addAudience" method="post">
            <div class="row mybloc">

                <!--<div class="col-2">
                    <label>Nom de L'audience</label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"  v-model="libelle" placeholder="">
                </div>-->
                <div class="col-2">
                    <label>Date de L'audience </label>
                </div>
                <div class="col-4">
                    <input type="date" v-model="dateaudiance" class="mydate"/>
                </div>

                <div class="col-2">
                    <label>Date de renvoie </label>
                </div>
                <div class="col-4">
                    <input type="date" v-model="daterenvoie" class="mydate"/>
                </div>
                <div class="col-2">
                    <label>Résumé de L'audience </label>
                </div>
                <div class="col-4">
                    <textarea v-model="resumeaudiance"></textarea>
                </div>
                <div class="col-2">
                    <label>Choix du client </label>
                </div>
                <div class="col-4">
                    <select class="custom-select"  v-model="client_id" v-if="clients && clients.length">
                        <option v-for="client in clients" :value="client.id">
                            {{client.nom }} {{client.prenom }}
                        </option>
                    </select>
                </div>
                <div class="col-2">
                    <label>Choix de la catégorie</label>
                </div>
                <div class="col-4">
                    <select class="custom-select"  v-model="categorie_id" v-if="categories && categories.length">
                        <option v-for="categorie in categories" :value="categorie.id">
                            {{categorie.libelle}}
                        </option>
                    </select>
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
                <th>Nom du Client</th>
                <th>Date de l'audience</th>
                <th>Date de renvoie</th>
                <th>Résumé de l'audience</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="listeaudiance in listeaudiances">
                <td>{{listeaudiance.client.nom }} {{listeaudiance.client.prenom }}</td>
                <td>{{listeaudiance.dateaudiance}}</td>
                <td>{{listeaudiance.daterenvoie}}</td>
                <td>{{listeaudiance.resumeaudiance}}</td>
                <td>
                    <button @click="editer(listeaudiance)">
                        <i class="ion ion-ios-compose-outline"></i>
                        modifier
                    </button>
                    <button type="submit" @click="dell(listeaudiance.id)">
                        <i class="ion ion-ios-trash-outline"></i>
                        supprimer
                    </button>
                    <button type="submit">
                        <i class="ion ion-ios-printer-outline"></i>
                        imprimer
                    </button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Nom du Client</th>
                <th>Date de l'audience</th>
                <th>Date de renvoie</th>
                <th>Résumé de l'audience</th>
                <th>Action</th>
            </tr>

            </tfoot>
        </table>
    </div>

</template>

<script>
    import Vue from 'vue'

    export default {
        data() {
            return {
                id: null,
//                libelle: null,
                dateaudiance: null,
                daterenvoie: null,
                resumeaudiance: null,
                categorie_id: null,
                client_id: null,
                listeaudiances: null,
                listeaudiance: null,
                clients: [],
                categories: null,
                categorie: null,
                client: null
            }
        },
        mounted() {
            axios
                .get('http://web.api/api/show_categorie')
                .then(response => (this.categories = response.data)),
                axios
                    .get('http://web.api/api/liste_clients')
                    .then(response => (this.clients = response.data)),
                axios
                    .get('http://web.api/api/show_horaire')
                    .then(response => (this.horaires = response.data))
            axios
                .get('http://web.api/api/show_audiance')
                .then(response => (this.listeaudiances = response.data))
        },

        methods: {
            editer(audiance) {
                this.id = audiance.id
                this.daterenvoie = audiance.daterenvoie,
                    this.dateaudiance = audiance.dateaudiance,
                    this.client_id = audiance.client_id,
                    this.categorie_id = audiance.categorie_id,
                    this.resumeaudiance = audiance.resumeaudiance

            },
            dell(audiance_id) {
                if(confirm("Veuillez confirmer la suppresion de l'audiance")){
                    axios.delete('http://web.api/api/destroy_audiance/'+audiance_id).then(() => {
                        this.listeaudiances = this.listeaudiances.filter((audiance) => audiance.id !== audiance_id)
                    })
                }
            },
            addAudience() {

                /*console.log(this.id)*/

                if (this.id) {

                    if(!this.errors){
                        //console.log('cc')
                        axios.post('http://web.api/api/update_audiance', {
                            id: this.id,
                            dateaudiance: this.dateaudiance,
                            resumeaudiance: this.resumeaudiance,
                            client_id: this.client_id,
                            categorie_id: this.categorie_id,
                            daterenvoie: this.daterenvoie
                        }).then((response) => {
                            this.listeaudiances = this.listeaudiances.map((audiance) => {
                                if(audiance.id == this.id) {
                                    return response.data
                                }
                                else {
                                    return audiance
                                }
                            })
                            console.log(response.data);
                            Vue.toast('Audiance modifié!', {
                                id: 'my-toast',
                                className: ['toast-warning'],
                                horizontalPosition: 'center',
                                verticalPosition: 'top',
                                duration: 12000,
                                mode: 'queue',
                                transition: 'slide-right'
                            });
                        });
                        this.dateaudiance = null;
                        this.daterenvoie = null;
                        this.client_id = null;
                        this.categorie_id = null;
                        this.resumeaudiance = null
                    }
                    else {
                        Vue.toast('Veuillez vérifier les données modifiées!', {
                            id: 'my-toast',
                            className: ['toast-warning'],
                            horizontalPosition: 'center',
                            verticalPosition: 'top',
                            duration: 12000,
                            mode: 'queue',
                            transition: 'slide-right'
                        });
                    }

                }
                else {
                    console.log('ccn')
                    if (this.daterenvoie && this.dateaudiance && this.client_id && this.categorie_id && this.resumeaudiance && !this.id ) {
                        axios.post('http://web.api/api/store_audiance', {
                            daterenvoie: this.daterenvoie,
                            dateaudiance: this.dateaudiance,
                            client_id: this.client_id,
                            categorie_id: this.categorie_id,
                            resumeaudiance: this.resumeaudiance
                        }).then((response) => {
                            this.listeaudiances.push(response.data);
                            console.log(this.listeaudiances);
                            console.log(response.data);
                            Vue.toast('Audiance enrégistré!', {
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
                        this.dateaudiance = null;
                        this.daterenvoie = null;
                        this.client_id = null;
                        this.categorie_id = null;
                        this.resumeaudiance = null;
                        /*this.afficher = true;*/

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

<style lang="css">
    @import url("/public/css/firsttable.css");
    @import url("/public/css/secondettable.css");
    @import url("/public/css/mystyle.css");

</style>
