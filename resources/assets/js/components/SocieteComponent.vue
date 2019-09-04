<template xmlns="">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="app-title-wrapper">
                <div class="client-pannel">
                    <h2> Enregistrement des sociétés </h2>
                </div>
            </div>
        </div>

        <form action="" @submit.prevent="addEmploye" method="post">
            <div class="row mybloc">
                <div class="col-2">
                    <label>Nom </label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"  v-model="nom" placeholder="">
                    <span v-if="errors.nom" class="error_title">{{errors.nom[0]}}</span>
                </div>

                <div class="col-2">
                    <label>Logo </label>
                </div>
                <div class="col-4">
                    <input type="file" class="form-control" @change="imagechanged">
                </div>

                <div class="col-2">
                    <label>Site web </label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" v-model="siteweb" placeholder="coller le lien">
                    <span v-if="errors.siteweb" class="error">{{errors.siteweb[0]}}</span>
                </div>


                <div class="col-2">
                    <label>email </label>
                </div>
                <div class="col-4">
                    <input type="text" v-model="email" class="form-control" placeholder="">
                    <span v-if="errors.email" class="error">{{errors.email[0]}}</span>
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
                <th>Logo</th>
                <th>Email</th>
                <th>Site web</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="listesociete in listesocietes">
                <td>{{listesociete.nom}}</td>
                <td>{{listesociete.logo}}</td>
                <td>{{listesociete.email}}</td>
                <td>{{listesociete.siteweb}}</td>

                <td>
                    <button @click="editer(listesociete)">
                        <i class="ion ion-ios-compose-outline"></i>
                        modifier
                    </button>
                    <button type="submit" @click="dell(listesociete.id)">
                        <i class="ion ion-ios-trash-outline"></i>
                        supprimer
                    </button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Nom</th>
                <th>Logo</th>
                <th>Email</th>
                <th>Site web</th>
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
                societe:{
                    logo:''
                },
                affichmodal: true,
                listesocietes: null,
                listesociete: null,
                nom: null,
                email: null,
                logo:null,
                siteweb:null,
                id:null,
                errors: []
            }
        },
        mounted() {
            axios
                .get('http://127.0.0.1/api/index')
                .then(response => (this.listesocietes = response.data))
        },

        methods: {
            imagechanged(e){
                console.log(e.target.files[0])
                var  filereader = new  FileReader()
                filereader.readAsDataURL(e.target.files[0])
                filereader.onload = (e)=>{
                    this.societe.logo = e.target.result
                }
            },

            editer(societe) {

                console.log(societe.datecreation)
                this.id = societe.id
                this.nom = societe.nom,
                    this.email = societe.email,
                    this.logo = societe.logo,
                    this.siteweb = societe.siteweb
            },
            dell(societe_id) {
                if(confirm("Veuillez confirmer la suppresion de la société")){
                    axios.delete('http://127.0.0.1/api/destroy_soc/'+societe_id).then(() => {
                        this.listesocietes = this.listesocietes.filter((societe) => societe.id !== societe_id)
                    })
                    console.log(societe_id)
                }
            },

            addEmploye() {
                /*console.log(this.id)*/
                if (this.id) {
                    //console.log('cc')
                    axios.post('http://127.0.0.1/api/update_soc', {
                        id: this.id,
                        nom: this.nom,
                        logo: this.logo,
                        email: this.email,
                        siteweb: this.siteweb
                    }).then((response) => {
                        this.listesocietes = this.listesocietes.map((societe) => {
                            if(societe.id == this.id) {
                                return response.data
                            }
                            else {
                                return societe
                            }
                        })
                        console.log(response.data);
                        Vue.toast('societé modifié!', {
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
                    this.tel = null;
                    this.email = null;
                    this.logo = null;
                    this.siteweb=null;
                }

                else {
                    console.log('ccn')
                    if (this.nom != null && !this.id ) {
                        axios.post('http://127.0.0.1/api/store_soc', {
                            nom: this.nom,
                            email: this.email,
                            logo: this.logo,
                            siteweb : this.siteweb
                        }).then((response) => {
                            this.listesocietes.push(response.data);
                            console.log(this.listesocietes);
                            console.log(response.data);
                            Vue.toast('Société enrégistrée!', {
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
                        this.tel = null;
                        this.email = null;
                        this.logo = null;
                        this.siteweb = null

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

