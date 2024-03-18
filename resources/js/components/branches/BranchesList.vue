<template>
        <div class="container">
            <div class="left">
                <Chart/>
                <SubAccayntPanel/>
            </div>
            <AddBotPanel/>
        </div>
    <Footer/>
</template>

<script>
import Chart from "../Chart.vue"
import SubAccayntPanel from "../SubAccayntPanel.vue"
import AddBotPanel from "../AddBotPanel.vue"
import Footer from "../Footer.vue";
import Multiselect from "vue-multiselect";

export default {
    name: "BranchesList",
    components: {Chart, SubAccayntPanel, AddBotPanel, Footer, Multiselect},
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
.left {
    display: flex;
    flex-direction: column;
    flex: 1;
}
</style>
