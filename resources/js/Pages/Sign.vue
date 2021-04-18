<template>
    <div>
        <h1>{{word.literal}}</h1>
        <SignComponent v-for="sign in word.signs" :key="sign.id" :sign="sign"></SignComponent>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import SignComponent from "@/Components/SignComponent";

export default {
    components: {SignComponent, AppLayout},
    props: ['word'],
}
</script>
