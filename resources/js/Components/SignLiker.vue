<template>
    <div class="inline">
        Likes: {{ likeCounter }}
        <VTooltip class="inline" :disabled="canLike">
            <button class="border p-1" v-on:click="toggleLike">
                {{ isLiked ? "Already liked!" : "Not liked yet!" }}
            </button>
            <template #popper>Du skal være logget ind for at like et tegn</template>
        </VTooltip>
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
            if (this.canLike) {
                axios
                    .post('/liked', {signId: this.sign_id})
                    .then(r => {
                        this.isLiked = r.data.liked;
                        this.likeCounter = r.data.likes;
                    });
            } else {
                this.$inertia.visit('/login');
            }
        }
    },
    computed: {
        canLike: function () {
            return !!this.$page.props.user;
        }
    }
}
</script>
