import _ from 'lodash';
import axios from 'axios';
import Vue from 'vue';
import api from '@bristol-su/control-js-api-client';
import AWN from "awesome-notifications";
import BootstrapVue from 'bootstrap-vue';

// Import Vue Components
import GroupIndex from './components/group/index/Index';
import GroupShow from './components/group/show/Show';

import PositionIndex from './components/position/index/Index';
import PositionShow from './components/position/show/Show';

import RoleIndex from './components/role/index/Index';
import RoleShow from './components/role/show/Show';

import UserIndex from './components/user/index/Index';

import TagCategoryIndex from './components/tag-category/index/Index';
import TagCategoryShow from './components/tag-category/show/Show';


window._ = _;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
Vue.prototype.$notify = new AWN({position: 'top-right'});
Vue.prototype.$http = axios;
Vue.prototype.$control = new api(apiUrl, axios);
Vue.use(BootstrapVue);


// Register Vue components
new Vue({
    el: '#control-vue-root',
    components: {
        // Add additional components here
        GroupIndex,
        GroupShow,

        PositionIndex,
        PositionShow,

        RoleIndex,
        RoleShow,

        UserIndex,

        TagCategoryIndex,
        TagCategoryShow
    }
});
