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
         * Sends request for getting the total invoice count
         * @return {Promise<AxiosResponse<T>>}
         * @param sSearchWord
         */
        fetchWordDefinitionRequest(sSearchWord) {
            return Axios.get('/api/definition/' + sSearchWord);
        },
    }
};
