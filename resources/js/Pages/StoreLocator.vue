<template>
    <app-layout>
        <div class="min-h-screen">
            <div class="mx-2 sm:mx-12">
                <div class="mt-4 flex justify-center">
                    <span style="font-family: 'Whitney' !important;color:#29303f" class="p-2 text-lg tracking-wide font-thin">Store Location</span>
                </div>
                <div style="font-family: 'Whitney' !important;" class="my-4 flex justify-center">
                    <div>
                        <div style="font-size:15px" class="">
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d456.54513679499576!2d92.71622130893262!3d23.73449945567903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x374d95df51208935%3A0x750c0fac870188cc!2sMINISO!5e0!3m2!1sen!2sin!4v1646053719762!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue'

export default {
    components:
    {
        AppLayout,
    },

    data(){
        return{
            
        }
    },
    methods:{
        
    },
    mounted(){
        
    },
    watch: {
        
   },

}
</script>