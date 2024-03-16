<template>
    <!--    <div class="sm:px-6 w-full">-->
    <!--        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">-->

    <div class="container">
        <div class="left">
            <div class="top">Top Content</div>
            <div class="bottom rounded-xl flex flex-col">
                <div class="flex-none  border-b h-[50px]">

                    <div class="flex-container flex">
                        <div class="flex-grow mt-3 ml-2 text-muted font-weight-bold mr-2">2</div>
                        <div class="relative w-1/5 mb-3 mr-5 group">

                            <input class="form-control find mt-1.5"
                                   v-model="form.dateFrom" placeholder="Поиск Субаккаунта"
                                   @keyup.enter="">
                        </div>

                    </div>
                </div>
                <div class="flex-grow"></div>
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
                    <div class="bg-white py-1 px-1 ml-2">

                        <div class="card card-layout-frame border-0">
                            <div class="card-body">
                                <div class="flex justify-center">
                                    <svg @click="nextPanel" class="w-6 h-6 text-gray-800 dark:text-white mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.7" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                                    </svg>

                                    <span class="text-xl">Добавить нового бота</span>

                                </div>
                            </div>



                            <section v-show="panels.botLimit" class="w-full bg-gray-200 rounded-full dark:bg-gray-700 mb-2 relative">
                                <div :class="circleClasses" :style="{ width: circleWidth, height: '18px'}">
            <span class="absolute text-center ">
                Ботов {{ limits.used }} из {{ limits.limit }}
            </span>
                                </div>
                            </section>

                            <section v-show="limitBots" class="bg-white">
                                <div class="bg-red-400 text-white mb-6 p-3">
                                    <h3 class="text-2xl">Лимит закончился 😕</h3>
<!--                                    <p>Вы израсходовали весь доступный лимит ботов, он составляет <b>{{$limits['limit']}}</b> ботов.</p>-->
                                    <p class="text-base">Вы израсходовали весь доступный лимит ботов, он составляет <b>10</b> ботов.</p>
                                    <div class="border-bottom border-white opacity-20 mb-3 mt-3"></div>
                                    <p class="mb-0 text-base">Обратитесь к администратору для увеличения лимита.</p>
                                </div>
                            </section>

                            <div class="form-group">
                                <div class="input-group select2-sm" >
<!--                                    <select class="form-control select2" id="bot_sub_account"-->
<!--                                            data-url="{{ route('user.sub_accounts_list') }}"></select>-->
                                    <Select title="Цвет" v-model:value="subaccounts" :values="subaccounts"/>
                                    <div class="input-group-append">
                                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button" class="btn btn-sm btn-primary" title="добавить">+</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Main modal -->
                            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Create New Product
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="p-4 md:p-5">
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                    <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <option selected="">Select category</option>
                                                        <option value="TV">TV/Monitors</option>
                                                        <option value="PC">PC</option>
                                                        <option value="GA">Gaming/Console</option>
                                                        <option value="PH">Phones</option>
                                                    </select>
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                                                    <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                                Add new product
                                            </button>
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
import Select from "../instruments/Select.vue";

export default {
    name: "BranchesList",
    components: {
        Select
    },

    data: function () {
        return {
            limits: {
                used: 0,
                limit: 10
            },
            subaccounts: [],
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
            if (this.limits.used === this.limits.limit){
                this.panels.botLimit = false
                return true
            }
        }
    },
    // created: function () {
    //     this.update()
    // },
    methods: {
        // update: function () {
        //     BranchService.getBranches()
        //         .then(response => this.branches = response.data.branches)
        // },
        nextPanel() {
            this.panel = !this.panel;
            this.howbutton = !this.panel;

        },
        getCircleColor(used, limit) {
            if (used / limit * 100 >= 80) {
                return 'bg-red-600 text-red-100';
            } else if (used / limit * 100 >= 50) {
                return 'bg-orange-400 ';
            } else if (used / limit * 100 >= 20) {
                return 'bg-blue-400';
            }else if (used / limit * 100 >= 10) {
                return 'bg-green-400';
            }
        }
    }
}
</script>
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
</style>
