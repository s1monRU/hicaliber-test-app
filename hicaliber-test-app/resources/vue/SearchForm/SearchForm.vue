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
    },
    methods: {
        search() {
            return this.$emit('perform-search', this.searchFormData);
        }
    }
}
</script>

<template>
    <el-form
        @submit.prevent="search"
        name="property-search-form"
        class="property-search-form"
    >
        <el-row :gutter="20" justify="center">
            <el-col :span="8" :xs="20">
                <el-text class="mx-1" tag="b">Property name</el-text>
                <el-form-item>
                    <el-input v-model="searchFormData.name" placeholder='i.e. "The Como"' clearable></el-input>
                </el-form-item>
            </el-col>
            <el-col :span="4" :xs="10">
                <el-text class="mx-1" tag="b">Bedrooms</el-text>
                <el-select v-model="searchFormData.bedrooms" @change="search" placeholder="0" clearable>
                    <SearchFormOptionComponent/>
                </el-select>
            </el-col>
            <el-col :span="4" :xs="10">
                <el-text class="mx-1" tag="b">Bathrooms</el-text>
                <el-select v-model="searchFormData.bathrooms" @change="search" placeholder="0" clearable>
                    <SearchFormOptionComponent/>
                </el-select>
            </el-col>
        </el-row>
        <el-row :gutter="20" justify="center">
            <el-col :span="8" :xs="24">
                <el-text class="mx-1" tag="b">Price</el-text>
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
                <el-text class="mx-1" tag="b">Storeys</el-text>
                <el-select v-model="searchFormData.storeys" @change="search" placeholder="0" clearable>
                    <SearchFormOptionComponent/>
                </el-select>
            </el-col>
            <el-col :span="4" :xs="10">
                <el-text class="mx-1" tag="b">Garages</el-text>
                <el-select v-model="searchFormData.garages" @change="search" placeholder="0" clearable>
                    <SearchFormOptionComponent/>
                </el-select>
            </el-col>
        </el-row>
        <el-row justify="center" class="search-button-row">
            <el-col :span="2">
                <el-button :loading="isLoading" color="#000" @click="search">Search</el-button>
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
