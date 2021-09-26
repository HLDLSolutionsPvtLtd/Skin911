<template>
   <AdminLayout>
       <template #header>
           Add Brand
       </template>
       <div class="bg-dark-header">
           <div class="m-8">
               <div class="flex m-2 justify-between border border-gray-600">
                    <div class="">
                        <div class="m-1">
                            <button @click="submit" type="button" class="flex p-2 text-xs text-blue-500 border border-blue-600 font-mono p-1 rounded-xs">
                                ADD
                                <svg class="ml-1 h-4 w-4" viewBox="0 0 32 32">
                                    <path fill="#0f3fc7" d='M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z'></path>
                                </svg> 
                            </button>
                        </div>
                    </div>
                    <div v-if="message">
                        <span class="p-1 text-ct text-red-500">{{message}}</span>
                    </div>
                    <div class="flex">
                        <div class="m-1">
                            <button @click="resetForm()" type="button" class="flex p-2 text-xs text-white border border-white font-mono rounded-xs">
                                RESET
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4"  viewBox="0 0 32 32">
                                    <path fill="#fff" d="M1.615 11.375l-1.535-.986 5.399-.618 1.924 5.023-1.518-.961c-1.482 2.402-2.843 5.215-1.979 7.896-2.503-2.122-3.906-3.753-3.906-5.723 0-1.422.924-3.339 1.615-4.631zm4.057 5.625c-.763.931-1.002 2.887-.753 4.071.114.542.592.929 1.147.929h4.934v-5h-5.328zm10.706 5.176v1.824l-3.37-4.263 3.37-4.282v1.797c2.823-.005 5.798-.333 7.622-2.479-.484 3.246-1.131 5.298-2.805 6.336-1.209.748-3.354.973-4.817 1.067zm2.672-6.413c1.193.158 2.982-.669 3.857-1.505.401-.383.478-.993.186-1.464l-2.6-4.192-4.25 2.634 2.807 4.527zm-.937-11.561l1.61-.859-2.097 5.014-5.323-.772 1.579-.856c-1.372-2.467-3.162-5.028-5.925-5.583 1.904-.711 3.438-1.146 4.737-1.146 2.238 0 3.54 1.265 5.419 4.202zm-6.889.795c-.44-1.12-2.031-2.285-3.186-2.645-.529-.165-1.1.063-1.371.547l-2.408 4.307 4.364 2.441 2.601-4.65z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            <div class="w-1/3 m-2">
                <div class="p-1">
                    <div class="flex justify-center">
                        <div class="w-full">
                                <jet-label for="id" class="text-ct font-mono" value="Name"/>
                                <div>
                                    <input id="name" v-model="form.name" class="w-full text-ct h-8 rounded-sm bg-dark-header" type="text" required autofocus/>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    <div class="">
                        <h5 class="flex text-ct font-mono justify-start">Product images:</h5>
                        <div class="flex justify-center border-dashed border border-gray-500">
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

