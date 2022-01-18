import axios from 'axios';
import store from '../../index'

export default {
    attemptGetUser: async ({
        commit
    }) => {
        if (!store.getters['auth/token']) {
            store.commit('auth/SET_TOKEN', null);

            return
        }

        const {
            success,
            data: {
                user
            }
        } = await axios.get('/api/user').then(({
            data
        }) => data)

        if (success) {
            commit('SET_USER', user)
        }
    },

}
