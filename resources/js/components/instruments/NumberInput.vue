<!--<template>-->
<!--    <label-->
<!--        :for="name"-->
<!--        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"-->
<!--    >{{title}}</label>-->
<!--    <input-->
<!--        type="number"-->
<!--        :name="name"-->
<!--        :value="value"-->
<!--        :placeholder="1"-->
<!--        :disabled="disabled"-->
<!--        :step="step"-->
<!--        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"-->
<!--        @input="$emit('update:value', $event.target.value)"-->
<!--    >-->
<!--</template>-->

<template>
    <div class="flex items-center mb-2 mt-2">
        <label
            :for="name"
            class="flex-none mr-2 mt-2 text-lg font-medium text-gray-900 dark:text-white"
        >{{ title }}</label>
        <input
            type="number"
            :name="name"
            :value="value"
            :placeholder="1"
            :disabled="disabled"
            :step="step"
            title="Шаг цены = 0
Шаг ко-ва монет = 0"
            class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            @input="$emit('update:value', $event.target.value)"
        >
    </div>
</template>


<script>
export default {
    name: "NumberInput",
    props: {
        value: Number,
        name: String,
        title: String,
        placeholder: "",
        disabled: false,
        step: 1
    }
}
</script>
