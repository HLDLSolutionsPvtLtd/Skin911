<template>
    <app-layout>
        <div class="flex justify-center relative">
            <div v-show="success" class="absolute w-full transform shadow-lg sm:w-1/4 top-1/4">
                <div class=" bg-white rounded-sm">
                    <div class="bg-pink-300 p-2 flex justify-center">
                        <div class="p-4 flex flex-col justify-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 24 24"  class="fill-current transition transform translate-Y-60 duration-700 text-green-400">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/>
                                </svg>
                            </div>
                            <div class="mt-2">
                                <span class="font-bold text-md tracking-wider text-white">ADDED TO CART</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center m-2 p-2">
                        <button @click="success=!success" class="p-2 bg-pink-300 rounded-md font-bold tracking-wider text-white">OK</button>
                    </div>
                </div>
                
            </div>
            <div class=" sm:flex xxl:w-1/2 lg:w-7/12 sm:m-6">
                <div class="flex flex-col sm:flex-1 bg-white p-2 border-b sm:border-0 shadow-lg sm:shadow-none">
                    <div class="flex" style="height:calc(100vh - 400px)" >
                        <img :src="'/storage/'+currentImg" alt="" class="w-full h-full">
                    </div>
                    <div class="flex mt-2">
                        <ul class="flex flex-col mr-1" v-for="image in product.image" :key="image">
                            <li class="w-full" @click="currentimg(image.link)" >
                                <img :src="'/storage/'+image.link" alt="" class="h-12 w-10 cursor-pointer border-gray-600 hover:border" >
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" sm:flex-1 bg-white p-2 mt-2 sm:mt-0 shadow-lg border-t sm:border-0 sm:shadow-none">
                    <div class="p-2">
                        <span class="text-md tracking-wider font-semibold text-gray-500">{{product.name}}</span>
                        <div class="py-2 mr-2" v-if="product.variant[0]">
                            <span style="font-size: 10px" class="font-semibold text-gray-500 tracking-wider">SELECT VARIANT</span>
                            <div class="flex gap-2 pt-2">
                                <div v-for="variantq in product.variant" :key="variantq.id">
                                    <span @click="this.form.variant = variantq.id" :class="{'bg-gray-400 text-black':variantq.id == form.variant}" class="p-2 font-bold cursor-pointer rounded-lg tracking-widest uppercase text-green-400 border" style="font-size:10px">{{variantq.name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <span class="text-green-500 text-sm flex items-center tracking-wider">
                                <svg width="14" height="14" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-green-500" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M24 4.685l-16.327 17.315-7.673-9.054.761-.648 6.95 8.203 15.561-16.501.728.685z"/>
                                </svg>
                                In Stock
                            </span>
                        </div>
                    </div>
                    <div class="p-2">
                        <span class="line-through text-xs font-bold text-gray-500 pr-2">&#8377;5000</span>
                        <span class="text-xs font-semibold tracking-wider">&#8377;{{product.price}}</span>
                    </div>
                    <div class="m-2 flex gap-1">
                        <div @click="setQuantity('in')" class="bg-white border flex items-center py-0 px-2 shadow-sm rounded-full">
                            <span class="flex">&#43;</span>
                        </div>
                        <div class="bg-white py-0 px-4 flex items-center border shadow-sm rounded-sm">
                            <span class="">{{form.quantity}}</span>
                        </div>
                        <div @click="setQuantity('de')" class="bg-white border py-0 px-2 flex items-center shadow-sm rounded-full">
                             <span class="">&#8722;</span>
                        </div>
                    </div>
                    <div class="m-2 text-xs tracking-wider text-blue-400 flex items-center" v-show="qerror">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" class="fill-current text-red-600 mr-1" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2.033 16.01c.564-1.789 1.632-3.932 1.821-4.474.273-.787-.211-1.136-1.74.209l-.34-.64c1.744-1.897 5.335-2.326 4.113.613-.763 1.835-1.309 3.074-1.621 4.03-.455 1.393.694.828 1.819-.211.153.25.203.331.356.619-2.498 2.378-5.271 2.588-4.408-.146zm4.742-8.169c-.532.453-1.32.443-1.761-.022-.441-.465-.367-1.208.164-1.661.532-.453 1.32-.442 1.761.022.439.466.367 1.209-.164 1.661z"/></svg>
                        <span>{{qerror}}</span>
                    </div>
                    <div class="mt-2 flex justify-start">
                        <button @click="addtocart()" class="p-2 w-1/2 rounded-sm font-semibold bg-pink text-pink-dark text-sm m-2">ADD TO CART</button>
                        <button class="p-2 w-1/2 border border-gray-700 rounded-sm font-semibold text-pink-dark text-sm m-2">BUY IT NOW</button>
                    </div>
                    <div class="mt-8 mb-8 border-t">
                        <div>
                            <ul class="flex font-sans font-semibold text-sm">
                                <li class="p-2 text-pink-dark hover:text-gray-300 cursor-pointer">{{product.description}}</li>
                                
                            </ul>
                        </div>
                        <div class="mt-2 m-2">
                            <span class="text-sm p-2 font-thin m-2 font-sans text-gray-400">A Full 5 steps of minis from double cleansing, hydration, treatment, to moisture</span>
                            <div class="p-1 text-sm font-thin font-sans">
                                <ul class="list-inside list-disc leading-loose">
                                    <li>Hemish All cleansing balm teaser size X2</li>
                                    <li>Corsx low pH Good Morning Gel cleanser mini</li>
                                    <li>I'm from fig Boosting essence 30Ml</li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex border-t ">
                            <ul class=""> 
                                <li class="flex text-xs m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="#814252" d="M12.164 7.165c-1.15.191-1.702 1.233-1.231 2.328.498 1.155 1.921 1.895 3.094 1.603 1.039-.257 1.519-1.252 1.069-2.295-.471-1.095-1.784-1.827-2.932-1.636zm1.484 2.998l.104.229-.219.045-.097-.219c-.226.041-.482.035-.719-.027l-.065-.387c.195.03.438.058.623.02l.125-.041c.221-.109.152-.387-.176-.453-.245-.054-.893-.014-1.135-.552-.136-.304-.035-.621.356-.766l-.108-.239.217-.045.104.229c.159-.026.345-.036.563-.017l.087.383c-.17-.021-.353-.041-.512-.008l-.06.016c-.309.082-.21.375.064.446.453.105.994.139 1.208.612.173.385-.028.648-.36.774zm10.312 1.057l-3.766-8.22c-6.178 4.004-13.007-.318-17.951 4.454l3.765 8.22c5.298-4.492 12.519-.238 17.952-4.454zm-2.803-1.852c-.375.521-.653 1.117-.819 1.741-3.593 1.094-7.891-.201-12.018 1.241-.667-.354-1.503-.576-2.189-.556l-1.135-2.487c.432-.525.772-1.325.918-2.094 3.399-1.226 7.652.155 12.198-1.401.521.346 1.13.597 1.73.721l1.315 2.835zm2.843 5.642c-6.857 3.941-12.399-1.424-19.5 5.99l-4.5-9.97 1.402-1.463 3.807 8.406-.002.007c7.445-5.595 11.195-1.176 18.109-4.563.294.648.565 1.332.684 1.593z"/>
                                    </svg>
                                    <span class="p-1"> 
                                        Earn points with Skin 911 Rewards
                                    </span>
                                </li>
                            
                                <li class="flex text-xs m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="#814252" d="M23.873 9.81c.087-.251.127-.509.127-.764 0-.77-.38-1.514-1.055-1.981-2.153-1.492-1.868-1.117-2.679-3.543-.34-1.013-1.319-1.697-2.424-1.697h-.007c-2.653.009-2.193.151-4.334-1.354-.446-.314-.974-.471-1.501-.471s-1.055.157-1.502.471c-2.156 1.515-1.686 1.362-4.334 1.353h-.007c-1.104 0-2.084.685-2.422 1.697-.812 2.432-.534 2.056-2.678 3.544-.677.469-1.057 1.212-1.057 1.983 0 .254.042.511.127.762.831 2.428.829 1.962 0 4.38-.085.251-.127.507-.127.762 0 .77.38 1.514 1.057 1.983 2.146 1.49 1.868 1.113 2.679 3.543.338 1.013 1.317 1.697 2.422 1.697h.007c2.653-.009 2.193-.152 4.334 1.353.446.314.974.472 1.501.472s1.055-.158 1.502-.471c2.141-1.504 1.679-1.362 4.334-1.353h.007c1.104 0 2.084-.685 2.424-1.697.811-2.427.525-2.052 2.679-3.543.674-.469 1.054-1.213 1.054-1.983 0-.254-.04-.512-.127-.763-.831-2.428-.827-1.963 0-4.38zm-11.873 10.69c-4.694 0-8.5-3.806-8.5-8.5s3.806-8.5 8.5-8.5 8.5 3.806 8.5 8.5-3.806 8.5-8.5 8.5zm-1.25-4.542l-3.75-3.637 1.549-1.548 2.201 2.088 4.701-4.819 1.549 1.548-6.25 6.368z"/>
                                    </svg>
                                    <span class="p-1">
                                        Skin 911 Guarantee
                                    </span>
                                </li>
                                <li class="flex text-xs m-2">
                                    <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                        <path fill="#814252" d="M3.848 19h-.848c-.796 0-1.559-.316-2.121-.879-.563-.562-.879-1.325-.879-2.121v-3c0-7.175 5.377-13 12-13s12 5.825 12 13v3c0 .796-.316 1.559-.879 2.121-.562.563-1.325.879-2.121.879h-.848c-2.69 4.633-6.904 5-8.152 5-1.248 0-5.462-.367-8.152-5zm16.152-5.876c-.601.236-1.269-.18-1.269-.797 0-.304-.022-.61-.053-.915-1.761-.254-3.618-1.926-3.699-3.723-1.315 2.005-4.525 4.17-7.044 4.17 1.086-.699 1.839-2.773 1.903-3.508-.581 1.092-2.898 3.136-4.551 3.487l-.018.489c0 .619-.669 1.032-1.269.797v3.771c.287.256.632.464 1.041.594.225.072.412.224.521.424 2.206 4.046 5.426 4.087 6.438 4.087.929 0 3.719-.035 5.877-3.169-1.071.433-2.265.604-3.759.653-.37.6-1.18 1.016-2.118 1.016-1.288 0-2.333-.784-2.333-1.75s1.045-1.75 2.333-1.75c.933 0 1.738.411 2.112 1.005 1.9-.026 4.336-.334 5.888-2.645v-2.236zm-11-.624c.686 0 1.243.672 1.243 1.5s-.557 1.5-1.243 1.5-1.243-.672-1.243-1.5.557-1.5 1.243-1.5zm6 0c.686 0 1.243.672 1.243 1.5s-.557 1.5-1.243 1.5-1.243-.672-1.243-1.5.557-1.5 1.243-1.5zm5.478-1.5h1.357c-.856-5.118-4.937-9-9.835-9-4.898 0-8.979 3.882-9.835 9h1.357c.52-4.023 3.411-7.722 8.478-7.722s7.958 3.699 8.478 7.722z"/>
                                    </svg>
                                    <span class="p-1"> 
                                        Skin 911 Consultation
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       <div class="flex justify-center">
            <div class="w-full border sm:border-0 sm:mt-0 mt-2 sm:shadow-none shadow-lg sm:flex xxl:w-1/2 lg:w-7/12 sm:m-6 bg-white p-2">
                <div class="">
                    <span class="col-span-3 text-lg font-bold text-gray-700">RELATED PRODUCTSS</span>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                    <div class="border border-gray-100" v-for="image in products" :key="image">
                        <div class="">
                            <a href="/ProductDetail" class="overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="image.img" alt="">
                            </div>
                            </a>
                            <div class="">
                                <button class="p-2 w-full bg-pink text-pink-dark text-md">Add To Cart</button>
                            </div>
                        </div>  
                    </div>
                </div> 
                <div class="m-4 flex justify-center">
                    <button class="p-3 border-2 border-gray-900">VIEW ALL RELATED PRODUCTS</button>
                </div>
            </div>
       </div>
    </app-layout>
</template>
<script>
 import AppLayout from '@/Layouts/AppLayout.vue'
import { Inertia } from '@inertiajs/inertia';
 export default{
     props: ['product'],
    components:
    {
        AppLayout
    },
    data() {
        return {
            quantityPop: false,
            form : this.$inertia.form({
                variant: '',
                quantity : 1,
            }),
            qerror: '',
            currentImg:'',
            success : false,
        }
    },
    methods:
    {
        currentimg(img)
        {
            this.currentImg = img;
        },
        addtocart()
        {
            this.form.post('/cart/product/'+this.product.id+'/add', {
                onSuccess: () =>
                {
                    this.success = true;
                }
            })
        },
        setQuantity(q)
        {
            if(q == 'in')
            {
                if(this.form.quantity >= 6)
                {
                    this.qerror = "max quantity exceeded!!";
                }
                else
                {
                    this.form.quantity++;
                }
            }
            else
            {
                 if(this.form.quantity <= 1)
                {
                    this.qerror = "min quantity exceeded!!";
                }
                else
                {
                    this.form.quantity--;
                }
            }
        }
    },
    mounted() {
        this.currentImg = this.product.image[0].link;
        if(this.product.variant[0])
        {
            this.form.variant = this.product.variant[0].id;
        }
    },
}
</script>
