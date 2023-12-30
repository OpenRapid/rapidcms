import isPromise from 'is-promise';
import { $ } from '@mdui/jq/$.js';
import '@mdui/jq/methods/on.js';
import { isBoolean, isString, isUndefined, returnTrue, } from '@mdui/jq/shared/helper.js';
import { TextField } from '../components/text-field.js';
import { dialog as openDialog } from './dialog.js';
const defaultOptions = {
    confirmText: '确定',
    cancelText: '取消',
    onConfirm: returnTrue,
    onCancel: returnTrue,
    validator: returnTrue,
    textFieldOptions: {},
};
/**
 * 打开一个 prompt，返回 Promise。
 * 如果是通过点击确定按钮关闭，则返回的 promise 会被 resolve，resolve 的参数为输入框的值；
 * 如果是通过其他方式关闭，则返回的 promise 会被 reject。
 * @param options
 */
export const prompt = (options) => {
    const mergedOptions = Object.assign({}, defaultOptions, options);
    const properties = [
        'headline',
        'description',
        'icon',
        'closeOnEsc',
        'closeOnOverlayClick',
        'stackedActions',
        'queue',
        'onOpen',
        'onOpened',
        'onClose',
        'onClosed',
        'onOverlayClick',
    ];
    const textField = new TextField();
    Object.entries(mergedOptions.textFieldOptions).forEach(([key, value]) => {
        // @ts-ignore
        textField[key] = value;
    });
    return new Promise((resolve, reject) => {
        let isResolve = false;
        const dialog = openDialog({
            ...Object.fromEntries(properties
                .filter((key) => !isUndefined(mergedOptions[key]))
                .map((key) => [key, mergedOptions[key]])),
            body: textField,
            actions: [
                {
                    text: mergedOptions.cancelText,
                    onClick: (dialog) => {
                        return mergedOptions.onCancel.call(dialog, textField.value, dialog);
                    },
                },
                {
                    text: mergedOptions.confirmText,
                    onClick: (dialog) => {
                        const onConfirm = () => {
                            const clickResult = mergedOptions.onConfirm.call(dialog, textField.value, dialog);
                            if (isPromise(clickResult)) {
                                clickResult.then(() => {
                                    isResolve = true;
                                });
                            }
                            else if (clickResult !== false) {
                                isResolve = true;
                            }
                            return clickResult;
                        };
                        // 原生验证
                        textField.setCustomValidity('');
                        if (!textField.reportValidity()) {
                            return false;
                        }
                        // validator 函数验证
                        const validateResult = mergedOptions.validator.call(textField, textField.value);
                        if (isBoolean(validateResult) && !validateResult) {
                            textField.setCustomValidity(' ');
                            return false;
                        }
                        if (isString(validateResult)) {
                            textField.setCustomValidity(validateResult);
                            return false;
                        }
                        if (isPromise(validateResult)) {
                            return new Promise((resolve, reject) => {
                                validateResult.then(resolve).catch((reason) => {
                                    textField.setCustomValidity(reason);
                                    reject(reason);
                                });
                            });
                        }
                        return onConfirm();
                    },
                },
            ],
        });
        $(dialog).on('close', () => {
            isResolve ? resolve(textField.value) : reject();
        });
    });
};
