<script>
export default {
    name: "SearchFormPriceInputComponent",
    props: ['placeholder'],
    emits: ['update:model'],
    computed: {
        model: {
            get() {
                return this.model
            },
            set(value) {
                this.$emit('update:model', value)
            }
        }
    }
}
</script>

<template>
    <el-input
        v-model="model"
        :placeholder="this.placeholder"
        :formatter="(value) => `${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ' ')"
        :parser="(value) => value.replace(/\$\s?|( *)/g, '')"
        clearable
    />
</template>

<style scoped>

</style>
