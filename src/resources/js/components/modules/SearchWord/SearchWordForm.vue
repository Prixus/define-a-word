<template>
    <b-card class="form-card">
        <b-form>
            <b-form-group>
                <b-input-group>
                    <b-input-group-prepend is-text size="100">
                        <b-icon icon="search"></b-icon>
                    </b-input-group-prepend>
                    <b-form-input type="search" placeholder="Search word" v-model="$v.sSearchWord.$model"></b-form-input>

                </b-input-group>
            </b-form-group>
            <b-row align-h="center">
                <b-col cols="4">
                    <b-button
                        variant="success"
                        size="lg"
                        @click.prevent="() => $emit('search', sSearchWord)"
                        :disabled="!$v.sSearchWord.required"
                    >
                        Search
                    </b-button>
                    <b-button
                        variant="primary"
                        size="lg" @click.prevent="() => $emit('view-previous-searches')"
                    >
                        View Previous Searches
                    </b-button>
                </b-col>
            </b-row>
        </b-form>
    </b-card>

</template>

<script>
    import { required } from 'vuelidate/lib/validators'

    /**
     * Search Word Form
     *
     * @author Simon Peter Calamno
     * @since 2022.06.10
     */
    export default {
        name    : 'SearchWordForm',
        data() {
            return {
                sSearchWord : ''
            }
        },
        validations: {
            sSearchWord: {
                required
            }
        }
    }
</script>
