<template>

    <div class="bottom rounded-sm flex flex-col">

        <div class="flex-none border-b h-[50px]">

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

            <div v-for="items in sub_accounts.items" :key="items.id" class="list list-hover min-w-500px"
                 data-inbox="list">

                <div class="d-flex align-items-center list-item card-spacer-x" data-inbox="message">

                    <div class="d-flex align-items-center">

                        <div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3"
                             data-toggle="collapse" data-target="#sub_account_info_{{ }}"
                             style="min-width: 120px">
                                                    <span class="symbol symbol-20 pb-1.5 pr-2">
                                                        <span class="symbol-label"><img src="/images/icons/binance.png"
                                                                                        alt=""></span>
                                                    </span>
                            <a href="#" class="font-weight-bold text-dark-75 text-hover-primary">
                                {{ items.name }}
                            </a>
                        </div>

                    </div>

                    <div class="mt-2 mr-3 font-weight-bolder w-50px text-right" data-toggle="view">
                        {{ items.count }}
                    </div>

                </div>


<!--                <div id="sub_account_info_{{  }}" class="collapse">-->
<!--                    <div class="card-body px-0 py-2">-->

<!--                        &lt;!&ndash;begin::Item&ndash;&gt;-->
<!--                        <div v-for="bot in items.bots" :key="items.id"  class="d-flex align-items-center list-item card-spacer-x" data-inbox="message">-->
<!--                            &lt;!&ndash;begin::Toolbar&ndash;&gt;-->
<!--                            <div class="d-flex align-items-center">-->
<!--                                <div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3"-->
<!--                                     style="min-width: 120px">-->
<!--                                    &lt;!&ndash;span class="symbol symbol-20 mr-3">-->
<!--                                        <span class="symbol-label" style="background-image: url()"></span>-->
<!--                                    </span&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                                                                                <span class="label label-dot label-{{ $bot->enabled ? 'success' : 'danger' }} mr-1"></span>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                                                                                <span class="font-weight-bold text-dark-75 text-hover-primary"&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                                                                                      x-data @click="$dispatch('show_bot', {show: 'open234'})"&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                                                                                      wire:click="$dispatchTo('pages.trading', 'botShow', [{{ $bot->id }}])">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                                                                            {{ $bot->bot_name }}&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                                                                        </span>&ndash;&gt;-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div style="width: 90px" class="mr-2">-->
<!--                                &lt;!&ndash;                                                                                            <span class="font-size-h6 font-weight-bold">{{ $bot->symbol }}</span>&ndash;&gt;-->
<!--                            </div>-->
<!--                            <div style="width: 80px" class="mr-2">-->
<!--                                &lt;!&ndash;                                                                                    <span class="label label-sm label-{{ $bot->color }} label-inline">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                                                        {{ $bot->status_ru }}&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                                                    </span>&ndash;&gt;-->
<!--                            </div>-->
<!--                            &lt;!&ndash;end::Toolbar&ndash;&gt;-->
<!--                            &lt;!&ndash;div class="mt-2 mr-3 font-weight-bolder w-50px text-right">-->
<!--                                234234234-->
<!--                            </div&ndash;&gt;-->
<!--                        </div>-->
<!--                        &lt;!&ndash;end::Item&ndash;&gt;-->
<!--                        &lt;!&ndash;                                                                                    @empty&ndash;&gt;-->
<!--                        &lt;!&ndash;                                                                                    <div class="d-flex align-items-center card-spacer-x">&ndash;&gt;-->
<!--                        &lt;!&ndash;                                                                                        нет ботов&ndash;&gt;-->
<!--                        &lt;!&ndash;                                                                                    </div>&ndash;&gt;-->
<!--                        &lt;!&ndash;                                                                                    @endforelse&ndash;&gt;-->
<!--                    </div>-->
<!--                </div>-->

                <!--                                                        @empty-->
                <!--                                                        <div class="d-flex align-items-center card-spacer-x">-->
                <!--                                                            нет субаккаунтов-->
                <!--                                                        </div>-->
                <!--                                                        @endforelse-->
            </div>

        </div>
    </div>
</template>

<script>
import {SubAccounts} from "../services/SubAccounts";
import Chart from "./Chart.vue";

export default {
    name: "SubAccayntPanel",
    components: {SubAccounts, Chart},
    data: function () {
        return {
            sub_accounts: [],
            form: {
                dateFrom: null,
                dateTo: null,
            },
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
        toggleCollapse(item) {
            const collapseId = '#sub_account_info_' + item.id;
            // $(collapseId).collapse('toggle');
        },
        addBot(item) {
            const collapseId = '#sub_account_info_' + item.id;
            // $(collapseId).collapse('toggle');
        },
    }
}

</script>
<style>

.bottom {
    height: 30%;
    margin-bottom: 10px;
    background-color: #ffffff;
}
</style>
