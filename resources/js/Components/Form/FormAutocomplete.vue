<template>
    <Autocomplete
        :search="search"
        placeholder="Søg på Wign"
        aria-label="Søg på Wign"
        :get-result-value="getResultValue"
        @submit="handleSubmit"
        :debounce-time="300"
    />
</template>

<script>
import Autocomplete from '@trevoreyre/autocomplete-vue'
import '@trevoreyre/autocomplete-vue/dist/style.css'

export default {
    components: {
        Autocomplete
    },
    methods: {
        search(input) {
            if (input.length >= 3) {
                const url = '/search/' + encodeURI(input);
                return axios.get(url).then(r => {
                        return r.data;
                    }
                );
            } else {
                return [];
            }
        },
        getResultValue(result) {
            return result.literal;
        },
        handleSubmit(result) {
            var url = '/sign/' + encodeURI(result.literal);
            this.$inertia.visit(url);
        }
    }
}
</script>
