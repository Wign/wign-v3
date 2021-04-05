<template>
    <div class="bg-translucent-80">
        <div class="container mx-auto pt-4 pb-6">
            <div class="flex flex-wrap">
                <DiscoverSign :signs="signs" :count="counts.signs" />
                <DiscoverRequest :requests="requests" :count="counts.requests" />
            </div>
        </div>
    </div>
</template>
<script>
import DiscoverSign from "@/Components/DiscoverSign";
import DiscoverRequest from "@/Components/DiscoverRequest";

export default {
    props: ['signs', 'requests', 'counts'],
    components: {DiscoverRequest, DiscoverSign}
}
</script>
