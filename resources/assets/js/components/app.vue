<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{info}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
        return {
            info: null
    }
    },
    mounted() {
                /*console.log('Component mounted.')
                  axios
                      .get('http://web.api/api/show-rdv')
                      .then(response => (this.info = response))
                      */
                      axios
                        .get('http://web.api/api/show-rdv')
                        .then(response => (this.info = response.data))
                  }
            };
            
</script>
