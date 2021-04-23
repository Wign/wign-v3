<template>
    <DialogModal :show="showModal" @close="emitClosed">
        <template #title>
            {{literal}}
        </template>

        <template #content>
            <SignPlayer :video_uuid="uuid" :sign_id="id"></SignPlayer>
        </template>

        <template #footer>
            <a @click.prevent="emitClosed" href="#">Luk</a>
        </template>
    </DialogModal>
</template>

<script>
import DialogModal from "@/Jetstream/DialogModal";
import SignPlayer from "@/Components/SignPlayer";

export default {
    components: {SignPlayer, DialogModal},
    props: ['sign', 'showModal'],
    data: function () {
        return {
            show: this.showModal
        }
    },
    computed: {
        literal() {
            return this.sign?.word.literal;
        },
        id() {
            return this.sign?.id;
        },
        uuid() {
            return this.sign?.video_uuid;
        }
    },
    methods: {
        emitClosed: function () {
            this.$emit('modalClosed');
            console.log("closed");
            console.log(this.id);
            console.log(CameraTag.players[this.id]);
            CameraTag.players[this.id].remove();
        }
    },
    watch: {
        showModal: function (oldvalue, newvalue) {
            if(!newvalue) {
                console.log("ping!");
                CameraTag.setup();
            }
        }
    },
}
</script>
