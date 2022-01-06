<template>
    <router-view @registerIn="registerIn" :messageInfo="messageInfo" :register="register"></router-view>
</template>

<script>
    export default {
    	data() {
            return {
               	messageInfo: "",
               	register: false,
               	authuser: false,
               	access_token: false,
               	auth:false
            }
        },
        mounted() {
            console.log('Component mounted.');
          // this.authUser();
        },
        methods:{
        	registerIn(state){
                if (state) {
                	this.register = true;
                	this.messageInfo = "Вы успешно зарегестрировались.Для дальнейшей работы вам отправлена ссылка на почту для подтверждения E-mail";
                }
          }
        }
    }
</script>

<style>
</style>
