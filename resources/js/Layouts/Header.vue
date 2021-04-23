<template>
    <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <!-- Logo -->
                <div class="flex-shrink-0 flex-grow flex items-center">
                    <inertia-link :href="route('dashboard')">
                        <jet-application-mark class="block h-9 w-auto"/>
                    </inertia-link>
                </div>
                <div class="flex">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-5 sm:-my-px sm:ml-10 sm:flex">
                        <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Upload et tegn
                        </jet-nav-link>

                        <jet-nav-link :href="route('words')" :active="route().current('words')">
                            Efterlyste tegn
                        </jet-nav-link>

                        <jet-nav-link :href="route('randomSign')" :active="route().current('randomSign')">
                            Seneste tegn
                        </jet-nav-link>

                        <jet-nav-link :href="route('about')" :active="route().current('about')">
                            Om Wign
                        </jet-nav-link>

                        <jet-nav-link v-if="!$page.props.user" :href="route('login')"
                                      :active="route().current('login')">
                            Login
                        </jet-nav-link>

                        <NavBtn v-if="!$page.props.user" :href="route('register')"
                                :active="route().current('register')">
                            Register dig
                        </NavBtn>
                    </div>


                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative" v-if="$page.props.user">
                            <jet-dropdown align="right" width="48">
                                <template #trigger>
                                <span class="inline-flex rounded-md">
                                            <button type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </span>
                                </template>

                                <template #content>
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Brugerprofil
                                    </div>

                                    <jet-dropdown-link :href="route('profile.show')">
                                        Profil
                                    </jet-dropdown-link>

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form @submit.prevent="logout">
                                        <jet-dropdown-link as="button">
                                            Log ud
                                        </jet-dropdown-link>
                                    </form>
                                </template>
                            </jet-dropdown>
                        </div>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="showingNavigationDropdown = ! showingNavigationDropdown"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path
                                :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"/>
                            <path
                                :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </jet-responsive-nav-link>

                <jet-responsive-nav-link :href="route('words')" :active="route().current('words')">
                    Wordlist
                </jet-responsive-nav-link>

                <jet-responsive-nav-link :href="route('randomSign')" :active="route().current('randomSign')">
                    Random Sign
                </jet-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                        Profil
                    </jet-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" @submit.prevent="logout">
                        <jet-responsive-nav-link as="button">
                            Log ud
                        </jet-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import JetApplicationMark from '@/Jetstream/ApplicationMark'
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetNavLink from '@/Jetstream/NavLink'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
import Btn from "@/Components/UI/Btn";
import NavBtn from "@/Components/NavBtn";

export default {
    components: {
        NavBtn,
        Btn,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink
    },
    props: {
        search: {
            type: Boolean,
            default: true,
        },
    },
    data() {
        return {
            showingNavigationDropdown: false,
        }
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
    },
    computed: {
        name: function () {
            let size = 20;
            let source = this.$page.props.user?.name?.split(/(\s+)/, 1)[0];
            return source?.length > size ? source.slice(0, size - 1).trim().concat('…') : source;
        },
        email: function () {
            return this.$page.props.user?.email;
        }
    }
}
</script>
