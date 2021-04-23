<template>
    <div class="md:w-2/3 px-4 flex flex-col justify-between items-stretch content-start">
        <div class="flex flex-wrap">
            <h2 class="w-full font-bold uppercase">Opdag</h2>
            Der findes {{count}} tegn, se nogle af dem her&hellip;
        </div>
        <div class="flex flex-wrap">
            <div v-for="sign in signs" class="w-1/2 md:w-1/3 lg:w-1/4 my-2 px-2">
                <!--<inertia-link class="hover:scale text-xl font-semibold" :href="route('sign', sign.word.literal)" @click.prevent="signModal(sign)">-->
                <inertia-link class="hover:scale text-xl font-semibold" :href="route('sign', sign.word.literal)">
                    <div class="relative flex flex-col overflow-hidden bg-black text-white text-center">
                        <img class="w-full transition-transform" :src="sign.small_thumbnail_url" :alt="sign.word.literal">
                        <div class="absolute p-6 items-center flex justify-center h-full w-full">
                            <h5 class="mb-3 mb-0 font-weight-semibold">{{sign.word.literal}}</h5>
                        </div>
                    </div>
                </inertia-link>
            </div>
        </div>
        <div class="flex flex-wrap">
            <inertia-link :href="route('randomSign')" class="sm:w-2/3 lg:w-1/2">
                <Btn>Eller se et tilfældigt tegn</Btn>
            </inertia-link>
        </div>
        <!--<VideoModal :show-modal="showModal" :sign="chosenSign" @modalClosed="signModalClosed"/>-->
    </div>
</template>
<script>
import Btn from "@/Components/UI/Btn";
import SignPlayer from "@/Components/SignPlayer";

export default {
    components: {Btn, SignPlayer},
    props: ['signs', 'count'],
    /* Wait with those (Show and close modal with sign inside) to later. MVP now!
    data: function () {
        return {
            showModal: false,
            chosenSign: null,
        }
    },
    methods: {
        signModal: function (sign) {
            this.chosenSign = sign;
            this.showModal = true;
        },
        signModalClosed: function () {
            this.showModal = false;
        }
    } */
}
</script>
