<template>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Добавление актива</h3>
            <Success :message="message"/>
            <Error :errors="errors"/>

            <form @submit="store">
                <div class="grid md:grid-cols-5 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Марка и модель" v-model:value="active.name" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Номер кузова" v-model:value="active.body_number" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Регистрационный номер" v-model:value="active.reg_number" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Год выпуска" v-model:value="active.year"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Цвет" v-model:value="active.color_id" :values="colors()"/>
                    </div>
                </div>

                <div v-if="currentUser.role_id === 1" class="relative z-0 w-full mb-6 group">
                    <Select title="Филиал" v-model:value="active.branch_id" :values="branches"/>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Стоимость актива" v-model:value="active.cost" step="0.01"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Источник финансирования" v-model:value="active.investor_id" :values="investors"/>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Стоимость аренды (неделя)" v-model:value="active.cost_of_rent" step="1"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Стоимость выкупа (неделя)" v-model:value="active.cost_of_buyout" step="1"/>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Номер страхового полиса ОСАГО" v-model:value="active.osago_number" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <DataInput title="Дата действия страхового полиса ОСАГО" v-model:value="active.osago" type="date"/>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Серия свидетельства о регистрации" v-model:value="active.document_series"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Номер свидетельства о регистрации" v-model:value="active.document_number"/>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Код подразделения" v-model:value="active.document_notes"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <DataInput title="Дата выдачи" v-model:value="active.document_date" type="date"/>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <router-link to="/actives" type="button"
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
import {UserService} from "../../services/UserService";
import {ActiveService} from "../../services/ActiveService";
import {BranchService} from "../../services/BranchService";
import TextInput from "../instruments/TextInput.vue";
import NumberInput from "../instruments/NumberInput.vue";
import Error from "../instruments/Error.vue";
import Success from "../instruments/Success.vue";
import DataInput from "../instruments/DataInput.vue";
import Select from "../instruments/Select.vue";

export default {
    name: "ActiveCreate",
    components: {Select, DataInput, Success, Error, TextInput, NumberInput},

    data: function (){
        return {
            currentUser: {
                role_id: null
            },
            active: {
                'name': '',
                'body_number': '',
                'reg_number': '',
                'year': '',
                'color_id': '',
                'cost': '',
                'cost_of_rent': '',
                'cost_of_buyout': '',
                'investor_id': '',
                'branch_id': '',
                'osago': '',
                'osago_number': '',
                'document_series': '',
                'document_number': '',
                'document_date': '',
                'document_notes': '',
            },
            branches: [],
            investors: [],
            errors: null,
            message: null,
        }
    },
    mounted() {
        UserService.currentUser()
            .then(response => this.currentUser = response.data.user)
        UserService.getInvestorList()
            .then(response => this.investors = response.data.investors)
    },
    methods: {
        store: async function (event) {
            event.preventDefault()
            this.errors = null
            ActiveService.store(this.active)
                .then(response => {
                    this.active = response.data.active
                    this.$router.push({name: 'editActive', params: {id: this.active.id}})
                })
                .catch(error => {
                    this.errors = error.response.data.message
                    this.$router.push({name: 'listActive'})
                })
        },

        colors: function () {
            return [
                {id: 1, name: 'Белый'},
                {id: 2, name: 'Черный'},
                {id: 3, name: 'Красный'},
                {id: 4, name: 'Серый'},
                {id: 5, name: 'Голубой'},
                {id: 6, name: 'Коричневый'},
                {id: 7, name: 'Зеленый'},
                {id: 8, name: 'Желтый'},
            ];
        }
    }
}
</script>
