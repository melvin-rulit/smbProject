<template>
    <div>
        <atom-spinner :animation-duration="1000" :size="60" color="#ff1d5e" />
    </div>
</template>

<script>
import { AtomSpinner } from 'epic-spinners'

export default {
    name: "Spinner",
    components: {AtomSpinner}
}
</script>

<style scoped>

</style>
