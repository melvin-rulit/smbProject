<template>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8">
            <Success :message="message"/>
            <Error :errors="errors"/>
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Редактирование филиала</h3>
            <form @submit="update">
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
    name: "BranchCreate",
    components: {Success, Error, TextInput},
    data: function () {
        return {
            id: this.$route.params.id,
            branch: {
                'name': '',
                'address': '',
            },
            message: '',
            errors: '',
        }
    },
    created() {
        this.branch = this.getBranchById(this.id)
    },

    methods: {
        getBranchById: async function (id){
            await BranchService.getById(id)
            .then(response => this.branch = response.data.branch)
            .catch(error => { this.errors = error.response.data.message })
        },
        update: async function(event) {
            event.preventDefault()
            await BranchService.update(this.branch)
                .then(response => {
                    this.branch = response.data.branch
                    this.message = "Филиал обновлен"
                })
                .catch(error => { this.errors = error.response.data.message })
        }
    }
}
</script>

<style scoped>

</style>
