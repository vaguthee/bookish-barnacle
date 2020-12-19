<template>
  <div>
    <p class="text-xl font-bold md:text-6xl">My Trip</p>
    <div id="stay" class="rounded-md border-2 border-green-900 p-3 mt-5">
      <p class="text-sm font-bold">Trip Details</p>
      <p class="text-xs"></p>
      <div class="flex flex-wrap" :class="(trip.user_trip_entities.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item.entity" :index="index" v-for="item,index in trip.user_trip_entities" :key="item.id"/>
      </div>
    </div>
  </div>
</template>

<script>
  import EntityCard from '../components/EntityCard'  
  export default {
    props: ['tripId'],
    components: {
      EntityCard
    },
    data() {
      return {
        trip:{
          user_trip_entities:[]
        }
      }
    },
    mounted() {
      this.id = this.$route.params.tripId
      this.getTrip(this.id)
    },
    watch: {
      $route: {
        handler() {
            if ( !this.isCopy && !this.isNew ) {
              this.getTrip(this.$route.params.tripId)
            }
        },
        deep: true
      },
    },
    methods: {
      getTrip(id) {
        let self = this;
        this.http().get('/api/trips/'+id).then(function(response) {
            self.trip = response.data
        });
      }
    }
  }
</script>
