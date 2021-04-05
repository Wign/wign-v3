<template>
    <div class="md:w-1/3 px-4 flex flex-col justify-between items-stretch">
        <div class="flex flex-wrap">
            <h2 class="w-full font-bold uppercase">Kender du tegnet?</h2>
            Brugere efterlyser {{count}} tegn, nogle af dem er&hellip;
        </div>
        <div class="flex flex-wrap justify-start items-center content-start">
            <RequestButton v-for="request in requests" :key="request.id" :literal="request.word.literal" class="mx-1 my-1"></RequestButton>
        </div>
        <div class="flex flex-wrap">
            <a href="" class="sm:w-2/3 md:w-full xl:w-2/3">
                <Btn>Se alle efterlyste tegn</Btn>
            </a>
        </div>
    </div>
</template>
<script>
import RequestButton from "@/Components/RequestButton";
import Btn from "@/Components/UI/Btn";
export default {
    props: ['requests', 'count'],
    components: {Btn, RequestButton}
}
</script>
