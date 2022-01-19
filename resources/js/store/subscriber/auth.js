export default (mutation) => {
    const {
        type,
        payload
    } = mutation

    switch (type) {
        case 'auth/SET_TOKEN':
            if (payload) {
                window.axios.defaults.headers.common['Authorization'] = `Bearer ${payload}`

                localStorage.setItem('token', payload)

                return
            }
            break
        default:
            break
    }
}
