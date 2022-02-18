export default {
    attemptRegister: async (_, form) => form.post('/api/auth/register'),
    attemptLogin: async ({
        commit
    }, form) => {
        const {
            data: response,
            success
        } = await form.post('/api/auth/login').then(({
            data
        }) => data)

        if (success) {
            const {
                token,
                intended
            } = response

            commit('SET_TOKEN', token)

            window.location = intended
        }
    },
    attemptForgotPassword: async (_, form) => form.post('/api/auth/password/email'),
    attemptResetPassword: async (_, form) => {
        const {
            data: response,
            success
        } = await form.post('/api/auth/password/reset').then(({
            data
        }) => data)

        if (success) {
            const {
                intended
            } = response

            window.location = intended
        }
    },
    attemptVerification: async (_, form) => form.post('/api/auth/verify'),
    attemptConfirmPassword: async (_, form) => {
        const {
            data: response,
            success
        } = await form.post('/api/auth/password/confirm').then(({
            data
        }) => data)

        if (success) {
            const {
                intended
            } = response

            window.location = intended
        }
    }
}
