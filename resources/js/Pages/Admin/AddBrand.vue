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
       <div class="bg-white flex justify-center">
           <div class="w-1/3">
               <div class="p-1">
                    <div class="flex justify-center">
                        <div class="w-full">
                                <jet-label for="name" value="Name"/>
                                <div>
                                    <jet-input id="name" v-model="form.name" class="w-full" type="text" required autofocus/>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    <div class="">
                        <h5 class="flex justify-start">Product images:</h5>
                        <div class="flex justify-center border-dashed border border-blue-200">
                            <input id="image" class="opacity-0 absolute -z-1" type="file" ref="files" v-on:change="onImageChange">
                            <label class="p-12 text-center text-gray-400" for="image">Drag and Drop/Click to ADD image</label>
                        </div>
                        <div class="flex">
                                <img v-if="previews" class="flex w-full p-1" :src="previews" alt="PREVIEW">
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

 export default{
     data()
     {
         return{
             form:this.$inertia.form({
                    name: '',
                    image: '',
        
                }),
             previews : '',
    
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
       
        
        onImageChange(e){
                console.log(e.target.files[0]);
                this.form.image = e.target.files[0];
                this.previews = URL.createObjectURL(this.form.image);
            },
        submit(){
            
            console.log(this.form);
            this.form.post(this.route('admin.addbrand'),{
                 onFinish: () => alert('success')
            })
        }

    },
    
   
 }
</script>

