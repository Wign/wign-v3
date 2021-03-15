<template>
    <div>
        <wignPlayer :video_uuid=sign.video_uuid :sign_id="sign.id" v-on:played="videoPlayed"/>
        <div>Playings: {{ playings }}</div>
        <wignLiker :sign_id="sign.id" :count="sign.likes_count" :liked="sign.liked"/>
    </div>
</template>

<script>
import WignPlayer from "../../Components/WignPlayer";
import WignLiker from "../../Components/WignLiker";
import AppLayout from "../../Layouts/AppLayout";

export default {
    components: {AppLayout, WignPlayer, WignLiker},
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
