<template>
    <nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-1 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">

                <div class="flex items-center justify-start">
                </div>

                <div class="flex items-center">
                    <div class="hidden mr-3 -mb-1 sm:block">
                        <span></span>
                    </div>

                    <div class="flex items-center ml-3">

                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"
                              type="button" data-drawer-target="drawer-right-example"
                              data-drawer-show="drawer-right-example" data-drawer-placement="right"
                              aria-controls="drawer-right-example">{{ user.name }}</span>
                        <span class="d-none d-md-block">
                <span class="label label-md font-weight-bold label-light-success label-inline">
                   {{ firstLetter }}
                </span>
            </span>

<OuickPanel :user="user"/>

                    </div>

                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import {UserService} from "../services/UserService";
import OuickPanel from "./QuickPanel.vue";

export default {
    name: "Header",
    components: {OuickPanel},

    data: function () {
        return {
            'user': {
                'email': null,
                'name': null
            },
            sidebarVisible: false
        }
    },
    mounted() {
        UserService.currentUser()
            .then(response => this.user = response.data.user)
    },
    computed: {
        firstLetter() {
            return this.user.name.charAt(0).toUpperCase();
        }
    },
}
</script>
