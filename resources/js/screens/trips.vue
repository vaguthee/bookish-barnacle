<template>
  <div>
    <p class="text-xl font-bold md:text-6xl">My Trips</p>
    <div class="rounded-md border-2 border-green-900 p-3 mt-5" v-for="trip,index in trips" :key="trip.id">
      <p class="text-sm font-bold">Trip Name: #{{trip.id}}</p>
      <p class="inline-block bg-gray-200 rounded-full py-1 text-sm font-semibold text-gray-700 mr-2 mt-1">{{(trip.status == 'draft' ? 'Planning' : trip.status)}}</p>
      <div class="flex flex-wrap mt-5" :class="(trip.entities.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in trip.entities" :key="item.id"/>
      </div>
      <div class="rounded-md border-2 border-blue-300 p-3 mt-5">
        <p class="font-semibold text-lg leading-tight truncate text-gray-800">ESTIMATED SPEND</p>
        <p class="font-semibold text-gray-500 text-lg leading-tight truncate mt-3">Booking: <span class="font-semibold text-xl leading-tight truncate text-green-500">${{trip.total_prepaid}}</span></p>
        <p class="font-semibold text-gray-500 text-lg leading-tight truncate mt-3">Post Payments: <span class="font-semibold text-xl leading-tight truncate text-green-500">${{trip.total_postpaid}}</span><span  v-if="trip.status=='booked'" class="ml-3 text-xs text-blue-300 bg-gray-800 rounded-full p-2 inline-block">BOOKED</span></p>
        <div class="flex justify-between">
          <div class="font-semibold text-gray-500 text-4xl leading-tight mt-3">Total: 
            <span class="font-semibold text-4xl leading-tight mt-3 text-green-500">${{trip.total_price}}</span>
          </div>
          <button v-if="trip.status=='draft'"class="inline-block px-5 py-3 rounded-lg shadow-lg bg-indigo-500 text-sm text-white uppercase tracking-wider font-semibold sm:text-base" @click="makeBooking(trip)">Book</button>
        </div>
        <p class="text-gray-800 mt-3">This is an estimate based on pricing estimates we have on hand for your convenience</p>
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
      },
      //payment gateway integration
      makeBooking(trip) {
        if (confirm('Payment gateway appears here and it will ask whether you want to pay $' + trip.total_prepaid)) {
          //make as if paid
            let self = this;
            this.http().get('/api/trips/'+trip.id+'/paid').then(function(response) {
              self.trips = response.data.trips;
            });
        } else {
          alert('Payment unsuccessfull');
        }
      }
    }
  }
</script>
