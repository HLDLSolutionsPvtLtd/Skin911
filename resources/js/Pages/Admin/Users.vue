<template>
   <AdminLayout>
       <template #header>
           Users
       </template>
       <div class="">
          
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1 relative">
               <div class="flex justify-between m-4">
                    <div class="flex gap-2">
                       
                    </div>
                    <div class="">
                        <input type="search" v-model="key" @keyup.enter="search()" class="h-8 border border-gray-300 rounded-md pl-8 text-blue-400 placeholder-gray-300 text-sm tracking-wider" placeholder="Search order  by id">
                        <div class="relative">
                            <svg @click="search()" xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="fill-current text-blue-500 absolute -top-6 left-2" viewBox="0 0 24 24">
                                <path d="M13 8h-8v-1h8v1zm0 2h-8v-1h8v1zm-3 2h-5v-1h5v1zm11.172 12l-7.387-7.387c-1.388.874-3.024 1.387-4.785 1.387-4.971 0-9-4.029-9-9s4.029-9 9-9 9 4.029 9 9c0 1.761-.514 3.398-1.387 4.785l7.387 7.387-2.828 2.828zm-12.172-8c3.859 0 7-3.14 7-7s-3.141-7-7-7-7 3.14-7 7 3.141 7 7 7z"/>\
                            </svg>
                        </div>
                    </div>
                </div>
               <div style="height:calc(100vh - 180px)" class="overflow-y-scroll m-4 border-t-2 py-4">
                   
                   <table class="w-full text-ct">
                        <tr class="border-b border-gray-300 text-blue-500 font-bold tracking-wider text-xs font-bold uppercase">
                            <th class="text-left p-1 py-4">
                                <span class="">Id</span>
                            </th>
                            
                            <th class="text-left p-1 py-4">
                                <span class="">Name</span>
                            </th>
                            <th class="text-left p-1">
                                <span class="">Email</span>
                            </th>
                            <th class="text-center p-1 py-4">
                                <span class="">Phone No</span>
                            </th>
                            <th class="text-left p-1 py-4">
                                <span class="">Created-At</span>
                            </th>
                        </tr>
                        
                        <tr v-for="user in users" :key="user.id" class="border-b-2 text-sm font-semibold text-gray-500 tracking-wider border-gray-200">   
                            <td class="p-1 font-bold text-left text-gray-500 py-4">
                               {{user.id}}
                            </td>
                            
                            <td class="text-left font-bold p-1">{{user.name}}</td>
                            <td class="text-left font-bold p-1">{{user.email}}</td>
                            <td class="text-center p-1  mr-2">
                                   {{user.phone_no}}
                            </td>
                            <td class="text-left p-1 text-xs uppercase">{{formatDate(user.created_at)}}</td>
                        </tr>
                        
                    </table>
               </div>
           </div>
       </div>
   </AdminLayout>    
</template>

<script>
 
 import AdminLayout from '@/Layouts/AdminLayout'


 export default{
    props: ['users'],
    data(){
        return{
            key: '',
        }
    },
     components:
    {
        AdminLayout,
    },
    methods:
    {
        formatDate(val)
        {
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var d = new Date(val)
            return d.toLocaleDateString("en-US", options); 
        },

       
        search(){
            this.$inertia.get("/admin/user/search", {
                'key': this.key
            })
        },
    },
    mounted()
    {
        
    },
    watch:
    {
        
    }
 }
</script>

