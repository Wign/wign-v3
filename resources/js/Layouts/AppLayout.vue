<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <JetBanner />
        <Header />

        <!-- Page Content -->
        <main class="flex-grow" :style="backgroundStyle">
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
    props: ['background'],
    components: {
        JetBanner,
        Header,
        Footer
    },
    computed: {
        backgroundStyle() {
            if(this.background) {
                return "background: url('"+this.background+"') center center / cover no-repeat fixed;"
            }
        }
    }
}
</script>
