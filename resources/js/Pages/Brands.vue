<template>
    <app-layout>
        <div class="flex flex-col sm:p-6 items-center w-full min-h-screen bg-white">
            <div class="mt-2 sm:mt-6">
                <span class="text-xl tracking-wider font-bold">BRANDS</span>
            </div>
            <div class="w-full sm:grid sm:grid-cols-6 m-2">
                
                <div v-for="brand in brands" :key="brand.id" class="m-2 p-2 border">
                     <a :href="'/products?key='+brand.name" >
                        <div>
                            <img class="w-full" :src="'/storage/'+brand.img" alt="">
                        </div>
                        <div class="flex justify-center">
                            <span class="p-2 font-semibold text-gray-900 tracking-wider">{{brand.name}}</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
export default{
    components:
    {
        AppLayout
    },

    data()
        {
            return{
                brands: [],
            }
        },
    mounted() {
        axios.get('/brands/all')
        .then(res => this.brands = res.data);
    },

}
</script>
