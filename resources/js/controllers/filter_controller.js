import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        filter: String,
        route: String,
    };

    connect() {
        // Bind the preventEnter method to the keydown event on the form element
        this.element.addEventListener('keydown', this.preventEnter);
    }

    disconnect() {
        // Clean up the event listener when the controller is disconnected
        this.element.removeEventListener('keydown', this.preventEnter);
    }

    /**
     * Prevents the default form submission behavior when the Enter key is pressed.
     *
     * @param {KeyboardEvent} event - The keyboard event triggered by the key press.
     * @return {void}
     */
    preventEnter(event) {
        if (event.key === 'Enter') {
            event.preventDefault();  // Prevent form submission when Enter is pressed
        }
    }

    /**
     * Handles changes to the filter, dispatching a custom event with filter and route details.
     *
     * @param {Object} event - The event object containing the filter change details.
     * @return {void} No return value.
     */
    change(event) {
        console.log(this.filterValue, 'hsh');
        document.dispatchEvent(
            new CustomEvent('filter:change', {
                detail: {
                    filter: this.filterValue,
                    route: this.routeValue,
                    value: event.target.value,
                },
            })
        );
    }
}
