!function(t){var e={};function n(i){if(e[i])return e[i].exports;var r=e[i]={i:i,l:!1,exports:{}};return t[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(i,r,function(e){return t[e]}.bind(null,r));return i},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=22)}([function(t,e){t.exports=Vue},function(t,e){function n(e){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?t.exports=n=function(t){return typeof t}:t.exports=n=function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},n(e)}t.exports=n},function(t,e,n){},function(t,e,n){},function(t,e,n){t.exports=n.p+"images/ic-gender-male.7168395.png"},function(t,e,n){t.exports=n.p+"images/ic-gender-female.3233280.png"},function(t,e){t.exports=axios},function(t,e,n){"use strict";function i(){return(i=Object.assign||function(t){for(var e,n=1;n<arguments.length;n++)for(var i in e=arguments[n])Object.prototype.hasOwnProperty.call(e,i)&&(t[i]=e[i]);return t}).apply(this,arguments)}var r=["attrs","props","domProps"],a=["class","style","directives"],o=["on","nativeOn"],s=function(t,e){return function(){t&&t.apply(this,arguments),e&&e.apply(this,arguments)}};t.exports=function(t){return t.reduce((function(t,e){for(var n in e)if(t[n])if(-1!==r.indexOf(n))t[n]=i({},t[n],e[n]);else if(-1!==a.indexOf(n)){var c=t[n]instanceof Array?t[n]:[t[n]],l=e[n]instanceof Array?e[n]:[e[n]];t[n]=c.concat(l)}else if(-1!==o.indexOf(n))for(var d in e[n])if(t[n][d]){var u=t[n][d]instanceof Array?t[n][d]:[t[n][d]],f=e[n][d]instanceof Array?e[n][d]:[e[n][d]];t[n][d]=u.concat(f)}else t[n][d]=e[n][d];else if("hook"==n)for(var p in e[n])t[n][p]=t[n][p]?s(t[n][p],e[n][p]):e[n][p];else t[n]=e[n];else t[n]=e[n];return t}),{})}},function(t,e,n){},function(t,e,n){},function(t,e,n){},function(t,e,n){t.exports=n.p+"images/banner.e202bde.png"},function(t,e,n){t.exports=n.p+"images/default.02359de.png"},function(t,e,n){t.exports=n.p+"images/obj.33b571f.png"},function(t,e,n){t.exports=n.p+"images/img-title.610cfb5.png"},function(t,e,n){t.exports=n.p+"images/img-1.391102d.png"},function(t,e,n){t.exports=n.p+"images/img-2.076ef33.png"},function(t,e,n){t.exports=n.p+"images/logo.8589e1a.png"},function(t,e,n){"use strict";var i=n(2);n.n(i).a},function(t,e,n){"use strict";var i=n(3);n.n(i).a},function(t,e){!function(t,e){var n,i=t.document,r=i.documentElement,a=i.querySelector('meta[name="viewport"]'),o=i.querySelector('meta[name="flexible"]'),s=0,c=0,l=e.flexible||(e.flexible={});if(a){console.warn("将根据已有的meta标签来设置缩放比例");var d=a.getAttribute("content").match(/initial\-scale=([\d\.]+)/);d&&(c=parseFloat(d[1]),s=parseInt(1/c))}else if(o){var u=o.getAttribute("content");if(u){var f=u.match(/initial\-dpr=([\d\.]+)/),p=u.match(/maximum\-dpr=([\d\.]+)/);f&&(s=parseFloat(f[1]),c=parseFloat((1/s).toFixed(2))),p&&(s=parseFloat(p[1]),c=parseFloat((1/s).toFixed(2)))}}if(!s&&!c){t.navigator.appVersion.match(/android/gi);var h=t.navigator.appVersion.match(/iphone/gi),v=t.devicePixelRatio;c=1/(s=h?v>=3&&(!s||s>=3)?3:v>=2&&(!s||s>=2)?2:1:1)}if(r.setAttribute("data-dpr",s),!a)if((a=i.createElement("meta")).setAttribute("name","viewport"),a.setAttribute("content","initial-scale="+c+", maximum-scale="+c+", minimum-scale="+c+", user-scalable=no"),r.firstElementChild)r.firstElementChild.appendChild(a);else{var g=i.createElement("div");g.appendChild(a),i.write(g.innerHTML)}function m(){var e=r.getBoundingClientRect().width;e/s>540&&(e=540*s);var n=e/10;r.style.fontSize=n+"px",l.rem=t.rem=n}t.addEventListener("resize",(function(){clearTimeout(n),n=setTimeout(m,300)}),!1),t.addEventListener("pageshow",(function(t){t.persisted&&(clearTimeout(n),n=setTimeout(m,300))}),!1),"complete"===i.readyState?i.body.style.fontSize=12*s+"px":i.addEventListener("DOMContentLoaded",(function(t){i.body.style.fontSize=12*s+"px"}),!1),m(),l.dpr=t.dpr=s,l.refreshRem=m,l.rem2px=function(t){var e=parseFloat(t)*this.rem;return"string"==typeof t&&t.match(/rem$/)&&(e+="px"),e},l.px2rem=function(t){var e=parseFloat(t)/this.rem;return"string"==typeof t&&t.match(/px$/)&&(e+="rem"),e}}(window,window.lib||(window.lib={}))},function(t,e,n){},function(t,e,n){"use strict";n.r(e);n(8),n(9),n(10);function i(t,e,n){return e?t+n+e:t}function r(t,e){if("string"==typeof e)return i(t,e,"--");if(Array.isArray(e))return e.map((function(e){return r(t,e)}));var n={};return e&&Object.keys(e).forEach((function(i){n[t+"--"+i]=e[i]})),n}function a(t){return function(e,n){return e&&"string"!=typeof e&&(n=e,e=""),e=i(t,e,"__"),n?[e,r(e,n)]:e}}var o=n(0),s=n.n(o),c=s.a.prototype.$isServer;function l(t){return null!=t}function d(t){return"function"==typeof t}function u(t,e){var n=e.split("."),i=t;return n.forEach((function(t){i=l(i[t])?i[t]:""})),i}var f=/-(\w)/g;function p(t){return t.replace(f,(function(t,e){return e.toUpperCase()}))}var h=s.a.extend({methods:{slots:function(t,e){void 0===t&&(t="default");var n=this.$slots,i=this.$scopedSlots[t];return i?i(e):n[t]}}});function v(t){var e=this.name;t.component(e,this),t.component(p("-"+e),this)}function g(t){return{functional:!0,props:t.props,model:t.model,render:function(e,n){return t(e,n.props,function(t){var e=t.scopedSlots||t.data.scopedSlots||{},n=t.slots();return Object.keys(n).forEach((function(t){e[t]||(e[t]=function(){return n[t]})})),e}(n),n)}}}function m(t){return function(e){return d(e)&&(e=g(e)),e.functional||(e.mixins=e.mixins||[],e.mixins.push(h)),e.name=t,e.install=v,e}}Object.prototype.hasOwnProperty;var x=s.a.prototype,y=s.a.util.defineReactive;y(x,"$vantLang","zh-CN"),y(x,"$vantMessages",{"zh-CN":{name:"姓名",tel:"电话",save:"保存",confirm:"确认",cancel:"取消",delete:"删除",complete:"完成",loading:"加载中...",telEmpty:"请填写电话",nameEmpty:"请填写姓名",nameInvalid:"请输入正确的姓名",confirmDelete:"确定要删除吗",telInvalid:"请输入正确的手机号",vanCalendar:{end:"结束",start:"开始",title:"日期选择",confirm:"确定",weekdays:["日","一","二","三","四","五","六"],monthTitle:function(t,e){return t+"年"+e+"月"},rangePrompt:function(t){return"选择天数不能超过 "+t+" 天"}},vanContactCard:{addText:"添加联系人"},vanContactList:{addText:"新建联系人"},vanPagination:{prev:"上一页",next:"下一页"},vanPullRefresh:{pulling:"下拉即可刷新...",loosing:"释放即可刷新..."},vanSubmitBar:{label:"合计："},vanCoupon:{unlimited:"无使用门槛",discount:function(t){return t+"折"},condition:function(t){return"满"+t+"元可用"}},vanCouponCell:{title:"优惠券",tips:"暂无可用",count:function(t){return t+"张可用"}},vanCouponList:{empty:"暂无优惠券",exchange:"兑换",close:"不使用优惠券",enable:"可用",disabled:"不可用",placeholder:"请输入优惠码"},vanAddressEdit:{area:"地区",postal:"邮政编码",areaEmpty:"请选择地区",addressEmpty:"请填写详细地址",postalEmpty:"邮政编码格式不正确",defaultAddress:"设为默认收货地址",telPlaceholder:"收货人手机号",namePlaceholder:"收货人姓名",areaPlaceholder:"选择省 / 市 / 区"},vanAddressEditDetail:{label:"详细地址",placeholder:"街道门牌、楼层房间号等信息"},vanAddressList:{add:"新增地址"}}});var b=function(){return x.$vantMessages[x.$vantLang]};function _(t){var e=p(t)+".";return function(t){for(var n=b(),i=u(n,e+t)||u(n,t),r=arguments.length,a=new Array(r>1?r-1:0),o=1;o<r;o++)a[o-1]=arguments[o];return d(i)?i.apply(void 0,a):i}}function w(t){return[m(t="van-"+t),a(t),_(t)]}var C=/scroll|auto/i;var k=!1;if(!c)try{var S={};Object.defineProperty(S,"passive",{get:function(){k=!0}}),window.addEventListener("test-passive",null,S)}catch(t){}function O(t,e,n,i){void 0===i&&(i=!1),c||t.addEventListener(e,n,!!k&&{capture:!1,passive:i})}function E(t,e,n){c||t.removeEventListener(e,n)}var P=n(7),$=n.n(P);function T(t){if(l(t))return t=String(t),/^\d+(\.\d+)?$/.test(t)?t+"px":t}function j(){return(j=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var i in n)Object.prototype.hasOwnProperty.call(n,i)&&(t[i]=n[i])}return t}).apply(this,arguments)}var L=["ref","style","class","attrs","nativeOn","directives","staticClass","staticStyle"],A={nativeOn:"on"};var M=w("loading"),z=M[0],B=M[1];function N(t,e){if("spinner"===e.type){for(var n=[],i=0;i<12;i++)n.push(t("i"));return n}return t("svg",{class:B("circular"),attrs:{viewBox:"25 25 50 50"}},[t("circle",{attrs:{cx:"50",cy:"50",r:"20",fill:"none"}})])}function R(t,e,n){if(n.default){var i=e.textSize&&{fontSize:T(e.textSize)};return t("span",{class:B("text"),style:i},[n.default()])}}function q(t,e,n,i){var r,a,o,s=e.color,c=e.size,l=e.type,d={color:s};if(c){var u=T(c);d.width=u,d.height=u}return t("div",$()([{class:B([l,{vertical:e.vertical}])},(r=i,a=!0,o=L.reduce((function(t,e){return r.data[e]&&(t[A[e]||e]=r.data[e]),t}),{}),a&&(o.on=o.on||{},j(o.on,r.data.on)),o)]),[t("span",{class:B("spinner",l),style:d},[N(t,e)]),R(t,e,n)])}q.props={color:String,size:[Number,String],vertical:Boolean,textSize:[Number,String],type:{type:String,default:"circular"}};var F=z(q),U=w("list"),D=U[0],H=U[1],V=U[2],I=D({mixins:[function(t){function e(){this.binded||(t.call(this,O,!0),this.binded=!0)}function n(){this.binded&&(t.call(this,E,!1),this.binded=!1)}return{mounted:e,activated:e,deactivated:n,beforeDestroy:n}}((function(t){this.scroller||(this.scroller=function(t,e){void 0===e&&(e=window);for(var n=t;n&&"HTML"!==n.tagName&&1===n.nodeType&&n!==e;){var i=window.getComputedStyle(n).overflowY;if(C.test(i)){if("BODY"!==n.tagName)return n;var r=window.getComputedStyle(n.parentNode).overflowY;if(C.test(r))return n}n=n.parentNode}return e}(this.$el)),t(this.scroller,"scroll",this.check)}))],model:{prop:"loading"},props:{error:Boolean,loading:Boolean,finished:Boolean,errorText:String,loadingText:String,finishedText:String,immediateCheck:{type:Boolean,default:!0},offset:{type:[Number,String],default:300},direction:{type:String,default:"down"}},data:function(){return{innerLoading:this.loading}},updated:function(){this.innerLoading=this.loading},mounted:function(){this.immediateCheck&&this.check()},watch:{loading:"check",finished:"check"},methods:{check:function(){var t=this;this.$nextTick((function(){if(!(t.innerLoading||t.finished||t.error)){var e,n=t.$el,i=t.scroller,r=t.offset,a=t.direction;if(!((e=i.getBoundingClientRect?i.getBoundingClientRect():{top:0,bottom:i.innerHeight}).bottom-e.top)||function(t){var e=window.getComputedStyle(t),n="none"===e.display,i=null===t.offsetParent&&"fixed"!==e.position;return n||i}(n))return!1;var o=t.$refs.placeholder.getBoundingClientRect();("up"===a?e.top-o.top<=r:o.bottom-e.bottom<=r)&&(t.innerLoading=!0,t.$emit("input",!0),t.$emit("load"))}}))},clickErrorText:function(){this.$emit("update:error",!1),this.check()},genLoading:function(){var t=this.$createElement;if(this.innerLoading&&!this.finished)return t("div",{class:H("loading"),key:"loading"},[this.slots("loading")||t(F,{attrs:{size:"16"}},[this.loadingText||V("loading")])])},genFinishedText:function(){var t=this.$createElement;if(this.finished){var e=this.slots("finished")||this.finishedText;if(e)return t("div",{class:H("finished-text")},[e])}},genErrorText:function(){var t=this.$createElement;if(this.error){var e=this.slots("error")||this.errorText;if(e)return t("div",{on:{click:this.clickErrorText},class:H("error-text")},[e])}}},render:function(){var t=arguments[0],e=t("div",{ref:"placeholder",class:H("placeholder")});return t("div",{class:H(),attrs:{role:"feed","aria-busy":this.innerLoading}},["down"===this.direction?this.slots():e,this.genLoading(),this.genFinishedText(),this.genErrorText(),"up"===this.direction?this.slots():e])}}),J=[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"title"},[e("img",{attrs:{src:n(14),alt:""}})])},function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"left-fixed"},[e("img",{attrs:{src:n(15),alt:""}})])},function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"right-fixed"},[e("img",{attrs:{src:n(16),alt:""}})])}],K=n(6),W=n.n(K).a.create({timeout:2e4});W.interceptors.request.use((function(t){return t}),(function(t){return Promise.reject(t)})),W.interceptors.response.use((function(t){return t.data&&t.data.code,t.data}),(function(t){return Promise.reject(t)}));var X=W;function Y(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};return X.get("/home/dating/rank",{params:t})}var Q=n(1),G=n.n(Q);function Z(){var t=navigator.userAgent;return{trident:t.indexOf("Trident")>-1,presto:t.indexOf("Presto")>-1,webKit:t.indexOf("AppleWebKit")>-1,gecko:t.indexOf("Gecko")>-1&&-1==t.indexOf("KHTML"),mobile:!!t.match(/AppleWebKit.*Mobile.*/),ios:!!t.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),android:t.indexOf("Android")>-1||t.indexOf("Adr")>-1,iPhone:t.indexOf("iPhone")>-1,iPad:t.indexOf("iPad")>-1,webApp:-1==t.indexOf("Safari"),weixin:t.indexOf("MicroMessenger")>-1,qq:" qq"==t.match(/\sQQ/i),app:"mengshengApp"==t.match("mengshengApp")}}var tt=new s.a,et="57c0fa5c5dd1abfde1420ce1d514fef7";var nt={name:"DownloadBar",props:{position:{type:String,default:"top",validator:function(t){return-1!==["top","bottom"].indexOf(t)}}},data:function(){return{isDownload:!1}},mounted:function(){this.init(),tt.$on("i-got-clicked",this.clickHandler)},methods:{init:function(){Z().app||(this.isDownload=!0,this.linkedme())},linkedme:function(t){function e(){return t.apply(this,arguments)}return e.toString=function(){return t.toString()},e}((function(){(function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return new Promise((function(n,i){var r={promotion_name:"",type:"live",channel:t,tags:e};linkedme.init(et,{type:"live"},null),linkedme.link(r,(function(t,e){t?(i(t),console.log("err:",t)):n(e)}),!1)}))})("award","award").then((function(t){if(t.url){var e=document.getElementById("open_header");e.addEventListener("click",(function(){linkedme.trigger_deeplink(t.url)})),e.setAttribute("href",t.url)}}))})),clickHandler:function(t){console.log("Oh, that's nice. It's gotten ".concat(t," clicks! :)")),10===t&&tt.$off("i-got-clicked")}}};n(18);function it(t,e,n,i,r,a,o,s){var c,l="function"==typeof t?t.options:t;if(e&&(l.render=e,l.staticRenderFns=n,l._compiled=!0),i&&(l.functional=!0),a&&(l._scopeId="data-v-"+a),o?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),r&&r.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(o)},l._ssrRegister=c):r&&(c=s?function(){r.call(this,this.$root.$options.shadowRoot)}:r),c)if(l.functional){l._injectStyles=c;var d=l.render;l.render=function(t,e){return c.call(e),d(t,e)}}else{var u=l.beforeCreate;l.beforeCreate=u?[].concat(u,c):[c]}return{exports:t,options:l}}it(nt,(function(){var t=this.$createElement,e=this._self._c||t;return this.isDownload?e("div",{staticClass:"downloadbar-box"},[e("div",{staticClass:"downloadbar flex",class:[this.position]},[e("div",{staticClass:"downloadbar-bd flex"},[e("img",{staticClass:"logo",attrs:{src:n(17),alt:"",width:"40",height:"40"}}),this._v(" "),e("div",{staticClass:"descr"},[this._t("default")],2)]),this._v(" "),this._m(0)])]):this._e()}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"downloadbar-ft"},[e("a",{staticClass:"btn",attrs:{id:"open_header",href:""}},[this._v("打开")])])}],!1,null,null,null).exports;var rt={name:"datingRank",data:function(){return{clickCount:0,maxPage:2,query:{pageNum:1,pageSize:10},loading:!1,finished:!1,list:[]}},mounted:function(){this.init()},filters:{toTenThousand:function(t){var e=String(t);return e.length>=8?"999W+":7==e.length?e.slice(0,3)+"."+e.slice(3,5)+"W":t}},methods:{init:function(){this.getData()},bus:function(){this.clickCount++,tt.$emit("i-got-clicked",this.clickCount)},handlePersonPage:function(t){!function(t){var e=Z();e.app&&(e.ios&&window.webkit.messageHandlers.openPersonPage.postMessage(t),e.android&&androidJsObj&&"object"===("undefined"==typeof androidJsObj?"undefined":G()(androidJsObj))&&window.androidJsObj.openPersonPage(t))}(t)},getData:function(){var t=this;Y(this.query).then((function(e){if(200===e.code){var n=e.data;n.length&&(t.list=n)}}))},onLoad:function(){var t=this;this.query.pageNum++,this.query.pageNum>this.maxPage?this.finished=!0:Y(this.query).then((function(e){if(200===e.code){t.loading=!1;var n=e.data;if(n.length)for(var i=0;i<n.length;i++)t.list.push(n[i]);else t.finished=!0}}))}}},at=(n(19),it(rt,(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"page"},[i("div",{staticClass:"page-hd"},[i("img",{attrs:{src:n(11),alt:""},on:{click:t.bus}}),t._v(" "),t._m(0)]),t._v(" "),i("div",{staticClass:"page-bd"},[i("div",{staticClass:"container"},[t._m(1),t._v(" "),t._m(2),t._v(" "),t.list.length?t._e():i("div",{staticClass:"default text-center"},[i("img",{attrs:{src:n(12),alt:"",width:"118",height:"118"}}),t._v(" "),i("p",[t._v("空空如也")])]),t._v(" "),t.list.length>1?i("div",{staticClass:"heart text-center"},t._l(6,(function(t){return i("svg",{staticStyle:{width:"16px",height:"16px"},attrs:{id:"heart",viewBox:"0 0 100 100"}},[i("path",{attrs:{d:"M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71z"}})])})),0):t._e(),t._v(" "),t.list.length>1?i("van-list",{attrs:{finished:t.finished,offset:10,"immediate-check":!1},on:{load:t.onLoad},model:{value:t.loading,callback:function(e){t.loading=e},expression:"loading"}},[i("ul",{staticClass:"list"},t._l(t.list,(function(e,r){return i("li",{key:r,staticClass:"item"},[i("div",{staticClass:"box flex j-c-c a-i-c",style:{backgroundImage:"url("+e.backgroudUrl+")"}},[i("div",{staticClass:"hd"},[i("div",{staticClass:"text-center"},[i("div",{staticClass:"header",on:{click:function(n){return t.handlePersonPage(e.user.uid)}}},[e.user.userHeadwear?[i("div",{staticClass:"header-wear",style:{backgroundImage:"url("+e.user.userHeadwear.pic+")"}})]:t._e(),t._v(" "),i("img",{staticClass:"avatar",attrs:{src:e.user.avatar,alt:""}})],2),t._v(" "),i("div",{staticClass:"user-info flex j-c-c a-i-c"},[i("div",{staticClass:"nick text-ellipsis"},[t._v("\n                      "+t._s(e.user.nick)+"\n                    ")]),t._v(" "),1==e.user.gender?[i("img",{attrs:{src:n(4),alt:"",width:"12",height:"12"}})]:[i("img",{attrs:{src:n(5),alt:"",width:"12",height:"12"}})]],2)])]),t._v(" "),i("div",{staticClass:"bd text-center"},[i("img",{attrs:{src:n(13),alt:"",width:"74",height:"27"}}),t._v(" "),i("div",{staticClass:"love-value"},[i("span",{attrs:{"data-value":e.loveValue}},[t._v(t._s(t._f("toTenThousand")(e.loveValue)))])])]),t._v(" "),i("div",{staticClass:"ft"},[i("div",{staticClass:"text-center"},[i("div",{staticClass:"header",on:{click:function(n){return t.handlePersonPage(e.loverUser.uid)}}},[e.loverUser.userHeadwear?[i("div",{staticClass:"header-wear",style:{backgroundImage:"url("+e.loverUser.userHeadwear.pic+")"}})]:t._e(),t._v(" "),i("img",{staticClass:"avatar",attrs:{src:e.loverUser.avatar,alt:""}})],2),t._v(" "),i("div",{staticClass:"user-info flex j-c-c a-i-c"},[i("div",{staticClass:"nick text-ellipsis"},[t._v("\n                      "+t._s(e.loverUser.nick)+"\n                    ")]),t._v(" "),1==e.loverUser.gender?[i("img",{attrs:{src:n(4),alt:"",width:"12",height:"12"}})]:[i("img",{attrs:{src:n(5),alt:"",width:"12",height:"12"}})]],2)])])])])})),0)]):t._e()],1)])])}),J,!1,null,null,null).exports);n(20),n(21);if("beta"==(window.location.href.match(/beta|localhost|192.168./)?"beta":"official"))try{new VConsole}catch(t){console.log(t)}Vue.use(I),new Vue({render:function(t){return t(at)}}).$mount("#root")}]);