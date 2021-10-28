<template>
   <AdminLayout>
       <template #header>
           <div class="">
                ADD PRODUCT
           </div>
       </template>
       <div class="h-screen overflow-y-scroll p-5">
            
           <div class="mb-12">
               <form action="">
                    <div class="grid grid-cols-2">
                        <div class="col-span-1 p-4 mr-1 bg-white">
                            <div class="flex text-sm border-b font-bold">
                                <span class="p-2 ml-4">Product Deatils</span>
                            </div>
                            <div class="m-6">
                                    <div class="flex justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-sm font-bold my-1" for="productname" value="Name"/>
                                                <div>
                                                    <input id="productname" v-model="form.pname" class="w-full my-1 text-sm rounded-md border border-gray-200" type="text" required autofocus/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center mt-2">
                                            <div class="w-full">
                                                <jet-label class="text-sm font-bold my-1" for="description" value="Description"/>
                                                <div> 
                                                    <textarea class="w-full text-sm my-1 rounded-md border border-gray-200" name="description" v-model="form.description" id="description" cols="30" rows="5" required/>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-sm font-bold my-1" for="label" value="Label"/>
                                                <div>
                                                    <select v-model="form.label" class="w-full placeholder-gray-100 text-sm text-sm my-1 rounded-md border border-gray-200" id="Label" required>
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
                                                <jet-label class="text-sm font-bold my-1" for="brand" value="Brand"/>
                                                <div>
                                                    <select v-model="form.brand" class="w-full placeholder-gray-100 my-1 text-sm rounded-md border border-gray-200" id="Label" required>
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
                                                <jet-label class="text-sm font-bold my-1" for="type" value="Type"/>
                                                <div>
                                                    <select v-model="form.type" class="w-full placeholder-gray-100 text-sm rounded-md my-1 border border-gray-200" id="type" required>
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
                                                <jet-label class="text-sm font-bold my-1" for="category" value="Category"/>
                                                <div>
                                                    <select v-model="form.category" class="w-full placeholder-gray-100 text-sm my-1 rounded-md border border-gray-200" id="category" required>
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
                                                <jet-label class="text-sm font-bold my-1" for="price" value="Price"/>
                                                <div>
                                                    <input v-model="form.price" class="w-full text-sm placeholder-gray-100 my-1 rounded-md border border-gray-200" placeholder="&#8377;" type="text" required/>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-span-1 bg-white ml-1 p-4">
                            <div class="flex text-sm font-bold border-b">
                                <span class="p-2 ml-4">Product Images</span>
                            </div>
                            <div class="m-6">
                                    <div class="p-12 border border-dashed border-gray-300">
                                        <div class="text-sm  p-12 font-mono text-center items-center text-gray-400">
                                            <input id="image" class="opacity-0 absolute -z-1" type="file" ref="files" name="images[]" multiple @change="newfile">
                                            <span>Drag and Drop/Click to ADD image</span>
                                        </div>
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
                        <div class="col-span-1 p-2 mt-2 bg-white">
                            <div class="flex text-sm font-bold">
                                <span class="p-2 ml-4">Variants</span>
                            </div>
                            <div class="m-6">
                                    <div class="flex justify-center">
                                        <div class="w-full my-1">
                                            
                                            <div>
                                                <input class="p-1 text-blue-500 h-4 rounded-sm focus:ring-0" type="checkbox" v-on:input="check()" role="checkbox">
                                                <span class="p-1 text-sm">this product has different color</span>
                                                
                                                <div v-if="form.colorCheck">
                                                    <div class="flex pt-1" >
                                                        <div class="w-1/2">
                                                            <jet-label class="text-sm font-mono" for="size" value="Color Name"/>
                                                            <div >
                                                                <input v-model="color" class="w-full text-sm h-8 rounded-sm" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/2">
                                                            <jet-label class="text-sm" for="units" value="Color Code"/>
                                                            <div >
                                                                <input v-model="colorcode" class="w-full text-sm h-8 rounded-sm" type="text"/>
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
                                                <label class="text-sm my-1 font-mono" for="variant">ADD SIZE <span v-if="form.colorCheck&&dropdowncheck">for {{selectedcolor}}</span></label>
                                               <div class="flex">
                                                    <select class="flex w-1/2 placeholder-gray-100 text-sm h-8 rounded-sm" v-if="form.colorCheck&&dropdowncheck" v-model="selectedcolor" name="color" id="">
                                                        <option v-for="col in form.colors" class="" :key="col.name" :value="col.name">
                                                            <span class="">{{col.name}}</span>
                                                        </option>
                                                    </select>
                                                    <button @click="removeColor()" v-if="form.colorCheck&&dropdowncheck" class="w-1/2 p-1 justify-center items-center  border border-red-100 rounded-sm font-semibold text-xs text-red-600 uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Remove</button>
                                               </div>
                                            <div class="pt-1">                                   
                                                <div class="flex">
                                                    <div class="w-1/2">
                                                        <jet-label class="text-sm font-mono" for="size" value="Size" />
                                                        <div >
                                                            <input id="size" v-model="size" class="w-full text-sm h-8 rounded-sm" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="w-1/2">
                                                        <jet-label class="text-sm font-mono" for="units" value="Units"/>
                                                        <div >
                                                            <input id="units" v-model="qty" class="w-full text-sm h-8 rounded-sm" type="text"/>
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
                        <div class="col-span-1 p-2 mt-2 bg-white overflow-hidden">
                            <div class="flex text-sm font-bold">
                                <span class="p-2 ml-4">Size Table</span>
                            </div>
                                <div v-if="form.colors[0]" class="m-8 h-45 overflow-hidden">
                                    <div class="overflow-y-scroll">
                                        <table class="text-sm border border-gray-700 w-full">
                                            <tr>
                                                <th class="text-center w-1/3">Size</th>
                                                <th class="text-center w-1/3">Quantity</th>
                                                <th class="text-center w-1/3">Action</th>
                                            </tr>
                                        </table>
                                        <table class= "border border-gray-700 text-sm w-full" v-for="color in form.colors" :key="color.name">
                                            
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

