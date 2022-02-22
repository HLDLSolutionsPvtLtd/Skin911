<template>
   <AdminLayout>
       <template #header>
           Discounts
       </template>
       <div class="">
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1">
               <div class="m-2 relative">
                   <div class="flex justify-between items-center bg-gray-300 mb-2 rounded-md p-2">
                       <div class="">
                           <button @click="newdiscount = !newdiscount" class="p-2 bg-green-500 text-white rounded-md text-xs tracking-wider font-bold">NEW</button>
                       </div>
                       <div class="">
                           <select class="text-xs font-bold rounded-md " name="" id="">
                               <option value="">SORT BY</option>
                               <option value="">Latest</option>
                               <option value="">Popular</option>
                           </select>
                       </div>
                   </div>
                   <div v-show="newdiscount" class="absolute bg-white w-full p-4 border shadow-lg">
                       <div class="flex border-b-2 justify-between">
                           <div>
                               <span class="text-blue-400 text-sm font-bold tracking-wide">NEW DISCOUNT</span>
                           </div>
                       </div>
                       <div class="flex mt-4 flex-col">
                           <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Name"/>
                                <div class="mt-2">
                                    <input v-model="form.name" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                           </div>
                           <div class="flex gap-2 mt-2">
                               <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Type"/>
                                    <div class="mt-2">
                                        <select name="" class="border-gray-300 text-sm rounded-md" v-model="form.type" id="">
                                            <option value="" selected>Select Type</option>
                                            <option value="fixed_amount">Fixed Amount</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Amount"/>
                                        <div class="mt-2">
                                            <input v-model="form.amount" class="text-sm border-gray-300 rounded-md" type="text"/>
                                        </div>
                                </div>
                           </div>
                           <div class="flex gap-2 mt-2">
                               <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Valid From"/>
                                    <input type="date" v-model="form.valid_from" class="text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Valid Upto"/>
                                    <input type="date" v-model="form.valid_upto" class="text-sm border-gray-300 rounded-md">
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
                               <button @click="newdiscount = !newdiscount" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                           </div>
                       </div>
                   </div>
                   <div v-show="updatediscount" class="absolute bg-white w-full p-4 border shadow-lg">
                       <div class="flex border-b-2 justify-between">
                           <div>
                               <span class="text-blue-400 text-sm font-bold tracking-wide">EDIT DISCOUNT</span>
                           </div>
                       </div>
                       <div class="flex mt-4 flex-col">
                           <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Name"/>
                                <div class="mt-2">
                                    <input v-model="newform.name" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                           </div>
                           <div class="flex gap-2 mt-2">
                               <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Type"/>
                                    <div class="mt-2">
                                        <select name="" class="border-gray-300 text-sm rounded-md" v-model="newform.type" id="">
                                            <option value="" selected>Select Type</option>
                                            <option value="fixed_amount">Fixed Amount</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Amount"/>
                                        <div class="mt-2">
                                            <input v-model="newform.amount" class="text-sm border-gray-300 rounded-md" type="text"/>
                                        </div>
                                </div>
                           </div>
                           <div class="flex gap-2 mt-2">
                               <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Valid From"/>
                                    <input type="date" v-model="newform.valid_from" class="text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="">
                                    <jet-label class="text-sm tracking-wider" for="size" value="Valid Upto"/>
                                    <input type="date" v-model="newform.valid_upto" class="text-sm border-gray-300 rounded-md">
                                </div>

                           </div>
                           <div class="mt-4">
                                <jet-label class="text-sm tracking-wider" for="size" value="Image"/>
                                <div v-if="!editpreview" class="mt-2 border border-dashed border-gray-400">
                                    <div class="text-sm  p-12 tracking-wider text-center items-center text-blue-400">
                                        <input id="image" class="opacity-0 absolute -z-1" accept=".jpg, .png" type="file" ref="file" name="image" @change="newdiscountimage">
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
                               <button @click="updatediscount = !updatediscount" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                           </div>
                       </div>
                   </div>
                    <div style="height:calc(100vh - 180px)" class="overflow-y-scroll">
                        <table class="w-full text-ct">
                            <tr class="text-gray-500 font-bold tracking-wider text-xs font-bold uppercase">
                                <th class="text-left  p-2">
                                    <span class="pr-1">Name</span>
                                </th>
                                <th class="text-left  p-2">
                                    <span class="flex pr-1">Type</span>
                                </th>
                                <th class="text-left  p-2">
                                    <span class="flex pr-1">Amount</span>
                                </th>
                                <th class="text-left  p-2">
                                    <span class="flex pr-1">Image</span>
                                </th>
                                <th class="text-center p-2">Actions</th>
                            </tr>
                            
                            <tr v-for="discount in discounts" :key="discount.id" class="border-t-2 shadow-sm text-sm text-gray-500 tracking-wider border-gray-100">   
                                <td class="text-left  p-2">{{discount.name}}</td>
                                <td class="p-2 ">{{discount.type}}</td>
                                <td class="p-2 ">{{discount.amount}}</td>
                                <td class="text-center  p-2">
                                    <img v-if="discount.img" class="h-14 w-14 flex mr-1" :src="'/storage/'+discount.img" alt="">
                                </td>
                                <td class="p-2">
                                    <div class="flex gap-2 justify-center items-center">
                                        <button @click="updatediscount = !updatediscount,newform.valid_upto = discount.valid_upto, newform.valid_from = discount.valid_from, newform.name = discount.name,newform.id = discount.id, newform.type = discount.type, newform.amount = discount.amount" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-indigo-900" viewBox="0 0 24 24">
                                                <path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/>
                                            </svg>
                                        </button>
                                        <button @click="deleteDiscount(discount)" class="flex items-center justify-center font-bold text-sm text-red-700 p-2 bg-red-400 rounded-md shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-red-800" viewBox="0 0 24 24">
                                                <path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/>
                                            </svg>
                                        </button>
                                        <button @click="selectedDiscount = discount" class="flex items-center justify-center font-bold text-xs text-white p-2 bg-green-400 rounded-md shadow-lg tracking-widest">
                                            APPLY
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                   
                    <div v-if="selectedDiscount" style="height:calc(100vh - 100px);" class="w-full no-scrollbar overflow-y-scroll border bg-white absolute top-0 shadow-lg rounded-lg">
                        <div class="flex justify-between p-4 border-b">
                            <div class="flex items-center gap-2">
                                <span :class="{'bg-gray-300': active == 'items'}" @click="active = 'items'" class="uppercase p-2 bg-gray-100 rounded-md text-xs font-bold tracking-wider text-gray-500">Discount Items</span>
                                <div>
                                    <span  :class="{'bg-gray-300': active == 'add'}" @click="active = 'add'" class="text-xs  p-2 bg-gray-100 rounded-md font-bold tracking-wider text-gray-500">ADD</span>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button @click="selectedDiscount = ''" class="uppercase bg-red-400 rounded-md p-1 px-2 text-xs font-bold tracking-widest text-white">CLOSE</button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div v-if="active == 'add'" class="">
                                <div class="flex justify-between">
                                    <div class="flex gap-2">
                                        <span :class="{'bg-gray-300': selectToadd == 'products'}" @click="selectToadd = 'products'" class="p-2 bg-gray-100 rounded-md text-xs font-bold tracking-wider text-gray-500">Products</span>
                                        <span  :class="{'bg-gray-300': selectToadd == 'categories'}" @click="selectToadd = 'categories'" class="text-xs  p-2 bg-gray-100 rounded-md font-bold tracking-wider text-gray-500">Categories</span>
                                        <span  :class="{'bg-gray-300': selectToadd == 'brands'}" @click="selectToadd = 'brands'" class="text-xs  p-2 bg-gray-100 rounded-md font-bold tracking-wider text-gray-500">Brands</span>
                                    </div>
                                    <div v-if="selectedItems.length">
                                        <button @click="addToDiscount()" class="bg-red-400 rounded-md p-2 text-xs font-bold tracking-widest text-white">ADD</button>
                                    </div>
                                </div>
                               
                                <table v-show="selectToadd == 'products'" class="border border-gray-300 w-full text-ct mt-4">
                                    <tr class="border-b border-gray-300 text-gray-400 tracking-wider text-sm">
                                        <th class="text-left border-r border-gray-300 p-2">
                                            Select
                                        </th>
                                        <th class="text-left border-r border-gray-300 p-2">
                                            <span class="flex pr-1">Name</span>
                                        </th>
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="flex pr-1">Type</span>
                                        </th>
                                        <th class="text-left border-r border-gray-300 p-2">
                                            <span class="flex pr-1">Categories</span>
                                        </th>
                                        <th class="text-left border-r border-gray-300 p-2">
                                            <span class="flex pr-1">Price</span>
                                        </th>
                                        <th class="text-left border-r border-gray-300 p-2">
                                            <span class="flex pr-1">Quantity</span>
                                        </th>
                                        <th class="text-left border-r border-gray-300 p-2">
                                            <span class="flex pr-1">Variant</span>
                                        </th>
                                    </tr>
                                    
                                    <tr v-for="product in products" :key="product.id" class="border-b text-sm text-gray-500 tracking-wider border-gray-300">   
                                        <td class="p-2 text-center border-r border-gray-300">
                                            <input type="checkbox" :value="product.id" v-model="selectedItems">
                                        </td>
                                        <td class="p-2 flex border-r border-gray-300">
                                            <img v-if="product.image[0]" class="h-14 w-14 flex mr-1" :src="'/storage/'+product.image[0].link" alt="">
                                            <span class="flex self-center justify-center text-md text-center font-bold">{{product.name}}</span>
                                        </td>
                                        <td class="text-center border-r border-gray-300 p-2">{{product.brand_id}}</td>
                                        <td class="text-center border-r border-gray-300 p-2">{{product.category_id}}</td>
                                        <td class="text-center border-r border-gray-300 p-2">{{product.price}}</td>
                                        <td class="text-center border-r border-gray-300 p-2">{{product.quantity}}</td>
                                        <td class="text-center border-r border-gray-300 p-2">{{product.variant.length}}</td>
                                    </tr>
                                    
                                </table>
                                <table v-show="selectToadd === 'brands'" class="border border-gray-300 w-full text-ct mt-4">
                                    <tr class="border-b border-gray-300 text-gray-400 tracking-wider text-sm">
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="flex justify-center pr-1">Select</span>
                                        </th>
                                        <th class="text-left border-r border-gray-300 p-2">
                                            <span class="flex pr-1">Name</span>
                                        </th>
                                        <th class="text-left border-r border-gray-300 p-2">
                                            <span class="flex pr-1">Image</span>
                                        </th>
                                    </tr>
                                    
                                    <tr v-for="brand in brands" :key="brand.id" class="border-b text-sm text-gray-500 tracking-wider border-gray-300">   
                                        <td class="p-2 text-center border-r border-gray-300">
                                            <input type="checkbox" :value="brand.id" v-model="selectedItems">
                                        </td>
                                        <td class="text-center border-r border-gray-300 p-2">{{brand.name}}</td>
                                        <td class="p-2 flex border-r border-gray-300"><img v-if="brand.img" class="h-14 w-14 flex mr-1" :src="'/storage/'+brand.img" alt=""></td>
                                    </tr>
                                    
                                </table>
                                <table v-show="selectToadd == 'categories'" class="border border-gray-300 w-full text-ct mt-4">
                                    <tr class="border-b border-gray-300 text-gray-400 tracking-wider text-sm">
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="pr-1">Select</span>
                                        </th>
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="pr-1">Name</span>
                                        </th>
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="pr-1">Image</span>
                                        </th>
                                    </tr>
                                    
                                    <tr v-for="category in categories" :key="category.id" class="border-b text-sm text-gray-500 tracking-wider border-gray-300">   
                                        <td class="p-2 text-center border-r border-gray-300">
                                            <input type="checkbox" :value="category.id" v-model="selectedItems">
                                        </td>
                                        <td class="text-center border-r border-gray-300 p-2">{{category.name}}</td>
                                        <td class="p-2 flex justify-center border-r border-gray-300"><img v-if="category.img" class="h-14 w-14 flex mr-1" :src="'/storage/'+category.img" alt=""></td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <div v-show="active == 'items'">
                                 <div>
                                     <table class="border border-gray-300 w-full text-ct mt-4">
                                    <tr class="border-b border-gray-300 text-gray-400 tracking-wider text-sm">
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="pr-1">Type</span>
                                        </th>
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="pr-1">Name</span>
                                        </th>
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="pr-1">Image</span>
                                        </th>
                                        <th class="text-center border-r border-gray-300 p-2">
                                            <span class="pr-1">Actions</span>
                                        </th>
                                    </tr>
                                    <template v-for="category in discounts[findIndex(selectedDiscount)].categories" :key="category.id">
                                        <tr  class="border-b text-sm text-gray-500 tracking-wider border-gray-300">   
                                            <td class="p-2 text-center border-r border-gray-300">
                                                Category
                                            </td>
                                            <td class="text-center border-r border-gray-300 p-2">{{category.name}}</td>
                                            <td class="p-2 flex justify-center border-r border-gray-300"><img v-if="category.img" class="h-14 w-14 flex mr-1" :src="'/storage/'+category.img" alt=""></td>
                                            <td class="text-center border-r border-gray-300 p-2">
                                                 <button @click="removefromDiscount('category', category)" class="bg-red-400 p-2 text-xs tracking-wider rounded-md text-white font-bold">REMOVE</button>
                                            </td>
                                        </tr>
                                    </template>
                                    <template v-for="brand in discounts[findIndex(selectedDiscount)].brands" :key="brand.id">
                                        <tr  class="border-b text-sm text-gray-500 tracking-wider border-gray-300">   
                                            <td class="p-2 text-center border-r border-gray-300">
                                                Brand
                                            </td>
                                            <td class="text-center border-r border-gray-300 p-2">{{brand.name}}</td>
                                            <td class="p-2 flex justify-center border-r border-gray-300"><img v-if="brand.img" class="h-14 w-14 flex mr-1" :src="'/storage/'+brand.img" alt=""></td>
                                            <td class="text-center border-r border-gray-300 p-2">
                                                 <button @click="removefromDiscount('brand', brand)" class="bg-red-400 p-2 text-xs tracking-wider rounded-md text-white font-bold">REMOVE</button>
                                            </td>
                                        </tr>
                                    </template>
                                    <template v-for="product in discounts[findIndex(selectedDiscount)].products" :key="product.id">
                                        <tr  class="border-b text-sm text-gray-500 tracking-wider border-gray-300">   
                                            <td class="p-2 text-center border-r border-gray-300">
                                                Product
                                            </td>
                                            <td class="text-center border-r border-gray-300 p-2">{{product.name}}</td>
                                            <td class="p-2 flex justify-center border-r border-gray-300"><img v-if="product.image[0]" class="h-14 w-14 flex mr-1" :src="'/storage/'+product.image[0].link" alt=""></td>
                                            <td class="text-center border-r border-gray-300 p-2">
                                                 <button @click="removefromDiscount('product', product)" class="bg-red-400 p-2 text-xs tracking-wider rounded-md text-white font-bold">REMOVE</button>
                                            </td>
                                        </tr>
                                    </template>
                                </table>
                                 </div>
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


 export default{
    props: ['discounts'],
    data(){
        return{
           selectedDiscount: '',
           selectToadd: 'products',
           active: 'items',
           selectedItems: [],
           newdiscount: false,
           updatediscount: false,
           newform:this.$inertia.form({
                    name: '',
                    type: '',
                    amount: '',
                    image: '',
                    valid_from: '',
                    valid_upto: ''
                }),
           form:this.$inertia.form({
                    id: '',
                    name: '',
                    image: '',
                    type: '',
                    amount: '',
                    valid_from: '',
                    valid_upto: ''
                }),
            preview: '',
            editpreview : '',
            products: [],
            categories: [],
            brands: []
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
        findIndex(discount){
            return this.discounts.findIndex(el =>{
                if(discount.id == el.id)
                {
                    return true;
                }
            });
        },
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
        removefromDiscount(type, data)
        {
            this.$inertia.post('/admin/discounts/'+this.selectedDiscount.id+'/remove/items',
            {
                preserveState: true,
                data:{
                    'type': type,
                    'data': data
                },
                onSuccess: () => 
                {
                    alert('success');
                }

            });
        },
        newdiscountimage(e)
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
            this.newform.post('/admin/discounts/'+this.newform.id+'/update', {
                onSuccess:() =>
                {
                    alert("Success");
                    this.removeeditpreview();
                    this.newform.name = '';
                    this.newform.id = '';
                    this.newform.image = '';
                    this.newform.type = '';
                    this.newform.amount = '';
                 }
            })
        },
        deleteDiscount(discount){
            if(confirm('this brand will be permanently deleted'))
            {
                axios.delete('/admin/discount/'+discount.id+'/delete')
                .then(
                    alert('Success reload now!!'),
                )
            }
        },
        create()
        {
            this.form.post('/admin/discounts/create', {
                onSuccess:() =>
                {
                    alert("Success");
                    this.remove();
                    this.form.name = '';
                }
            })
        },
        addToDiscount()
        {
            this.$inertia.post('/admin/discounts/'+this.selectedDiscount.id+'/add/items', {
                'items' : this.selectedItems,
                'type' : this.selectToadd,
                onSuccess:() =>
                {
                    this.selectedItems = []

                }
            });
            
        }
    },
    mounted()
    {
        axios.get('/admin/brand/all')
        .then(res => this.brands = res.data);

        axios.get('/admin/category/all')
        .then(res => this.categories = res.data);

        axios.get('admin.getproducts')
        .then(res => this.products = res.data);
    },
    watch:
    {
        discounts()
        {
            var index = this.discounts.findIndex(el =>{
                if(el.id == this.selectedDiscount.id)
                {
                    return true;
                }
            });
            this.selectedDiscount = this.discounts[index];
        },
        selectToadd(){
            this.selectedItems = [];
        },
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

