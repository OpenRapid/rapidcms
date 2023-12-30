import { $ } from '../$.js';
import { eachArray } from '../shared/helper.js';
// eslint-disable-next-line
$.fn.each = function (callback) {
    return eachArray(this, (value, index) => {
        return callback.call(value, index, value);
    });
};
