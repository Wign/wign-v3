<template>
    <appLayout>
        <div class="flex flex-col justify-center">
            <div class="container mx-auto mt-20">
                <h1 class="font-bold text-5xl">{{ word.literal }}</h1>
                <!-- TODO - Later... add alike words or parent / child words
                <p>Eller mente du <a href="#" class="underline">sommerlejr</a> eller <a href="#" class="underline">sommerferie</a>?</p>-->
                <SignComponent v-for="sign in word.signs" :key="sign.id" :sign="sign" :literal="word.literal"></SignComponent>
            </div>
        </div>
    </appLayout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import SignComponent from "@/Components/SignComponent";

export default {
    components: {SignComponent, AppLayout},
    props: {
        word: Object,
        isHashtag: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
