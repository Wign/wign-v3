<template>
    <AppLayout>{{literal}}</AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    components: {AppLayout},
    props: ['literal'],
}
</script>
