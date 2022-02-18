import store from "../index"

export default (mutation) => {
    const {
        type,
        payload
    } = mutation

    switch (type) {
        case 'user/SET_USER':
            if (payload) {
                const {
                    profile_picture,
                    settings
                } = payload

                store.commit('user/SET_AVATAR', profile_picture)
                store.commit('user/SET_SETTINGS', settings)

                return
            }
            break
        default:
            break
    }
}
