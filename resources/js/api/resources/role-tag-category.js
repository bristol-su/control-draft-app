import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/role-tag-category');
    }

    delete(roleTagCategoryId) {
        return this.request('delete', '/role-tag-category/' + roleTagCategoryId);
    }

    get(roleTagCategoryId) {
        return this.request('get', '/role-tag-category/' + roleTagCategoryId);
    }

    update(roleTagCategoryId, attributes) {
        return this.request('patch', '/role-tag-category/' + roleTagCategoryId, attributes);
    }

    create(attributes) {
        return this.request('post', '/role-tag-category', attributes);
    }

    tags(roleTagCategoryId) {
        return this.request('get', '/role-tag-category/' + roleTagCategoryId + '/role-tag');
    }

}
