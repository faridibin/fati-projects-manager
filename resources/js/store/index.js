import Vue from 'vue'
import Vuex from 'vuex'
import state from './state'
import getters from './getters'
import mutations from './mutations'
import modules from './modules'

Vue.use(Vuex)

const store = new Vuex.Store({
    state,
    getters,
    mutations,
    modules,
    strict: process.env.NODE_ENV !== 'production'
})

export default store
