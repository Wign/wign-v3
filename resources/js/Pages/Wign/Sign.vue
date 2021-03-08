<template>
    <div>
        <WignPlayer :video_uuid=sign.video_uuid v-on:played="videoPlayed"></WignPlayer>
        <div>Playings: {{ playings }}</div>
    </div>
</template>

<script>
import WignPlayer from "../../Wign/WignPlayer";

export default {
    components: {WignPlayer},
    props: ['sign'],
    data: function () {
        return {
            playings: this.$props.sign.playings
        }
    },
    methods: {
        videoPlayed: function () {
            console.log("Emitting played got! Trying to post!");
            axios
                .post('/played', {signId: this.$props.sign.id})
                .then(r => (
                    this.playings = r.data.playings
                ));
        },
    }
}
</script>
