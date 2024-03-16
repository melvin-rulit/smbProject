<template>

</template>

<script>
import {SubAccounts} from "../../services/SubAccounts";


export default {
    name: "UserCreateForm",
    components: {},
    data: function () {
        return {
            loading: false,
            userRoles: [],
            branches: [],
            user: {
                'firstName': '',
                'middleName': '',
                'lastName': '',
                'birthday': null,
                'passportSeries': '',
                'passportNumber': '',
                'passportNotes': '',
                'registrationAddress': '',
                'comment': '',
                'phoneNumber': '',
                'email': '',
                'enabled': '',
                'password': null,
                'roleId': 0,
                'branchId': 0
            },
            errors: null,
            message: null
        }
    },
    created: async function () {
        SubAccounts.getRoles().then(response => this.userRoles = response.data.roles)
    },
    methods: {
        store: async function (event) {
            event.preventDefault()
            this.errors = null
            SubAccounts.store(this.user)
                .then(response => {
                    this.user = response.data.user
                    this.$router.push({name: 'listUsers'})
                })
                .catch(error => {
                    this.errors = error.response.data.message
                })
            return true;
        }
    }
}
</script>
