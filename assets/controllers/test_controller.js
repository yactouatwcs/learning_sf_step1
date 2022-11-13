import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="test" attribute will cause
 * this controller to be executed. The name "test" comes from the filename:
 * test_controller.js -> "test"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {

    // connect() {
    //     console.log("test controller loaded");
    // }

    async doSomethingAsync(e) {
        e.preventDefault();
        console.log("doing something async");
    }

}
