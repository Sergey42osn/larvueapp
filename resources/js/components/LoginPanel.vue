<template>
    <div class="component_container login_panel">
        <div v-if="authState" class="wrapper_content">
            <span>{{ user.name }}</span>
            <form v-on:submit.prevent="logoutForm" action="">
                <button>Выйти</button>
            </form>
            <span v-if="user.admin">
              <router-link to="/admin" exact>Админ панель</router-link>
            </span>
<<<<<<< HEAD
			<span v-if="user.profil">
=======
            <span v-if="user.profil">
>>>>>>> 254593ba722d1f8c74e2aa339821f5a9875f4725
              <router-link to="/profil" exact>Профиль</router-link>
            </span>
        </div>
        <div v-else class="wrapper_content">
            <router-link to="/login" exact>Войти</router-link>
            <router-link to="/register" exact>Зарегестрироваться</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        props:['authuser'],
        data() {
            return {
               // auth:false,
                user:{
                    name:"",
                    admin:false,
<<<<<<< HEAD
					profil:false
=======
                    profil:false
>>>>>>> 254593ba722d1f8c74e2aa339821f5a9875f4725
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){

          this.logedIn();

        },
        methods:{
             logedIn(){

                 console.log('logedIn');

                     let url = "/api/v1/user";

                     let token = window.localStorage.getItem('token');

                    if (token) {

                        axios.defaults.headers = {
                            'Content-Type': 'application/json',
                            Authorization: 'Bearer ' + token
                        }

                    }else{

                      this.$store.commit('UPDATE_AUTH_STATE',false);

                      return;

                    }
                     
                    axios.get(url)
                    .then(response => {
                     // console.log(response.data);

                      if (response.data.result == true) {

                        this.user.admin = response.data.user.is_admin;

                        this.user.name = response.data.user.name;

                        this.$store.commit('UPDATE_AUTH_STATE',true);
                      }

                    });

            },
            logoutForm(){
                let url = "/api/v1/logout";

                     let token = window.localStorage.getItem('token');

                    if (token) {

                        axios.defaults.headers = {
                            'Content-Type': 'application/json',
                            Authorization: 'Bearer ' + token
                        }

                    }
                     
                    axios.post(url)
                    .then(response => {
                    //  console.log(response.data);

                      if (response.data.result == true) {
                     //  console.log(response.data);

                       window.localStorage.setItem('token','');

                       this.user.name = false;
                       this.user.admin = false;

                       this.$store.commit('UPDATE_AUTH_STATE',false);
                      }


                    });
            }
        },
         computed:{
          authState(){
             // console.log(this.$store.getters.authState.state);
             return this.$store.getters.authState.state;
          },
          auth(){
             return this.$store.getters.auth;
          }
        }
    }
</script>

<style>
     @media(max-width: 768px) {
        .component_container.login_panel {
            display: none;
        }
    }
</style>
