import { $ } from '../$.js';
import { merge } from '../functions/merge.js';
import { unique } from '../functions/unique.js';
import { JQ } from '../shared/core.js';
import './get.js';
// eslint-disable-next-line
$.fn.add = function (selector) {
    return new JQ(unique(merge(this.get(), $(selector).get())));
};
