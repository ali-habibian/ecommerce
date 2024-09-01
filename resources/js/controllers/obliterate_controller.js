import {Controller} from "@hotwired/stimulus"
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';

// Connects to data-controller="obliterate"
export default class extends Controller {

    static targets = ["form"]

    static values = {
        url: String,
        trash: Boolean
    }

    handle() {
        Swal.fire({
            title: 'آیا مطمئن هستید؟',
            text:
                this.trashValue === true
                    ? 'این مورد به سطل زباله شما ارسال خواهد شد. پس از 30 روز برای همیشه حذف خواهد شد'
                    : "شما نمی توانید این را برگردانید!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dd3333',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'بله، حذف کن!',
            cancelButtonText: 'خیر',
        }).then((result) => {
            if (result.isConfirmed) {
                this.formTarget.requestSubmit();
            }
        });
    }
}
