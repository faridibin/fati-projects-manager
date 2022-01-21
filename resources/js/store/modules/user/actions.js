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
    attemptUpdateUser: async ({
        commit
    }, form) => {
        const {
            success,
            data: {
                user
            }
        } = await form.patch('/api/user').then(({
            data
        }) => data)

        if (success) {
            commit('SET_USER', user)
        }
    },
    attemptChangePassword: async (_, form) => form.post('/api/user/password')
}
