<template>
    <div class="inline">
        <VTooltip class="inline" :disabled="canLike">
            <button class="p-1" :class="{'cursor-not-allowed': !canLike}" v-on:click="toggleLike">
                <font-awesome-icon :icon="likeIcon" :style="{ color: likeColor }"></font-awesome-icon>
            </button> {{ likeCounter }}
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
        },
        likeIcon: function () {
            return this.isLiked ? ['fas', 'thumbs-up'] : ['far', 'thumbs-up'];
        },
        likeColor: function () {
            return this.isLiked ? '#4d9999' : 'black';
        }
    }
}
</script>
