<template>
  <div>
    <p class="text-xl font-bold md:text-6xl">My Trips</p>
    <input type="text" name="search" id="search" class="input rounded-md w-full h-10 p-3">
    <div class="rounded-md border-2 border-green-900 p-3 mt-5" v-for="trip,index in trips" :key="trip.id">
      <p class="text-sm font-bold">Trip Name: #{{trip.id}}</p>
      <p class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1">{{(trip.status == 'draft' ? 'Planning' : trip.status)}}</p>
      <div class="flex flex-wrap mt-5" :class="(trip.entities.length>=5)?'justify-between':'justify-start'"">
      <EntityCard :entity="item" :index="index" v-for="item,index in trip.entities" :key="item.id"/>
      </div>
    </div>
  </div>
</template>

<script>
  import EntityCard from '../components/EntityCard'  
  export default {
    components: {
      EntityCard
    },
    data() {
      return {
        trips: {}
      }
    },
    mounted() {
      this.getMyTrips()
    },
    methods: {
      getMyTrips() {
        let self = this;
        this.http().get('/api/trips').then(function(response) {
            self.trips = response.data.trips;
        });

      }
    }
  }
</script>
