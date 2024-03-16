<template>
    <h3 class="text-4xl font-extrabold dark:text-white">Пользователи</h3>

</template>

<script>
import {SubAccounts} from "../../services/SubAccounts";

export default {
    components: {},
    data: function () {
        return {
            sub_accounts: [],
        }
    },
    name: "UsersList",
    created:  function () {
        this.update(this.page)
    },
    methods: {
        update:  function () {
            SubAccounts.getSubAccounts().then(response => {this.sub_accounts = response.data.sub_accounts })
        },

    },

}
</script>
