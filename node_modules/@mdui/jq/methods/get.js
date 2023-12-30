import { $ } from '../$.js';
// eslint-disable-next-line
$.fn.get = function (index) {
    return index === undefined
        ? [].slice.call(this)
        : this[index >= 0 ? index : index + this.length];
};
