<template>
    <div class="min-h-screen flex flex-col">
        <JetBanner />
        <Header :search="headerSearch" />

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
    props: ['background', 'headerSearch'],
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
