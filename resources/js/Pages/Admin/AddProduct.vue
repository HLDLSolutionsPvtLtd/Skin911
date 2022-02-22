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
                    
                    <div class="grid grid-cols-2 bg-white">
                        <div class="flex m-4 col-span-2 text-sm border-b font-bold">
                            <span class="p-2 ml-4 text-gray-700 text-xs tracking-wide">PRODUCT DETAILS</span>
                        </div>
                        <div class="col-span-1 p-4 mr-1 bg-white">
                           
                            <div class="mx-6">
                                    <div class="flex justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-sm  tracking-wider my-1" for="productname" value="Name"/>
                                                <div>
                                                    <jet-input-error :message="form.errors.name" class="mt-2" />
                                                    <input id="productname" v-model="form.name" class="w-full  tracking-wider my-1 text-sm rounded-md border border-gray-200" type="text" required autofocus/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center mt-2">
                                            <div class="w-full">
                                                <jet-label class="text-sm  tracking-wider my-1" for="description" value="Description"/>
                                                <div> 
                                                    <jet-input-error :message="form.errors.description" class="mt-2" />
                                                    <textarea class="w-full text-sm my-1 rounded-md  tracking-wider border border-gray-200" name="description" v-model="form.description" id="description" cols="30" rows="5" required/>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-sm  tracking-wider my-1" for="brand" value="Brand"/>
                                                <div>
                                                    <jet-input-error :message="form.errors.brand_id" class="mt-2" />
                                                    <select v-model="form.brand_id" class="w-full placeholder-gray-100 my-1  tracking-wider text-sm rounded-md border border-gray-200" id="Label" required>
                                                        <option selected value="">Select Brand</option>
                                                        <option v-for="brand in brands" :key="brand.id" :value="brand.name">{{brand.name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                                <jet-label class="text-sm  tracking-wider my-1" for="category" value="Category"/>
                                                <div>
                                                    <jet-input-error :message="form.errors.category_id" class="mt-2" />
                                                    <select v-model="form.category_id" class="w-full placeholder-gray-100  tracking-wider text-sm my-1 rounded-md border border-gray-200" id="category" required>
                                                        <option selected value="">Select category</option>
                                                        <option v-for="category in categories" :key="category.id" :value="category.name">{{category.name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                            <jet-label class="text-sm  tracking-wider my-1" for="price" value="Price"/>
                                            <div>
                                                <jet-input-error :message="form.errors.price" class="mt-2" />
                                                <input v-model="form.price" class="w-full text-sm  tracking-wider placeholder-gray-100 my-1 rounded-md border border-gray-200" placeholder="&#8377;" type="text" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex mt-2 justify-center">
                                        <div class="w-full">
                                            <jet-label class="text-sm  tracking-wider my-1" for="quantity" value="Quantity"/>
                                            <div>
                                                <jet-input-error :message="form.errors.quantity" class="mt-2" />
                                                <input v-model="form.quantity" class="w-full text-sm  tracking-wider placeholder-gray-100 my-1 rounded-md border border-gray-200" placeholder="&#8377;" type="number" required/>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-span-1 bg-white ml-1 p-4">
                            <div class="mx-6">
                                    <div class="flex text-sm font-bold border-b">
                                        <span class="pb-2  tracking-wide">Image :</span>
                                    </div>
                                    <div class="p-12 border border-dashed border-gray-400">
                                        <div class="text-sm  p-12 tracking-wider text-center items-center ">
                                            <input id="image" class="opacity-0 absolute -z-1" type="file" ref="files" name="images[]" multiple @change="newfile">
                                            <span>Drag and Drop / Click to Add images</span>
                                        </div>
                                    </div>
                            </div>
                            <div class="m-6">
                                <div class="flex container grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
                                    <div class="relative p-1" v-for="preview in previews" :key="preview">
                                        <img class="w-full h-full transition transform ease-in-out duration-500" :src="preview" alt="PREVIEW">
                                        <i @click="removeimg(preview)" class="absolute top-2 right-2 cursor-pointer hover:text-red-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-600" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5 15.538l-3.592-3.548 3.546-3.587-1.416-1.403-3.545 3.589-3.588-3.543-1.405 1.405 3.593 3.552-3.547 3.592 1.405 1.405 3.555-3.596 3.591 3.55 1.403-1.416z"/>
                                            </svg>
                                        </i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </form>
                    <div class="grid grid-cols-2 p-2 bg-white">
                        <div class="col-span-1 ">
                            <div class="flex">
                                <span class="p-2 ml-4 uppercase text-xs font-bold tracking-wider">Variants </span>
                            </div>
                            <div class="mx-6">
                                    <div class="flex justify-center">
                                        <div class="w-full my-1">
                                            
                                            <div>
                                                <div class="flex items-center">
                                                    <input class="p-1 text-blue-500 h-4 rounded-sm cursor-pointer focus:ring-0 mr-1" type="checkbox" v-on:input="check()" role="checkbox">
                                                    <span class="p-1 text-sm text-blue-400 flex pr-2">This product has different variants</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="fill-current text-purple-400" viewBox="0 0 24 24">
                                                        <path d="M13.25 7c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25zm10.75 5c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-2 0c0-5.514-4.486-10-10-10s-10 4.486-10 10 4.486 10 10 10 10-4.486 10-10zm-13-2v2h2v6h2v-8h-4z"/>
                                                    </svg>
                                                </div>
                                                
                                                <div v-if="checked">
                                                    <div class="py-2">
                                                        <span class="text-sm text-red-400">{{message}}</span>
                                                    </div>
                                                    <div class="flex pt-2 gap-2" >
                                                        <div class="w-1/2">
                                                            <jet-label class="text-sm font-mono" for="size" value="Name"/>
                                                            <div >
                                                                <input v-model="variant" class="w-full text-sm h-8 rounded-sm" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/2">
                                                            <jet-label class="text-sm" for="units" value="Price"/>
                                                            <div >
                                                                <input v-model="variant_price" class="w-full text-sm h-8 rounded-sm" type="text"/>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="flex pt-2 gap-2" >
                                                        <div class="w-1/2">
                                                            <jet-label class="text-sm font-mono" for="quantity" value="Quantity"/>
                                                            <div >
                                                                <input v-model="quantity" class="w-full text-sm h-8 rounded-sm" type="number"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full pt-2">
                                                        <button @click.prevent="addnewVariant()" class="w-full p-2 justify-center items-center bg-blue-400 font-bold rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-span-1 p-2 mt-2 bg-white overflow-hidden">
                            
                                <div v-if="form.variants[0]" class="mx -8 h-45 overflow-hidden">
                                    <div class="flex text-sm font-bold">
                                        <span class="">Variants</span>
                                    </div>
                                    <div class="">
                                        <table class="text-sm mt-4 border border-gray-700 w-full">
                                            <tr>
                                                <th class="text-center w-1/3">Name</th>
                                                <th class="text-center w-1/3">Price</th>
                                                <th class="text-center w-1/3">Quantity</th>
                                                <th class="text-center w-1/3">Action</th>
                                            </tr>
                                            <template  v-for="variant in form.variants" :key="variant.name">
                                                <tr class= "border border-gray-700 text-sm w-full">
                                                    <td class="text-center w-1/4">
                                                        {{variant.name}}
                                                    </td>
                                                    <td class="text-center w-1/4">
                                                        {{variant.price}}
                                                    </td>
                                                    <td class="text-center w-1/4">
                                                        {{variant.quantity}}
                                                    </td>
                                                    <td @click="removeVariant(variant)" class="w-1/4 cursor-pointer hover:bg-red-100"> 
                                                        <svg class="mx-auto w-6 h-6" viewBox="0 0 20 20">
                                                            <path class="fill-current text-red-600" d="M17.114,3.923h-4.589V2.427c0-0.252-0.207-0.459-0.46-0.459H7.935c-0.252,0-0.459,0.207-0.459,0.459v1.496h-4.59c-0.252,0-0.459,0.205-0.459,0.459c0,0.252,0.207,0.459,0.459,0.459h1.51v12.732c0,0.252,0.207,0.459,0.459,0.459h10.29c0.254,0,0.459-0.207,0.459-0.459V4.841h1.511c0.252,0,0.459-0.207,0.459-0.459C17.573,4.127,17.366,3.923,17.114,3.923M8.394,2.886h3.214v0.918H8.394V2.886z M14.686,17.114H5.314V4.841h9.372V17.114z M12.525,7.306v7.344c0,0.252-0.207,0.459-0.46,0.459s-0.458-0.207-0.458-0.459V7.306c0-0.254,0.205-0.459,0.458-0.459S12.525,7.051,12.525,7.306M8.394,7.306v7.344c0,0.252-0.207,0.459-0.459,0.459s-0.459-0.207-0.459-0.459V7.306c0-0.254,0.207-0.459,0.459-0.459S8.394,7.051,8.394,7.306"></path>
                                                        </svg>
                                                    </td>
                                                </tr>
                                            </template>
                                        </table>
                                    </div>   
                                </div>
                        </div>
                    </div>
                    <div class="bg-white pt-2">
                        <div class="w-full mx-8 py-4 flex">
                            <button @click="submit()" class="p-2 text-xs font-bold tracking-wider rounded-sm shadow-md bg-blue-300 text-pink-800">CREATE</button>
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
    import JetInputError from '@/Jetstream/InputError'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import AdminLayout from '@/Layouts/AdminLayout'

 export default{
     data()
     {
         return{
             brands: [],
             categories: [],
             form:this.$inertia.form({
                    name: '',
                    description: '',
                    brand_id: '',
                    category_id: '',
                    price : '',
                    images: [],
                    variants : [],
                    quantity: 0

                }),
             message: '',
             previews : [],
             quantity: 0,
             variant: '',
             variant_price: '',
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
        JetInputError,
        JetCheckbox,
        JetLabel,
        JetValidationErrors
    },
    methods:
    {
        check(){
            this.checked = !this.checked;
            this.form.variants = [];
            this.variant_price = '';
            this.quantity = 0;
            this.variant = '';
        },
        addnewVariant(){
             if(this.variant && this.variant_price)
             {
                this.message = '';
                let newvariant = {
                    'name' : this.variant,
                    'price' : this.variant_price,
                    'quantity' : this.quantity
                };
                this.form.variants.push(newvariant);
                this.variant = '';
                this.variant_price = '';
             }
             else
             {
                 this.message = "please fill all the input fields!"
             }
        },
        arrayindex()
        {
            return this.form.variants.findIndex( element => {
                
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
            
            this.form.post('/admin/product/new', {
                onSuccess:() =>
                {
                    this.resetForm();
                    alert("scuccess");
                }
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
        
        removeVariant(variant)
        {
            var index = this.form.variants.findIndex(el =>{
                if (el.name === variant) {
                    return true;
                }
            })
            
            this.form.variants.splice(index,1);
        },
        back() {
            window.history.back();
        },
        resetForm()
        {
            this.form.name = '';
            this.form.description = '';
            this.form.label = '';
            this.form.category = '';
            this.form.price  = '';
            this.form.images = [];
            this.form.variants  = [];
        }

    },
    mounted() {
        axios.get('/admin/category/all')
        .then(res => this.categories = res.data);
        axios.get('/admin/brand/all')
        .then(res => this.brands = res.data);
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

