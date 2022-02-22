<template>
   <AdminLayout>
       <template #header>
           Banners
       </template>
       <div class="">
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1 relative">
                <div class="m-2">
                    <div class="flex justify-between items-center bg-gray-300 mb-2 rounded-md p-2">
                        <div class="">
                            <button @click="newbanner = !newbanner" class="p-2 bg-green-500 text-white rounded-md text-xs tracking-wider font-bold">NEW</button>
                        </div>
                        <!-- <div class="">
                            <select class="text-xs font-bold rounded-md " name="" id="">
                                <option value="">SORT BY</option>
                                <option value="">Latest</option>
                                <option value="">Popular</option>
                            </select>
                        </div> -->
                    </div>
                    <div v-show="newbanner" class="absolute bg-white w-full p-4 border shadow-lg">
                       <div class="flex border-b-2 justify-between">
                           <div>
                               <span class="text-blue-400 text-sm font-bold tracking-wide">NEW BANNER</span>
                           </div>
                       </div>
                       <div class="flex mt-4 flex-col">
                           <div class="mt-4">
                               <jet-input-error :message="form.errors.name" class="mt-2" />
                               <jet-label class="text-sm tracking-wider" for="size" value="Name"/>
                                <div class="mt-2">
                                    <input v-model="form.name" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                           </div>
                           <div class="">
                               <jet-input-error :message="form.errors.description" class="mt-2" />
                               <jet-label class="text-sm tracking-wider" for="size" value="Description"/>
                                <div class="mt-2">
                                    <textarea v-model="form.description" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                           </div>
                           <div class="flex gap-2 mt-2">
                                <div class="">
                                    <jet-input-error :message="form.errors.type" class="mt-2" />
                                    <jet-label class="text-sm tracking-wider" for="size" value="Type"/>
                                        <div class="mt-2">
                                            <select name="" v-model="form.type" id="" class="border-gray-200 rounded-md">
                                                <option value="none">None</option>
                                                <option value="single">Single Product</option>
                                                <option value="multiple">Multiple Products</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="">
                                    <jet-input-error :message="form.errors.key" class="mt-2" />
                                    <jet-label class="text-sm tracking-wider" for="size" value="Key"/>
                                        <div class="mt-2">
                                            <input v-model="form.key" class="text-sm border-gray-300 rounded-md" type="text"/>
                                        </div>
                                </div>
                           </div>
                           <div class="mt-4">
                                <jet-input-error :message="form.errors.image" class="mt-2" />
                                <jet-label class="text-sm tracking-wider" for="size" value="Image"/>
                                <div v-if="!preview" class="mt-2 border border-dashed border-gray-400">
                                    <div class="text-sm  p-12 tracking-wider text-center items-center text-blue-400">
                                        <input id="image" class="opacity-0 absolute -z-1" accept=".jpg, .png" type="file" ref="file" name="image" @change="newfile">
                                        <span>Drag and Drop / Click to Add image</span>
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="relative">
                                        <img :src="preview" class="w-1/3 h-40 border" alt="">
                                        <svg @click="remove()" xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-600 absolute top-2 left-2" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/>
                                        </svg>
                                    </div>
                                </div>
                           </div>
                       </div>
                       
                       <div class="mt-4 flex gap-4">
                           <div>
                               <button @click="create" class="bg-green-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">SUBMIT</button>
                           </div>
                           <div>
                               <button @click="newbanner = !newbanner" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                           </div>
                       </div>
                    </div>
                    <div v-show="editbanner" class="absolute bg-white w-full p-4 border shadow-lg">
                       <div class="flex border-b-2 justify-between">
                           <div>
                               <span class="text-blue-400 text-sm font-bold tracking-wide">EDIT BANNER</span>
                           </div>
                       </div>
                       <div class="flex mt-4 flex-col">
                           <div class="mt-4">
                               <jet-input-error :message="newform.errors.name" class="mt-2" />
                               <jet-label class="text-sm tracking-wider" for="size" value="Name"/>
                                <div class="mt-2">
                                    <input v-model="newform.name" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                           </div>
                           <div class="">
                               <jet-input-error :message="newform.errors.description" class="mt-2" />
                               <jet-label class="text-sm tracking-wider" for="size" value="Description"/>
                                <div class="mt-2">
                                    <textarea v-model="newform.description" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                           </div>
                           <div class="flex gap-2 mt-2">
                                <div class="">
                                    <jet-input-error :message="newform.errors.type" class="mt-2" />
                                    <jet-label class="text-sm tracking-wider" for="size" value="Type"/>
                                        <div class="mt-2">
                                            <select name="" v-model="newform.type" id="" class="border-gray-200 rounded-md">
                                                <option value="none">None</option>
                                                <option value="single">Single Product</option>
                                                <option value="multiple">Multiple Products</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="">
                                    <jet-input-error :message="newform.errors.key" class="mt-2" />
                                    <jet-label class="text-sm tracking-wider" for="size" value="Key"/>
                                        <div class="mt-2">
                                            <input v-model="newform.key" class="text-sm border-gray-300 rounded-md" type="text"/>
                                        </div>
                                </div>
                           </div>
                           <div class="mt-4">
                                <jet-input-error :message="newform.errors.image" class="mt-2" />
                                <jet-label class="text-sm tracking-wider" for="size" value="Image"/>
                                <div v-if="!editpreview" class="mt-2 border border-dashed border-gray-400">
                                    <div class="text-sm  p-12 tracking-wider text-center items-center text-blue-400">
                                        <input id="image" class="opacity-0 absolute -z-1" accept=".jpg, .png" type="file" ref="file" name="image" @change="newfileedit">
                                        <span>Drag and Drop / Click to Add image</span>
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="relative">
                                        <img :src="editpreview" class="w-1/3 h-40 border" alt="">
                                        <svg @click="removeeditpreview()" xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-600 absolute top-2 left-2" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/>
                                        </svg>
                                    </div>
                                </div>
                           </div>
                       </div>
                       
                       <div class="mt-4 flex gap-4">
                           <div>
                               <button @click="update" class="bg-green-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">SUBMIT</button>
                           </div>
                           <div>
                               <button @click="editbanner = !editbanner" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                           </div>
                       </div>
                   </div>
                    <div style="height:calc(100vh - 180px)" class="overflow-y-scroll">
                        <table class="w-full text-ct">
                            <tr class="border-b border-gray-300 text-blue-500 font-bold tracking-wider text-xs font-bold uppercase">
                                <th class="text-left p-1 py-4">
                                    <span class="">Id</span>
                                </th>
                                <th class="text-left p-1 py-4">
                                    <span class="">Name</span>
                                </th>
                                <th class="text-left p-1">
                                    <span class="">Image</span>
                                </th>
                                <th class="text-left p-1 py-4">
                                    <span class="">Descriptions</span>
                                </th>
                                <th class="text-left p-1 py-4">
                                    <span class="">Key</span>
                                </th>
                                <th class="text-left p-1 py-4">
                                    <span class="">Type</span>
                                </th>
                                <th class="text-center p-1 py-4">
                                    <span class="">Action</span>
                                </th>
                            </tr>
                            
                            <tr v-for="(banner, index) in banners" :key="banner.id" class="border-b-2 text-sm font-semibold text-gray-500 tracking-wider border-gray-200">   
                                <td class="p-1 font-bold text-left text-gray-500 py-4">
                                    {{banner.id}}
                                </td>
                                <td class="text-left font-bold p-1">{{banner.name}}</td>
                                <td class="flex justify-start ">
                                    <img class="h-12" :src="'/storage/'+banner.image" alt="">
                                </td>
                                <td class="text-left font-bold p-1">{{banner.description}}</td>
                                <td class="text-left p-1 text-xs uppercase">{{banner.key}}</td>
                                <td class="text-left font-bold p-1">{{banner.type}}</td>
                                <td class="p-1 text-xs uppercase">
                                    <div class="flex gap-2 justify-center items-center">
                                        <button @click="editbanner = !editbanner, newform.name = banner.name, newform.key = banner.key, newform.type = banner.type, newform.description = banner.key, newform.id = banner.id" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-white" viewBox="0 0 24 24">
                                                <path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/>
                                            </svg>
                                        </button>
                                        <button @click="deleteBanner(banner.id)" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-white" viewBox="0 0 24 24">
                                                <path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
              
           </div>
       </div>
   </AdminLayout>    
</template>

<script>
 import JetButton from '@/Jetstream/Button'
 import JetInput from '@/Jetstream/Input'
 import JetInputError from '@/Jetstream/InputError'
 import JetLabel from '@/Jetstream/Label'
 import JetValidationErrors from '@/Jetstream/ValidationErrors'
 import AdminLayout from '@/Layouts/AdminLayout'


 export default{
    props: ['banners'],
     components:
    {
        AdminLayout,
        JetButton,
        JetInput,
        JetInputError,
        JetValidationErrors,
        JetLabel
    },
    data(){
        return{
           newbanner: false,
           editbanner: false,
           form: this.$inertia.form({
               name  : '',
               image : '',
               key   : '',
               type  : 'none',
               description: ''
           }),
           newform: this.$inertia.form({
               id: '',
               name  : '',
               image : '',
               key   : '',
               type  : '',
               description: ''
           }),
            preview  : '',
            editpreview: '',
        }
    },

   
    methods:
    {
        formatDate(val)
        {
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var d = new Date(val)
            return d.toLocaleDateString("en-US", options); 
        },

        remove()
        {
            this.preview = '';
            this.form.image = '';
        },

        newfile(e)
        {
            let selectedFile = e.target.files[0];
            console.log(selectedFile);
            if(!selectedFile.length) {
                console.log('err');
            }
            this.form.image = selectedFile;
        },
        newfileedit(e)
        {
            let selectedFile = e.target.files[0];
            console.log(selectedFile);
            if(!selectedFile.length) {
                console.log('err');
            }
            this.newform.image = selectedFile;
        },
        create()
        {
            this.form.post('/admin/banner/add', {
                onSuccess:() => 
                {
                    alert('Success');
                    this.newbanner = !this.newbanner;
                }
            })
        },
        deleteBanner(id)
        {
            if(confirm("This Banner will be removed permanently!"))
            {
                this.$inertia.delete('/admin/banner/'+id+'/delete', {
                    onSuccess: () => 
                    {
                        alert("Success")
                    }
                })
            }
        },
        update()
        {
            this.newform.post('/admin/banner/'+this.newform.id+'/update', {
                    onSuccess: () => 
                    {
                        alert("Updated!!")
                    }
                })
        }
    },
    mounted()
    {
        
    },
    watch:
    {
        'form.image'()
        {
            if(this.form.image)
            {
                this.preview = URL.createObjectURL(this.form.image);
            }
        },
        'newform.image'()
        {
            if(this.newform.image)
            {
                this.editpreview = URL.createObjectURL(this.newform.image);
            }
        },
    }
 }
</script>

