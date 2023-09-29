<script>
export default {
    name: "SearchForm",
    emits: ['perform-search'],
    data() {
        return {
            searchFormData: {
                name: null,
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
                price: {
                    min: null,
                    max: null,
                }
            }
        }
    }
}
</script>

<template>
    <form
        @submit.prevent="$emit('perform-search', this.searchFormData)"
        name="property-search-form"
        class="property-search-form"
    >
        <div class="property-search-form-group">
            <span>Property Name:</span>
            <input type="text" v-model="searchFormData.name">
        </div>
        <div class="property-search-form-group">
            <span>Bedrooms:</span>
            <input type="number" v-model="searchFormData.bedrooms">
        </div>
        <div class="property-search-form-group">
            <span>Bathrooms:</span>
            <input type="number" v-model="searchFormData.bathrooms">
        </div>
        <div class="property-search-form-group">
            <span>Storeys:</span>
            <input type="number" v-model="searchFormData.storeys">
        </div>
        <div class="property-search-form-group">
            <span>Garages:</span>
            <input type="number" v-model="searchFormData.garages">
        </div>
        <div class="property-search-form-group">
            <span>Price:</span>
            <div class="property-search-form-prices-group">
                <span>From:</span>
                <input type="number" v-model="searchFormData.price.min">
                <span>To:</span>
                <input type="number" v-model="searchFormData.price.max">
            </div>
        </div>
        <div class="property-search-form-group">
            <input type="submit">
        </div>
    </form>
</template>

<style scoped>
    .property-search-form {
        display: flex;
        align-items: end;
        flex-wrap: wrap;
        gap: 10px;
    }
    .property-search-form input[type="number"] {
        width: 80px;
    }
    .property-search-form-group {
        display: flex;
        flex-direction: column;
    }
    .property-search-form-prices-group {
        display: flex;
        gap: 0 10px;
    }
</style>
