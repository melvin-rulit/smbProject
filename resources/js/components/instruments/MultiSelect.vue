<template>

    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{title}}</label>

    <div>
        <VueMultiselect
            :options="values"
            v-model="internalValue"
            label="name"
            track-by="name"
            :close-on-select="true"
            placeholder="Поиск">
        </VueMultiselect>

<!--        <VueMultiselect-->
<!--            tabindex=10000-->
<!--            selectLabel=""-->
<!--            selectedLabel="Установленно"-->
<!--            deselectLabel=""-->
<!--            openDirection="bottom"-->
<!--            maxHeight=200>-->
<!--        </VueMultiselect>-->
    </div>

</template>

<script>
import VueMultiselect from "vue-multiselect";
export default {
    components: { VueMultiselect },
    emits: ['update:value'],
    props: {
        value: Array,
        title: String,
        values: Array|Object,
    },
    data: function () {
        return {
            internalValue: this.value,
        };
    },
    methods: {
        emitUpdatedValue(newValue) {
            this.$emit("update:value", newValue);
        },
    },
    watch: {
        internalValue(newVal) {
            this.emitUpdatedValue(newVal.id);
        },
    },

}

</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
