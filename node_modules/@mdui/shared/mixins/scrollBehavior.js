import { __decorate } from "tslib";
import { property } from 'lit/decorators.js';
import { $ } from '@mdui/jq/$.js';
import '@mdui/jq/methods/css.js';
import { isNodeName } from '@mdui/jq/shared/helper.js';
import { DefinedController } from '../controllers/defined.js';
import { watch } from '../decorators/watch.js';
/**
 * 滚动行为
 *
 * 父类需要实现
 * @property() public scrollBehavior
 * protected runScrollThreshold(isScrollingUp: boolean, scrollTop: number): void;
 * protected runScrollNoThreshold(isScrollingUp: boolean, scrollTop: number): void;
 * protected get scrollPaddingPosition(): ScrollPaddingPosition
 */
export const ScrollBehaviorMixin = (superclass) => {
    class ScrollBehaviorMixinClass extends superclass {
        // eslint-disable-next-line @typescript-eslint/no-explicit-any
        constructor(...args) {
            super(...args);
            this.scrollBehaviorDefinedController = new DefinedController(this, {
                needDomReady: true,
            });
            /**
             * 上次滚动后，垂直方向的距离（滚动距离超过 scrollThreshold 才记录）
             */
            this.lastScrollTopThreshold = 0;
            /**
             * 上次滚动后，垂直方向的距离（无视 scrollThreshold，始终记录）
             */
            this.lastScrollTopNoThreshold = 0;
            /**
             * 父元素是否是 `mdui-layout`
             */
            this.isParentLayout = false;
            this.onListeningScroll = this.onListeningScroll.bind(this);
        }
        /**
         * 滚动时，如果需要给 container 添加 padding，添加在顶部还是底部
         */
        get scrollPaddingPosition() {
            throw new Error('Must implement scrollPaddingPosition getter');
        }
        async onScrollTargetChange(oldValue, newValue) {
            await this.scrollBehaviorDefinedController.whenDefined();
            // 仅在有值切换到无值、或无值切换到有值时，更新
            if ((oldValue && !newValue) || (!oldValue && newValue)) {
                this.updateContainerPadding();
            }
            if (!this.scrollBehavior) {
                return;
            }
            const oldListening = this.getListening(oldValue);
            if (oldListening) {
                oldListening.removeEventListener('scroll', this.onListeningScroll);
            }
            const newListening = this.getListening(newValue);
            if (newListening) {
                this.updateScrollTop(newListening);
                newListening.addEventListener('scroll', this.onListeningScroll);
            }
        }
        async onScrollBehaviorChange(oldValue, newValue) {
            await this.scrollBehaviorDefinedController.whenDefined();
            // 仅在有值切换到无值、或无值切换到有值时，更新
            if ((oldValue && !newValue) || (!oldValue && newValue)) {
                this.updateContainerPadding();
            }
            const listening = this.getListening(this.scrollTarget);
            if (!listening) {
                return;
            }
            if (this.scrollBehavior) {
                this.updateScrollTop(listening);
                listening.addEventListener('scroll', this.onListeningScroll);
            }
            else {
                listening.removeEventListener('scroll', this.onListeningScroll);
            }
        }
        connectedCallback() {
            super.connectedCallback();
            this.scrollBehaviorDefinedController.whenDefined().then(() => {
                this.isParentLayout = isNodeName(this.parentElement, 'mdui-layout');
                this.updateContainerPadding();
            });
        }
        disconnectedCallback() {
            super.disconnectedCallback();
            this.scrollBehaviorDefinedController.whenDefined().then(() => {
                this.updateContainerPadding(false);
            });
        }
        /**
         * scrollBehavior 包含多个滚动行为，用空格分割
         * 用该方法判断指定滚动行为是否在 scrollBehavior 中
         * @param behavior 为数组时，只要其中一个行为在 scrollBehavior 中，即返回 `true`
         */
        hasScrollBehavior(behavior) {
            const behaviors = (this.scrollBehavior?.split(' ') ??
                []);
            if (Array.isArray(behavior)) {
                return !!behaviors.filter((v) => behavior.includes(v)).length;
            }
            else {
                return behaviors.includes(behavior);
            }
        }
        /**
         * 执行滚动事件，在滚动距离超过 scrollThreshold 时才会执行
         * Note: 父类可以按需实现该方法
         * @param isScrollingUp 是否向上滚动
         * @param scrollTop 距离 scrollTarget 顶部的距离
         */
        // eslint-disable-next-line @typescript-eslint/no-unused-vars
        runScrollThreshold(isScrollingUp, scrollTop) {
            return;
        }
        /**
         * 执行滚动事件，会无视 scrollThreshold，始终会执行
         * @param isScrollingUp 是否向上滚动
         * @param scrollTop 距离 scrollTarget 顶部的距离
         */
        // eslint-disable-next-line @typescript-eslint/no-unused-vars
        runScrollNoThreshold(isScrollingUp, scrollTop) {
            return;
        }
        /**
         * 更新滚动容器的 padding，避免内容被 navigation-bar 覆盖
         * 仅 scrollBehavior 包含 hide、shrink 时，添加 padding
         * @param withPadding 该值为 false 时，为移除 padding
         */
        updateContainerPadding(withPadding = true) {
            const container = this.getContainer(this.scrollTarget);
            if (!container || this.isParentLayout) {
                return;
            }
            const propName = this.scrollPaddingPosition === 'top' ? 'paddingTop' : 'paddingBottom';
            if (withPadding) {
                const propValue = this.getListening(this.scrollTarget) &&
                    ['fixed', 'absolute'].includes($(this).css('position'))
                    ? this.offsetHeight
                    : null;
                $(container).css({ [propName]: propValue });
            }
            else {
                $(container).css({ [propName]: null });
            }
        }
        onListeningScroll() {
            const listening = this.getListening(this.scrollTarget);
            window.requestAnimationFrame(() => this.onScroll(listening));
        }
        /**
         * 滚动事件，这里过滤掉不符合条件的滚动
         */
        onScroll(listening) {
            const scrollTop = listening.scrollY ?? listening.scrollTop;
            // 无视 scrollThreshold 的回调
            if (this.lastScrollTopNoThreshold !== scrollTop) {
                this.runScrollNoThreshold(scrollTop < this.lastScrollTopNoThreshold, scrollTop);
                this.lastScrollTopNoThreshold = scrollTop;
            }
            // 滚动距离大于 scrollThreshold 时才执行的回调
            if (Math.abs(scrollTop - this.lastScrollTopThreshold) >
                (this.scrollThreshold || 0)) {
                this.runScrollThreshold(scrollTop < this.lastScrollTopThreshold, scrollTop);
                this.lastScrollTopThreshold = scrollTop;
            }
        }
        /**
         * 重新更新 lastScrollTopThreshold、lastScrollTopNoThreshold 的值
         * 用于在 scrollTarget、scrollBehavior 变更时，重新设置 lastScrollTopThreshold、lastScrollTopNoThreshold 的初始值
         */
        updateScrollTop(listening) {
            this.lastScrollTopThreshold = this.lastScrollTopNoThreshold =
                listening.scrollY ?? listening.scrollTop;
        }
        /**
         * 获取组件需要监听哪个元素的滚动状态
         */
        getListening(target) {
            return target ? $(target)[0] : window;
        }
        /**
         * 获取组件在哪个容器内滚动
         */
        getContainer(target) {
            return target ? $(target)[0] : document.body;
        }
    }
    __decorate([
        property({ attribute: 'scroll-target' })
    ], ScrollBehaviorMixinClass.prototype, "scrollTarget", void 0);
    __decorate([
        property({ reflect: true, attribute: 'scroll-behavior' })
    ], ScrollBehaviorMixinClass.prototype, "scrollBehavior", void 0);
    __decorate([
        property({ type: Number, reflect: true, attribute: 'scroll-threshold' })
    ], ScrollBehaviorMixinClass.prototype, "scrollThreshold", void 0);
    __decorate([
        watch('scrollTarget')
    ], ScrollBehaviorMixinClass.prototype, "onScrollTargetChange", null);
    __decorate([
        watch('scrollBehavior')
    ], ScrollBehaviorMixinClass.prototype, "onScrollBehaviorChange", null);
    return ScrollBehaviorMixinClass;
};
