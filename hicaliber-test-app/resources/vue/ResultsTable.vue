<script>
export default {
    name: "ResultsTable",
    props: ['results'],
}
</script>

<template>
<table class="results-table">
    <tr v-if="results.length > 0">
        <th>Property Name</th>
        <th>Bedrooms</th>
        <th>Bathrooms</th>
        <th>Storeys</th>
        <th>Garages</th>
        <th>Price</th>
    </tr>
    <tr v-else>
        <th>No results found!</th>
    </tr>
    <tr v-for="property of results">
        <td>{{property.name}}</td>
        <td>{{property.bedrooms}}</td>
        <td>{{property.bathrooms}}</td>
        <td>{{property.storeys}}</td>
        <td>{{property.garages}}</td>
        <td>{{property.price}}</td>
    </tr>
</table>
</template>

<style scoped>

</style>
