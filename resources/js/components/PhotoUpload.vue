<template>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" type="file" placeholder="image" @change="uploadImage" accept="image/*" ref="input">
</template>

<script>

  export default {
    methods: {
      uploadImage(e) {
        const URL = '/pics/upload'; 

        let data = new FormData();
        data.append('image', e.target.files[0]); 

        let config = {
          header : {
            'Content-Type' : 'image/png'
          }
        }

        this.http().post(URL, data, config).then(
          response => {
            console.log(response.data.url)
            this.$emit('uploaded', {
              url:response.data.url
            })
          }
        )
      }
    },
    mounted() {
      console.log('mounted PhotoUpload')
    }
  }
</script>
