<template>
  <div>
    <p class="text-xl font-bold md:text-6xl">Discover</p>
    <input type="text" name="search" id="search" class="input rounded-md w-full h-10 p-3">
    <div id="stay" class="rounded-md border-2 border-green-900 p-3 mt-5">
      <p class="text-sm font-bold">Stay</p>
      <p class="text-xs">Resorts, Guest Houses, Hotels</p>
      <div class="flex flex-wrap" :class="(entitites.stay.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in entitites.stay" :key="item.id"/>
      </div>
    </div>
    <div id="excursions" class="rounded-md border-2 border-green-900 p-3 mt-5">
      <p class="text-sm font-bold">Excursions</p>
      <p class="text-xs">Surfing, Fishing, Diving</p>
      <div class="flex" :class="(entitites.excursions.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in entitites.excursions" :key="item.id"/>
      </div>
    </div>
    <div id="shopping" class="rounded-md border-2 border-green-900 p-3 mt-5">
      <p class="text-sm font-bold">Shopping</p>
      <p class="text-xs">Souvenier shops, convenience shops</p>
      <div class="flex" :class="(entitites.shopping.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in entitites.shopping" :key="item.id"/>
      </div>
    </div>
    <div id="landmarks" class="rounded-md border-2 border-green-900 p-3 mt-5">
      <p class="text-sm font-bold">Landmarks</p>
      <p class="text-xs"></p>
      <div class="flex" :class="(entitites.landmarks.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in entitites.landmarks" :key="item.id"/>
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
        entitites: {
          stay: [],
          excursions: [],
          shopping: [],
          landmarks: []
        }
      }
    },
    mounted() {
      this.getEntities()
    },
    methods: {
      getEntities() {
        let self = this;
        this.http().get('/api/discover').then(function(response) {
            self.entitites = response.data.entitites;
        });

      }
    }
  }
</script>
