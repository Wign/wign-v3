<template>
    <inertia-link class="btn btn-turkis-outline rounded" :href="link"><slot>{{literal}}</slot></inertia-link>
</template>

<script>
export default {
    props: ['literal'],
    data: function () {
        return {
            link: '/create/'+this.literal
        }
    }
}
</script>
