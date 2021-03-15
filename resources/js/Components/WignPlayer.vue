<template>
    <player :id=id
            :data-uuid=video_uuid
            :data-app-id=appid
            :data-controls=controls
            :data-displaytitle=displayTitle
            :data-displaydescription=displayDescription
            :data-mute=mute
            :data-repeat=repeat
            :data-download=download
    />
</template>

<script>
export default {
    props: {
        sign_id: Number,
        video_uuid: String
    },
    data: function () {
        return {
            id: 'video_'+this.sign_id,
            appid: 'a-49088bd0-39cc-0132-ccc4-12313914f10b',
            controls: true.toString(),
            displayTitle: false.toString(),
            displayDescription: false.toString(),
            mute: true.toString(),
            repeat: false.toString(),
            download: false.toString(),
        }
    },
    mounted() {
        CameraTag.observe(this.id, "play", () => this.played());
    },
    methods: {
        played: function () {
            axios
                .post('/played', {signId: this.sign_id})
                .then(r => (
                    this.$emit('played', r.data.playings)
                ));
        }
    }
}
</script>
