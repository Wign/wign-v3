<template>
    <div class="container mt-16 flex flex-wrap pb-6">
        <div class="w-full lg:w-3/5 p-10 bg-translucent-80">
            <slot>Left side</slot>
        </div>
        <div class="w-full lg:w-2/5 p-10{{ (isset($inverted) && $inverted) ? ' bg-turkis' : ' bg-white'}}">
            <slot>Right side</slot>
        </div>
    </div>
</template>
