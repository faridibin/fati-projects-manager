import store from '../index'
import auth from './auth';

const getModule = (mutationType) => {
    return mutationType.split('/')[0]
}

store.subscribe((mutation) => {
    switch (getModule(mutation.type)) {
        case 'auth':
            auth(mutation)
            break
        default:
            break
    }
})
