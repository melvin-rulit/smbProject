<template>
    <div class="flex items-center mb-2 mt-2 flex-col">
        <label class="text-lg font-medium text-gray-900 dark:text-white">{{ title }}</label>
        <div class="flex items-center">
            <input
                type="range"
                :min="min"
                :max="max"
                :step="step"
                :value="value"
                @input="updateValue($event.target.value)">
            <p class="ml-2 text-xl">{{ value }} %</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
    },
    data() {
        return {
            min: 0.5,
            max: 5,
            step: 0.1,
            value: 0.5,
        };
    },
    methods: {
        updateValue(newValue) {
            this.value = newValue;
        }
    }
};
</script>
