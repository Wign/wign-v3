<template>
    <footer class="h-16 bg-white flex justify-center text-xs font-light">
        <div class="flex flex-col text-center">
            <nav class="pt-3 pb-1 container">
                <inertia-link :href="route('contact')" class="text-gray-700 underline mx-1 hover:text-gray-500">Kontakt</inertia-link>
                <inertia-link :href="route('policy.show')" class="text-gray-700 underline mx-1 hover:text-gray-500">Privatlivspolitik</inertia-link>
                <inertia-link :href="route('terms.show')" class="text-gray-700 underline mx-1 hover:text-gray-500">Servicevilkår</inertia-link>
                <span class="px-1">|</span>
                <a href="https://www.facebook.com/wign.dk" target="_blank" class="no-underline mx-1 text-base"><font-awesome-icon :icon="['fab', 'facebook-square']" class="align-middle" /></a>
                <a href="https://github.com/Wign/Wign-design-v2" target="_blank" class="no-underline mx-1 text-base"><font-awesome-icon :icon="['fab', 'github']" class="align-middle" /></a>
            </nav>
            <div class="text-gray-700">&copy; 2009-{{ year }} Wign</div>
        </div>
    </footer>
</template>

<script>
export default {
    computed: {
        year: function () {
            return new Date().getFullYear();
        }
    }
}
</script>
