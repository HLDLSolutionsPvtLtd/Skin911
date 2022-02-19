<template>
   <AdminLayout>
       <template #header>
           Brands
       </template>
       <div class="">
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1">
               <div class="m-2 relative">
                   <div class="flex justify-between items-center bg-gray-300 mb-2 rounded-md p-2">
                       <div class="">
                           <button @click="newbrand = !newbrand" class="p-2 bg-green-500 text-white rounded-md text-xs tracking-wider font-bold">NEW</button>
                       </div>
                       <div class="">
                           <select class="text-xs font-bold rounded-md " name="" id="">
                               <option value="">SORT BY</option>
                               <option value="">Latest</option>
                               <option value="">Popular</option>
                           </select>
                       </div>
                   </div>
                   <div v-show="newbrand" class="absolute bg-white w-full p-4 border shadow-lg">
                       <div class="flex border-b-2 justify-between">
                           <div>
                               <span class="text-blue-400 text-sm font-bold tracking-wide">NEW BRAND</span>
                           </div>
                       </div>
                       <div class="flex mt-4 flex-col">
                           <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Name"/>
                                <div class="mt-2">
                                    <input v-model="form.name" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                           </div>
                           <div class="mt-4">
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
                               <button @click="newbrand = !newbrand" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                           </div>
                       </div>
                   </div>
                   <div v-show="updatebrand" class="absolute bg-white w-full p-4 border shadow-lg">
                       <div class="flex border-b-2 justify-between">
                           <div>
                               <span class="text-blue-400 text-sm font-bold tracking-wide">EDIT BRAND</span>
                           </div>
                       </div>
                       <div class="flex mt-4 flex-col">
                           <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Name"/>
                                <div class="mt-2">
                                    <input v-model="newform.name" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                           </div>
                           <div class="mt-4">
                                <jet-label class="text-sm tracking-wider" for="size" value="Image"/>
                                <div v-if="!editpreview" class="mt-2 border border-dashed border-gray-400">
                                    <div class="text-sm  p-12 tracking-wider text-center items-center text-blue-400">
                                        <input id="image" class="opacity-0 absolute -z-1" accept=".jpg, .png" type="file" ref="file" name="image" @change="newbrandimage">
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
                               <button @click="updatebrand = !updatebrand" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                           </div>
                       </div>
                   </div>
                   <div style="height:calc(100vh - 180px)" class="overflow-y-scroll">
                        <table class="w-full text-ct">
                            <tr class="border-b-2 shadow-sm border-gray-100 text-gray-500 uppercase tracking-wider text-xs p-2">
                                <th class="text-left border-gray-300 p-2">
                                    <span class="flex pr-1">Name</span>
                                </th>
                                <th class="text-left border-gray-300 p-2">
                                    <span class="flex pr-1">Image</span>
                                </th>
                                <th class="text-center p-2">Actions</th>
                            </tr>
                            
                            <tr v-for="brand in brands" :key="brand.id" class="border-t-2 shadow-sm text-sm text-gray-500 tracking-wider border-gray-100">   
                                <td class="text-start border-gray-300 p-2">{{brand.name}}</td>
                                <td class="p-2 flex border-gray-300"><img v-if="brand.img" class="h-14 w-14 flex mr-1" :src="'/storage/'+brand.img" alt=""></td>
                                <td class="p-2">
                                    <div class="flex gap-2 justify-center items-center">
                                        <button @click="updatebrand = !updatebrand, newform.name = brand.name, newform.id = brand.id" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-white" viewBox="0 0 24 24">
                                                <path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/>
                                            </svg>
                                        </button>
                                        <button @click="deleteBrand(brand)" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
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
 
    import AdminLayout from '@/Layouts/AdminLayout'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'


 export default{
    data(){
        return{
           brands: [],
           newbrand: false,
           updatebrand: false,
           newform:this.$inertia.form({
                    id: '',
                    name: '',
                    image: '',
                }),
           form:this.$inertia.form({
                    name: '',
                    image: '',
                }),
            preview: '',
            editpreview : ''
        }
    },
     components:
    {
        AdminLayout,
        JetInputError,
        JetInput,
        JetButton,
        JetLabel,
        JetValidationErrors
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
        removeeditpreview()
        {
            this.editpreview = '';
            this.newform.image = '';
        },
        remove()
        {
            this.preview = '';
            this.form.image = '';
        },
        newbrandimage(e)
        {
            let selectedFile = e.target.files[0];
            console.log(selectedFile);
            if(!selectedFile.length) {
                console.log('err');
            }
            this.newform.image = selectedFile;
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
        update(){
            this.newform.post('/admin/brand/'+this.newform.id+'/update', {
                onSuccess:() =>
                {
                    alert("Success");
                    this.removeeditpreview();
                    this.newform.name = '';
                    this.newform.id = '';
                    this.newform.image = '';
                 }
            })
        },
        deleteBrand(brand){
            if(confirm('this brand will be permanently deleted'))
            {
                axios.delete('/admin/brand/'+brand.id+'/delete')
                .then(
                    alert('Success reload now!!'),
                )
            }
        },
        create()
        {
            this.form.post('/admin/brand/create', {
                onSuccess:() =>
                {
                    alert("Success");
                    this.remove();
                    this.form.name = '';
                }
            })
        }
    },
    mounted()
    {
        axios.get('/admin/brand/all')
        .then(res => this.brands = res.data)
        .then(error => {
            console.error(error);
        })
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

