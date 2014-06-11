cursor_x=0;
cursor_y=0;




/*!
 * jQuery JavaScript Library v1.6.1
 * http://jquery.com/
 *
 * Copyright 2011, John Resig
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * Includes Sizzle.js
 * http://sizzlejs.com/
 * Copyright 2011, The Dojo Foundation
 * Released under the MIT, BSD, and GPL Licenses.
 *
 * Date: Thu May 12 15:04:36 2011 -0400
 */
(function(a,b){function cy(a){return f.isWindow(a)?a:a.nodeType===9?a.defaultView||a.parentWindow:!1}function cv(a){if(!cj[a]){var b=f("<"+a+">").appendTo("body"),d=b.css("display");b.remove();if(d==="none"||d===""){ck||(ck=c.createElement("iframe"),ck.frameBorder=ck.width=ck.height=0),c.body.appendChild(ck);if(!cl||!ck.createElement)cl=(ck.contentWindow||ck.contentDocument).document,cl.write("<!doctype><html><body></body></html>");b=cl.createElement(a),cl.body.appendChild(b),d=f.css(b,"display"),c.body.removeChild(ck)}cj[a]=d}return cj[a]}function cu(a,b){var c={};f.each(cp.concat.apply([],cp.slice(0,b)),function(){c[this]=a});return c}function ct(){cq=b}function cs(){setTimeout(ct,0);return cq=f.now()}function ci(){try{return new a.ActiveXObject("Microsoft.XMLHTTP")}catch(b){}}function ch(){try{return new a.XMLHttpRequest}catch(b){}}function cb(a,c){a.dataFilter&&(c=a.dataFilter(c,a.dataType));var d=a.dataTypes,e={},g,h,i=d.length,j,k=d[0],l,m,n,o,p;for(g=1;g<i;g++){if(g===1)for(h in a.converters)typeof h=="string"&&(e[h.toLowerCase()]=a.converters[h]);l=k,k=d[g];if(k==="*")k=l;else if(l!=="*"&&l!==k){m=l+" "+k,n=e[m]||e["* "+k];if(!n){p=b;for(o in e){j=o.split(" ");if(j[0]===l||j[0]==="*"){p=e[j[1]+" "+k];if(p){o=e[o],o===!0?n=p:p===!0&&(n=o);break}}}}!n&&!p&&f.error("No conversion from "+m.replace(" "," to ")),n!==!0&&(c=n?n(c):p(o(c)))}}return c}function ca(a,c,d){var e=a.contents,f=a.dataTypes,g=a.responseFields,h,i,j,k;for(i in g)i in d&&(c[g[i]]=d[i]);while(f[0]==="*")f.shift(),h===b&&(h=a.mimeType||c.getResponseHeader("content-type"));if(h)for(i in e)if(e[i]&&e[i].test(h)){f.unshift(i);break}if(f[0]in d)j=f[0];else{for(i in d){if(!f[0]||a.converters[i+" "+f[0]]){j=i;break}k||(k=i)}j=j||k}if(j){j!==f[0]&&f.unshift(j);return d[j]}}function b_(a,b,c,d){if(f.isArray(b))f.each(b,function(b,e){c||bF.test(a)?d(a,e):b_(a+"["+(typeof e=="object"||f.isArray(e)?b:"")+"]",e,c,d)});else if(!c&&b!=null&&typeof b=="object")for(var e in b)b_(a+"["+e+"]",b[e],c,d);else d(a,b)}function b$(a,c,d,e,f,g){f=f||c.dataTypes[0],g=g||{},g[f]=!0;var h=a[f],i=0,j=h?h.length:0,k=a===bU,l;for(;i<j&&(k||!l);i++)l=h[i](c,d,e),typeof l=="string"&&(!k||g[l]?l=b:(c.dataTypes.unshift(l),l=b$(a,c,d,e,l,g)));(k||!l)&&!g["*"]&&(l=b$(a,c,d,e,"*",g));return l}function bZ(a){return function(b,c){typeof b!="string"&&(c=b,b="*");if(f.isFunction(c)){var d=b.toLowerCase().split(bQ),e=0,g=d.length,h,i,j;for(;e<g;e++)h=d[e],j=/^\+/.test(h),j&&(h=h.substr(1)||"*"),i=a[h]=a[h]||[],i[j?"unshift":"push"](c)}}}function bD(a,b,c){var d=b==="width"?bx:by,e=b==="width"?a.offsetWidth:a.offsetHeight;if(c==="border")return e;f.each(d,function(){c||(e-=parseFloat(f.css(a,"padding"+this))||0),c==="margin"?e+=parseFloat(f.css(a,"margin"+this))||0:e-=parseFloat(f.css(a,"border"+this+"Width"))||0});return e}function bn(a,b){b.src?f.ajax({url:b.src,async:!1,dataType:"script"}):f.globalEval((b.text||b.textContent||b.innerHTML||"").replace(bf,"/*$0*/")),b.parentNode&&b.parentNode.removeChild(b)}function bm(a){f.nodeName(a,"input")?bl(a):a.getElementsByTagName&&f.grep(a.getElementsByTagName("input"),bl)}function bl(a){if(a.type==="checkbox"||a.type==="radio")a.defaultChecked=a.checked}function bk(a){return"getElementsByTagName"in a?a.getElementsByTagName("*"):"querySelectorAll"in a?a.querySelectorAll("*"):[]}function bj(a,b){var c;if(b.nodeType===1){b.clearAttributes&&b.clearAttributes(),b.mergeAttributes&&b.mergeAttributes(a),c=b.nodeName.toLowerCase();if(c==="object")b.outerHTML=a.outerHTML;else if(c!=="input"||a.type!=="checkbox"&&a.type!=="radio"){if(c==="option")b.selected=a.defaultSelected;else if(c==="input"||c==="textarea")b.defaultValue=a.defaultValue}else a.checked&&(b.defaultChecked=b.checked=a.checked),b.value!==a.value&&(b.value=a.value);b.removeAttribute(f.expando)}}function bi(a,b){if(b.nodeType===1&&!!f.hasData(a)){var c=f.expando,d=f.data(a),e=f.data(b,d);if(d=d[c]){var g=d.events;e=e[c]=f.extend({},d);if(g){delete e.handle,e.events={};for(var h in g)for(var i=0,j=g[h].length;i<j;i++)f.event.add(b,h+(g[h][i].namespace?".":"")+g[h][i].namespace,g[h][i],g[h][i].data)}}}}function bh(a,b){return f.nodeName(a,"table")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function X(a,b,c){b=b||0;if(f.isFunction(b))return f.grep(a,function(a,d){var e=!!b.call(a,d,a);return e===c});if(b.nodeType)return f.grep(a,function(a,d){return a===b===c});if(typeof b=="string"){var d=f.grep(a,function(a){return a.nodeType===1});if(S.test(b))return f.filter(b,d,!c);b=f.filter(b,d)}return f.grep(a,function(a,d){return f.inArray(a,b)>=0===c})}function W(a){return!a||!a.parentNode||a.parentNode.nodeType===11}function O(a,b){return(a&&a!=="*"?a+".":"")+b.replace(A,"`").replace(B,"&")}function N(a){var b,c,d,e,g,h,i,j,k,l,m,n,o,p=[],q=[],r=f._data(this,"events");if(!(a.liveFired===this||!r||!r.live||a.target.disabled||a.button&&a.type==="click")){a.namespace&&(n=new RegExp("(^|\\.)"+a.namespace.split(".").join("\\.(?:.*\\.)?")+"(\\.|$)")),a.liveFired=this;var s=r.live.slice(0);for(i=0;i<s.length;i++)g=s[i],g.origType.replace(y,"")===a.type?q.push(g.selector):s.splice(i--,1);e=f(a.target).closest(q,a.currentTarget);for(j=0,k=e.length;j<k;j++){m=e[j];for(i=0;i<s.length;i++){g=s[i];if(m.selector===g.selector&&(!n||n.test(g.namespace))&&!m.elem.disabled){h=m.elem,d=null;if(g.preType==="mouseenter"||g.preType==="mouseleave")a.type=g.preType,d=f(a.relatedTarget).closest(g.selector)[0],d&&f.contains(h,d)&&(d=h);(!d||d!==h)&&p.push({elem:h,handleObj:g,level:m.level})}}}for(j=0,k=p.length;j<k;j++){e=p[j];if(c&&e.level>c)break;a.currentTarget=e.elem,a.data=e.handleObj.data,a.handleObj=e.handleObj,o=e.handleObj.origHandler.apply(e.elem,arguments);if(o===!1||a.isPropagationStopped()){c=e.level,o===!1&&(b=!1);if(a.isImmediatePropagationStopped())break}}return b}}function L(a,c,d){var e=f.extend({},d[0]);e.type=a,e.originalEvent={},e.liveFired=b,f.event.handle.call(c,e),e.isDefaultPrevented()&&d[0].preventDefault()}function F(){return!0}function E(){return!1}function m(a,c,d){var e=c+"defer",g=c+"queue",h=c+"mark",i=f.data(a,e,b,!0);i&&(d==="queue"||!f.data(a,g,b,!0))&&(d==="mark"||!f.data(a,h,b,!0))&&setTimeout(function(){!f.data(a,g,b,!0)&&!f.data(a,h,b,!0)&&(f.removeData(a,e,!0),i.resolve())},0)}function l(a){for(var b in a)if(b!=="toJSON")return!1;return!0}function k(a,c,d){if(d===b&&a.nodeType===1){var e="data-"+c.replace(j,"$1-$2").toLowerCase();d=a.getAttribute(e);if(typeof d=="string"){try{d=d==="true"?!0:d==="false"?!1:d==="null"?null:f.isNaN(d)?i.test(d)?f.parseJSON(d):d:parseFloat(d)}catch(g){}f.data(a,c,d)}else d=b}return d}var c=a.document,d=a.navigator,e=a.location,f=function(){function H(){if(!e.isReady){try{c.documentElement.doScroll("left")}catch(a){setTimeout(H,1);return}e.ready()}}var e=function(a,b){return new e.fn.init(a,b,h)},f=a.jQuery,g=a.$,h,i=/^(?:[^<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,j=/\S/,k=/^\s+/,l=/\s+$/,m=/\d/,n=/^<(\w+)\s*\/?>(?:<\/\1>)?$/,o=/^[\],:{}\s]*$/,p=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,q=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,r=/(?:^|:|,)(?:\s*\[)+/g,s=/(webkit)[ \/]([\w.]+)/,t=/(opera)(?:.*version)?[ \/]([\w.]+)/,u=/(msie) ([\w.]+)/,v=/(mozilla)(?:.*? rv:([\w.]+))?/,w=d.userAgent,x,y,z,A=Object.prototype.toString,B=Object.prototype.hasOwnProperty,C=Array.prototype.push,D=Array.prototype.slice,E=String.prototype.trim,F=Array.prototype.indexOf,G={};e.fn=e.prototype={constructor:e,init:function(a,d,f){var g,h,j,k;if(!a)return this;if(a.nodeType){this.context=this[0]=a,this.length=1;return this}if(a==="body"&&!d&&c.body){this.context=c,this[0]=c.body,this.selector=a,this.length=1;return this}if(typeof a=="string"){a.charAt(0)!=="<"||a.charAt(a.length-1)!==">"||a.length<3?g=i.exec(a):g=[null,a,null];if(g&&(g[1]||!d)){if(g[1]){d=d instanceof e?d[0]:d,k=d?d.ownerDocument||d:c,j=n.exec(a),j?e.isPlainObject(d)?(a=[c.createElement(j[1])],e.fn.attr.call(a,d,!0)):a=[k.createElement(j[1])]:(j=e.buildFragment([g[1]],[k]),a=(j.cacheable?e.clone(j.fragment):j.fragment).childNodes);return e.merge(this,a)}h=c.getElementById(g[2]);if(h&&h.parentNode){if(h.id!==g[2])return f.find(a);this.length=1,this[0]=h}this.context=c,this.selector=a;return this}return!d||d.jquery?(d||f).find(a):this.constructor(d).find(a)}if(e.isFunction(a))return f.ready(a);a.selector!==b&&(this.selector=a.selector,this.context=a.context);return e.makeArray(a,this)},selector:"",jquery:"1.6.1",length:0,size:function(){return this.length},toArray:function(){return D.call(this,0)},get:function(a){return a==null?this.toArray():a<0?this[this.length+a]:this[a]},pushStack:function(a,b,c){var d=this.constructor();e.isArray(a)?C.apply(d,a):e.merge(d,a),d.prevObject=this,d.context=this.context,b==="find"?d.selector=this.selector+(this.selector?" ":"")+c:b&&(d.selector=this.selector+"."+b+"("+c+")");return d},each:function(a,b){return e.each(this,a,b)},ready:function(a){e.bindReady(),y.done(a);return this},eq:function(a){return a===-1?this.slice(a):this.slice(a,+a+1)},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},slice:function(){return this.pushStack(D.apply(this,arguments),"slice",D.call(arguments).join(","))},map:function(a){return this.pushStack(e.map(this,function(b,c){return a.call(b,c,b)}))},end:function(){return this.prevObject||this.constructor(null)},push:C,sort:[].sort,splice:[].splice},e.fn.init.prototype=e.fn,e.extend=e.fn.extend=function(){var a,c,d,f,g,h,i=arguments[0]||{},j=1,k=arguments.length,l=!1;typeof i=="boolean"&&(l=i,i=arguments[1]||{},j=2),typeof i!="object"&&!e.isFunction(i)&&(i={}),k===j&&(i=this,--j);for(;j<k;j++)if((a=arguments[j])!=null)for(c in a){d=i[c],f=a[c];if(i===f)continue;l&&f&&(e.isPlainObject(f)||(g=e.isArray(f)))?(g?(g=!1,h=d&&e.isArray(d)?d:[]):h=d&&e.isPlainObject(d)?d:{},i[c]=e.extend(l,h,f)):f!==b&&(i[c]=f)}return i},e.extend({noConflict:function(b){a.$===e&&(a.$=g),b&&a.jQuery===e&&(a.jQuery=f);return e},isReady:!1,readyWait:1,holdReady:function(a){a?e.readyWait++:e.ready(!0)},ready:function(a){if(a===!0&&!--e.readyWait||a!==!0&&!e.isReady){if(!c.body)return setTimeout(e.ready,1);e.isReady=!0;if(a!==!0&&--e.readyWait>0)return;y.resolveWith(c,[e]),e.fn.trigger&&e(c).trigger("ready").unbind("ready")}},bindReady:function(){if(!y){y=e._Deferred();if(c.readyState==="complete")return setTimeout(e.ready,1);if(c.addEventListener)c.addEventListener("DOMContentLoaded",z,!1),a.addEventListener("load",e.ready,!1);else if(c.attachEvent){c.attachEvent("onreadystatechange",z),a.attachEvent("onload",e.ready);var b=!1;try{b=a.frameElement==null}catch(d){}c.documentElement.doScroll&&b&&H()}}},isFunction:function(a){return e.type(a)==="function"},isArray:Array.isArray||function(a){return e.type(a)==="array"},isWindow:function(a){return a&&typeof a=="object"&&"setInterval"in a},isNaN:function(a){return a==null||!m.test(a)||isNaN(a)},type:function(a){return a==null?String(a):G[A.call(a)]||"object"},isPlainObject:function(a){if(!a||e.type(a)!=="object"||a.nodeType||e.isWindow(a))return!1;if(a.constructor&&!B.call(a,"constructor")&&!B.call(a.constructor.prototype,"isPrototypeOf"))return!1;var c;for(c in a);return c===b||B.call(a,c)},isEmptyObject:function(a){for(var b in a)return!1;return!0},error:function(a){throw a},parseJSON:function(b){if(typeof b!="string"||!b)return null;b=e.trim(b);if(a.JSON&&a.JSON.parse)return a.JSON.parse(b);if(o.test(b.replace(p,"@").replace(q,"]").replace(r,"")))return(new Function("return "+b))();e.error("Invalid JSON: "+b)},parseXML:function(b,c,d){a.DOMParser?(d=new DOMParser,c=d.parseFromString(b,"text/xml")):(c=new ActiveXObject("Microsoft.XMLDOM"),c.async="false",c.loadXML(b)),d=c.documentElement,(!d||!d.nodeName||d.nodeName==="parsererror")&&e.error("Invalid XML: "+b);return c},noop:function(){},globalEval:function(b){b&&j.test(b)&&(a.execScript||function(b){a.eval.call(a,b)})(b)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toUpperCase()===b.toUpperCase()},each:function(a,c,d){var f,g=0,h=a.length,i=h===b||e.isFunction(a);if(d){if(i){for(f in a)if(c.apply(a[f],d)===!1)break}else for(;g<h;)if(c.apply(a[g++],d)===!1)break}else if(i){for(f in a)if(c.call(a[f],f,a[f])===!1)break}else for(;g<h;)if(c.call(a[g],g,a[g++])===!1)break;return a},trim:E?function(a){return a==null?"":E.call(a)}:function(a){return a==null?"":(a+"").replace(k,"").replace(l,"")},makeArray:function(a,b){var c=b||[];if(a!=null){var d=e.type(a);a.length==null||d==="string"||d==="function"||d==="regexp"||e.isWindow(a)?C.call(c,a):e.merge(c,a)}return c},inArray:function(a,b){if(F)return F.call(b,a);for(var c=0,d=b.length;c<d;c++)if(b[c]===a)return c;return-1},merge:function(a,c){var d=a.length,e=0;if(typeof c.length=="number")for(var f=c.length;e<f;e++)a[d++]=c[e];else while(c[e]!==b)a[d++]=c[e++];a.length=d;return a},grep:function(a,b,c){var d=[],e;c=!!c;for(var f=0,g=a.length;f<g;f++)e=!!b(a[f],f),c!==e&&d.push(a[f]);return d},map:function(a,c,d){var f,g,h=[],i=0,j=a.length,k=a instanceof e||j!==b&&typeof j=="number"&&(j>0&&a[0]&&a[j-1]||j===0||e.isArray(a));if(k)for(;i<j;i++)f=c(a[i],i,d),f!=null&&(h[h.length]=f);else for(g in a)f=c(a[g],g,d),f!=null&&(h[h.length]=f);return h.concat.apply([],h)},guid:1,proxy:function(a,c){if(typeof c=="string"){var d=a[c];c=a,a=d}if(!e.isFunction(a))return b;var f=D.call(arguments,2),g=function(){return a.apply(c,f.concat(D.call(arguments)))};g.guid=a.guid=a.guid||g.guid||e.guid++;return g},access:function(a,c,d,f,g,h){var i=a.length;if(typeof c=="object"){for(var j in c)e.access(a,j,c[j],f,g,d);return a}if(d!==b){f=!h&&f&&e.isFunction(d);for(var k=0;k<i;k++)g(a[k],c,f?d.call(a[k],k,g(a[k],c)):d,h);return a}return i?g(a[0],c):b},now:function(){return(new Date).getTime()},uaMatch:function(a){a=a.toLowerCase();var b=s.exec(a)||t.exec(a)||u.exec(a)||a.indexOf("compatible")<0&&v.exec(a)||[];return{browser:b[1]||"",version:b[2]||"0"}},sub:function(){function a(b,c){return new a.fn.init(b,c)}e.extend(!0,a,this),a.superclass=this,a.fn=a.prototype=this(),a.fn.constructor=a,a.sub=this.sub,a.fn.init=function(d,f){f&&f instanceof e&&!(f instanceof a)&&(f=a(f));return e.fn.init.call(this,d,f,b)},a.fn.init.prototype=a.fn;var b=a(c);return a},browser:{}}),e.each("Boolean Number String Function Array Date RegExp Object".split(" "),function(a,b){G["[object "+b+"]"]=b.toLowerCase()}),x=e.uaMatch(w),x.browser&&(e.browser[x.browser]=!0,e.browser.version=x.version),e.browser.webkit&&(e.browser.safari=!0),j.test(" ")&&(k=/^[\s\xA0]+/,l=/[\s\xA0]+$/),h=e(c),c.addEventListener?z=function(){c.removeEventListener("DOMContentLoaded",z,!1),e.ready()}:c.attachEvent&&(z=function(){c.readyState==="complete"&&(c.detachEvent("onreadystatechange",z),e.ready())});return e}(),g="done fail isResolved isRejected promise then always pipe".split(" "),h=[].slice;f.extend({_Deferred:function(){var a=[],b,c,d,e={done:function(){if(!d){var c=arguments,g,h,i,j,k;b&&(k=b,b=0);for(g=0,h=c.length;g<h;g++)i=c[g],j=f.type(i),j==="array"?e.done.apply(e,i):j==="function"&&a.push(i);k&&e.resolveWith(k[0],k[1])}return this},resolveWith:function(e,f){if(!d&&!b&&!c){f=f||[],c=1;try{while(a[0])a.shift().apply(e,f)}finally{b=[e,f],c=0}}return this},resolve:function(){e.resolveWith(this,arguments);return this},isResolved:function(){return!!c||!!b},cancel:function(){d=1,a=[];return this}};return e},Deferred:function(a){var b=f._Deferred(),c=f._Deferred(),d;f.extend(b,{then:function(a,c){b.done(a).fail(c);return this},always:function(){return b.done.apply(b,arguments).fail.apply(this,arguments)},fail:c.done,rejectWith:c.resolveWith,reject:c.resolve,isRejected:c.isResolved,pipe:function(a,c){return f.Deferred(function(d){f.each({done:[a,"resolve"],fail:[c,"reject"]},function(a,c){var e=c[0],g=c[1],h;f.isFunction(e)?b[a](function(){h=e.apply(this,arguments),h&&f.isFunction(h.promise)?h.promise().then(d.resolve,d.reject):d[g](h)}):b[a](d[g])})}).promise()},promise:function(a){if(a==null){if(d)return d;d=a={}}var c=g.length;while(c--)a[g[c]]=b[g[c]];return a}}),b.done(c.cancel).fail(b.cancel),delete b.cancel,a&&a.call(b,b);return b},when:function(a){function i(a){return function(c){b[a]=arguments.length>1?h.call(arguments,0):c,--e||g.resolveWith(g,h.call(b,0))}}var b=arguments,c=0,d=b.length,e=d,g=d<=1&&a&&f.isFunction(a.promise)?a:f.Deferred();if(d>1){for(;c<d;c++)b[c]&&f.isFunction(b[c].promise)?b[c].promise().then(i(c),g.reject):--e;e||g.resolveWith(g,b)}else g!==a&&g.resolveWith(g,d?[a]:[]);return g.promise()}}),f.support=function(){var a=c.createElement("div"),b=c.documentElement,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r;a.setAttribute("className","t"),a.innerHTML="   <link/><table></table><a href='/a' style='top:1px;float:left;opacity:.55;'>a</a><input type='checkbox'/>",d=a.getElementsByTagName("*"),e=a.getElementsByTagName("a")[0];if(!d||!d.length||!e)return{};f=c.createElement("select"),g=f.appendChild(c.createElement("option")),h=a.getElementsByTagName("input")[0],j={leadingWhitespace:a.firstChild.nodeType===3,tbody:!a.getElementsByTagName("tbody").length,htmlSerialize:!!a.getElementsByTagName("link").length,style:/top/.test(e.getAttribute("style")),hrefNormalized:e.getAttribute("href")==="/a",opacity:/^0.55$/.test(e.style.opacity),cssFloat:!!e.style.cssFloat,checkOn:h.value==="on",optSelected:g.selected,getSetAttribute:a.className!=="t",submitBubbles:!0,changeBubbles:!0,focusinBubbles:!1,deleteExpando:!0,noCloneEvent:!0,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableMarginRight:!0},h.checked=!0,j.noCloneChecked=h.cloneNode(!0).checked,f.disabled=!0,j.optDisabled=!g.disabled;try{delete a.test}catch(s){j.deleteExpando=!1}!a.addEventListener&&a.attachEvent&&a.fireEvent&&(a.attachEvent("onclick",function b(){j.noCloneEvent=!1,a.detachEvent("onclick",b)}),a.cloneNode(!0).fireEvent("onclick")),h=c.createElement("input"),h.value="t",h.setAttribute("type","radio"),j.radioValue=h.value==="t",h.setAttribute("checked","checked"),a.appendChild(h),k=c.createDocumentFragment(),k.appendChild(a.firstChild),j.checkClone=k.cloneNode(!0).cloneNode(!0).lastChild.checked,a.innerHTML="",a.style.width=a.style.paddingLeft="1px",l=c.createElement("body"),m={visibility:"hidden",width:0,height:0,border:0,margin:0,background:"none"};for(q in m)l.style[q]=m[q];l.appendChild(a),b.insertBefore(l,b.firstChild),j.appendChecked=h.checked,j.boxModel=a.offsetWidth===2,"zoom"in a.style&&(a.style.display="inline",a.style.zoom=1,j.inlineBlockNeedsLayout=a.offsetWidth===2,a.style.display="",a.innerHTML="<div style='width:4px;'></div>",j.shrinkWrapBlocks=a.offsetWidth!==2),a.innerHTML="<table><tr><td style='padding:0;border:0;display:none'></td><td>t</td></tr></table>",n=a.getElementsByTagName("td"),r=n[0].offsetHeight===0,n[0].style.display="",n[1].style.display="none",j.reliableHiddenOffsets=r&&n[0].offsetHeight===0,a.innerHTML="",c.defaultView&&c.defaultView.getComputedStyle&&(i=c.createElement("div"),i.style.width="0",i.style.marginRight="0",a.appendChild(i),j.reliableMarginRight=(parseInt((c.defaultView.getComputedStyle(i,null)||{marginRight:0}).marginRight,10)||0)===0),l.innerHTML="",b.removeChild(l);if(a.attachEvent)for(q in{submit:1,change:1,focusin:1})p="on"+q,r=p in a,r||(a.setAttribute(p,"return;"),r=typeof a[p]=="function"),j[q+"Bubbles"]=r;return j}(),f.boxModel=f.support.boxModel;var i=/^(?:\{.*\}|\[.*\])$/,j=/([a-z])([A-Z])/g;f.extend({cache:{},uuid:0,expando:"jQuery"+(f.fn.jquery+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(a){a=a.nodeType?f.cache[a[f.expando]]:a[f.expando];return!!a&&!l(a)},data:function(a,c,d,e){if(!!f.acceptData(a)){var g=f.expando,h=typeof c=="string",i,j=a.nodeType,k=j?f.cache:a,l=j?a[f.expando]:a[f.expando]&&f.expando;if((!l||e&&l&&!k[l][g])&&h&&d===b)return;l||(j?a[f.expando]=l=++f.uuid:l=f.expando),k[l]||(k[l]={},j||(k[l].toJSON=f.noop));if(typeof c=="object"||typeof c=="function")e?k[l][g]=f.extend(k[l][g],c):k[l]=f.extend(k[l],c);i=k[l],e&&(i[g]||(i[g]={}),i=i[g]),d!==b&&(i[f.camelCase(c)]=d);if(c==="events"&&!i[c])return i[g]&&i[g].events;return h?i[f.camelCase(c)]:i}},removeData:function(b,c,d){if(!!f.acceptData(b)){var e=f.expando,g=b.nodeType,h=g?f.cache:b,i=g?b[f.expando]:f.expando;if(!h[i])return;if(c){var j=d?h[i][e]:h[i];if(j){delete j[c];if(!l(j))return}}if(d){delete h[i][e];if(!l(h[i]))return}var k=h[i][e];f.support.deleteExpando||h!=a?delete h[i]:h[i]=null,k?(h[i]={},g||(h[i].toJSON=f.noop),h[i][e]=k):g&&(f.support.deleteExpando?delete b[f.expando]:b.removeAttribute?b.removeAttribute(f.expando):b[f.expando]=null)}},_data:function(a,b,c){return f.data(a,b,c,!0)},acceptData:function(a){if(a.nodeName){var b=f.noData[a.nodeName.toLowerCase()];if(b)return b!==!0&&a.getAttribute("classid")===b}return!0}}),f.fn.extend({data:function(a,c){var d=null;if(typeof a=="undefined"){if(this.length){d=f.data(this[0]);if(this[0].nodeType===1){var e=this[0].attributes,g;for(var h=0,i=e.length;h<i;h++)g=e[h].name,g.indexOf("data-")===0&&(g=f.camelCase(g.substring(5)),k(this[0],g,d[g]))}}return d}if(typeof a=="object")return this.each(function(){f.data(this,a)});var j=a.split(".");j[1]=j[1]?"."+j[1]:"";if(c===b){d=this.triggerHandler("getData"+j[1]+"!",[j[0]]),d===b&&this.length&&(d=f.data(this[0],a),d=k(this[0],a,d));return d===b&&j[1]?this.data(j[0]):d}return this.each(function(){var b=f(this),d=[j[0],c];b.triggerHandler("setData"+j[1]+"!",d),f.data(this,a,c),b.triggerHandler("changeData"+j[1]+"!",d)})},removeData:function(a){return this.each(function(){f.removeData(this,a)})}}),f.extend({_mark:function(a,c){a&&(c=(c||"fx")+"mark",f.data(a,c,(f.data(a,c,b,!0)||0)+1,!0))},_unmark:function(a,c,d){a!==!0&&(d=c,c=a,a=!1);if(c){d=d||"fx";var e=d+"mark",g=a?0:(f.data(c,e,b,!0)||1)-1;g?f.data(c,e,g,!0):(f.removeData(c,e,!0),m(c,d,"mark"))}},queue:function(a,c,d){if(a){c=(c||"fx")+"queue";var e=f.data(a,c,b,!0);d&&(!e||f.isArray(d)?e=f.data(a,c,f.makeArray(d),!0):e.push(d));return e||[]}},dequeue:function(a,b){b=b||"fx";var c=f.queue(a,b),d=c.shift(),e;d==="inprogress"&&(d=c.shift()),d&&(b==="fx"&&c.unshift("inprogress"),d.call(a,function(){f.dequeue(a,b)})),c.length||(f.removeData(a,b+"queue",!0),m(a,b,"queue"))}}),f.fn.extend({queue:function(a,c){typeof a!="string"&&(c=a,a="fx");if(c===b)return f.queue(this[0],a);return this.each(function(){var b=f.queue(this,a,c);a==="fx"&&b[0]!=="inprogress"&&f.dequeue(this,a)})},dequeue:function(a){return this.each(function(){f.dequeue(this,a)})},delay:function(a,b){a=f.fx?f.fx.speeds[a]||a:a,b=b||"fx";return this.queue(b,function(){var c=this;setTimeout(function(){f.dequeue(c,b)},a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,c){function m(){--h||d.resolveWith(e,[e])}typeof a!="string"&&(c=a,a=b),a=a||"fx";var d=f.Deferred(),e=this,g=e.length,h=1,i=a+"defer",j=a+"queue",k=a+"mark",l;while(g--)if(l=f.data(e[g],i,b,!0)||(f.data(e[g],j,b,!0)||f.data(e[g],k,b,!0))&&f.data(e[g],i,f._Deferred(),!0))h++,l.done(m);m();return d.promise()}});var n=/[\n\t\r]/g,o=/\s+/,p=/\r/g,q=/^(?:button|input)$/i,r=/^(?:button|input|object|select|textarea)$/i,s=/^a(?:rea)?$/i,t=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,u=/\:/,v,w;f.fn.extend({attr:function(a,b){return f.access(this,a,b,!0,f.attr)},removeAttr:function(a){return this.each(function(){f.removeAttr(this,a)})},prop:function(a,b){return f.access(this,a,b,!0,f.prop)},removeProp:function(a){a=f.propFix[a]||a;return this.each(function(){try{this[a]=b,delete this[a]}catch(c){}})},addClass:function(a){if(f.isFunction(a))return this.each(function(b){var c=f(this);c.addClass(a.call(this,b,c.attr("class")||""))});if(a&&typeof a=="string"){var b=(a||"").split(o);for(var c=0,d=this.length;c<d;c++){var e=this[c];if(e.nodeType===1)if(!e.className)e.className=a;else{var g=" "+e.className+" ",h=e.className;for(var i=0,j=b.length;i<j;i++)g.indexOf(" "+b[i]+" ")<0&&(h+=" "+b[i]);e.className=f.trim(h)}}}return this},removeClass:function(a){if(f.isFunction(a))return this.each(function(b){var c=f(this);c.removeClass(a.call(this,b,c.attr("class")))});if(a&&typeof a=="string"||a===b){var c=(a||"").split(o);for(var d=0,e=this.length;d<e;d++){var g=this[d];if(g.nodeType===1&&g.className)if(a){var h=(" "+g.className+" ").replace(n," ");for(var i=0,j=c.length;i<j;i++)h=h.replace(" "+c[i]+" "," ");g.className=f.trim(h)}else g.className=""}}return this},toggleClass:function(a,b){var c=typeof a,d=typeof b=="boolean";if(f.isFunction(a))return this.each(function(c){var d=f(this);d.toggleClass(a.call(this,c,d.attr("class"),b),b)});return this.each(function(){if(c==="string"){var e,g=0,h=f(this),i=b,j=a.split(o);while(e=j[g++])i=d?i:!h.hasClass(e),h[i?"addClass":"removeClass"](e)}else if(c==="undefined"||c==="boolean")this.className&&f._data(this,"__className__",this.className),this.className=this.className||a===!1?"":f._data(this,"__className__")||""})},hasClass:function(a){var b=" "+a+" ";for(var c=0,d=this.length;c<d;c++)if((" "+this[c].className+" ").replace(n," ").indexOf(b)>-1)return!0;return!1},val:function(a){var c,d,e=this[0];if(!arguments.length){if(e){c=f.valHooks[e.nodeName.toLowerCase()]||f.valHooks[e.type];if(c&&"get"in c&&(d=c.get(e,"value"))!==b)return d;return(e.value||"").replace(p,"")}return b}var g=f.isFunction(a);return this.each(function(d){var e=f(this),h;if(this.nodeType===1){g?h=a.call(this,d,e.val()):h=a,h==null?h="":typeof h=="number"?h+="":f.isArray(h)&&(h=f.map(h,function(a){return a==null?"":a+""})),c=f.valHooks[this.nodeName.toLowerCase()]||f.valHooks[this.type];if(!c||!("set"in c)||c.set(this,h,"value")===b)this.value=h}})}}),f.extend({valHooks:{option:{get:function(a){var b=a.attributes.value;return!b||b.specified?a.value:a.text}},select:{get:function(a){var b,c=a.selectedIndex,d=[],e=a.options,g=a.type==="select-one";if(c<0)return null;for(var h=g?c:0,i=g?c+1:e.length;h<i;h++){var j=e[h];if(j.selected&&(f.support.optDisabled?!j.disabled:j.getAttribute("disabled")===null)&&(!j.parentNode.disabled||!f.nodeName(j.parentNode,"optgroup"))){b=f(j).val();if(g)return b;d.push(b)}}if(g&&!d.length&&e.length)return f(e[c]).val();return d},set:function(a,b){var c=f.makeArray(b);f(a).find("option").each(function(){this.selected=f.inArray(f(this).val(),c)>=0}),c.length||(a.selectedIndex=-1);return c}}},attrFn:{val:!0,css:!0,html:!0,text:!0,data:!0,width:!0,height:!0,offset:!0},attrFix:{tabindex:"tabIndex"},attr:function(a,c,d,e){var g=a.nodeType;if(!a||g===3||g===8||g===2)return b;if(e&&c in f.attrFn)return f(a)[c](d);if(!("getAttribute"in a))return f.prop(a,c,d);var h,i,j=g!==1||!f.isXMLDoc(a);c=j&&f.attrFix[c]||c,i=f.attrHooks[c],i||(!t.test(c)||typeof d!="boolean"&&d!==b&&d.toLowerCase()!==c.toLowerCase()?v&&(f.nodeName(a,"form")||u.test(c))&&(i=v):i=w);if(d!==b){if(d===null){f.removeAttr(a,c);return b}if(i&&"set"in i&&j&&(h=i.set(a,d,c))!==b)return h;a.setAttribute(c,""+d);return d}if(i&&"get"in i&&j)return i.get(a,c);h=a.getAttribute(c);return h===null?b:h},removeAttr:function(a,b){var c;a.nodeType===1&&(b=f.attrFix[b]||b,f.support.getSetAttribute?a.removeAttribute(b):(f.attr(a,b,""),a.removeAttributeNode(a.getAttributeNode(b))),t.test(b)&&(c=f.propFix[b]||b)in a&&(a[c]=!1))},attrHooks:{type:{set:function(a,b){if(q.test(a.nodeName)&&a.parentNode)f.error("type property can't be changed");else if(!f.support.radioValue&&b==="radio"&&f.nodeName(a,"input")){var c=a.value;a.setAttribute("type",b),c&&(a.value=c);return b}}},tabIndex:{get:function(a){var c=a.getAttributeNode("tabIndex");return c&&c.specified?parseInt(c.value,10):r.test(a.nodeName)||s.test(a.nodeName)&&a.href?0:b}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(a,c,d){var e=a.nodeType;if(!a||e===3||e===8||e===2)return b;var g,h,i=e!==1||!f.isXMLDoc(a);c=i&&f.propFix[c]||c,h=f.propHooks[c];return d!==b?h&&"set"in h&&(g=h.set(a,d,c))!==b?g:a[c]=d:h&&"get"in h&&(g=h.get(a,c))!==b?g:a[c]},propHooks:{}}),w={get:function(a,c){return a[f.propFix[c]||c]?c.toLowerCase():b},set:function(a,b,c){var d;b===!1?f.removeAttr(a,c):(d=f.propFix[c]||c,d in a&&(a[d]=b),a.setAttribute(c,c.toLowerCase()));return c}},f.attrHooks.value={get:function(a,b){if(v&&f.nodeName(a,"button"))return v.get(a,b);return a.value},set:function(a,b,c){if(v&&f.nodeName(a,"button"))return v.set(a,b,c);a.value=b}},f.support.getSetAttribute||(f.attrFix=f.propFix,v=f.attrHooks.name=f.valHooks.button={get:function(a,c){var d;d=a.getAttributeNode(c);return d&&d.nodeValue!==""?d.nodeValue:b},set:function(a,b,c){var d=a.getAttributeNode(c);if(d){d.nodeValue=b;return b}}},f.each(["width","height"],function(a,b){f.attrHooks[b]=f.extend(f.attrHooks[b],{set:function(a,c){if(c===""){a.setAttribute(b,"auto");return c}}})})),f.support.hrefNormalized||f.each(["href","src","width","height"],function(a,c){f.attrHooks[c]=f.extend(f.attrHooks[c],{get:function(a){var d=a.getAttribute(c,2);return d===null?b:d}})}),f.support.style||(f.attrHooks.style={get:function(a){return a.style.cssText.toLowerCase()||b},set:function(a,b){return a.style.cssText=""+b}}),f.support.optSelected||(f.propHooks.selected=f.extend(f.propHooks.selected,{get:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex)}})),f.support.checkOn||f.each(["radio","checkbox"],function(){f.valHooks[this]={get:function(a){return a.getAttribute("value")===null?"on":a.value}}}),f.each(["radio","checkbox"],function(){f.valHooks[this]=f.extend(f.valHooks[this],{set:function(a,b){if(f.isArray(b))return a.checked=f.inArray(f(a).val(),b)>=0}})});var x=Object.prototype.hasOwnProperty,y=/\.(.*)$/,z=/^(?:textarea|input|select)$/i,A=/\./g,B=/ /g,C=/[^\w\s.|`]/g,D=function(a){return a.replace(C,"\\$&")};f.event={add:function(a,c,d,e){if(a.nodeType!==3&&a.nodeType!==8){if(d===!1)d=E;else if(!d)return;var g,h;d.handler&&(g=d,d=g.handler),d.guid||(d.guid=f.guid++);var i=f._data(a);if(!i)return;var j=i.events,k=i.handle;j||(i.events=j={}),k||(i.handle=k=function(a){return typeof f!="undefined"&&(!a||f.event.triggered!==a.type)?f.event.handle.apply(k.elem,arguments):b}),k.elem=a,c=c.split(" ");var l,m=0,n;while(l=c[m++]){h=g?f.extend({},g):{handler:d,data:e},l.indexOf(".")>-1?(n=l.split("."),l=n.shift(),h.namespace=n.slice(0).sort().join(".")):(n=[],h.namespace=""),h.type=l,h.guid||(h.guid=d.guid);var o=j[l],p=f.event.special[l]||{};if(!o){o=j[l]=[];if(!p.setup||p.setup.call(a,e,n,k)===!1)a.addEventListener?a.addEventListener(l,k,!1):a.attachEvent&&a.attachEvent("on"+l,k)}p.add&&(p.add.call(a,h),h.handler.guid||(h.handler.guid=d.guid)),o.push(h),f.event.global[l]=!0}a=null}},global:{},remove:function(a,c,d,e){if(a.nodeType!==3&&a.nodeType!==8){d===!1&&(d=E);var g,h,i,j,k=0,l,m,n,o,p,q,r,s=f.hasData(a)&&f._data(a),t=s&&s.events;if(!s||!t)return;c&&c.type&&(d=c.handler,c=c.type);if(!c||typeof c=="string"&&c.charAt(0)==="."){c=c||"";for(h in t)f.event.remove(a,h+c);return}c=c.split(" ");while(h=c[k++]){r=h,q=null,l=h.indexOf(".")<0,m=[],l||(m=h.split("."),h=m.shift(),n=new RegExp("(^|\\.)"+f.map(m.slice(0).sort(),D).join("\\.(?:.*\\.)?")+"(\\.|$)")),p=t[h];if(!p)continue;if(!d){for(j=0;j<p.length;j++){q=p[j];if(l||n.test(q.namespace))f.event.remove(a,r,q.handler,j),p.splice(j--,1)}continue}o=f.event.special[h]||{};for(j=e||0;j<p.length;j++){q=p[j];if(d.guid===q.guid){if(l||n.test(q.namespace))e==null&&p.splice(j--,1),o.remove&&o.remove.call(a,q);if(e!=null)break}}if(p.length===0||e!=null&&p.length===1)(!o.teardown||o.teardown.call(a,m)===!1)&&f.removeEvent(a,h,s.handle),g=null,delete t[h]}if(f.isEmptyObject(t)){var u=s.handle;u&&(u.elem=null),delete s.events,delete s.handle,f.isEmptyObject(s)&&f.removeData(a,b,!0)}}},customEvent:{getData:!0,setData:!0,changeData:!0},trigger:function(c,d,e,g){var h=c.type||c,i=[],j;h.indexOf("!")>=0&&(h=h.slice(0,-1),j=!0),h.indexOf(".")>=0&&(i=h.split("."),h=i.shift(),i.sort());if(!!e&&!f.event.customEvent[h]||!!f.event.global[h]){c=typeof c=="object"?c[f.expando]?c:new f.Event(h,c):new f.Event(h),c.type=h,c.exclusive=j,c.namespace=i.join("."),c.namespace_re=new RegExp("(^|\\.)"+i.join("\\.(?:.*\\.)?")+"(\\.|$)");if(g||!e)c.preventDefault(),c.stopPropagation();if(!e){f.each(f.cache,function(){var a=f.expando,b=this[a];b&&b.events&&b.events[h]&&f.event.trigger(c,d,b.handle.elem
)});return}if(e.nodeType===3||e.nodeType===8)return;c.result=b,c.target=e,d=d?f.makeArray(d):[],d.unshift(c);var k=e,l=h.indexOf(":")<0?"on"+h:"";do{var m=f._data(k,"handle");c.currentTarget=k,m&&m.apply(k,d),l&&f.acceptData(k)&&k[l]&&k[l].apply(k,d)===!1&&(c.result=!1,c.preventDefault()),k=k.parentNode||k.ownerDocument||k===c.target.ownerDocument&&a}while(k&&!c.isPropagationStopped());if(!c.isDefaultPrevented()){var n,o=f.event.special[h]||{};if((!o._default||o._default.call(e.ownerDocument,c)===!1)&&(h!=="click"||!f.nodeName(e,"a"))&&f.acceptData(e)){try{l&&e[h]&&(n=e[l],n&&(e[l]=null),f.event.triggered=h,e[h]())}catch(p){}n&&(e[l]=n),f.event.triggered=b}}return c.result}},handle:function(c){c=f.event.fix(c||a.event);var d=((f._data(this,"events")||{})[c.type]||[]).slice(0),e=!c.exclusive&&!c.namespace,g=Array.prototype.slice.call(arguments,0);g[0]=c,c.currentTarget=this;for(var h=0,i=d.length;h<i;h++){var j=d[h];if(e||c.namespace_re.test(j.namespace)){c.handler=j.handler,c.data=j.data,c.handleObj=j;var k=j.handler.apply(this,g);k!==b&&(c.result=k,k===!1&&(c.preventDefault(),c.stopPropagation()));if(c.isImmediatePropagationStopped())break}}return c.result},props:"altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode layerX layerY metaKey newValue offsetX offsetY pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which".split(" "),fix:function(a){if(a[f.expando])return a;var d=a;a=f.Event(d);for(var e=this.props.length,g;e;)g=this.props[--e],a[g]=d[g];a.target||(a.target=a.srcElement||c),a.target.nodeType===3&&(a.target=a.target.parentNode),!a.relatedTarget&&a.fromElement&&(a.relatedTarget=a.fromElement===a.target?a.toElement:a.fromElement);if(a.pageX==null&&a.clientX!=null){var h=a.target.ownerDocument||c,i=h.documentElement,j=h.body;a.pageX=a.clientX+(i&&i.scrollLeft||j&&j.scrollLeft||0)-(i&&i.clientLeft||j&&j.clientLeft||0),a.pageY=a.clientY+(i&&i.scrollTop||j&&j.scrollTop||0)-(i&&i.clientTop||j&&j.clientTop||0)}a.which==null&&(a.charCode!=null||a.keyCode!=null)&&(a.which=a.charCode!=null?a.charCode:a.keyCode),!a.metaKey&&a.ctrlKey&&(a.metaKey=a.ctrlKey),!a.which&&a.button!==b&&(a.which=a.button&1?1:a.button&2?3:a.button&4?2:0);return a},guid:1e8,proxy:f.proxy,special:{ready:{setup:f.bindReady,teardown:f.noop},live:{add:function(a){f.event.add(this,O(a.origType,a.selector),f.extend({},a,{handler:N,guid:a.handler.guid}))},remove:function(a){f.event.remove(this,O(a.origType,a.selector),a)}},beforeunload:{setup:function(a,b,c){f.isWindow(this)&&(this.onbeforeunload=c)},teardown:function(a,b){this.onbeforeunload===b&&(this.onbeforeunload=null)}}}},f.removeEvent=c.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){a.detachEvent&&a.detachEvent("on"+b,c)},f.Event=function(a,b){if(!this.preventDefault)return new f.Event(a,b);a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||a.returnValue===!1||a.getPreventDefault&&a.getPreventDefault()?F:E):this.type=a,b&&f.extend(this,b),this.timeStamp=f.now(),this[f.expando]=!0},f.Event.prototype={preventDefault:function(){this.isDefaultPrevented=F;var a=this.originalEvent;!a||(a.preventDefault?a.preventDefault():a.returnValue=!1)},stopPropagation:function(){this.isPropagationStopped=F;var a=this.originalEvent;!a||(a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=F,this.stopPropagation()},isDefaultPrevented:E,isPropagationStopped:E,isImmediatePropagationStopped:E};var G=function(a){var b=a.relatedTarget;a.type=a.data;try{if(b&&b!==c&&!b.parentNode)return;while(b&&b!==this)b=b.parentNode;b!==this&&f.event.handle.apply(this,arguments)}catch(d){}},H=function(a){a.type=a.data,f.event.handle.apply(this,arguments)};f.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(a,b){f.event.special[a]={setup:function(c){f.event.add(this,b,c&&c.selector?H:G,a)},teardown:function(a){f.event.remove(this,b,a&&a.selector?H:G)}}}),f.support.submitBubbles||(f.event.special.submit={setup:function(a,b){if(!f.nodeName(this,"form"))f.event.add(this,"click.specialSubmit",function(a){var b=a.target,c=b.type;(c==="submit"||c==="image")&&f(b).closest("form").length&&L("submit",this,arguments)}),f.event.add(this,"keypress.specialSubmit",function(a){var b=a.target,c=b.type;(c==="text"||c==="password")&&f(b).closest("form").length&&a.keyCode===13&&L("submit",this,arguments)});else return!1},teardown:function(a){f.event.remove(this,".specialSubmit")}});if(!f.support.changeBubbles){var I,J=function(a){var b=a.type,c=a.value;b==="radio"||b==="checkbox"?c=a.checked:b==="select-multiple"?c=a.selectedIndex>-1?f.map(a.options,function(a){return a.selected}).join("-"):"":f.nodeName(a,"select")&&(c=a.selectedIndex);return c},K=function(c){var d=c.target,e,g;if(!!z.test(d.nodeName)&&!d.readOnly){e=f._data(d,"_change_data"),g=J(d),(c.type!=="focusout"||d.type!=="radio")&&f._data(d,"_change_data",g);if(e===b||g===e)return;if(e!=null||g)c.type="change",c.liveFired=b,f.event.trigger(c,arguments[1],d)}};f.event.special.change={filters:{focusout:K,beforedeactivate:K,click:function(a){var b=a.target,c=f.nodeName(b,"input")?b.type:"";(c==="radio"||c==="checkbox"||f.nodeName(b,"select"))&&K.call(this,a)},keydown:function(a){var b=a.target,c=f.nodeName(b,"input")?b.type:"";(a.keyCode===13&&!f.nodeName(b,"textarea")||a.keyCode===32&&(c==="checkbox"||c==="radio")||c==="select-multiple")&&K.call(this,a)},beforeactivate:function(a){var b=a.target;f._data(b,"_change_data",J(b))}},setup:function(a,b){if(this.type==="file")return!1;for(var c in I)f.event.add(this,c+".specialChange",I[c]);return z.test(this.nodeName)},teardown:function(a){f.event.remove(this,".specialChange");return z.test(this.nodeName)}},I=f.event.special.change.filters,I.focus=I.beforeactivate}f.support.focusinBubbles||f.each({focus:"focusin",blur:"focusout"},function(a,b){function e(a){var c=f.event.fix(a);c.type=b,c.originalEvent={},f.event.trigger(c,null,c.target),c.isDefaultPrevented()&&a.preventDefault()}var d=0;f.event.special[b]={setup:function(){d++===0&&c.addEventListener(a,e,!0)},teardown:function(){--d===0&&c.removeEventListener(a,e,!0)}}}),f.each(["bind","one"],function(a,c){f.fn[c]=function(a,d,e){var g;if(typeof a=="object"){for(var h in a)this[c](h,d,a[h],e);return this}if(arguments.length===2||d===!1)e=d,d=b;c==="one"?(g=function(a){f(this).unbind(a,g);return e.apply(this,arguments)},g.guid=e.guid||f.guid++):g=e;if(a==="unload"&&c!=="one")this.one(a,d,e);else for(var i=0,j=this.length;i<j;i++)f.event.add(this[i],a,g,d);return this}}),f.fn.extend({unbind:function(a,b){if(typeof a=="object"&&!a.preventDefault)for(var c in a)this.unbind(c,a[c]);else for(var d=0,e=this.length;d<e;d++)f.event.remove(this[d],a,b);return this},delegate:function(a,b,c,d){return this.live(b,c,d,a)},undelegate:function(a,b,c){return arguments.length===0?this.unbind("live"):this.die(b,null,c,a)},trigger:function(a,b){return this.each(function(){f.event.trigger(a,b,this)})},triggerHandler:function(a,b){if(this[0])return f.event.trigger(a,b,this[0],!0)},toggle:function(a){var b=arguments,c=a.guid||f.guid++,d=0,e=function(c){var e=(f.data(this,"lastToggle"+a.guid)||0)%d;f.data(this,"lastToggle"+a.guid,e+1),c.preventDefault();return b[e].apply(this,arguments)||!1};e.guid=c;while(d<b.length)b[d++].guid=c;return this.click(e)},hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}});var M={focus:"focusin",blur:"focusout",mouseenter:"mouseover",mouseleave:"mouseout"};f.each(["live","die"],function(a,c){f.fn[c]=function(a,d,e,g){var h,i=0,j,k,l,m=g||this.selector,n=g?this:f(this.context);if(typeof a=="object"&&!a.preventDefault){for(var o in a)n[c](o,d,a[o],m);return this}if(c==="die"&&!a&&g&&g.charAt(0)==="."){n.unbind(g);return this}if(d===!1||f.isFunction(d))e=d||E,d=b;a=(a||"").split(" ");while((h=a[i++])!=null){j=y.exec(h),k="",j&&(k=j[0],h=h.replace(y,""));if(h==="hover"){a.push("mouseenter"+k,"mouseleave"+k);continue}l=h,M[h]?(a.push(M[h]+k),h=h+k):h=(M[h]||h)+k;if(c==="live")for(var p=0,q=n.length;p<q;p++)f.event.add(n[p],"live."+O(h,m),{data:d,selector:m,handler:e,origType:h,origHandler:e,preType:l});else n.unbind("live."+O(h,m),e)}return this}}),f.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error".split(" "),function(a,b){f.fn[b]=function(a,c){c==null&&(c=a,a=null);return arguments.length>0?this.bind(b,a,c):this.trigger(b)},f.attrFn&&(f.attrFn[b]=!0)}),function(){function u(a,b,c,d,e,f){for(var g=0,h=d.length;g<h;g++){var i=d[g];if(i){var j=!1;i=i[a];while(i){if(i.sizcache===c){j=d[i.sizset];break}if(i.nodeType===1){f||(i.sizcache=c,i.sizset=g);if(typeof b!="string"){if(i===b){j=!0;break}}else if(k.filter(b,[i]).length>0){j=i;break}}i=i[a]}d[g]=j}}}function t(a,b,c,d,e,f){for(var g=0,h=d.length;g<h;g++){var i=d[g];if(i){var j=!1;i=i[a];while(i){if(i.sizcache===c){j=d[i.sizset];break}i.nodeType===1&&!f&&(i.sizcache=c,i.sizset=g);if(i.nodeName.toLowerCase()===b){j=i;break}i=i[a]}d[g]=j}}}var a=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,d=0,e=Object.prototype.toString,g=!1,h=!0,i=/\\/g,j=/\W/;[0,0].sort(function(){h=!1;return 0});var k=function(b,d,f,g){f=f||[],d=d||c;var h=d;if(d.nodeType!==1&&d.nodeType!==9)return[];if(!b||typeof b!="string")return f;var i,j,n,o,q,r,s,t,u=!0,w=k.isXML(d),x=[],y=b;do{a.exec(""),i=a.exec(y);if(i){y=i[3],x.push(i[1]);if(i[2]){o=i[3];break}}}while(i);if(x.length>1&&m.exec(b))if(x.length===2&&l.relative[x[0]])j=v(x[0]+x[1],d);else{j=l.relative[x[0]]?[d]:k(x.shift(),d);while(x.length)b=x.shift(),l.relative[b]&&(b+=x.shift()),j=v(b,j)}else{!g&&x.length>1&&d.nodeType===9&&!w&&l.match.ID.test(x[0])&&!l.match.ID.test(x[x.length-1])&&(q=k.find(x.shift(),d,w),d=q.expr?k.filter(q.expr,q.set)[0]:q.set[0]);if(d){q=g?{expr:x.pop(),set:p(g)}:k.find(x.pop(),x.length===1&&(x[0]==="~"||x[0]==="+")&&d.parentNode?d.parentNode:d,w),j=q.expr?k.filter(q.expr,q.set):q.set,x.length>0?n=p(j):u=!1;while(x.length)r=x.pop(),s=r,l.relative[r]?s=x.pop():r="",s==null&&(s=d),l.relative[r](n,s,w)}else n=x=[]}n||(n=j),n||k.error(r||b);if(e.call(n)==="[object Array]")if(!u)f.push.apply(f,n);else if(d&&d.nodeType===1)for(t=0;n[t]!=null;t++)n[t]&&(n[t]===!0||n[t].nodeType===1&&k.contains(d,n[t]))&&f.push(j[t]);else for(t=0;n[t]!=null;t++)n[t]&&n[t].nodeType===1&&f.push(j[t]);else p(n,f);o&&(k(o,h,f,g),k.uniqueSort(f));return f};k.uniqueSort=function(a){if(r){g=h,a.sort(r);if(g)for(var b=1;b<a.length;b++)a[b]===a[b-1]&&a.splice(b--,1)}return a},k.matches=function(a,b){return k(a,null,null,b)},k.matchesSelector=function(a,b){return k(b,null,null,[a]).length>0},k.find=function(a,b,c){var d;if(!a)return[];for(var e=0,f=l.order.length;e<f;e++){var g,h=l.order[e];if(g=l.leftMatch[h].exec(a)){var j=g[1];g.splice(1,1);if(j.substr(j.length-1)!=="\\"){g[1]=(g[1]||"").replace(i,""),d=l.find[h](g,b,c);if(d!=null){a=a.replace(l.match[h],"");break}}}}d||(d=typeof b.getElementsByTagName!="undefined"?b.getElementsByTagName("*"):[]);return{set:d,expr:a}},k.filter=function(a,c,d,e){var f,g,h=a,i=[],j=c,m=c&&c[0]&&k.isXML(c[0]);while(a&&c.length){for(var n in l.filter)if((f=l.leftMatch[n].exec(a))!=null&&f[2]){var o,p,q=l.filter[n],r=f[1];g=!1,f.splice(1,1);if(r.substr(r.length-1)==="\\")continue;j===i&&(i=[]);if(l.preFilter[n]){f=l.preFilter[n](f,j,d,i,e,m);if(!f)g=o=!0;else if(f===!0)continue}if(f)for(var s=0;(p=j[s])!=null;s++)if(p){o=q(p,f,s,j);var t=e^!!o;d&&o!=null?t?g=!0:j[s]=!1:t&&(i.push(p),g=!0)}if(o!==b){d||(j=i),a=a.replace(l.match[n],"");if(!g)return[];break}}if(a===h)if(g==null)k.error(a);else break;h=a}return j},k.error=function(a){throw"Syntax error, unrecognized expression: "+a};var l=k.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/},leftMatch:{},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(a){return a.getAttribute("href")},type:function(a){return a.getAttribute("type")}},relative:{"+":function(a,b){var c=typeof b=="string",d=c&&!j.test(b),e=c&&!d;d&&(b=b.toLowerCase());for(var f=0,g=a.length,h;f<g;f++)if(h=a[f]){while((h=h.previousSibling)&&h.nodeType!==1);a[f]=e||h&&h.nodeName.toLowerCase()===b?h||!1:h===b}e&&k.filter(b,a,!0)},">":function(a,b){var c,d=typeof b=="string",e=0,f=a.length;if(d&&!j.test(b)){b=b.toLowerCase();for(;e<f;e++){c=a[e];if(c){var g=c.parentNode;a[e]=g.nodeName.toLowerCase()===b?g:!1}}}else{for(;e<f;e++)c=a[e],c&&(a[e]=d?c.parentNode:c.parentNode===b);d&&k.filter(b,a,!0)}},"":function(a,b,c){var e,f=d++,g=u;typeof b=="string"&&!j.test(b)&&(b=b.toLowerCase(),e=b,g=t),g("parentNode",b,f,a,e,c)},"~":function(a,b,c){var e,f=d++,g=u;typeof b=="string"&&!j.test(b)&&(b=b.toLowerCase(),e=b,g=t),g("previousSibling",b,f,a,e,c)}},find:{ID:function(a,b,c){if(typeof b.getElementById!="undefined"&&!c){var d=b.getElementById(a[1]);return d&&d.parentNode?[d]:[]}},NAME:function(a,b){if(typeof b.getElementsByName!="undefined"){var c=[],d=b.getElementsByName(a[1]);for(var e=0,f=d.length;e<f;e++)d[e].getAttribute("name")===a[1]&&c.push(d[e]);return c.length===0?null:c}},TAG:function(a,b){if(typeof b.getElementsByTagName!="undefined")return b.getElementsByTagName(a[1])}},preFilter:{CLASS:function(a,b,c,d,e,f){a=" "+a[1].replace(i,"")+" ";if(f)return a;for(var g=0,h;(h=b[g])!=null;g++)h&&(e^(h.className&&(" "+h.className+" ").replace(/[\t\n\r]/g," ").indexOf(a)>=0)?c||d.push(h):c&&(b[g]=!1));return!1},ID:function(a){return a[1].replace(i,"")},TAG:function(a,b){return a[1].replace(i,"").toLowerCase()},CHILD:function(a){if(a[1]==="nth"){a[2]||k.error(a[0]),a[2]=a[2].replace(/^\+|\s*/g,"");var b=/(-?)(\d*)(?:n([+\-]?\d*))?/.exec(a[2]==="even"&&"2n"||a[2]==="odd"&&"2n+1"||!/\D/.test(a[2])&&"0n+"+a[2]||a[2]);a[2]=b[1]+(b[2]||1)-0,a[3]=b[3]-0}else a[2]&&k.error(a[0]);a[0]=d++;return a},ATTR:function(a,b,c,d,e,f){var g=a[1]=a[1].replace(i,"");!f&&l.attrMap[g]&&(a[1]=l.attrMap[g]),a[4]=(a[4]||a[5]||"").replace(i,""),a[2]==="~="&&(a[4]=" "+a[4]+" ");return a},PSEUDO:function(b,c,d,e,f){if(b[1]==="not")if((a.exec(b[3])||"").length>1||/^\w/.test(b[3]))b[3]=k(b[3],null,null,c);else{var g=k.filter(b[3],c,d,!0^f);d||e.push.apply(e,g);return!1}else if(l.match.POS.test(b[0])||l.match.CHILD.test(b[0]))return!0;return b},POS:function(a){a.unshift(!0);return a}},filters:{enabled:function(a){return a.disabled===!1&&a.type!=="hidden"},disabled:function(a){return a.disabled===!0},checked:function(a){return a.checked===!0},selected:function(a){a.parentNode&&a.parentNode.selectedIndex;return a.selected===!0},parent:function(a){return!!a.firstChild},empty:function(a){return!a.firstChild},has:function(a,b,c){return!!k(c[3],a).length},header:function(a){return/h\d/i.test(a.nodeName)},text:function(a){var b=a.getAttribute("type"),c=a.type;return a.nodeName.toLowerCase()==="input"&&"text"===c&&(b===c||b===null)},radio:function(a){return a.nodeName.toLowerCase()==="input"&&"radio"===a.type},checkbox:function(a){return a.nodeName.toLowerCase()==="input"&&"checkbox"===a.type},file:function(a){return a.nodeName.toLowerCase()==="input"&&"file"===a.type},password:function(a){return a.nodeName.toLowerCase()==="input"&&"password"===a.type},submit:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"submit"===a.type},image:function(a){return a.nodeName.toLowerCase()==="input"&&"image"===a.type},reset:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"reset"===a.type},button:function(a){var b=a.nodeName.toLowerCase();return b==="input"&&"button"===a.type||b==="button"},input:function(a){return/input|select|textarea|button/i.test(a.nodeName)},focus:function(a){return a===a.ownerDocument.activeElement}},setFilters:{first:function(a,b){return b===0},last:function(a,b,c,d){return b===d.length-1},even:function(a,b){return b%2===0},odd:function(a,b){return b%2===1},lt:function(a,b,c){return b<c[3]-0},gt:function(a,b,c){return b>c[3]-0},nth:function(a,b,c){return c[3]-0===b},eq:function(a,b,c){return c[3]-0===b}},filter:{PSEUDO:function(a,b,c,d){var e=b[1],f=l.filters[e];if(f)return f(a,c,b,d);if(e==="contains")return(a.textContent||a.innerText||k.getText([a])||"").indexOf(b[3])>=0;if(e==="not"){var g=b[3];for(var h=0,i=g.length;h<i;h++)if(g[h]===a)return!1;return!0}k.error(e)},CHILD:function(a,b){var c=b[1],d=a;switch(c){case"only":case"first":while(d=d.previousSibling)if(d.nodeType===1)return!1;if(c==="first")return!0;d=a;case"last":while(d=d.nextSibling)if(d.nodeType===1)return!1;return!0;case"nth":var e=b[2],f=b[3];if(e===1&&f===0)return!0;var g=b[0],h=a.parentNode;if(h&&(h.sizcache!==g||!a.nodeIndex)){var i=0;for(d=h.firstChild;d;d=d.nextSibling)d.nodeType===1&&(d.nodeIndex=++i);h.sizcache=g}var j=a.nodeIndex-f;return e===0?j===0:j%e===0&&j/e>=0}},ID:function(a,b){return a.nodeType===1&&a.getAttribute("id")===b},TAG:function(a,b){return b==="*"&&a.nodeType===1||a.nodeName.toLowerCase()===b},CLASS:function(a,b){return(" "+(a.className||a.getAttribute("class"))+" ").indexOf(b)>-1},ATTR:function(a,b){var c=b[1],d=l.attrHandle[c]?l.attrHandle[c](a):a[c]!=null?a[c]:a.getAttribute(c),e=d+"",f=b[2],g=b[4];return d==null?f==="!=":f==="="?e===g:f==="*="?e.indexOf(g)>=0:f==="~="?(" "+e+" ").indexOf(g)>=0:g?f==="!="?e!==g:f==="^="?e.indexOf(g)===0:f==="$="?e.substr(e.length-g.length)===g:f==="|="?e===g||e.substr(0,g.length+1)===g+"-":!1:e&&d!==!1},POS:function(a,b,c,d){var e=b[2],f=l.setFilters[e];if(f)return f(a,c,b,d)}}},m=l.match.POS,n=function(a,b){return"\\"+(b-0+1)};for(var o in l.match)l.match[o]=new RegExp(l.match[o].source+/(?![^\[]*\])(?![^\(]*\))/.source),l.leftMatch[o]=new RegExp(/(^(?:.|\r|\n)*?)/.source+l.match[o].source.replace(/\\(\d+)/g,n));var p=function(a,b){a=Array.prototype.slice.call(a,0);if(b){b.push.apply(b,a);return b}return a};try{Array.prototype.slice.call(c.documentElement.childNodes,0)[0].nodeType}catch(q){p=function(a,b){var c=0,d=b||[];if(e.call(a)==="[object Array]")Array.prototype.push.apply(d,a);else if(typeof a.length=="number")for(var f=a.length;c<f;c++)d.push(a[c]);else for(;a[c];c++)d.push(a[c]);return d}}var r,s;c.documentElement.compareDocumentPosition?r=function(a,b){if(a===b){g=!0;return 0}if(!a.compareDocumentPosition||!b.compareDocumentPosition)return a.compareDocumentPosition?-1:1;return a.compareDocumentPosition(b)&4?-1:1}:(r=function(a,b){if(a===b){g=!0;return 0}if(a.sourceIndex&&b.sourceIndex)return a.sourceIndex-b.sourceIndex;var c,d,e=[],f=[],h=a.parentNode,i=b.parentNode,j=h;if(h===i)return s(a,b);if(!h)return-1;if(!i)return 1;while(j)e.unshift(j),j=j.parentNode;j=i;while(j)f.unshift(j),j=j.parentNode;c=e.length,d=f.length;for(var k=0;k<c&&k<d;k++)if(e[k]!==f[k])return s(e[k],f[k]);return k===c?s(a,f[k],-1):s(e[k],b,1)},s=function(a,b,c){if(a===b)return c;var d=a.nextSibling;while(d){if(d===b)return-1;d=d.nextSibling}return 1}),k.getText=function(a){var b="",c;for(var d=0;a[d];d++)c=a[d],c.nodeType===3||c.nodeType===4?b+=c.nodeValue:c.nodeType!==8&&(b+=k.getText(c.childNodes));return b},function(){var a=c.createElement("div"),d="script"+(new Date).getTime(),e=c.documentElement;a.innerHTML="<a name='"+d+"'/>",e.insertBefore(a,e.firstChild),c.getElementById(d)&&(l.find.ID=function(a,c,d){if(typeof c.getElementById!="undefined"&&!d){var e=c.getElementById(a[1]);return e?e.id===a[1]||typeof e.getAttributeNode!="undefined"&&e.getAttributeNode("id").nodeValue===a[1]?[e]:b:[]}},l.filter.ID=function(a,b){var c=typeof a.getAttributeNode!="undefined"&&a.getAttributeNode("id");return a.nodeType===1&&c&&c.nodeValue===b}),e.removeChild(a),e=a=null}(),function(){var a=c.createElement("div");a.appendChild(c.createComment("")),a.getElementsByTagName("*").length>0&&(l.find.TAG=function(a,b){var c=b.getElementsByTagName(a[1]);if(a[1]==="*"){var d=[];for(var e=0;c[e];e++)c[e].nodeType===1&&d.push(c[e]);c=d}return c}),a.innerHTML="<a href='#'></a>",a.firstChild&&typeof a.firstChild.getAttribute!="undefined"&&a.firstChild.getAttribute("href")!=="#"&&(l.attrHandle.href=function(a){return a.getAttribute("href",2)}),a=null}(),c.querySelectorAll&&function(){var a=k,b=c.createElement("div"),d="__sizzle__";b.innerHTML="<p class='TEST'></p>";if(!b.querySelectorAll||b.querySelectorAll(".TEST").length!==0){k=function(b,e,f,g){e=e||c;if(!g&&!k.isXML(e)){var h=/^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(b);if(h&&(e.nodeType===1||e.nodeType===9)){if(h[1])return p(e.getElementsByTagName(b),f);if(h[2]&&l.find.CLASS&&e.getElementsByClassName)return p(e.getElementsByClassName(h[2]),f)}if(e.nodeType===9){if(b==="body"&&e.body)return p([e.body],f);if(h&&h[3]){var i=e.getElementById(h[3]);if(!i||!i.parentNode)return p([],f);if(i.id===h[3])return p([i],f)}try{return p(e.querySelectorAll(b),f)}catch(j){}}else if(e.nodeType===1&&e.nodeName.toLowerCase()!=="object"){var m=e,n=e.getAttribute("id"),o=n||d,q=e.parentNode,r=/^\s*[+~]/.test(b);n?o=o.replace(/'/g,"\\$&"):e.setAttribute("id",o),r&&q&&(e=e.parentNode);try{if(!r||q)return p(e.querySelectorAll("[id='"+o+"'] "+b),f)}catch(s){}finally{n||m.removeAttribute("id")}}}return a(b,e,f,g)};for(var e in a)k[e]=a[e];b=null}}(),function(){var a=c.documentElement,b=a.matchesSelector||a.mozMatchesSelector||a.webkitMatchesSelector||a.msMatchesSelector;if(b){var d=!b.call(c.createElement("div"),"div"),e=!1;try{b.call(c.documentElement,"[test!='']:sizzle")}catch(f){e=!0}k.matchesSelector=function(a,c){c=c.replace(/\=\s*([^'"\]]*)\s*\]/g,"='$1']");if(!k.isXML(a))try{if(e||!l.match.PSEUDO.test(c)&&!/!=/.test(c)){var f=b.call(a,c);if(f||!d||a.document&&a.document.nodeType!==11)return f}}catch(g){}return k(c,null,null,[a]).length>0}}}(),function(){var a=c.createElement("div");a.innerHTML="<div class='test e'></div><div class='test'></div>";if(!!a.getElementsByClassName&&a.getElementsByClassName("e").length!==0){a.lastChild.className="e";if(a.getElementsByClassName("e").length===1)return;l.order.splice(1,0,"CLASS"),l.find.CLASS=function(a,b,c){if(typeof b.getElementsByClassName!="undefined"&&!c)return b.getElementsByClassName(a[1])},a=null}}(),c.documentElement.contains?k.contains=function(a,b){return a!==b&&(a.contains?a.contains(b):!0)}:c.documentElement.compareDocumentPosition?k.contains=function(a,b){return!!(a.compareDocumentPosition(b)&16)}:k.contains=function(){return!1},k.isXML=function(a){var b=(a?a.ownerDocument||a:0).documentElement;return b?b.nodeName!=="HTML":!1};var v=function(a,b){var c,d=[],e="",f=b.nodeType?[b]:b;while(c=l.match.PSEUDO.exec(a))e+=c[0],a=a.replace(l.match.PSEUDO,"");a=l.relative[a]?a+"*":a;for(var g=0,h=f.length;g<h;g++)k(a,f[g],d);return k.filter(e,d)};f.find=k,f.expr=k.selectors,f.expr[":"]=f.expr.filters,f.unique=k.uniqueSort,f.text=k.getText,f.isXMLDoc=k.isXML,f.contains=k.contains}();var P=/Until$/,Q=/^(?:parents|prevUntil|prevAll)/,R=/,/,S=/^.[^:#\[\.,]*$/,T=Array.prototype.slice,U=f.expr.match.POS,V={children:!0,contents:!0,next:!0,prev:!0};f.fn.extend({find:function(a){var b=this,c,d;if(typeof a!="string")return f(a).filter(function(){for(c=0,d=b.length;c<d;c++)if(f.contains(b[c],this))return!0});var e=this.pushStack("","find",a),g,h,i;for(c=0,d=this.length;c<d;c++){g=e.length,f.find(a,this[c],e);if(c>0)for(h=g;h<e.length;h++)for(i=0;i<g;i++)if(e[i]===e[h]){e.splice(h--,1);break}}return e},has:function(a){var b=f(a);return this.filter(function(){for(var a=0,c=b.length;a<c;a++)if(f.contains(this,b[a]))return!0})},not:function(a){return this.pushStack(X(this,a,!1),"not",a)},filter:function(a){return this.pushStack(X(this,a,!0),"filter",a)},is:function(a){return!!a&&(typeof a=="string"?f.filter(a,this).length>0:this.filter(a).length>0)},closest:function(a,b){var c=[],d,e,g=this[0];if(f.isArray(a)){var h,i,j={},k=1;if(g&&a.length){for(d=0,e=a.length;d<e;d++)i=a[d],j[i]||(j[i]=U.test(i)?f(i,b||this.context):i);while(g&&g.ownerDocument&&g!==b){for(i in j)h=j[i],(h.jquery?h.index(g)>-1:f(g).is(h))&&c.push({selector:i,elem:g,level:k});g=g.parentNode,k++}}return c}var l=U.test(a)||typeof a!="string"?f(a,b||this.context):0;for(d=0,e=this.length;d<e;d++){g=this[d];while(g){if(l?l.index(g)>-1:f.find.matchesSelector(g,a)){c.push(g);break}g=g.parentNode;if(!g||!g.ownerDocument||g===b||g.nodeType===11)break}}c=c.length>1?f.unique(c):c;return this.pushStack(c,"closest",a)},index:function(a){if(!a||typeof a=="string")return f.inArray(this[0],a?f(a):this.parent().children());return f.inArray(a.jquery?a[0]:a,this)},add:function(a,b){var c=typeof a=="string"?f(a,b):f.makeArray(a&&a.nodeType?[a]:a),d=f.merge(this.get(),c);return this.pushStack(W(c[0])||W(d[0])?d:f.unique(d))},andSelf:function(){return this.add(this.prevObject)}}),f.each({parent:function(a){var b=a.parentNode;return b&&b.nodeType!==11?b:null},parents:function(a){return f.dir(a,"parentNode")},parentsUntil:function(a,b,c){return f.dir(a,"parentNode",c)},next:function(a){return f.nth(a,2,"nextSibling")},prev:function(a){return f.nth(a,2,"previousSibling")},nextAll:function(a){return f.dir(a,"nextSibling")},prevAll:function(a){return f.dir(a,"previousSibling")},nextUntil:function(a,b,c){return f.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return f.dir(a,"previousSibling",c)},siblings:function(a){return f.sibling(a.parentNode.firstChild,a)},children:function(a){return f.sibling(a.firstChild)},contents:function(a){return f.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:f.makeArray(a.childNodes)}},function(a,b){f.fn[a]=function(c,d){var e=f.map(this,b,c),g=T.call(arguments);P.test(a)||(d=c),d&&typeof d=="string"&&(e=f.filter(d,e)),e=this.length>1&&!V[a]?f.unique(e):e,(this.length>1||R.test(d))&&Q.test(a)&&(e=e.reverse());return this.pushStack(e,a,g.join(","))}}),f.extend({filter:function(a,b,c){c&&(a=":not("+a+")");return b.length===1?f.find.matchesSelector(b[0],a)?[b[0]]:[]:f.find.matches(a,b)},dir:function(a,c,d){var e=[],g=a[c];while(g&&g.nodeType!==9&&(d===b||g.nodeType!==1||!f(g).is(d)))g.nodeType===1&&e.push(g),g=g[c];return e},nth:function(a,b,c,d){b=b||1;var e=0;for(;a;a=a[c])if(a.nodeType===1&&++e===b)break;return a},sibling:function(a,b){var c=[];for(;a;a=a.nextSibling)a.nodeType===1&&a!==b&&c.push(a);return c}});var Y=/ jQuery\d+="(?:\d+|null)"/g,Z=/^\s+/,$=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,_=/<([\w:]+)/,ba=/<tbody/i,bb=/<|&#?\w+;/,bc=/<(?:script|object|embed|option|style)/i,bd=/checked\s*(?:[^=]|=\s*.checked.)/i,be=/\/(java|ecma)script/i,bf=/^\s*<!(?:\[CDATA\[|\-\-)/,bg={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],area:[1,"<map>","</map>"],_default:[0,"",""]};bg.optgroup=bg.option,bg.tbody=bg.tfoot=bg.colgroup=bg.caption=bg.thead,bg.th=bg.td,f.support.htmlSerialize||(bg._default=[1,"div<div>","</div>"]),f.fn.extend({text:function(a){if(f.isFunction(a))return this.each(function(b){var c=f(this);c.text(a.call(this,b,c.text()))});if(typeof a!="object"&&a!==b)return this.empty().append((this[0]&&this[0].ownerDocument||c).createTextNode(a));return f.text(this)},wrapAll:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapAll(a.call(this,b))});if(this[0]){var b=f(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstChild&&a.firstChild.nodeType===1)a=a.firstChild;return a}).append(this)}return this},wrapInner:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapInner(a.call(this,b))});return this.each(function(){var b=f(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){return this.each(function(){f(this).wrapAll(a)})},unwrap:function(){return this.parent().each(function(){f.nodeName(this,"body")||f(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.appendChild(a)})},prepend:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.insertBefore(a,this.firstChild)})},before:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this)});if(arguments.length){var a=f(arguments[0]);a.push.apply(a,this.toArray());return this.pushStack(a,"before",arguments)}},after:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this.nextSibling)});if(arguments.length){var a=this.pushStack(this,"after",arguments);a.push.apply(a,f(arguments[0]).toArray());return a}},remove:function(a,b){for(var c=0,d;(d=this[c])!=null;c++)if(!a||f.filter(a,[d]).length)!b&&d.nodeType===1&&(f.cleanData(d.getElementsByTagName("*")),f.cleanData([d])),d.parentNode&&d.parentNode.removeChild(d);return this},empty:function(){for(var a=0,b;(b=this[a])!=null;a++){b.nodeType===1&&f.cleanData(b.getElementsByTagName("*"));while(b.firstChild)b.removeChild(b.firstChild)}return this},clone:function(a,b){a=a==null?!1:a,b=b==null?a:b;return this.map(function(){return f.clone(this,a,b)})},html:function(a){if(a===b)return this[0]&&this[0].nodeType===1?this[0].innerHTML.replace(Y,""):null;if(typeof a=="string"&&!bc.test(a)&&(f.support.leadingWhitespace||!Z.test(a))&&!bg[(_.exec(a)||["",""])[1].toLowerCase()]){a=a.replace($,"<$1></$2>");try{for(var c=0,d=this.length;c<d;c++)this[c].nodeType===1&&(f.cleanData(this[c].getElementsByTagName("*")),this[c].innerHTML=a)}catch(e){this.empty().append(a)}}else f.isFunction(a)?this.each(function(b){var c=f(this);c.html(a.call(this,b,c.html()))}):this.empty().append(a);return this},replaceWith:function(a){if(this[0]&&this[0].parentNode){if(f.isFunction(a))return this.each(function(b){var c=f(this),d=c.html();c.replaceWith(a.call(this,b,d))});typeof a!="string"&&(a=f(a).detach());return this.each(function(){var b=this.nextSibling,c=this.parentNode;f(this).remove(),b?f(b).before(a):f(c).append(a)})}return this.length?this.pushStack(f(f.isFunction(a)?a():a),"replaceWith",a):this},detach:function(a){return this.remove(a,!0)},domManip:function(a,c,d){var e,g,h,i,j=a[0],k=[];if(!f.support.checkClone&&arguments.length===3&&typeof j=="string"&&bd.test(j))return this.each(function(){f(this).domManip(a,c,d,!0)});if(f.isFunction(j))return this.each(function(e){var g=f(this);a[0]=j.call(this,e,c?g.html():b),g.domManip(a,c,d)});if(this[0]){i=j&&j.parentNode,f.support.parentNode&&i&&i.nodeType===11&&i.childNodes.length===this.length?e={fragment:i}:e=f.buildFragment(a,this,k),h=e.fragment,h.childNodes.length===1?g=h=h.firstChild:g=h.firstChild;if(g){c=c&&f.nodeName(g,"tr");for(var l=0,m=this.length,n=m-1;l<m;l++)d.call(c?bh(this[l],g):this[l],e.cacheable||m>1&&l<n?f.clone(h,!0,!0):h)}k.length&&f.each(k,bn)}return this}}),f.buildFragment=function(a,b,d){var e,g,h,i=b&&b[0]?b[0].ownerDocument||b[0]:c;a.length===1&&typeof a[0]=="string"&&a[0].length<512&&i===c&&a[0].charAt(0)==="<"&&!bc.test(a[0])&&(f.support.checkClone||!bd.test(a[0]))&&(g=!0,h=f.fragments[a[0]],h&&h!==1&&(e=h)),e||(e=i.createDocumentFragment(),f.clean(a,i,e,d)),g&&(f.fragments[a[0]]=h?e:1);return{fragment:e,cacheable:g}},f.fragments={},f.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){f.fn[a]=function(c){var d=[],e=f(c),g=this.length===1&&this[0].parentNode;if(g&&g.nodeType===11&&g.childNodes.length===1&&e.length===1){e[b](this[0]);return this}for(var h=0,i=e.length;h<i;h++){var j=(h>0?this.clone(!0):this).get();f(e[h])[b](j),d=d.concat(j)}return this.pushStack(d,a,e.selector)}}),f.extend({clone:function(a,b,c){var d=a.cloneNode(!0),e,g,h;if((!f.support.noCloneEvent||!f.support.noCloneChecked)&&(a.nodeType===1||a.nodeType===11)&&!f.isXMLDoc(a)){bj(a,d),e=bk(a),g=bk(d);for(h=0;e[h];++h)bj(e[h],g[h])}if(b){bi(a,d);if(c){e=bk(a),g=bk(d);for(h=0;e[h];++h)bi(e[h],g[h])}}return d},clean:function(a,b,d,e){var g;b=b||c,typeof b.createElement=="undefined"&&(b=b.ownerDocument||
b[0]&&b[0].ownerDocument||c);var h=[],i;for(var j=0,k;(k=a[j])!=null;j++){typeof k=="number"&&(k+="");if(!k)continue;if(typeof k=="string")if(!bb.test(k))k=b.createTextNode(k);else{k=k.replace($,"<$1></$2>");var l=(_.exec(k)||["",""])[1].toLowerCase(),m=bg[l]||bg._default,n=m[0],o=b.createElement("div");o.innerHTML=m[1]+k+m[2];while(n--)o=o.lastChild;if(!f.support.tbody){var p=ba.test(k),q=l==="table"&&!p?o.firstChild&&o.firstChild.childNodes:m[1]==="<table>"&&!p?o.childNodes:[];for(i=q.length-1;i>=0;--i)f.nodeName(q[i],"tbody")&&!q[i].childNodes.length&&q[i].parentNode.removeChild(q[i])}!f.support.leadingWhitespace&&Z.test(k)&&o.insertBefore(b.createTextNode(Z.exec(k)[0]),o.firstChild),k=o.childNodes}var r;if(!f.support.appendChecked)if(k[0]&&typeof (r=k.length)=="number")for(i=0;i<r;i++)bm(k[i]);else bm(k);k.nodeType?h.push(k):h=f.merge(h,k)}if(d){g=function(a){return!a.type||be.test(a.type)};for(j=0;h[j];j++)if(e&&f.nodeName(h[j],"script")&&(!h[j].type||h[j].type.toLowerCase()==="text/javascript"))e.push(h[j].parentNode?h[j].parentNode.removeChild(h[j]):h[j]);else{if(h[j].nodeType===1){var s=f.grep(h[j].getElementsByTagName("script"),g);h.splice.apply(h,[j+1,0].concat(s))}d.appendChild(h[j])}}return h},cleanData:function(a){var b,c,d=f.cache,e=f.expando,g=f.event.special,h=f.support.deleteExpando;for(var i=0,j;(j=a[i])!=null;i++){if(j.nodeName&&f.noData[j.nodeName.toLowerCase()])continue;c=j[f.expando];if(c){b=d[c]&&d[c][e];if(b&&b.events){for(var k in b.events)g[k]?f.event.remove(j,k):f.removeEvent(j,k,b.handle);b.handle&&(b.handle.elem=null)}h?delete j[f.expando]:j.removeAttribute&&j.removeAttribute(f.expando),delete d[c]}}}});var bo=/alpha\([^)]*\)/i,bp=/opacity=([^)]*)/,bq=/-([a-z])/ig,br=/([A-Z]|^ms)/g,bs=/^-?\d+(?:px)?$/i,bt=/^-?\d/,bu=/^[+\-]=/,bv=/[^+\-\.\de]+/g,bw={position:"absolute",visibility:"hidden",display:"block"},bx=["Left","Right"],by=["Top","Bottom"],bz,bA,bB,bC=function(a,b){return b.toUpperCase()};f.fn.css=function(a,c){if(arguments.length===2&&c===b)return this;return f.access(this,a,c,!0,function(a,c,d){return d!==b?f.style(a,c,d):f.css(a,c)})},f.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=bz(a,"opacity","opacity");return c===""?"1":c}return a.style.opacity}}},cssNumber:{zIndex:!0,fontWeight:!0,opacity:!0,zoom:!0,lineHeight:!0,widows:!0,orphans:!0},cssProps:{"float":f.support.cssFloat?"cssFloat":"styleFloat"},style:function(a,c,d,e){if(!!a&&a.nodeType!==3&&a.nodeType!==8&&!!a.style){var g,h,i=f.camelCase(c),j=a.style,k=f.cssHooks[i];c=f.cssProps[i]||i;if(d===b){if(k&&"get"in k&&(g=k.get(a,!1,e))!==b)return g;return j[c]}h=typeof d;if(h==="number"&&isNaN(d)||d==null)return;h==="string"&&bu.test(d)&&(d=+d.replace(bv,"")+parseFloat(f.css(a,c))),h==="number"&&!f.cssNumber[i]&&(d+="px");if(!k||!("set"in k)||(d=k.set(a,d))!==b)try{j[c]=d}catch(l){}}},css:function(a,c,d){var e,g;c=f.camelCase(c),g=f.cssHooks[c],c=f.cssProps[c]||c,c==="cssFloat"&&(c="float");if(g&&"get"in g&&(e=g.get(a,!0,d))!==b)return e;if(bz)return bz(a,c)},swap:function(a,b,c){var d={};for(var e in b)d[e]=a.style[e],a.style[e]=b[e];c.call(a);for(e in b)a.style[e]=d[e]},camelCase:function(a){return a.replace(bq,bC)}}),f.curCSS=f.css,f.each(["height","width"],function(a,b){f.cssHooks[b]={get:function(a,c,d){var e;if(c){a.offsetWidth!==0?e=bD(a,b,d):f.swap(a,bw,function(){e=bD(a,b,d)});if(e<=0){e=bz(a,b,b),e==="0px"&&bB&&(e=bB(a,b,b));if(e!=null)return e===""||e==="auto"?"0px":e}if(e<0||e==null){e=a.style[b];return e===""||e==="auto"?"0px":e}return typeof e=="string"?e:e+"px"}},set:function(a,b){if(!bs.test(b))return b;b=parseFloat(b);if(b>=0)return b+"px"}}}),f.support.opacity||(f.cssHooks.opacity={get:function(a,b){return bp.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?parseFloat(RegExp.$1)/100+"":b?"1":""},set:function(a,b){var c=a.style,d=a.currentStyle;c.zoom=1;var e=f.isNaN(b)?"":"alpha(opacity="+b*100+")",g=d&&d.filter||c.filter||"";c.filter=bo.test(g)?g.replace(bo,e):g+" "+e}}),f(function(){f.support.reliableMarginRight||(f.cssHooks.marginRight={get:function(a,b){var c;f.swap(a,{display:"inline-block"},function(){b?c=bz(a,"margin-right","marginRight"):c=a.style.marginRight});return c}})}),c.defaultView&&c.defaultView.getComputedStyle&&(bA=function(a,c){var d,e,g;c=c.replace(br,"-$1").toLowerCase();if(!(e=a.ownerDocument.defaultView))return b;if(g=e.getComputedStyle(a,null))d=g.getPropertyValue(c),d===""&&!f.contains(a.ownerDocument.documentElement,a)&&(d=f.style(a,c));return d}),c.documentElement.currentStyle&&(bB=function(a,b){var c,d=a.currentStyle&&a.currentStyle[b],e=a.runtimeStyle&&a.runtimeStyle[b],f=a.style;!bs.test(d)&&bt.test(d)&&(c=f.left,e&&(a.runtimeStyle.left=a.currentStyle.left),f.left=b==="fontSize"?"1em":d||0,d=f.pixelLeft+"px",f.left=c,e&&(a.runtimeStyle.left=e));return d===""?"auto":d}),bz=bA||bB,f.expr&&f.expr.filters&&(f.expr.filters.hidden=function(a){var b=a.offsetWidth,c=a.offsetHeight;return b===0&&c===0||!f.support.reliableHiddenOffsets&&(a.style.display||f.css(a,"display"))==="none"},f.expr.filters.visible=function(a){return!f.expr.filters.hidden(a)});var bE=/%20/g,bF=/\[\]$/,bG=/\r?\n/g,bH=/#.*$/,bI=/^(.*?):[ \t]*([^\r\n]*)\r?$/mg,bJ=/^(?:color|date|datetime|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,bK=/^(?:about|app|app\-storage|.+\-extension|file|widget):$/,bL=/^(?:GET|HEAD)$/,bM=/^\/\//,bN=/\?/,bO=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,bP=/^(?:select|textarea)/i,bQ=/\s+/,bR=/([?&])_=[^&]*/,bS=/^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+))?)?/,bT=f.fn.load,bU={},bV={},bW,bX;try{bW=e.href}catch(bY){bW=c.createElement("a"),bW.href="",bW=bW.href}bX=bS.exec(bW.toLowerCase())||[],f.fn.extend({load:function(a,c,d){if(typeof a!="string"&&bT)return bT.apply(this,arguments);if(!this.length)return this;var e=a.indexOf(" ");if(e>=0){var g=a.slice(e,a.length);a=a.slice(0,e)}var h="GET";c&&(f.isFunction(c)?(d=c,c=b):typeof c=="object"&&(c=f.param(c,f.ajaxSettings.traditional),h="POST"));var i=this;f.ajax({url:a,type:h,dataType:"html",data:c,complete:function(a,b,c){c=a.responseText,a.isResolved()&&(a.done(function(a){c=a}),i.html(g?f("<div>").append(c.replace(bO,"")).find(g):c)),d&&i.each(d,[c,b,a])}});return this},serialize:function(){return f.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?f.makeArray(this.elements):this}).filter(function(){return this.name&&!this.disabled&&(this.checked||bP.test(this.nodeName)||bJ.test(this.type))}).map(function(a,b){var c=f(this).val();return c==null?null:f.isArray(c)?f.map(c,function(a,c){return{name:b.name,value:a.replace(bG,"\r\n")}}):{name:b.name,value:c.replace(bG,"\r\n")}}).get()}}),f.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(a,b){f.fn[b]=function(a){return this.bind(b,a)}}),f.each(["get","post"],function(a,c){f[c]=function(a,d,e,g){f.isFunction(d)&&(g=g||e,e=d,d=b);return f.ajax({type:c,url:a,data:d,success:e,dataType:g})}}),f.extend({getScript:function(a,c){return f.get(a,b,c,"script")},getJSON:function(a,b,c){return f.get(a,b,c,"json")},ajaxSetup:function(a,b){b?f.extend(!0,a,f.ajaxSettings,b):(b=a,a=f.extend(!0,f.ajaxSettings,b));for(var c in{context:1,url:1})c in b?a[c]=b[c]:c in f.ajaxSettings&&(a[c]=f.ajaxSettings[c]);return a},ajaxSettings:{url:bW,isLocal:bK.test(bX[1]),global:!0,type:"GET",contentType:"application/x-www-form-urlencoded",processData:!0,async:!0,accepts:{xml:"application/xml, text/xml",html:"text/html",text:"text/plain",json:"application/json, text/javascript","*":"*/*"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":a.String,"text html":!0,"text json":f.parseJSON,"text xml":f.parseXML}},ajaxPrefilter:bZ(bU),ajaxTransport:bZ(bV),ajax:function(a,c){function w(a,c,l,m){if(s!==2){s=2,q&&clearTimeout(q),p=b,n=m||"",v.readyState=a?4:0;var o,r,u,w=l?ca(d,v,l):b,x,y;if(a>=200&&a<300||a===304){if(d.ifModified){if(x=v.getResponseHeader("Last-Modified"))f.lastModified[k]=x;if(y=v.getResponseHeader("Etag"))f.etag[k]=y}if(a===304)c="notmodified",o=!0;else try{r=cb(d,w),c="success",o=!0}catch(z){c="parsererror",u=z}}else{u=c;if(!c||a)c="error",a<0&&(a=0)}v.status=a,v.statusText=c,o?h.resolveWith(e,[r,c,v]):h.rejectWith(e,[v,c,u]),v.statusCode(j),j=b,t&&g.trigger("ajax"+(o?"Success":"Error"),[v,d,o?r:u]),i.resolveWith(e,[v,c]),t&&(g.trigger("ajaxComplete",[v,d]),--f.active||f.event.trigger("ajaxStop"))}}typeof a=="object"&&(c=a,a=b),c=c||{};var d=f.ajaxSetup({},c),e=d.context||d,g=e!==d&&(e.nodeType||e instanceof f)?f(e):f.event,h=f.Deferred(),i=f._Deferred(),j=d.statusCode||{},k,l={},m={},n,o,p,q,r,s=0,t,u,v={readyState:0,setRequestHeader:function(a,b){if(!s){var c=a.toLowerCase();a=m[c]=m[c]||a,l[a]=b}return this},getAllResponseHeaders:function(){return s===2?n:null},getResponseHeader:function(a){var c;if(s===2){if(!o){o={};while(c=bI.exec(n))o[c[1].toLowerCase()]=c[2]}c=o[a.toLowerCase()]}return c===b?null:c},overrideMimeType:function(a){s||(d.mimeType=a);return this},abort:function(a){a=a||"abort",p&&p.abort(a),w(0,a);return this}};h.promise(v),v.success=v.done,v.error=v.fail,v.complete=i.done,v.statusCode=function(a){if(a){var b;if(s<2)for(b in a)j[b]=[j[b],a[b]];else b=a[v.status],v.then(b,b)}return this},d.url=((a||d.url)+"").replace(bH,"").replace(bM,bX[1]+"//"),d.dataTypes=f.trim(d.dataType||"*").toLowerCase().split(bQ),d.crossDomain==null&&(r=bS.exec(d.url.toLowerCase()),d.crossDomain=!(!r||r[1]==bX[1]&&r[2]==bX[2]&&(r[3]||(r[1]==="http:"?80:443))==(bX[3]||(bX[1]==="http:"?80:443)))),d.data&&d.processData&&typeof d.data!="string"&&(d.data=f.param(d.data,d.traditional)),b$(bU,d,c,v);if(s===2)return!1;t=d.global,d.type=d.type.toUpperCase(),d.hasContent=!bL.test(d.type),t&&f.active++===0&&f.event.trigger("ajaxStart");if(!d.hasContent){d.data&&(d.url+=(bN.test(d.url)?"&":"?")+d.data),k=d.url;if(d.cache===!1){var x=f.now(),y=d.url.replace(bR,"$1_="+x);d.url=y+(y===d.url?(bN.test(d.url)?"&":"?")+"_="+x:"")}}(d.data&&d.hasContent&&d.contentType!==!1||c.contentType)&&v.setRequestHeader("Content-Type",d.contentType),d.ifModified&&(k=k||d.url,f.lastModified[k]&&v.setRequestHeader("If-Modified-Since",f.lastModified[k]),f.etag[k]&&v.setRequestHeader("If-None-Match",f.etag[k])),v.setRequestHeader("Accept",d.dataTypes[0]&&d.accepts[d.dataTypes[0]]?d.accepts[d.dataTypes[0]]+(d.dataTypes[0]!=="*"?", */*; q=0.01":""):d.accepts["*"]);for(u in d.headers)v.setRequestHeader(u,d.headers[u]);if(d.beforeSend&&(d.beforeSend.call(e,v,d)===!1||s===2)){v.abort();return!1}for(u in{success:1,error:1,complete:1})v[u](d[u]);p=b$(bV,d,c,v);if(!p)w(-1,"No Transport");else{v.readyState=1,t&&g.trigger("ajaxSend",[v,d]),d.async&&d.timeout>0&&(q=setTimeout(function(){v.abort("timeout")},d.timeout));try{s=1,p.send(l,w)}catch(z){status<2?w(-1,z):f.error(z)}}return v},param:function(a,c){var d=[],e=function(a,b){b=f.isFunction(b)?b():b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};c===b&&(c=f.ajaxSettings.traditional);if(f.isArray(a)||a.jquery&&!f.isPlainObject(a))f.each(a,function(){e(this.name,this.value)});else for(var g in a)b_(g,a[g],c,e);return d.join("&").replace(bE,"+")}}),f.extend({active:0,lastModified:{},etag:{}});var cc=f.now(),cd=/(\=)\?(&|$)|\?\?/i;f.ajaxSetup({jsonp:"callback",jsonpCallback:function(){return f.expando+"_"+cc++}}),f.ajaxPrefilter("json jsonp",function(b,c,d){var e=b.contentType==="application/x-www-form-urlencoded"&&typeof b.data=="string";if(b.dataTypes[0]==="jsonp"||b.jsonp!==!1&&(cd.test(b.url)||e&&cd.test(b.data))){var g,h=b.jsonpCallback=f.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,i=a[h],j=b.url,k=b.data,l="$1"+h+"$2";b.jsonp!==!1&&(j=j.replace(cd,l),b.url===j&&(e&&(k=k.replace(cd,l)),b.data===k&&(j+=(/\?/.test(j)?"&":"?")+b.jsonp+"="+h))),b.url=j,b.data=k,a[h]=function(a){g=[a]},d.always(function(){a[h]=i,g&&f.isFunction(i)&&a[h](g[0])}),b.converters["script json"]=function(){g||f.error(h+" was not called");return g[0]},b.dataTypes[0]="json";return"script"}}),f.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/javascript|ecmascript/},converters:{"text script":function(a){f.globalEval(a);return a}}}),f.ajaxPrefilter("script",function(a){a.cache===b&&(a.cache=!1),a.crossDomain&&(a.type="GET",a.global=!1)}),f.ajaxTransport("script",function(a){if(a.crossDomain){var d,e=c.head||c.getElementsByTagName("head")[0]||c.documentElement;return{send:function(f,g){d=c.createElement("script"),d.async="async",a.scriptCharset&&(d.charset=a.scriptCharset),d.src=a.url,d.onload=d.onreadystatechange=function(a,c){if(c||!d.readyState||/loaded|complete/.test(d.readyState))d.onload=d.onreadystatechange=null,e&&d.parentNode&&e.removeChild(d),d=b,c||g(200,"success")},e.insertBefore(d,e.firstChild)},abort:function(){d&&d.onload(0,1)}}}});var ce=a.ActiveXObject?function(){for(var a in cg)cg[a](0,1)}:!1,cf=0,cg;f.ajaxSettings.xhr=a.ActiveXObject?function(){return!this.isLocal&&ch()||ci()}:ch,function(a){f.extend(f.support,{ajax:!!a,cors:!!a&&"withCredentials"in a})}(f.ajaxSettings.xhr()),f.support.ajax&&f.ajaxTransport(function(c){if(!c.crossDomain||f.support.cors){var d;return{send:function(e,g){var h=c.xhr(),i,j;c.username?h.open(c.type,c.url,c.async,c.username,c.password):h.open(c.type,c.url,c.async);if(c.xhrFields)for(j in c.xhrFields)h[j]=c.xhrFields[j];c.mimeType&&h.overrideMimeType&&h.overrideMimeType(c.mimeType),!c.crossDomain&&!e["X-Requested-With"]&&(e["X-Requested-With"]="XMLHttpRequest");try{for(j in e)h.setRequestHeader(j,e[j])}catch(k){}h.send(c.hasContent&&c.data||null),d=function(a,e){var j,k,l,m,n;try{if(d&&(e||h.readyState===4)){d=b,i&&(h.onreadystatechange=f.noop,ce&&delete cg[i]);if(e)h.readyState!==4&&h.abort();else{j=h.status,l=h.getAllResponseHeaders(),m={},n=h.responseXML,n&&n.documentElement&&(m.xml=n),m.text=h.responseText;try{k=h.statusText}catch(o){k=""}!j&&c.isLocal&&!c.crossDomain?j=m.text?200:404:j===1223&&(j=204)}}}catch(p){e||g(-1,p)}m&&g(j,k,m,l)},!c.async||h.readyState===4?d():(i=++cf,ce&&(cg||(cg={},f(a).unload(ce)),cg[i]=d),h.onreadystatechange=d)},abort:function(){d&&d(0,1)}}}});var cj={},ck,cl,cm=/^(?:toggle|show|hide)$/,cn=/^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,co,cp=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]],cq,cr=a.webkitRequestAnimationFrame||a.mozRequestAnimationFrame||a.oRequestAnimationFrame;f.fn.extend({show:function(a,b,c){var d,e;if(a||a===0)return this.animate(cu("show",3),a,b,c);for(var g=0,h=this.length;g<h;g++)d=this[g],d.style&&(e=d.style.display,!f._data(d,"olddisplay")&&e==="none"&&(e=d.style.display=""),e===""&&f.css(d,"display")==="none"&&f._data(d,"olddisplay",cv(d.nodeName)));for(g=0;g<h;g++){d=this[g];if(d.style){e=d.style.display;if(e===""||e==="none")d.style.display=f._data(d,"olddisplay")||""}}return this},hide:function(a,b,c){if(a||a===0)return this.animate(cu("hide",3),a,b,c);for(var d=0,e=this.length;d<e;d++)if(this[d].style){var g=f.css(this[d],"display");g!=="none"&&!f._data(this[d],"olddisplay")&&f._data(this[d],"olddisplay",g)}for(d=0;d<e;d++)this[d].style&&(this[d].style.display="none");return this},_toggle:f.fn.toggle,toggle:function(a,b,c){var d=typeof a=="boolean";f.isFunction(a)&&f.isFunction(b)?this._toggle.apply(this,arguments):a==null||d?this.each(function(){var b=d?a:f(this).is(":hidden");f(this)[b?"show":"hide"]()}):this.animate(cu("toggle",3),a,b,c);return this},fadeTo:function(a,b,c,d){return this.filter(":hidden").css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=f.speed(b,c,d);if(f.isEmptyObject(a))return this.each(e.complete,[!1]);a=f.extend({},a);return this[e.queue===!1?"each":"queue"](function(){e.queue===!1&&f._mark(this);var b=f.extend({},e),c=this.nodeType===1,d=c&&f(this).is(":hidden"),g,h,i,j,k,l,m,n,o;b.animatedProperties={};for(i in a){g=f.camelCase(i),i!==g&&(a[g]=a[i],delete a[i]),h=a[g],f.isArray(h)?(b.animatedProperties[g]=h[1],h=a[g]=h[0]):b.animatedProperties[g]=b.specialEasing&&b.specialEasing[g]||b.easing||"swing";if(h==="hide"&&d||h==="show"&&!d)return b.complete.call(this);c&&(g==="height"||g==="width")&&(b.overflow=[this.style.overflow,this.style.overflowX,this.style.overflowY],f.css(this,"display")==="inline"&&f.css(this,"float")==="none"&&(f.support.inlineBlockNeedsLayout?(j=cv(this.nodeName),j==="inline"?this.style.display="inline-block":(this.style.display="inline",this.style.zoom=1)):this.style.display="inline-block"))}b.overflow!=null&&(this.style.overflow="hidden");for(i in a)k=new f.fx(this,b,i),h=a[i],cm.test(h)?k[h==="toggle"?d?"show":"hide":h]():(l=cn.exec(h),m=k.cur(),l?(n=parseFloat(l[2]),o=l[3]||(f.cssNumber[i]?"":"px"),o!=="px"&&(f.style(this,i,(n||1)+o),m=(n||1)/k.cur()*m,f.style(this,i,m+o)),l[1]&&(n=(l[1]==="-="?-1:1)*n+m),k.custom(m,n,o)):k.custom(m,h,""));return!0})},stop:function(a,b){a&&this.queue([]),this.each(function(){var a=f.timers,c=a.length;b||f._unmark(!0,this);while(c--)a[c].elem===this&&(b&&a[c](!0),a.splice(c,1))}),b||this.dequeue();return this}}),f.each({slideDown:cu("show",1),slideUp:cu("hide",1),slideToggle:cu("toggle",1),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){f.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),f.extend({speed:function(a,b,c){var d=a&&typeof a=="object"?f.extend({},a):{complete:c||!c&&b||f.isFunction(a)&&a,duration:a,easing:c&&b||b&&!f.isFunction(b)&&b};d.duration=f.fx.off?0:typeof d.duration=="number"?d.duration:d.duration in f.fx.speeds?f.fx.speeds[d.duration]:f.fx.speeds._default,d.old=d.complete,d.complete=function(a){d.queue!==!1?f.dequeue(this):a!==!1&&f._unmark(this),f.isFunction(d.old)&&d.old.call(this)};return d},easing:{linear:function(a,b,c,d){return c+d*a},swing:function(a,b,c,d){return(-Math.cos(a*Math.PI)/2+.5)*d+c}},timers:[],fx:function(a,b,c){this.options=b,this.elem=a,this.prop=c,b.orig=b.orig||{}}}),f.fx.prototype={update:function(){this.options.step&&this.options.step.call(this.elem,this.now,this),(f.fx.step[this.prop]||f.fx.step._default)(this)},cur:function(){if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==null))return this.elem[this.prop];var a,b=f.css(this.elem,this.prop);return isNaN(a=parseFloat(b))?!b||b==="auto"?0:b:a},custom:function(a,b,c){function h(a){return d.step(a)}var d=this,e=f.fx,g;this.startTime=cq||cs(),this.start=a,this.end=b,this.unit=c||this.unit||(f.cssNumber[this.prop]?"":"px"),this.now=this.start,this.pos=this.state=0,h.elem=this.elem,h()&&f.timers.push(h)&&!co&&(cr?(co=1,g=function(){co&&(cr(g),e.tick())},cr(g)):co=setInterval(e.tick,e.interval))},show:function(){this.options.orig[this.prop]=f.style(this.elem,this.prop),this.options.show=!0,this.custom(this.prop==="width"||this.prop==="height"?1:0,this.cur()),f(this.elem).show()},hide:function(){this.options.orig[this.prop]=f.style(this.elem,this.prop),this.options.hide=!0,this.custom(this.cur(),0)},step:function(a){var b=cq||cs(),c=!0,d=this.elem,e=this.options,g,h;if(a||b>=e.duration+this.startTime){this.now=this.end,this.pos=this.state=1,this.update(),e.animatedProperties[this.prop]=!0;for(g in e.animatedProperties)e.animatedProperties[g]!==!0&&(c=!1);if(c){e.overflow!=null&&!f.support.shrinkWrapBlocks&&f.each(["","X","Y"],function(a,b){d.style["overflow"+b]=e.overflow[a]}),e.hide&&f(d).hide();if(e.hide||e.show)for(var i in e.animatedProperties)f.style(d,i,e.orig[i]);e.complete.call(d)}return!1}e.duration==Infinity?this.now=b:(h=b-this.startTime,this.state=h/e.duration,this.pos=f.easing[e.animatedProperties[this.prop]](this.state,h,0,1,e.duration),this.now=this.start+(this.end-this.start)*this.pos),this.update();return!0}},f.extend(f.fx,{tick:function(){for(var a=f.timers,b=0;b<a.length;++b)a[b]()||a.splice(b--,1);a.length||f.fx.stop()},interval:13,stop:function(){clearInterval(co),co=null},speeds:{slow:600,fast:200,_default:400},step:{opacity:function(a){f.style(a.elem,"opacity",a.now)},_default:function(a){a.elem.style&&a.elem.style[a.prop]!=null?a.elem.style[a.prop]=(a.prop==="width"||a.prop==="height"?Math.max(0,a.now):a.now)+a.unit:a.elem[a.prop]=a.now}}}),f.expr&&f.expr.filters&&(f.expr.filters.animated=function(a){return f.grep(f.timers,function(b){return a===b.elem}).length});var cw=/^t(?:able|d|h)$/i,cx=/^(?:body|html)$/i;"getBoundingClientRect"in c.documentElement?f.fn.offset=function(a){var b=this[0],c;if(a)return this.each(function(b){f.offset.setOffset(this,a,b)});if(!b||!b.ownerDocument)return null;if(b===b.ownerDocument.body)return f.offset.bodyOffset(b);try{c=b.getBoundingClientRect()}catch(d){}var e=b.ownerDocument,g=e.documentElement;if(!c||!f.contains(g,b))return c?{top:c.top,left:c.left}:{top:0,left:0};var h=e.body,i=cy(e),j=g.clientTop||h.clientTop||0,k=g.clientLeft||h.clientLeft||0,l=i.pageYOffset||f.support.boxModel&&g.scrollTop||h.scrollTop,m=i.pageXOffset||f.support.boxModel&&g.scrollLeft||h.scrollLeft,n=c.top+l-j,o=c.left+m-k;return{top:n,left:o}}:f.fn.offset=function(a){var b=this[0];if(a)return this.each(function(b){f.offset.setOffset(this,a,b)});if(!b||!b.ownerDocument)return null;if(b===b.ownerDocument.body)return f.offset.bodyOffset(b);f.offset.initialize();var c,d=b.offsetParent,e=b,g=b.ownerDocument,h=g.documentElement,i=g.body,j=g.defaultView,k=j?j.getComputedStyle(b,null):b.currentStyle,l=b.offsetTop,m=b.offsetLeft;while((b=b.parentNode)&&b!==i&&b!==h){if(f.offset.supportsFixedPosition&&k.position==="fixed")break;c=j?j.getComputedStyle(b,null):b.currentStyle,l-=b.scrollTop,m-=b.scrollLeft,b===d&&(l+=b.offsetTop,m+=b.offsetLeft,f.offset.doesNotAddBorder&&(!f.offset.doesAddBorderForTableAndCells||!cw.test(b.nodeName))&&(l+=parseFloat(c.borderTopWidth)||0,m+=parseFloat(c.borderLeftWidth)||0),e=d,d=b.offsetParent),f.offset.subtractsBorderForOverflowNotVisible&&c.overflow!=="visible"&&(l+=parseFloat(c.borderTopWidth)||0,m+=parseFloat(c.borderLeftWidth)||0),k=c}if(k.position==="relative"||k.position==="static")l+=i.offsetTop,m+=i.offsetLeft;f.offset.supportsFixedPosition&&k.position==="fixed"&&(l+=Math.max(h.scrollTop,i.scrollTop),m+=Math.max(h.scrollLeft,i.scrollLeft));return{top:l,left:m}},f.offset={initialize:function(){var a=c.body,b=c.createElement("div"),d,e,g,h,i=parseFloat(f.css(a,"marginTop"))||0,j="<div style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;'><div></div></div><table style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;' cellpadding='0' cellspacing='0'><tr><td></td></tr></table>";f.extend(b.style,{position:"absolute",top:0,left:0,margin:0,border:0,width:"1px",height:"1px",visibility:"hidden"}),b.innerHTML=j,a.insertBefore(b,a.firstChild),d=b.firstChild,e=d.firstChild,h=d.nextSibling.firstChild.firstChild,this.doesNotAddBorder=e.offsetTop!==5,this.doesAddBorderForTableAndCells=h.offsetTop===5,e.style.position="fixed",e.style.top="20px",this.supportsFixedPosition=e.offsetTop===20||e.offsetTop===15,e.style.position=e.style.top="",d.style.overflow="hidden",d.style.position="relative",this.subtractsBorderForOverflowNotVisible=e.offsetTop===-5,this.doesNotIncludeMarginInBodyOffset=a.offsetTop!==i,a.removeChild(b),f.offset.initialize=f.noop},bodyOffset:function(a){var b=a.offsetTop,c=a.offsetLeft;f.offset.initialize(),f.offset.doesNotIncludeMarginInBodyOffset&&(b+=parseFloat(f.css(a,"marginTop"))||0,c+=parseFloat(f.css(a,"marginLeft"))||0);return{top:b,left:c}},setOffset:function(a,b,c){var d=f.css(a,"position");d==="static"&&(a.style.position="relative");var e=f(a),g=e.offset(),h=f.css(a,"top"),i=f.css(a,"left"),j=(d==="absolute"||d==="fixed")&&f.inArray("auto",[h,i])>-1,k={},l={},m,n;j?(l=e.position(),m=l.top,n=l.left):(m=parseFloat(h)||0,n=parseFloat(i)||0),f.isFunction(b)&&(b=b.call(a,c,g)),b.top!=null&&(k.top=b.top-g.top+m),b.left!=null&&(k.left=b.left-g.left+n),"using"in b?b.using.call(a,k):e.css(k)}},f.fn.extend({position:function(){if(!this[0])return null;var a=this[0],b=this.offsetParent(),c=this.offset(),d=cx.test(b[0].nodeName)?{top:0,left:0}:b.offset();c.top-=parseFloat(f.css(a,"marginTop"))||0,c.left-=parseFloat(f.css(a,"marginLeft"))||0,d.top+=parseFloat(f.css(b[0],"borderTopWidth"))||0,d.left+=parseFloat(f.css(b[0],"borderLeftWidth"))||0;return{top:c.top-d.top,left:c.left-d.left}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||c.body;while(a&&!cx.test(a.nodeName)&&f.css(a,"position")==="static")a=a.offsetParent;return a})}}),f.each(["Left","Top"],function(a,c){var d="scroll"+c;f.fn[d]=function(c){var e,g;if(c===b){e=this[0];if(!e)return null;g=cy(e);return g?"pageXOffset"in g?g[a?"pageYOffset":"pageXOffset"]:f.support.boxModel&&g.document.documentElement[d]||g.document.body[d]:e[d]}return this.each(function(){g=cy(this),g?g.scrollTo(a?f(g).scrollLeft():c,a?c:f(g).scrollTop()):this[d]=c})}}),f.each(["Height","Width"],function(a,c){var d=c.toLowerCase();f.fn["inner"+c]=function(){return this[0]?parseFloat(f.css(this[0],d,"padding")):null},f.fn["outer"+c]=function(a){return this[0]?parseFloat(f.css(this[0],d,a?"margin":"border")):null},f.fn[d]=function(a){var e=this[0];if(!e)return a==null?null:this;if(f.isFunction(a))return this.each(function(b){var c=f(this);c[d](a.call(this,b,c[d]()))});if(f.isWindow(e)){var g=e.document.documentElement["client"+c];return e.document.compatMode==="CSS1Compat"&&g||e.document.body["client"+c]||g}if(e.nodeType===9)return Math.max(e.documentElement["client"+c],e.body["scroll"+c],e.documentElement["scroll"+c],e.body["offset"+c],e.documentElement["offset"+c]);if(a===b){var h=f.css(e,d),i=parseFloat(h);return f.isNaN(i)?h:i}return this.css(d,typeof a=="string"?a:a+"px")}}),a.jQuery=a.$=f})(window);

/**    Simple Date Picker
	the script only works on "input [type=text]"

**/

// don't declare anything out here in the global namespace

(function(f){var c=new Date();var b="January,February,March,April,May,June,July,August,September,October,November,December".split(",");var e="31,28,31,30,31,30,31,31,30,31,30,31".split(",");var d=/^\d{1,2}\/\d{1,2}\/\d{2}|\d{4}$/;var a=/^\d{4,4}$/;f.fn.simpleDatepicker=function(h){var k=jQuery.extend({},jQuery.fn.simpleDatepicker.defaults,h);j();function j(){var p,o;if(k.startdate.constructor==Date){p=k.startdate.getFullYear()}else{if(k.startdate){if(a.test(k.startdate)){p=k.startdate}else{if(d.test(k.startdate)){k.startdate=new Date(k.startdate);p=k.startdate.getFullYear()}else{p=c.getFullYear()}}}else{p=c.getFullYear()}}k.startyear=p;if(k.enddate.constructor==Date){o=k.enddate.getFullYear()}else{if(k.enddate){if(a.test(k.enddate)){o=k.enddate}else{if(d.test(k.enddate)){k.enddate=new Date(k.enddate);o=k.enddate.getFullYear()}else{o=c.getFullYear()}}}else{o=c.getFullYear()}}k.endyear=o}function i(){var q=[];for(var p=0;p<=k.endyear-k.startyear;p++){q[p]=k.startyear+p}var r=jQuery('<table class="datepicker" cellpadding="0" cellspacing="0"></table>');r.append("<thead></thead>");r.append("<tfoot></tfoot>");r.append("<tbody></tbody>");var o='<select name="month">';for(var p in b){o+='<option value="'+p+'">'+b[p]+"</option>"}o+="</select>";var s='<select name="year">';for(var p in q){s+="<option>"+q[p]+"</option>"}s+="</select>";jQuery("thead",r).append('<tr class="controls"><th colspan="7"><span class="prevMonth">&laquo;</span>&nbsp;'+o+s+'&nbsp;<span class="nextMonth">&raquo;</span></th></tr>');jQuery("thead",r).append('<tr class="days"><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>');jQuery("tfoot",r).append('<tr><td colspan="2"><span class="today">today</span></td><td colspan="3">&nbsp;</td><td colspan="2"><span class="close">close</span></td></tr>');for(var p=0;p<6;p++){jQuery("tbody",r).append("<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>")}return r}function g(o){var p=curtop=0;if(o.offsetParent){do{p+=o.offsetLeft;curtop+=o.offsetTop}while(o=o.offsetParent);return[p,curtop]}else{return false}}function m(o){return(o<10?"0":"")+o}function l(F,p,t,v){var z=jQuery("select[name=month]",t).get(0).selectedIndex;var B=jQuery("select[name=year]",t).get(0).selectedIndex;var s=jQuery("select[name=year] option",t).get().length;if(F&&jQuery(F.target).hasClass("prevMonth")){if(0==z&&B){B-=1;z=11;jQuery("select[name=month]",t).get(0).selectedIndex=11;jQuery("select[name=year]",t).get(0).selectedIndex=B}else{z-=1;jQuery("select[name=month]",t).get(0).selectedIndex=z}}else{if(F&&jQuery(F.target).hasClass("nextMonth")){if(11==z&&B+1<s){B+=1;z=0;jQuery("select[name=month]",t).get(0).selectedIndex=0;jQuery("select[name=year]",t).get(0).selectedIndex=B}else{z+=1;jQuery("select[name=month]",t).get(0).selectedIndex=z}}}if(0==z&&!B){jQuery("span.prevMonth",t).hide()}else{jQuery("span.prevMonth",t).show()}if(B+1==s&&11==z){jQuery("span.nextMonth",t).hide()}else{jQuery("span.nextMonth",t).show()}var r=jQuery("tbody td",t).unbind().empty().removeClass("date");var w=jQuery("select[name=month]",t).val();var u=jQuery("select[name=year]",t).val();var G=new Date(u,w,1);var H=G.getDay();var D=e[w];if(1==w&&((u%4==0&&u%100!=0)||u%400==0)){D=29}if(k.startdate.constructor==Date){var E=k.startdate.getMonth();var q=k.startdate.getDate()}if(k.enddate.constructor==Date){var x=k.enddate.getMonth();var C=k.enddate.getDate()}for(var A=0;A<D;A++){var o=jQuery(r.get(A+H)).removeClass("chosen");if((B||((!q&&!E)||((A+1>=q&&z==E)||z>E)))&&(B+1<s||((!C&&!x)||((A+1<=C&&z==x)||z<x)))){o.text(A+1).addClass("date").hover(function(){jQuery(this).addClass("over")},function(){jQuery(this).removeClass("over")}).click(function(){var y=new Date(jQuery("select[name=year]",t).val(),jQuery("select[name=month]",t).val(),jQuery(this).text());n(p,t,y)});if(A+1==v.getDate()&&w==v.getMonth()&&u==v.getFullYear()){o.addClass("chosen")}}}}function n(p,q,o){if(o&&o.constructor==Date){p.val(jQuery.fn.simpleDatepicker.formatOutput(o))}q.remove();q=null;jQuery.data(p.get(0),"simpleDatepicker",{hasDatepicker:false})}return this.each(function(){if(jQuery(this).is("input")&&"text"==jQuery(this).attr("type")){var o;jQuery.data(jQuery(this).get(0),"simpleDatepicker",{hasDatepicker:false});jQuery(this).click(function(r){var t=jQuery(r.target);if(false==jQuery.data(t.get(0),"simpleDatepicker").hasDatepicker){jQuery.data(t.get(0),"simpleDatepicker",{hasDatepicker:true});var s=t.val();if(s&&d.test(s)){var v=new Date(s)}else{if(k.chosendate.constructor==Date){var v=k.chosendate}else{if(k.chosendate){var v=new Date(k.chosendate)}else{var v=c}}}o=i();jQuery("body").prepend(o);var q=g(t.get(0));var p=(parseInt(k.x)?parseInt(k.x):0)+q[0];var u=(parseInt(k.y)?parseInt(k.y):0)+q[1];jQuery(o).css({position:"absolute",left:p,top:u});jQuery("span",o).css("cursor","pointer");jQuery("select",o).bind("change",function(){l(null,t,o,v)});jQuery("span.prevMonth",o).click(function(w){l(w,t,o,v)});jQuery("span.nextMonth",o).click(function(w){l(w,t,o,v)});jQuery("span.today",o).click(function(){n(t,o,new Date())});jQuery("span.close",o).click(function(){n(t,o)});jQuery("select[name=month]",o).get(0).selectedIndex=v.getMonth();jQuery("select[name=year]",o).get(0).selectedIndex=Math.max(0,v.getFullYear()-k.startyear);l(null,t,o,v)}})}})};jQuery.fn.simpleDatepicker.pad2=function(g){return(g<10?"0":"")+g};jQuery.fn.simpleDatepicker.formatOutput=function(g){return jQuery.fn.simpleDatepicker.pad2((g.getMonth()+1))+"/"+jQuery.fn.simpleDatepicker.pad2(g.getDate())+"/"+jQuery.fn.simpleDatepicker.pad2(g.getFullYear())};jQuery.fn.simpleDatepicker.defaults={chosendate:c,startdate:c.getFullYear(),enddate:c.getFullYear()+1,x:18,y:18}})(jQuery);


/*
 * nyroModal - jQuery Plugin
 * http://nyromodal.nyrodev.com
 *
 * Copyright (c) 2010 Cedric Nirousset (nyrodev.com)
 * Licensed under the MIT license
 *
 * $Date: 2010-02-23 (Tue, 23 Feb 2010) $
 * $version: 1.6.2
 */
jQuery(function($){var userAgent=navigator.userAgent.toLowerCase();var browserVersion=(userAgent.match(/.+(?:rv|webkit|khtml|opera|msie)[\/: ]([\d.]+)/)||[0,'0'])[1];var isIE6=(/msie/.test(userAgent)&&!/opera/.test(userAgent)&&parseInt(browserVersion)<7&&(!window.XMLHttpRequest||typeof(XMLHttpRequest)==='function'));var body=$('body');var currentSettings;var callingSettings;var shouldResize=false;var gallery={};var fixFF=false;var contentElt;var contentEltLast;var modal={started:false,ready:false,dataReady:false,anim:false,animContent:false,loadingShown:false,transition:false,resizing:false,closing:false,error:false,blocker:null,blockerVars:null,full:null,bg:null,loading:null,tmp:null,content:null,wrapper:null,contentWrapper:null,scripts:new Array(),scriptsShown:new Array()};var resized={width:false,height:false,windowResizing:false};var initSettingsSize={width:null,height:null,windowResizing:true};var windowResizeTimeout;$.fn.nyroModal=function(settings){if(!this)return false;return this.each(function(){var me=$(this);if(this.nodeName.toLowerCase()=='form'){me.unbind('submit.nyroModal').bind('submit.nyroModal',function(e){if(e.isDefaultPrevented())return false;if(me.data('nyroModalprocessing'))return true;if(this.enctype=='multipart/form-data'){processModal($.extend(settings,{from:this}));return true}e.preventDefault();processModal($.extend(settings,{from:this}));return false})}else{me.unbind('click.nyroModal').bind('click.nyroModal',function(e){if(e.isDefaultPrevented())return false;e.preventDefault();processModal($.extend(settings,{from:this}));return false})}})};$.fn.nyroModalManual=function(settings){if(!this.length)processModal(settings);return this.each(function(){processModal($.extend(settings,{from:this}))})};$.nyroModalManual=function(settings){processModal(settings)};$.nyroModalSettings=function(settings,deep1,deep2){setCurrentSettings(settings,deep1,deep2);if(!deep1&&modal.started){if(modal.bg&&settings.bgColor)currentSettings.updateBgColor(modal,currentSettings,function(){});if(modal.contentWrapper&&settings.title)setTitle();if(!modal.error&&(settings.windowResizing||(!modal.resizing&&(('width'in settings&&settings.width==currentSettings.width)||('height'in settings&&settings.height==currentSettings.height))))){modal.resizing=true;if(modal.contentWrapper)calculateSize(true);if(modal.contentWrapper&&modal.contentWrapper.is(':visible')&&!modal.animContent){if(fixFF)modal.content.css({position:''});currentSettings.resize(modal,currentSettings,function(){currentSettings.windowResizing=false;modal.resizing=false;if(fixFF)modal.content.css({position:'fixed'});if($.isFunction(currentSettings.endResize))currentSettings.endResize(modal,currentSettings)})}}}};$.nyroModalRemove=function(){removeModal()};$.nyroModalNext=function(){var link=getGalleryLink(1);if(link)return link.nyroModalManual(getCurrentSettingsNew());return false};$.nyroModalPrev=function(){var link=getGalleryLink(-1);if(link)return link.nyroModalManual(getCurrentSettingsNew());return false};$.fn.nyroModal.settings={debug:false,blocker:false,windowResize:true,modal:false,type:'',forceType:null,from:'',hash:'',processHandler:null,selIndicator:'nyroModalSel',formIndicator:'nyroModal',content:null,bgColor:'#000000',ajax:{},swf:{wmode:'transparent'},width:null,height:null,minWidth:400,minHeight:300,resizable:true,autoSizable:true,padding:25,regexImg:'[^\.]\.(jpg|jpeg|png|tiff|gif|bmp)\s*$',addImageDivTitle:false,defaultImgAlt:'Image',setWidthImgTitle:true,ltr:true,gallery:null,galleryLinks:'<a href="#" class="nyroModalPrev">Prev</a><a href="#"  class="nyroModalNext">Next</a>',galleryCounts:galleryCounts,galleryLoop:false,zIndexStart:100,cssOpt:{bg:{position:'absolute',overflow:'hidden',top:0,left:0,height:'100%',width:'100%'},wrapper:{position:'absolute',top:'50%',left:'50%'},wrapper2:{},content:{},loading:{position:'absolute',top:'50%',left:'50%',marginTop:'-50px',marginLeft:'-50px'}},wrap:{div:'<div class="wrapper"></div>',ajax:'<div class="wrapper"></div>',form:'<div class="wrapper"></div>',formData:'<div class="wrapper"></div>',image:'<div class="wrapperImg"></div>',swf:'<div class="wrapperSwf"></div>',iframe:'<div class="wrapperIframe"></div>',iframeForm:'<div class="wrapperIframe"></div>',manual:'<div class="wrapper"></div>'},closeButton:'<a href="#" class="nyroModalClose" id="closeBut" title="close">Close</a>',title:null,titleFromIframe:true,openSelector:'.nyroModal',closeSelector:'.nyroModalClose',contentLoading:'<a href="#" class="nyroModalClose">Cancel</a>',errorClass:'error',contentError:'The requested content cannot be loaded.<br />Please try again later.<br /><a href="#" class="nyroModalClose">Close</a>',handleError:null,showBackground:showBackground,hideBackground:hideBackground,endFillContent:null,showContent:showContent,endShowContent:null,beforeHideContent:null,hideContent:hideContent,showTransition:showTransition,hideTransition:hideTransition,showLoading:showLoading,hideLoading:hideLoading,resize:resize,endResize:null,updateBgColor:updateBgColor,endRemove:null};function processModal(settings){if(modal.loadingShown||modal.transition||modal.anim)return;debug('processModal');modal.started=true;callingSettings=$.extend(true,settings);setDefaultCurrentSettings(settings);if(!modal.full)modal.blockerVars=modal.blocker=null;modal.error=false;modal.closing=false;modal.dataReady=false;modal.scripts=new Array();modal.scriptsShown=new Array();currentSettings.type=fileType();if(currentSettings.forceType){if(!currentSettings.content)currentSettings.from=true;currentSettings.type=currentSettings.forceType;currentSettings.forceType=null}if($.isFunction(currentSettings.processHandler))currentSettings.processHandler(currentSettings);var from=currentSettings.from;var url=currentSettings.url;initSettingsSize.width=currentSettings.width;initSettingsSize.height=currentSettings.height;if(currentSettings.type=='swf'){setCurrentSettings({overflow:'visible'},'cssOpt','content');currentSettings.content='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+currentSettings.width+'" height="'+currentSettings.height+'"><param name="movie" value="'+url+'"></param>';var tmp='';$.each(currentSettings.swf,function(name,val){currentSettings.content+='<param name="'+name+'" value="'+val+'"></param>';tmp+=' '+name+'="'+val+'"'});currentSettings.content+='<embed src="'+url+'" type="application/x-shockwave-flash" width="'+currentSettings.width+'" height="'+currentSettings.height+'"'+tmp+'></embed></object>'}if(from){var jFrom=$(from).blur();if(currentSettings.type=='form'){var data=$(from).serializeArray();data.push({name:currentSettings.formIndicator,value:1});if(currentSettings.selector)data.push({name:currentSettings.selIndicator,value:currentSettings.selector.substring(1)});showModal();$.ajax($.extend({},currentSettings.ajax,{url:url,data:data,type:jFrom.attr('method')?jFrom.attr('method'):'get',success:ajaxLoaded,error:loadingError}));debug('Form Ajax Load: '+jFrom.attr('action'))}else if(currentSettings.type=='formData'){initModal();jFrom.attr('target','nyroModalIframe');jFrom.attr('action',url);jFrom.prepend('<input type="hidden" name="'+currentSettings.formIndicator+'" value="1" />');if(currentSettings.selector)jFrom.prepend('<input type="hidden" name="'+currentSettings.selIndicator+'" value="'+currentSettings.selector.substring(1)+'" />');modal.tmp.html('<iframe frameborder="0" hspace="0" name="nyroModalIframe" src="javascript:\'\';"></iframe>');$('iframe',modal.tmp).css({width:currentSettings.width,height:currentSettings.height}).error(loadingError).load(formDataLoaded);debug('Form Data Load: '+jFrom.attr('action'));showModal();showContentOrLoading()}else if(currentSettings.type=='image'){debug('Image Load: '+url);var title=jFrom.attr('title')||currentSettings.defaultImgAlt;initModal();modal.tmp.html('<img id="nyroModalImg" />').find('img').attr('alt',title);modal.tmp.css({lineHeight:0});$('img',modal.tmp).error(loadingError).load(function(){debug('Image Loaded: '+this.src);$(this).unbind('load');var w=modal.tmp.width();var h=modal.tmp.height();modal.tmp.css({lineHeight:''});resized.width=w;resized.height=h;setCurrentSettings({width:w,height:h,imgWidth:w,imgHeight:h});initSettingsSize.width=w;initSettingsSize.height=h;setCurrentSettings({overflow:'visible'},'cssOpt','content');modal.dataReady=true;if(modal.loadingShown||modal.transition)showContentOrLoading()}).attr('src',url);showModal()}else if(currentSettings.type=='iframeForm'){initModal();modal.tmp.html('<iframe frameborder="0" hspace="0" src="javascript:\'\';" name="nyroModalIframe" id="nyroModalIframe"></iframe>');debug('Iframe Form Load: '+url);$('iframe',modal.tmp).eq(0).css({width:'100%',height:$.support.boxModel?'99%':'100%'}).load(iframeLoaded);modal.dataReady=true;showModal()}else if(currentSettings.type=='iframe'){initModal();modal.tmp.html('<iframe frameborder="0" hspace="0" src="javascript:\'\';" name="nyroModalIframe" id="nyroModalIframe"></iframe>');debug('Iframe Load: '+url);$('iframe',modal.tmp).eq(0).css({width:'100%',height:$.support.boxModel?'99%':'100%'}).load(iframeLoaded);modal.dataReady=true;showModal()}else if(currentSettings.type){debug('Content: '+currentSettings.type);initModal();modal.tmp.html(currentSettings.content);var w=modal.tmp.width();var h=modal.tmp.height();var div=$(currentSettings.type);if(div.length){setCurrentSettings({type:'div'});w=div.width();h=div.height();if(contentElt)contentEltLast=contentElt;contentElt=div;modal.tmp.append(div.contents())}initSettingsSize.width=w;initSettingsSize.height=h;setCurrentSettings({width:w,height:h});if(modal.tmp.html())modal.dataReady=true;else loadingError();if(!modal.ready)showModal();else endHideContent()}else{debug('Ajax Load: '+url);setCurrentSettings({type:'ajax'});var data=currentSettings.ajax.data||{};if(currentSettings.selector){if(typeof data=="string"){data+='&'+currentSettings.selIndicator+'='+currentSettings.selector.substring(1)}else{data[currentSettings.selIndicator]=currentSettings.selector.substring(1)}}showModal();$.ajax($.extend(true,currentSettings.ajax,{url:url,success:ajaxLoaded,error:loadingError,data:data}))}}else if(currentSettings.content){debug('Content: '+currentSettings.type);setCurrentSettings({type:'manual'});initModal();modal.tmp.html($('<div/>').html(currentSettings.content).contents());if(modal.tmp.html())modal.dataReady=true;else loadingError();showModal()}else{}}function setDefaultCurrentSettings(settings){debug('setDefaultCurrentSettings');currentSettings=$.extend(true,{},$.fn.nyroModal.settings,settings);setMargin()}function setCurrentSettings(settings,deep1,deep2){if(modal.started){if(deep1&&deep2){$.extend(true,currentSettings[deep1][deep2],settings)}else if(deep1){$.extend(true,currentSettings[deep1],settings)}else{if(modal.animContent){if('width'in settings){if(!modal.resizing){settings.setWidth=settings.width;shouldResize=true}delete settings['width']}if('height'in settings){if(!modal.resizing){settings.setHeight=settings.height;shouldResize=true}delete settings['height']}}$.extend(true,currentSettings,settings)}}else{if(deep1&&deep2){$.extend(true,$.fn.nyroModal.settings[deep1][deep2],settings)}else if(deep1){$.extend(true,$.fn.nyroModal.settings[deep1],settings)}else{$.extend(true,$.fn.nyroModal.settings,settings)}}}function setMarginScroll(){if(isIE6&&!modal.blocker){if(document.documentElement){currentSettings.marginScrollLeft=document.documentElement.scrollLeft;currentSettings.marginScrollTop=document.documentElement.scrollTop}else{currentSettings.marginScrollLeft=document.body.scrollLeft;currentSettings.marginScrollTop=document.body.scrollTop}}else{currentSettings.marginScrollLeft=0;currentSettings.marginScrollTop=0}}function setMargin(){setMarginScroll();currentSettings.marginLeft=-(currentSettings.width+currentSettings.borderW)/2;currentSettings.marginTop=-(currentSettings.height+currentSettings.borderH)/2;if(!modal.blocker){currentSettings.marginLeft+=currentSettings.marginScrollLeft;currentSettings.marginTop+=currentSettings.marginScrollTop}}function setMarginLoading(){setMarginScroll();var outer=getOuter(modal.loading);currentSettings.marginTopLoading=-(modal.loading.height()+outer.h.border+outer.h.padding)/2;currentSettings.marginLeftLoading=-(modal.loading.width()+outer.w.border+outer.w.padding)/2;if(!modal.blocker){currentSettings.marginLeftLoading+=currentSettings.marginScrollLeft;currentSettings.marginTopLoading+=currentSettings.marginScrollTop}}function setTitle(){var title=$('h1#nyroModalTitle',modal.contentWrapper);if(title.length)title.text(currentSettings.title);else modal.contentWrapper.prepend('<h1 id="nyroModalTitle">'+currentSettings.title+'</h1>')}function initModal(){debug('initModal');if(!modal.full){if(currentSettings.debug)setCurrentSettings({color:'white'},'cssOpt','bg');var full={zIndex:currentSettings.zIndexStart,position:'fixed',top:0,left:0,width:'100%',height:'100%'};var contain=body;var iframeHideIE='';if(currentSettings.blocker){modal.blocker=contain=$(currentSettings.blocker);var pos=modal.blocker.offset();var w=modal.blocker.outerWidth();var h=modal.blocker.outerHeight();if(isIE6){setCurrentSettings({height:'100%',width:'100%',top:0,left:0},'cssOpt','bg')}modal.blockerVars={top:pos.top,left:pos.left,width:w,height:h};var plusTop=(/msie/.test(userAgent)?0:getCurCSS(body.get(0),'borderTopWidth'));var plusLeft=(/msie/.test(userAgent)?0:getCurCSS(body.get(0),'borderLeftWidth'));full={position:'absolute',top:pos.top+plusTop,left:pos.left+plusLeft,width:w,height:h}}else if(isIE6){body.css({marginLeft:0,marginRight:0});var w=body.width();var h=$(window).height()+'px';if($(window).height()>=body.outerHeight()){h=body.outerHeight()+'px'}else w+=20;w+='px';body.css({width:w,height:h,position:'static',overflow:'hidden'});$('html').css({overflow:'hidden'});setCurrentSettings({cssOpt:{bg:{position:'absolute',zIndex:currentSettings.zIndexStart+1,height:'110%',width:'110%',top:currentSettings.marginScrollTop+'px',left:currentSettings.marginScrollLeft+'px'},wrapper:{zIndex:currentSettings.zIndexStart+2},loading:{zIndex:currentSettings.zIndexStart+3}}});iframeHideIE=$('<iframe id="nyroModalIframeHideIe" src="javascript:\'\';"></iframe>').css($.extend({},currentSettings.cssOpt.bg,{opacity:0,zIndex:50,border:'none'}))}contain.append($('<div id="nyroModalFull"><div id="nyroModalBg"></div><div id="nyroModalWrapper"><div id="nyroModalContent"></div></div><div id="nyrModalTmp"></div><div id="nyroModalLoading"></div></div>').hide());modal.full=$('#nyroModalFull').css(full).show();modal.bg=$('#nyroModalBg').css($.extend({backgroundColor:currentSettings.bgColor},currentSettings.cssOpt.bg)).before(iframeHideIE);modal.bg.bind('click.nyroModal',clickBg);modal.loading=$('#nyroModalLoading').css(currentSettings.cssOpt.loading).hide();modal.contentWrapper=$('#nyroModalWrapper').css(currentSettings.cssOpt.wrapper).hide();modal.content=$('#nyroModalContent');modal.tmp=$('#nyrModalTmp').hide();if($.isFunction($.fn.mousewheel)){modal.content.mousewheel(function(e,d){var elt=modal.content.get(0);if((d>0&&elt.scrollTop==0)||(d<0&&elt.scrollHeight-elt.scrollTop==elt.clientHeight)){e.preventDefault();e.stopPropagation()}})}$(document).bind('keydown.nyroModal',keyHandler);modal.content.css({width:'auto',height:'auto'});modal.contentWrapper.css({width:'auto',height:'auto'});if(!currentSettings.blocker&&currentSettings.windowResize){$(window).bind('resize.nyroModal',function(){window.clearTimeout(windowResizeTimeout);windowResizeTimeout=window.setTimeout(windowResizeHandler,200)})}}}function windowResizeHandler(){$.nyroModalSettings(initSettingsSize)}function showModal(){debug('showModal');if(!modal.ready){initModal();modal.anim=true;currentSettings.showBackground(modal,currentSettings,endBackground)}else{modal.anim=true;modal.transition=true;currentSettings.showTransition(modal,currentSettings,function(){endHideContent();modal.anim=false;showContentOrLoading()})}}function clickBg(e){if(!currentSettings.modal)removeModal()}function keyHandler(e){if(e.keyCode==27){if(!currentSettings.modal)removeModal()}else if(currentSettings.gallery&&modal.ready&&modal.dataReady&&!modal.anim&&!modal.transition){if(e.keyCode==39||e.keyCode==40){e.preventDefault();$.nyroModalNext();return false}else if(e.keyCode==37||e.keyCode==38){e.preventDefault();$.nyroModalPrev();return false}}}function fileType(){var from=currentSettings.from;var url;if(from&&from.nodeName){var jFrom=$(from);url=jFrom.attr(from.nodeName.toLowerCase()=='form'?'action':'href');if(!url)url=location.href.substring(window.location.host.length+7);currentSettings.url=url;if(jFrom.attr('rev')=='modal')currentSettings.modal=true;currentSettings.title=jFrom.attr('title');if(from&&from.rel&&from.rel.toLowerCase()!='nofollow'){var indexSpace=from.rel.indexOf(' ');currentSettings.gallery=indexSpace>0?from.rel.substr(0,indexSpace):from.rel}var imgType=imageType(url,from);if(imgType)return imgType;if(isSwf(url))return'swf';var iframe=false;if(from.target&&from.target.toLowerCase()=='_blank'||(from.hostname&&from.hostname.replace(/:\d*$/,'')!=window.location.hostname.replace(/:\d*$/,''))){iframe=true}if(from.nodeName.toLowerCase()=='form'){if(iframe)return'iframeForm';setCurrentSettings(extractUrlSel(url));if(jFrom.attr('enctype')=='multipart/form-data')return'formData';return'form'}if(iframe)return'iframe'}else{url=currentSettings.url;if(!currentSettings.content)currentSettings.from=true;if(!url)return null;if(isSwf(url))return'swf';var reg1=new RegExp("^http://|https://","g");if(url.match(reg1))return'iframe'}var imgType=imageType(url,from);if(imgType)return imgType;var tmp=extractUrlSel(url);setCurrentSettings(tmp);if(!tmp.url)return tmp.selector}function imageType(url,from){var image=new RegExp(currentSettings.regexImg,'i');if(image.test(url)){return'image'}}function isSwf(url){var swf=new RegExp('[^\.]\.(swf)\s*$','i');return swf.test(url)}function extractUrlSel(url){var ret={url:null,selector:null};if(url){var hash=getHash(url);var hashLoc=getHash(window.location.href);var curLoc=window.location.href.substring(0,window.location.href.length-hashLoc.length);var req=url.substring(0,url.length-hash.length);if(req==curLoc||req==$('base').attr('href')){ret.selector=hash}else{ret.url=req;ret.selector=hash}}return ret}function loadingError(){debug('loadingError');modal.error=true;if(!modal.ready)return;if($.isFunction(currentSettings.handleError))currentSettings.handleError(modal,currentSettings);modal.loading.addClass(currentSettings.errorClass).html(currentSettings.contentError);$(currentSettings.closeSelector,modal.loading).unbind('click.nyroModal').bind('click.nyroModal',removeModal);setMarginLoading();modal.loading.css({marginTop:currentSettings.marginTopLoading+'px',marginLeft:currentSettings.marginLeftLoading+'px'})}function fillContent(){debug('fillContent');if(!modal.tmp.html())return;modal.content.html(modal.tmp.contents());modal.tmp.empty();wrapContent();if(currentSettings.type=='iframeForm'){$(currentSettings.from).attr('target','nyroModalIframe').data('nyroModalprocessing',1).submit().attr('target','_blank').removeData('nyroModalprocessing')}if(!currentSettings.modal)modal.wrapper.prepend(currentSettings.closeButton);if($.isFunction(currentSettings.endFillContent))currentSettings.endFillContent(modal,currentSettings);modal.content.append(modal.scripts);$(currentSettings.closeSelector,modal.contentWrapper).unbind('click.nyroModal').bind('click.nyroModal',removeModal);$(currentSettings.openSelector,modal.contentWrapper).nyroModal(getCurrentSettingsNew())}function getCurrentSettingsNew(){return callingSettings;var currentSettingsNew=$.extend(true,{},currentSettings);if(resized.width)currentSettingsNew.width=null;else currentSettingsNew.width=initSettingsSize.width;if(resized.height)currentSettingsNew.height=null;else currentSettingsNew.height=initSettingsSize.height;currentSettingsNew.cssOpt.content.overflow='auto';return currentSettingsNew}function wrapContent(){debug('wrapContent');var wrap=$(currentSettings.wrap[currentSettings.type]);modal.content.append(wrap.children().remove());modal.contentWrapper.wrapInner(wrap);if(currentSettings.gallery){modal.content.append(currentSettings.galleryLinks);gallery.links=$('[rel="'+currentSettings.gallery+'"], [rel^="'+currentSettings.gallery+' "]');gallery.index=gallery.links.index(currentSettings.from);if(currentSettings.galleryCounts&&$.isFunction(currentSettings.galleryCounts))currentSettings.galleryCounts(gallery.index+1,gallery.links.length,modal,currentSettings);var currentSettingsNew=getCurrentSettingsNew();var linkPrev=getGalleryLink(-1);if(linkPrev){var prev=$('.nyroModalPrev',modal.contentWrapper).attr('href',linkPrev.attr('href')).click(function(e){e.preventDefault();$.nyroModalPrev();return false});if(isIE6&&currentSettings.type=='swf'){prev.before($('<iframe id="nyroModalIframeHideIeGalleryPrev" src="javascript:\'\';"></iframe>').css({position:prev.css('position'),top:prev.css('top'),left:prev.css('left'),width:prev.width(),height:prev.height(),opacity:0,border:'none'}))}}else{$('.nyroModalPrev',modal.contentWrapper).remove()}var linkNext=getGalleryLink(1);if(linkNext){var next=$('.nyroModalNext',modal.contentWrapper).attr('href',linkNext.attr('href')).click(function(e){e.preventDefault();$.nyroModalNext();return false});if(isIE6&&currentSettings.type=='swf'){next.before($('<iframe id="nyroModalIframeHideIeGalleryNext" src="javascript:\'\';"></iframe>').css($.extend({},{position:next.css('position'),top:next.css('top'),left:next.css('left'),width:next.width(),height:next.height(),opacity:0,border:'none'})))}}else{$('.nyroModalNext',modal.contentWrapper).remove()}}calculateSize()}function getGalleryLink(dir){if(currentSettings.gallery){if(!currentSettings.ltr)dir*=-1;var index=gallery.index+dir;if(index>=0&&index<gallery.links.length)return gallery.links.eq(index);else if(currentSettings.galleryLoop){if(index<0)return gallery.links.eq(gallery.links.length-1);else return gallery.links.eq(0)}}return false}function calculateSize(resizing){debug('calculateSize');modal.wrapper=modal.contentWrapper.children('div:first');resized.width=false;resized.height=false;if(false&&!currentSettings.windowResizing){initSettingsSize.width=currentSettings.width;initSettingsSize.height=currentSettings.height}if(currentSettings.autoSizable&&(!currentSettings.width||!currentSettings.height)){modal.contentWrapper.css({opacity:0,width:'auto',height:'auto'}).show();var tmp={width:'auto',height:'auto'};if(currentSettings.width){tmp.width=currentSettings.width}else if(currentSettings.type=='iframe'){tmp.width=currentSettings.minWidth}if(currentSettings.height){tmp.height=currentSettings.height}else if(currentSettings.type=='iframe'){tmp.height=currentSettings.minHeight}modal.content.css(tmp);if(!currentSettings.width){currentSettings.width=modal.content.outerWidth(true);resized.width=true}if(!currentSettings.height){currentSettings.height=modal.content.outerHeight(true);resized.height=true}modal.contentWrapper.css({opacity:1});if(!resizing)modal.contentWrapper.hide()}if(currentSettings.type!='image'&&currentSettings.type!='swf'){currentSettings.width=Math.max(currentSettings.width,currentSettings.minWidth);currentSettings.height=Math.max(currentSettings.height,currentSettings.minHeight)}var outerWrapper=getOuter(modal.contentWrapper);var outerWrapper2=getOuter(modal.wrapper);var outerContent=getOuter(modal.content);var tmp={content:{width:currentSettings.width,height:currentSettings.height},wrapper2:{width:currentSettings.width+outerContent.w.total,height:currentSettings.height+outerContent.h.total},wrapper:{width:currentSettings.width+outerContent.w.total+outerWrapper2.w.total,height:currentSettings.height+outerContent.h.total+outerWrapper2.h.total}};if(currentSettings.resizable){var maxHeight=modal.blockerVars?modal.blockerVars.height:$(window).height()-outerWrapper.h.border-(tmp.wrapper.height-currentSettings.height);var maxWidth=modal.blockerVars?modal.blockerVars.width:$(window).width()-outerWrapper.w.border-(tmp.wrapper.width-currentSettings.width);maxHeight-=currentSettings.padding*2;maxWidth-=currentSettings.padding*2;if(tmp.content.height>maxHeight||tmp.content.width>maxWidth){if(currentSettings.type=='image'||currentSettings.type=='swf'){var useW=currentSettings.imgWidth?currentSettings.imgWidth:currentSettings.width;var useH=currentSettings.imgHeight?currentSettings.imgHeight:currentSettings.height;var diffW=tmp.content.width-useW;var diffH=tmp.content.height-useH;if(diffH<0)diffH=0;if(diffW<0)diffW=0;var calcH=maxHeight-diffH;var calcW=maxWidth-diffW;var ratio=Math.min(calcH/useH,calcW/useW);calcW=Math.floor(useW*ratio);calcH=Math.floor(useH*ratio);tmp.content.height=calcH+diffH;tmp.content.width=calcW+diffW}else{tmp.content.height=Math.min(tmp.content.height,maxHeight);tmp.content.width=Math.min(tmp.content.width,maxWidth)}tmp.wrapper2={width:tmp.content.width+outerContent.w.total,height:tmp.content.height+outerContent.h.total};tmp.wrapper={width:tmp.content.width+outerContent.w.total+outerWrapper2.w.total,height:tmp.content.height+outerContent.h.total+outerWrapper2.h.total}}}if(currentSettings.type=='swf'){$('object, embed',modal.content).attr('width',tmp.content.width).attr('height',tmp.content.height)}else if(currentSettings.type=='image'){$('img',modal.content).css({width:tmp.content.width,height:tmp.content.height})}modal.content.css($.extend({},tmp.content,currentSettings.cssOpt.content));modal.wrapper.css($.extend({},tmp.wrapper2,currentSettings.cssOpt.wrapper2));if(!resizing)modal.contentWrapper.css($.extend({},tmp.wrapper,currentSettings.cssOpt.wrapper));if(currentSettings.type=='image'&&currentSettings.addImageDivTitle){$('img',modal.content).removeAttr('alt');var divTitle=$('div',modal.content);if(currentSettings.title!=currentSettings.defaultImgAlt&&currentSettings.title){if(divTitle.length==0){divTitle=$('<div>'+currentSettings.title+'</div>');modal.content.append(divTitle)}if(currentSettings.setWidthImgTitle){var outerDivTitle=getOuter(divTitle);divTitle.css({width:(tmp.content.width+outerContent.w.padding-outerDivTitle.w.total)+'px'})}}else if(divTitle.length=0){divTitle.remove()}}if(currentSettings.title)setTitle();tmp.wrapper.borderW=outerWrapper.w.border;tmp.wrapper.borderH=outerWrapper.h.border;setCurrentSettings(tmp.wrapper);setMargin()}function removeModal(e){debug('removeModal');if(e)e.preventDefault();if(modal.full&&modal.ready){$(document).unbind('keydown.nyroModal');if(!currentSettings.blocker)$(window).unbind('resize.nyroModal');modal.ready=false;modal.anim=true;modal.closing=true;if(modal.loadingShown||modal.transition){currentSettings.hideLoading(modal,currentSettings,function(){modal.loading.hide();modal.loadingShown=false;modal.transition=false;currentSettings.hideBackground(modal,currentSettings,endRemove)})}else{if(fixFF)modal.content.css({position:''});modal.wrapper.css({overflow:'hidden'});modal.content.css({overflow:'hidden'});$('iframe',modal.content).hide();if($.isFunction(currentSettings.beforeHideContent)){currentSettings.beforeHideContent(modal,currentSettings,function(){currentSettings.hideContent(modal,currentSettings,function(){endHideContent();currentSettings.hideBackground(modal,currentSettings,endRemove)})})}else{currentSettings.hideContent(modal,currentSettings,function(){endHideContent();currentSettings.hideBackground(modal,currentSettings,endRemove)})}}}if(e)return false}function showContentOrLoading(){debug('showContentOrLoading');if(modal.ready&&!modal.anim){if(modal.dataReady){if(modal.tmp.html()){modal.anim=true;if(modal.transition){fillContent();modal.animContent=true;currentSettings.hideTransition(modal,currentSettings,function(){modal.loading.hide();modal.transition=false;modal.loadingShown=false;endShowContent()})}else{currentSettings.hideLoading(modal,currentSettings,function(){modal.loading.hide();modal.loadingShown=false;fillContent();setMarginLoading();setMargin();modal.animContent=true;currentSettings.showContent(modal,currentSettings,endShowContent)})}}}else if(!modal.loadingShown&&!modal.transition){modal.anim=true;modal.loadingShown=true;if(modal.error)loadingError();else modal.loading.html(currentSettings.contentLoading);$(currentSettings.closeSelector,modal.loading).unbind('click.nyroModal').bind('click.nyroModal',removeModal);setMarginLoading();currentSettings.showLoading(modal,currentSettings,function(){modal.anim=false;showContentOrLoading()})}}}function ajaxLoaded(data){debug('AjaxLoaded: '+this.url);if(currentSettings.selector){var tmp={};var i=0;data=data.replace(/\r\n/gi,'nyroModalLN').replace(/<script(.|\s)*?\/script>/gi,function(x){tmp[i]=x;return'<pre style="display: none" class=nyroModalScript rel="'+(i++)+'"></pre>'});data=$('<div>'+data+'</div>').find(currentSettings.selector).html().replace(/<pre style="display: none;?" class="?nyroModalScript"? rel="(.?)"><\/pre>/gi,function(x,y,z){return tmp[y]}).replace(/nyroModalLN/gi,"\r\n")}modal.tmp.html(filterScripts(data));if(modal.tmp.html()){modal.dataReady=true;showContentOrLoading()}else loadingError()}function formDataLoaded(){debug('formDataLoaded');var jFrom=$(currentSettings.from);jFrom.attr('action',jFrom.attr('action')+currentSettings.selector);jFrom.attr('target','');$('input[name='+currentSettings.formIndicator+']',currentSettings.from).remove();var iframe=modal.tmp.children('iframe');var iframeContent=iframe.unbind('load').contents().find(currentSettings.selector||'body').not('script[src]');iframe.attr('src','about:blank');modal.tmp.html(iframeContent.html());if(modal.tmp.html()){modal.dataReady=true;showContentOrLoading()}else loadingError()}function iframeLoaded(){if((window.location.hostname&&currentSettings.url.indexOf(window.location.hostname)>-1)||currentSettings.url.indexOf('http://')){var iframe=$('iframe',modal.full).contents();var tmp={};if(currentSettings.titleFromIframe){tmp.title=iframe.find('title').text();if(!tmp.title){try{tmp.title=iframe.find('title').html()}catch(err){}}}var body=iframe.find('body');if(!currentSettings.height&&body.height())tmp.height=body.height();if(!currentSettings.width&&body.width())tmp.width=body.width();$.extend(initSettingsSize,tmp);$.nyroModalSettings(tmp)}}function galleryCounts(nb,total,elts,settings){if(total>1)settings.title+=(settings.title?' - ':'')+nb+'/'+total}function endHideContent(){debug('endHideContent');modal.anim=false;if(contentEltLast){contentEltLast.append(modal.content.contents());contentEltLast=null}else if(contentElt){contentElt.append(modal.content.contents());contentElt=null}modal.content.empty();gallery={};modal.contentWrapper.hide().children().remove().empty().attr('style','').hide();if(modal.closing||modal.transition)modal.contentWrapper.hide();modal.contentWrapper.css(currentSettings.cssOpt.wrapper).append(modal.content);showContentOrLoading()}function endRemove(){debug('endRemove');$(document).unbind('keydown',keyHandler);modal.anim=false;modal.full.remove();modal.full=null;if(isIE6){body.css({height:'',width:'',position:'',overflow:'',marginLeft:'',marginRight:''});$('html').css({overflow:''})}if($.isFunction(currentSettings.endRemove))currentSettings.endRemove(modal,currentSettings)}function endBackground(){debug('endBackground');modal.ready=true;modal.anim=false;showContentOrLoading()}function endShowContent(){debug('endShowContent');modal.anim=false;modal.animContent=false;modal.contentWrapper.css({opacity:''});fixFF=/mozilla/.test(userAgent)&&!/(compatible|webkit)/.test(userAgent)&&parseFloat(browserVersion)<1.9&&currentSettings.type!='image';if(fixFF)modal.content.css({position:'fixed'});modal.content.append(modal.scriptsShown);if(currentSettings.type=='iframe')modal.content.find('iframe').attr('src',currentSettings.url);if($.isFunction(currentSettings.endShowContent))currentSettings.endShowContent(modal,currentSettings);if(shouldResize){shouldResize=false;$.nyroModalSettings({width:currentSettings.setWidth,height:currentSettings.setHeight});delete currentSettings['setWidth'];delete currentSettings['setHeight']}if(resized.width)setCurrentSettings({width:null});if(resized.height)setCurrentSettings({height:null})}function getHash(url){if(typeof url=='string'){var hashPos=url.indexOf('#');if(hashPos>-1)return url.substring(hashPos)}return''}function filterScripts(data){if(typeof data=='string')data=data.replace(/<\/?(html|head|body)([^>]*)>/gi,'');var tmp=new Array();$.each($.clean({0:data},this.ownerDocument),function(){if($.nodeName(this,"script")){if(!this.src||$(this).attr('rel')=='forceLoad'){if($(this).attr('rev')=='shown')modal.scriptsShown.push(this);else modal.scripts.push(this)}}else tmp.push(this)});return tmp}function getOuter(elm){elm=elm.get(0);var ret={h:{margin:getCurCSS(elm,'marginTop')+getCurCSS(elm,'marginBottom'),border:getCurCSS(elm,'borderTopWidth')+getCurCSS(elm,'borderBottomWidth'),padding:getCurCSS(elm,'paddingTop')+getCurCSS(elm,'paddingBottom')},w:{margin:getCurCSS(elm,'marginLeft')+getCurCSS(elm,'marginRight'),border:getCurCSS(elm,'borderLeftWidth')+getCurCSS(elm,'borderRightWidth'),padding:getCurCSS(elm,'paddingLeft')+getCurCSS(elm,'paddingRight')}};ret.h.outer=ret.h.margin+ret.h.border;ret.w.outer=ret.w.margin+ret.w.border;ret.h.inner=ret.h.padding+ret.h.border;ret.w.inner=ret.w.padding+ret.w.border;ret.h.total=ret.h.outer+ret.h.padding;ret.w.total=ret.w.outer+ret.w.padding;return ret}function getCurCSS(elm,name){var ret=parseInt($.curCSS(elm,name,true));if(isNaN(ret))ret=0;return ret}function debug(msg){if($.fn.nyroModal.settings.debug||currentSettings&&currentSettings.debug)nyroModalDebug(msg,modal,currentSettings||{})}function showBackground(elts,settings,callback){elts.bg.css({opacity:0}).fadeTo(500,0.75,callback)}function hideBackground(elts,settings,callback){elts.bg.fadeOut(300,callback)}function showLoading(elts,settings,callback){elts.loading.css({marginTop:settings.marginTopLoading+'px',marginLeft:settings.marginLeftLoading+'px',opacity:0}).show().animate({opacity:1},{complete:callback,duration:400})}function hideLoading(elts,settings,callback){callback()}function showContent(elts,settings,callback){elts.loading.css({marginTop:settings.marginTopLoading+'px',marginLeft:settings.marginLeftLoading+'px'}).show().animate({width:settings.width+'px',height:settings.height+'px',marginTop:settings.marginTop+'px',marginLeft:settings.marginLeft+'px'},{duration:350,complete:function(){elts.contentWrapper.css({width:settings.width+'px',height:settings.height+'px',marginTop:settings.marginTop+'px',marginLeft:settings.marginLeft+'px'}).show();elts.loading.fadeOut(200,callback)}})}function hideContent(elts,settings,callback){elts.contentWrapper.animate({height:'50px',width:'50px',marginTop:(-(25+settings.borderH)/2+settings.marginScrollTop)+'px',marginLeft:(-(25+settings.borderW)/2+settings.marginScrollLeft)+'px'},{duration:350,complete:function(){elts.contentWrapper.hide();callback()}})}function showTransition(elts,settings,callback){elts.loading.css({marginTop:elts.contentWrapper.css('marginTop'),marginLeft:elts.contentWrapper.css('marginLeft'),height:elts.contentWrapper.css('height'),width:elts.contentWrapper.css('width'),opacity:0}).show().fadeTo(400,1,function(){elts.contentWrapper.hide();callback()})}function hideTransition(elts,settings,callback){elts.contentWrapper.hide().css({width:settings.width+'px',height:settings.height+'px',marginLeft:settings.marginLeft+'px',marginTop:settings.marginTop+'px',opacity:1});elts.loading.animate({width:settings.width+'px',height:settings.height+'px',marginLeft:settings.marginLeft+'px',marginTop:settings.marginTop+'px'},{complete:function(){elts.contentWrapper.show();elts.loading.fadeOut(400,function(){elts.loading.hide();callback()})},duration:350})}function resize(elts,settings,callback){elts.contentWrapper.animate({width:settings.width+'px',height:settings.height+'px',marginLeft:settings.marginLeft+'px',marginTop:settings.marginTop+'px'},{complete:callback,duration:400})}function updateBgColor(elts,settings,callback){if(!$.fx.step.backgroundColor){elts.bg.css({backgroundColor:settings.bgColor});callback()}else elts.bg.animate({backgroundColor:settings.bgColor},{complete:callback,duration:400})}$($.fn.nyroModal.settings.openSelector).nyroModal()});var tmpDebug='';function nyroModalDebug(msg,elts,settings){if(elts.full&&elts.bg){elts.bg.prepend(msg+'<br />'+tmpDebug);tmpDebug=''}else tmpDebug+=msg+'<br />'}

/* ------------------------------------------------------------------------
	Class: prettyLoader
	Use: A unified solution for AJAX loader
	Author: Stephane Caron (http://www.no-margin-for-errors.com)
	Modified by: Sergey Burkov (http://www.oscommerce-ajax.com)
	Version: 1.0.1
------------------------------------------------------------------------- */

(function($){$.prettyLoader={version:'1.0.1'};$.prettyLoader=function(settings){settings=jQuery.extend({animation_speed:'fast',bind_to_ajax:true,delay:false,loader:'images/prettyLoader/ajax-loader.gif',offset_top:13,offset_left:10},settings);scrollPos=_getScroll();imgLoader=new Image();imgLoader.onerror=function(){alert('Preloader image cannot be loaded. Make sure the path is correct in the settings and that the image is reachable.');};imgLoader.src=settings.loader;if(settings.bind_to_ajax)
jQuery(document).ajaxStart(function(){$.prettyLoader.show()}).ajaxStop(function(){$.prettyLoader.hide()});$.prettyLoader.positionLoader=function(e){e=e?e:window.event;if(e){cur_x=(e.clientX)?e.clientX:cursor_x;cur_y=(e.clientY)?e.clientY:cursor_y;}else{cur_x=cursor_x;cur_y=cursor_y;}
left_pos=cur_x+settings.offset_left+scrollPos['scrollLeft'];top_pos=cur_y+settings.offset_top+scrollPos['scrollTop'];$('.prettyLoader').css({'top':top_pos,'left':left_pos});}
$.prettyLoader.show=function(delay){if($('.prettyLoader').size()>0)return;scrollPos=_getScroll();$('<div></div>').addClass('prettyLoader').addClass('prettyLoader_'+settings.theme).appendTo('body').hide();if($.browser.msie)
$('.prettyLoader').addClass('pl_ie6');$('<img />').attr('src',settings.loader).appendTo('.prettyLoader');$('.prettyLoader').fadeIn(settings.animation_speed);$.prettyLoader.positionLoader();$(document).bind('click',$.prettyLoader.positionLoader);$(document).bind('mousemove',$.prettyLoader.positionLoader);$(window).scroll(function(){scrollPos=_getScroll();$(document).triggerHandler('mousemove');});delay=(delay)?delay:settings.delay;if(delay){setTimeout(function(){$.prettyLoader.hide()},delay);}};$.prettyLoader.hide=function(){$(document).unbind('click',$.prettyLoader.positionLoader);$(document).unbind('mousemove',$.prettyLoader.positionLoader);$(window).unbind('scroll');$('.prettyLoader').fadeOut(settings.animation_speed,function(){$(this).remove();});};function _getScroll(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};}else if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};}else if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};};};return this;};})(jQuery);

/*
 * jQuery history plugin
 * 
 * The MIT License
 * 
 * Copyright (c) 2006-2009 Taku Sano (Mikage Sawatari)
 * Copyright (c) 2010 Takayuki Miwa
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

(function($) {
    var locationWrapper = {
        put: function(hash, win) {
            (win || window).location.hash = this.encoder(hash);
        },
        get: function(win) {
            var hash = ((win || window).location.hash).replace(/^#/, '');
            try {
                return $.browser.mozilla ? hash : decodeURIComponent(hash);
            }
            catch (error) {
                return hash;
            }
        },
        encoder: encodeURIComponent
    };

    var iframeWrapper = {
        id: "__jQuery_history",
        init: function() {
            var html = '<iframe id="'+ this.id +'" style="display:none" src="javascript:false;" />';
            $("body").prepend(html);
            return this;
        },
        _document: function() {
            return $("#"+ this.id)[0].contentWindow.document;
        },
        put: function(hash) {
            var doc = this._document();
            doc.open();
            doc.close();
            locationWrapper.put(hash, doc);
        },
        get: function() {
            return locationWrapper.get(this._document());
        }
    };

    function initObjects(options) {
        options = $.extend({
                unescape: false
            }, options || {});

        locationWrapper.encoder = encoder(options.unescape);

        function encoder(unescape_) {
            if(unescape_ === true) {
                return function(hash){ return hash; };
            }
            if(typeof unescape_ == "string" &&
               (unescape_ = partialDecoder(unescape_.split("")))
               || typeof unescape_ == "function") {
                return function(hash) { return unescape_(encodeURIComponent(hash)); };
            }
            return encodeURIComponent;
        }

        function partialDecoder(chars) {
            var re = new RegExp($.map(chars, encodeURIComponent).join("|"), "ig");
            return function(enc) { return enc.replace(re, decodeURIComponent); };
        }
    }

    var implementations = {};

    implementations.base = {
        callback: undefined,
        type: undefined,

        check: function() {},
        load:  function(hash) {	},
        init:  function(callback, options) {
            initObjects(options);
            self.callback = callback;
            self._options = options;
            self._init();
        },

        _init: function() {},
        _options: {}
    };

    implementations.timer = {
        _appState: undefined,
        _init: function() {
            var current_hash = locationWrapper.get();
            self._appState = current_hash;
            self.callback(current_hash);
            setInterval(self.check, 100);
        },
        check: function() {
            var current_hash = locationWrapper.get();
            if(current_hash != self._appState) {
                self._appState = current_hash;
                self.callback(current_hash);
            }
        },
        load: function(hash) {
            if(hash != self._appState) {
                locationWrapper.put(hash);
                self._appState = hash;
                self.callback(hash);
            }

        }
    };

    implementations.iframeTimer = {
        _appState: undefined,
        _init: function() {
            var current_hash = locationWrapper.get();
            self._appState = current_hash;
            iframeWrapper.init().put(current_hash);
            self.callback(current_hash);
            setInterval(self.check, 100);
        },
        check: function() {
            var iframe_hash = iframeWrapper.get(),
                location_hash = locationWrapper.get();

            if (location_hash != iframe_hash) {
                if (location_hash == self._appState) {    // user used Back or Forward button
                    self._appState = iframe_hash;
                    locationWrapper.put(iframe_hash);
                    self.callback(iframe_hash); 
                } else {                              // user loaded new bookmark
                    self._appState = location_hash;  
                    iframeWrapper.put(location_hash);
                    self.callback(location_hash);
                }
            }
        },
        load: function(hash) {
            if(hash != self._appState) {
                locationWrapper.put(hash);
                iframeWrapper.put(hash);
                self._appState = hash;
                self.callback(hash);
            }

        }
    };

    implementations.hashchangeEvent = {
        _init: function() {
            self.callback(locationWrapper.get());
            $(window).bind('hashchange', self.check);
        },
        check: function() {
            self.callback(locationWrapper.get());
        },
        load: function(hash) {
            locationWrapper.put(hash);

        }
    };

    var self = $.extend({}, implementations.base);

    if($.browser.msie && ($.browser.version < 8 || document.documentMode < 8)) {
        self.type = 'iframeTimer';
    } else if("onhashchange" in window) {
        self.type = 'hashchangeEvent';
    } else {
        self.type = 'timer';
    }

    $.extend(self, implementations[self.type]);
    $.history = self;
})(jQuery);


function init_autocomplete()
{
	$('#customers_query').autocomplete({
	    serviceUrl: 'autocomplete.php?type=customers', 
	    minChars: 2, 
	    delimiter: /(,|;)\s*/, 
	    maxHeight: 400, 
	    width: 350, 
	    zIndex: 9999, 
	    noCache: true,
	    deferRequestBy: 30, 
	    onSelect: function(data, value){ 
                 var url = value.replace(/^.*#/, '');
//                 $.history.load(url);
//                 navigate(url);
                 document.location.href=url;
//                 $('#query').val("");
	    } 
	});


	$('#products_query').autocomplete({
	    serviceUrl: 'autocomplete.php?products_add=1', 
	    minChars: 2, 
	    delimiter: /(,|;)\s*/, 
	    maxHeight: 400, 
	    width: 300, 
	    zIndex: 9999, 
	    deferRequestBy: 0, 

	    onSelect: function(data, value){
	          $.ajax({
	              type: 'POST',
	              url: 'shopping_cart_pr.php?action=add_product_pr&show_total=1&ajax=1&project_id='+document.getElementById('project_id').value,
	              data: 'products_id='+value,
	              success: function(data) {
		     $("#_content").html($(data).find("#_content").html())
	             $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
	 	     $('#_content .nyroModal').nyroModal();
                     init_autocomplete();
		     $('#_content .remote').click(function(e) {
	            var url = $(this).attr('href');
	            url = url.replace(/^.*#/, '');
	            $.history.load(url);
	            return false;
	     });

		      }
	              });
            } 
	});

}

/* jQuery Shopping Cart 
 *
 * Published under GNU License 
 * 
 * 2010/07/01 - by delete ( olivier@smartmarseille.com )
 * 2010/07/14 - by delete ( olivier@smartmarseille.com ) - Added Attributes support
 * 2011/01/01 - by Sergey Burkov ( http://www.oscommerce-ajax.com/ ) - product listing support
 */

function init_buynow (selector)  {
// Add to cart for product_info page
//
//alert("caller is " + arguments.callee.caller.toString());
$(selector).click(function()
{
    var idnum = $(this).attr('id').split('_');

    if (typeof(document.getElementById('pri_'+idnum[1]))!==undefined)
     var pid='pri_'+idnum[1];
    else 
     var pid='p_'+idnum[1];
    var prid=idnum[2];

    if ($(this).is('.cs')) var cs=true;
    else var cs=false;



    if ($('#'+pid).html()==null && document.getElementById('MagicZoomPlusImageproductImage')!=null) {var image_object = $('#MagicZoomPlusImageproductImage > img'); }
    else {
     var img = document.getElementById(pid);
     var image_object = $(img); 
    }



// Partial Source code from :  http://webresourcesdepot.com/wp-content/uploads/file/jbasket/fly-to-basket/
    var productX = $(image_object).offset().left;
    var productY = $(image_object).offset().top;


    if ($(this).is('.cs')) {
     $('#shopping_cart_box_cs').show();
     var basketX = $('#shopping_cart_box_cs').offset().left;
     var basketY = $('#shopping_cart_box_cs').offset().top;
    }
    else if ($(this).is('.fv') || $(this).is('.pr') ) {
//     $('#shopping_cart_box_fv').show();
     var basketX = $('#infocenter').offset().left;
     var basketY = $('#infocenter').offset().top;
    }
    else {
     var basketX = $('#shopping_cart_box').offset().left;
     var basketY = $('#shopping_cart_box').offset().top;
    }

    var gotoX = basketX - productX ;
    var gotoY = basketY - productY  ;

    var newImageWidth = $(image_object).width() / 3;
    var newImageHeight = $(image_object).height() / 3;

    $('#wrapper_'+idnum[1]).html('');
    $('#wrapper_'+idnum[1]).css(
        {
          'position':'absolute',
          'top': productY,
          'left': productX
        });
    
    var clone_image=$(image_object).clone();

	$(clone_image).prependTo('#wrapper_'+idnum[1])
        .css({'position' : 'absolute', 'border' : '1px dashed black'})
        .animate({opacity: 0.6})
        .animate({opacity: 0.0, marginLeft: gotoX, marginTop: gotoY, width: newImageWidth, height: newImageHeight}, 500, function (){$(clone_image).remove()})

//        function() {
          products_id = parseInt( idnum[1] ) ;
          qty = parseInt($('#pq-' + products_id).html()) ;

          if ( qty )  qty = qty + 1 ; 
          else qty = 1 ;
     
          // Look for attributes
          //
          products_attributes = '' ; 
          $('form[name=cart_quantity]').find('select option:selected').each(function() {
               products_attributes += '{' + $(this).parent().attr('name').replace(/[^0-9]/g, '') + '}' + $(this).val() ; 
          });  
          if ( products_attributes != '' ) products_id = products_id + products_attributes;

          // Updating infobox content 

          if ($('form[name=cart_quantity]').html() && document.getElementById('pri_'+idnum[1])==null) {
           if ($(this).is('.fv'))
            cart_url="shopping_cart_fv.php?action=add_product_fv&show_total=1&ajax=1";
           else if ($(this).is('.pr'))
            cart_url="shopping_cart_pr.php?action=add_product_pr&show_total=1&ajax=1&project_id="+prid;
           else
            cart_url=$('form[name=cart_quantity]').attr('action') + '&show_total=1&ajax=1';

	   formdata = $('form[name=cart_quantity]').serialize();

	  }
          else {
	   formdata="products_id="+idnum[1];
	   if ($(this).is('.cs'))
	   cart_url="shopping_cart_cs.php?action=add_product_cs&show_total=1&ajax=1";
	   else
	   cart_url="shopping_cart.php?action=add_product&show_total=1&ajax=1";

	   if (document.getElementById('pri_'+idnum[1])!==null)
	    cart_url="shopping_cart_pr.php?action=add_product_pr&show_total=1&ajax=1&project_id="+prid;
	  }
          $.ajax({
              type: 'POST',
              url: cart_url,
              data: formdata,
              success: function(data) {
		 if (cs) { 

                  $('#shopping_cart_box_cs').html($(data).find('#shopping_cart_box_cs').html());
                  $('#shopping_cart_box_cs .remote').click(function(e) {
                   var url = $(this).attr('href');
                   url = url.replace(/^.*#/, '');
                   $.history.load(url);
                   return false;
                  });

                 }
                  //Hide_Load();
                  }
              });


//        }

return(false) ;
});
}

jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};


/* EO jQuery Shopping Cart */


/*	
 *	jQuery carouFredSel 3.1.0
 *	Demo's and documentation:
 *	caroufredsel.frebsite.nl
 *	
 *	Copyright (c) 2010 Fred Heusschen
 *	www.frebsite.nl
 *
 *	Dual licensed under the MIT and GPL licenses.
 *	http://en.wikipedia.org/wiki/MIT_License
 *	http://en.wikipedia.org/wiki/GNU_General_Public_License
 */

(function($){$.fn.carouFredSel=function(o){if(this.length==0)return log('No element selected.');if(this.length>1){return this.each(function(){$(this).carouFredSel(o);});}
this.init=function(o){if(typeof o!='object')o={};if(typeof o.scroll=='number'){if(o.scroll<=50)o.scroll={items:o.scroll};else o.scroll={duration:o.scroll};}else{if(typeof o.scroll=='string')o.scroll={easing:o.scroll};}
if(typeof o.items=='number')o.items={visible:o.items};else if(typeof o.items=='string')o.items={visible:o.items,width:o.items,height:o.items};opts=$.extend(true,{},$.fn.carouFredSel.defaults,o);opts.padding=getPadding(opts.padding);opts.usePadding=(opts.padding[0]==0&&opts.padding[1]==0&&opts.padding[2]==0&&opts.padding[3]==0)?false:true;direction=(opts.direction=='up'||opts.direction=='left')?'next':'prev';if(opts.direction=='right'||opts.direction=='left'){opts.dimentions=['width','outerWidth','height','outerHeight','left','top','marginRight','innerWidth'];}else{opts.dimentions=['height','outerHeight','width','outerWidth','top','left','marginBottom','innerHeight'];opts.padding=[opts.padding[3],opts.padding[2],opts.padding[1],opts.padding[0]];}
if(!opts.items.width)opts.items.width=getItems($cfs).outerWidth(true);if(!opts.items.height)opts.items.height=getItems($cfs).outerHeight(true);if(opts.items.visible=='variable'){if(typeof opts[opts.dimentions[0]]=='number'){opts.maxDimention=opts[opts.dimentions[0]];opts[opts.dimentions[0]]=null;}else{opts.maxDimention=$wrp.parent()[opts.dimentions[7]]();}
if(opts.items[opts.dimentions[0]]=='variable'){varnumvisitem=true;opts.items.visible=0;}else{opts.items.visible=Math.floor(opts.maxDimention/opts.items[opts.dimentions[0]]);}}
if(typeof opts.items.minimum!='number')opts.items.minimum=opts.items.visible;if(typeof opts.scroll.items!='number')opts.scroll.items=opts.items.visible;if(typeof opts.scroll.duration!='number')opts.scroll.duration=500;opts.auto=getNaviObject(opts.auto,false,true);opts.prev=getNaviObject(opts.prev);opts.next=getNaviObject(opts.next);opts.pagination=getNaviObject(opts.pagination,true);opts.auto=$.extend({},opts.scroll,opts.auto);opts.prev=$.extend({},opts.scroll,opts.prev);opts.next=$.extend({},opts.scroll,opts.next);opts.pagination=$.extend({},opts.scroll,opts.pagination);if(typeof opts.pagination.keys!='boolean')opts.pagination.keys=false;if(typeof opts.pagination.anchorBuilder!='function')opts.pagination.anchorBuilder=$.fn.carouFredSel.pageAnchorBuilder;if(typeof opts.auto.play!='boolean')opts.auto.play=true;if(typeof opts.auto.nap!='boolean')opts.auto.nap=true;if(typeof opts.auto.delay!='number')opts.auto.delay=0;if(typeof opts.auto.pauseDuration!='number')opts.auto.pauseDuration=(opts.auto.duration<10)?2500:opts.auto.duration*5;};this.build=function(){$wrp.css({position:'relative',overflow:'hidden'});$cfs.data('cfs_origCss',{width:$cfs.css('width'),height:$cfs.css('height'),position:$cfs.css('position'),top:$cfs.css('top'),left:$cfs.css('left')}).css({position:'absolute'});if(opts.usePadding){getItems($cfs).each(function(){var m=parseInt($(this).css(opts.dimentions[6]));if(isNaN(m))m=0;$(this).data('cfs_origCssMargin',m);});}
showNavi(opts,totalItems);};this.bind_events=function(){$cfs.bind('pause',function(e,g){if(typeof g!='boolean')g=false;if(g)pausedGlobal=true;if(autoTimeout!=null){clearTimeout(autoTimeout);}
if(autoInterval!=null){clearInterval(autoInterval);}});$cfs.bind('play',function(e,d,f,g){$cfs.trigger('pause');if(opts.auto.play){if(typeof g!='boolean'){if(typeof f=='boolean')g=f;else if(typeof d=='boolean')g=d;else g=false;}
if(typeof f!='number'){if(typeof d=='number')f=d;else f=0;}
if(d!='prev'&&d!='next')d=direction;if(g)pausedGlobal=false;if(pausedGlobal)return;autoTimeout=setTimeout(function(){if($cfs.is(':animated')){$cfs.trigger('play',d);}else{pauseTimePassed=0;$cfs.trigger(d,opts.auto);}},opts.auto.pauseDuration+f-pauseTimePassed);if(opts.auto.pauseOnHover==='resume'){autoInterval=setInterval(function(){pauseTimePassed+=100;},100);}}});if(varnumvisitem){$cfs.bind('prev',function(e,sO,nI){if($cfs.is(':animated'))return false;var items=getItems($cfs),total=0,x=0;if(typeof sO=='number')nI=sO;if(typeof nI!='number'){for(var a=items.length-1;a>=0;a--){current=items.filter(':eq('+a+')')[opts.dimentions[1]](true);if(total+current>opts.maxDimention)break;total+=current;x++;}
nI=x;}
for(var a=items.length-nI;a<items.length;a++){current=items.filter(':eq('+a+')')[opts.dimentions[1]](true);if(total+current>opts.maxDimention)break;total+=current;if(a==items.length-1)a=0;x++;};opts.items.visible=x;$cfs.trigger('scrollPrev',[sO,nI]);});$cfs.bind('next',function(e,sO,nI){if($cfs.is(':animated'))return false;var items=getItems($cfs),total=0,x=0;if(typeof sO=='number')nI=sO;if(typeof nI!='number')nI=opts.items.visible;for(var a=nI;a<items.length;a++){current=items.filter(':eq('+a+')')[opts.dimentions[1]](true);if(total+current>opts.maxDimention)break;total+=current;if(a==items.length-1)a=0;x++;};opts.items.visible=x;$cfs.trigger('scrollNext',[sO,nI]);}).trigger('next',{duration:0});}else{$cfs.bind('prev',function(e,sO,nI){$cfs.trigger('scrollPrev',[sO,nI]);});$cfs.bind('next',function(e,sO,nI){$cfs.trigger('scrollNext',[sO,nI]);});}
$cfs.bind('scrollPrev',function(e,sO,nI){if($cfs.is(':animated'))return false;if(opts.items.minimum>=totalItems)return log('Not enough items: not scrolling');if(typeof sO=='number')nI=sO;if(typeof sO!='object')sO=opts.prev;if(typeof nI!='number')nI=sO.items;if(typeof nI!='number')return log('Not a valid number: not scrolling');if(!opts.circular){var nulItem=totalItems-firstItem;if(nulItem-nI<0){nI=nulItem;}
if(firstItem==0){nI=0;}}
firstItem+=nI;if(firstItem>=totalItems)firstItem-=totalItems;if(!opts.circular){if(firstItem==0&&nI!=0&&opts.prev.onEnd){opts.prev.onEnd();}
if(opts.infinite){if(nI==0){$cfs.trigger('next',totalItems-opts.items.visible);return false;}}else{if(firstItem==0&&opts.prev.button)opts.prev.button.addClass('disabled');if(opts.next.button)opts.next.button.removeClass('disabled');}}
if(nI==0){return false;}
getItems($cfs,':gt('+(totalItems-nI-1)+')').prependTo($cfs);if(totalItems<opts.items.visible+nI)getItems($cfs,':lt('+((opts.items.visible+nI)-totalItems)+')').clone(true).appendTo($cfs);var c_itm=getCurrentItems($cfs,opts,nI),l_cur=getItems($cfs,':nth('+(nI-1)+')'),l_old=c_itm[1].filter(':last'),l_new=c_itm[0].filter(':last');if(opts.usePadding)l_old.css(opts.dimentions[6],l_old.data('cfs_origCssMargin'));var i_siz=getSizes(opts,getItems($cfs,':lt('+nI+')')),w_siz=mapWrapperSizes(getSizes(opts,c_itm[0],true),opts);if(opts.usePadding)l_old.css(opts.dimentions[6],l_old.data('cfs_origCssMargin')+opts.padding[1]);var a_cfs={},a_new={},a_cur={},a_dur=sO.duration;if(a_dur=='auto')a_dur=opts.scroll.duration/opts.scroll.items*nI;else if(a_dur<=0)a_dur=0;else if(a_dur<10)a_dur=i_siz[0]/a_dur;if(sO.onBefore)sO.onBefore(c_itm[1],c_itm[0],w_siz,a_dur);if(opts.usePadding){var new_m=opts.padding[3];a_cur[opts.dimentions[6]]=l_cur.data('cfs_origCssMargin');a_new[opts.dimentions[6]]=l_new.data('cfs_origCssMargin')+opts.padding[1];l_cur.css(opts.dimentions[6],l_cur.data('cfs_origCssMargin')+opts.padding[3]);l_cur.stop().animate(a_cur,{duration:a_dur,easing:sO.easing});l_new.stop().animate(a_new,{duration:a_dur,easing:sO.easing});}else{var new_m=0;}
a_cfs[opts.dimentions[4]]=new_m;if((typeof opts[opts.dimentions[0]]!='number'&&typeof opts.items[opts.dimentions[0]]!='number')||(typeof opts[opts.dimentions[2]]!='number'&&typeof opts.items[opts.dimentions[2]]!='number')){$wrp.stop().animate(w_siz,{duration:a_dur,easing:sO.easing});}
$cfs.data('cfs_numItems',nI).data('cfs_slideObj',sO).data('cfs_oldItems',c_itm[1]).data('cfs_newItems',c_itm[0]).data('cfs_wrapSize',w_siz).css(opts.dimentions[4],-i_siz[0]).animate(a_cfs,{duration:a_dur,easing:sO.easing,complete:function(){if($cfs.data('cfs_slideObj').onAfter){$cfs.data('cfs_slideObj').onAfter($cfs.data('cfs_oldItems'),$cfs.data('cfs_newItems'),$cfs.data('cfs_wrapSize'));}
if(totalItems<opts.items.visible+$cfs.data('cfs_numItems')){getItems($cfs,':gt('+(totalItems-1)+')').remove();}
var l_itm=getItems($cfs,':nth('+(opts.items.visible+$cfs.data('cfs_numItems')-1)+')');if(opts.usePadding){l_itm.css(opts.dimentions[6],l_itm.data('cfs_origCssMargin'));}}});$cfs.trigger('updatePageStatus').trigger('play',a_dur);});$cfs.bind('scrollNext',function(e,sO,nI){if($cfs.is(':animated'))return false;if(opts.items.minimum>=totalItems)return log('Not enough items: not scrolling');if(typeof sO=='number')nI=sO;if(typeof sO!='object')sO=opts.next;if(typeof nI!='number')nI=sO.items;if(typeof nI!='number')return log('Not a valid number: not scrolling');if(!opts.circular){if(firstItem==0){if(nI>totalItems-opts.items.visible){nI=totalItems-opts.items.visible;}}else{if(firstItem-nI<opts.items.visible){nI=firstItem-opts.items.visible;}}}
firstItem-=nI;if(firstItem<0)firstItem+=totalItems;if(!opts.circular){if(firstItem==opts.items.visible&&nI!=0&&opts.next.onEnd){opts.next.onEnd();}
if(opts.infinite){if(nI==0){$cfs.trigger('prev',totalItems-opts.items.visible);return false;}}else{if(firstItem==opts.items.visible&&opts.next.button)opts.next.button.addClass('disabled');if(opts.prev.button)opts.prev.button.removeClass('disabled');}}
if(nI==0){return false;}
if(totalItems<opts.items.visible+nI)getItems($cfs,':lt('+((opts.items.visible+nI)-totalItems)+')').clone(true).appendTo($cfs);var c_itm=getCurrentItems($cfs,opts,nI),l_cur=getItems($cfs,':nth('+(nI-1)+')'),l_old=c_itm[0].filter(':last'),l_new=c_itm[1].filter(':last');if(opts.usePadding){l_old.css(opts.dimentions[6],l_old.data('cfs_origCssMargin'));l_new.css(opts.dimentions[6],l_new.data('cfs_origCssMargin'));}
var i_siz=getSizes(opts,getItems($cfs,':lt('+nI+')')),w_siz=mapWrapperSizes(getSizes(opts,c_itm[1],true),opts);if(opts.usePadding){l_old.css(opts.dimentions[6],l_old.data('cfs_origCssMargin')+opts.padding[1]);l_new.css(opts.dimentions[6],l_new.data('cfs_origCssMargin')+opts.padding[1]);}
var a_cfs={},a_old={},a_cur={},a_dur=sO.duration;if(a_dur=='auto')a_dur=opts.scroll.duration/opts.scroll.items*nI;else if(a_dur<=0)a_dur=0;else if(a_dur<10)a_dur=i_siz[0]/a_dur;if(sO.onBefore)sO.onBefore(c_itm[0],c_itm[1],w_siz,a_dur);a_cfs[opts.dimentions[4]]=-i_siz[0];if(opts.usePadding){a_old[opts.dimentions[6]]=l_old.data('cfs_origCssMargin');a_cur[opts.dimentions[6]]=l_cur.data('cfs_origCssMargin')+opts.padding[3];l_new.css(opts.dimentions[6],l_new.data('cfs_origCssMargin')+opts.padding[1]);l_old.stop().animate(a_old,{duration:a_dur,easing:sO.easing});l_cur.stop().animate(a_cur,{duration:a_dur,easing:sO.easing});}
if((typeof opts[opts.dimentions[0]]!='number'&&typeof opts.items[opts.dimentions[0]]!='number')||(typeof opts[opts.dimentions[2]]!='number'&&typeof opts.items[opts.dimentions[2]]!='number')){$wrp.stop().animate(w_siz,{duration:a_dur,easing:sO.easing});}
$cfs.data('cfs_numItems',nI).data('cfs_slideObj',sO).data('cfs_oldItems',c_itm[0]).data('cfs_newItems',c_itm[1]).data('cfs_wrapSize',w_siz).animate(a_cfs,{duration:a_dur,easing:sO.easing,complete:function(){if($cfs.data('cfs_slideObj').onAfter){$cfs.data('cfs_slideObj').onAfter($cfs.data('cfs_oldItems'),$cfs.data('cfs_newItems'),$cfs.data('cfs_wrapSize'));}
if(totalItems<opts.items.visible+$cfs.data('cfs_numItems')){getItems($cfs,':gt('+(totalItems-1)+')').remove();}
var org_m=(opts.usePadding)?opts.padding[3]:0;$cfs.css(opts.dimentions[4],org_m);var l_itm=getItems($cfs,':lt('+$cfs.data('cfs_numItems')+')').appendTo($cfs).filter(':last');if(opts.usePadding){l_itm.css(opts.dimentions[6],l_itm.data('cfs_origCssMargin'));}}});$cfs.trigger('updatePageStatus').trigger('play',a_dur);});$cfs.bind('slideTo',function(e,num,dev,org,obj){if($cfs.is(':animated'))return false;num=getItemIndex(num,dev,org,firstItem,totalItems,$cfs);if(num==0)return false;if(typeof obj!='object')obj=false;if(opts.circular){if(num<totalItems/2)$cfs.trigger('next',[obj,num]);else $cfs.trigger('prev',[obj,totalItems-num]);}else{if(firstItem==0||firstItem>num)$cfs.trigger('next',[obj,num]);else $cfs.trigger('prev',[obj,totalItems-num]);}}).bind('insertItem',function(e,itm,num,org,dev){if(typeof itm=='object'&&typeof itm.jquery=='undefined')itm=$(itm);if(typeof itm=='string')itm=$(itm);if(typeof itm!='object'||typeof itm.jquery=='undefined'||itm.length==0)return log('Not a valid object.');if(typeof num=='undefined'||num=='end'){$cfs.append(itm);}else{num=getItemIndex(num,dev,org,firstItem,totalItems,$cfs);var $cit=getItems($cfs,':nth('+num+')');if($cit.length){if(num<=firstItem)firstItem+=itm.length;$cit.before(itm);}else{$cfs.append(itm);}}
totalItems=getItems($cfs).length;link_anchors('','.caroufredsel',$cfs);setSizes($cfs,opts);showNavi(opts,totalItems);$cfs.trigger('updatePageStatus',true);}).bind('removeItem',function(e,num,org,dev){if(typeof num=='undefined'||num=='end'){getItems($cfs,':last').remove();}else{num=getItemIndex(num,dev,org,firstItem,totalItems,$cfs);var $cit=getItems($cfs,':nth('+num+')');if($cit.length){if(num<firstItem)firstItem-=$cit.length;$cit.remove();}}
totalItems=getItems($cfs).length;link_anchors('','.caroufredsel',$cfs);setSizes($cfs,opts);showNavi(opts,totalItems);$cfs.trigger('updatePageStatus',true);}).bind('updatePageStatus',function(e,bpa){if(!opts.pagination.container)return false;if(typeof bpa=='boolean'&&bpa){getItems(opts.pagination.container).remove();for(var a=0;a<Math.ceil(totalItems/opts.items.visible);a++){opts.pagination.container.append(opts.pagination.anchorBuilder(a+1));}
getItems(opts.pagination.container).unbind('click').each(function(a){$(this).click(function(e){e.preventDefault();$cfs.trigger('slideTo',[a*opts.items.visible,0,true,opts.pagination]);});});}
var nr=(firstItem==0)?0:Math.round((totalItems-firstItem)/opts.items.visible);getItems(opts.pagination.container).removeClass('selected').filter(':nth('+nr+')').addClass('selected');});};this.bind_buttons=function(){if(opts.auto.pauseOnHover&&opts.auto.play){$wrp.hover(function(){$cfs.trigger('pause');},function(){$cfs.trigger('play');});}
if(opts.prev.button){opts.prev.button.click(function(e){$cfs.trigger('prev');e.preventDefault();});if(opts.prev.pauseOnHover&&opts.auto.play){opts.prev.button.hover(function(){$cfs.trigger('pause');},function(){$cfs.trigger('play');});}
if(!opts.circular&&!opts.infinite){opts.prev.button.addClass('disabled');}}
if($.fn.mousewheel){if(opts.prev.mousewheel){$wrp.mousewheel(function(e,delta){if(delta>0){e.preventDefault();num=(typeof opts.prev.mousewheel=='number')?opts.prev.mousewheel:'';$cfs.trigger('prev',num);}});}
if(opts.next.mousewheel){$wrp.mousewheel(function(e,delta){if(delta<0){e.preventDefault();num=(typeof opts.next.mousewheel=='number')?opts.next.mousewheel:'';$cfs.trigger('next',num);}});}}
if(opts.next.button){opts.next.button.click(function(e){e.preventDefault();$cfs.trigger('next');});if(opts.next.pauseOnHover&&opts.auto.play){opts.next.button.hover(function(){$cfs.trigger('pause');},function(){$cfs.trigger('play');})}}
if(opts.pagination.container){$cfs.trigger('updatePageStatus',true);if(opts.pagination.pauseOnHover&&opts.auto.play){opts.pagination.container.hover(function(){$cfs.trigger('pause');},function(){$cfs.trigger('play');});}}
if(opts.next.key||opts.prev.key){$(document).keyup(function(e){var k=e.keyCode;if(k==opts.next.key){e.preventDefault();$cfs.trigger('next');}
if(k==opts.prev.key){e.preventDefault();$cfs.trigger('prev');}});}
if(opts.pagination.keys){$(document).keyup(function(e){var k=e.keyCode;if(k>=49&&k<58){k=(k-49)*opts.items.visible;if(k<=totalItems){e.preventDefault();$cfs.trigger('slideTo',[k,0,true,opts.pagination]);}}});}
if(opts.auto.play){$cfs.trigger('play',opts.auto.delay);if($.fn.nap&&opts.auto.nap){$cfs.nap('pause','play');}}};this.destroy=function(){$cfs.css($cfs.data('cfs_origCss')).unbind('pause').unbind('play').unbind('prev').unbind('next').unbind('scrollTo').unbind('slideTo').unbind('insertItem').unbind('removeItem').unbind('updatePageStatus');$wrp.replaceWith($cfs);return this;};this.configuration=function(a,b){if(typeof a=='undefined')return opts;if(typeof b=='undefined'){var r=eval('opts.'+a);if(typeof r=='undefined')r='';return r;}
eval('opts.'+a+' = b');this.init(opts);setSizes($cfs,opts);return this;};this.link_anchors=function($c,se){link_anchors($c,se,$cfs);};var $cfs=$(this),$wrp=$(this).wrap('<div class="caroufredsel_wrapper" />').parent(),opts={},totalItems=getItems($cfs).length,firstItem=0,autoTimeout=null,autoInterval=null,pauseTimePassed=0,pausedGlobal=false,direction='next',varnumvisitem=false;this.init(o);this.build();this.bind_events();this.bind_buttons();link_anchors('','.caroufredsel',$cfs);setSizes($cfs,opts);if(opts.items.start!==0&&opts.items.start!==false){var s=opts.items.start;if(opts.items.start===true){s=window.location.hash;if(!s.length)s=0;}
$cfs.trigger('slideTo',[s,0,true,{duration:0}]);}
return this;};$.fn.carouFredSel.defaults={infinite:true,circular:true,direction:'left',padding:0,items:{visible:5,start:0},scroll:{easing:'swing',pauseOnHover:false,mousewheel:false}};$.fn.carouFredSel.pageAnchorBuilder=function(nr){return'<a href="#"><span>'+nr+'</span></a>';};function link_anchors($c,se,$cfs){if(typeof $c=='undefined'||$c.length==0)$c=$('body');else if(typeof $c=='string')$c=$($c);if(typeof $c!='object')return false;if(typeof se=='undefined')se='';$c.find('a'+se).each(function(){var h=this.hash||'';if(h.length>0&&getItems($cfs).index($(h))!=-1){$(this).unbind('click').click(function(e){e.preventDefault();$cfs.trigger('slideTo',h);});}});}
function showNavi(o,t){if(o.items.minimum>=t){log('Not enough items: not scrolling');var f='hide';}else{var f='show';}
if(o.prev.button)o.prev.button[f]();if(o.next.button)o.next.button[f]();if(o.pagination.container)o.pagination.container[f]();}
function getKeyCode(k){if(k=='right')return 39;if(k=='left')return 37;if(k=='up')return 38;if(k=='down')return 40;return-1};function getNaviObject(obj,pagi,auto){if(typeof pagi!='boolean')pagi=false;if(typeof auto!='boolean')auto=false;if(typeof obj=='undefined')obj={};if(typeof obj=='string'){var temp=getKeyCode(obj);if(temp==-1)obj=$(obj);else obj=temp;}
if(pagi){if(typeof obj.jquery!='undefined')obj={container:obj};if(typeof Object=='boolean')obj={keys:obj};if(typeof obj.container=='string')obj.container=$(obj.container);}else if(auto){if(typeof obj=='boolean')obj={play:obj};if(typeof obj=='number')obj={pauseDuration:obj};}else{if(typeof obj.jquery!='undefined')obj={button:obj};if(typeof obj=='number')obj={key:obj};if(typeof obj.button=='string')obj.button=$(obj.button);if(typeof obj.key=='string')obj.key=getKeyCode(obj.key);}
return obj;};function getItems(a,f){if(typeof f!='string')f='';return $('> *'+f,a);};function getCurrentItems(c,o,n){var oi=getItems(c,':lt('+o.items.visible+')'),ni=getItems(c,':lt('+(o.items.visible+n)+'):gt('+(n-1)+')');return[oi,ni];};function getItemIndex(num,dev,org,firstItem,totalItems,$cfs){if(typeof num=='string'){if(isNaN(num))num=$(num);else num=parseInt(num);}
if(typeof num=='object'){if(typeof num.jquery=='undefined')num=$(num);num=getItems($cfs).index(num);if(num==-1)num=0;if(typeof org!='boolean')org=false;}else{if(typeof org!='boolean')org=true;}
if(isNaN(num))num=0;else num=parseInt(num);if(isNaN(dev))dev=0;else dev=parseInt(dev);if(org){num+=firstItem;}
num+=dev;if(totalItems>0){while(num>=totalItems){num-=totalItems;}
while(num<0){num+=totalItems;}}
return num;};function getSizes(o,$i,wrap){if(typeof wrap!='boolean')wrap=false;var di=o.dimentions,s1=0,s2=0;if(wrap&&typeof o[di[0]]=='number')s1+=o[di[0]];else if(typeof o.items[di[0]]=='number')s1+=o.items[di[0]]*$i.length;else{$i.each(function(){s1+=$(this)[di[1]](true);});}
if(wrap&&typeof o[di[2]]=='number')s2+=o[di[2]];else if(typeof o.items[di[2]]=='number')s2+=o.items[di[2]];else{$i.each(function(){var m=$(this)[di[3]](true);if(s2<m)s2=m;});}
return[s1,s2];};function mapWrapperSizes(ws,o){var pad=(o.usePadding)?o.padding:[0,0,0,0];var wra={};wra[o.dimentions[0]]=ws[0]+pad[1]+pad[3];wra[o.dimentions[2]]=ws[1]+pad[0]+pad[2];return wra;};function setSizes($c,o){var $w=$c.parent(),$i=getItems($c),$l=$i.filter(':nth('+(o.items.visible-1)+')'),is=getSizes(o,$i);$w.css(mapWrapperSizes(getSizes(o,$i.filter(':lt('+o.items.visible+')'),true),o));if(o.usePadding){$l.css(o.dimentions[6],$l.data('cfs_origCssMargin')+o.padding[1]);$c.css(o.dimentions[5],o.padding[0]);$c.css(o.dimentions[4],o.padding[3]);}
$c.css(o.dimentions[0],is[0]*2);$c.css(o.dimentions[2],is[1]);};function getPadding(p){if(typeof p=='number')p=[p];else if(typeof p=='string')p=p.split('px').join('').split(' ');if(typeof p!='object'){log('Not a valid value, padding set to "0".');p=[0];}
for(i in p){p[i]=parseInt(p[i]);}
switch(p.length){case 0:return[0,0,0,0];case 1:return[p[0],p[0],p[0],p[0]];case 2:return[p[0],p[1],p[0],p[1]];case 3:return[p[0],p[1],p[2],p[1]];default:return p;}};function log(m){if(typeof m=='string')m='carouFredSel: '+m;if(window.console&&window.console.log)window.console.log(m);else try{console.log(m);}catch(err){}
return false;};$.fn.caroufredsel=function(o){this.carouFredSel(o);};})(jQuery);
////////////////////

/*!
 * jQuery Form Plugin
 * version: 2.52 (07-DEC-2010)
 * @requires jQuery v1.3.2 or later
 *
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
;(function($){$.fn.ajaxSubmit=function(options){if(!this.length){log('ajaxSubmit: skipping submit process - no element selected');return this;}
if(typeof options=='function'){options={success:options};}
var action=this.attr('action');var url=(typeof action==='string')?$.trim(action):'';if(url){url=(url.match(/^([^#]+)/)||[])[1];}
url=url||window.location.href||'';options=$.extend(true,{url:url,type:this.attr('method')||'GET',iframeSrc:/^https/i.test(window.location.href||'')?'javascript:false':'about:blank'},options);var veto={};this.trigger('form-pre-serialize',[this,options,veto]);if(veto.veto){log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');return this;}
if(options.beforeSerialize&&options.beforeSerialize(this,options)===false){log('ajaxSubmit: submit aborted via beforeSerialize callback');return this;}
var n,v,a=this.formToArray(options.semantic);if(options.data){options.extraData=options.data;for(n in options.data){if(options.data[n]instanceof Array){for(var k in options.data[n]){a.push({name:n,value:options.data[n][k]});}}
else{v=options.data[n];v=$.isFunction(v)?v():v;a.push({name:n,value:v});}}}
if(options.beforeSubmit&&options.beforeSubmit(a,this,options)===false){log('ajaxSubmit: submit aborted via beforeSubmit callback');return this;}
this.trigger('form-submit-validate',[a,this,options,veto]);if(veto.veto){log('ajaxSubmit: submit vetoed via form-submit-validate trigger');return this;}
var q=$.param(a);if(options.type.toUpperCase()=='GET'){options.url+=(options.url.indexOf('?')>=0?'&':'?')+q;options.data=null;}
else{options.data=q;}
var $form=this,callbacks=[];if(options.resetForm){callbacks.push(function(){$form.resetForm();});}
if(options.clearForm){callbacks.push(function(){$form.clearForm();});}
if(!options.dataType&&options.target){var oldSuccess=options.success||function(){};callbacks.push(function(data){var fn=options.replaceTarget?'replaceWith':'html';$(options.target)[fn](data).each(oldSuccess,arguments);});}
else if(options.success){callbacks.push(options.success);}
options.success=function(data,status,xhr){var context=options.context||options;for(var i=0,max=callbacks.length;i<max;i++){callbacks[i].apply(context,[data,status,xhr||$form,$form]);}};var fileInputs=$('input:file',this).length>0;var mp='multipart/form-data';var multipart=($form.attr('enctype')==mp||$form.attr('encoding')==mp);if(options.iframe!==false&&(fileInputs||options.iframe||multipart)){if(options.closeKeepAlive){$.get(options.closeKeepAlive,fileUpload);}
else{fileUpload();}}
else{$.ajax(options);}
this.trigger('form-submit-notify',[this,options]);return this;function fileUpload(){var form=$form[0];if($(':input[name=submit],:input[id=submit]',form).length){alert('Error: Form elements must not have name or id of "submit".');return;}
var s=$.extend(true,{},$.ajaxSettings,options);s.context=s.context||s;var id='jqFormIO'+(new Date().getTime()),fn='_'+id;window[fn]=function(){var f=$io.data('form-plugin-onload');if(f){f();window[fn]=undefined;try{delete window[fn];}catch(e){}}}
var $io=$('<iframe id="'+id+'" name="'+id+'" src="'+s.iframeSrc+'" onload="window[\'_\'+this.id]()" />');var io=$io[0];$io.css({position:'absolute',top:'-1000px',left:'-1000px'});var xhr={aborted:0,responseText:null,responseXML:null,status:0,statusText:'n/a',getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(){this.aborted=1;$io.attr('src',s.iframeSrc);}};var g=s.global;if(g&&!$.active++){$.event.trigger("ajaxStart");}
if(g){$.event.trigger("ajaxSend",[xhr,s]);}
if(s.beforeSend&&s.beforeSend.call(s.context,xhr,s)===false){if(s.global){$.active--;}
return;}
if(xhr.aborted){return;}
var cbInvoked=false;var timedOut=0;var sub=form.clk;if(sub){var n=sub.name;if(n&&!sub.disabled){s.extraData=s.extraData||{};s.extraData[n]=sub.value;if(sub.type=="image"){s.extraData[n+'.x']=form.clk_x;s.extraData[n+'.y']=form.clk_y;}}}
function doSubmit(){var t=$form.attr('target'),a=$form.attr('action');form.setAttribute('target',id);if(form.getAttribute('method')!='POST'){form.setAttribute('method','POST');}
if(form.getAttribute('action')!=s.url){form.setAttribute('action',s.url);}
if(!s.skipEncodingOverride){$form.attr({encoding:'multipart/form-data',enctype:'multipart/form-data'});}
if(s.timeout){setTimeout(function(){timedOut=true;cb();},s.timeout);}
var extraInputs=[];try{if(s.extraData){for(var n in s.extraData){extraInputs.push($('<input type="hidden" name="'+n+'" value="'+s.extraData[n]+'" />').appendTo(form)[0]);}}
$io.appendTo('body');$io.data('form-plugin-onload',cb);form.submit();}
finally{form.setAttribute('action',a);if(t){form.setAttribute('target',t);}else{$form.removeAttr('target');}
$(extraInputs).remove();}}
if(s.forceSync){doSubmit();}
else{setTimeout(doSubmit,10);}
var data,doc,domCheckCount=50;function cb(){if(cbInvoked){return;}
$io.removeData('form-plugin-onload');var ok=true;try{if(timedOut){throw'timeout';}
doc=io.contentWindow?io.contentWindow.document:io.contentDocument?io.contentDocument:io.document;var isXml=s.dataType=='xml'||doc.XMLDocument||$.isXMLDoc(doc);log('isXml='+isXml);if(!isXml&&window.opera&&(doc.body==null||doc.body.innerHTML=='')){if(--domCheckCount){log('requeing onLoad callback, DOM not available');setTimeout(cb,250);return;}}
cbInvoked=true;xhr.responseText=doc.documentElement?doc.documentElement.innerHTML:null;xhr.responseXML=doc.XMLDocument?doc.XMLDocument:doc;xhr.getResponseHeader=function(header){var headers={'content-type':s.dataType};return headers[header];};var scr=/(json|script)/.test(s.dataType);if(scr||s.textarea){var ta=doc.getElementsByTagName('textarea')[0];if(ta){xhr.responseText=ta.value;}
else if(scr){var pre=doc.getElementsByTagName('pre')[0];var b=doc.getElementsByTagName('body')[0];if(pre){xhr.responseText=pre.textContent;}
else if(b){xhr.responseText=b.innerHTML;}}}
else if(s.dataType=='xml'&&!xhr.responseXML&&xhr.responseText!=null){xhr.responseXML=toXml(xhr.responseText);}
data=$.httpData(xhr,s.dataType);}
catch(e){log('error caught:',e);ok=false;xhr.error=e;$.handleError(s,xhr,'error',e);}
if(xhr.aborted){log('upload aborted');ok=false;}
if(ok){s.success.call(s.context,data,'success',xhr);if(g){$.event.trigger("ajaxSuccess",[xhr,s]);}}
if(g){$.event.trigger("ajaxComplete",[xhr,s]);}
if(g&&!--$.active){$.event.trigger("ajaxStop");}
if(s.complete){s.complete.call(s.context,xhr,ok?'success':'error');}
setTimeout(function(){$io.removeData('form-plugin-onload');$io.remove();xhr.responseXML=null;},100);}
function toXml(s,doc){if(window.ActiveXObject){doc=new ActiveXObject('Microsoft.XMLDOM');doc.async='false';doc.loadXML(s);}
else{doc=(new DOMParser()).parseFromString(s,'text/xml');}
return(doc&&doc.documentElement&&doc.documentElement.tagName!='parsererror')?doc:null;}}};$.fn.ajaxForm=function(options){if(this.length===0){var o={s:this.selector,c:this.context};if(!$.isReady&&o.s){log('DOM not ready, queuing ajaxForm');$(function(){$(o.s,o.c).ajaxForm(options);});return this;}
log('terminating; zero elements found by selector'+($.isReady?'':' (DOM not ready)'));return this;}
return this.ajaxFormUnbind().bind('submit.form-plugin',function(e){if(!e.isDefaultPrevented()){e.preventDefault();$(this).ajaxSubmit(options);}}).bind('click.form-plugin',function(e){var target=e.target;var $el=$(target);if(!($el.is(":submit,input:image"))){var t=$el.closest(':submit');if(t.length==0){return;}
target=t[0];}
var form=this;form.clk=target;if(target.type=='image'){if(e.offsetX!=undefined){form.clk_x=e.offsetX;form.clk_y=e.offsetY;}else if(typeof $.fn.offset=='function'){var offset=$el.offset();form.clk_x=e.pageX-offset.left;form.clk_y=e.pageY-offset.top;}else{form.clk_x=e.pageX-target.offsetLeft;form.clk_y=e.pageY-target.offsetTop;}}
setTimeout(function(){form.clk=form.clk_x=form.clk_y=null;},100);});};$.fn.ajaxFormUnbind=function(){return this.unbind('submit.form-plugin click.form-plugin');};$.fn.formToArray=function(semantic){var a=[];if(this.length===0){return a;}
var form=this[0];var els=semantic?form.getElementsByTagName('*'):form.elements;if(!els){return a;}
var i,j,n,v,el,max,jmax;for(i=0,max=els.length;i<max;i++){el=els[i];n=el.name;if(!n){continue;}
if(semantic&&form.clk&&el.type=="image"){if(!el.disabled&&form.clk==el){a.push({name:n,value:$(el).val()});a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y});}
continue;}
v=$.fieldValue(el,true);if(v&&v.constructor==Array){for(j=0,jmax=v.length;j<jmax;j++){a.push({name:n,value:v[j]});}}
else if(v!==null&&typeof v!='undefined'){a.push({name:n,value:v});}}
if(!semantic&&form.clk){var $input=$(form.clk),input=$input[0];n=input.name;if(n&&!input.disabled&&input.type=='image'){a.push({name:n,value:$input.val()});a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y});}}
return a;};$.fn.formSerialize=function(semantic){return $.param(this.formToArray(semantic));};$.fn.fieldSerialize=function(successful){var a=[];this.each(function(){var n=this.name;if(!n){return;}
var v=$.fieldValue(this,successful);if(v&&v.constructor==Array){for(var i=0,max=v.length;i<max;i++){a.push({name:n,value:v[i]});}}
else if(v!==null&&typeof v!='undefined'){a.push({name:this.name,value:v});}});return $.param(a);};$.fn.fieldValue=function(successful){for(var val=[],i=0,max=this.length;i<max;i++){var el=this[i];var v=$.fieldValue(el,successful);if(v===null||typeof v=='undefined'||(v.constructor==Array&&!v.length)){continue;}
v.constructor==Array?$.merge(val,v):val.push(v);}
return val;};$.fieldValue=function(el,successful){var n=el.name,t=el.type,tag=el.tagName.toLowerCase();if(successful===undefined){successful=true;}
if(successful&&(!n||el.disabled||t=='reset'||t=='button'||(t=='checkbox'||t=='radio')&&!el.checked||(t=='submit'||t=='image')&&el.form&&el.form.clk!=el||tag=='select'&&el.selectedIndex==-1)){return null;}
if(tag=='select'){var index=el.selectedIndex;if(index<0){return null;}
var a=[],ops=el.options;var one=(t=='select-one');var max=(one?index+1:ops.length);for(var i=(one?index:0);i<max;i++){var op=ops[i];if(op.selected){var v=op.value;if(!v){v=(op.attributes&&op.attributes['value']&&!(op.attributes['value'].specified))?op.text:op.value;}
if(one){return v;}
a.push(v);}}
return a;}
return $(el).val();};$.fn.clearForm=function(){return this.each(function(){$('input,select,textarea',this).clearFields();});};$.fn.clearFields=$.fn.clearInputs=function(){return this.each(function(){var t=this.type,tag=this.tagName.toLowerCase();if(t=='text'||t=='password'||tag=='textarea'){this.value='';}
else if(t=='checkbox'||t=='radio'){this.checked=false;}
else if(tag=='select'){this.selectedIndex=-1;}});};$.fn.resetForm=function(){return this.each(function(){if(typeof this.reset=='function'||(typeof this.reset=='object'&&!this.reset.nodeType)){this.reset();}});};$.fn.enable=function(b){if(b===undefined){b=true;}
return this.each(function(){this.disabled=!b;});};$.fn.selected=function(select){if(select===undefined){select=true;}
return this.each(function(){var t=this.type;if(t=='checkbox'||t=='radio'){this.checked=select;}
else if(this.tagName.toLowerCase()=='option'){var $sel=$(this).parent('select');if(select&&$sel[0]&&$sel[0].type=='select-one'){$sel.find('option').selected(false);}
this.selected=select;}});};function log(){if($.fn.ajaxSubmit.debug){var msg='[jquery.form] '+Array.prototype.join.call(arguments,'');if(window.console&&window.console.log){window.console.log(msg);}
else if(window.opera&&window.opera.postError){window.opera.postError(msg);}}};})(jQuery);

/*

Uniform v1.7.5
Copyright (©) 2009 Josh Pyles / Pixelmatrix Design LLC
Copyright (c) 2011 Sergey Burkov http://www.oscommerce-ajax.com
http://pixelmatrixdesign.com

Requires jQuery 1.4 or newer

Much thanks to Thomas Reynolds and Buck Wilson for their help and advice on this

Disabling text selection is made possible by Mathias Bynens <http://mathiasbynens.be/>
and his noSelect plugin. <http://github.com/mathiasbynens/noSelect-jQuery-Plugin>

Also, thanks to David Kaneda and Eugene Bond for their contributions to the plugin

License:
MIT License - http://www.opensource.org/licenses/mit-license.php

Enjoy!

*/
(function(a){a.uniform={options:{selectClass:"selector",radioClass:"radio",checkboxClass:"checker",fileClass:"uploader",filenameClass:"filename",fileBtnClass:"action",fileDefaultText:"No file selected",fileBtnText:"Choose File",checkedClass:"checked",focusClass:"focus",disabledClass:"disabled",buttonClass:"button",activeClass:"active",hoverClass:"hover",useID:true,idPrefix:"uniform",resetSelector:false,autoHide:true},elements:[]};if(a.browser.msie&&a.browser.version<7){a.support.selectOpacity=false}else{a.support.selectOpacity=true}a.fn.uniform=function(k){k=a.extend(a.uniform.options,k);var d=this;if(k.resetSelector!=false){a(k.resetSelector).mouseup(function(){function l(){a.uniform.update(d)}setTimeout(l,10)})}function j(l){$el=a(l);$el.addClass($el.attr("type"));b(l)}function g(l){a(l).addClass("uniform");b(l)}function i(o){var m=a(o);var p=a("<div>"),l=a("<span>");p.addClass(k.buttonClass);if(k.useID&&m.attr("id")!=""){p.attr("id",k.idPrefix+"-"+m.attr("id"))}var n;if(m.is("a")||m.is("button")){n=m.text()}else{if(m.is(":submit")||m.is(":reset")||m.is("input[type=button]")){n=m.attr("value")}}n=n==""?m.is(":reset")?"Reset":"Submit":n;l.html(n);m.css("opacity",0);m.wrap(p);m.wrap(l);p=m.closest("div");l=m.closest("span");if(m.is(":disabled")){p.addClass(k.disabledClass)}p.bind({"mouseenter.uniform":function(){p.addClass(k.hoverClass)},"mouseleave.uniform":function(){p.removeClass(k.hoverClass);p.removeClass(k.activeClass)},"mousedown.uniform touchbegin.uniform":function(){p.addClass(k.activeClass)},"mouseup.uniform touchend.uniform":function(){p.removeClass(k.activeClass)},"click.uniform touchend.uniform":function(r){if(a(r.target).is("span")||a(r.target).is("div")){if(o[0].dispatchEvent){var q=document.createEvent("MouseEvents");q.initEvent("click",true,true);o[0].dispatchEvent(q)}else{o[0].click()}}}});o.bind({"focus.uniform":function(){p.addClass(k.focusClass)},"blur.uniform":function(){p.removeClass(k.focusClass)}});a.uniform.noSelect(p);b(o)}function e(o){var m=a(o);var p=a("<div />"),l=a("<span />");if(!m.css("display")=="none"&&k.autoHide){p.hide()}p.addClass(k.selectClass);if(k.useID&&o.attr("id")!=""){p.attr("id",k.idPrefix+"-"+o.attr("id"))}var n=o.find(":selected:first");if(n.length==0){n=o.find("option:first")}l.html(n.html());o.css("opacity",0);o.wrap(p);o.before(l);p=o.parent("div");l=o.siblings("span");o.bind({"change.uniform":function(){l.text(o.find(":selected").text());p.removeClass(k.activeClass)},"focus.uniform":function(){p.addClass(k.focusClass)},"blur.uniform":function(){p.removeClass(k.focusClass);p.removeClass(k.activeClass)},"mousedown.uniform touchbegin.uniform":function(){p.addClass(k.activeClass)},"mouseup.uniform touchend.uniform":function(){p.removeClass(k.activeClass)},"click.uniform touchend.uniform":function(){p.removeClass(k.activeClass)},"mouseenter.uniform":function(){p.addClass(k.hoverClass)},"mouseleave.uniform":function(){p.removeClass(k.hoverClass);p.removeClass(k.activeClass)},"keyup.uniform":function(){l.text(o.find(":selected").html())}});if(a(o).attr("disabled")){p.addClass(k.disabledClass)}a.uniform.noSelect(l);b(o)}function f(n){var m=a(n);var o=a("<div />"),l=a("<span />");if(!m.css("display")=="none"&&k.autoHide){o.hide()}o.addClass(k.checkboxClass);if(k.useID&&n.attr("id")!=""){o.attr("id",k.idPrefix+"-"+n.attr("id"))}a(n).wrap(o);a(n).wrap(l);l=n.parent();o=l.parent();a(n).css("opacity",0).bind({"focus.uniform":function(){o.addClass(k.focusClass)},"blur.uniform":function(){o.removeClass(k.focusClass)},"click.uniform touchend.uniform":function(){if(!a(n).attr("checked")){l.removeClass(k.checkedClass)}else{l.addClass(k.checkedClass)}},"mousedown.uniform touchbegin.uniform":function(){o.addClass(k.activeClass)},"mouseup.uniform touchend.uniform":function(){o.removeClass(k.activeClass)},"mouseenter.uniform":function(){o.addClass(k.hoverClass)},"mouseleave.uniform":function(){o.removeClass(k.hoverClass);o.removeClass(k.activeClass)}});if(a(n).attr("checked")){l.addClass(k.checkedClass)}if(a(n).attr("disabled")){o.addClass(k.disabledClass)}b(n)}function c(n){var m=a(n);var o=a("<div />"),l=a("<span />");if(!m.css("display")=="none"&&k.autoHide){o.hide()}o.addClass(k.radioClass);if(k.useID&&n.attr("id")!=""){o.attr("id",k.idPrefix+"-"+n.attr("id"))}a(n).wrap(o);a(n).wrap(l);l=n.parent();o=l.parent();a(n).css("opacity",0).bind({"focus.uniform":function(){o.addClass(k.focusClass)},"blur.uniform":function(){o.removeClass(k.focusClass)},"click.uniform touchend.uniform":function(){if(!a(n).attr("checked")){l.removeClass(k.checkedClass)}else{var p=k.radioClass.split(" ")[0];a("."+p+" span."+k.checkedClass+":has([name='"+a(n).attr("name")+"'])").removeClass(k.checkedClass);l.addClass(k.checkedClass)}},"mousedown.uniform touchend.uniform":function(){if(!a(n).is(":disabled")){o.addClass(k.activeClass)}},"mouseup.uniform touchbegin.uniform":function(){o.removeClass(k.activeClass)},"mouseenter.uniform touchend.uniform":function(){o.addClass(k.hoverClass)},"mouseleave.uniform":function(){o.removeClass(k.hoverClass);o.removeClass(k.activeClass)}});if(a(n).attr("checked")){l.addClass(k.checkedClass)}if(a(n).attr("disabled")){o.addClass(k.disabledClass)}b(n)}function h(q){var o=a(q);var r=a("<div />"),p=a("<span>"+k.fileDefaultText+"</span>"),m=a("<span>"+k.fileBtnText+"</span>");if(!o.css("display")=="none"&&k.autoHide){r.hide()}r.addClass(k.fileClass);p.addClass(k.filenameClass);m.addClass(k.fileBtnClass);if(k.useID&&o.attr("id")!=""){r.attr("id",k.idPrefix+"-"+o.attr("id"))}o.wrap(r);o.after(m);o.after(p);r=o.closest("div");p=o.siblings("."+k.filenameClass);m=o.siblings("."+k.fileBtnClass);if(!o.attr("size")){var l=r.width();o.attr("size",l/10)}var n=function(){var s=o.val();if(s===""){s=k.fileDefaultText}else{s=s.split(/[\/\\]+/);s=s[(s.length-1)]}p.text(s)};n();o.css("opacity",0).bind({"focus.uniform":function(){r.addClass(k.focusClass)},"blur.uniform":function(){r.removeClass(k.focusClass)},"mousedown.uniform":function(){if(!a(q).is(":disabled")){r.addClass(k.activeClass)}},"mouseup.uniform":function(){r.removeClass(k.activeClass)},"mouseenter.uniform":function(){r.addClass(k.hoverClass)},"mouseleave.uniform":function(){r.removeClass(k.hoverClass);r.removeClass(k.activeClass)}});if(a.browser.msie){o.bind("click.uniform.ie7",function(){setTimeout(n,0)})}else{o.bind("change.uniform",n)}if(o.attr("disabled")){r.addClass(k.disabledClass)}a.uniform.noSelect(p);a.uniform.noSelect(m);b(q)}a.uniform.restore=function(l){if(l==undefined){l=a(a.uniform.elements)}a(l).each(function(){if(a(this).is(":checkbox")){a(this).unwrap().unwrap()}else{if(a(this).is("select")){a(this).siblings("span").remove();a(this).unwrap()}else{if(a(this).is(":radio")){a(this).unwrap().unwrap()}else{if(a(this).is(":file")){a(this).siblings("span").remove();a(this).unwrap()}else{if(a(this).is("button, :submit, :reset, a, input[type='button']")){a(this).unwrap().unwrap()}}}}}a(this).unbind(".uniform");a(this).css("opacity","1");var m=a.inArray(a(l),a.uniform.elements);a.uniform.elements.splice(m,1)})};function b(l){l=a(l).get();if(l.length>1){a.each(l,function(m,n){a.uniform.elements.push(n)})}else{a.uniform.elements.push(l)}}a.uniform.noSelect=function(l){function m(){return false}a(l).each(function(){this.onselectstart=this.ondragstart=m;a(this).mousedown(m).css({MozUserSelect:"none"})})};a.uniform.update=function(l){if(l==undefined){l=a(a.uniform.elements)}l=a(l);l.each(function(){var n=a(this);if(n.is("select")){var m=n.siblings("span");var p=n.parent("div");p.removeClass(k.hoverClass+" "+k.focusClass+" "+k.activeClass);m.html(n.find(":selected").html());if(n.is(":disabled")){p.addClass(k.disabledClass)}else{p.removeClass(k.disabledClass)}}else{if(n.is(":checkbox")){var m=n.closest("span");var p=n.closest("div");p.removeClass(k.hoverClass+" "+k.focusClass+" "+k.activeClass);m.removeClass(k.checkedClass);if(n.is(":checked")){m.addClass(k.checkedClass)}if(n.is(":disabled")){p.addClass(k.disabledClass)}else{p.removeClass(k.disabledClass)}}else{if(n.is(":radio")){var m=n.closest("span");var p=n.closest("div");p.removeClass(k.hoverClass+" "+k.focusClass+" "+k.activeClass);m.removeClass(k.checkedClass);if(n.is(":checked")){m.addClass(k.checkedClass)}if(n.is(":disabled")){p.addClass(k.disabledClass)}else{p.removeClass(k.disabledClass)}}else{if(n.is(":file")){var p=n.parent("div");var o=n.siblings(k.filenameClass);btnTag=n.siblings(k.fileBtnClass);p.removeClass(k.hoverClass+" "+k.focusClass+" "+k.activeClass);o.text(n.val());if(n.is(":disabled")){p.addClass(k.disabledClass)}else{p.removeClass(k.disabledClass)}}else{if(n.is(":submit")||n.is(":reset")||n.is("button")||n.is("a")||l.is("input[type=button]")){var p=n.closest("div");p.removeClass(k.hoverClass+" "+k.focusClass+" "+k.activeClass);if(n.is(":disabled")){p.addClass(k.disabledClass)}else{p.removeClass(k.disabledClass)}}}}}}})};return this.each(function(){if(a.support.selectOpacity){var l=a(this);if(l.is("select")){if(l.attr("multiple")!=true){if(l.attr("size")==undefined||l.attr("size")<=1){e(l)}}}else{if(l.is(":checkbox")){f(l)}else{if(l.is(":radio")){c(l)}else{if(l.is(":file")){h(l)}else{if(l.is(":text, :password, input[type='email']")){j(l)}else{if(l.is("textarea")){g(l)}else{if(l.is("a")||l.is(":submit")||l.is(":reset")||l.is("button")||l.is("input[type=button]")){i(l)}}}}}}}}})}})(jQuery);


var refresh_zoom=0;

(function($){
    var origContent = "";

    function loadContent(hash) {

     if(document.getElementById('MagicZoomPlusImageproductImage')) refresh_zoom=1;
        if(hash != "") {
            if(origContent == "") {
                origContent = $('#_content').html();
            }

           $('table.datepicker').remove();

           $('#_content').fadeOut("fast");
           $('#_content').load(hash+' #_content', function(response, status, xhr) {
//            alert($(response).find('#fffuuu').html());
            if ($(response).find('#MagicZoomPlusImageproductImage').html()!==null) testicle=1;
//alert($(response).find('#_content').html());
            if ($(response).find('#_content').html()==null || $('#_content').html() == null || status!='success') { //if the remote page is not ajaxified -  just do the redirection
             document.location.href=hash;
             return false;
            }

	if($("ul.dropdown").length) {
		$("ul.dropdown li").dropdown();
	}

	metric=$.cookie("metric");
	if (metric!=null) {
	change_metric(metric);
	$('input[value="'+metric+'"]').attr("checked", "checked");
	$.uniform.update($('input[name="metric"]'));
	}


	init_autocomplete();

	var d=new Date();

        $('input[name="delivery_time"]').simpleDatepicker( {startdate: d.getFullYear()});
            
	//ajax load callback
	    //if (testicle==1 && ball==1) MagicZoomPlus.refresh();
//	    if (testicle==1 && ball==0) MagicZoomPlus.start();

            MagicZoomPlus.stop();
            MagicZoomPlus.start();

            if (refresh_zoom==1) MagicZoomPlus.refresh();


    jQuery('.preload').preloadImages({
        showSpeed: 500   // length of fade-in animation, 500 is default
//        easing: 'easeOutQuad'   // optional easing, if you don't have any easing scripts - delete this option
    });


	      $('select[name="id[2]"]').bind("change", check_topcoats);
	      $('select[name="id[6]"]').bind("change", check_size);
	      check_topcoats();

            $("#shopping_cart_box_cs").html($(response).find("#shopping_cart_box_cs").html());
            $("#breadcrumb_box").html($(response).find("#breadcrumb_box").html());
            $("#myaccountlogoff").html($(response).find("#myaccountlogoff").html());
            //$("#tellafriend_box").html($(response).find("#tellafriend_box").html());
            //$("#categories_box").html($(response).find("#categories_box").html()); //uncomment for non-ajax categories box
            //$("#reviews_box").html($(response).find("#reviews_box").html());

	    init_buynow('.pi-add-to-cart');
            $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
	    $('#_content .nyroModal').nyroModal();
	    $('#_content .nyroModal .option').nyroModal({width: 616, height: 516});


//	    MagicZoomPlus.stop();
//	    MagicZoomPlus.start();
// 	    Shadowbox.init({language: 'en',players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
//	    });
//    Shadowbox.setup("#_content a.option", {language: 'en',players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
//    }); 
	    //$.prettyLoader();

            $('#_content a.remote').click(function(e) { 
                 var url = $(this).attr('href');
                 url = url.replace(/^.*#/, '');
                 $.history.load(url);
                 return false;
             });

            $('#breadcrumb_box a.remote').click(function(e) { 
                 var url = $(this).attr('href');
                 url = url.replace(/^.*#/, '');
                 $.history.load(url);
                 return false;
             });
            $('#myaccountlogoff a.remote').click(function(e) { 
                 var url = $(this).attr('href');
                 url = url.replace(/^.*#/, '');
                 $.history.load(url);
                 return false;
             });

    $('#_content .ajaxform').submit(function() {
	 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit({ 
	beforeSubmit:  showRequest,
        success:       showResponse  // post-submit callback 
    }); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 



	    $('#_content').fadeIn("fast");

	   });

           



        } else if(origContent != "") {
           $('#_content').html(origContent);
        }
//            if(MagicZoomPlus) 
//	     MagicZoomPlus.refresh();
    }


    $(document).ready(function() {

        $.history.init(loadContent);

	$(document).mousemove(function(e){
         cursor_x=e.pageX;
         cursor_y=e.pageY;
        });


      $('select[name="id[2]"]').bind("change", check_topcoats);
      $('select[name="id[6]"]').bind("change", check_size);
      check_topcoats();
	var d=new Date();
    $('input[name="delivery_time"]').simpleDatepicker( {startdate: d.getFullYear()});


        init_autocomplete();

    jQuery('.preload').preloadImages({
        showSpeed: 500   // length of fade-in animation, 500 is default
//        easing: 'easeOutQuad'   // optional easing, if you don't have any easing scripts - delete this option
    });

//    Shadowbox.init({language: 'en',players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
//    }); 

//Shadowbox.init({
//    skipSetup: true
//});

    // bind form using 'ajaxSubmit' 

    $('#_content .nyroModal .option').nyroModal({width: 616, height: 516});
    $('#_content .nyroModal').nyroModal();



    $('.ajaxform').submit(function() {
	
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit({ 
	beforeSubmit:  showRequest,
        success:       showResponse  // post-submit callback 
    }); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 


	$('#whatsnew_box .carousel').carouFredSel({
		direction: "up",
		auto: true,
		items: 1,
		width: "100%",

		scroll : {
                 pauseOnHover : true,
                 duration : 1200
         }});



	if($.browser.msie) { //fuck you bill
	 if (!(location.href.indexOf("/product_info.php")!=-1 && parseInt(jQuery.browser.version)==8))
	  {
           $('.carousel').each(function(){
             var w = parseFloat($(this).css("width"));
             var m = w/2
             $(this).css("margin-left", -1*parseInt(m))
 	   });
	 }
	}  

        init_buynow('.pi-add-to-cart');

	$.prettyLoader();
        $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");


        $('a.remote').click(function(e) {
                    var url = $(this).attr('href');
                    url = url.replace(/^.*#/, '');
                    $.history.load(url);
                    return false;
                });
});


})(jQuery);

function doRound(x, places) {
  return Math.round(x * Math.pow(10, places)) / Math.pow(10, places);
}

function change_metric(metric)
{

 var size_id=$('select[name="id[6]"]').attr('value');

 if (typeof(size_id)!=='undefined')
  {   
  if (metric=="inches")
    {
	 width=document.getElementsByName('options_values_width['+size_id+']')[0].value;
	 height=document.getElementsByName('options_values_height['+size_id+']')[0].value;
	 depth=document.getElementsByName('options_values_depth['+size_id+']')[0].value;
	}
	else 
	{
	 width=doRound(parseFloat(document.getElementsByName('options_values_width['+size_id+']')[0].value)*2.54,1);
	 height=doRound(parseFloat(document.getElementsByName('options_values_height['+size_id+']')[0].value)*2.54,1);
	 depth=doRound(parseFloat(document.getElementsByName('options_values_depth['+size_id+']')[0].value)*2.54,1);
	}
  }
 else  if (typeof(document.getElementsByName('products_width')[0])!=='undefined')
  {
    if (metric=="inches")
        {
	 width=document.getElementsByName('products_width')[0].value;
	 height=document.getElementsByName('products_height')[0].value;
	 depth=document.getElementsByName('products_depth')[0].value;
        }
        else
        {
	 width=doRound(parseFloat(document.getElementsByName('products_width')[0].value)*2.54,1);
	 height=doRound(parseFloat(document.getElementsByName('products_height')[0].value)*2.54,1);
	 depth=doRound(parseFloat(document.getElementsByName('products_depth')[0].value)*2.54,1);
	}
  }
 else return false;

width=width.toString().replace(".00","");
height=height.toString().replace(".00","");
depth=depth.toString().replace(".00","");

$.cookie("metric", metric);

if (metric=="inches")
 $('#size').html('<b>Size:</b> W '+width+' x D '+depth+' x H '+height+' inches');
else
 $('#size').html('<b>Size:</b> W '+width+' x D '+depth+' x H '+height+' cm');
}
function check_size()
{

if (typeof(document.getElementsByName('metric')[0])=='undefined') return false;

if (document.getElementsByName('metric')[0].checked) metric="inches";
else metric="metric";
 
if (metric=="inches") {
 width=document.getElementsByName('options_values_width['+this.value+']')[0].value;
 height=document.getElementsByName('options_values_height['+this.value+']')[0].value;
 depth=document.getElementsByName('options_values_depth['+this.value+']')[0].value;
 width=width.toString().replace(".00","");
 height=height.toString().replace(".00","");
 depth=depth.toString().replace(".00","");

 $('#size').html('<b>Size:</b> W '+width+'" x D '+depth+'" x H '+height+'"');
}
else {
 width=doRound(parseFloat(document.getElementsByName('options_values_width['+this.value+']')[0].value)*2.54,2);
 height=doRound(parseFloat(document.getElementsByName('options_values_height['+this.value+']')[0].value)*2.54,2);
 depth=doRound(parseFloat(document.getElementsByName('options_values_depth['+this.value+']')[0].value)*2.54,2);
 width=width.toString().replace(".00","");
 height=height.toString().replace(".00","");
 depth=depth.toString().replace(".00","");

 $('#size').html('<b>Size:</b> W '+width+'cm x D '+depth+'cm x H '+height+'cm');
}


}

function check_topcoats()
{
 var color_id=$('select[name="id[2]"]').attr('value');
 if(typeof(color_id) == 'undefined') return false;
 var products_id=$('input[name="products_id"]').attr('value');
 $.post("product_info.php", { cid: color_id, pid:products_id },
   function(data){
     $('select[name="id[3]"]').html(data);
     $.uniform.update($('select[name="id[3]"]'));
   });
}
    function showRequest(formData, jqForm, options) {
     submitted=false;
     if ($(jqForm).attr('name')=="advanced_search") $('#search_result').fadeOut("fast");
     else $('#_content').fadeOut("fast");
     return true;
    }
    function showResponse(responseText, statusText, xhr, $form)  {

           if ($form.attr('name')=="advanced_search") $('#search_result').html($(responseText).find('#search_result').html());
           else $('#_content').html($(responseText).find('#_content').html());

        $('table.datepicker').remove();
	var d=new Date();
        $('input[name="delivery_time"]').simpleDatepicker( {startdate: d.getFullYear()});


           $("#shopping_cart_box_cs").html($(responseText).find("#shopping_cart_box_cs").html());
           $("#breadcrumb_box").html($(responseText).find("#breadcrumb_box").html());
           //$("#categories_box").html($(responseText).find("#categories_box").html()); //uncomment for non-ajax categories box
           $("#reviews_box").html($(responseText).find("#reviews_box").html());
           $("#myaccountlogoff").html($(responseText).find("#myaccountlogoff").html());

            $('#_content a.remote').click(function(e) { 
                 var url = $(this).attr('href');
                 url = url.replace(/^.*#/, '');
                 $.history.load(url);
                 return false;
             });
            $('#breadcrumb_box a.remote').click(function(e) { 
                 var url = $(this).attr('href');
                 url = url.replace(/^.*#/, '');
                 $.history.load(url);
                 return false;
             });
            $('#myaccountlogoff a.remote').click(function(e) { 
                 var url = $(this).attr('href');
                 url = url.replace(/^.*#/, '');
                 $.history.load(url);
                 return false;
             });

    jQuery('.preload').preloadImages({
        showSpeed: 500   // length of fade-in animation, 500 is default
//        easing: 'easeOutQuad'   // optional easing, if you don't have any easing scripts - delete this option
    });


            init_buynow ('.pi-add-to-cart');
          $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
            MagicZoomPlus.stop();
            MagicZoomPlus.start();
            MagicZoomPlus.refresh();



    $('#_content .ajaxform').submit(function() {
	
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit({ 
	beforeSubmit:  showRequest,
        success:       showResponse  // post-submit callback 
    }); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 

	  if ($form.attr('name')=="advanced_search") $('#search_result').fadeIn("fast");
          else $('#_content').fadeIn("fast");

    }

function cart_product_remove (products_id, scriptname)
{
 $.post(scriptname+"?action=update_product", { "products_id[]":products_id, "cart_delete[]":products_id},
   function(data){
     $("#_content").html($(data).find("#_content").html())
     //$("#shopping_cart_box").html($(data).find("#shopping_cart_box").html())
      $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
     $('#_content .remote').click(function(e) {
            var url = $(this).attr('href');
            url = url.replace(/^.*#/, '');
            $.history.load(url);
            return false;
     });
   });
}


function cart_product_remove_cs (products_id, scriptname)
{
 $.post("shopping_cart_cs.php?action=update_product_cs", { "products_id[]":products_id, "cart_delete[]":products_id},
   function(data){
     $("#_content").html($(data).find("#_content").html())
     $("#shopping_cart_box_cs").html($(data).find("#shopping_cart_box_cs").html())
     $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
     $('#_content .remote').click(function(e) {
            var url = $(this).attr('href');
            url = url.replace(/^.*#/, '');
            $.history.load(url);
            return false;
     });
   });
}

function cart_product_remove_fv (products_id, scriptname)
{
 $.post("shopping_cart_fv.php?action=update_product_fv", { "products_id[]":products_id, "cart_delete[]":products_id},
   function(data){
     $("#_content").html($(data).find("#_content").html())
//     $("#shopping_cart_box_cs").html($(data).find("#shopping_cart_box_cs").html())
     $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
     $('#_content .remote').click(function(e) {
            var url = $(this).attr('href');
            url = url.replace(/^.*#/, '');
            $.history.load(url);
            return false;
     });
   });
}

function cart_product_remove_pr (products_id, project_id)
{
 $.post("shopping_cart_pr.php?action=update_product_pr&project_id="+project_id, { "products_id[]":products_id, "cart_delete[]":products_id},
   function(data){
     $("#_content").html($(data).find("#_content").html())
//     $("#shopping_cart_box_cs").html($(data).find("#shopping_cart_box_cs").html())
     $('#_content .nyroModal').nyroModal();
     $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
     init_autocomplete();
     $('#content a.remote').click(function(e) {
            var url = $(this).attr('href');
            url = url.replace(/^.*#/, '');
            $.history.load(url);
            return false;
     });
   });
}


function cart_product_qty (products_id, qty)
{
var formdata="products_id[]="+products_id+"&";
formdata+="cart_quantity[]="+qty+"&";

$('form[name=cart_quantity] input').each(function(){
 if (this.id.indexOf('attr_')!=-1) formdata+=$(this).serialize()+"&";
});


$.ajax({
  type: 'POST',
  url: "shopping_cart.php?action=update_product",
  data: formdata,
  success: function(data){
	     $("#_content").html($(data).find("#_content").html())
             $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
	     $("#shopping_cart_box").html($(data).find("#shopping_cart_box").html())
	     $('#_content .remote').click(function(e) {
	            var url = $(this).attr('href');
	            url = url.replace(/^.*#/, '');
	            $.history.load(url);
	            return false;
	     });
   	}
});

}

function cart_product_qty_cs (products_id, qty)
{
var formdata="products_id[]="+products_id+"&";
formdata+="cart_quantity[]="+qty+"&";

$('form[name=cart_quantity] input').each(function(){
 if (this.id.indexOf('attr_')!=-1) formdata+=$(this).serialize()+"&";
});


$.ajax({
  type: 'POST',
  url: "shopping_cart_cs.php?action=update_product_cs",
  data: formdata,
  success: function(data){
	     $("#_content").html($(data).find("#_content").html())
             $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
	     $("#shopping_cart_box_cs").html($(data).find("#shopping_cart_box_cs").html())
	     $('#_content .remote').click(function(e) {
	            var url = $(this).attr('href');
	            url = url.replace(/^.*#/, '');
	            $.history.load(url);
	            return false;
	     });
   	}
});

}

function cart_product_qty_pr (products_id, qty, project_id)
{
var formdata="products_id[]="+products_id+"&";
formdata+="cart_quantity[]="+qty+"&";

$('form[name=cart_quantity] input').each(function(){
 if (this.id.indexOf('attr_')!=-1) formdata+=$(this).serialize()+"&";
});


$.ajax({
  type: 'POST',
  url: "shopping_cart_pr.php?action=update_product_pr&project_id="+project_id,
  data: formdata,
  success: function(data){
	     $("#_content").html($(data).find("#_content").html())
             $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
//	     $("#shopping_cart_box_cs").html($(data).find("#shopping_cart_box_cs").html())
 	     $('#_content .nyroModal').nyroModal();
             init_autocomplete();
	     $('#_content .remote').click(function(e) {
	            var url = $(this).attr('href');
	            url = url.replace(/^.*#/, '');
	            $.history.load(url);
	            return false;
	     });
   	}
});

}

function cart_dec_qty(products_id)
{
 var currentVal=parseInt(document.getElementById('pl'+products_id).value)
 document.getElementById('pl'+products_id).value=currentVal-1
 cart_product_qty (products_id, currentVal-1)
}

function cart_inc_qty(products_id)
{
 var currentVal=parseInt(document.getElementById('pl'+products_id).value)
 document.getElementById('pl'+products_id).value=currentVal+1
 cart_product_qty (products_id, currentVal+1)
}

function cart_dec_qty_cs(products_id)
{
 var currentVal=parseInt(document.getElementById('pl'+products_id).value)
 document.getElementById('pl'+products_id).value=currentVal-1
 cart_product_qty_cs (products_id, currentVal-1)
}

function cart_inc_qty_cs(products_id)
{
 var currentVal=parseInt(document.getElementById('pl'+products_id).value)
 document.getElementById('pl'+products_id).value=currentVal+1
 cart_product_qty_cs (products_id, currentVal+1)
}

function cart_dec_qty_pr(products_id, project_id)
{
 var currentVal=parseInt(document.getElementById('pl'+products_id).value)
 document.getElementById('pl'+products_id).value=currentVal-1
 cart_product_qty_pr (products_id, currentVal-1, project_id)
}

function cart_inc_qty_pr(products_id, project_id)
{
 var currentVal=parseInt(document.getElementById('pl'+products_id).value)
 document.getElementById('pl'+products_id).value=currentVal+1
 cart_product_qty_pr (products_id, currentVal+1, project_id)
}


function box_product_remove (products_id)
{
 $.post("index.php?action=update_product_cs", { "products_id[]":products_id, "cart_delete[]":products_id},
   function(data){
     $("#shopping_cart_box_cs").html($(data).find("#shopping_cart_box_cs").html())

     $('#shopping_cart_box a.remote').click(function(e) {
            var url = $(this).attr('href');
            url = url.replace(/^.*#/, '');
            $.history.load(url);
            return false;
     });
   });
}

function fill_projects (self, product_id, folder_id)
{
var list_id=0;

 $.post("index.php?action=fetch_projects&products_id="+product_id+"&folder_id="+folder_id, 
   function(data){

     var jqobject = $(self).parent().find(':nth-child(2)');
     var jsobject = jqobject[0];

     $(jqobject).find('li').remove();
     $(jqobject).find('ul').remove();
     $(jqobject).find('a').remove();
     $(jqobject).append(data);

	if($("ul.dropdown").length) {
		$("ul.dropdown li").dropdown();
	}

//     var clone_projects=$('#infobox_projects');
//     $('#infobox_projects').html($(clone_projects.html()));

     $(self).parent().find(':nth-child(2) .nyroModal').nyroModal();

      init_buynow ($(self).parent().find(':nth-child(2) .pr'));
      $(self).parent().find(':nth-child(2) a.remote').click(function(e) {
            var url = $(this).attr('href');
            url = url.replace(/^.*#/, '');
            $.history.load(url);
            return false;
      });
//     }
   
   });
}

function update_note(product_id, project_id)
{
 note=document.getElementById("note_"+product_id).value;
 $.post("index.php?action=update_note&products_id="+product_id+"&project_id="+project_id, { "note":note},
   function(data){
   });
}

(function($){
    $.fn.preloadImages = function(options){

        var defaults = {
            showSpeed: 500,
            easing: ''
        };

        var options = $.extend(defaults, options);

        return this.each(function(){
            var container = $(this);
            var image = container.find('img');

            $(image).hide();
            $(image).bind('load error', function(){
                $(this).fadeIn(100).parent(container).removeClass('preload');
            }).each(function(){
                if(this.complete || ($.browser.msie && parseInt($.browser.version) == 6)) { $(this).trigger('load'); }
            });
        });
    }
})(jQuery);

$(document).ready(function(){
metric=$.cookie("metric");
if (metric!=null)
{
 change_metric(metric);
 $('input[value="'+metric+'"]').attr("checked", "checked");
 $.uniform.update($('input[name="metric"]'));
}

	if($("ul.dropdown").length) {
		$("ul.dropdown li").dropdown();
	}

});

$.fn.dropdown = function() {

	return this.each(function() {

		$(this).hover(function(){
			$(this).addClass("hover");
			$('> .dir',this).addClass("open");
			$('ul:first',this).css('visibility', 'visible');
		},function(){
			$(this).removeClass("hover");
			$('.open',this).removeClass("open");
			$('ul:first',this).css('visibility', 'hidden');
		});

	});

}