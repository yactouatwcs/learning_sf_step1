import { Controller } from '@hotwired/stimulus';
import axios from 'axios';

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

    /**
     * declaring which value we allow to pass in
     * from Twig to the Stimulus controller
     * via a static property
     */
    static values = {
        url: String
    };

    // connect() {
    //     console.log("test controller loaded");
    // }

    async doSomethingAsync(e) {
        e.preventDefault();
        const APICall = await axios.get(this.urlValue);
        console.log(APICall.data);
    }

}
