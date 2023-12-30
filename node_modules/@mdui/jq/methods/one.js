import { $ } from '../$.js';
import './on.js';
$.fn.one = function (types, 
// eslint-disable-next-line
selector, 
// eslint-disable-next-line
data, 
// eslint-disable-next-line
callback) {
    // @ts-ignore
    return this.on(types, selector, data, callback, true);
};
