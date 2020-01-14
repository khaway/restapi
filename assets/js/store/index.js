import Vue from 'vue'
import Vuex from 'vuex'
import { getField, updateField } from 'vuex-map-fields';

Vue.use(Vuex)

/**
 * Export create store function.
 *
 * @returns {Store<{response: string}>}
 */
export function createStore () {
    return new Vuex.Store({
        state: {
            response: ''
        },
        getters: {
            getField,
        },
        mutations: {
            updateField,
        }
    })
}
