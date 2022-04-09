<template>
   <AdminLayout>
       <template #header>
           Blog
       </template>
       <div class="">
           <div style="height:calc(100vh - 80px);" class="m-2 overflow-y-scroll mx-4 container-fluid bg-white rounded p-1">
               <div class="m-2 relative">
                   <div class="flex justify-between items-center bg-gray-300 mb-2 rounded-md p-2">
                       <div class="">
                           <button @click="newpost = !newpost" class="p-2 bg-green-500 text-white rounded-md text-xs tracking-wider font-bold">NEW</button>
                       </div>
                       <!-- <div class="">
                           <select class="text-xs font-bold rounded-md " name="" id="">
                               <option value="">SORT BY</option>
                               <option value="">Latest</option>
                               <option value="">Popular</option>
                           </select>
                       </div> -->
                   </div>
                   <div v-show="newpost" class="absolute bg-white w-full p-4 border shadow-lg">
                       <form @submit.prevent="create">
                            <div class="flex border-b-2 justify-between">
                                <div>
                                    <span class="text-blue-400 text-sm font-bold tracking-wide">NEW POST</span>
                                </div>
                            </div>
                            <div class="flex mt-4 flex-col">
                                <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Title"/>
                                        <div class="mt-2">
                                            <input v-model="form.title" required class="text-sm border-gray-300 rounded-md" type="text"/>
                                        </div>
                                </div>
                                <div class="mt-2">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Body"/>
                                        <div class="mt-2">
                                            <QuillEditor required v-model:content="form.body" contentType="html" type="html"  theme="snow" :modules="modules" toolbar="full"/>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 flex gap-4">
                                <div>
                                    <button type="submit" class="bg-green-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">SUBMIT</button>
                                </div>
                                <div>
                                    <button type="button" @click="newpost = !newpost" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                                </div>
                            </div>
                       </form>
                   </div>
                   <div v-show="updatepost" class="absolute bg-white w-full p-4 border shadow-lg">
                      <form @submit.prevent="update">
                            <div class="flex border-b-2 justify-between">
                                <div>
                                    <span class="text-blue-400 text-sm font-bold tracking-wide">EDIT BLOG</span>
                                </div>
                            </div>
                            <div class="flex mt-4 flex-col">
                                <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Title"/>
                                        <div class="mt-2">
                                            <input required v-model="newform.title" class="text-sm border-gray-300 rounded-md" type="text"/>
                                        </div>
                                </div>
                                <div class="mt-2">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Body"/>
                                        <div class="mt-2">
                                            <QuillEditor required v-model:content="newform.body" contentType="html" type="html"  theme="snow" :modules="modules" toolbar="full"/>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 flex gap-4">
                                <div>
                                    <button type="submit" class="bg-green-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">SUBMIT</button>
                                </div>
                                <div>
                                    <button type="button" @click="updatepost = !updatepost" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                                </div>
                            </div>
                      </form>
                   </div>
                   <div style="height:calc(100vh - 180px);scrollbar-width:thin" class="overflow-y-scroll">
                        <div class="text-ct" >
                            <div style="width:100%" class="border-b-2 flex flex-row shadow-sm border-gray-100 text-gray-500 uppercase tracking-wider text-xs p-2">
                                <div class="w-1/6 text-left border-gray-300 p-2">
                                    <span class="flex pr-1">Title</span>
                                </div>
                                <div class="w-3/6 text-left border-gray-300 p-2">
                                    <p class=" pr-1">Body</p>
                                </div>
                                <div class="w-1/6 text-center p-2">Actions</div>
                            </div>
                            
                            <div>
                                <div style="width:100%" v-for="post in posts.data" :key="post.id" class="overflow-hidden border-t-2 flex flex-row shadow-sm text-sm text-gray-500 tracking-wider border-gray-100">   
                                    <div class="w-1/6 text-start border-gray-300 p-2">{{post.title}}</div>
                                    <div colspan="3" class="w-3/6 text-start border-gray-300 p-2">
                                        <div v-html="post.body">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/6 border-gray-300"><img v-if="post.image" class="h-14 w-14 flex mr-1" :src="'/storage/'+post.image" alt=""></div>
                                    <div class="p-2 w-1/6">
                                        <div class="flex gap-2 justify-center items-center">
                                            <button @click="updatepost = !updatepost, newform.title = post.title, newform.body = post.body, newform.id = post.id" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-white" viewBox="0 0 24 24">
                                                    <path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/>
                                                </svg>
                                            </button>
                                            <button @click="deletePost(post)" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-white" viewBox="0 0 24 24">
                                                    <path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="w-full mt-8">
                            <div class="w-full flex justify-center items-center">
                                <div class="flex gap-2 border justify-center items-center text-blue-500" v-for="(link, index) in posts.links">
                                    <button @click="fetchData(link.url)" :disbled="link.active" :class="{'bg-gray-200': !link.active}" v-if="index == 0" class="border border-blue-400 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="p-1 fill-current text-blue-500" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M13 12l11-7v14l-11-7zm-11 0l11-7v14l-11-7zm-2 6h2v-12h-2v12z"/>
                                        </svg>
                                    </button>
                                    <button @click="fetchData(link.url)" :disbled="link.active" :class="{'bg-gray-200': !link.active}" v-else-if="index == posts.links.length - 1" class="border border-blue-400 cursor-pointer">
                                        <svg class="p-1 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M0 19v-14l11 7-11 7zm11 0v-14l11 7-11 7zm13-13h-2v12h2v-12z"/>
                                        </svg>
                                    </button>
                                    <button @click="fetchData(link.url)" :disbled="link.active" :class="{'bg-gray-200': !link.active}" v-else class="px-2 font-bold border border-blue-400 cursor-pointer">
                                        <span>{{link.label}}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
               </div>
           </div>
       </div>
   </AdminLayout>    
</template>

<script>
 
    import AdminLayout from '@/Layouts/AdminLayout'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import { QuillEditor } from '@vueup/vue-quill'
    import BlotFormatter from 'quill-blot-formatter'
    import '@vueup/vue-quill/dist/vue-quill.snow.css';

 export default{
    props: ['posts'],
    data(){
        return{
           newpost: false,
           updatepost: false,
           newform:this.$inertia.form({
                    id: '',
                    title: '',
                    body: '',
                }),
           form:this.$inertia.form({
                    title: '',
                    body: '',
                }),
        }
    },
     components:
    {
        AdminLayout,
        JetInputError,
        JetInput,
        JetButton,
        JetLabel,
        JetValidationErrors,
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

    methods:
    {
        formatdate(date)
        {
            var date = new Date(date);
            return date.toDateString();
        },
        back()
        {
            window.history.back();
        },
        
        update(){
            this.newform.post('/admin/blog/post/'+this.newform.id+'/update', {
            })
        },
        deletePost(post){
            if(confirm('this Post will be permanently deleted'))
            {
                this.$inertia.delete('/admin/blog/post/'+post.id+'/delete',{
                    onSuccess:()=>
                    {
                        alert('Success reload now!!')
                    }
                })
                
            }
        },
        create()
        {
            this.form.post('/admin/blog/post/create', {
                onSuccess:() =>
                {
                    this.newpost = false;
                    this.form.title = '';
                    this.form.body = ''
                }
            })
        },
        fetchData(url)
        {
            Inertia.get(url)
        }
    },
    mounted()
    {
       
    },
 }
</script>

