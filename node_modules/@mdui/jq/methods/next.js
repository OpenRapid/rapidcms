import { $ } from '../$.js';
import { eachArray } from '../shared/helper.js';
import { dir } from './utils/dir.js';
eachArray(['', 'All', 'Until'], (name, nameIndex) => {
    $.fn[`next${name}`] = function (
    // eslint-disable-next-line
    selector, filter) {
        return dir(this, nameIndex, 'nextElementSibling', selector, filter);
    };
});
