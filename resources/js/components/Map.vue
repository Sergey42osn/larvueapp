<template>
    <div class="component_container component_map">
        <div class="google-map" ref="googleMap" style="width: 100%"></div>
    </div>
</template>

<script>

  //import google from 'google'

  import axios from 'axios';

    export default {
        name:'Map',
       // props:['auth'],
        data() {
            return {
               // google: null,
               //auth:false,
               barbottmmenu:{
                    menu:false,
                    map:true
                },
               cords:{
                  1:{
                     lat:53.614,
                    lng:87.337
                  },
                  2:{
                    lat:53.614,
                    lng:87.337
                   }
                },
                myLatlng:{
                  lat:53.614,
                    lng:87.337
                  },
                  polling:false,
              addMarker:true,
               get_cords:[],
               marker:null,
               markers:[],
               mapMarkers:[],
               idcar:1,
                map:null,
                infoWindow:null,
               // bounds: new window.google.maps.LatLngBounds(), // Авто масштабирование карты
                mapOptions: {
                    center: { lat: 53.604, lng: 87.337 },
                    zoomControl: true,
                    zoom: 14,
                    disableDefaultUI: true
                },
                users:[]
            }
        },
        methods: {
          initMap() {

           // console.log();
           // create map
            this.map = new google.maps.Map(this.$refs.googleMap, {
                ...this.mapOptions
            });

            this.marker = new google.maps.Marker();

            console.log(this.marker);

            this.infoWindow = new google.maps.InfoWindow();

            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(
                (position) => {
                  const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                  };
                  this.marker.setPosition(pos);
                  this.infoWindow.setPosition(pos);
                  this.infoWindow.setContent("Ваше местоположение.");
                  this.infoWindow.open(this.map);
                  this.map.setCenter(pos);
                },
                () => {
                  this.handleLocationError(true, this.infoWindow, this.map.getCenter());
                }
              );
            } else {
              // Browser doesn't support Geolocation
              handleLocationError(false, this.infoWindow, this.map.getCenter());
            }
          },
          handleLocationError(browserHasGeolocation, infoWindow, pos) {
            this.infoWindow.setPosition(pos);
            this.infoWindow.setContent(
              browserHasGeolocation
                ? "Error: The Geolocation service failed."
                : "Error: Your browser doesn't support geolocation."
            );
            this.infoWindow.open(this.map);
          },
          getUsersActive(){

             let url = "/api/v1/usersactive";
                 
              axios.get(url)
              .then(response => {
               // console.log(response.data);
              });
          },
          pollData () {

           // console.log('111');

            this.polling = setInterval(() => {

             if (!this.authState.state) {
              clearInterval(this.polling);
              return;
             }

             this.getCordsCars();

            }, 15000)
          },
          sendCordCar(){

            this.cords[1].lat = this.cords[1].lat + 0.001;

            this.cords[2].lng = this.cords[2].lng + 0.001;

            let url = "/api/v1/cords";
                 
              axios.post(url,{
                cords:this.cords
               // idcar:this.idcar
              })
              .then(response => {
              //  console.log(response.data);

               this.getCordsCars();
              });
          },
          getCordsCars(){
            let url = "/api/v1/getcords";

            //console.log(this.idcar);
                 
              axios.get(url)
              .then(response => {
               
                if (response.data.result) {

                  // console.log(response.data.data);

                   this.markers = response.data.data;

                  // console.log(this.markers);

                   //this.setMarkers();
                }
              });
          },
          setMarkers(){

            if(this.markers.length == 0){
              return;
            }

           // console.log(this.markers);
            this.markers.forEach(markerInfo =>{

            //  console.log(markerInfo.id_car);

            //  console.log(this.mapMarkers[markerInfo.id_car]);

              //if()

              if (typeof this.mapMarkers[markerInfo.id_car] === 'undefined') {

               this.addOneMarker(markerInfo);

              }else{

                var positionM = {lat:parseFloat(markerInfo.lat),lng:parseFloat(markerInfo.lng)};

                this.mapMarkers[markerInfo.id_car].setPosition(positionM);

              }

            });
            

             // this.marker.setPosition(this.myLatlng);

          },
          addOneMarker(markerInfo){

            var myLatlng = new google.maps.LatLng(parseFloat(markerInfo.lat),parseFloat(markerInfo.lng));

           // console.log(myLatlng);

           // var positionM = {lat:parseFloat(markerInfo.lat),lng:parseFloat(markerInfo.lng)};

              var title = markerInfo.name;

             this.mapMarkers[markerInfo.id_car] = new google.maps.Marker({
                  position: myLatlng,
                  icon:'/images/car.png',
                 // map:this.map,
                  title: title
              });

            //  console.log(this.mapMarkers[markerInfo.id_car]);

              this.mapMarkers[markerInfo.id_car].setMap(this.map);

          }
        },
        computed:{
          authState(){
             return this.$store.getters.authState;
          },
          auth(){
             return this.authState.state;
          }
        },
        mounted: function () {
           // console.log(GoogleMapsLoader);
           this.initMap();
           //this.getUsersActive();

              this.pollData();
        },
        beforeDestroy() {
          // Perform the teardown procedure for someLeakyProperty.
          // (In this case, effectively nothing)

          clearInterval(this.polling);
        },
        watch: {
         markers: function () {
              this.setMarkers();
          }
        }
    }
</script>

<style>
  .component_map {
    width: 100%;
}
.google-map{
     height: 93vh;
   }
 @media(max-width: 768px) {
   .google-map{
     height: 93vh;
   }
}
</style>