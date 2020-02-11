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
import UserShow from './components/user/show/Show';

import GroupTagCategoryIndex from './components/tag-category/group/index/Index';
import GroupTagCategoryShow from './components/tag-category/group/show/Show';

import PositionTagCategoryIndex from './components/tag-category/position/index/Index';
import PositionTagCategoryShow from './components/tag-category/position/show/Show';

import RoleTagCategoryIndex from './components/tag-category/role/index/Index';
import RoleTagCategoryShow from './components/tag-category/role/show/Show';

import UserTagCategoryIndex from './components/tag-category/user/index/Index';
import UserTagCategoryShow from './components/tag-category/user/show/Show';


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
        UserShow,

        GroupTagCategoryIndex,
        GroupTagCategoryShow,

        PositionTagCategoryIndex,
        PositionTagCategoryShow,

        RoleTagCategoryIndex,
        RoleTagCategoryShow,

        UserTagCategoryIndex,
        UserTagCategoryShow
    }
});
