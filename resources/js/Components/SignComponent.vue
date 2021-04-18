<template>
    <div>
        <SignPlayer :video_uuid=sign.video_uuid :sign_id="sign.id" v-on:played="videoPlayed"/>
        <div>Playings: {{ sign.playings }}</div>
        <SignLiker :sign_id="sign.id" :count="sign.likes_count" :liked="sign.liked"/>
    </div>
</template>

<script>
import SignPlayer from "@/Components/SignPlayer";
import SignLiker from "@/Components/SignLiker";

export default {
    components: {
        SignPlayer, SignLiker
    },
    props: ['sign'],
    data: function () {
        return {
            playings: this.sign.playings
        }
    },
    methods: {
        videoPlayed: function (value) {
            console.log("Emitting played count got! Trying to replace!");
            this.playings = value;
        }
    }
}
</script>
