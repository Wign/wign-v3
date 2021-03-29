<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <JetBanner />
        <Header />

        <!-- Page Content -->
        <main class="flex-grow">
            <slot></slot>
        </main>

        <Footer />

        <!-- Modal Portal -->
        <portal-target name="modal" multiple />
    </div>
</template>

<script>
import Header from "./Header";
import Footer from "./Footer";
import JetBanner from "../Jetstream/Banner"

export default {
    components: {
        JetBanner,
        Header,
        Footer
    }
}
</script>
