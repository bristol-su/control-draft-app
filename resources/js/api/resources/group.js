import BaseResource from './../baseresource';

export default class extends BaseResource{

    all() {
        return this.request('get', '/group');
    }

    delete(id) {
        return this.request('delete', '/group/' + id);
    }

}
