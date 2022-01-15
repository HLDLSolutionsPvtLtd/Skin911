<template>
    <app-layout>
        <div class="w-full flex justify-center">
            <div class="w-10/12 m-2">
                <div class="w-full m-2 border">
                    <div class="flex w-full bg-white shadow-md justify-center">
                        <span class="text-md text-pink-dark p-2">NEW ADDRESS</span>
                    </div>
                </div>
                <div class="mt-4 grid sm:grid-cols-2 bg-white p-4 text-sm">
                    <div class="mt-2">
                        <jet-input-error :message="form.errors.name" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">Name</label>
                        <div class="pt-1">
                            <input type="text" v-model="form.name" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-sm"> 
                        </div>
                    </div>
                   <div class="mt-2">
                       <jet-input-error :message="form.errors.phone_number" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">Mobile Number</label>
                        <div class="pt-1">
                            <input type="number" maxlength="10" v-model="form.phone_number" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-sm"> 
                        </div>
                    </div>
                    <div class="mt-2">
                        <jet-input-error :message="form.errors.state" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">State</label>
                        <div class="pt-1">
                            <input type="text" v-model="form.state" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-md"> 
                        </div>
                    </div>
                    <div class="mt-2">
                        <jet-input-error :message="form.errors.city" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">City</label>
                        <div class="pt-1">
                            <input type="text" v-model="form.city" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-sm"> 
                        </div>
                    </div>
                    <div class="mt-2">
                        <jet-input-error :message="form.errors.district" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">District</label>
                        <div class="pt-1">
                            <input type="text" v-model="form.district" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-sm"> 
                        </div>
                    </div>
                    <div class="mt-2">
                        <jet-input-error :message="form.errors.landmark" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">Street</label>
                        <div class="pt-1">
                            <input type="text" v-model="form.street" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-sm"> 
                        </div>
                    </div>
                    <div class="mt-2">
                        <jet-input-error :message="form.errors.landmark" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">Landmark</label>
                        <div class="pt-1">
                            <input type="text" v-model="form.landmark" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-sm"> 
                        </div>
                    </div>
                    <div class="mt-2">
                        <jet-input-error :message="form.errors.house_no" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">House/Flat No</label>
                        <div class="pt-1">
                            <input type="text" v-model="form.house_no" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-sm"> 
                        </div>
                    </div>
                    <div class="mt-2">
                        <jet-input-error :message="form.errors.pincode" class="mt-2" />
                        <label class="text-gray-600 tracking-wider" for="">Pincode</label>
                        <div class="pt-1">
                            <input type="text" v-model="form.pincode" class="border w-2/3 border-gray-300 focus:ring-0 h-9 rounded-sm"> 
                        </div>
                    </div>
                    <div>

                    </div>
                    <div class="mt-4">
                        <button @click="submit" class="p-2 bg-green-500 rounded-md shadow-lg text-white font-bold text-xs">CREATE</button>
                    </div>
                </div>
                
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import JetInputError from '@/Jetstream/InputError'

export default {
    components:
    {
        AppLayout,
        JetInputError
    },

    data(){
        return{
            form: this.$inertia.form({
                name: '',
                phone_number: '',
                state: '',
                city: '',
                district: '',
                street: '',
                landmark: '',
                house_no: '',
                pincode: ''
            })
        }
    },
    methods:{
        submit()
        {
            this.form.post('/address/new', {
                onSuccess: () =>
                {
                    alert("success!");
                    window.location = document.referrer;
                }
            })
        }
    },
    mounted(){
        
    },
    watch: {
        
   },

}
</script>