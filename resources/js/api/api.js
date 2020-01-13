import Group from './resources/group';

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
}
