<template>
    <div class="recent-searches">
        <b-row>
            <h3>Recent Searches:</h3>
        </b-row>
        <b-row v-if="!bLoading">
            <b-col cols="3" class="mb-2" v-for="(oSearchItem, iIndex) in aPreviousSearches" :key="iIndex">
                <RecentSearchItem :sSearchWord="oSearchItem.search_word" :sCreatedTime="oSearchItem.created_at"/>
            </b-col>
        </b-row>
        <b-row align-h="center" v-else>
            <b-spinner class="mt-5"/>
        </b-row>

    </div>
</template>

<script>
    import RecentSearchItem from './RecentSearchItem';
    import requestSearchMixin from '../../../mixins/requestSearchMixin';

    /**
     * Recent Search
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name       : 'RecentSearch',
        components : {RecentSearchItem},
        mixins     : [
            requestSearchMixin
        ],
        data() {
            return {
                aPreviousSearches : [],
                bLoading          : false
            }
        },
        /**
         * Fetches the previously searched words on component create
         * @returns {Promise<void>}
         */
        async created() {
            try {
                this.bLoading = true;
                const { data } = await this.fetchPreviousWordSearchRequests();
                this.aPreviousSearches = data.data;
            } catch {
                alert('Invalid Request');
            } finally {
                this.bLoading = false;
            }
        }
    }
</script>
