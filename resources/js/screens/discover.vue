<template>
  <div>
    <p class="text-xl text-gray-900 font-bold md:text-6xl">Discover</p>
    <input type="text" name="search" id="search" class="input rounded-md w-full h-10 p-3" @input="searchTextChanged" ref="input" placeholder="search by place name or excursion. eg: surf, shark, shipwreck resort or guest house name">
    <div id="stay" class="rounded-md border-2 bg-blue-300 p-3 mt-5">
      <p class="text-lg text-gray-900 font-bold">Stay</p>
      <p class="text-xs text-gray-700">Resorts, Guest Houses, Hotels</p>
      <div class="flex flex-wrap" :class="(entitites.stay.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in entitites.stay" :key="item.id"/>
      </div>
    </div>
    <div id="excursions" class="rounded-md border-2 bg-blue-300 p-3 mt-5">
      <p class="text-lg text-gray-900 font-bold">Excursions</p>
      <p class="text-xs text-gray-700">Surfing, Fishing, Diving</p>
      <div class="flex" :class="(entitites.excursions.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in entitites.excursions" :key="item.id"/>
      </div>
    </div>
    <div id="shopping" class="rounded-md border-2 bg-blue-300 p-3 mt-5">
      <p class="text-lg text-gray-900 font-bold">Shopping</p>
      <p class="text-xs text-gray-700">Souvenier shops, convenience shops</p>
      <div class="flex" :class="(entitites.shopping.length>=5)?'justify-between':'justify-start'"">
        <EntityCard :entity="item" :index="index" v-for="item,index in entitites.shopping" :key="item.id"/>
      </div>
    </div>
    <div id="landmarks" class="rounded-md border-2 bg-blue-300 p-3 mt-5">
      <p class="text-lg text-gray-900 font-bold">Landmarks</p>
      <p class="text-xs text-gray-700"></p>
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
      searchTextChanged: _.debounce(function (e) {
        this.search();
      }, 500),
      getEntities() {
        let self = this;
        this.http().get('/api/discover').then(function(response) {
            self.entitites = response.data.entitites;
        });
      },
      search() {
        let self = this;
        this.http().get('/api/search?q='+this.$refs.input.value).then(function(response) {
            self.entitites = response.data.entitites;
        });
      }
    }
  }
</script>
