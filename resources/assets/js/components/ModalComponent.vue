<template>
    <div class="app-modal" :class="{'is-show': this.toggle, 'has-overlay': this.overlay, 'app-modal--large': size === 'large'}">
        <div class="app-modal__box">
            <div class="app-modal__loader"></div>
            <button class="app-modal__close" @click.prevent="close"><i class="ion ion-close"></i></button>
            <div class="app-modal__container">
                <slot name="container"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            toggle: { type: Boolean, default: false },
            overlay: { type: Boolean, default: false },
            size:{ type: String }
        },
        computed: {
            cls(){

            }
        },
        methods: {
            close(){
                this.$emit('close');
            }
        }
    }
</script>