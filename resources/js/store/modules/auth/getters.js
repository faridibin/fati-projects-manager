export default {
    isAuthenticated(state) {
        return !state.token === null
    },
    token: (state) => {
        return state.token
    },
    user: (state) => {
        return state.user
    }
}
