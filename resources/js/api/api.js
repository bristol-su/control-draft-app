import Group from './resources/group';
import User from './resources/user';
import Role from './resources/role';

import UserTag from './resources/user-tag';
import GroupTag from './resources/group-tag';
import RoleTag from './resources/role-tag';
import PositionTag from './resources/position-tag';
import UserTagCategory from './resources/user-tag-category';
import GroupTagCategory from './resources/group-tag-category';
import RoleTagCategory from './resources/role-tag-category';
import PositionTagCategory from './resources/position-tag-category';

// TODO Implement Cache
export default class {
    constructor(baseUrl, axios) {
        this._http = axios.create({
            baseURL: baseUrl,
            withCredentials: true,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        });
    }

    group() {
        return new Group(this._http);
    }

    user() {
        return new User(this._http);
    }

    role() {
        return new Role(this._http);
    }

    userTag() {
        return new UserTag(this._http);
    }

    groupTag() {
        return new GroupTag(this._http);
    }

    roleTag() {
        return new RoleTag(this._http);
    }

    positionTag() {
        return new PositionTag(this._http);
    }

    userTagCategory() {
        return new UserTagCategory(this._http);
    }

    groupTagCategory() {
        return new GroupTagCategory(this._http);
    }

    roleTagCategory() {
        return new RoleTagCategory(this._http);
    }

    positionTagCategory() {
        return new PositionTagCategory(this._http);
    }
}
