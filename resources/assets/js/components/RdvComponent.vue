<template xmlns="">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="app-title-wrapper">
                <div class="client-pannel">
                    <h2> Enregistrement des Rdv</h2>
                </div>
            </div>
        </div>

        <form action="" @submit.prevent="addRdv" method="post">
            <div class="row mybloc">
                <div class="col-2">
                    <label>Heure de rdv </label>
                </div>
                <div class="col-4">
                    <select class="custom-select" v-model="horaire" v-if="horaires && horaires.length">
                        <option v-for="horaire in horaires">
                            {{horaire}}
                        </option>
                    </select>
                </div>
                <div class="col-2">
                    <label>Date de rdv </label>
                </div>
                <div class="col-4">
                    <input type="date" v-model="daterdv" class="mydate"/>
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
                   <!-- <v-suggest :data="clients" show-field="nom" v-model="client_id" class="form-control"></v-suggest>-->
                </div>
                <div class="col-2">
                    <label>Choix du Maître</label>
                </div>
                <div class="col-4">
                    <select class="custom-select"  v-model="dirigeant_id" v-if="dirigeants && dirigeants.length">
                        <option v-for="dirigeant in dirigeants" :value="dirigeant.id">
                            {{dirigeant.libelle}}
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
                <th>Heure du rdv</th>
                <th>Date du rdv</th>
                <th>Nom du Client</th>
                <th>Nom du Maître</th>
                <th>Etat du rdv</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="listerdv in listerdvs">
                <td>{{listerdv.horaire}}</td>
                <td>{{listerdv.daterdv}}</td>
                <td>{{listerdv.client.nom }} {{listerdv.client.prenom }}</td>
                <td>{{listerdv.dirigeant.libelle}}</td>
                <td v-if="listerdv.todaydate"><strong class="todaydate">se tiendra aujourd'hui</strong></td>
                <td v-if="listerdv.pastdate"><strong class="pastdate">Déjà effectué</strong></td>
                <td v-if="listerdv.futuredate"><strong class="futuredate">En cours</strong></td>
                <td>
                    <button @click="editer(listerdv)">
                        <i class="ion ion-ios-compose-outline"></i>
                        modifier
                    </button>
                    <button type="submit" @click="dell(listerdv.id)">
                        <i class="ion ion-ios-trash-outline"></i>
                        supprimer
                    </button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Heure du rdv</th>
                <th>Date du rdv</th>
                <th>Nom du Client</th>
                <th>Nom du Maître</th>
                <th>Etat du rdv</th>
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
                horaires: null,
                horaire: null,
                daterdv: null,
                client_id: null,
                nom:null,
                prenom: null,
                dirigeant_id: null,
                listerdvs: null,
                listerdv: null,
                dirigeants: null,
                clients:null,
                id: null,
                afficher:false,
                client: null,
                todaydate: false,
                pastdate: false,
                futuredate: false

            }
        },
        mounted() {
            axios
                .get('http://web.api/api/liste_dirigeants')
                .then(response => (this.dirigeants = response.data)),
                axios
                    .get('http://web.api/api/liste_clients')
                    .then(response => (
                        this.clients = response.data

                    )),
                axios
                    .get('http://web.api/api/show_horaire')
                    .then(response => (this.horaires = response.data)),
            axios
                .get('http://web.api/api/show_rdv')
                .then(response => (this.listerdvs = response.data))
        },

        methods: {
            editer(rdv) {
                /*console.log(this.listeclients)*/
                this.id = rdv.id
                this.horaire = rdv.horaire,
                    this.daterdv = rdv.daterdv,
                    this.client_id = rdv.client_id,
                    this.dirigeant_id = rdv.dirigeant_id
            },
            dell(rdv_id) {
                if(confirm("Veuillez confirmer la suppresion du rdv")){
                    axios.delete('http://web.api/api/destroy_rdv/'+rdv_id).then(() => {
                        this.listerdvs = this.listerdvs.filter((rdv) => rdv.id !== rdv_id)
                    })
                    console.log(rdv_id)
                }
            },

            addRdv() {

                /*console.log(this.id)*/

                if (this.id) {
                    if(!this.errors){
                        //console.log('cc')
                        axios.post('http://web.api/api/update_rdv', {
                            id: this.id,
                            horaire: this.horaire,
                            daterdv: this.daterdv,
                            client_id: this.client_id,
                            dirigeant_id: this.dirigeant_id
                        }).then((response) => {
                            this.listerdvs = this.listerdvs.map((rdv) => {
                                if(rdv.id == this.id) {
                                    return response.data
                                }
                                else {
                                    return rdv
                                }
                            })
                            console.log(response.data);
                            Vue.toast('Rdv modifié!', {
                                id: 'my-toast',
                                className: ['toast-warning'],
                                horizontalPosition: 'center',
                                verticalPosition: 'top',
                                duration: 12000,
                                mode: 'queue',
                                transition: 'slide-right'
                            });
                        });
                        this.horaire = null;
                        this.daterdv = null;
                        this.client_id = null;
                        this.dirigeant_id = null;
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
               /*     let client = this.clients.filter((client) => {
                        return client.nom == this.client_nom
                    })

                    console.log(client)
                    console.log(client[0].id)*/
                    if (this.horaire && this.daterdv && this.client_id && this.dirigeant_id && !this.id ) {
                        axios.post('http://web.api/api/store_rdv', {
                            horaire: this.horaire,
                            daterdv: this.daterdv,
                            client_id: this.client_id,
                            dirigeant_id: this.dirigeant_id,


                        }).then((response) => {
                            this.listerdvs.push(response.data);
                            console.log(this.listeclients);
                            console.log(response.data);
                            Vue.toast('Rdv enrégistré!', {
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
                        this.horaire = null;
                        this.daterdv = null;
                        this.client_id = null;
                        this.dirigeant_id = null;
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

<!--<style lang="css">-->
    <!--@import url("/public/css/firsttable.css");-->
    <!--@import url("/public/css/secondettable.css");-->
    <!--@import url("/public/css/mystyle.css");-->
<!--</style>-->
