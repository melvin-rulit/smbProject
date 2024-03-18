<template>
    <label :for="name"> {{title}} </label>
    <input
    :name="name"
    :value="value"
    :type="type"
    :disabled="disabled"
    :placeholder="placeholder"
    class="text-lg text-muted bg-white rounded-sm form-control p-3.5 font-medium text-gray-900 border-gray-200"
    :style="{ width: width }"
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
        placeholder: " ",
        width: {
            type: String,
            default: '100%'
        }
    }
}
</script>
