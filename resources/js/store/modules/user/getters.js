import default_avatar from '../../../../img/default_avatar.png'

export default {
    user: (state) => {
        return state.user
    },
    settings: (state) => {
        return state.settings
    },
    avatar: (state) => {
        const {
            avatar
        } = state

        if (avatar) {
            return avatar
        }

        return default_avatar
    }
}
