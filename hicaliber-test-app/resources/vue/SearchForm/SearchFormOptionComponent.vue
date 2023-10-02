<script>
export default {
    name: "SearchFormOptionComponent",
}
</script>

<template>
    <el-option
        v-for="amount of [1, 2, 3, 4, 5, 6, 7]"
        :key="amount"
        :label="amount"
        :value="amount"
    />
</template>

<style scoped>

</style>
