<template>

</template>

<script>
import {UserService} from "../../services/UserService";


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
        UserService.getById(this.id)
            .then(response => this.user = response.data.user)
            .catch(error => {
                this.errors = error.response.data.message
            })
        UserService.getRoles().then(response => this.userRoles = response.data.roles)

    },
    methods: {
        update: async function (event) {
            event.preventDefault()
            this.errors = null
            UserService.update(this.user)
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
