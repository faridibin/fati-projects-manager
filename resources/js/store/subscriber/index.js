import store from '../index'
import auth from './auth';
import user from './user';

const getModule = (mutationType) => {
    return mutationType.split('/')[0]
}

store.subscribe((mutation) => {
    switch (getModule(mutation.type)) {
        case 'auth':
            auth(mutation)
            break
        case 'user':
            user(mutation)
            break
        default:
            break
    }
})
