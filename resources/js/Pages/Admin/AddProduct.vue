<template>
   <AdminLayout>
       <template #header>
           <div class="bg-blue-400">
                <div class="flex justify-between p-4">
                    <div>
                        <h5 class="text-md text-white font-mono font-semibold">ADD PRODUCT</h5>
                    </div>
                    <div class="flex">
                        <button @click="submit" type="button" class="flex text-md text-gray-500 bg-white p-2 font-mono rounded-md">SAVE</button>
                    </div>
                </div>
           </div>
       </template>
       <div class="bg-white p-5">
        <form action="">
           <div class="grid grid-cols-2 ">
               <div class="col-span-1 flex justify-center ">
                   <div class="w-2/3 p-12">
                        <div class="flex justify-center">
                            <div class="w-full">
                                    <jet-label for="productname" value="Name"/>
                                    <div>
                                        <jet-input id="productname" v-model="form.pname" class="w-full" type="text" required autofocus/>
                                    </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                                <div class="w-full">
                                    <jet-label for="description" value="Description"/>
                                    <div> 
                                        <textarea class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description" v-model="form.description" id="description" cols="30" rows="5" required/>
                                    </div>
                                </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="w-full">
                                    <jet-label for="label" value="Label"/>
                                    <div>
                                        <select v-model="form.label" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="Label" required>
                                            <option selected>Select Label</option>
                                            <option value="New Arrival">New Arrival</option>
                                            <option value="Most Popular">Most Popular</option>
                                            <option value="Trending">Trending</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="w-full">
                                    <jet-label for="brand" value="Brand"/>
                                    <div>
                                        <select v-model="form.brand" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="Label" required>
                                            <option selected>Select Brand</option>
                                            <option value="Addidas">Addidas</option>
                                            <option value="Nike">Nike</option>
                                            <option value="Puma">Puma</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="flex justify-center ">
                            <div class="w-full">
                                    <jet-label for="type" value="type"/>
                                    <div>
                                        <select v-model="form.type" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="type" required>
                                            <option selected>Select type</option>
                                            <option value="Casual Shoe">Casual Shoe</option>
                                            <option value="Bascketball shoe">Bascketball shoe</option>
                                            <option value="Formal">Formal</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="w-full">
                                    <jet-label for="category" value="Category"/>
                                    <div>
                                        <select v-model="form.category" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="category" required>
                                            <option selected>Select category</option>
                                            <option value="Men">Men</option>
                                            <option value="Woman">Woman</option>
                                            <option value="Kids">Kids</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="w-full">
                                    <jet-label for="price" value="Price"/>
                                    <div>
                                        <jet-input v-model="form.price" class="w-full" placeholder="&#8377;" type="text" required/>
                                    </div>
                                </div>
                        </div>
                   </div>
                   
               </div>
            
               <div class="col-span-1 flex justify-center">
                   <div class="w-2/3 p-12">
                    <h5>Product images:</h5>
                        <div class="flex justify-center border-dashed border border-blue-200">
                            <input id="image" class="opacity-0 absolute -z-1" type="file" ref="files" name="images[]" multiple @change="newfile">
                            <label class="p-12 text-center text-gray-400" for="image">Drag and Drop/Click to ADD image</label>
                        </div>
                        <div class="flex">
                            <div v-for="preview in previews" :key="preview">
                                <img class="flex w-20 h-20 p-1" :src="preview" alt="PREVIEW">
                            </div>
                        </div>
                   </div>
                   
               </div>
           </div>
        </form>
           <div class="grid grid-cols-2 bg-gray-200">
               <div class="col-span-1 flex justify-center">
                   <div class="w-2/3 p-12">
                        <div class="flex justify-center">
                            <div class="w-full">
                                <label class="p-1" for="variant">Variant</label>
                                <div>
                                    <input class="p-1" type="checkbox" v-on:input="check()" role="checkbox">
                                    <span class="p-1 text-gray-500">this product has different color</span>
                                    
                                    <div v-if="form.colorCheck">
                                        <div class="flex" >
                                            <div class="w-1/2">
                                                <jet-label for="size" value="Color Name"/>
                                                <div >
                                                    <jet-input v-model="color" class="w-full" type="text"/>
                                                </div>
                                            </div>
                                            <div class="w-1/2">
                                                <jet-label for="units" value="Color Code"/>
                                                <div >
                                                    <jet-input v-model="colorcode" class="w-full" type="text"/>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="w-full">
                                            <button @click.prevent="addnewcolor()" class="w-full justify-center bg-blue-500 nline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="w-full">
                                <label class="p-1" for="variant">Add Sizes</label>
                                    <select class="p-1" v-if="form.colorCheck&&dropdowncheck" v-model="selectedcolor" name="color" id="">
                                        <option v-for="col in form.colors" :key="col.name" :value="col.name">{{col.name}}</option>
                                    </select>
                                <div>                                   
                                    <div class="flex">
                                        <div class="w-1/2">
                                            <jet-label for="size" value="Size" />
                                            <div >
                                                <jet-input id="size" v-model="size" class="w-full" type="text"/>
                                            </div>
                                        </div>
                                        <div class="w-1/2">
                                            <jet-label for="units" value="Units"/>
                                            <div >
                                                <jet-input id="units" v-model="qty" class="w-full" type="text"/>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="w-full">
                                        <button @click.prevent="addnewsize()" class="w-full justify-center bg-blue-500 nline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">ADD</button>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
               </div>
               <div class="col-span-1 flex justify-center">
                    <div class="w-2/3 p-12 mt-24 ">
                        <div class="">
                            <table class="bg-white w-full">
                                <tr>
                                    <th class="text-center w-1/3">Size</th>
                                    <th class="text-center w-1/3">Quantity</th>
                                    <th class="text-center w-1/3">Action</th>
                                </tr>
                            </table>
                            <table class="bg-white w-full" v-for="color in form.colors" :key="color.name">
                                
                                <tr v-if="sizecheck">
                                        <td class="text-center w-1/3">
                                            {{color.name}}
                                        </td>
                                        <td class="text-center w-1/3">
                                            {{color.qty}}
                                        </td>
                                        <td class="w-1/3"> 
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
                                    <td class="w-1/3">
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
            this.form.post(this.route('admin.addproduct'),{
                 onFinish: () => alert('success')
            })
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

