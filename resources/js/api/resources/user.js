import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/user');
    }

    delete(userId) {
        return this.request('delete', '/user/' + userId);
    }

    get(userId) {
        return this.request('get', '/user/' + userId);
    }

    update(userId, attributes) {
        return this.request('patch', '/user/' + userId, attributes);
    }

    create(attributes) {
        return this.request('post', '/user', attributes);
    }

}
