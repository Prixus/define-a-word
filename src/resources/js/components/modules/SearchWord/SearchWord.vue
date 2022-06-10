<template>
    <Fragment>
        <b-row>
            <SearchWordForm
                @search="handleSearchForm"
                @view-previous-searches="handleViewPreviousSearch"
            />
        </b-row>
        <b-row align-h="center">
            <SearchWordDefinition
                :aDefinitions="aFormattedSearchData"
                :bLoading="bLoading"
            />
        </b-row>
    </Fragment>
</template>

<script>
    import SearchWordForm from './SearchWordForm';
    import SearchWordDefinition from './SearchWordDefinition';
    import requestSearchMixin from '../../../mixins/requestSearchMixin';
    import { pick } from 'lodash';

    /**
     * Search Word
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name       : 'SearchWord',
        components : {SearchWordDefinition, SearchWordForm},
        mixins     : [
            requestSearchMixin
        ],
        data() {
            return {
                oSearchData : {},
                bLoading    : false
            }
        },
        methods : {
            /**
             * Fetches data from the api backend and sets the search data in the state
             * @param sSearchInput
             * @returns {Promise<void>}
             */
            async handleSearchForm(sSearchInput)
            {
                try {
                    this.bLoading = true;
                    const { data } = await this.fetchWordDefinitionRequest(sSearchInput);
                    const oDefinitionData = data.data;
                    if (
                        oDefinitionData.hasOwnProperty('error') === true
                        || oDefinitionData.definitions.length === 0
                    ) {
                        alert('No results found.');
                        this.oSearchData = {};
                        this.bLoading = false;
                        return;
                    }

                    this.oSearchData = oDefinitionData;
                    this.bLoading = false;
                } catch {
                    alert('Invalid Request');
                    this.bLoading = false;
                }
            },
            /**
             * Redirects users the previous search page
             */
            handleViewPreviousSearch()
            {
                this.$router.push({
                    name: 'recent_searches'
                });
            }
        },
        computed : {
            /**
             * Formats the search data before returning to the user
             * @returns {*[]|*}
             */
            aFormattedSearchData() {
                if (this.oSearchData.hasOwnProperty('definitions') === false) {
                    return [];
                }

                return this.oSearchData.definitions.map((oSearchData) => {
                    const oDefinitionData = pick(oSearchData, ['definition', 'part_of_speech']);
                    oDefinitionData.search_word = this.oSearchData.search_word;
                    return oDefinitionData;
                });
            }
        }
    }
</script>
