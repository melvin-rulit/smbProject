<template>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Редактирование клиента</h3>
            <Success :message="message"/>
            <Error :errors="errors"/>
            <form @submit="update">

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Фамилия" v-model:value="client.middle_name" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-100 mb-6 group">
                            <DateInput title="Дата рождения" v-model:value="client.birthday" type="date"/>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Имя" v-model:value="client.first_name" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-100 mb-6 group">
                            <TextInput title="Номер телефона" v-model:value="client.phone_number" type="text"/>
                        </div>
                    </div>

                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Отчество" v-model:value="client.last_name" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-100 mb-6 group">
                            <TextInput title="Email" v-model:value="client.email" type="email"/>
                        </div>
                    </div>
                </div>


                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Серия паспорта" v-model:value="client.passport_series" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-100 mb-6 group">
                            <TextInput title="Номер паспорта" v-model:value="client.passport_number" type="text"/>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Адрес регистрации" v-model:value="client.registration_address" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-100 mb-6 group">
                            <TextInput title="Кем выдан паспорт" v-model:value="client.passport_notes" type="text"/>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Вид на жительство" v-model:value="client.resident_card" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-100 mb-6 group">
                            <TextInput title="Персональный номер" v-model:value="client.personnel_number" type="text"/>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Адрес прописки" v-model:value="client.registration_address" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-100 mb-6 group">
                            <TextInput title="Адрес фактического проживания" v-model:value="client.residence_address" type="text"/>
                        </div>
                    </div>
                </div>


                <div class="relative z-0 w-full mb-6 group">
                                        <Textarea title="Комментарий" v-model:value="client.comment"/>
                </div>


                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <router-link to="/clients" type="button"
                                 class="text-sm font-semibold leading-6 text-gray-900">Отмена
                    </router-link>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import {ClientService} from "../../services/ClientService";
import TextInput from "../instruments/TextInput.vue";
import Error from "../instruments/Error.vue";
import Success from "../instruments/Success.vue";
import DateInput from "../instruments/DataInput.vue";
import Select from "../instruments/Select.vue";

export default {
    name: "ClientEditForm",
    components: {Select, DateInput, Success, Error, TextInput},
    data: function () {
        return {
            loading: true,
            id: this.$route.params.id,
            client: {
                'firstName': '',
                'middleName': '',
                'lastName': '',
                'birthday': '',
                'passport_series': '',
                'passport_number': '',
                'phone_number': '',
                'registration_address': '',
                'residence_address': '',
                'resident_card': '',
                'personnel_number': '',
                'passport_notes': '',
                'email': '',
                'comment': null,
            },
            errors: null,
            message: null
        }
    },
    created() {
        ClientService.getById(this.id)
            .then(response => {
                this.client = response.data.client
            })
            .catch(function (error) {
                self.errors = error.response.data.message
            })
            .finally(() => this.loading = false)
    },
    methods: {
        update: async function (event) {
            event.preventDefault()
            this.errors = null
            ClientService.update(this.client)
                .then(response => {
                    this.client = response.data.client
                    this.message = 'Клиент обновлен'
                })
                .catch(error => {
                    this.errors = error.response.data.message
                })
        },

    }
}
</script>
