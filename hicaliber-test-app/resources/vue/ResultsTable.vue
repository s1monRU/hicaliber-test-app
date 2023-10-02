<script>
export default {
    name: "ResultsTable",
    props: ['results'],
}
</script>

<template>
    <el-table border :data="results" class="results-table">
        <el-table-column prop="name" label="Property name"/>
        <el-table-column prop="bedrooms" label="Bedrooms"/>
        <el-table-column prop="bathrooms" label="Bathrooms"/>
        <el-table-column prop="storeys" label="Storeys"/>
        <el-table-column prop="garages" label="Garages"/>
        <el-table-column prop="price" label="Price"/>
    </el-table>
</template>

<style scoped>
    .results-table {
        margin-top: 30px;
    }
</style>
