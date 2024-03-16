<template>
    <label :for="name"> {{title}} </label>
    <input
    :name="name"
    :value="value"
    :type="type"
    :disabled="disabled"
    :placeholder="placeholder"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    @input="$emit('update:value', $event.target.value)"
    >
</template>

<script>
export default {
    name: "TextInput",
    props: {
        name: String,
        title: String,
        value: String,
        class: String,
        type: String,
        disabled: false,
        placeholder: " "
    }
}
</script>
