<template>
    <div class="right">
       <div v-show="add_SubAccount">
           <AddSubbaccountPanel @close="closeSubAccountPanel"/>
       </div>

        <div v-show="add_Bots" class="flex items-center">

            <button v-show="howbutton" @click="nextPanel" type="button"
                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-2 mt-2">
                Добавить бота
            </button>


            <div v-show="panel" class=" w-full">
                <!--                    <div class="bg-white py-1 px-1 md:px-8 xl:px-10  ml-2">-->
                <div class="bg-white py-1 px-1 ml-2 mr-1">

                    <div class="card card-layout-frame border-0">
                        <div class="card-body">
                            <div class="flex justify-center">
                                <svg @click="nextPanel" class="w-6 h-6 text-gray-800 dark:text-white mr-3"
                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="0.7" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                                </svg>

                                <span class="text-xl">Добавить нового бота</span>

                            </div>
                        </div>


                        <section v-show="panels.botLimit"
                                 class="w-full bg-gray-200 rounded-full dark:bg-gray-700 mb-2 relative">
                            <div :class="circleClasses" :style="{ width: circleWidth, height: '18px'}">
            <span class="absolute ml-6 text-center ">
                Ботов {{ limits.used }} из {{ limits.limit }}
            </span>
                            </div>
                        </section>

                        <section v-show="limitBots" class="bg-white">
                            <div class="bg-red-400 text-white mb-6 p-3">
                                <h3 class="text-2xl">Лимит закончился 😕</h3>
                                <p>Вы израсходовали весь доступный лимит ботов, он составляет <b>{{
                                        limits.limit
                                    }}</b> ботов.</p>
                                <div class="border-bottom border-white opacity-20 mb-3 mt-3"></div>
                                <p class="mb-0 text-base">Обратитесь к администратору для увеличения лимита.</p>
                            </div>
                        </section>

                        <div class="multiselect-with-button mt-2">
                            <multiselect v-model="selectedSubAccaunt" :options="sub_accounts.items" label="name"
                                         placeholder="Субаккаунт"
                                         :show-labels="false"></multiselect>

                            <svg @click="openSubAccountPanel"
                                 class="w-[44px] h-[44px] text-gray-800 dark:text-white border hover:bg-blue-200 bg-blue-100"
                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                      clip-rule="evenodd"/>
                            </svg>

                        </div>

                        <div v-show="selectedSubAccaunt">

                            <div class="multiselect-with-button mt-2">
                                <multiselect v-model="TradingPair" :options="trading_pair" label="name"
                                             placeholder="Торговая пара" :show-labels="false"></multiselect>
                            </div>

                            <NumberInput title="Шаг сетки на покупку" v-model:value="step_of_Buy"/>

                            <multiselect v-model="typeBuy" :options="type_buy" placeholder="Тип стратегии для продажи"
                                         :show-labels="false"></multiselect>

                            <Slider v-show="typeBuy" v-model="sliderValue"
                                    title="Шаг в процентах для условия продажи:"/>

                            <Checkbox v-model:checked="filters.Prohibition_positions"
                                      title="Запрет на открытие новых позиций"/>
                            <Checkbox v-model:checked="filters.Permission_sales"
                                      title="Разрешение на множественные продажи позиций за один тик"/>
                            <Checkbox v-model:checked="filters.Trade_without_sending"
                                      title="Торговля без отправки сделок на биржу"/>

                            <div class="flex px-10 py-4 mt-3">
                                <div class="flex justify-center">

                                    <button
                                        type="button"
                                        class="flex items-center text-white bg-blue-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-2 border hover:border-black-600"
                                        @click="nextPanel">
                                        <svg
                                            class="w-6 h-6 text-gray-800 dark:text-white mr-3"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="0.7"
                                                d="M5 12h14M5 12l4-4m-4 4 4 4"
                                            />
                                        </svg>
                                        <span class="text-blue-600 text-xl">Назад</span>
                                    </button>

                                    <button type="button"
                                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-12 mt-2">
                                        Сохранить
                                    </button>


                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>
</template>

<script>
import Slider from "./instruments/Slider.vue";
import Multiselect from "vue-multiselect";
import Checkbox from "./instruments/Checkbox.vue";
import NumberInput from "./instruments/NumberInput.vue";
import {SubAccounts} from "../services/SubAccounts";
import AddSubbaccountPanel from "./AddSubbaccountPanel.vue"

export default {
    name: "AddBotPanel",
    components: {NumberInput, Checkbox, Multiselect, Slider, AddSubbaccountPanel},

    data: function () {
        return {
            selectedSubAccaunt: '',
            step_of_Buy: '',
            sliderValue: 0,
            howbutton: true,
            add_Bots: true,
            add_SubAccount: false,
            limits: {
                used: 0,
                limit: 10
            },
            sub_accounts: [],

            panel: false,
            buttons: {
                dateFrom: null,
                dateTo: null,
            },
            panels: {
                dateFrom: null,
                botLimit: true,
            },
            filters: {
                Prohibition_positions: false,
                Permission_sales: false,
                Trade_without_sending: false,

            },
            typeBuy: '',
            type_buy: [
                'Стратегия с фиксированным процентом',
                'Стратегия с искуственным интелектом'
            ],
            TradingPair: '',
            trading_pair: [],
        }
    },
    created: function () {
        this.update()
    },
    computed: {
        circleWidth() {
            return (this.limits.used / this.limits.limit) * 100 + '%';
        },
        circleClasses() {
            return [
                this.getCircleColor(this.limits.used, this.limits.limit),
                'text-base',
                'font-medium',
                'font-bold',
                'p-0.5',
                'leading-none',
                'rounded-full'
            ];
        },
        limitBots() {
            if (this.limits.used === this.limits.limit) {
                this.panels.botLimit = false
                return true
            }
        }
    },
    methods: {
        update: function () {
            SubAccounts.getSubAccounts().then(response => {
                this.sub_accounts = response.data.sub_accounts
            })
        },
        nextPanel() {
            this.panel = !this.panel;
            this.howbutton = !this.panel;
            this.typeBuy = '';
            this.selectedSubAccaunt = '';
        },
        openSubAccountPanel() {
            this.add_Bots = false
            this.add_SubAccount = true
        },
        closeSubAccountPanel() {
            this.add_Bots = true
            this.add_SubAccount = false
        },
        getCircleColor(used, limit) {
            if (used / limit * 100 >= 80) {
                return 'bg-red-600 text-red-100';
            } else if (used / limit * 100 >= 50) {
                return 'bg-orange-400 ';
            } else if (used / limit * 100 >= 20) {
                return 'bg-blue-400';
            } else if (used / limit * 100 >= 10) {
                return 'bg-green-400';
            }
        },
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style>
.container .left .top {
    height: 70%;
}

.right {
    flex: 0 0 21%;
    background-color: #eef0f8;
}

.additional {
    width: 100%;
    height: 50px;
    background-color: #ffffff;
}

.text-center {
    padding-left: 30%;
}

.multiselect-with-button {
    display: flex;
    align-items: center;
}

.multiselect-with-button button {
    margin-left: 8px;
}

</style>

