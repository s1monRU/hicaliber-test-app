<script>
import SearchForm from "./SearchForm/SearchForm.vue";
import ResultsTable from "./ResultsTable.vue";

export default {
    name: "App",
    components: {ResultsTable, SearchForm},
    data() {
        return {
            results: {},
            isLoading: false,
        }
    },
    methods: {
        performSearch(searchFormData) {
            this.isLoading = true

            fetch('api/search', {
                headers: {
                    'Content-Type': 'application/json'
                },
                method: 'POST',
                body: JSON.stringify(searchFormData)
            })
                .then((response) => response.json())
                .then((json) => {
                    this.isLoading = false
                    this.results = json
                })
        }
    },
    mounted() {
        this.performSearch({})
    }
}
</script>

<template>
    <el-container>
        <el-main>
            <SearchForm @perform-search="performSearch" :isLoading="isLoading"></SearchForm>
            <ResultsTable :results="results" v-if="!isLoading"></ResultsTable>
        </el-main>
    </el-container>
</template>

<style scoped>

</style>
