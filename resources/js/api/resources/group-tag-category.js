import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/group-tag-category');
    }

    delete(groupTagCategoryId) {
        return this.request('delete', '/group-tag-category/' + groupTagCategoryId);
    }

    get(groupTagCategoryId) {
        return this.request('get', '/group-tag-category/' + groupTagCategoryId);
    }

    update(groupTagCategoryId, attributes) {
        return this.request('patch', '/group-tag-category/' + groupTagCategoryId, attributes);
    }

    create(attributes) {
        return this.request('post', '/group-tag-category', attributes);
    }

    tags(groupTagCategoryId) {
        return this.request('get', '/group-tag-category/' + groupTagCategoryId + '/group-tag');
    }

}
