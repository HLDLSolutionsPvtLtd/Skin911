<template>
   <AdminLayout>
       <template #header>
           Shipping Fees
       </template>
       <div class="">
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1">
               <div class="m-2 relative">
                   <div class="flex justify-between items-center bg-gray-300 mb-2 rounded-md p-2">
                       <div class="">
                           <button @click="newfee = !newfee" class="p-2 bg-green-500 text-white rounded-md text-xs tracking-wider font-bold">NEW</button>
                       </div>
                       <div class="">
                           <select class="text-xs font-bold rounded-md " name="" id="">
                               <option value="">SORT BY</option>
                               <option value="">Latest</option>
                               <option value="">Popular</option>
                           </select>
                       </div>
                   </div>
                   <div v-show="newfee" class="absolute bg-white w-full p-4 border shadow-lg">
                       <div class="flex border-b-2 justify-between">
                           <div>
                               <span class="text-blue-400 text-sm font-bold tracking-wide">NEW FEE</span>
                           </div>
                       </div>
                       <div class="flex mt-4 flex-col">
                           <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Street/Address"/>
                                <div class="mt-2">
                                    <input v-model="form.name" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                            </div>
                            <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Pincode"/>
                                <div class="mt-2">
                                    <input v-model="form.pincode" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                            </div>
                            <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Fee"/>
                                <div class="mt-2">
                                    <input v-model="form.fee" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                            </div>
                       </div>
                       
                       <div class="mt-4 flex gap-4">
                           <div>
                               <button @click="create" class="bg-green-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">SUBMIT</button>
                           </div>
                           <div>
                               <button @click="newfee = !newfee" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                           </div>
                       </div>
                   </div>
                   <div v-show="updatefee" class="absolute bg-white w-full p-4 border shadow-lg">
                       <div class="flex border-b-2 justify-between">
                           <div>
                               <span class="text-blue-400 text-sm font-bold tracking-wide">EDIT FEE</span>
                           </div>
                       </div>
                       <div class="flex mt-4 flex-col">
                            <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Street/Address"/>
                                <div class="mt-2">
                                    <input v-model="newform.name" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                            </div>
                            <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Pincode"/>
                                <div class="mt-2">
                                    <input v-model="newform.pincode" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                            </div>
                            <div class="">
                               <jet-label class="text-sm tracking-wider" for="size" value="Fee"/>
                                <div class="mt-2">
                                    <input v-model="newform.fee" class="text-sm border-gray-300 rounded-md" type="text"/>
                                </div>
                            </div>
                       </div>
                       
                       <div class="mt-4 flex gap-4">
                           <div>
                               <button @click="update" class="bg-green-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">SUBMIT</button>
                           </div>
                           <div>
                               <button @click="updatefee = !updatefee" class="bg-red-500 font-bold text-white text-xs tracking-wider p-2 rounded-md">CLOSE</button>
                           </div>
                       </div>
                   </div>
                   <div style="height:calc(100vh - 180px)" class="overflow-y-scroll">
                        <table class="w-full text-ct">
                            <tr class="border-b-2 shadow-sm border-gray-100 text-gray-500 uppercase tracking-wider text-xs p-2">
                                <th class="text-left border-gray-300 p-2">
                                    <span class="flex pr-1">Street/Address</span>
                                </th>
                                <th class="text-left border-gray-300 p-2">
                                    <span class="flex pr-1">Pincode</span>
                                </th>
                                <th class="text-left border-gray-300 p-2">
                                    <span class="flex pr-1">Shipping Fee</span>
                                </th>
                                <th class="text-center p-2">Actions</th>
                            </tr>
                            
                            <tr v-for="fee in fees" :key="fee.id" class="border-t-2 shadow-sm text-sm text-gray-500 tracking-wider border-gray-100">   
                                <td class="text-start border-gray-300 p-2">{{fee.name}}</td>
                                <td class="p-2 border-gray-300">{{fee.pincode}}</td>
                                <td class="p-2 border-gray-300">{{fee.fee}}</td>
                                <td class="p-2">
                                    <div class="flex gap-2 justify-center items-center">
                                        <button @click="updatefee = !updatefee,id = fee.id, newform.fee = fee.fee , newform.name = fee.name , newform.pincode = fee.pincode" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-white" viewBox="0 0 24 24">
                                                <path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/>
                                            </svg>
                                        </button>
                                        <button @click="deleteFee(fee)" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
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
    props: ['fees'],

    data(){
        return{
           id: '',
           newfee: false,
           updatefee: false,
           newform:this.$inertia.form({
                    name: '',
                    pincode: '',
                    fee: ''
                }),
           form:this.$inertia.form({
                    name: '',
                    pincode: '',
                    fee: ''
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
       
      
        update(){
            this.newform.post('/admin/shippingfee/'+this.id+'/update', {
                onSuccess:() =>
                {
                    this.updatefee = false;
                    this.newform.name = '';
                    this.id = '',
                    this.newform.pincode = '';
                    this.newform.fee = '';
                 }
            })
        },
        deleteFee(fee){
            if(confirm('this Fee will be permanently deleted'))
            {
                axios.delete('/admin/shippingfee/'+fee.id+'/delete')
                .then(
                    alert('Success reload now!!'),
                )
            }
        },
        create()
        {
            this.form.post('/admin/shippingfee/add', {
                onSuccess:() =>
                {
                    this.newfee = false;
                    this.form.name = '';
                }
            })
        }
    },
    mounted()
    {
        
    },
    watch:
    {

    }
 }
</script>

