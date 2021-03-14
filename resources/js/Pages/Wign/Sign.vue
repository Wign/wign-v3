<template>
    <div>
        <WignPlayer :video_uuid=sign.video_uuid :sign_id="sign.id" v-on:played="videoPlayed" />
        <div>Playings: {{ playings }}</div>
        <WignLiker :sign_id="sign.id" :count="sign.likes_count" :liked="sign.liked" />
    </div>
</template>

<script>
import WignPlayer from "../../Wign/WignPlayer";
import WignLiker from "../../Wign/WignLiker";

export default {
    components: {WignPlayer, WignLiker},
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
        },
    }
}
</script>
