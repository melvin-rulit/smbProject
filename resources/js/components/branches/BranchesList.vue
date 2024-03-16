<template>
    <!--    <div class="sm:px-6 w-full">-->
    <!--        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">-->

    <div class="container">
        <div class="left">
            <div class="top">Top Content</div>
            <div class="bottom rounded-xl flex flex-col">
                <div class="flex-none  border-b h-[50px]">

                    <div class="flex-container flex">
                        <div class="flex-grow mt-3 ml-2 text-muted font-weight-bold mr-2">{{
                                sub_accounts.total_count
                            }}
                        </div>
                        <div class="relative w-1/5 mb-3 mr-5 group">

                            <input class="form-control find mt-1.5"
                                   v-model="form.dateFrom" placeholder="Поиск Субаккаунта"
                                   @keyup.enter="">
                        </div>

                    </div>
                </div>
                <div class="flex-grow">



                                        <div class="card-body table-responsive px-0 py-0">
                                            <div class="scroll" data-scroll="true" data-wheel-propagation="true" style="height: 140px">
                                                <!--begin::Items-->
                                                <div v-for="items in sub_accounts.items" :key="items.id" class="list list-hover min-w-500px" data-inbox="list">
                    <!--                            <div class="list list-hover min-w-500px" data-inbox="list">-->

                                                    <div class="d-flex align-items-center list-item card-spacer-x" data-inbox="message">
                                                        <!--begin::Toolbar-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Author-->
                                                            <div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3"
                                                                 data-toggle="collapse" data-target="#sub_account_info_{{ }}" style="min-width: 120px">
                                                    <span class="symbol symbol-20 mr-3">
                                                        <span class="symbol-label" >{{ items.id }}</span>
                                                    </span>
                                                                <a href="#" class="font-weight-bold text-dark-75 text-hover-primary"
                                                                 >
                                                                </a>
                                                            </div>
                                                            <!--end::Author-->
                                                        </div>
                                                        <!--end::Toolbar-->
                                                        <!--begin::Datetime-->
                                                        <div class="mt-2 mr-3 font-weight-bolder w-50px text-right" data-toggle="view">{{ items.total_count }}</div>
                                                        <!--end::Datetime-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::SubAccountInfo-->
<!--                                                    <div id="sub_account_info_{{  }}" class="collapse">-->
<!--                                                        <div class="card-body px-0 py-2">-->

<!--                                                            &lt;!&ndash;begin::Item&ndash;&gt;-->
<!--                                                            <div v-for="bot in sub_accounts.items" :key="items.id"  class="d-flex align-items-center list-item card-spacer-x" data-inbox="message">-->
<!--                                                                &lt;!&ndash;begin::Toolbar&ndash;&gt;-->
<!--                                                                <div class="d-flex align-items-center">-->
<!--                                                                    <div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3"-->
<!--                                                                         style="min-width: 120px">-->
<!--                                                                        &lt;!&ndash;span class="symbol symbol-20 mr-3">-->
<!--                                                                            <span class="symbol-label" style="background-image: url()"></span>-->
<!--                                                                        </span&ndash;&gt;-->
<!--                                                                        <span class="label label-dot label-{{ $bot->enabled ? 'success' : 'danger' }} mr-1"></span>-->
<!--                                                                        <span class="font-weight-bold text-dark-75 text-hover-primary"-->
<!--                                                                              x-data @click="$dispatch('show_bot', {show: 'open234'})"-->
<!--                                                                              wire:click="$dispatchTo('pages.trading', 'botShow', [{{ $bot->id }}])">-->
<!--                                                                    {{ $bot->bot_name }}-->
<!--                                                                </span>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                                <div style="width: 90px" class="mr-2">-->
<!--                                                                    <span class="font-size-h6 font-weight-bold">{{ $bot->symbol }}</span>-->
<!--                                                                </div>-->
<!--                                                                <div style="width: 80px" class="mr-2">-->
<!--                                                            <span class="label label-sm label-{{ $bot->color }} label-inline">-->
<!--                                                                {{ $bot->status_ru }}-->
<!--                                                            </span>-->
<!--                                                                </div>-->
<!--                                                                &lt;!&ndash;end::Toolbar&ndash;&gt;-->
<!--                                                                &lt;!&ndash;div class="mt-2 mr-3 font-weight-bolder w-50px text-right">-->
<!--                                                                    234234234-->
<!--                                                                </div&ndash;&gt;-->
<!--                                                            </div>-->
<!--                                                            &lt;!&ndash;end::Item&ndash;&gt;-->
<!--                                                            @empty-->
<!--                                                            <div class="d-flex align-items-center card-spacer-x">-->
<!--                                                                нет ботов-->
<!--                                                            </div>-->
<!--                                                            @endforelse-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                    <!--end::SubAccountInfo-->
                    <!--                                @empty-->
                    <!--                                <div class="d-flex align-items-center card-spacer-x">-->
                    <!--                                    нет субаккаунтов-->
                    <!--                                </div>-->
                    <!--                                @endforelse-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                        </div>


                </div>
            </div>
        </div>
        <!--       Правая панель         -->
        <div class="right">
            <div class="flex items-center">

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
            <span class="absolute text-center ">
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
                                <multiselect v-model="value" :options="sub_accounts.items" placeholder="Субаккаунт"
                                             :show-labels="false"></multiselect>

                                <svg data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                     class="w-[44px] h-[44px] text-gray-800 dark:text-white border hover:bg-blue-200 bg-blue-100"
                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                          d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                          clip-rule="evenodd"/>
                                </svg>

                            </div>

                            <!-- Main modal -->
                            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Добавить субаккаунт
                                            </h3>
                                            <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->


                                        <!--                                                                                                            <div>-->
                                        <!--                                                                                                                <form class="form form-sm">-->
                                        <!--                                                                                                                    <div class="card-body p-0">-->
                                        <!--                                                                                                                        <div class="form-group row">-->
                                        <!--                                                                                                                            <label class="col-lg-3 col-form-label">Биржа</label>-->
                                        <!--&lt;!&ndash;                                                                                                                            <div class="col-lg-9">&ndash;&gt;-->
                                        <!--&lt;!&ndash;                                                                                                                                <select class="form-control form-control-sm {{ $errors->has('data.exchange') ? 'is-invalid' : '' }}"&ndash;&gt;-->
                                        <!--&lt;!&ndash;                                                                                                                                        wire:model="data.exchange">&ndash;&gt;-->
                                        <!--&lt;!&ndash;                                                                                                                                    @foreach($exchange_list as $exchange_key => $exchange_name)&ndash;&gt;-->
                                        <!--&lt;!&ndash;                                                                                                                                    <option value="{{ $exchange_key }}">{{ $exchange_name }}</option>&ndash;&gt;-->
                                        <!--&lt;!&ndash;                                                                                                                                    @endforeach&ndash;&gt;-->
                                        <!--&lt;!&ndash;                                                                                                                                </select>&ndash;&gt;-->
                                        <!--&lt;!&ndash;                                                                                                                              <div class="invalid-feedback">{{  }}</div>&ndash;&gt;-->
                                        <!--&lt;!&ndash;                                                                                                                            </div>&ndash;&gt;-->
                                        <!--                                                                                                                        </div>-->
                                        <!--                                        &lt;!&ndash;                                                                                <div class="form-group row">&ndash;&gt;-->
                                        <!--                                                                                    <label class="col-lg-3 col-form-label">Название:</label>-->
                                        <!--                                                                                    <div class="col-lg-9">-->
                                        <!--                                                                                        <input type="text" class="form-control form-control-sm {{  }}" />-->

                                        <!--                                                                                    </div>-->
                                        <!--                                                                                </div>-->
                                        <!--                                                                                <div class="form-group row">-->
                                        <!--                                                                                    <label class="col-lg-3 col-form-label">Стартовый капитал</label>-->
                                        <!--                                                                                    <div class="col-lg-9">-->
                                        <!--                                                                                        <div class="row">-->
                                        <!--                                                                                            <div class="col-6">-->
                                        <!--                                                                                                <div class="d-flex">-->
                                        <!--                                                                                                    <label class="col-form-label mr-1">BTC:</label>-->
                                        <!--                                                                                                    <div>-->


                                        <!--                                                                                                        <div class="input-group input-group-sm {{  }}">-->

                                        <!--                                                                                                            <input type="text" class="form-control {{  }}"  />-->

                                        <!--                                                                                                            <div class="input-group-append">-->
                                        <!--                                                                                                                <span class="input-group-text">$</span>-->
                                        <!--                                                                                                            </div>-->
                                        <!--                                                                                                        </div>-->


                                        <!--                                                                                                    </div>-->
                                        <!--                                                                                                </div>-->
                                        <!--                                                                                            </div>-->

                                        <!--                                                                                        </div>-->
                                        <!--                                                                                    </div>-->
                                        <!--                                                                                </div>-->

                                        <!--                                                                            </div>-->
                                        <!--                                                                            <div class="card-footer p-0 pt-2">-->
                                        <!--                                                                                <button type="submit" class="btn btn-sm btn-primary mr-2">Сохранить</button>-->
                                        <!--                                                                            </div>-->
                                        <!--                                                                        </form>-->
                                        <!--                                                                    </div>-->


                                        <form class="p-4 md:p-5">
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">

                                                    <!--                                                    <label class="col-lg-3 col-form-label">Биржа</label>-->
                                                    <!--                                                    <div class="col-lg-10">-->
                                                    <!--                                                        <select class="form-control form-control-sm {{}}">-->

                                                    <!--                                                        </select>-->

                                                    <!--                                                    </div>-->
                                                    <label for="name"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Биржа</label>
                                                    <input type="text" name="name" id="name"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                           placeholder="Type product name" required="">

                                                </div>

                                                <div class="col-span-2">

                                                    <label for="name"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название</label>
                                                    <input type="text" name="name" id="name"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                           placeholder="Type product name" required="">

                                                </div>

                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="price"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Стартовый
                                                        капитал</label>
                                                    <input type="number" name="price" id="price"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                           placeholder="$2999" required="">
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                    <select id="category"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <option selected="">Select category</option>
                                                        <option value="TV">TV/Monitors</option>
                                                        <option value="PC">PC</option>
                                                        <option value="GA">Gaming/Console</option>
                                                        <option value="PH">Phones</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-2">

                                                    <label for="name"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">API
                                                        ключ:</label>
                                                    <input type="text" name="name" id="name"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                           placeholder="Type product name" required="">

                                                </div>

                                                <div class="col-span-2">

                                                    <label for="name"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">API
                                                        секрет:</label>
                                                    <input type="text" name="name" id="name"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                           placeholder="Type product name" required="">

                                                </div>

                                            </div>


                                            <button type="submit"
                                                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-2 mt-2">
                                                Сохранить
                                            </button>
                                            <!--                                            <button type="submit"-->
                                            <!--                                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">-->
                                            <!--                                                Сохранить-->
                                            <!--                                            </button>-->
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <!--    Footer -->
    <div class="additional pt-3 bg-white">


        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

            <div class="text-dark order-2 order-md-2">
                <span class="text-muted font-weight-bold mr-2 pt-1">2023©</span>
                <!--                    <a href="" class="text-dark-75 text-hover-primary">{{ config('app.title') }}</a>-->
                <a href="" class="text-dark-75 text-hover-primary pt-2">Панель управления ботами TheSMB</a>
            </div>

        </div>

    </div>
    <!--        </div>-->
    <!--    </div>-->

</template>

<script>
import {BranchService} from "../../services/BranchService";
import DateInput from "../instruments/DataInput.vue";
import Select from "../instruments/MultiSelect.vue";
import {SubAccounts} from "../../services/SubAccounts";
import Multiselect from 'vue-multiselect'

export default {
    name: "BranchesList",
    components: {
        Multiselect
    },

    data: function () {
        return {
            value: null,
            limits: {
                used: 0,
                limit: 10
            },
            sub_accounts: [],
            howbutton: true,
            panel: false,
            form: {
                dateFrom: null,
                dateTo: null,
            },
            buttons: {
                dateFrom: null,
                dateTo: null,
            },
            panels: {
                dateFrom: null,
                botLimit: true,
            },
        }
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
    created: function () {
        this.update()
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
        },
        addSubAccount() {

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
        toggleCollapse(item) {
            const collapseId = '#sub_account_info_' + item.id;
            // $(collapseId).collapse('toggle');
        },
    }
}
</script>
<!--<style src="vue-multiselect/dist/vue-multiselect.css"></style>-->
<style>

.container {
    display: flex;
    height: 90vh;
    max-width: none;
    background-color: #eef0f8;
    padding-left: 0;
    padding-right: 0;
}

.top {
    background-color: #dfe9f9;
}

.left {
    display: flex;
    flex-direction: column;
    flex: 1;
}

.bottom {
    height: 30%;
    margin-bottom: 10px;
    background-color: #ffffff;
}

.container .left .top {
    height: 70%;
}

.right {
    flex: 0 0 19%;
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
    margin-left: 8px; /* или любое другое значение отступа */
}
</style>
