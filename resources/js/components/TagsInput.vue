<template>
  <div>
    <DeletableTag v-for="tag,index in mutableTags" :key="tag" :tag="tag" @click.native="deleteThisTag(index,tag)"/>
    <input ref="input" class="mt-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tags-input" name="tags" type="text" placeholder="tags (comma seperated)        Eg: Brownies,Cookies" @input="tagsInputChanged" @blur="generateInputString()">
  </div>
</template>

<script>
  import DeletableTag from './DeletableTag'

  export default {
    props: ['tags'],
    components: {
      DeletableTag
    },
    data() {
      return {
        mutableTags: this.tags
      }
    },
    methods: {
      tagsInputChanged: _.debounce(function (e) {
        //remove trailing comma, remove duplicates
        this.mutableTags = [...new Set(e.target.value.replace(/,\s*$/, "").split(','))].filter(function (el) { return el != "";});
        this.emitChange();
      }, 500),
      deleteThisTag(index,tag) {
        this.$delete(this.mutableTags, index)
        this.generateInputString();
      },
      generateInputString() {
        //generate the string to be inside the input field 
        // after a tag is being deleted
        // or when the component is loaded(on mounted)
        this.$refs.input.value = this.mutableTags.toString();
        this.emitChange();
      },
      emitChange() {
        this.$emit('change', {
          mutableTags: this.mutableTags
        })
      }
    },
    mounted() {
      this.generateInputString();
    }
  }
</script>
