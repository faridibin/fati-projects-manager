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

        // console.log('Test')
        // store.commit('auth/SET_TOKEN', null);

        // return
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
    attemptUpdateAvatar: async ({
        commit
    }, form) => {
        const {
            success,
            data: {
                file
            }
        } = await form.post('/api/user/profile-picture').then(({
            data
        }) => data)

        if (success) {
            const {
                url
            } = file

            commit('SET_AVATAR', url)
        }
    },
    attemptChangePassword: async (_, form) => form.post('/api/user/password')
}
