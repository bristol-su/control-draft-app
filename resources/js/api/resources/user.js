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

    tags(groupId) {
        return this.request('get', '/group/' + groupId + '/tag');
    }

    tag(groupId, tagId) {
        return this.request('patch', '/group/' + groupId + '/tag/' + tagId);
    }

    untag(groupId, tagId) {
        return this.request('delete', '/group/' + groupId + '/tag/' + tagId);
    }

    roles(groupId) {
        return this.request('get', '/group/' + groupId + '/role');

    }

    addRole(groupId, roleId) {
        return this.request('patch', '/group/' + groupId + '/role/' + roleId);

    }

    removeRole(groupId, roleId) {
        return this.request('delete', '/group/' + groupId + '/role/' + roleId);

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
