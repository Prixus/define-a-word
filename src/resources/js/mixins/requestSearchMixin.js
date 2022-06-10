import Axios from 'axios';

/**
 * Mixins for all requests
 *
 * @author Simon Peter Calamno
 * @since 2022.06.10
 */
export default {
    methods: {
        /**
         * Sends request for getting the definition of a word
         * @return {Promise<AxiosResponse<T>>}
         * @param sSearchWord
         */
        fetchWordDefinitionRequest(sSearchWord)
        {
            return Axios.get('/api/definition/' + sSearchWord);
        },

        /**
         * Sends a request to fetch previous words that have been searched
         * @returns {Promise<AxiosResponse<T>>}
         */
        fetchPreviousWordSearchRequests()
        {
            return Axios.get('/api/previous-searches');
        }
    }
};
