<template>
    <div class="md:flex my-6">
        <div class="md:flex-shrink-0 md:w-2/5">
            <SignPlayer :video_uuid=sign.video_uuid :sign_id="sign.id" v-on:played="videoPlayed"/>
        </div>
        <div class="mt-4 md:w-3/5 md:mt-0 md:ml-6 border-b border-gray-400 flex flex-col justify-between">
            <div>
                <h1 v-if="literal" class="font-bold">{{ literal }}</h1>
                <p class="mt-2 italic text-xs">{{ playings }} visninger &middot; {{ date }}</p>
                <p v-if="sign.description.text" class="mt-2">
                    {{ descriptionTextFirst }}
                    <transition name="fade">
                        <span :key="descriptionTextLast" v-if="showFullDescription">
                            {{ descriptionTextLast }}
                        </span>
                    </transition>
                    <a href="#" class="font-semibold italic" @click="showFullDescription = !showFullDescription" v-html="showMoreText" />
                </p>
            </div>
            <div class="flex-grow-0">
                <p class="text-xs italic mt-2">Uploadet af {{ sign.creator.name }}</p>
                <div class="flex flex-row justify-between my-1">
                    <SignLiker :sign_id="sign.id" :count="sign.likes_count" :liked="sign.liked"/>
                    <Dropdown>
                        <template #trigger>
                            <button class="p-1" type="button"><font-awesome-icon :icon="['fas', 'ellipsis-h']"></font-awesome-icon></button>
                        </template>
                        <template #content>
                            <!-- TODO: Add link to edit the sign / description etc etc -->
                            <DropdownLink :href="route('report', {signId: sign.id})">
                                <font-awesome-icon :icon="['fas', 'flag']" class="mr-2"/>Rapportér
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SignPlayer from "@/Components/SignPlayer";
import SignLiker from "@/Components/SignLiker";
import Dropdown from "@/Jetstream/Dropdown";
import DropdownLink from "@/Jetstream/DropdownLink";
import { parseISO, format } from 'date-fns';
import { da } from 'date-fns/locale'

const maxChar = 150;

export default {
    components: {
        SignPlayer, SignLiker, Dropdown, DropdownLink
    },
    props: ['sign', 'literal'],
    data: function () {
        return {
            playings: this.sign.playings,
            descriptionTooLong: this.sign.description.text.length > maxChar,
            showFullDescription: this.sign.description.text.length <= maxChar,
        }
    },
    methods: {
        videoPlayed: function (value) {
            //Got a emitted played count. Replacing the curreny playings count with new
            this.playings = value;
        }
    },
    computed: {
        date: function () {
            return format(parseISO(this.sign.created_at), 'dd. MMM yyyy', {locale: da})
        },
        descriptionTextFirst: function () {
            return this.sign.description.text.slice(0, maxChar);
        },
        descriptionTextLast: function () {
            return this.sign.description.text.slice(maxChar);
        },
        showMoreText: function () {
            return this.showFullDescription ? 'vis&nbsp;mindre' : 'læs&nbsp;mere';
        }
    }
}
</script>
