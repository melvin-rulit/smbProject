<template>

</template>

<script>
import {SubAccounts} from "../../services/SubAccounts";


export default {
    name: "UserEditForm",
    components: {},
    data: function () {
        return {
            loading: false,
            id: this.$route.params.id,
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
            submitted: false,
            message: null
        }
    },
    created() {
        SubAccounts.getById(this.id)
            .then(response => this.user = response.data.user)
            .catch(error => {
                this.errors = error.response.data.message
            })
        SubAccounts.getRoles().then(response => this.userRoles = response.data.roles)

    },
    methods: {
        update: async function (event) {
            event.preventDefault()
            this.errors = null
            SubAccounts.update(this.user)
                .then(response => {
                    this.user = response.data.user
                    this.message = 'Изменения сохранены'
                })
                .catch(error => {
                    this.errors = error.response.data.message
                })
        }
    }
}
</script>
