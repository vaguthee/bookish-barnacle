<template>
  <div v-if="entity">
    <div class="mt-5" v-if="trip.user_trip_entities" >
      <button class="inline-block px-5 py-3 rounded-lg shadow-lg bg-indigo-500 text-sm text-white uppercase tracking-wider font-semibold sm:text-base" @click="viewTrip(entity)">View Trip</button>
    </div>
    <div class="mt-5">

      <div class="bg-gray-100 flex">
        <div class="px-8 py-12 max-w-md mx-auto sm:max-w-xl lg:max-w-full lg:w-1/2 lg:py-24 lg:px-12">
          <div class="xl:max-w-lg xl:ml-auto">
            <p class="text-xsm font-bold text-gray-500 leading-tight sm:text-lg lg:text-lg xl:text-lg uppercase">{{entity.type}} ({{entity.category}})
              <span v-if="entity.island">@ {{entity.island}}</span>
            </p>
            <img class="mt-6 rounded-lg shadow-xl sm:mt-8 sm:h-64 sm:w-full sm:object-cover sm:object-center lg:hidden" :src="entity.cover_image_url"  alt="">
            <h1 class="mt-6 text-2xl font-bold text-gray-900 leading-tight sm:mt-8 sm:text-4xl lg:text-3xl xl:text-4xl">
              {{entity.name}}
              <br class="hidden lg:inline">
                <div class="mt-2 flex items-center">
                  <svg v-for="i in 5" :key="i" :class="i <= entity.average_rating ? 'text-teal-500' : 'text-gray-400'" class="h-4 w-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.133 20.333c-1.147.628-2.488-.387-2.269-1.718l.739-4.488-3.13-3.178c-.927-.943-.415-2.585.867-2.78l4.324-.654 1.934-4.083a1.536 1.536 0 0 1 2.804 0l1.934 4.083 4.324.655c1.282.194 1.794 1.836.866 2.78l-3.129 3.177.739 4.488c.219 1.331-1.122 2.346-2.269 1.718L12 18.214l-3.867 2.119z" fill-rule="evenodd"/>
                  </svg>
                  <span class="ml-2 text-gray-600 text-sm">{{ entity.total_review_count }} reviews</span>
                </div>
            </h1>
            <p class="break-words mt-2 text-gray-600 sm:mt-4 sm:text-xl">
              {{entity.truncated_summary}}
            </p>
            <div class="mt-4 sm:mt-6">
              <button v-if="!selectedTripEntitiesId.includes(entity.id)"class="inline-block px-5 py-3 rounded-lg shadow-lg bg-indigo-500 text-sm text-white uppercase tracking-wider font-semibold sm:text-base" @click="addToTrip(entity.id)">Add To Trip</button>
              <button v-if="selectedTripEntitiesId.includes(entity.id)"class="inline-block px-5 py-3 rounded-lg shadow-lg bg-red-500 text-sm text-white uppercase tracking-wider font-semibold sm:text-base" @click="removeFromTrip(entity)">Remove</button>
              <button class="inline-block px-5 py-3 rounded-lg shadow-lg bg-indigo-500 text-sm text-white uppercase tracking-wider font-semibold sm:text-base" @click="openPage(entity)">More...</button>
            </div>
          </div>
        </div>
        <div class="hidden lg:block lg:w-1/2 lg:relative">
          <img class="absolute inset-0 h-full w-full object-cover object-center"  :src="entity.cover_image_url" alt="">
        </div>
      </div>

    </div>



    <!-- getting there -->
    <div class="mt-5">
      <p class="text-sm font-bold md:text-xl text-gray-800">Getting There</p>
    </div>
    <div class="mt-5" v-for="transport in gettingThere">
      <div class="bg-gray-100 flex">
        <div class="px-8 py-12 max-w-md mx-auto sm:max-w-xl lg:max-w-full lg:w-1/2 lg:py-24 lg:px-12">
          <div class="xl:max-w-lg xl:ml-auto">
            <p class="text-xsm font-bold text-gray-500 leading-tight sm:text-lg lg:text-lg xl:text-lg uppercase">{{transport.type}} ({{transport.category}})
              <span v-if="transport.island">@ {{transport.island}}</span>
            </p>
            <img class="mt-6 rounded-lg shadow-xl sm:mt-8 sm:h-64 sm:w-full sm:object-cover sm:object-center lg:hidden" :src="transport.cover_image_url"  alt="">
            <h1 class="mt-6 text-xl font-bold text-gray-900 leading-tight sm:mt-8 sm:text-2xl lg:text-1xl xl:text-2xl">
              {{transport.name}}
            </h1>
            <p class="mt-2 text-gray-600 sm:mt-4 sm:text-xl break-words">
              {{transport.travel_summary}}
            </p>
            <div class="mt-4 sm:mt-6">
                <p class="text-sm font-semibold text-gray-700 mr-2 mt-1">{{transport.days}}</p>
                <div class="flex w-full justify-start">
                  <p v-for="time in transport.hours_array" class="inline-block bg-green-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1">{{time}}</p>
                </div>
            </div>
            <div class="mt-4 sm:mt-6">
              <button v-if="!selectedTripEntitiesId.includes(transport.id)"class="inline-block px-5 py-3 rounded-lg shadow-lg bg-indigo-500 text-sm text-white uppercase tracking-wider font-semibold sm:text-base" @click="addToTrip(transport.id)">Add To Trip</button>
              <button v-if="selectedTripEntitiesId.includes(transport.id)"class="inline-block px-5 py-3 rounded-lg shadow-lg bg-red-500 text-sm text-white uppercase tracking-wider font-semibold sm:text-base" @click="removeFromTrip(transport)">Remove</button>
              <button class="inline-block px-5 py-3 rounded-lg shadow-lg bg-indigo-500 text-sm text-white uppercase tracking-wider font-semibold sm:text-base" @click="openPage(transport)">More...</button>
            </div>
          </div>
        </div>
        <div class="hidden lg:block lg:w-1/2 lg:relative">
          <img class="absolute inset-0 h-full w-full object-cover object-center"  :src="transport.cover_image_url" alt="">
        </div>
      </div>
    </div>

    <!-- nearby -->
    <div class="mt-5">
      <p class="text-sm font-bold md:text-xl text-gray-800">Nearby</p>
      <div class="flex w-full justify-start">
        <p class="inline-block bg-white rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1">&nbsp&nbsp&nbspAll&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
        <p class="inline-block bg-white rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1 mr-2">&nbsp&nbsp&nbspStays&nbsp&nbsp&nbsp&nbsp&nbsp</p>
        <p class="inline-block bg-white rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1 mr-2">&nbsp&nbspExcursions&nbsp</p>
        <p class="inline-block bg-white rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-1 mr-2">&nbsp&nbspShopping&nbsp&nbsp&nbsp</p>
      </div>
      <div class="flex mt-5" :class="(nearbyEntities.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in nearbyEntities" :key="item.id"/>
      </div>
    </div>
  </div>
</template>

<script>
  import EntityCard from '../components/EntityCard'  
  import EntityCardAddRemove from '../components/EntityCardAddRemove'  
  export default {
    props: ['entityId'],
    components: {
      EntityCard,
      EntityCardAddRemove
    },
    data() {
      return {
        entity: {},
        nearbyEntities: {},
        trip:{},
        gettingThere:{},
        selectedTripEntitiesId:[]
      }
    },
    mounted() {
      this.id = this.$route.params.entityId
      this.entity = this.$route.params.entity
      this.getEntity(this.id)
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
      setData(self,data) {
        self.entity = data.entity
        self.nearbyEntities = data.nearbyEntities
        self.trip = data.trip
        self.gettingThere = data.gettingThere
        self.selectedTripEntitiesId = data.selectedTripEntitiesId
      },
      getEntity(id) {
        let self = this;
        this.http().get('/api/entities/'+id).then(function(response) {
          self.setData(self,response.data)
        });
      },
      addToTrip(entityId) {
        console.log(entityId)
        let self = this;
        this.http().get('/api/entities/'+entityId+'/addtotrip').then(function(response) {
          self.setData(self,response.data)
        });
      },
      removeFromTrip(entity) {
        let self = this;
        this.http().get('/api/entities/'+entity.id+'/removefromtrip').then(function(response) {
          self.setData(self,response.data)
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
      },
      openPage(entity) {
        alert('this will open the page')
      }
    }
  }
</script>
