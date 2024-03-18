<template>
    <label class="flex items-center mt-3 select-none" for="form.rememberTerms">
        <input
            :name="name"
            :value="!!checked"
            :checked="!!checked"
            type="checkbox"
            class="w-6 h-6 rounded"
            @input="$emit('update:checked', $event.target.checked)" >
        <span class="text-lg ml-2">{{title}}</span>
    </label>

</template>

<script>
export default {
    name: "Checkbox",

    props: {
        name: String,
        title: String,
        checked: Boolean
    }
}
</script>

<style scoped>

</style>
