import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/user-tag-category');
    }

    delete(userTagCategoryId) {
        return this.request('delete', '/user-tag-category/' + userTagCategoryId);
    }

    get(userTagCategoryId) {
        return this.request('get', '/user-tag-category/' + userTagCategoryId);
    }

    update(userTagCategoryId, attributes) {
        return this.request('patch', '/user-tag-category/' + userTagCategoryId, attributes);
    }

    create(attributes) {
        return this.request('post', '/user-tag-category', attributes);
    }

    tags(userTagCategoryId) {
        return this.request('get', '/user-tag-category/' + userTagCategoryId + '/user-tag');
    }

}
