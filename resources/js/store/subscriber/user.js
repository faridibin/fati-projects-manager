export default (mutation) => {
    const {
        type,
        payload
    } = mutation

    switch (type) {
        case 'user/SET_USER':
            if (payload) {
                // console.log(payload)
                // localStorage.setItem('user', JSON.stringify(payload))

                // return
            }
            break
        default:
            break
    }
}
