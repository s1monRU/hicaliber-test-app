<script>
import SearchForm from "./SearchForm.vue";
import ResultsTable from "./ResultsTable.vue";
import LoadingIndicator from "./LoadingIndicator.vue";

export default {
    name: "App",
    components: {LoadingIndicator, ResultsTable, SearchForm},
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
    <SearchForm @perform-search="performSearch"></SearchForm>
    <LoadingIndicator v-if="isLoading"></LoadingIndicator>
    <ResultsTable :results="results" v-if="!isLoading"></ResultsTable>
</template>

<style scoped>

</style>
