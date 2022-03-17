<template>
    <app-layout>
        <div class="flex flex-col sm:p-6 items-center w-full min-h-screen bg-white">
            <div class="mt-2 sm:mt-6">
                <span class="text-xl tracking-wider font-bold">BLOG</span>
            </div>
            <div v-if="posts[0]" class="m-4 flex flex-col justify-center gap-4">
                <div v-for="post in posts" :key="post.id" class="w-full flex justify-center my-2 ">
                     <div class="sm:w-2/3 flex rounded-md border p-8">
                        <div>
                            <div>
                                <p class="text-lg p-2 py-4 font-serif font-bold uppercase tracking-wider">{{post.title}}</p>
                            </div>
                            <div class="flex flex-col whitespace-normal h-auto overflow-hidden">
                                <p class="p-2 text-left font-semibold italic font-serif text-gray-600 tracking-widest">
                                    <div class="w-full">
                                        <img class="w-full h-48 sm:h-96" :src="'/storage/'+post.image" alt="">
                                    </div>
                                    <p class="mt-4">{{post.body}}</p>
                                </p>
                            </div>
                            <div class="mt-4 p-2">
                                <span class="text-xs tracking-wider uppercase text-gray-400">{{formatDate(post.created_at)}}</span>
                            </div>
                        </div>
                       
                        
                    </div>
                </div>
            </div>
            <div v-else class="min-h-screen flex items-center justify-center">
                <span class="text-red-400 font-semibold">No result found</span>
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
