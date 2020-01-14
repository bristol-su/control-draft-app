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

    tags(userId) {
        return this.request('get', '/user/' + userId + '/tag');
    }

    tag(userId, tagId) {
        return this.request('patch', '/user/' + userId + '/tag/' + tagId);
    }

    untag(userId, tagId) {
        return this.request('delete', '/user/' + userId + '/tag/' + tagId);
    }

    roles(userId) {
        return this.request('get', '/user/' + userId + '/role');

    }

    addRole(userId, roleId) {
        return this.request('patch', '/user/' + userId + '/role/' + roleId);

    }

    removeRole(userId, roleId) {
        return this.request('delete', '/user/' + userId + '/role/' + roleId);

    }

    groups(userId) {
        return this.request('get', '/user/' + userId + '/group');

    }

    addGroup(userId, groupId) {
        return this.request('patch', '/user/' + userId + '/group/' + groupId);

    }

    removeGroup(userId, groupId) {
        return this.request('delete', '/user/' + userId + '/group/' + groupId);

    }

}
