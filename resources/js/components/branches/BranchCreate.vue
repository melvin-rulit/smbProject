<template>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Добавление филиала</h3>
            <Success :message="message"/>
            <Error :errors="errors"/>
            <form @submit="store">
                <div class="relative z-0 w-full mb-6 group">
                    <TextInput title="Название" v-model:value="branch.name" type="text"/>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <TextInput title="Адрес" v-model:value="branch.address" type="text"/>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <router-link to="/branches" type="button"
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
import {BranchService} from "../../services/BranchService";
import TextInput from "../instruments/TextInput.vue";
import Error from "../instruments/Error.vue";
import Success from "../instruments/Success.vue";

export default {
    name: "BranchCreateForm",
    components: {Success, Error, TextInput},

    data: function () {
        return {
            loading: false,
            branch: {
                'name': '',
                'address': ''
            },
            errors: null,
            message: null,
        }
    },
    methods: {
        store: async function (event) {
            event.preventDefault()
            this.errors = null
            BranchService.store(this.branch)
                .then(response => {
                    this.message = "Филиал создан"
                    this.branch = response.data.branch
                    this.$router.push({name: 'listBranches'})
                })
                .catch(error => {
                    this.errors = error.response.data.message
                })
        }
    }
}
</script>
