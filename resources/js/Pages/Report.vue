<template>
    <app-layout>
        Report!! {{sign.id}}, ord: {{sign.word.literal}} by {{sign.creator.name}}
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    components: {AppLayout},
    props: ['sign']
}
</script>
