import { $ } from '../$.js';
import { map } from '../functions/map.js';
import { JQ } from '../shared/core.js';
// eslint-disable-next-line
$.fn.map = function (callback) {
    return new JQ(map(this, (element, i) => {
        return callback.call(element, i, element);
    }));
};
