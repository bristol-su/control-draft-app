import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/group');
    }

    delete(groupId) {
        return this.request('delete', '/group/' + groupId);
    }

    get(groupId) {
        return this.request('get', '/group/' + groupId);
    }

    update(groupId, attributes) {
        return this.request('patch', '/group/' + groupId, attributes);
    }

    create(attributes) {
        return this.request('post', '/group', attributes);
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

    users(groupId) {
        return this.request('get', '/group/' + groupId + '/user');

    }

    addUser(groupId, userId) {
        return this.request('patch', '/group/' + groupId + '/user/' + userId);

    }

    removeUser(groupId, userId) {
        return this.request('delete', '/group/' + groupId + '/user/' + userId);

    }

    roles(groupId) {
        return this.request('get', '/group/' + groupId + '/role');

    }

    addRole(groupId, roleId) {
        return this.request('patch', '/group/' + groupId + '/role/' + roleId);

    }

}
