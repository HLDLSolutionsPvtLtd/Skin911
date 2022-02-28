<template>
    <Link :href="'/'">
         <img src="/storage/skin911.png" class="h-32" alt="">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
