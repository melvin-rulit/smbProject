<template>
    <div id="drawer-right-example"
         class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full shirina dark:bg-gray-800 shadow-lg"
         tabindex="-1" aria-labelledby="drawer-right-label" style="background-color: #ffffff;">

        <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                        <h3 class="font-weight-bold m-0 text-2xl">Профиль</h3>
        </h5>
        <button type="button" data-drawer-hide="drawer-right-example"
                aria-controls="drawer-right-example"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>

        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style11="background-image:url('/adm/media/admin-ava.jpg')"></div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                                    <a href="{" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ user.name }}</a>
                                    <div class="text-muted mt-1">{{ user.email }}</div>
                <div class="navi mt-2">

<!--                    <a href="" class="navi-item">-->
<!--                            <span class="navi-link p-0 pb-2">-->
<!--                            <span class="navi-icon mr-1">-->
<!--                            <span class="svg-icon svg-icon-lg svg-icon-primary">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
<!--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
<!--                            <rect x="0" y="0" width="24" height="24" />-->
<!--                            <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />-->
<!--                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />-->
<!--                            </g>-->
<!--                            </svg>-->

<!--                            </span>-->
<!--                            </span>-->

<!--                            </span>-->
<!--                    </a>-->

                    <a href="" @click="logout" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Выход</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "OuickPanel",
    props: {
        user: Object,
    },
    methods: {
        logout: function (event) {
            event.preventDefault()
            axios.post('/logout', {})
                // .then(
                //     document.location.href = '/'
                // )
        },
    }
}

</script>

<style>
.shirina {
    width: 28rem;
}
</style>
