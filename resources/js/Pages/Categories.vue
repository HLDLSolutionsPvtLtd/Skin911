<template>
    <app-layout title="Categories">
        <div class="flex flex-col sm:p-6 items-center w-full min-h-screen bg-white">
            <div class="mt-2 sm:mt-6">
                <span class="text-xl tracking-wider font-bold">CATEGORIES</span>
            </div>
            <div class="w-full sm:grid sm:grid-cols-6 m-2">
                <div v-for="category in categories" :key="category.id" class="m-2 p-2 border">
                     <a :href="'/products?key='+category.name">
                        <div>
                            <img class="w-full" :src="'/storage/'+category.img" alt="">
                        </div>
                        <div class="flex justify-center">
                            <span class="p-2 font-semibold text-gray-900 tracking-wider">{{category.name}}</span>
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
                categories: [],
            }
        },
    mounted() {
        axios.get('/categories/all')
        .then(res => this.categories = res.data);
    },

}
</script>
