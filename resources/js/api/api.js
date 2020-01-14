import Group from './resources/group';
import User from './resources/user';
import Role from './resources/role';

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
}
