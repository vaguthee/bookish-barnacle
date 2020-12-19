<template>
  <div>
    <div class="flex">
      <h1 class="px-8 py-12 max-w-lg mx-auto mt-6 text-2xl font-bold text-gray-900 leading-tight">Design The Card</h1>
    </div>
    <div class="flex flex-wrap">
      <div class="px-8 py-12 max-w-lg mx-auto sm:max-w-xl lg:max-w-full lg:w-1/2">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 justify-center" method="post" action="/pages" enctype="multipart/form-data" v-on:submit.prevent="onSubmit">
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Business Name
            </label>
            <span class="block text-blue-700 text-xsm mb-2"><i>This is the title that will be shown in tab and will be used by search engines too.</i></span>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="title" v-model="page.title">
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
            Description
            </label>
            <span class="block text-blue-700 text-xsm mb-2"><i>Write a short description for your business which includes the type of business and services that you provide. Also, mention which islands can receive your services.</i></span>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="excerpt" type="text" placeholder="excerpt" v-model="page.excerpt"></textarea>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Tags
            </label>
            <span class="block text-blue-700 text-xsm mb-2"><i>These are the search keywords. Users will be able to search for your business using tags or your business name. Type in the tags which relate the most to your business. You can include up to 10 tags. (Use , to separate each tag).</i></span>

            <TagsInput :tags="page.tags" v-on:change="tagsChanged"/>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
            Card Image
            </label>
            <PhotoUpload v-on:uploaded="photoUploaded"/>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="own_page_url">
            Link to your business page (one link only)
            </label>
            <span class="block text-blue-700 text-xsm mb-2"><i>This could be your Instagram page, Facebook or website link. You can add more links on edit page</i></span>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="own_page_url" type="text" placeholder="Own site/page url" v-model="page.links[0].url" v-on:input="linkChanged">
          </div>
          <div class="flex items-center justify-between">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Create Card
              </button>
          </div>
        </form>
      </div>
      <div class="px-8 py-12 sm:px-0 max-w-lg mx-auto sm:max-w-xl lg:w-1/2">
          <PageCard :page="page"/>
      </div>
    </div>
  </div>
</template>

<script>
  import PageCard from '../components/PageCard'  
  import TagsInput from '../components/TagsInput'
  import PhotoUpload from '../components/PhotoUpload'

  export default {
    components: {
      PageCard,
      TagsInput,
      PhotoUpload
    },
    data() {
      return {
        page: {
          title: 'Business Name',
          feature_image_url: 'https://aimme.s3.ap-southeast-1.amazonaws.com/smemaldives/download_1603897253.jpeg',
          excerpt: 'Join us (virtually) December 8-10 for 3 days of content, customizable tracks, and the latest from GitHub.Join us (virtually) December 8-10 for 3 days of content, customizable tracks, and the latest from GitHub.Join us (virtually) December 8-10 for 3 days of content, customizable tracks, and the latest from GitHub.',
          tags: ['dsfsf sdfsd', 'dsfdasf asdf', 'asfd'],
          links: [
            { website:'', url:'' },
            // { website:'insta/fb', url:'aimme.com' }
          ]
        }
      }
    },
    methods: {
      tagsChanged(params) {
        this.page.tags = params.mutableTags;
        console.log(params.mutableTags)
      },
      photoUploaded(params) {
        this.page.feature_image_url = params.url;
        console.log(params.url)
      },
      domain_from_url(url) {
          var result
          var match
          if (match = url.match(/^(?:https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n\?\=]+)/im)) {
              result = match[1]
              if (match = result.match(/^[^\.]+\.(.+\..+)$/)) {
                  result = match[1]
              }
          }
          return result
      },
      linkChanged() {
        if(event.target.value == "") {
          this.page.links[0].website = '';
        } else {
          let domain = this.domain_from_url(event.target.value)
          if (domain == 'instagram.com') {
            this.page.links[0].website = 'insta';
          } else if (domain == 'facebook.com') {
            this.page.links[0].website = 'fb';
          } else {
            this.page.links[0].website = 'web';
          }
        }
      },
      onSubmit() {
        const URL = '/api/pages'; 

        this.http().post(URL, {
          title: this.page.title,
          feature_image_url: this.page.feature_image_url,
          excerpt: this.page.excerpt,
          tags: this.page.tags.toString(),
          own_page_url: this.page.links[0].url,
          link_website: this.page.links[0].website,
        }).then(
          response => {
            console.log(response.data)
            // this.$emit('uploaded', {
            //   url:response.data.url
            // })
          }
        )
      },

    },
    mounted() {
        console.log('Component mounted.')
    }
  }
</script>
