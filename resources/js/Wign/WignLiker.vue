<template>
    <div class="inline">
        Likes: {{ likeCounter }}
        <button class="border p-1" v-on:click="toggleLike">{{ isLiked ? "Already liked!" : "Not liked yet!" }}</button>
    </div>
</template>

<script>
export default {
    props: {
        sign_id: Number,
        count: Number,
        liked: Boolean,
    },
    data: function () {
        return {
            likeCounter: this.count,
            isLiked: this.liked,
        }
    },
    methods: {
        toggleLike: function () {
            console.log("Clicked!");
            axios
                .post('/liked', {signId: this.sign_id})
                .then(r => {
                    this.isLiked = r.data.liked;
                    this.likeCounter = r.data.likes;
                });
        }
    }
}
</script>
