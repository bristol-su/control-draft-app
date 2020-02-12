import _ from 'lodash';
import axios from 'axios';
import Vue from 'vue';
import api from '@bristol-su/control-js-api-client';
import AWN from "awesome-notifications";
import BootstrapVue from 'bootstrap-vue';

// Import Vue Components
import GroupIndex from './components/group/index/Index';
import GroupShow from './components/group/show/Show';
import GroupTagIndex from './components/tag/group/index/Index';
import GroupTagShow from './components/tag/group/show/Show';
import GroupTagCategoryIndex from './components/tag-category/group/index/Index';
import GroupTagCategoryShow from './components/tag-category/group/show/Show';

import PositionIndex from './components/position/index/Index';
import PositionShow from './components/position/show/Show';
import PositionTagIndex from './components/tag/position/index/Index';
import PositionTagShow from './components/tag/position/show/Show';
import PositionTagCategoryIndex from './components/tag-category/position/index/Index';
import PositionTagCategoryShow from './components/tag-category/position/show/Show';

import RoleIndex from './components/role/index/Index';
import RoleShow from './components/role/show/Show';
import RoleTagIndex from './components/tag/role/index/Index';
import RoleTagShow from './components/tag/role/show/Show';
import RoleTagCategoryIndex from './components/tag-category/role/index/Index';
import RoleTagCategoryShow from './components/tag-category/role/show/Show';

import UserIndex from './components/user/index/Index';
import UserShow from './components/user/show/Show';
import UserTagIndex from './components/tag/user/index/Index';
import UserTagShow from './components/tag/user/show/Show';
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
        GroupIndex,
        GroupShow,
        GroupTagIndex,
        GroupTagShow,
        GroupTagCategoryIndex,
        GroupTagCategoryShow,

        PositionIndex,
        PositionShow,
        PositionTagIndex,
        PositionTagShow,
        PositionTagCategoryIndex,
        PositionTagCategoryShow,

        RoleIndex,
        RoleShow,
        RoleTagIndex,
        RoleTagShow,
        RoleTagCategoryIndex,
        RoleTagCategoryShow,

        UserIndex,
        UserShow,
        UserTagIndex,
        UserTagShow,
        UserTagCategoryIndex,
        UserTagCategoryShow
    }
});
