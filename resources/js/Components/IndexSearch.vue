<template>
        <form class="mx-auto w-4/5 md:w-2/3 lg:w-1/2 xl:w-1/3 mb-40 mt-10 shadow-box rounded-lg">
            <div class="relative">
                <FormAutocomplete></FormAutocomplete>
            </div>
        </form>
</template>
<script>
import FormAutocomplete from "@/Components/Form/FormAutocomplete";

export default {
    components: {FormAutocomplete}
}
</script>
