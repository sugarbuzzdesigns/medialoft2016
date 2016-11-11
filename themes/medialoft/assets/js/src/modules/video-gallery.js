jQuery.extend({

  getQueryParameters : function(str) {
	  return (str || document.location.search).replace(/(^\?)/,'').split("&").map(function(n){return n = n.split("="),this[n[0]] = n[1],this}.bind({}))[0];
  }

});
/*!
 * clipboard.js v1.5.8
 * https://zenorocha.github.io/clipboard.js
 *
 * Licensed MIT © Zeno Rocha
 */
!function(t){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=t();else if("function"==typeof define&&define.amd)define([],t);else{var e;e="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,e.Clipboard=t()}}(function(){var t,e,n;return function t(e,n,r){function o(a,s){if(!n[a]){if(!e[a]){var c="function"==typeof require&&require;if(!s&&c)return c(a,!0);if(i)return i(a,!0);var u=new Error("Cannot find module '"+a+"'");throw u.code="MODULE_NOT_FOUND",u}var l=n[a]={exports:{}};e[a][0].call(l.exports,function(t){var n=e[a][1][t];return o(n?n:t)},l,l.exports,t,e,n,r)}return n[a].exports}for(var i="function"==typeof require&&require,a=0;a<r.length;a++)o(r[a]);return o}({1:[function(t,e,n){var r=t("matches-selector");e.exports=function(t,e,n){for(var o=n?t:t.parentNode;o&&o!==document;){if(r(o,e))return o;o=o.parentNode}}},{"matches-selector":5}],2:[function(t,e,n){function r(t,e,n,r,i){var a=o.apply(this,arguments);return t.addEventListener(n,a,i),{destroy:function(){t.removeEventListener(n,a,i)}}}function o(t,e,n,r){return function(n){n.delegateTarget=i(n.target,e,!0),n.delegateTarget&&r.call(t,n)}}var i=t("closest");e.exports=r},{closest:1}],3:[function(t,e,n){n.node=function(t){return void 0!==t&&t instanceof HTMLElement&&1===t.nodeType},n.nodeList=function(t){var e=Object.prototype.toString.call(t);return void 0!==t&&("[object NodeList]"===e||"[object HTMLCollection]"===e)&&"length"in t&&(0===t.length||n.node(t[0]))},n.string=function(t){return"string"==typeof t||t instanceof String},n.fn=function(t){var e=Object.prototype.toString.call(t);return"[object Function]"===e}},{}],4:[function(t,e,n){function r(t,e,n){if(!t&&!e&&!n)throw new Error("Missing required arguments");if(!s.string(e))throw new TypeError("Second argument must be a String");if(!s.fn(n))throw new TypeError("Third argument must be a Function");if(s.node(t))return o(t,e,n);if(s.nodeList(t))return i(t,e,n);if(s.string(t))return a(t,e,n);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")}function o(t,e,n){return t.addEventListener(e,n),{destroy:function(){t.removeEventListener(e,n)}}}function i(t,e,n){return Array.prototype.forEach.call(t,function(t){t.addEventListener(e,n)}),{destroy:function(){Array.prototype.forEach.call(t,function(t){t.removeEventListener(e,n)})}}}function a(t,e,n){return c(document.body,t,e,n)}var s=t("./is"),c=t("delegate");e.exports=r},{"./is":3,delegate:2}],5:[function(t,e,n){function r(t,e){if(i)return i.call(t,e);for(var n=t.parentNode.querySelectorAll(e),r=0;r<n.length;++r)if(n[r]==t)return!0;return!1}var o=Element.prototype,i=o.matchesSelector||o.webkitMatchesSelector||o.mozMatchesSelector||o.msMatchesSelector||o.oMatchesSelector;e.exports=r},{}],6:[function(t,e,n){function r(t){var e;if("INPUT"===t.nodeName||"TEXTAREA"===t.nodeName)t.focus(),t.setSelectionRange(0,t.value.length),e=t.value;else{t.hasAttribute("contenteditable")&&t.focus();var n=window.getSelection(),r=document.createRange();r.selectNodeContents(t),n.removeAllRanges(),n.addRange(r),e=n.toString()}return e}e.exports=r},{}],7:[function(t,e,n){function r(){}r.prototype={on:function(t,e,n){var r=this.e||(this.e={});return(r[t]||(r[t]=[])).push({fn:e,ctx:n}),this},once:function(t,e,n){function r(){o.off(t,r),e.apply(n,arguments)}var o=this;return r._=e,this.on(t,r,n)},emit:function(t){var e=[].slice.call(arguments,1),n=((this.e||(this.e={}))[t]||[]).slice(),r=0,o=n.length;for(r;o>r;r++)n[r].fn.apply(n[r].ctx,e);return this},off:function(t,e){var n=this.e||(this.e={}),r=n[t],o=[];if(r&&e)for(var i=0,a=r.length;a>i;i++)r[i].fn!==e&&r[i].fn._!==e&&o.push(r[i]);return o.length?n[t]=o:delete n[t],this}},e.exports=r},{}],8:[function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}function o(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}n.__esModule=!0;var i=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),a=t("select"),s=r(a),c=function(){function t(e){o(this,t),this.resolveOptions(e),this.initSelection()}return t.prototype.resolveOptions=function t(){var e=arguments.length<=0||void 0===arguments[0]?{}:arguments[0];this.action=e.action,this.emitter=e.emitter,this.target=e.target,this.text=e.text,this.trigger=e.trigger,this.selectedText=""},t.prototype.initSelection=function t(){if(this.text&&this.target)throw new Error('Multiple attributes declared, use either "target" or "text"');if(this.text)this.selectFake();else{if(!this.target)throw new Error('Missing required attributes, use either "target" or "text"');this.selectTarget()}},t.prototype.selectFake=function t(){var e=this,n="rtl"==document.documentElement.getAttribute("dir");this.removeFake(),this.fakeHandler=document.body.addEventListener("click",function(){return e.removeFake()}),this.fakeElem=document.createElement("textarea"),this.fakeElem.style.fontSize="12pt",this.fakeElem.style.border="0",this.fakeElem.style.padding="0",this.fakeElem.style.margin="0",this.fakeElem.style.position="absolute",this.fakeElem.style[n?"right":"left"]="-9999px",this.fakeElem.style.top=(window.pageYOffset||document.documentElement.scrollTop)+"px",this.fakeElem.setAttribute("readonly",""),this.fakeElem.value=this.text,document.body.appendChild(this.fakeElem),this.selectedText=s.default(this.fakeElem),this.copyText()},t.prototype.removeFake=function t(){this.fakeHandler&&(document.body.removeEventListener("click"),this.fakeHandler=null),this.fakeElem&&(document.body.removeChild(this.fakeElem),this.fakeElem=null)},t.prototype.selectTarget=function t(){this.selectedText=s.default(this.target),this.copyText()},t.prototype.copyText=function t(){var e=void 0;try{e=document.execCommand(this.action)}catch(n){e=!1}this.handleResult(e)},t.prototype.handleResult=function t(e){e?this.emitter.emit("success",{action:this.action,text:this.selectedText,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)}):this.emitter.emit("error",{action:this.action,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)})},t.prototype.clearSelection=function t(){this.target&&this.target.blur(),window.getSelection().removeAllRanges()},t.prototype.destroy=function t(){this.removeFake()},i(t,[{key:"action",set:function t(){var e=arguments.length<=0||void 0===arguments[0]?"copy":arguments[0];if(this._action=e,"copy"!==this._action&&"cut"!==this._action)throw new Error('Invalid "action" value, use either "copy" or "cut"')},get:function t(){return this._action}},{key:"target",set:function t(e){if(void 0!==e){if(!e||"object"!=typeof e||1!==e.nodeType)throw new Error('Invalid "target" value, use a valid Element');this._target=e}},get:function t(){return this._target}}]),t}();n.default=c,e.exports=n.default},{select:6}],9:[function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}function o(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function i(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}function a(t,e){var n="data-clipboard-"+t;if(e.hasAttribute(n))return e.getAttribute(n)}n.__esModule=!0;var s=t("./clipboard-action"),c=r(s),u=t("tiny-emitter"),l=r(u),f=t("good-listener"),d=r(f),h=function(t){function e(n,r){o(this,e),t.call(this),this.resolveOptions(r),this.listenClick(n)}return i(e,t),e.prototype.resolveOptions=function t(){var e=arguments.length<=0||void 0===arguments[0]?{}:arguments[0];this.action="function"==typeof e.action?e.action:this.defaultAction,this.target="function"==typeof e.target?e.target:this.defaultTarget,this.text="function"==typeof e.text?e.text:this.defaultText},e.prototype.listenClick=function t(e){var n=this;this.listener=d.default(e,"click",function(t){return n.onClick(t)})},e.prototype.onClick=function t(e){var n=e.delegateTarget||e.currentTarget;this.clipboardAction&&(this.clipboardAction=null),this.clipboardAction=new c.default({action:this.action(n),target:this.target(n),text:this.text(n),trigger:n,emitter:this})},e.prototype.defaultAction=function t(e){return a("action",e)},e.prototype.defaultTarget=function t(e){var n=a("target",e);return n?document.querySelector(n):void 0},e.prototype.defaultText=function t(e){return a("text",e)},e.prototype.destroy=function t(){this.listener.destroy(),this.clipboardAction&&(this.clipboardAction.destroy(),this.clipboardAction=null)},e}(l.default);n.default=h,e.exports=n.default},{"./clipboard-action":8,"good-listener":4,"tiny-emitter":7}]},{},[9])(9)});


var btns = document.querySelectorAll('.copy-to-clipboard');

// for (var i = 0; i < btns.length; i++) {
//     btns[i].addEventListener('mouseleave', function(e) {
//         e.currentTarget.setAttribute('class', 'copy-to-clipboard share-link');
//         e.currentTarget.removeAttribute('aria-label');
//     });
// }

function showTooltip(elem, msg) {
    elem.setAttribute('class', 'copy-to-clipboard tooltipped tooltipped-s share-link');
    elem.setAttribute('aria-label', msg);
}

// Simplistic detection, do not use it in production
function fallbackMessage(action) {
    var actionMsg = '';
    var actionKey = (action === 'cut' ? 'X' : 'C');

    if(/iPhone|iPad/i.test(navigator.userAgent)) {
        actionMsg = 'No support :(';
    }
    else if (/Mac/i.test(navigator.userAgent)) {
        actionMsg = 'Press ⌘-' + actionKey + ' to ' + action;
    }
    else {
        actionMsg = 'Press Ctrl-' + actionKey + ' to ' + action;
    }

    return actionMsg;
}

// TODO: Dynamic Height for Copy since it can change

var ml = ml || {};

(function($){
	ml.VideoGallery = {
		init: function(){
			// global elms
			this.$win = $(window);
			this.$body = $('body');
			this.$scrollElm = $('html,body');

			// gallery elements
			this.$videoGallery = $('.gallery');
			this.$galleryItems = $('.gallery-item');
			this.$galleryItemVideos = $('.gallery-item .video-wrap');
			this.$galleryItemVideoTitle = $('.gallery-item .title');

			this.numberOfGalleryItems = this.$galleryItems.length;

			// overlay elements
			this.$galleryOverlay = $('.gallery-overlay');
			this.$galleryOverlayItemWrap = $('.gallery-overlay-item');
			this.$galleryOverlayTrans = $('.gallery-overlay-transition');
			this.$overlayVideo = null;
			this.$overlayCopy = $('.gallery-overlay .copy');
			this.$overlayDescription = $('.gallery-overlay .description');
			this.$overlayTitle = $('.gallery-overlay .title');
			this.$overlayCategory = $('.gallery-overlay .category');
			this.$galleryOverlayVideoWrap = $('.gallery-overlay .video-wrap');
			this.$overlayShareLink = $('.gallery-overlay .share-link');

			this.clipboard = null;

			// overlay button elements
			this.$overlayCloseBtn = $('.close-video');
			this.$videoStartBtn = $('.video-start');
			this.$galleryNav = $('.gallery-overlay nav');
			this.$galleryNavNext = $('.gallery-overlay nav .next');
			this.$galleryNavPrev = $('.gallery-overlay nav .prev');
			// page env info
			this.curScrollPos = 0;

			// url info
			this.url = {
				currentPath: $.address.path(),
				firstLoad: true,
				urlQueryString: document.location.href.slice(document.location.href.indexOf('?')),
				urlMinusQuery: document.location.href.slice(0, document.location.href.indexOf('?'))
			}

			// gallery element that has been clicked to open
			// in the overly
			this.$currentVideo = null;
			this.overlayVideoPlaying = false;
			this.overlayOpen = false;

			// video JS instance for current video
			this.curVideoJs = null;

			// data for current open video
			this.currentVideoData = {};

			// set video URL based on if we are on desktop or mobile
			this.videoPath = ML_vars.device === 'desktop' ? 'desktop-url' : 'mobile-url';

			// bind event eg. click
			this.bindEvents();

			this.queryParams = $.getQueryParameters();

			if(typeof oneGalleryVideo != 'undefined' && oneGalleryVideo && this.$currentVideo === null){
				$('.gallery-overlay').find('.close-video').hide();
			}

			// open video based on hash
			if(this.url.currentPath != '/' && this.url.currentPath){
				if(typeof oneGalleryVideo != 'undefined' && oneGalleryVideo && this.$currentVideo === null){
					this.$galleryNav.hide();
				}

				this.openVideoFromHash();
			} else {
				this.checkGalleryCount();
			}
		},

		checkGalleryCount: function(){
			var _this = this;

			if(typeof oneGalleryVideo != 'undefined' && oneGalleryVideo && _this.$currentVideo === null){
				// _this.$win.on('opened', function(){
				// 	_this.$galleryNav.hide();
				// });

				// console.log('only one video');
				_this.$galleryNav.hide();
				_this.openVideoInOverlay(_this.$galleryItems[0]);
				// When we have a single video, let's show
				// a loader and remove it when it's all done showing.
				// this.closeLoadingScreen();
			} else {
				this.$videoGallery.animate({
					opacity: 1
				});

				_this.closeLoadingScreen();
			}
		},

		bindEvents: function(){
			var _this = this;

			// $.address.change(function(event) {
			// 	// _this.url.currentPath = event.path;
			// 	// // check for #! to go straight work
			// 	// // this.checkUrl();
			// 	// console.log('addres change from $.address.change');

			// 	// if(_this.url.firstLoad){
			// 	// 	_this.url.firstLoad = false;
			// 	// } else {
			// 	// 	_this.checkUrl();
			// 	// }
			// 	// console.log(event);
			// });

			$.address.internalChange(function(event){
				_this.checkUrl(event);
			});

			$.address.externalChange(function(event){
				_this.checkUrl(event);
			});

			_this.$win.on('opened', function(){
				_this.closeLoadingScreen();
			});

			_this.$win.on('resize-done', function(){
				_this.setVideoHeight();
			});

			_this.$galleryItemVideos.on('click', function(e){
				e.preventDefault();

				_this.openVideoInOverlay($(this).closest('.gallery-item')[0]);
			});

			_this.$galleryItemVideoTitle.on('click', function(e){
				e.preventDefault();

				_this.openVideoInOverlay($(this).closest('.gallery-item')[0]);
			});

			_this.$overlayCloseBtn.on('click', function(e){
				e.preventDefault();

				_this.closeVideoInOverlay();
			});

			_this.$videoStartBtn.on('click', function(e){
				e.preventDefault();

				_this.playOverlayVideo();
			});

			_this.$galleryNavNext.on('click', function(e){
				e.preventDefault();

				_this.navigateGalleryOverlay('next');
			});

			_this.$galleryNavPrev.on('click', function(e){
				e.preventDefault();

				_this.navigateGalleryOverlay('prev');
			});

			_this.$overlayCategory

			// We are going to copy to clipboard instead of using
			// the default a functionality
			_this.$overlayShareLink.on('click', function(e){
				e.preventDefault();
			});
		},

		openVideoFromHash: function(){
			var $galleryItem = $('[data-deep-link="'+ $.address.pathNames()[0] +'"]');

			this.openVideoInOverlay($galleryItem[0]);
		},

		openVideoInOverlay: function(galleryItem){
			var _this = this,
				itemIndex = $(galleryItem).index();

			// if(itemIndex > 0){
			// 	_this.$galleryNavPrev.removeClass('disabled');
			// }

			// if(itemIndex < _this.$galleryItems.length){
			// 	_this.$galleryNavPrev.removeClass('disabled');
			// }

			_this.updateUrl($(galleryItem).attr('id'));

			_this.overlayOpen = true;
			// set class on body for open overlay
			// gives us a nice namespace in our css
			_this.$body.addClass('overlay-open');

			// get our current scroll position
			_this.curScrollPos = _this.$win.scrollTop();

			// populate the gallery overlay
			// with the right elements and copy
			_this.populateOverlay(galleryItem);

			_this.$videoGallery.animate({
				opacity: 0
			}, 500, function(){
				_this.$scrollElm.scrollTop(0);
				_this.$videoGallery.hide();
				// _this.$galleryOverlayTrans.animate({opacity: 0}, 200);

				_this.$galleryOverlay.fadeIn(function(){
					_this.$win.trigger('opened');
					_this.setVideoHeight();
					_this.showOverlayElements();
					_this.$videoStartBtn.addClass('animate');
				});
			});

			// this.$galleryOverlayTrans.delay(250).animate({opacity: 1}, 200);
		},

		closeVideoInOverlay: function(){
			var _this = this;

			// if here
			if(this.overlayVideoPlaying){
				// console.log('stop video and return to open state');
				stopAndCloseOverlayVideo();
				_this.curVideoJs.posterImage.show();
			} else {
				// console.log('close open item completely');
				closeWholeOverlay();
			}

			// if we are viewing a single video gallery, we want to
			// show the close X when the video is playing so the user
			// can exit playback. Then we hide it again when the user
			// closes the video
			if(typeof oneGalleryVideo !== 'undefined' && oneGalleryVideo){
				this.$overlayCloseBtn.delay(200).fadeOut();
			}

			this.$galleryOverlay.removeClass('play-video');

			function stopAndCloseOverlayVideo(){
				_this.curVideoJs.pause();

				_this.overlayVideoPlaying = false;
				_this.setVideoHeight();
			}

			function closeWholeOverlay(){
				_this.$body.removeClass('overlay-open');

				_this.currentVideoData = {};

				_this.$galleryOverlay.fadeOut(500, function(){
					// _this.$galleryOverlayTrans.animate({opacity: 0}, 200);
					_this.$videoGallery.show();
					_this.$scrollElm.scrollTop(_this.curScrollPos);

					_this.$videoGallery.animate({
						opacity: 1
					});
				});


				_this.overlayOpen = false;
				// this.$galleryOverlayTrans.delay(250).animate({opacity: 1}, 200);

				_this.$videoStartBtn.removeClass('animate');

				_this.resetOverlay();
				_this.resetUrl();
			}


		},

		populateOverlay: function(galleryItem){
			var $src = $('<source/>');

			// set the current video gallery element
			this.$currentVideo = $(galleryItem);

			// populate data object with data about
			// the current video element
			this.setUpCurrentVideoData();

			this.$overlayVideo = $('<video class="video-js vjs-default-skin" width="100%" height="100%"></video>');

			this.$overlayDescription.html(this.currentVideoData.description);
			this.$overlayTitle.html(this.currentVideoData.title);
			this.$overlayCategory.html(this.currentVideoData.category);
			this.$overlayShareLink.attr('data-clipboard-text', this.currentVideoData.shareLink);

			this.$overlayShareLink.attr('href', this.currentVideoData.shareLink);

			if(!this.currentVideoData.shareLink){
				this.$overlayShareLink.hide();
			} else {
				this.$overlayShareLink.show();
			}

			this.clipboard = new Clipboard('.copy-to-clipboard');

			this.clipboard.on('success', function(e) {
			    e.clearSelection();

			    showTooltip(e.trigger, 'Copied!');
			});

			this.clipboard.on('error', function(e) {
				window.open($(e.trigger).attr('href'),'_blank');
			});

			$src.attr('src', this.currentVideoData.videoUrl);
			$src.appendTo(this.$overlayVideo);

			this.$overlayVideo.attr('id', this.currentVideoData.videoId);
			this.$overlayVideo.attr('poster', this.currentVideoData.poster);

			this.$overlayVideo.appendTo(this.$galleryOverlayVideoWrap);

			this.initVideo();
		},

		setVideoHeight: function(){
			var copyHeight = this.$overlayCopy.outerHeight(),
				navHeight = this.$galleryNav.outerHeight(),
				winHeight = this.$win.outerHeight(),
				videoHeight = winHeight - (copyHeight + navHeight);

			if(ML_vars.device === 'mobile'){
				// Mobile Video Height
				this.$galleryOverlayVideoWrap.height(this.$win.innerHeight()/2);

			} else if(ML_vars.device === 'tablet'){
				// Tablet Video Height
				this.$galleryOverlayVideoWrap.height(this.$win.innerHeight()/2);

			} else {
				// Desktop Video Height
				if(this.overlayVideoPlaying){
					this.$galleryOverlayVideoWrap.height(winHeight);
				} else {
					this.$galleryOverlayVideoWrap.height(videoHeight);
				}
			}
		},

		resizePage: function(){

		},

		showOverlayElements: function(){
			this.$galleryNav.addClass('galleryFadeIn');
			this.$galleryOverlayItemWrap.addClass('galleryFadeIn');
		},

		hideOverlayElements: function(){
			this.$galleryNav.removeClass('galleryFadeIn');
			this.$galleryOverlayItemWrap.removeClass('galleryFadeIn');
		},

		dePopulateOverlay: function(){
			this.$overlayVideo.remove();
		},

		setUpCurrentVideoData: function(){
			this.currentVideoData.poster = this.$currentVideo.data('poster-url');
			this.currentVideoData.videoUrl = this.$currentVideo.data(this.videoPath);
			this.currentVideoData.videoId = this.$currentVideo.find('.video-placeholder').data('video-id');
			this.currentVideoData.title = this.$currentVideo.find('.title').html();
			this.currentVideoData.category = this.$currentVideo.find('.category').html();
			this.currentVideoData.galleryIndex = this.$currentVideo.data('item-index');
			this.currentVideoData.deepLink = this.$currentVideo.data('deep-link');
			this.currentVideoData.description = this.$currentVideo.find('.description').html();

			if(this.$currentVideo.find('.share-link').hasClass('no-share-link')){
				this.currentVideoData.shareLink = '';
			} else {
				this.currentVideoData.shareLink = window.location.href;
			}
		},

		initVideo: function(){
			// console.log('init video');
			var _this = this;

			videojs(_this.currentVideoData.videoId, {
				'controls': true
			}, function(){
				_this.curVideoJs = this;

				_this.$galleryOverlay.find('video').on('webkitendfullscreen', function(){
					if(ML_vars.device === 'mobile'){
						_this.curVideoJs.posterImage.show();
						_this.$scrollElm.scrollTop(0);
					}
				});

				_this.$galleryOverlay.find('video').on('webkitenterfullscreen', function(){
					// console.log('full screen enter');
				});
			});
		},

		playOverlayVideo: function(){
			this.overlayVideoPlaying = true;

			this.$overlayCloseBtn.fadeIn();
			this.$galleryOverlay.addClass('play-video');
			this.$galleryOverlayVideoWrap.css({height: this.$win.outerHeight()});
			this.curVideoJs.posterImage.hide();
			this.curVideoJs.play();
		},

		getNavigateGalleryOverlayDirection: function(videoToNavTo){
			var goToIndex = $('#' + videoToNavTo).index(),
				currentIndex = this.$currentVideo.index(),
				numItems = $('.gallery-item').length,
				dir = null;

			if((goToIndex > currentIndex && goToIndex+1 != numItems) || (goToIndex === 0 && currentIndex+1 === numItems)){
				dir = 'next';
			} else {
				dir = 'prev';
			}

			return dir;
		},

		navigateGalleryOverlay: function(dir){
			var _this = this, videoId, $galleryItemToShow;

			this.hideOverlayElements();

			if(dir === 'next'){
				// do next stuff
				if(this.currentVideoData.galleryIndex + 1 > this.numberOfGalleryItems){
					$galleryItemToShow = this.getGalleryItemByIndex(1);
				} else {
					$galleryItemToShow = this.getGalleryItemByIndex(this.currentVideoData.galleryIndex + 1);
				}
			} else {
				// do prev stuff
				if (this.currentVideoData.galleryIndex - 1 === 0) {
					$galleryItemToShow = this.getGalleryItemByIndex(this.numberOfGalleryItems);
				} else {
					$galleryItemToShow = this.getGalleryItemByIndex(this.currentVideoData.galleryIndex - 1);
				}
			}

			setTimeout(function(){
				if(_this.overlayVideoPlaying){
					_this.curVideoJs.pause();
					_this.overlayVideoPlaying = false;
				}
				// console.log('navigate overlay');
				_this.resetOverlay();

				// console.log(_this.curVideoJs);

				_this.populateOverlay($galleryItemToShow);
				_this.updateUrl(_this.currentVideoData.deepLink);

				_this.setVideoHeight();

				_this.showOverlayElements();
			}, 200);
		},

		getGalleryItemByIndex: function(index){
			return $('.gallery-item[data-item-index="'+ index +'"]');
		},

		resetOverlay: function(){
			var _this = this;

			_this.clipboard.destroy();
			_this.curVideoJs.pause();
			_this.curVideoJs.dispose();

			_this.$galleryOverlay.removeClass('play-video');
		},

		openLoadingScreen: function(){
			$('#gallery-loader').fadeIn();
		},

		closeLoadingScreen: function(){
			$('#gallery-loader').fadeOut();
		},

		checkUrl: function(evt){
			var _this = this,
				dir;

			if(evt.path === '/'){
				if(evt.type === 'internalChange'){
					// console.log('from app to close item');
				} else {
					if(!this.url.firstLoad){
						this.closeVideoInOverlay();
					}
					// console.log('from browser to close item');
				}
			} else {
				if(evt.type === 'internalChange'){
					if(this.overlayOpen){
						// console.log('from app, overlay nav');
					} else {
						// console.log('from app, to OPEN item');
					}
				} else {
					if(this.overlayOpen){
						if(this.url.firstLoad){
							// console.log('from browser, open item on load');
						} else {
							dir = this.getNavigateGalleryOverlayDirection(evt.path.slice(1));
							this.navigateGalleryOverlay(dir);
							// console.log('from browser, overlay nav', dir);
						}
					} else {
						this.openVideoFromHash();
						// console.log('from browser, to OPEN item');
					}
				}
			}

			this.url.firstLoad = false;

			// if(evt.path === '/'){
			// 	if(this.overlayOpen){
			// 		this.closeVideoInOverlay();
			// 	}

			// 	console.log('back to main gal CHECKURL func', this.overlayOpen);
			// } else {
			// 	if(!this.overlayOpen){
			// 		this.openVideoInOverlay($('#' + evt.path.slice(1)));
			// 	} else {
			// 		this.openVideoInOverlay($('#' + evt.path.slice(1)));
			// 	}

			// 	console.log('open item from CHECKURL func', this.overlayOpen);
			// }
		},

		updateUrl: function(deepLink){
			$.address.value(deepLink);
		},

		resetUrl: function(){
			$.address.value('/');
		},
	}

	// Doc Ready
	$(function(){
		ml.VideoGallery.init();
	});
})(jQuery);
