<template>
      <QuillEditor theme="snow" :modules="modules" toolbar="full"/>
</template>
<script>
import { QuillEditor } from '@vueup/vue-quill'
import BlotFormatter from 'quill-blot-formatter'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    components:{
        QuillEditor
    },

    setup: () => {
    const modules = {
      name: 'blotFormatter',  
      module: BlotFormatter, 
      options: {/* options */}
    }
    return { modules }
  },
}   
</script>