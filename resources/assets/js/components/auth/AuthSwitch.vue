<template>
    <modal :toggle="modal" :overlay="modalOverlay">
        <div slot="container" class="auth-switch">
            <ul class="auth-switch-nav">
                <li class="auth-switch-nav__item auth-switch-nav__item-selected">
                    <a href="#" class="auth-switch-nav__link" data-to="signin">Me connecter</a>
                </li>
                <li class="auth-switch-nav__item">
                    <a href="#" class="auth-switch-nav__link" data-to="signup">M'inscrire</a>
                </li>
            </ul>
            <div class="auth-switch-main">
                <div class="auth-switch-main__item auth-switch-main__item--selected" data-view="signin">
                    <sign-in></sign-in>
                </div>
                <div class="auth-switch-main__item" data-view="signup">
                    <sign-up></sign-up>
                </div>
                <div class="auth-switch-main__item" data-view="reset">
                    <reset-password></reset-password>
                </div>
            </div>
        </div>
    </modal>
</template>
<script>
    import Modal from '../ModalComponent.vue';
    import SignIn from './SignIn.vue';
    import SignUp from './SignUp.vue';
    import ResetPassword from './ResetPassword.vue';

    export default {
        components: { Modal, SignIn, SignUp, ResetPassword },
        props: {
            modal: { type: Boolean }
        },
        data(){
            return{
                modalOverlay: false
            }
        },
        mounted(){
            $('[data-to]').on('click', function (e) {
                e.preventDefault();
                const to = $(this).data("to");

                $('[data-to]').parent().removeClass('auth-switch-nav__item-selected');

                if(to === "reset" || to === "signin"){
                    $(`[data-to="signin"]`).parent().addClass('auth-switch-nav__item-selected');
                }else{
                    $(this).parent().addClass('auth-switch-nav__item-selected');
                }

                $('[data-view]').removeClass('auth-switch-main__item--selected');
                $(`[data-view=${to}]`).addClass('auth-switch-main__item--selected')
            })
        }
    }
</script>