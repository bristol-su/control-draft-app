import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/position');
    }

    delete(positionId) {
        return this.request('delete', '/position/' + positionId);
    }

    get(positionId) {
        return this.request('get', '/position/' + positionId);
    }

    update(positionId, attributes) {
        return this.request('patch', '/position/' + positionId, attributes);
    }

    create(attributes) {
        return this.request('post', '/position', attributes);
    }

    tags(positionId) {
        return this.request('get', '/position/' + positionId + '/tag');
    }

    tag(positionId, tagId) {
        return this.request('patch', '/position/' + positionId + '/tag/' + tagId);
    }

    untag(positionId, tagId) {
        return this.request('delete', '/position/' + positionId + '/tag/' + tagId);
    }

    roles(positionId) {
        return this.request('get', '/position/' + positionId + '/role');

    }

}
