<template>
    <appLayout :background="background.url" :header-search="false">
        <div class="flex flex-col content-between main-height">
            <div class="flex-grow flex flex-col justify-center"><IndexSearch /></div>
            <div class="container text-right" ><a href="#" class="text-white font-semibold text-shadow">{{background.title}} af {{background.artist}}</a></div>
            <Discover :signs="signs" :requests="requests" :counts="counts"/>
        </div>
    </appLayout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import Discover from "@/Components/Discover";
import IndexSearch from "@/Components/IndexSearch";

export default {
    props: ['signs', 'requests', 'counts', 'background'],
    components: {IndexSearch, Discover, AppLayout}
}
</script>
