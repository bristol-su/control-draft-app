import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/user-tag');
    }

    delete(userTagId) {
        return this.request('delete', '/user-tag/' + userTagId);
    }

    get(userTagId) {
        return this.request('get', '/user-tag/' + userTagId);
    }

    update(userTagId, attributes) {
        return this.request('patch', '/user-tag/' + userTagId, attributes);
    }

    create(attributes) {
        return this.request('post', '/user-tag', attributes);
    }

    users(userTagId) {
        return this.request('get', '/user-tag/' + userTagId + '/user');
    }

    tagUser(userTagId, userId) {
        return this.request('patch', '/user-tag/' + userTagId + '/user/' + userId);
    }

    untagUser(userTagId, userId) {
        return this.request('delete', '/user-tag/' + userTagId + '/user/' + userId);
    }

    category(userTagId) {
        return this.request('get', '/user-tag/' + userTagId + '/user-tag-category');
    }
}
