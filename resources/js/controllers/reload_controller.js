import {Controller} from '@hotwired/stimulus';
import {useDebounce} from 'stimulus-use';
// Connects to data-controller="reload"
export default class extends Controller {
    static debounces = ['filterChange', 'sortChange'];

    payload = {
        filter: {},
        sort: {}
    }

    /**
     * Connects the controller and sets up debouncing.
     *
     * @return {void}
     */
    connect() {
        useDebounce(this, {wait: 500});
    }

    /**
     * Handles changes to the filter, updating the payload and reloading the element.
     *
     * @param {Object} event - The event object containing filter and route details.
     * @return {void}
     */
    filterChange(event) {
        this.payload.filter = {
            ...this.payload.filter,
            [event.detail.filter]: event.detail.value
        };
        console.log(event.detail.route, event.detail.filter);
        this.element.src = route(event.detail.route, this.payload);
        this.element.reload();
    }

    /**
     * Handles changes to the sort order, updating the payload and reloading the element.
     *
     * @param {Object} event - The event object containing sort details.
     * @return {void}
     */
    sortChange(event) {
        this.payload.sort = event.detail.value;

        this.element.src = route(event.detail.route, this.payload);
        this.element.reload();
    }

    /**
     * Clears the payload by resetting the filter and sort objects to empty objects.
     *
     * @return {void} No return value.
     */
    clear() {
        this.payload = {
            filter: {},
            sort: {},
        };
    }
}
