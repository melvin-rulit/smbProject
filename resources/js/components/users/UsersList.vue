<template>
    <h3 class="text-4xl font-extrabold dark:text-white">Пользователи</h3>

</template>

<script>
import {UserService} from "../../services/UserService";
import _ from "lodash"


export default {
    components: {},
    data: function () {
        return {
            users: [],
            loading: false,
            errorMessage: null,
            query: '',
            limit: 5,
            total: 1
        }
    },
    name: "UsersList",
    created:  function () {
        this.update(this.page)
    },
    methods: {
        update:  function () {
            this.loading = true
            UserService.getUsers(this.page, this.query)
                .then(response => {
                this.users = response.data.users
                this.limit = response.data.limit
                this.total = response.data.total
            })
                .catch(error => this.errors = error.data.message || error)
                .finally(() => this.loading = false)
        },

    },

}
</script>
