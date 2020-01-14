import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/position-tag-category');
    }

    delete(positionTagCategoryId) {
        return this.request('delete', '/position-tag-category/' + positionTagCategoryId);
    }

    get(positionTagCategoryId) {
        return this.request('get', '/position-tag-category/' + positionTagCategoryId);
    }

    update(positionTagCategoryId, attributes) {
        return this.request('patch', '/position-tag-category/' + positionTagCategoryId, attributes);
    }

    create(attributes) {
        return this.request('post', '/position-tag-category', attributes);
    }

    tags(positionTagCategoryId) {
        return this.request('get', '/position-tag-category/' + positionTagCategoryId + '/position-tag');
    }

}
