<template>
    <div class="md:w-2/3 px-4 flex flex-col justify-between items-stretch content-start">
        <div class="flex flex-wrap">
            <h2 class="w-full font-bold uppercase">Opdag</h2>
            Der findes {{count}} tegn, se nogle af dem her&hellip;
        </div>
        <div class="flex flex-wrap">
            <span v-for="sign in signs">{{sign.word.literal}}</span>
        </div>
        <div class="flex flex-wrap">
            <a href="" class="sm:w-2/3 lg:w-1/2">
                <Btn>Eller se et tilfældigt tegn</Btn>
            </a>
        </div>
    </div>
</template>
<script>
import Btn from "@/Components/UI/Btn";
export default {
    components: {Btn},
    props: ['signs', 'count']
}
</script>
