<template>
    <inertia-link :href="href" class="btn btn-turkis text-sm h-auto rounded my-auto">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: ['href'],
}
</script>
