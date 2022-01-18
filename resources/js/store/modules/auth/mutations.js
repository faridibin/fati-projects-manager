export default {
    SET: (state, payload) => {
        const {
            token,
            user
        } = payload

        state.token = token
        state.user = user
    },
    SET_TOKEN: (state, token) => {
        state.token = token
    },
    SET_USER: (state, user) => {
        state.user = user
    }
}
