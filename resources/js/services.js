import Vue from "vue";

/** Moment JS */
import moment from "moment";

/** Progress Bar */
import VueProgressBar from "vue-progressbar";

Vue.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "2px"
});

/** Sweet Alert 2 */
import Swal from "sweetalert2";
window.Swal = Swal;

let Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: false,
    onOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});
window.Toast = Toast;

/** V-Form */
import { Form, HasError, AlertError } from "vform";
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

/** Filters */
Vue.filter("roleFilter", function(value) {
    if (value) return "Administrator";
    else return "Standard User";
});
Vue.filter("prettyDate", function(value) {
    return moment(value).format("LLL");
});
