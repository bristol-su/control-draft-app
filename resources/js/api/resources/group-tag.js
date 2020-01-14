import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/group-tag');
    }

    delete(groupTagId) {
        return this.request('delete', '/group-tag/' + groupTagId);
    }

    get(groupTagId) {
        return this.request('get', '/group-tag/' + groupTagId);
    }

    update(groupTagId, attributes) {
        return this.request('patch', '/group-tag/' + groupTagId, attributes);
    }

    create(attributes) {
        return this.request('post', '/group-tag', attributes);
    }

    groups(groupTagId) {
        return this.request('get', '/group-tag/' + groupTagId + '/group');
    }

    tagGroup(groupTagId, groupId) {
        return this.request('patch', '/group-tag/' + groupTagId + '/group/' + groupId);
    }

    untagGroup(groupTagId, groupId) {
        return this.request('delete', '/group-tag/' + groupTagId + '/group/' + groupId);
    }

    category(groupTagId) {
        return this.request('get', '/group-tag/' + groupTagId + '/group-tag-category');
    }
}
