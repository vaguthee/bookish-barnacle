<template>
  <header class="bg-gray-900 sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3 mb-3">
    <div class="flex items-center justify-between px-4 py-3 sm:p-0">
      <div>
        <a href="/">
          <img class="h-8" src="/logo.png" alt="logo">
        </a>
      </div>
      <div class="sm:hidden">
        <button @click="isOpen = !isOpen" type="button" class="block text-gray-500 hover:text-white focus:text-white focus:outline-none">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path v-if="isOpen" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
            <path v-if="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
          </svg>
        </button>
      </div>
    </div>
    <nav :class="isOpen ? 'block' : 'hidden'">
      <div class="px-2 pt-2 pb-4 sm:flex sm:items-center sm:p-0">
        <a href="/m/getstarted" class="no-underline mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2">Get Started</a>
        <a href="/home" class="no-underline mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2">Dashboard</a>
        <a href="/profiles" class="no-underline mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2">Profiles</a>
        <a href="/pages" class="no-underline mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2">Pages</a>
        <a href="/pics" class="no-underline mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2">Images</a>
        <a href="/templates"        class="no-underline mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2">Templates</a>

        <select v-if="profiles.length>0" v-model="profile_id" class="no-underline mt-1 block px-2 py-1 gray-800 font-semibold rounded hover:bg-gray-500 sm:mt-0 sm:ml-2" name="profile_id" @change="swtichProfile($event)">
          <option v-for="profile in profiles" v-bind:value="profile.id" :key="profile.id">
             {{ profile.name }}
          </option>
        </select>
        <select v-if="profiles.length == 0" class="no-underline mt-1 block px-2 py-1 gray-800 font-semibold rounded hover:bg-gray-500 sm:mt-0">
          <option>Switch Profile</option>
        </select>
        <a href="/logout" class="no-underline mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2">Sign Out</a>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  mounted() {
      this.getProfiles();
  },
  data() {
    return {
      profile_id: this.$profileId,
      profiles: [],
      isOpen: true,
    }
  },
  methods: {
    getProfiles() {
      let self = this;
      axios.get('/api/profiles').then(function(response) {
        self.profiles = response.data;
      });
    },
    swtichProfile(event) {
      if (event.target.value) {
        axios.post('/profiles/switch', {
          'profile_id': event.target.value
        }).then(function(response) {
          location.reload();
        });
      }
    }
  }
}
</script>
