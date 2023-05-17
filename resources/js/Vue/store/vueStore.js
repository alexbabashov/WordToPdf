
import {createStore} from 'vuex'
import {moduleMain} from './modules/main.js';

export const store = createStore({
    modules: {
        main: moduleMain
    }
});
