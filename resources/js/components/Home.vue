<template>
    <div class="container">
        <div class="row justify-content-end">
            <LoginPanel></LoginPanel>
        </div>
        <div class="row justify-content-center">
           <Map></Map>
        </div>
    </div>
</template>

<script>

    import LoginPanel from './LoginPanel.vue'
    import Map from './Map.vue'

    export default {
        components: {
            LoginPanel,
            Map
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>