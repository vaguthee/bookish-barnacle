<template>
  <div v-if="entity">
    <div>
      <p class="text-xl font-bold md:text-6xl mt-5">{{entity.name}}</p>
      <p>{{entity.island}}</p>
      <div></div>
      <div class="w-full flex">
        <button class="flex-1 bg-green-500 shadow appearance-none border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" @click="addToTrip(entity)">
          ADD TO TRIP
        </button>
        <button v-if="trip.user_trip_entities" class="flex-1 bg-green-500 shadow appearance-none border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" @click="viewTrip(entity)">
          VIEW TRIP
        </button>
      </div>
    </div>

    <!-- getting there -->
    <div>
      <p>Getting There</p>

    </div>

        <!-- nearby -->
    <div class="text-sm font-bold md:text-4xl mt-5">
      <p>Nearby</p>
      <div class="flex w-full justify-start">
        <p class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1">&nbsp&nbsp&nbspAll&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
        <p class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1 mr-2">&nbsp&nbsp&nbspStays&nbsp&nbsp&nbsp&nbsp&nbsp</p>
        <p class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1 mr-2">&nbsp&nbspExcursions&nbsp</p>
        <p class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1 mr-2">&nbsp&nbspShopping&nbsp&nbsp&nbsp</p>
      </div>
      <div class="flex mt-5" :class="(nearbyEntities.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in nearbyEntities" :key="item.id"/>
      </div>
    </div>
  </div>
</template>

<script>
  import EntityCard from '../components/EntityCard'  
  export default {
    props: ['entityId'],
    components: {
      EntityCard
    },
    data() {
      return {
        entity: {},
        nearbyEntities: {},
        trip:{}
      }
    },
    mounted() {
      this.id = this.$route.params.entityId
      this.entity = this.$route.params.entity
      this.getEntity(this.id)
      console.log('mounted')
    },
    watch: {
      $route: {
        handler() {
            if ( !this.isCopy && !this.isNew ) {
              this.getEntity(this.$route.params.entityId)
            }
        },
        deep: true
      },
    },
    methods: {
      getEntity(id) {
        let self = this;
        this.http().get('/api/entities/'+id).then(function(response) {
            self.entity = response.data.entity
            self.nearbyEntities = response.data.nearbyEntities
            self.trip = response.data.trip
        });
      },
      addToTrip(entity) {
        let self = this;
        this.http().get('/api/entities/'+entity.id+'/addtotrip').then(function(response) {
            self.entity = response.data.entity
            self.nearbyEntities = response.data.nearbyEntities
            self.trip = response.data.trip
        });
      },
      viewTrip() {
        let self = this;
        this.$router.push({name:'trip.show', 
          params: {
            tripId: this.trip.id,
            trip:this.trip
          }
        }).catch(()=>{});
      }
    }
  }
</script>
