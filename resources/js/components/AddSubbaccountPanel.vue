<template>
            <div class="relative bg-white dark:bg-gray-700 ml-2">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Добавить субаккаунт
                    </h3>
                </div>

                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">

                        <div class="col-span-2">
                            <label for="name"
                                   class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Биржа</label>
                            <multiselect v-model="form.exchange" :options="exchange" placeholder="Биржа"
                                         :show-labels="false" label="name"></multiselect>
                        </div>

                        <div class="col-span-2">
                            <TextInput title="Название" v-model:value="form.name"/>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
<!--                            <label for="price"-->
<!--                                   class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" style="width: 200px; padding-left: 35%; margin-left: 30px">Стартовый-->
<!--                                капитал</label>  -->
                            <label for="price"
                                   class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Стартовый
                                капитал</label>

                            <div class="flex justify-between">
                                <div class="flex items-center mr-4">
                                    <div class="mr-2">BTC:</div>
                                    <TextInput v-model:value="form.BTC" width="120px"/>
                                </div>
                                <div class="flex items-center">
                                    <div class="mr-2">USDT:</div>
                                    <TextInput v-model:value="form.USDT" width="120px"/>
                                </div>
                            </div>

                        </div>

                        <div class="col-span-2">
                            <TextInput title="API ключ:" v-model:value="form.BTC"/>
                        </div>

                        <div class="col-span-2">
                            <TextInput title="API секрет:" v-model:value="form.BTC"/>
                        </div>

                    </div>

                    <div class="flex px-10 py-4 mt-3">
                        <div class="flex justify-center">

                            <button @click="closePanel"
                                type="button"
                                class="flex items-center text-white bg-blue-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-2 border hover:border-black-600">
                                <svg
                                    class="w-6 h-6 text-gray-800 dark:text-white mr-3"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24">
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="0.7"
                                        d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                                </svg>
                                <span class="text-blue-600 text-xl">Назад</span>
                            </button>

                            <button type="button"
                                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-12 mt-2">
                                Сохранить
                            </button>


                        </div>
                    </div>

                </form>
            </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import {SubAccounts} from "../services/SubAccounts";
import TextInput from "./instruments/TextInput.vue"
export default {
    name: "AddSubbaccountPanel",
    components: {Multiselect, TextInput},

    data: function () {
        return {
            exchange: [],
            form: {
                exchange: '',
                name: '',
                BTC: '',
                USDT: '',
            }
        }
    },
    created: function () {
        this.update()
    },
    methods: {
        update: function () {
            SubAccounts.getExchanges().then(response => {
                this.exchange = response.data.exchangeNames
            })
        },
        closePanel() {
            this.$emit('close');
        }
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>


