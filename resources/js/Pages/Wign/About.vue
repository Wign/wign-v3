<template>
    <app-layout>
        <div v-html="about" class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "../../Layouts/AppLayout";
export default {
    components: {AppLayout},
    props: ['about']
}
</script>
