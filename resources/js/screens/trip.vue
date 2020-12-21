<template>
  <div>
    <p class="text-xl font-bold md:text-6xl">My Trip</p>
    <div id="stay" class="rounded-md border-2 border-green-900 p-3 mt-5">
      <p class="text-sm font-bold">Trip Details</p>
      <p class="text-xs"></p>
      <div class="flex flex-wrap" :class="(trip.user_trip_entities.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item.entity" :index="index" v-for="item,index in trip.user_trip_entities" :key="item.id"/>
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
            self.trip = response.data.trips[0]
        });
      },
      makeBooking(trip) {
        if (confirm('Payment gateway appears here and it will ask whether you want to pay $' + trip.total_prepaid + '. Are you sure you want to pay  for the bookings?')) {
          //make as if paid
            let self = this;
            this.http().get('/api/trips/'+trip.id+'/paid?q=1').then(function(response) {
              self.trip = response.data.trips[0];
            });
        } else {
          alert('Payment unsuccessfull');
        }
      }
    }
  }
</script>
