<template>
    <default-header></default-header>
    
    <div class="w-screen min-h-[100vh]">
        <div class="w-screen bg-main-banner bg-no-repeat bg-cover bg-center min-h-[30vh] flex justify-center items-center">
            <div class="w-screen bg-black bg-opacity-75 min-h-[30vh] flex justify-center items-center">
                <div class="text-5xl md:text-6xl text-white font-semibold"> 
                    {{ title }}
                </div>
            </div>
        </div>

        <slot></slot>
    </div>
</template>

<script>
import DefaultHeader from './DefaultHeader.vue'

export default {
    props: {
        title:{
            type: String,
            required:true,
            default: ""
        },
    },
    components: {
        DefaultHeader
    }
}
</script>
