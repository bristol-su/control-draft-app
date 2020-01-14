import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/role');
    }

    delete(roleId) {
        return this.request('delete', '/role/' + roleId);
    }

    get(roleId) {
        return this.request('get', '/role/' + roleId);
    }

    update(roleId, attributes) {
        return this.request('patch', '/role/' + roleId, attributes);
    }

    create(attributes) {
        return this.request('post', '/role', attributes);
    }

    tags(roleId) {
        return this.request('get', '/role/' + roleId + '/tag');
    }

    tag(roleId, tagId) {
        return this.request('patch', '/role/' + roleId + '/tag/' + tagId);
    }

    untag(roleId, tagId) {
        return this.request('delete', '/role/' + roleId + '/tag/' + tagId);
    }

    users(roleId) {
        return this.request('get', '/role/' + roleId + '/user');

    }

    addUser(roleId, userId) {
        return this.request('patch', '/role/' + roleId + '/user/' + userId);

    }

    removeUser(roleId, userId) {
        return this.request('delete', '/role/' + roleId + '/user/' + userId);

    }

    group(roleId) {
        return this.request('get', '/role/' + roleId + '/group');
    }

    position(roleId) {
        return this.request('get', '/role/' + roleId + '/position');
    }

}
