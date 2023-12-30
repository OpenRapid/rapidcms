import { getWindow } from 'ssr-window';
import { each } from './each.js';
// eslint-disable-next-line
export function map(elements, callback) {
    const window = getWindow();
    let value;
    const ret = [];
    each(elements, (i, element) => {
        value = callback.call(window, element, i);
        if (value != null) {
            ret.push(value);
        }
    });
    return [].concat(...ret);
}
