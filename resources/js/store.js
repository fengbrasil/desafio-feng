import Vue from 'vue';
import Vuex from 'vuex';
import orderModule from './orderModule';

Vue.use(Vuex);

const moduleOrder = orderModule;

export default new Vuex.Store({
    modules: {
        order: moduleOrder,
    }
});