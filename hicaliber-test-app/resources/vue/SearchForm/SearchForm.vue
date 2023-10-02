<script>
import SearchFormOptionComponent from "./SearchFormOptionComponent.vue";
import SearchFormPriceInputComponent from "./SearchFormPriceInputComponent.vue";

export default {
    name: "SearchForm",
    components: {SearchFormPriceInputComponent, SearchFormOptionComponent},
    emits: ['perform-search'],
    props: ['isLoading'],
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
    <el-form
        @submit.prevent="$emit('perform-search', this.searchFormData)"
        name="property-search-form"
        class="property-search-form"
    >
        <el-row :gutter="20" justify="center">
            <el-col :span="8" :xs="24">
                <el-form-item>
                    <el-input v-model="searchFormData.name" placeholder="Property name" clearable></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="4" :xs="10">
                <el-select v-model="searchFormData.bedrooms" placeholder="Bedrooms" clearable>
                    <SearchFormOptionComponent/>
                </el-select>
            </el-col>
            <el-col :span="4" :xs="10">
                <el-select v-model="searchFormData.bathrooms" placeholder="Bathrooms" clearable>
                    <SearchFormOptionComponent/>
                </el-select>
            </el-col>
        </el-row>
        <el-row :gutter="20" justify="center">
            <el-col :span="8" :xs="24">
                <el-row :gutter="20" justify="center">
                    <el-col :span="12" :xs="10">
                        <SearchFormPriceInputComponent v-model="searchFormData.price.min" placeholder="From" />
                    </el-col>
                    <el-col :span="12" :xs="10">
                        <SearchFormPriceInputComponent v-model="searchFormData.price.max" placeholder="To" />
                    </el-col>
                </el-row>
            </el-col>
            <el-col :span="4" :xs="10">
                <el-select v-model="searchFormData.storeys" placeholder="Storeys" clearable>
                    <SearchFormOptionComponent/>
                </el-select>
            </el-col>
            <el-col :span="4" :xs="10">
                <el-select v-model="searchFormData.garages" placeholder="Garages" clearable>
                    <SearchFormOptionComponent/>
                </el-select>
            </el-col>
        </el-row>
        <el-row justify="center" class="search-button-row">
            <el-col :span="2">
                <el-button :loading="isLoading" color="#000" @click="$emit('perform-search', this.searchFormData)">Search</el-button>
            </el-col>
        </el-row>
    </el-form>
</template>

<style scoped>
    .property-search-form {
        border: 1px solid var(--el-border-color-dark);
        border-radius: var(--el-border-radius-base);
        padding-top: 10px;
    }
    .search-button-row {
        margin: 10px 0;
    }
</style>
