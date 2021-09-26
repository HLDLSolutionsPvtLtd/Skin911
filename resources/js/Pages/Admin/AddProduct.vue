<template>
   <AdminLayout>
       <template #header>
           <div class="bg-dark">
                ADD Product
           </div>
       </template>
       <div class="h-screen overflow-y-scroll p-5">
            <div class="flex m-2 justify-between border border-gray-600">
                <div class="flex">
                    <div class="m-1">
                        <button @click="back()" class="flex text-xs text-blue-500 border border-white font-mono p-2 rounded-xs">
                            
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                <path fill="#fff" d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm-4.828 11.5l4.608 3.763-.679.737-6.101-5 6.112-5 .666.753-4.604 3.747h11.826v1h-11.828z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="m-1">
                        <button @click="submit" type="button" class="flex text-md text-blue-500 border border-blue-600 font-mono p-2 rounded-xs">
                            CREATE
                            <svg class="ml-1" width="24" height="24">
                                <path fill="#0f3fc7" d='M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z'></path>
                            </svg> 
                        </button>
                    </div>
                </div>
                <div v-if="message">
                    <span class="p-1 text-ct text-red-500">{{message}}</span>
                </div>
                <div class="flex">
                    <div class="m-1">
                        <button @click="resetForm()" type="button" class="flex text-md text-white border border-white font-mono p-2 rounded-xs">
                            RESET
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1" width="24" height="24">
                                <path fill="#fff" d="M1.615 11.375l-1.535-.986 5.399-.618 1.924 5.023-1.518-.961c-1.482 2.402-2.843 5.215-1.979 7.896-2.503-2.122-3.906-3.753-3.906-5.723 0-1.422.924-3.339 1.615-4.631zm4.057 5.625c-.763.931-1.002 2.887-.753 4.071.114.542.592.929 1.147.929h4.934v-5h-5.328zm10.706 5.176v1.824l-3.37-4.263 3.37-4.282v1.797c2.823-.005 5.798-.333 7.622-2.479-.484 3.246-1.131 5.298-2.805 6.336-1.209.748-3.354.973-4.817 1.067zm2.672-6.413c1.193.158 2.982-.669 3.857-1.505.401-.383.478-.993.186-1.464l-2.6-4.192-4.25 2.634 2.807 4.527zm-.937-11.561l1.61-.859-2.097 5.014-5.323-.772 1.579-.856c-1.372-2.467-3.162-5.028-5.925-5.583 1.904-.711 3.438-1.146 4.737-1.146 2.238 0 3.54 1.265 5.419 4.202zm-6.889.795c-.44-1.12-2.031-2.285-3.186-2.645-.529-.165-1.1.063-1.371.547l-2.408 4.307 4.364 2.441 2.601-4.65z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
           <div class="mb-12">
               <form action="">
                    <div class="grid grid-cols-2 ">
                        <div class="col-span-1 m-2 bg-dark">
                            <div class="flex text-ct font-bold border-b border-gray-500">
                                <span class="p-2 ml-4">Product Deatils</span>
                            </div>
                            <div class="m-6">
                                    <div class="flex justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-ct font-mono" for="productname" value="Name"/>
                                                <div>
                                                    <input id="productname" v-model="form.pname" class="w-full text-ct h-8 rounded-sm bg-dark-header" type="text" required autofocus/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center mt-2">
                                            <div class="w-full">
                                                <jet-label class="text-ct font-mono" for="description" value="Description"/>
                                                <div> 
                                                    <textarea class="w-full text-ct rounded-sm bg-dark-header" name="description" v-model="form.description" id="description" cols="30" rows="5" required/>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-ct font-mono" for="label" value="Label"/>
                                                <div>
                                                    <select v-model="form.label" class="w-full bg-dark-header placeholder-gray-100 text-ct h-8 rounded-sm" id="Label" required>
                                                        <option selected>Select Label</option>
                                                        <option value="New Arrival">New Arrival</option>
                                                        <option value="Most Popular">Most Popular</option>
                                                        <option value="Trending">Trending</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-ct font-mono" for="brand" value="Brand"/>
                                                <div>
                                                    <select v-model="form.brand" class="w-full placeholder-gray-100 text-ct h-8 rounded-sm bg-dark-header" id="Label" required>
                                                        <option selected>Select Brand</option>
                                                        <option value="Addidas">Addidas</option>
                                                        <option value="Nike">Nike</option>
                                                        <option value="Puma">Puma</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="flex mt-2 justify-center ">
                                        <div class="w-full">
                                                <jet-label class="text-ct font-mono" for="type" value="type"/>
                                                <div>
                                                    <select v-model="form.type" class="w-full placeholder-gray-100 text-ct h-8 rounded-sm bg-dark-header" id="type" required>
                                                        <option selected>Select type</option>
                                                        <option value="Casual Shoe">Casual Shoe</option>
                                                        <option value="Bascketball shoe">Bascketball shoe</option>
                                                        <option value="Formal">Formal</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-ct font-mono" for="category" value="Category"/>
                                                <div>
                                                    <select v-model="form.category" class="w-full placeholder-gray-100 text-ct h-8 rounded-sm bg-dark-header" id="category" required>
                                                        <option selected>Select category</option>
                                                        <option value="Men">Men</option>
                                                        <option value="Woman">Woman</option>
                                                        <option value="Kids">Kids</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-ct" for="price" value="Price"/>
                                                <div>
                                                    <input v-model="form.price" class="w-full text-ct placeholder-gray-100 h-8 rounded-sm bg-dark-header" placeholder="&#8377;" type="text" required/>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-span-1 m-2 bg-dark">
                            <div class="flex text-ct font-bold border-b border-gray-500">
                                <span class="p-2 ml-4">Product Images</span>
                            </div>
                            <div class="m-6">
                                    <div class="flex justify-center border-dashed border border-gray-600">
                                        <input id="image" class="opacity-0 absolute -z-1" type="file" ref="files" name="images[]" multiple @change="newfile">
                                        <label class="p-12 text-ct font-mono text-center text-gray-400" for="image">Drag and Drop/Click to ADD image</label>
                                    </div>
                            </div>
                            <div class="m-6">
                                <div class="flex container grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
                                    <div class="relative p-1" v-for="preview in previews" :key="preview">
                                        <img class="w-full h-full transition transform ease-in-out duration-500" :src="preview" alt="PREVIEW">
                                        <i @click="removeimg(preview)" class="fas fa-times-circle fa-sm absolute bg-white text-red-900 top-2 right-2 cursor-pointer hover:text-red-400"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </form>
                    <div class="grid grid-cols-2">
                        <div class="col-span-1 m-2  bg-dark">
                            <div class="flex text-ct font-bold border-b border-gray-500">
                                <span class="p-2 ml-4">Variants</span>
                            </div>
                            <div class="m-6">
                                    <div class="flex justify-center">
                                        <div class="w-full">
                                            
                                            <div>
                                                <input class="p-1 text-blue-500 h-4 rounded-sm bg-dark-header focus:ring-0" type="checkbox" v-on:input="check()" role="checkbox">
                                                <span class="p-1 text-ct">this product has different color</span>
                                                
                                                <div v-if="form.colorCheck">
                                                    <div class="flex pt-1" >
                                                        <div class="w-1/2">
                                                            <jet-label class="text-ct font-mono" for="size" value="Color Name"/>
                                                            <div >
                                                                <input v-model="color" class="w-full text-ct h-8 rounded-sm bg-dark-header" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/2">
                                                            <jet-label class="text-ct" for="units" value="Color Code"/>
                                                            <div >
                                                                <input v-model="colorcode" class="w-full text-ct h-8 rounded-sm bg-dark-header" type="text"/>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="w-full pt-1">
                                                        <button @click.prevent="addnewcolor()" class="w-full p-2 justify-center items-center bg-gray-800 border border-gray-100 rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center">
                                        <div class="w-full">
                                                <label class="text-ct font-mono" for="variant">ADD SIZE <span v-if="form.colorCheck&&dropdowncheck">for {{selectedcolor}}</span></label>
                                               <div class="flex">
                                                    <select class="flex w-1/2 placeholder-gray-100 text-ct h-8 rounded-sm bg-dark-header" v-if="form.colorCheck&&dropdowncheck" v-model="selectedcolor" name="color" id="">
                                                        <option v-for="col in form.colors" class="" :key="col.name" :value="col.name">
                                                            <span class="">{{col.name}}</span>
                                                        </option>
                                                    </select>
                                                    <button @click="removeColor()" v-if="form.colorCheck&&dropdowncheck" class="w-1/2 p-1 justify-center items-center bg-dark border border-red-100 rounded-sm font-semibold text-xs text-red-600 uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Remove</button>
                                               </div>
                                            <div class="pt-1">                                   
                                                <div class="flex">
                                                    <div class="w-1/2">
                                                        <jet-label class="text-ct font-mono" for="size" value="Size" />
                                                        <div >
                                                            <input id="size" v-model="size" class="w-full text-ct h-8 rounded-sm bg-dark-header" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="w-1/2">
                                                        <jet-label class="text-ct font-mono" for="units" value="Units"/>
                                                        <div >
                                                            <input id="units" v-model="qty" class="w-full text-ct h-8 rounded-sm bg-dark-header" type="text"/>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="w-full pt-2">
                                                    <button @click.prevent="addnewsize()" class="w-full p-2 justify-center items-center bg-gray-800 border border-gray-100 rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">ADD</button>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                        </div>
                        <div class="col-span-1 m-2 bg-dark overflow-hidden">
                            <div class="flex text-ct font-bold border-b border-gray-500">
                                <span class="p-2 ml-4">Size Table</span>
                            </div>
                                <div v-if="form.colors[0]" class="m-8 h-45 overflow-hidden">
                                    <div class="overflow-y-scroll">
                                        <table class="bg-dark text-ct border border-gray-700 w-full">
                                            <tr>
                                                <th class="text-center w-1/3">Size</th>
                                                <th class="text-center w-1/3">Quantity</th>
                                                <th class="text-center w-1/3">Action</th>
                                            </tr>
                                        </table>
                                        <table class="bg-dark border border-gray-700 text-ct w-full" v-for="color in form.colors" :key="color.name">
                                            
                                            <tr v-if="sizecheck">
                                                    <td class="text-center w-1/3">
                                                        {{color.name}}
                                                    </td>
                                                    <td class="text-center w-1/3">
                                                        {{color.qty}}
                                                    </td>
                                                    <td @click="removeSize(color)" class="w-1/3"> 
                                                        <svg class="mx-auto w-6 h-6" viewBox="0 0 20 20">
                                                            <path class="fill-current text-red-600" d="M17.114,3.923h-4.589V2.427c0-0.252-0.207-0.459-0.46-0.459H7.935c-0.252,0-0.459,0.207-0.459,0.459v1.496h-4.59c-0.252,0-0.459,0.205-0.459,0.459c0,0.252,0.207,0.459,0.459,0.459h1.51v12.732c0,0.252,0.207,0.459,0.459,0.459h10.29c0.254,0,0.459-0.207,0.459-0.459V4.841h1.511c0.252,0,0.459-0.207,0.459-0.459C17.573,4.127,17.366,3.923,17.114,3.923M8.394,2.886h3.214v0.918H8.394V2.886z M14.686,17.114H5.314V4.841h9.372V17.114z M12.525,7.306v7.344c0,0.252-0.207,0.459-0.46,0.459s-0.458-0.207-0.458-0.459V7.306c0-0.254,0.205-0.459,0.458-0.459S12.525,7.051,12.525,7.306M8.394,7.306v7.344c0,0.252-0.207,0.459-0.459,0.459s-0.459-0.207-0.459-0.459V7.306c0-0.254,0.207-0.459,0.459-0.459S8.394,7.051,8.394,7.306"></path>
                                                        </svg>
                                                    </td>
                                            </tr>
                                            <tr v-else-if="color.sizes[0]" v-for="size in color.sizes" :key="size.index">
                                                <td class="text-center w-1/3" >
                                                    {{size.name}}/{{color.name}}
                                                </td>
                                                <td class="text-center w-1/3"> 
                                                    {{size.qty}}
                                                </td>
                                                <td @click="removeColorSize(color,size)" class="w-1/3">
                                                    <svg class="mx-auto w-6 h-6" viewBox="0 0 20 20">
                                                        <path class="fill-current text-red-600" d="M17.114,3.923h-4.589V2.427c0-0.252-0.207-0.459-0.46-0.459H7.935c-0.252,0-0.459,0.207-0.459,0.459v1.496h-4.59c-0.252,0-0.459,0.205-0.459,0.459c0,0.252,0.207,0.459,0.459,0.459h1.51v12.732c0,0.252,0.207,0.459,0.459,0.459h10.29c0.254,0,0.459-0.207,0.459-0.459V4.841h1.511c0.252,0,0.459-0.207,0.459-0.459C17.573,4.127,17.366,3.923,17.114,3.923M8.394,2.886h3.214v0.918H8.394V2.886z M14.686,17.114H5.314V4.841h9.372V17.114z M12.525,7.306v7.344c0,0.252-0.207,0.459-0.46,0.459s-0.458-0.207-0.458-0.459V7.306c0-0.254,0.205-0.459,0.458-0.459S12.525,7.051,12.525,7.306M8.394,7.306v7.344c0,0.252-0.207,0.459-0.459,0.459s-0.459-0.207-0.459-0.459V7.306c0-0.254,0.207-0.459,0.459-0.459S8.394,7.051,8.394,7.306"></path>
                                                    </svg>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>   
                                </div>
                        </div>
                    </div>


           </div>
       </div>
   </AdminLayout>    
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import AdminLayout from '@/Layouts/AdminLayout'
    import axios from "axios"

 export default{
     data()
     {
         return{
             form:this.$inertia.form({
                    pname: '',
                    description: '',
                    label: '',
                    type: '',
                    brand: '',
                    category: '',
                    price : '',
                    images: [],
                    colors : [],
                    colorCheck : false,

                }),
             message: '',
             previews : [],
             size : '',
             qty  : '',
             selectedcolor: '',
             selectedindex: '',
             color: '',
             colorcode: '',
             sizecheck : false,
             dropdowncheck: false,
             checked : false,
             response: [],
         }
     },
    
     components:
    {
        AdminLayout,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors
    },
    methods:
    {
        check(){
            this.form.colorCheck = !this.form.colorCheck;
            if(this.checked)
            {
                this.dropdowncheck = !this.dropdowncheck;
            }
            this.checked = true;
            this.form.colors = [];
            this.sizecheck = false;
        },
        addnewcolor(){
             let newcolor = {
                 'name' : this.color,
                 'code' : this.colorcode,
                 'sizes': [],
             };
            this.form.colors.push(newcolor);
            this.color = '';
            this.colorcode = '';
            console.log(this.form.colors);
            this.dropdowncheck = true;
            this.selectedcolor = newcolor.name;
        },
        addnewsize(){
            if(!this.form.colorCheck)
            {
                this.sizecheck = true;
            }
            let newsize = {
                 'name' : this.size,
                 'qty' : this.qty,
             };
            if(!this.form.colorCheck)
            {
                this.form.colors.push(newsize);
                console.log(this.colors);
                this.size = '';
                this.qty = '';
            }
            else
            {
                if(this.selectedcolor === null)
                {
                    console.log('color not selected error');
                }
                else
                {
                    var index = this.arrayindex();
                    if(index === -1)
                    {
                        console.log('array not found');
                    }
                    else
                    {
                        this.form.colors[index].sizes.push(newsize);
                        console.log(this.form.colors);
                        this.size = '';
                        this.qty = '';
                    }

                }
                
                
            }

        },
        arrayindex()
        {
            return this.form.colors.findIndex( element => {
                
                if (element.name === this.selectedcolor) {
                    return true;
                }
            });
        },
        newfile(e)
        {
            let selectedFiles = e.target.files;

            if(!selectedFiles.length) {
                return false;
                console.log('err');
            }

            for (let i = 0; i < this.$refs.files.files.length; i++){
                this.form.images.push(selectedFiles[i]);
            }
        },
        submit(){
            
            console.log(this.form);
            axios.post(this.route('admin.addproduct'))
            .then(res => this.response = res.data)
            .then(error =>
            {
                console.error(error);
            });
        },
        removeimg(preview)
        {
            var index = this.previews.findIndex( element => {
                
                if (element === preview) {
                    return true;
                }
            });
            this.form.images.splice(index,1);
        },
        removeColorSize(color,size)
        {
            var index = this.form.colors.findIndex(el =>{
                if (el === color) {
                    return true;
                }
            });
            var size_index = this.form.colors[index].sizes.findIndex(el =>{
                if (el === size) {
                    return true;
                }
            });
            this.form.colors[index].sizes.splice(size_index,1);
            if(this.form.colors[0])
            {
                this.selectedcolor = this.form.colors[0].name;
            }
            else
            {
                this.selectedcolor = '';
                this.dropdowncheck = false;
            }
        },
        removeSize(size)
        {
            var index = this.form.colors.findIndex(el =>{
                if (el === size) {
                    return true;
                }
            });
            this.form.colors.splice(index,1);
        },
        removeColor()
        {
            var index = this.form.colors.findIndex(el =>{
                if (el.name === this.selectedcolor) {
                    return true;
                }
            })
            
            this.form.colors.splice(index,1);
            if(this.form.colors[0])
            {
                this.selectedcolor = this.form.colors[0].name;
            }
            else
            {
                this.selectedcolor = '';
                this.dropdowncheck = false;
            }
        },
        back() {
            window.history.back();
        },
        resetForm()
        {
            this.form = {
                    pname: '',
                    description: '',
                    label: '',
                    type: '',
                    brand: '',
                    category: '',
                    price : '',
                    images: [],
                    colors : [],
                    colorCheck : false,

                };
        }

    },
    watch:
    {
        'form.images':
        {
            handler(val, oldVal) {
                this.previews = [];
                for (let i = 0; i < this.form.images.length; i++){
                    this.previews.push(URL.createObjectURL(this.form.images[i]));
                    console.log('gg');
                }
            },
            deep: true
            
        }
    },
   
 }
</script>

