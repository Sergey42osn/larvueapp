<template>
   <div class="component_container bottom_bar">
      <div class="wrapper_app_mob_bottom_bar">
         <div class="mob_bottom_bar_box"></div>
         <div class="mob_bottom_bar_box" v-bind:class="{ active: barbottmmenu.map }">
            <router-link to="/" exact>
                  <img src="" alt="">
               <p>Карта</p>
            </router-link>
         </div>
         <div class="mob_bottom_bar_box"></div>
         <div class="mob_bottom_bar_box" v-bind:class="{ active: barbottmmenu.menu }">
            <div class="mob_bottom_bar_box_menu">
               <router-link to="/menu" exact>
                  <span class="mob_menu_button">
                     <span></span>
                     <span></span>
                     <span></span>
                  </span>
                  <p>Меню</p>
               </router-link>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
    export default {
         props: {
            barbottmmenu:{}
         },
        data() {
            return {
               map:'',
               menu:''
            }
        },
        mounted() {
            console.log('Component mounted.');

            console.log(this.barbottmmenu)
        },
        created(){

        },
        methods:{
            mobMenu(){

            }
        },
         computed:{
          
        }
    }
</script>

<style>
.component_container.bottom_bar {
position: fixed;
bottom: 0;
left: 0;
right: 0;
}
.wrapper_app_mob_bottom_bar{
        display: flex;
        width: 100%;
        background-color: #403838;
        padding: 5px;
    }
    .mob_bottom_bar_box{
        flex-basis: 25%;
    }
     .mob_bottom_bar_box{
        display: flex;
        flex-direction: column;
     }
     .mob_menu_button span{
        display: inline-flex;
        width: 20px;
        height: 2px;
        background-color: #fff;
     }
     .mob_bottom_bar_box a {
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.mob_menu_button {
  display: inline-flex;
  flex-direction: column;
  align-items: center;
}
.mob_menu_button span + span {
  margin-top: 4px;
}
.mob_bottom_bar_box_menu p {
  display: flex;
  justify-content: center;
  margin: 0;
}
     @media(min-width: 768px) {
        .wrapper_app_mob_bottom_bar {
            display: none;
        }
    }
</style>
