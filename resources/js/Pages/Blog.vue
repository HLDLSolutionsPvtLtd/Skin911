<template>
    <app-layout>
        <div class="flex flex-col sm:p-6 items-center w-full min-h-screen bg-white">
            <div class="mt-2 sm:mt-6">
                <span class="text-xl tracking-wider font-bold">BLOGS</span>
            </div>
            <div class="sm:grid sm:grid-cols-3 gap-4">
                
                <div v-for="post in posts" :key="post.id" class="w-full border">
                     <div class="w-full">
                        <div>
                            <img class="w-full" :src="'/storage/'+post.image" alt="">
                        </div>
                        <div>
                            <p class="text-sm p-2 py-4 font-serif font-bold uppercase tracking-wider">{{post.title}}</p>
                        </div>
                        <div class="flex flex-col whitespace-normal h-auto overflow-hidden">
                            <p class="p-2 text-left font-semibold italic font-serif text-gray-600 tracking-widest">{{post.body}}</p>
                        </div>
                        <div class="mt-4 p-2">
                            <span class="text-xs tracking-wider uppercase text-gray-400">{{formatDate(post.created_at)}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
export default{
    props: ['posts'],

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

    methods: {
        formatDate(date)
        {
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var d = new Date(date)
            return d.toLocaleDateString("en-US", options); 
        }
    },
    mounted() {
        
    },

}
</script>
