cursor_x=0;
cursor_y=0;
/*! jQuery v1.7.2 jquery.com | jquery.org/license */
(function(a,b){function cy(a){return f.isWindow(a)?a:a.nodeType===9?a.defaultView||a.parentWindow:!1}function cu(a){if(!cj[a]){var b=c.body,d=f("<"+a+">").appendTo(b),e=d.css("display");d.remove();if(e==="none"||e===""){ck||(ck=c.createElement("iframe"),ck.frameBorder=ck.width=ck.height=0),b.appendChild(ck);if(!cl||!ck.createElement)cl=(ck.contentWindow||ck.contentDocument).document,cl.write((f.support.boxModel?"<!doctype html>":"")+"<html><body>"),cl.close();d=cl.createElement(a),cl.body.appendChild(d),e=f.css(d,"display"),b.removeChild(ck)}cj[a]=e}return cj[a]}function ct(a,b){var c={};f.each(cp.concat.apply([],cp.slice(0,b)),function(){c[this]=a});return c}function cs(){cq=b}function cr(){setTimeout(cs,0);return cq=f.now()}function ci(){try{return new a.ActiveXObject("Microsoft.XMLHTTP")}catch(b){}}function ch(){try{return new a.XMLHttpRequest}catch(b){}}function cb(a,c){a.dataFilter&&(c=a.dataFilter(c,a.dataType));var d=a.dataTypes,e={},g,h,i=d.length,j,k=d[0],l,m,n,o,p;for(g=1;g<i;g++){if(g===1)for(h in a.converters)typeof h=="string"&&(e[h.toLowerCase()]=a.converters[h]);l=k,k=d[g];if(k==="*")k=l;else if(l!=="*"&&l!==k){m=l+" "+k,n=e[m]||e["* "+k];if(!n){p=b;for(o in e){j=o.split(" ");if(j[0]===l||j[0]==="*"){p=e[j[1]+" "+k];if(p){o=e[o],o===!0?n=p:p===!0&&(n=o);break}}}}!n&&!p&&f.error("No conversion from "+m.replace(" "," to ")),n!==!0&&(c=n?n(c):p(o(c)))}}return c}function ca(a,c,d){var e=a.contents,f=a.dataTypes,g=a.responseFields,h,i,j,k;for(i in g)i in d&&(c[g[i]]=d[i]);while(f[0]==="*")f.shift(),h===b&&(h=a.mimeType||c.getResponseHeader("content-type"));if(h)for(i in e)if(e[i]&&e[i].test(h)){f.unshift(i);break}if(f[0]in d)j=f[0];else{for(i in d){if(!f[0]||a.converters[i+" "+f[0]]){j=i;break}k||(k=i)}j=j||k}if(j){j!==f[0]&&f.unshift(j);return d[j]}}function b_(a,b,c,d){if(f.isArray(b))f.each(b,function(b,e){c||bD.test(a)?d(a,e):b_(a+"["+(typeof e=="object"?b:"")+"]",e,c,d)});else if(!c&&f.type(b)==="object")for(var e in b)b_(a+"["+e+"]",b[e],c,d);else d(a,b)}function b$(a,c){var d,e,g=f.ajaxSettings.flatOptions||{};for(d in c)c[d]!==b&&((g[d]?a:e||(e={}))[d]=c[d]);e&&f.extend(!0,a,e)}function bZ(a,c,d,e,f,g){f=f||c.dataTypes[0],g=g||{},g[f]=!0;var h=a[f],i=0,j=h?h.length:0,k=a===bS,l;for(;i<j&&(k||!l);i++)l=h[i](c,d,e),typeof l=="string"&&(!k||g[l]?l=b:(c.dataTypes.unshift(l),l=bZ(a,c,d,e,l,g)));(k||!l)&&!g["*"]&&(l=bZ(a,c,d,e,"*",g));return l}function bY(a){return function(b,c){typeof b!="string"&&(c=b,b="*");if(f.isFunction(c)){var d=b.toLowerCase().split(bO),e=0,g=d.length,h,i,j;for(;e<g;e++)h=d[e],j=/^\+/.test(h),j&&(h=h.substr(1)||"*"),i=a[h]=a[h]||[],i[j?"unshift":"push"](c)}}}function bB(a,b,c){var d=b==="width"?a.offsetWidth:a.offsetHeight,e=b==="width"?1:0,g=4;if(d>0){if(c!=="border")for(;e<g;e+=2)c||(d-=parseFloat(f.css(a,"padding"+bx[e]))||0),c==="margin"?d+=parseFloat(f.css(a,c+bx[e]))||0:d-=parseFloat(f.css(a,"border"+bx[e]+"Width"))||0;return d+"px"}d=by(a,b);if(d<0||d==null)d=a.style[b];if(bt.test(d))return d;d=parseFloat(d)||0;if(c)for(;e<g;e+=2)d+=parseFloat(f.css(a,"padding"+bx[e]))||0,c!=="padding"&&(d+=parseFloat(f.css(a,"border"+bx[e]+"Width"))||0),c==="margin"&&(d+=parseFloat(f.css(a,c+bx[e]))||0);return d+"px"}function bo(a){var b=c.createElement("div");bh.appendChild(b),b.innerHTML=a.outerHTML;return b.firstChild}function bn(a){var b=(a.nodeName||"").toLowerCase();b==="input"?bm(a):b!=="script"&&typeof a.getElementsByTagName!="undefined"&&f.grep(a.getElementsByTagName("input"),bm)}function bm(a){if(a.type==="checkbox"||a.type==="radio")a.defaultChecked=a.checked}function bl(a){return typeof a.getElementsByTagName!="undefined"?a.getElementsByTagName("*"):typeof a.querySelectorAll!="undefined"?a.querySelectorAll("*"):[]}function bk(a,b){var c;b.nodeType===1&&(b.clearAttributes&&b.clearAttributes(),b.mergeAttributes&&b.mergeAttributes(a),c=b.nodeName.toLowerCase(),c==="object"?b.outerHTML=a.outerHTML:c!=="input"||a.type!=="checkbox"&&a.type!=="radio"?c==="option"?b.selected=a.defaultSelected:c==="input"||c==="textarea"?b.defaultValue=a.defaultValue:c==="script"&&b.text!==a.text&&(b.text=a.text):(a.checked&&(b.defaultChecked=b.checked=a.checked),b.value!==a.value&&(b.value=a.value)),b.removeAttribute(f.expando),b.removeAttribute("_submit_attached"),b.removeAttribute("_change_attached"))}function bj(a,b){if(b.nodeType===1&&!!f.hasData(a)){var c,d,e,g=f._data(a),h=f._data(b,g),i=g.events;if(i){delete h.handle,h.events={};for(c in i)for(d=0,e=i[c].length;d<e;d++)f.event.add(b,c,i[c][d])}h.data&&(h.data=f.extend({},h.data))}}function bi(a,b){return f.nodeName(a,"table")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function U(a){var b=V.split("|"),c=a.createDocumentFragment();if(c.createElement)while(b.length)c.createElement(b.pop());return c}function T(a,b,c){b=b||0;if(f.isFunction(b))return f.grep(a,function(a,d){var e=!!b.call(a,d,a);return e===c});if(b.nodeType)return f.grep(a,function(a,d){return a===b===c});if(typeof b=="string"){var d=f.grep(a,function(a){return a.nodeType===1});if(O.test(b))return f.filter(b,d,!c);b=f.filter(b,d)}return f.grep(a,function(a,d){return f.inArray(a,b)>=0===c})}function S(a){return!a||!a.parentNode||a.parentNode.nodeType===11}function K(){return!0}function J(){return!1}function n(a,b,c){var d=b+"defer",e=b+"queue",g=b+"mark",h=f._data(a,d);h&&(c==="queue"||!f._data(a,e))&&(c==="mark"||!f._data(a,g))&&setTimeout(function(){!f._data(a,e)&&!f._data(a,g)&&(f.removeData(a,d,!0),h.fire())},0)}function m(a){for(var b in a){if(b==="data"&&f.isEmptyObject(a[b]))continue;if(b!=="toJSON")return!1}return!0}function l(a,c,d){if(d===b&&a.nodeType===1){var e="data-"+c.replace(k,"-$1").toLowerCase();d=a.getAttribute(e);if(typeof d=="string"){try{d=d==="true"?!0:d==="false"?!1:d==="null"?null:f.isNumeric(d)?+d:j.test(d)?f.parseJSON(d):d}catch(g){}f.data(a,c,d)}else d=b}return d}function h(a){var b=g[a]={},c,d;a=a.split(/\s+/);for(c=0,d=a.length;c<d;c++)b[a[c]]=!0;return b}var c=a.document,d=a.navigator,e=a.location,f=function(){function J(){if(!e.isReady){try{c.documentElement.doScroll("left")}catch(a){setTimeout(J,1);return}e.ready()}}var e=function(a,b){return new e.fn.init(a,b,h)},f=a.jQuery,g=a.$,h,i=/^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,j=/\S/,k=/^\s+/,l=/\s+$/,m=/^<(\w+)\s*\/?>(?:<\/\1>)?$/,n=/^[\],:{}\s]*$/,o=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,p=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,q=/(?:^|:|,)(?:\s*\[)+/g,r=/(webkit)[ \/]([\w.]+)/,s=/(opera)(?:.*version)?[ \/]([\w.]+)/,t=/(msie) ([\w.]+)/,u=/(mozilla)(?:.*? rv:([\w.]+))?/,v=/-([a-z]|[0-9])/ig,w=/^-ms-/,x=function(a,b){return(b+"").toUpperCase()},y=d.userAgent,z,A,B,C=Object.prototype.toString,D=Object.prototype.hasOwnProperty,E=Array.prototype.push,F=Array.prototype.slice,G=String.prototype.trim,H=Array.prototype.indexOf,I={};e.fn=e.prototype={constructor:e,init:function(a,d,f){var g,h,j,k;if(!a)return this;if(a.nodeType){this.context=this[0]=a,this.length=1;return this}if(a==="body"&&!d&&c.body){this.context=c,this[0]=c.body,this.selector=a,this.length=1;return this}if(typeof a=="string"){a.charAt(0)!=="<"||a.charAt(a.length-1)!==">"||a.length<3?g=i.exec(a):g=[null,a,null];if(g&&(g[1]||!d)){if(g[1]){d=d instanceof e?d[0]:d,k=d?d.ownerDocument||d:c,j=m.exec(a),j?e.isPlainObject(d)?(a=[c.createElement(j[1])],e.fn.attr.call(a,d,!0)):a=[k.createElement(j[1])]:(j=e.buildFragment([g[1]],[k]),a=(j.cacheable?e.clone(j.fragment):j.fragment).childNodes);return e.merge(this,a)}h=c.getElementById(g[2]);if(h&&h.parentNode){if(h.id!==g[2])return f.find(a);this.length=1,this[0]=h}this.context=c,this.selector=a;return this}return!d||d.jquery?(d||f).find(a):this.constructor(d).find(a)}if(e.isFunction(a))return f.ready(a);a.selector!==b&&(this.selector=a.selector,this.context=a.context);return e.makeArray(a,this)},selector:"",jquery:"1.7.2",length:0,size:function(){return this.length},toArray:function(){return F.call(this,0)},get:function(a){return a==null?this.toArray():a<0?this[this.length+a]:this[a]},pushStack:function(a,b,c){var d=this.constructor();e.isArray(a)?E.apply(d,a):e.merge(d,a),d.prevObject=this,d.context=this.context,b==="find"?d.selector=this.selector+(this.selector?" ":"")+c:b&&(d.selector=this.selector+"."+b+"("+c+")");return d},each:function(a,b){return e.each(this,a,b)},ready:function(a){e.bindReady(),A.add(a);return this},eq:function(a){a=+a;return a===-1?this.slice(a):this.slice(a,a+1)},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},slice:function(){return this.pushStack(F.apply(this,arguments),"slice",F.call(arguments).join(","))},map:function(a){return this.pushStack(e.map(this,function(b,c){return a.call(b,c,b)}))},end:function(){return this.prevObject||this.constructor(null)},push:E,sort:[].sort,splice:[].splice},e.fn.init.prototype=e.fn,e.extend=e.fn.extend=function(){var a,c,d,f,g,h,i=arguments[0]||{},j=1,k=arguments.length,l=!1;typeof i=="boolean"&&(l=i,i=arguments[1]||{},j=2),typeof i!="object"&&!e.isFunction(i)&&(i={}),k===j&&(i=this,--j);for(;j<k;j++)if((a=arguments[j])!=null)for(c in a){d=i[c],f=a[c];if(i===f)continue;l&&f&&(e.isPlainObject(f)||(g=e.isArray(f)))?(g?(g=!1,h=d&&e.isArray(d)?d:[]):h=d&&e.isPlainObject(d)?d:{},i[c]=e.extend(l,h,f)):f!==b&&(i[c]=f)}return i},e.extend({noConflict:function(b){a.$===e&&(a.$=g),b&&a.jQuery===e&&(a.jQuery=f);return e},isReady:!1,readyWait:1,holdReady:function(a){a?e.readyWait++:e.ready(!0)},ready:function(a){if(a===!0&&!--e.readyWait||a!==!0&&!e.isReady){if(!c.body)return setTimeout(e.ready,1);e.isReady=!0;if(a!==!0&&--e.readyWait>0)return;A.fireWith(c,[e]),e.fn.trigger&&e(c).trigger("ready").off("ready")}},bindReady:function(){if(!A){A=e.Callbacks("once memory");if(c.readyState==="complete")return setTimeout(e.ready,1);if(c.addEventListener)c.addEventListener("DOMContentLoaded",B,!1),a.addEventListener("load",e.ready,!1);else if(c.attachEvent){c.attachEvent("onreadystatechange",B),a.attachEvent("onload",e.ready);var b=!1;try{b=a.frameElement==null}catch(d){}c.documentElement.doScroll&&b&&J()}}},isFunction:function(a){return e.type(a)==="function"},isArray:Array.isArray||function(a){return e.type(a)==="array"},isWindow:function(a){return a!=null&&a==a.window},isNumeric:function(a){return!isNaN(parseFloat(a))&&isFinite(a)},type:function(a){return a==null?String(a):I[C.call(a)]||"object"},isPlainObject:function(a){if(!a||e.type(a)!=="object"||a.nodeType||e.isWindow(a))return!1;try{if(a.constructor&&!D.call(a,"constructor")&&!D.call(a.constructor.prototype,"isPrototypeOf"))return!1}catch(c){return!1}var d;for(d in a);return d===b||D.call(a,d)},isEmptyObject:function(a){for(var b in a)return!1;return!0},error:function(a){throw new Error(a)},parseJSON:function(b){if(typeof b!="string"||!b)return null;b=e.trim(b);if(a.JSON&&a.JSON.parse)return a.JSON.parse(b);if(n.test(b.replace(o,"@").replace(p,"]").replace(q,"")))return(new Function("return "+b))();e.error("Invalid JSON: "+b)},parseXML:function(c){if(typeof c!="string"||!c)return null;var d,f;try{a.DOMParser?(f=new DOMParser,d=f.parseFromString(c,"text/xml")):(d=new ActiveXObject("Microsoft.XMLDOM"),d.async="false",d.loadXML(c))}catch(g){d=b}(!d||!d.documentElement||d.getElementsByTagName("parsererror").length)&&e.error("Invalid XML: "+c);return d},noop:function(){},globalEval:function(b){b&&j.test(b)&&(a.execScript||function(b){a.eval.call(a,b)})(b)},camelCase:function(a){return a.replace(w,"ms-").replace(v,x)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toUpperCase()===b.toUpperCase()},each:function(a,c,d){var f,g=0,h=a.length,i=h===b||e.isFunction(a);if(d){if(i){for(f in a)if(c.apply(a[f],d)===!1)break}else for(;g<h;)if(c.apply(a[g++],d)===!1)break}else if(i){for(f in a)if(c.call(a[f],f,a[f])===!1)break}else for(;g<h;)if(c.call(a[g],g,a[g++])===!1)break;return a},trim:G?function(a){return a==null?"":G.call(a)}:function(a){return a==null?"":(a+"").replace(k,"").replace(l,"")},makeArray:function(a,b){var c=b||[];if(a!=null){var d=e.type(a);a.length==null||d==="string"||d==="function"||d==="regexp"||e.isWindow(a)?E.call(c,a):e.merge(c,a)}return c},inArray:function(a,b,c){var d;if(b){if(H)return H.call(b,a,c);d=b.length,c=c?c<0?Math.max(0,d+c):c:0;for(;c<d;c++)if(c in b&&b[c]===a)return c}return-1},merge:function(a,c){var d=a.length,e=0;if(typeof c.length=="number")for(var f=c.length;e<f;e++)a[d++]=c[e];else while(c[e]!==b)a[d++]=c[e++];a.length=d;return a},grep:function(a,b,c){var d=[],e;c=!!c;for(var f=0,g=a.length;f<g;f++)e=!!b(a[f],f),c!==e&&d.push(a[f]);return d},map:function(a,c,d){var f,g,h=[],i=0,j=a.length,k=a instanceof e||j!==b&&typeof j=="number"&&(j>0&&a[0]&&a[j-1]||j===0||e.isArray(a));if(k)for(;i<j;i++)f=c(a[i],i,d),f!=null&&(h[h.length]=f);else for(g in a)f=c(a[g],g,d),f!=null&&(h[h.length]=f);return h.concat.apply([],h)},guid:1,proxy:function(a,c){if(typeof c=="string"){var d=a[c];c=a,a=d}if(!e.isFunction(a))return b;var f=F.call(arguments,2),g=function(){return a.apply(c,f.concat(F.call(arguments)))};g.guid=a.guid=a.guid||g.guid||e.guid++;return g},access:function(a,c,d,f,g,h,i){var j,k=d==null,l=0,m=a.length;if(d&&typeof d=="object"){for(l in d)e.access(a,c,l,d[l],1,h,f);g=1}else if(f!==b){j=i===b&&e.isFunction(f),k&&(j?(j=c,c=function(a,b,c){return j.call(e(a),c)}):(c.call(a,f),c=null));if(c)for(;l<m;l++)c(a[l],d,j?f.call(a[l],l,c(a[l],d)):f,i);g=1}return g?a:k?c.call(a):m?c(a[0],d):h},now:function(){return(new Date).getTime()},uaMatch:function(a){a=a.toLowerCase();var b=r.exec(a)||s.exec(a)||t.exec(a)||a.indexOf("compatible")<0&&u.exec(a)||[];return{browser:b[1]||"",version:b[2]||"0"}},sub:function(){function a(b,c){return new a.fn.init(b,c)}e.extend(!0,a,this),a.superclass=this,a.fn=a.prototype=this(),a.fn.constructor=a,a.sub=this.sub,a.fn.init=function(d,f){f&&f instanceof e&&!(f instanceof a)&&(f=a(f));return e.fn.init.call(this,d,f,b)},a.fn.init.prototype=a.fn;var b=a(c);return a},browser:{}}),e.each("Boolean Number String Function Array Date RegExp Object".split(" "),function(a,b){I["[object "+b+"]"]=b.toLowerCase()}),z=e.uaMatch(y),z.browser&&(e.browser[z.browser]=!0,e.browser.version=z.version),e.browser.webkit&&(e.browser.safari=!0),j.test(" ")&&(k=/^[\s\xA0]+/,l=/[\s\xA0]+$/),h=e(c),c.addEventListener?B=function(){c.removeEventListener("DOMContentLoaded",B,!1),e.ready()}:c.attachEvent&&(B=function(){c.readyState==="complete"&&(c.detachEvent("onreadystatechange",B),e.ready())});return e}(),g={};f.Callbacks=function(a){a=a?g[a]||h(a):{};var c=[],d=[],e,i,j,k,l,m,n=function(b){var d,e,g,h,i;for(d=0,e=b.length;d<e;d++)g=b[d],h=f.type(g),h==="array"?n(g):h==="function"&&(!a.unique||!p.has(g))&&c.push(g)},o=function(b,f){f=f||[],e=!a.memory||[b,f],i=!0,j=!0,m=k||0,k=0,l=c.length;for(;c&&m<l;m++)if(c[m].apply(b,f)===!1&&a.stopOnFalse){e=!0;break}j=!1,c&&(a.once?e===!0?p.disable():c=[]:d&&d.length&&(e=d.shift(),p.fireWith(e[0],e[1])))},p={add:function(){if(c){var a=c.length;n(arguments),j?l=c.length:e&&e!==!0&&(k=a,o(e[0],e[1]))}return this},remove:function(){if(c){var b=arguments,d=0,e=b.length;for(;d<e;d++)for(var f=0;f<c.length;f++)if(b[d]===c[f]){j&&f<=l&&(l--,f<=m&&m--),c.splice(f--,1);if(a.unique)break}}return this},has:function(a){if(c){var b=0,d=c.length;for(;b<d;b++)if(a===c[b])return!0}return!1},empty:function(){c=[];return this},disable:function(){c=d=e=b;return this},disabled:function(){return!c},lock:function(){d=b,(!e||e===!0)&&p.disable();return this},locked:function(){return!d},fireWith:function(b,c){d&&(j?a.once||d.push([b,c]):(!a.once||!e)&&o(b,c));return this},fire:function(){p.fireWith(this,arguments);return this},fired:function(){return!!i}};return p};var i=[].slice;f.extend({Deferred:function(a){var b=f.Callbacks("once memory"),c=f.Callbacks("once memory"),d=f.Callbacks("memory"),e="pending",g={resolve:b,reject:c,notify:d},h={done:b.add,fail:c.add,progress:d.add,state:function(){return e},isResolved:b.fired,isRejected:c.fired,then:function(a,b,c){i.done(a).fail(b).progress(c);return this},always:function(){i.done.apply(i,arguments).fail.apply(i,arguments);return this},pipe:function(a,b,c){return f.Deferred(function(d){f.each({done:[a,"resolve"],fail:[b,"reject"],progress:[c,"notify"]},function(a,b){var c=b[0],e=b[1],g;f.isFunction(c)?i[a](function(){g=c.apply(this,arguments),g&&f.isFunction(g.promise)?g.promise().then(d.resolve,d.reject,d.notify):d[e+"With"](this===i?d:this,[g])}):i[a](d[e])})}).promise()},promise:function(a){if(a==null)a=h;else for(var b in h)a[b]=h[b];return a}},i=h.promise({}),j;for(j in g)i[j]=g[j].fire,i[j+"With"]=g[j].fireWith;i.done(function(){e="resolved"},c.disable,d.lock).fail(function(){e="rejected"},b.disable,d.lock),a&&a.call(i,i);return i},when:function(a){function m(a){return function(b){e[a]=arguments.length>1?i.call(arguments,0):b,j.notifyWith(k,e)}}function l(a){return function(c){b[a]=arguments.length>1?i.call(arguments,0):c,--g||j.resolveWith(j,b)}}var b=i.call(arguments,0),c=0,d=b.length,e=Array(d),g=d,h=d,j=d<=1&&a&&f.isFunction(a.promise)?a:f.Deferred(),k=j.promise();if(d>1){for(;c<d;c++)b[c]&&b[c].promise&&f.isFunction(b[c].promise)?b[c].promise().then(l(c),j.reject,m(c)):--g;g||j.resolveWith(j,b)}else j!==a&&j.resolveWith(j,d?[a]:[]);return k}}),f.support=function(){var b,d,e,g,h,i,j,k,l,m,n,o,p=c.createElement("div"),q=c.documentElement;p.setAttribute("className","t"),p.innerHTML="   <link/><table></table><a href='/a' style='top:1px;float:left;opacity:.55;'>a</a><input type='checkbox'/>",d=p.getElementsByTagName("*"),e=p.getElementsByTagName("a")[0];if(!d||!d.length||!e)return{};g=c.createElement("select"),h=g.appendChild(c.createElement("option")),i=p.getElementsByTagName("input")[0],b={leadingWhitespace:p.firstChild.nodeType===3,tbody:!p.getElementsByTagName("tbody").length,htmlSerialize:!!p.getElementsByTagName("link").length,style:/top/.test(e.getAttribute("style")),hrefNormalized:e.getAttribute("href")==="/a",opacity:/^0.55/.test(e.style.opacity),cssFloat:!!e.style.cssFloat,checkOn:i.value==="on",optSelected:h.selected,getSetAttribute:p.className!=="t",enctype:!!c.createElement("form").enctype,html5Clone:c.createElement("nav").cloneNode(!0).outerHTML!=="<:nav></:nav>",submitBubbles:!0,changeBubbles:!0,focusinBubbles:!1,deleteExpando:!0,noCloneEvent:!0,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableMarginRight:!0,pixelMargin:!0},f.boxModel=b.boxModel=c.compatMode==="CSS1Compat",i.checked=!0,b.noCloneChecked=i.cloneNode(!0).checked,g.disabled=!0,b.optDisabled=!h.disabled;try{delete p.test}catch(r){b.deleteExpando=!1}!p.addEventListener&&p.attachEvent&&p.fireEvent&&(p.attachEvent("onclick",function(){b.noCloneEvent=!1}),p.cloneNode(!0).fireEvent("onclick")),i=c.createElement("input"),i.value="t",i.setAttribute("type","radio"),b.radioValue=i.value==="t",i.setAttribute("checked","checked"),i.setAttribute("name","t"),p.appendChild(i),j=c.createDocumentFragment(),j.appendChild(p.lastChild),b.checkClone=j.cloneNode(!0).cloneNode(!0).lastChild.checked,b.appendChecked=i.checked,j.removeChild(i),j.appendChild(p);if(p.attachEvent)for(n in{submit:1,change:1,focusin:1})m="on"+n,o=m in p,o||(p.setAttribute(m,"return;"),o=typeof p[m]=="function"),b[n+"Bubbles"]=o;j.removeChild(p),j=g=h=p=i=null,f(function(){var d,e,g,h,i,j,l,m,n,q,r,s,t,u=c.getElementsByTagName("body")[0];!u||(m=1,t="padding:0;margin:0;border:",r="position:absolute;top:0;left:0;width:1px;height:1px;",s=t+"0;visibility:hidden;",n="style='"+r+t+"5px solid #000;",q="<div "+n+"display:block;'><div style='"+t+"0;display:block;overflow:hidden;'></div></div>"+"<table "+n+"' cellpadding='0' cellspacing='0'>"+"<tr><td></td></tr></table>",d=c.createElement("div"),d.style.cssText=s+"width:0;height:0;position:static;top:0;margin-top:"+m+"px",u.insertBefore(d,u.firstChild),p=c.createElement("div"),d.appendChild(p),p.innerHTML="<table><tr><td style='"+t+"0;display:none'></td><td>t</td></tr></table>",k=p.getElementsByTagName("td"),o=k[0].offsetHeight===0,k[0].style.display="",k[1].style.display="none",b.reliableHiddenOffsets=o&&k[0].offsetHeight===0,a.getComputedStyle&&(p.innerHTML="",l=c.createElement("div"),l.style.width="0",l.style.marginRight="0",p.style.width="2px",p.appendChild(l),b.reliableMarginRight=(parseInt((a.getComputedStyle(l,null)||{marginRight:0}).marginRight,10)||0)===0),typeof p.style.zoom!="undefined"&&(p.innerHTML="",p.style.width=p.style.padding="1px",p.style.border=0,p.style.overflow="hidden",p.style.display="inline",p.style.zoom=1,b.inlineBlockNeedsLayout=p.offsetWidth===3,p.style.display="block",p.style.overflow="visible",p.innerHTML="<div style='width:5px;'></div>",b.shrinkWrapBlocks=p.offsetWidth!==3),p.style.cssText=r+s,p.innerHTML=q,e=p.firstChild,g=e.firstChild,i=e.nextSibling.firstChild.firstChild,j={doesNotAddBorder:g.offsetTop!==5,doesAddBorderForTableAndCells:i.offsetTop===5},g.style.position="fixed",g.style.top="20px",j.fixedPosition=g.offsetTop===20||g.offsetTop===15,g.style.position=g.style.top="",e.style.overflow="hidden",e.style.position="relative",j.subtractsBorderForOverflowNotVisible=g.offsetTop===-5,j.doesNotIncludeMarginInBodyOffset=u.offsetTop!==m,a.getComputedStyle&&(p.style.marginTop="1%",b.pixelMargin=(a.getComputedStyle(p,null)||{marginTop:0}).marginTop!=="1%"),typeof d.style.zoom!="undefined"&&(d.style.zoom=1),u.removeChild(d),l=p=d=null,f.extend(b,j))});return b}();var j=/^(?:\{.*\}|\[.*\])$/,k=/([A-Z])/g;f.extend({cache:{},uuid:0,expando:"jQuery"+(f.fn.jquery+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(a){a=a.nodeType?f.cache[a[f.expando]]:a[f.expando];return!!a&&!m(a)},data:function(a,c,d,e){if(!!f.acceptData(a)){var g,h,i,j=f.expando,k=typeof c=="string",l=a.nodeType,m=l?f.cache:a,n=l?a[j]:a[j]&&j,o=c==="events";if((!n||!m[n]||!o&&!e&&!m[n].data)&&k&&d===b)return;n||(l?a[j]=n=++f.uuid:n=j),m[n]||(m[n]={},l||(m[n].toJSON=f.noop));if(typeof c=="object"||typeof c=="function")e?m[n]=f.extend(m[n],c):m[n].data=f.extend(m[n].data,c);g=h=m[n],e||(h.data||(h.data={}),h=h.data),d!==b&&(h[f.camelCase(c)]=d);if(o&&!h[c])return g.events;k?(i=h[c],i==null&&(i=h[f.camelCase(c)])):i=h;return i}},removeData:function(a,b,c){if(!!f.acceptData(a)){var d,e,g,h=f.expando,i=a.nodeType,j=i?f.cache:a,k=i?a[h]:h;if(!j[k])return;if(b){d=c?j[k]:j[k].data;if(d){f.isArray(b)||(b in d?b=[b]:(b=f.camelCase(b),b in d?b=[b]:b=b.split(" ")));for(e=0,g=b.length;e<g;e++)delete d[b[e]];if(!(c?m:f.isEmptyObject)(d))return}}if(!c){delete j[k].data;if(!m(j[k]))return}f.support.deleteExpando||!j.setInterval?delete j[k]:j[k]=null,i&&(f.support.deleteExpando?delete a[h]:a.removeAttribute?a.removeAttribute(h):a[h]=null)}},_data:function(a,b,c){return f.data(a,b,c,!0)},acceptData:function(a){if(a.nodeName){var b=f.noData[a.nodeName.toLowerCase()];if(b)return b!==!0&&a.getAttribute("classid")===b}return!0}}),f.fn.extend({data:function(a,c){var d,e,g,h,i,j=this[0],k=0,m=null;if(a===b){if(this.length){m=f.data(j);if(j.nodeType===1&&!f._data(j,"parsedAttrs")){g=j.attributes;for(i=g.length;k<i;k++)h=g[k].name,h.indexOf("data-")===0&&(h=f.camelCase(h.substring(5)),l(j,h,m[h]));f._data(j,"parsedAttrs",!0)}}return m}if(typeof a=="object")return this.each(function(){f.data(this,a)});d=a.split(".",2),d[1]=d[1]?"."+d[1]:"",e=d[1]+"!";return f.access(this,function(c){if(c===b){m=this.triggerHandler("getData"+e,[d[0]]),m===b&&j&&(m=f.data(j,a),m=l(j,a,m));return m===b&&d[1]?this.data(d[0]):m}d[1]=c,this.each(function(){var b=f(this);b.triggerHandler("setData"+e,d),f.data(this,a,c),b.triggerHandler("changeData"+e,d)})},null,c,arguments.length>1,null,!1)},removeData:function(a){return this.each(function(){f.removeData(this,a)})}}),f.extend({_mark:function(a,b){a&&(b=(b||"fx")+"mark",f._data(a,b,(f._data(a,b)||0)+1))},_unmark:function(a,b,c){a!==!0&&(c=b,b=a,a=!1);if(b){c=c||"fx";var d=c+"mark",e=a?0:(f._data(b,d)||1)-1;e?f._data(b,d,e):(f.removeData(b,d,!0),n(b,c,"mark"))}},queue:function(a,b,c){var d;if(a){b=(b||"fx")+"queue",d=f._data(a,b),c&&(!d||f.isArray(c)?d=f._data(a,b,f.makeArray(c)):d.push(c));return d||[]}},dequeue:function(a,b){b=b||"fx";var c=f.queue(a,b),d=c.shift(),e={};d==="inprogress"&&(d=c.shift()),d&&(b==="fx"&&c.unshift("inprogress"),f._data(a,b+".run",e),d.call(a,function(){f.dequeue(a,b)},e)),c.length||(f.removeData(a,b+"queue "+b+".run",!0),n(a,b,"queue"))}}),f.fn.extend({queue:function(a,c){var d=2;typeof a!="string"&&(c=a,a="fx",d--);if(arguments.length<d)return f.queue(this[0],a);return c===b?this:this.each(function(){var b=f.queue(this,a,c);a==="fx"&&b[0]!=="inprogress"&&f.dequeue(this,a)})},dequeue:function(a){return this.each(function(){f.dequeue(this,a)})},delay:function(a,b){a=f.fx?f.fx.speeds[a]||a:a,b=b||"fx";return this.queue(b,function(b,c){var d=setTimeout(b,a);c.stop=function(){clearTimeout(d)}})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,c){function m(){--h||d.resolveWith(e,[e])}typeof a!="string"&&(c=a,a=b),a=a||"fx";var d=f.Deferred(),e=this,g=e.length,h=1,i=a+"defer",j=a+"queue",k=a+"mark",l;while(g--)if(l=f.data(e[g],i,b,!0)||(f.data(e[g],j,b,!0)||f.data(e[g],k,b,!0))&&f.data(e[g],i,f.Callbacks("once memory"),!0))h++,l.add(m);m();return d.promise(c)}});var o=/[\n\t\r]/g,p=/\s+/,q=/\r/g,r=/^(?:button|input)$/i,s=/^(?:button|input|object|select|textarea)$/i,t=/^a(?:rea)?$/i,u=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,v=f.support.getSetAttribute,w,x,y;f.fn.extend({attr:function(a,b){return f.access(this,f.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){f.removeAttr(this,a)})},prop:function(a,b){return f.access(this,f.prop,a,b,arguments.length>1)},removeProp:function(a){a=f.propFix[a]||a;return this.each(function(){try{this[a]=b,delete this[a]}catch(c){}})},addClass:function(a){var b,c,d,e,g,h,i;if(f.isFunction(a))return this.each(function(b){f(this).addClass(a.call(this,b,this.className))});if(a&&typeof a=="string"){b=a.split(p);for(c=0,d=this.length;c<d;c++){e=this[c];if(e.nodeType===1)if(!e.className&&b.length===1)e.className=a;else{g=" "+e.className+" ";for(h=0,i=b.length;h<i;h++)~g.indexOf(" "+b[h]+" ")||(g+=b[h]+" ");e.className=f.trim(g)}}}return this},removeClass:function(a){var c,d,e,g,h,i,j;if(f.isFunction(a))return this.each(function(b){f(this).removeClass(a.call(this,b,this.className))});if(a&&typeof a=="string"||a===b){c=(a||"").split(p);for(d=0,e=this.length;d<e;d++){g=this[d];if(g.nodeType===1&&g.className)if(a){h=(" "+g.className+" ").replace(o," ");for(i=0,j=c.length;i<j;i++)h=h.replace(" "+c[i]+" "," ");g.className=f.trim(h)}else g.className=""}}return this},toggleClass:function(a,b){var c=typeof a,d=typeof b=="boolean";if(f.isFunction(a))return this.each(function(c){f(this).toggleClass(a.call(this,c,this.className,b),b)});return this.each(function(){if(c==="string"){var e,g=0,h=f(this),i=b,j=a.split(p);while(e=j[g++])i=d?i:!h.hasClass(e),h[i?"addClass":"removeClass"](e)}else if(c==="undefined"||c==="boolean")this.className&&f._data(this,"__className__",this.className),this.className=this.className||a===!1?"":f._data(this,"__className__")||""})},hasClass:function(a){var b=" "+a+" ",c=0,d=this.length;for(;c<d;c++)if(this[c].nodeType===1&&(" "+this[c].className+" ").replace(o," ").indexOf(b)>-1)return!0;return!1},val:function(a){var c,d,e,g=this[0];{if(!!arguments.length){e=f.isFunction(a);return this.each(function(d){var g=f(this),h;if(this.nodeType===1){e?h=a.call(this,d,g.val()):h=a,h==null?h="":typeof h=="number"?h+="":f.isArray(h)&&(h=f.map(h,function(a){return a==null?"":a+""})),c=f.valHooks[this.type]||f.valHooks[this.nodeName.toLowerCase()];if(!c||!("set"in c)||c.set(this,h,"value")===b)this.value=h}})}if(g){c=f.valHooks[g.type]||f.valHooks[g.nodeName.toLowerCase()];if(c&&"get"in c&&(d=c.get(g,"value"))!==b)return d;d=g.value;return typeof d=="string"?d.replace(q,""):d==null?"":d}}}}),f.extend({valHooks:{option:{get:function(a){var b=a.attributes.value;return!b||b.specified?a.value:a.text}},select:{get:function(a){var b,c,d,e,g=a.selectedIndex,h=[],i=a.options,j=a.type==="select-one";if(g<0)return null;c=j?g:0,d=j?g+1:i.length;for(;c<d;c++){e=i[c];if(e.selected&&(f.support.optDisabled?!e.disabled:e.getAttribute("disabled")===null)&&(!e.parentNode.disabled||!f.nodeName(e.parentNode,"optgroup"))){b=f(e).val();if(j)return b;h.push(b)}}if(j&&!h.length&&i.length)return f(i[g]).val();return h},set:function(a,b){var c=f.makeArray(b);f(a).find("option").each(function(){this.selected=f.inArray(f(this).val(),c)>=0}),c.length||(a.selectedIndex=-1);return c}}},attrFn:{val:!0,css:!0,html:!0,text:!0,data:!0,width:!0,height:!0,offset:!0},attr:function(a,c,d,e){var g,h,i,j=a.nodeType;if(!!a&&j!==3&&j!==8&&j!==2){if(e&&c in f.attrFn)return f(a)[c](d);if(typeof a.getAttribute=="undefined")return f.prop(a,c,d);i=j!==1||!f.isXMLDoc(a),i&&(c=c.toLowerCase(),h=f.attrHooks[c]||(u.test(c)?x:w));if(d!==b){if(d===null){f.removeAttr(a,c);return}if(h&&"set"in h&&i&&(g=h.set(a,d,c))!==b)return g;a.setAttribute(c,""+d);return d}if(h&&"get"in h&&i&&(g=h.get(a,c))!==null)return g;g=a.getAttribute(c);return g===null?b:g}},removeAttr:function(a,b){var c,d,e,g,h,i=0;if(b&&a.nodeType===1){d=b.toLowerCase().split(p),g=d.length;for(;i<g;i++)e=d[i],e&&(c=f.propFix[e]||e,h=u.test(e),h||f.attr(a,e,""),a.removeAttribute(v?e:c),h&&c in a&&(a[c]=!1))}},attrHooks:{type:{set:function(a,b){if(r.test(a.nodeName)&&a.parentNode)f.error("type property can't be changed");else if(!f.support.radioValue&&b==="radio"&&f.nodeName(a,"input")){var c=a.value;a.setAttribute("type",b),c&&(a.value=c);return b}}},value:{get:function(a,b){if(w&&f.nodeName(a,"button"))return w.get(a,b);return b in a?a.value:null},set:function(a,b,c){if(w&&f.nodeName(a,"button"))return w.set(a,b,c);a.value=b}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(a,c,d){var e,g,h,i=a.nodeType;if(!!a&&i!==3&&i!==8&&i!==2){h=i!==1||!f.isXMLDoc(a),h&&(c=f.propFix[c]||c,g=f.propHooks[c]);return d!==b?g&&"set"in g&&(e=g.set(a,d,c))!==b?e:a[c]=d:g&&"get"in g&&(e=g.get(a,c))!==null?e:a[c]}},propHooks:{tabIndex:{get:function(a){var c=a.getAttributeNode("tabindex");return c&&c.specified?parseInt(c.value,10):s.test(a.nodeName)||t.test(a.nodeName)&&a.href?0:b}}}}),f.attrHooks.tabindex=f.propHooks.tabIndex,x={get:function(a,c){var d,e=f.prop(a,c);return e===!0||typeof e!="boolean"&&(d=a.getAttributeNode(c))&&d.nodeValue!==!1?c.toLowerCase():b},set:function(a,b,c){var d;b===!1?f.removeAttr(a,c):(d=f.propFix[c]||c,d in a&&(a[d]=!0),a.setAttribute(c,c.toLowerCase()));return c}},v||(y={name:!0,id:!0,coords:!0},w=f.valHooks.button={get:function(a,c){var d;d=a.getAttributeNode(c);return d&&(y[c]?d.nodeValue!=="":d.specified)?d.nodeValue:b},set:function(a,b,d){var e=a.getAttributeNode(d);e||(e=c.createAttribute(d),a.setAttributeNode(e));return e.nodeValue=b+""}},f.attrHooks.tabindex.set=w.set,f.each(["width","height"],function(a,b){f.attrHooks[b]=f.extend(f.attrHooks[b],{set:function(a,c){if(c===""){a.setAttribute(b,"auto");return c}}})}),f.attrHooks.contenteditable={get:w.get,set:function(a,b,c){b===""&&(b="false"),w.set(a,b,c)}}),f.support.hrefNormalized||f.each(["href","src","width","height"],function(a,c){f.attrHooks[c]=f.extend(f.attrHooks[c],{get:function(a){var d=a.getAttribute(c,2);return d===null?b:d}})}),f.support.style||(f.attrHooks.style={get:function(a){return a.style.cssText.toLowerCase()||b},set:function(a,b){return a.style.cssText=""+b}}),f.support.optSelected||(f.propHooks.selected=f.extend(f.propHooks.selected,{get:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex);return null}})),f.support.enctype||(f.propFix.enctype="encoding"),f.support.checkOn||f.each(["radio","checkbox"],function(){f.valHooks[this]={get:function(a){return a.getAttribute("value")===null?"on":a.value}}}),f.each(["radio","checkbox"],function(){f.valHooks[this]=f.extend(f.valHooks[this],{set:function(a,b){if(f.isArray(b))return a.checked=f.inArray(f(a).val(),b)>=0}})});var z=/^(?:textarea|input|select)$/i,A=/^([^\.]*)?(?:\.(.+))?$/,B=/(?:^|\s)hover(\.\S+)?\b/,C=/^key/,D=/^(?:mouse|contextmenu)|click/,E=/^(?:focusinfocus|focusoutblur)$/,F=/^(\w*)(?:#([\w\-]+))?(?:\.([\w\-]+))?$/,G=function(
a){var b=F.exec(a);b&&(b[1]=(b[1]||"").toLowerCase(),b[3]=b[3]&&new RegExp("(?:^|\\s)"+b[3]+"(?:\\s|$)"));return b},H=function(a,b){var c=a.attributes||{};return(!b[1]||a.nodeName.toLowerCase()===b[1])&&(!b[2]||(c.id||{}).value===b[2])&&(!b[3]||b[3].test((c["class"]||{}).value))},I=function(a){return f.event.special.hover?a:a.replace(B,"mouseenter$1 mouseleave$1")};f.event={add:function(a,c,d,e,g){var h,i,j,k,l,m,n,o,p,q,r,s;if(!(a.nodeType===3||a.nodeType===8||!c||!d||!(h=f._data(a)))){d.handler&&(p=d,d=p.handler,g=p.selector),d.guid||(d.guid=f.guid++),j=h.events,j||(h.events=j={}),i=h.handle,i||(h.handle=i=function(a){return typeof f!="undefined"&&(!a||f.event.triggered!==a.type)?f.event.dispatch.apply(i.elem,arguments):b},i.elem=a),c=f.trim(I(c)).split(" ");for(k=0;k<c.length;k++){l=A.exec(c[k])||[],m=l[1],n=(l[2]||"").split(".").sort(),s=f.event.special[m]||{},m=(g?s.delegateType:s.bindType)||m,s=f.event.special[m]||{},o=f.extend({type:m,origType:l[1],data:e,handler:d,guid:d.guid,selector:g,quick:g&&G(g),namespace:n.join(".")},p),r=j[m];if(!r){r=j[m]=[],r.delegateCount=0;if(!s.setup||s.setup.call(a,e,n,i)===!1)a.addEventListener?a.addEventListener(m,i,!1):a.attachEvent&&a.attachEvent("on"+m,i)}s.add&&(s.add.call(a,o),o.handler.guid||(o.handler.guid=d.guid)),g?r.splice(r.delegateCount++,0,o):r.push(o),f.event.global[m]=!0}a=null}},global:{},remove:function(a,b,c,d,e){var g=f.hasData(a)&&f._data(a),h,i,j,k,l,m,n,o,p,q,r,s;if(!!g&&!!(o=g.events)){b=f.trim(I(b||"")).split(" ");for(h=0;h<b.length;h++){i=A.exec(b[h])||[],j=k=i[1],l=i[2];if(!j){for(j in o)f.event.remove(a,j+b[h],c,d,!0);continue}p=f.event.special[j]||{},j=(d?p.delegateType:p.bindType)||j,r=o[j]||[],m=r.length,l=l?new RegExp("(^|\\.)"+l.split(".").sort().join("\\.(?:.*\\.)?")+"(\\.|$)"):null;for(n=0;n<r.length;n++)s=r[n],(e||k===s.origType)&&(!c||c.guid===s.guid)&&(!l||l.test(s.namespace))&&(!d||d===s.selector||d==="**"&&s.selector)&&(r.splice(n--,1),s.selector&&r.delegateCount--,p.remove&&p.remove.call(a,s));r.length===0&&m!==r.length&&((!p.teardown||p.teardown.call(a,l)===!1)&&f.removeEvent(a,j,g.handle),delete o[j])}f.isEmptyObject(o)&&(q=g.handle,q&&(q.elem=null),f.removeData(a,["events","handle"],!0))}},customEvent:{getData:!0,setData:!0,changeData:!0},trigger:function(c,d,e,g){if(!e||e.nodeType!==3&&e.nodeType!==8){var h=c.type||c,i=[],j,k,l,m,n,o,p,q,r,s;if(E.test(h+f.event.triggered))return;h.indexOf("!")>=0&&(h=h.slice(0,-1),k=!0),h.indexOf(".")>=0&&(i=h.split("."),h=i.shift(),i.sort());if((!e||f.event.customEvent[h])&&!f.event.global[h])return;c=typeof c=="object"?c[f.expando]?c:new f.Event(h,c):new f.Event(h),c.type=h,c.isTrigger=!0,c.exclusive=k,c.namespace=i.join("."),c.namespace_re=c.namespace?new RegExp("(^|\\.)"+i.join("\\.(?:.*\\.)?")+"(\\.|$)"):null,o=h.indexOf(":")<0?"on"+h:"";if(!e){j=f.cache;for(l in j)j[l].events&&j[l].events[h]&&f.event.trigger(c,d,j[l].handle.elem,!0);return}c.result=b,c.target||(c.target=e),d=d!=null?f.makeArray(d):[],d.unshift(c),p=f.event.special[h]||{};if(p.trigger&&p.trigger.apply(e,d)===!1)return;r=[[e,p.bindType||h]];if(!g&&!p.noBubble&&!f.isWindow(e)){s=p.delegateType||h,m=E.test(s+h)?e:e.parentNode,n=null;for(;m;m=m.parentNode)r.push([m,s]),n=m;n&&n===e.ownerDocument&&r.push([n.defaultView||n.parentWindow||a,s])}for(l=0;l<r.length&&!c.isPropagationStopped();l++)m=r[l][0],c.type=r[l][1],q=(f._data(m,"events")||{})[c.type]&&f._data(m,"handle"),q&&q.apply(m,d),q=o&&m[o],q&&f.acceptData(m)&&q.apply(m,d)===!1&&c.preventDefault();c.type=h,!g&&!c.isDefaultPrevented()&&(!p._default||p._default.apply(e.ownerDocument,d)===!1)&&(h!=="click"||!f.nodeName(e,"a"))&&f.acceptData(e)&&o&&e[h]&&(h!=="focus"&&h!=="blur"||c.target.offsetWidth!==0)&&!f.isWindow(e)&&(n=e[o],n&&(e[o]=null),f.event.triggered=h,e[h](),f.event.triggered=b,n&&(e[o]=n));return c.result}},dispatch:function(c){c=f.event.fix(c||a.event);var d=(f._data(this,"events")||{})[c.type]||[],e=d.delegateCount,g=[].slice.call(arguments,0),h=!c.exclusive&&!c.namespace,i=f.event.special[c.type]||{},j=[],k,l,m,n,o,p,q,r,s,t,u;g[0]=c,c.delegateTarget=this;if(!i.preDispatch||i.preDispatch.call(this,c)!==!1){if(e&&(!c.button||c.type!=="click")){n=f(this),n.context=this.ownerDocument||this;for(m=c.target;m!=this;m=m.parentNode||this)if(m.disabled!==!0){p={},r=[],n[0]=m;for(k=0;k<e;k++)s=d[k],t=s.selector,p[t]===b&&(p[t]=s.quick?H(m,s.quick):n.is(t)),p[t]&&r.push(s);r.length&&j.push({elem:m,matches:r})}}d.length>e&&j.push({elem:this,matches:d.slice(e)});for(k=0;k<j.length&&!c.isPropagationStopped();k++){q=j[k],c.currentTarget=q.elem;for(l=0;l<q.matches.length&&!c.isImmediatePropagationStopped();l++){s=q.matches[l];if(h||!c.namespace&&!s.namespace||c.namespace_re&&c.namespace_re.test(s.namespace))c.data=s.data,c.handleObj=s,o=((f.event.special[s.origType]||{}).handle||s.handler).apply(q.elem,g),o!==b&&(c.result=o,o===!1&&(c.preventDefault(),c.stopPropagation()))}}i.postDispatch&&i.postDispatch.call(this,c);return c.result}},props:"attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(a,b){a.which==null&&(a.which=b.charCode!=null?b.charCode:b.keyCode);return a}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(a,d){var e,f,g,h=d.button,i=d.fromElement;a.pageX==null&&d.clientX!=null&&(e=a.target.ownerDocument||c,f=e.documentElement,g=e.body,a.pageX=d.clientX+(f&&f.scrollLeft||g&&g.scrollLeft||0)-(f&&f.clientLeft||g&&g.clientLeft||0),a.pageY=d.clientY+(f&&f.scrollTop||g&&g.scrollTop||0)-(f&&f.clientTop||g&&g.clientTop||0)),!a.relatedTarget&&i&&(a.relatedTarget=i===a.target?d.toElement:i),!a.which&&h!==b&&(a.which=h&1?1:h&2?3:h&4?2:0);return a}},fix:function(a){if(a[f.expando])return a;var d,e,g=a,h=f.event.fixHooks[a.type]||{},i=h.props?this.props.concat(h.props):this.props;a=f.Event(g);for(d=i.length;d;)e=i[--d],a[e]=g[e];a.target||(a.target=g.srcElement||c),a.target.nodeType===3&&(a.target=a.target.parentNode),a.metaKey===b&&(a.metaKey=a.ctrlKey);return h.filter?h.filter(a,g):a},special:{ready:{setup:f.bindReady},load:{noBubble:!0},focus:{delegateType:"focusin"},blur:{delegateType:"focusout"},beforeunload:{setup:function(a,b,c){f.isWindow(this)&&(this.onbeforeunload=c)},teardown:function(a,b){this.onbeforeunload===b&&(this.onbeforeunload=null)}}},simulate:function(a,b,c,d){var e=f.extend(new f.Event,c,{type:a,isSimulated:!0,originalEvent:{}});d?f.event.trigger(e,null,b):f.event.dispatch.call(b,e),e.isDefaultPrevented()&&c.preventDefault()}},f.event.handle=f.event.dispatch,f.removeEvent=c.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){a.detachEvent&&a.detachEvent("on"+b,c)},f.Event=function(a,b){if(!(this instanceof f.Event))return new f.Event(a,b);a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||a.returnValue===!1||a.getPreventDefault&&a.getPreventDefault()?K:J):this.type=a,b&&f.extend(this,b),this.timeStamp=a&&a.timeStamp||f.now(),this[f.expando]=!0},f.Event.prototype={preventDefault:function(){this.isDefaultPrevented=K;var a=this.originalEvent;!a||(a.preventDefault?a.preventDefault():a.returnValue=!1)},stopPropagation:function(){this.isPropagationStopped=K;var a=this.originalEvent;!a||(a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=K,this.stopPropagation()},isDefaultPrevented:J,isPropagationStopped:J,isImmediatePropagationStopped:J},f.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(a,b){f.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c=this,d=a.relatedTarget,e=a.handleObj,g=e.selector,h;if(!d||d!==c&&!f.contains(c,d))a.type=e.origType,h=e.handler.apply(this,arguments),a.type=b;return h}}}),f.support.submitBubbles||(f.event.special.submit={setup:function(){if(f.nodeName(this,"form"))return!1;f.event.add(this,"click._submit keypress._submit",function(a){var c=a.target,d=f.nodeName(c,"input")||f.nodeName(c,"button")?c.form:b;d&&!d._submit_attached&&(f.event.add(d,"submit._submit",function(a){a._submit_bubble=!0}),d._submit_attached=!0)})},postDispatch:function(a){a._submit_bubble&&(delete a._submit_bubble,this.parentNode&&!a.isTrigger&&f.event.simulate("submit",this.parentNode,a,!0))},teardown:function(){if(f.nodeName(this,"form"))return!1;f.event.remove(this,"._submit")}}),f.support.changeBubbles||(f.event.special.change={setup:function(){if(z.test(this.nodeName)){if(this.type==="checkbox"||this.type==="radio")f.event.add(this,"propertychange._change",function(a){a.originalEvent.propertyName==="checked"&&(this._just_changed=!0)}),f.event.add(this,"click._change",function(a){this._just_changed&&!a.isTrigger&&(this._just_changed=!1,f.event.simulate("change",this,a,!0))});return!1}f.event.add(this,"beforeactivate._change",function(a){var b=a.target;z.test(b.nodeName)&&!b._change_attached&&(f.event.add(b,"change._change",function(a){this.parentNode&&!a.isSimulated&&!a.isTrigger&&f.event.simulate("change",this.parentNode,a,!0)}),b._change_attached=!0)})},handle:function(a){var b=a.target;if(this!==b||a.isSimulated||a.isTrigger||b.type!=="radio"&&b.type!=="checkbox")return a.handleObj.handler.apply(this,arguments)},teardown:function(){f.event.remove(this,"._change");return z.test(this.nodeName)}}),f.support.focusinBubbles||f.each({focus:"focusin",blur:"focusout"},function(a,b){var d=0,e=function(a){f.event.simulate(b,a.target,f.event.fix(a),!0)};f.event.special[b]={setup:function(){d++===0&&c.addEventListener(a,e,!0)},teardown:function(){--d===0&&c.removeEventListener(a,e,!0)}}}),f.fn.extend({on:function(a,c,d,e,g){var h,i;if(typeof a=="object"){typeof c!="string"&&(d=d||c,c=b);for(i in a)this.on(i,c,d,a[i],g);return this}d==null&&e==null?(e=c,d=c=b):e==null&&(typeof c=="string"?(e=d,d=b):(e=d,d=c,c=b));if(e===!1)e=J;else if(!e)return this;g===1&&(h=e,e=function(a){f().off(a);return h.apply(this,arguments)},e.guid=h.guid||(h.guid=f.guid++));return this.each(function(){f.event.add(this,a,e,d,c)})},one:function(a,b,c,d){return this.on(a,b,c,d,1)},off:function(a,c,d){if(a&&a.preventDefault&&a.handleObj){var e=a.handleObj;f(a.delegateTarget).off(e.namespace?e.origType+"."+e.namespace:e.origType,e.selector,e.handler);return this}if(typeof a=="object"){for(var g in a)this.off(g,c,a[g]);return this}if(c===!1||typeof c=="function")d=c,c=b;d===!1&&(d=J);return this.each(function(){f.event.remove(this,a,d,c)})},bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},live:function(a,b,c){f(this.context).on(a,this.selector,b,c);return this},die:function(a,b){f(this.context).off(a,this.selector||"**",b);return this},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return arguments.length==1?this.off(a,"**"):this.off(b,a,c)},trigger:function(a,b){return this.each(function(){f.event.trigger(a,b,this)})},triggerHandler:function(a,b){if(this[0])return f.event.trigger(a,b,this[0],!0)},toggle:function(a){var b=arguments,c=a.guid||f.guid++,d=0,e=function(c){var e=(f._data(this,"lastToggle"+a.guid)||0)%d;f._data(this,"lastToggle"+a.guid,e+1),c.preventDefault();return b[e].apply(this,arguments)||!1};e.guid=c;while(d<b.length)b[d++].guid=c;return this.click(e)},hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}}),f.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(a,b){f.fn[b]=function(a,c){c==null&&(c=a,a=null);return arguments.length>0?this.on(b,null,a,c):this.trigger(b)},f.attrFn&&(f.attrFn[b]=!0),C.test(b)&&(f.event.fixHooks[b]=f.event.keyHooks),D.test(b)&&(f.event.fixHooks[b]=f.event.mouseHooks)}),function(){function x(a,b,c,e,f,g){for(var h=0,i=e.length;h<i;h++){var j=e[h];if(j){var k=!1;j=j[a];while(j){if(j[d]===c){k=e[j.sizset];break}if(j.nodeType===1){g||(j[d]=c,j.sizset=h);if(typeof b!="string"){if(j===b){k=!0;break}}else if(m.filter(b,[j]).length>0){k=j;break}}j=j[a]}e[h]=k}}}function w(a,b,c,e,f,g){for(var h=0,i=e.length;h<i;h++){var j=e[h];if(j){var k=!1;j=j[a];while(j){if(j[d]===c){k=e[j.sizset];break}j.nodeType===1&&!g&&(j[d]=c,j.sizset=h);if(j.nodeName.toLowerCase()===b){k=j;break}j=j[a]}e[h]=k}}}var a=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,d="sizcache"+(Math.random()+"").replace(".",""),e=0,g=Object.prototype.toString,h=!1,i=!0,j=/\\/g,k=/\r\n/g,l=/\W/;[0,0].sort(function(){i=!1;return 0});var m=function(b,d,e,f){e=e||[],d=d||c;var h=d;if(d.nodeType!==1&&d.nodeType!==9)return[];if(!b||typeof b!="string")return e;var i,j,k,l,n,q,r,t,u=!0,v=m.isXML(d),w=[],x=b;do{a.exec(""),i=a.exec(x);if(i){x=i[3],w.push(i[1]);if(i[2]){l=i[3];break}}}while(i);if(w.length>1&&p.exec(b))if(w.length===2&&o.relative[w[0]])j=y(w[0]+w[1],d,f);else{j=o.relative[w[0]]?[d]:m(w.shift(),d);while(w.length)b=w.shift(),o.relative[b]&&(b+=w.shift()),j=y(b,j,f)}else{!f&&w.length>1&&d.nodeType===9&&!v&&o.match.ID.test(w[0])&&!o.match.ID.test(w[w.length-1])&&(n=m.find(w.shift(),d,v),d=n.expr?m.filter(n.expr,n.set)[0]:n.set[0]);if(d){n=f?{expr:w.pop(),set:s(f)}:m.find(w.pop(),w.length===1&&(w[0]==="~"||w[0]==="+")&&d.parentNode?d.parentNode:d,v),j=n.expr?m.filter(n.expr,n.set):n.set,w.length>0?k=s(j):u=!1;while(w.length)q=w.pop(),r=q,o.relative[q]?r=w.pop():q="",r==null&&(r=d),o.relative[q](k,r,v)}else k=w=[]}k||(k=j),k||m.error(q||b);if(g.call(k)==="[object Array]")if(!u)e.push.apply(e,k);else if(d&&d.nodeType===1)for(t=0;k[t]!=null;t++)k[t]&&(k[t]===!0||k[t].nodeType===1&&m.contains(d,k[t]))&&e.push(j[t]);else for(t=0;k[t]!=null;t++)k[t]&&k[t].nodeType===1&&e.push(j[t]);else s(k,e);l&&(m(l,h,e,f),m.uniqueSort(e));return e};m.uniqueSort=function(a){if(u){h=i,a.sort(u);if(h)for(var b=1;b<a.length;b++)a[b]===a[b-1]&&a.splice(b--,1)}return a},m.matches=function(a,b){return m(a,null,null,b)},m.matchesSelector=function(a,b){return m(b,null,null,[a]).length>0},m.find=function(a,b,c){var d,e,f,g,h,i;if(!a)return[];for(e=0,f=o.order.length;e<f;e++){h=o.order[e];if(g=o.leftMatch[h].exec(a)){i=g[1],g.splice(1,1);if(i.substr(i.length-1)!=="\\"){g[1]=(g[1]||"").replace(j,""),d=o.find[h](g,b,c);if(d!=null){a=a.replace(o.match[h],"");break}}}}d||(d=typeof b.getElementsByTagName!="undefined"?b.getElementsByTagName("*"):[]);return{set:d,expr:a}},m.filter=function(a,c,d,e){var f,g,h,i,j,k,l,n,p,q=a,r=[],s=c,t=c&&c[0]&&m.isXML(c[0]);while(a&&c.length){for(h in o.filter)if((f=o.leftMatch[h].exec(a))!=null&&f[2]){k=o.filter[h],l=f[1],g=!1,f.splice(1,1);if(l.substr(l.length-1)==="\\")continue;s===r&&(r=[]);if(o.preFilter[h]){f=o.preFilter[h](f,s,d,r,e,t);if(!f)g=i=!0;else if(f===!0)continue}if(f)for(n=0;(j=s[n])!=null;n++)j&&(i=k(j,f,n,s),p=e^i,d&&i!=null?p?g=!0:s[n]=!1:p&&(r.push(j),g=!0));if(i!==b){d||(s=r),a=a.replace(o.match[h],"");if(!g)return[];break}}if(a===q)if(g==null)m.error(a);else break;q=a}return s},m.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)};var n=m.getText=function(a){var b,c,d=a.nodeType,e="";if(d){if(d===1||d===9||d===11){if(typeof a.textContent=="string")return a.textContent;if(typeof a.innerText=="string")return a.innerText.replace(k,"");for(a=a.firstChild;a;a=a.nextSibling)e+=n(a)}else if(d===3||d===4)return a.nodeValue}else for(b=0;c=a[b];b++)c.nodeType!==8&&(e+=n(c));return e},o=m.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/},leftMatch:{},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(a){return a.getAttribute("href")},type:function(a){return a.getAttribute("type")}},relative:{"+":function(a,b){var c=typeof b=="string",d=c&&!l.test(b),e=c&&!d;d&&(b=b.toLowerCase());for(var f=0,g=a.length,h;f<g;f++)if(h=a[f]){while((h=h.previousSibling)&&h.nodeType!==1);a[f]=e||h&&h.nodeName.toLowerCase()===b?h||!1:h===b}e&&m.filter(b,a,!0)},">":function(a,b){var c,d=typeof b=="string",e=0,f=a.length;if(d&&!l.test(b)){b=b.toLowerCase();for(;e<f;e++){c=a[e];if(c){var g=c.parentNode;a[e]=g.nodeName.toLowerCase()===b?g:!1}}}else{for(;e<f;e++)c=a[e],c&&(a[e]=d?c.parentNode:c.parentNode===b);d&&m.filter(b,a,!0)}},"":function(a,b,c){var d,f=e++,g=x;typeof b=="string"&&!l.test(b)&&(b=b.toLowerCase(),d=b,g=w),g("parentNode",b,f,a,d,c)},"~":function(a,b,c){var d,f=e++,g=x;typeof b=="string"&&!l.test(b)&&(b=b.toLowerCase(),d=b,g=w),g("previousSibling",b,f,a,d,c)}},find:{ID:function(a,b,c){if(typeof b.getElementById!="undefined"&&!c){var d=b.getElementById(a[1]);return d&&d.parentNode?[d]:[]}},NAME:function(a,b){if(typeof b.getElementsByName!="undefined"){var c=[],d=b.getElementsByName(a[1]);for(var e=0,f=d.length;e<f;e++)d[e].getAttribute("name")===a[1]&&c.push(d[e]);return c.length===0?null:c}},TAG:function(a,b){if(typeof b.getElementsByTagName!="undefined")return b.getElementsByTagName(a[1])}},preFilter:{CLASS:function(a,b,c,d,e,f){a=" "+a[1].replace(j,"")+" ";if(f)return a;for(var g=0,h;(h=b[g])!=null;g++)h&&(e^(h.className&&(" "+h.className+" ").replace(/[\t\n\r]/g," ").indexOf(a)>=0)?c||d.push(h):c&&(b[g]=!1));return!1},ID:function(a){return a[1].replace(j,"")},TAG:function(a,b){return a[1].replace(j,"").toLowerCase()},CHILD:function(a){if(a[1]==="nth"){a[2]||m.error(a[0]),a[2]=a[2].replace(/^\+|\s*/g,"");var b=/(-?)(\d*)(?:n([+\-]?\d*))?/.exec(a[2]==="even"&&"2n"||a[2]==="odd"&&"2n+1"||!/\D/.test(a[2])&&"0n+"+a[2]||a[2]);a[2]=b[1]+(b[2]||1)-0,a[3]=b[3]-0}else a[2]&&m.error(a[0]);a[0]=e++;return a},ATTR:function(a,b,c,d,e,f){var g=a[1]=a[1].replace(j,"");!f&&o.attrMap[g]&&(a[1]=o.attrMap[g]),a[4]=(a[4]||a[5]||"").replace(j,""),a[2]==="~="&&(a[4]=" "+a[4]+" ");return a},PSEUDO:function(b,c,d,e,f){if(b[1]==="not")if((a.exec(b[3])||"").length>1||/^\w/.test(b[3]))b[3]=m(b[3],null,null,c);else{var g=m.filter(b[3],c,d,!0^f);d||e.push.apply(e,g);return!1}else if(o.match.POS.test(b[0])||o.match.CHILD.test(b[0]))return!0;return b},POS:function(a){a.unshift(!0);return a}},filters:{enabled:function(a){return a.disabled===!1&&a.type!=="hidden"},disabled:function(a){return a.disabled===!0},checked:function(a){return a.checked===!0},selected:function(a){a.parentNode&&a.parentNode.selectedIndex;return a.selected===!0},parent:function(a){return!!a.firstChild},empty:function(a){return!a.firstChild},has:function(a,b,c){return!!m(c[3],a).length},header:function(a){return/h\d/i.test(a.nodeName)},text:function(a){var b=a.getAttribute("type"),c=a.type;return a.nodeName.toLowerCase()==="input"&&"text"===c&&(b===c||b===null)},radio:function(a){return a.nodeName.toLowerCase()==="input"&&"radio"===a.type},checkbox:function(a){return a.nodeName.toLowerCase()==="input"&&"checkbox"===a.type},file:function(a){return a.nodeName.toLowerCase()==="input"&&"file"===a.type},password:function(a){return a.nodeName.toLowerCase()==="input"&&"password"===a.type},submit:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"submit"===a.type},image:function(a){return a.nodeName.toLowerCase()==="input"&&"image"===a.type},reset:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"reset"===a.type},button:function(a){var b=a.nodeName.toLowerCase();return b==="input"&&"button"===a.type||b==="button"},input:function(a){return/input|select|textarea|button/i.test(a.nodeName)},focus:function(a){return a===a.ownerDocument.activeElement}},setFilters:{first:function(a,b){return b===0},last:function(a,b,c,d){return b===d.length-1},even:function(a,b){return b%2===0},odd:function(a,b){return b%2===1},lt:function(a,b,c){return b<c[3]-0},gt:function(a,b,c){return b>c[3]-0},nth:function(a,b,c){return c[3]-0===b},eq:function(a,b,c){return c[3]-0===b}},filter:{PSEUDO:function(a,b,c,d){var e=b[1],f=o.filters[e];if(f)return f(a,c,b,d);if(e==="contains")return(a.textContent||a.innerText||n([a])||"").indexOf(b[3])>=0;if(e==="not"){var g=b[3];for(var h=0,i=g.length;h<i;h++)if(g[h]===a)return!1;return!0}m.error(e)},CHILD:function(a,b){var c,e,f,g,h,i,j,k=b[1],l=a;switch(k){case"only":case"first":while(l=l.previousSibling)if(l.nodeType===1)return!1;if(k==="first")return!0;l=a;case"last":while(l=l.nextSibling)if(l.nodeType===1)return!1;return!0;case"nth":c=b[2],e=b[3];if(c===1&&e===0)return!0;f=b[0],g=a.parentNode;if(g&&(g[d]!==f||!a.nodeIndex)){i=0;for(l=g.firstChild;l;l=l.nextSibling)l.nodeType===1&&(l.nodeIndex=++i);g[d]=f}j=a.nodeIndex-e;return c===0?j===0:j%c===0&&j/c>=0}},ID:function(a,b){return a.nodeType===1&&a.getAttribute("id")===b},TAG:function(a,b){return b==="*"&&a.nodeType===1||!!a.nodeName&&a.nodeName.toLowerCase()===b},CLASS:function(a,b){return(" "+(a.className||a.getAttribute("class"))+" ").indexOf(b)>-1},ATTR:function(a,b){var c=b[1],d=m.attr?m.attr(a,c):o.attrHandle[c]?o.attrHandle[c](a):a[c]!=null?a[c]:a.getAttribute(c),e=d+"",f=b[2],g=b[4];return d==null?f==="!=":!f&&m.attr?d!=null:f==="="?e===g:f==="*="?e.indexOf(g)>=0:f==="~="?(" "+e+" ").indexOf(g)>=0:g?f==="!="?e!==g:f==="^="?e.indexOf(g)===0:f==="$="?e.substr(e.length-g.length)===g:f==="|="?e===g||e.substr(0,g.length+1)===g+"-":!1:e&&d!==!1},POS:function(a,b,c,d){var e=b[2],f=o.setFilters[e];if(f)return f(a,c,b,d)}}},p=o.match.POS,q=function(a,b){return"\\"+(b-0+1)};for(var r in o.match)o.match[r]=new RegExp(o.match[r].source+/(?![^\[]*\])(?![^\(]*\))/.source),o.leftMatch[r]=new RegExp(/(^(?:.|\r|\n)*?)/.source+o.match[r].source.replace(/\\(\d+)/g,q));o.match.globalPOS=p;var s=function(a,b){a=Array.prototype.slice.call(a,0);if(b){b.push.apply(b,a);return b}return a};try{Array.prototype.slice.call(c.documentElement.childNodes,0)[0].nodeType}catch(t){s=function(a,b){var c=0,d=b||[];if(g.call(a)==="[object Array]")Array.prototype.push.apply(d,a);else if(typeof a.length=="number")for(var e=a.length;c<e;c++)d.push(a[c]);else for(;a[c];c++)d.push(a[c]);return d}}var u,v;c.documentElement.compareDocumentPosition?u=function(a,b){if(a===b){h=!0;return 0}if(!a.compareDocumentPosition||!b.compareDocumentPosition)return a.compareDocumentPosition?-1:1;return a.compareDocumentPosition(b)&4?-1:1}:(u=function(a,b){if(a===b){h=!0;return 0}if(a.sourceIndex&&b.sourceIndex)return a.sourceIndex-b.sourceIndex;var c,d,e=[],f=[],g=a.parentNode,i=b.parentNode,j=g;if(g===i)return v(a,b);if(!g)return-1;if(!i)return 1;while(j)e.unshift(j),j=j.parentNode;j=i;while(j)f.unshift(j),j=j.parentNode;c=e.length,d=f.length;for(var k=0;k<c&&k<d;k++)if(e[k]!==f[k])return v(e[k],f[k]);return k===c?v(a,f[k],-1):v(e[k],b,1)},v=function(a,b,c){if(a===b)return c;var d=a.nextSibling;while(d){if(d===b)return-1;d=d.nextSibling}return 1}),function(){var a=c.createElement("div"),d="script"+(new Date).getTime(),e=c.documentElement;a.innerHTML="<a name='"+d+"'/>",e.insertBefore(a,e.firstChild),c.getElementById(d)&&(o.find.ID=function(a,c,d){if(typeof c.getElementById!="undefined"&&!d){var e=c.getElementById(a[1]);return e?e.id===a[1]||typeof e.getAttributeNode!="undefined"&&e.getAttributeNode("id").nodeValue===a[1]?[e]:b:[]}},o.filter.ID=function(a,b){var c=typeof a.getAttributeNode!="undefined"&&a.getAttributeNode("id");return a.nodeType===1&&c&&c.nodeValue===b}),e.removeChild(a),e=a=null}(),function(){var a=c.createElement("div");a.appendChild(c.createComment("")),a.getElementsByTagName("*").length>0&&(o.find.TAG=function(a,b){var c=b.getElementsByTagName(a[1]);if(a[1]==="*"){var d=[];for(var e=0;c[e];e++)c[e].nodeType===1&&d.push(c[e]);c=d}return c}),a.innerHTML="<a href='#'></a>",a.firstChild&&typeof a.firstChild.getAttribute!="undefined"&&a.firstChild.getAttribute("href")!=="#"&&(o.attrHandle.href=function(a){return a.getAttribute("href",2)}),a=null}(),c.querySelectorAll&&function(){var a=m,b=c.createElement("div"),d="__sizzle__";b.innerHTML="<p class='TEST'></p>";if(!b.querySelectorAll||b.querySelectorAll(".TEST").length!==0){m=function(b,e,f,g){e=e||c;if(!g&&!m.isXML(e)){var h=/^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(b);if(h&&(e.nodeType===1||e.nodeType===9)){if(h[1])return s(e.getElementsByTagName(b),f);if(h[2]&&o.find.CLASS&&e.getElementsByClassName)return s(e.getElementsByClassName(h[2]),f)}if(e.nodeType===9){if(b==="body"&&e.body)return s([e.body],f);if(h&&h[3]){var i=e.getElementById(h[3]);if(!i||!i.parentNode)return s([],f);if(i.id===h[3])return s([i],f)}try{return s(e.querySelectorAll(b),f)}catch(j){}}else if(e.nodeType===1&&e.nodeName.toLowerCase()!=="object"){var k=e,l=e.getAttribute("id"),n=l||d,p=e.parentNode,q=/^\s*[+~]/.test(b);l?n=n.replace(/'/g,"\\$&"):e.setAttribute("id",n),q&&p&&(e=e.parentNode);try{if(!q||p)return s(e.querySelectorAll("[id='"+n+"'] "+b),f)}catch(r){}finally{l||k.removeAttribute("id")}}}return a(b,e,f,g)};for(var e in a)m[e]=a[e];b=null}}(),function(){var a=c.documentElement,b=a.matchesSelector||a.mozMatchesSelector||a.webkitMatchesSelector||a.msMatchesSelector;if(b){var d=!b.call(c.createElement("div"),"div"),e=!1;try{b.call(c.documentElement,"[test!='']:sizzle")}catch(f){e=!0}m.matchesSelector=function(a,c){c=c.replace(/\=\s*([^'"\]]*)\s*\]/g,"='$1']");if(!m.isXML(a))try{if(e||!o.match.PSEUDO.test(c)&&!/!=/.test(c)){var f=b.call(a,c);if(f||!d||a.document&&a.document.nodeType!==11)return f}}catch(g){}return m(c,null,null,[a]).length>0}}}(),function(){var a=c.createElement("div");a.innerHTML="<div class='test e'></div><div class='test'></div>";if(!!a.getElementsByClassName&&a.getElementsByClassName("e").length!==0){a.lastChild.className="e";if(a.getElementsByClassName("e").length===1)return;o.order.splice(1,0,"CLASS"),o.find.CLASS=function(a,b,c){if(typeof b.getElementsByClassName!="undefined"&&!c)return b.getElementsByClassName(a[1])},a=null}}(),c.documentElement.contains?m.contains=function(a,b){return a!==b&&(a.contains?a.contains(b):!0)}:c.documentElement.compareDocumentPosition?m.contains=function(a,b){return!!(a.compareDocumentPosition(b)&16)}:m.contains=function(){return!1},m.isXML=function(a){var b=(a?a.ownerDocument||a:0).documentElement;return b?b.nodeName!=="HTML":!1};var y=function(a,b,c){var d,e=[],f="",g=b.nodeType?[b]:b;while(d=o.match.PSEUDO.exec(a))f+=d[0],a=a.replace(o.match.PSEUDO,"");a=o.relative[a]?a+"*":a;for(var h=0,i=g.length;h<i;h++)m(a,g[h],e,c);return m.filter(f,e)};m.attr=f.attr,m.selectors.attrMap={},f.find=m,f.expr=m.selectors,f.expr[":"]=f.expr.filters,f.unique=m.uniqueSort,f.text=m.getText,f.isXMLDoc=m.isXML,f.contains=m.contains}();var L=/Until$/,M=/^(?:parents|prevUntil|prevAll)/,N=/,/,O=/^.[^:#\[\.,]*$/,P=Array.prototype.slice,Q=f.expr.match.globalPOS,R={children:!0,contents:!0,next:!0,prev:!0};f.fn.extend({find:function(a){var b=this,c,d;if(typeof a!="string")return f(a).filter(function(){for(c=0,d=b.length;c<d;c++)if(f.contains(b[c],this))return!0});var e=this.pushStack("","find",a),g,h,i;for(c=0,d=this.length;c<d;c++){g=e.length,f.find(a,this[c],e);if(c>0)for(h=g;h<e.length;h++)for(i=0;i<g;i++)if(e[i]===e[h]){e.splice(h--,1);break}}return e},has:function(a){var b=f(a);return this.filter(function(){for(var a=0,c=b.length;a<c;a++)if(f.contains(this,b[a]))return!0})},not:function(a){return this.pushStack(T(this,a,!1),"not",a)},filter:function(a){return this.pushStack(T(this,a,!0),"filter",a)},is:function(a){return!!a&&(typeof a=="string"?Q.test(a)?f(a,this.context).index(this[0])>=0:f.filter(a,this).length>0:this.filter(a).length>0)},closest:function(a,b){var c=[],d,e,g=this[0];if(f.isArray(a)){var h=1;while(g&&g.ownerDocument&&g!==b){for(d=0;d<a.length;d++)f(g).is(a[d])&&c.push({selector:a[d],elem:g,level:h});g=g.parentNode,h++}return c}var i=Q.test(a)||typeof a!="string"?f(a,b||this.context):0;for(d=0,e=this.length;d<e;d++){g=this[d];while(g){if(i?i.index(g)>-1:f.find.matchesSelector(g,a)){c.push(g);break}g=g.parentNode;if(!g||!g.ownerDocument||g===b||g.nodeType===11)break}}c=c.length>1?f.unique(c):c;return this.pushStack(c,"closest",a)},index:function(a){if(!a)return this[0]&&this[0].parentNode?this.prevAll().length:-1;if(typeof a=="string")return f.inArray(this[0],f(a));return f.inArray(a.jquery?a[0]:a,this)},add:function(a,b){var c=typeof a=="string"?f(a,b):f.makeArray(a&&a.nodeType?[a]:a),d=f.merge(this.get(),c);return this.pushStack(S(c[0])||S(d[0])?d:f.unique(d))},andSelf:function(){return this.add(this.prevObject)}}),f.each({parent:function(a){var b=a.parentNode;return b&&b.nodeType!==11?b:null},parents:function(a){return f.dir(a,"parentNode")},parentsUntil:function(a,b,c){return f.dir(a,"parentNode",c)},next:function(a){return f.nth(a,2,"nextSibling")},prev:function(a){return f.nth(a,2,"previousSibling")},nextAll:function(a){return f.dir(a,"nextSibling")},prevAll:function(a){return f.dir(a,"previousSibling")},nextUntil:function(a,b,c){return f.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return f.dir(a,"previousSibling",c)},siblings:function(a){return f.sibling((a.parentNode||{}).firstChild,a)},children:function(a){return f.sibling(a.firstChild)},contents:function(a){return f.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:f.makeArray(a.childNodes)}},function(a,b){f.fn[a]=function(c,d){var e=f.map(this,b,c);L.test(a)||(d=c),d&&typeof d=="string"&&(e=f.filter(d,e)),e=this.length>1&&!R[a]?f.unique(e):e,(this.length>1||N.test(d))&&M.test(a)&&(e=e.reverse());return this.pushStack(e,a,P.call(arguments).join(","))}}),f.extend({filter:function(a,b,c){c&&(a=":not("+a+")");return b.length===1?f.find.matchesSelector(b[0],a)?[b[0]]:[]:f.find.matches(a,b)},dir:function(a,c,d){var e=[],g=a[c];while(g&&g.nodeType!==9&&(d===b||g.nodeType!==1||!f(g).is(d)))g.nodeType===1&&e.push(g),g=g[c];return e},nth:function(a,b,c,d){b=b||1;var e=0;for(;a;a=a[c])if(a.nodeType===1&&++e===b)break;return a},sibling:function(a,b){var c=[];for(;a;a=a.nextSibling)a.nodeType===1&&a!==b&&c.push(a);return c}});var V="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",W=/ jQuery\d+="(?:\d+|null)"/g,X=/^\s+/,Y=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,Z=/<([\w:]+)/,$=/<tbody/i,_=/<|&#?\w+;/,ba=/<(?:script|style)/i,bb=/<(?:script|object|embed|option|style)/i,bc=new RegExp("<(?:"+V+")[\\s/>]","i"),bd=/checked\s*(?:[^=]|=\s*.checked.)/i,be=/\/(java|ecma)script/i,bf=/^\s*<!(?:\[CDATA\[|\-\-)/,bg={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],area:[1,"<map>","</map>"],_default:[0,"",""]},bh=U(c);bg.optgroup=bg.option,bg.tbody=bg.tfoot=bg.colgroup=bg.caption=bg.thead,bg.th=bg.td,f.support.htmlSerialize||(bg._default=[1,"div<div>","</div>"]),f.fn.extend({text:function(a){return f.access(this,function(a){return a===b?f.text(this):this.empty().append((this[0]&&this[0].ownerDocument||c).createTextNode(a))},null,a,arguments.length)},wrapAll:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapAll(a.call(this,b))});if(this[0]){var b=f(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstChild&&a.firstChild.nodeType===1)a=a.firstChild;return a}).append(this)}return this},wrapInner:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapInner(a.call(this,b))});return this.each(function(){var b=f(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=f.isFunction(a);return this.each(function(c){f(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(){return this.parent().each(function(){f.nodeName(this,"body")||f(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.appendChild(a)})},prepend:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.insertBefore(a,this.firstChild)})},before:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this)});if(arguments.length){var a=f
.clean(arguments);a.push.apply(a,this.toArray());return this.pushStack(a,"before",arguments)}},after:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this.nextSibling)});if(arguments.length){var a=this.pushStack(this,"after",arguments);a.push.apply(a,f.clean(arguments));return a}},remove:function(a,b){for(var c=0,d;(d=this[c])!=null;c++)if(!a||f.filter(a,[d]).length)!b&&d.nodeType===1&&(f.cleanData(d.getElementsByTagName("*")),f.cleanData([d])),d.parentNode&&d.parentNode.removeChild(d);return this},empty:function(){for(var a=0,b;(b=this[a])!=null;a++){b.nodeType===1&&f.cleanData(b.getElementsByTagName("*"));while(b.firstChild)b.removeChild(b.firstChild)}return this},clone:function(a,b){a=a==null?!1:a,b=b==null?a:b;return this.map(function(){return f.clone(this,a,b)})},html:function(a){return f.access(this,function(a){var c=this[0]||{},d=0,e=this.length;if(a===b)return c.nodeType===1?c.innerHTML.replace(W,""):null;if(typeof a=="string"&&!ba.test(a)&&(f.support.leadingWhitespace||!X.test(a))&&!bg[(Z.exec(a)||["",""])[1].toLowerCase()]){a=a.replace(Y,"<$1></$2>");try{for(;d<e;d++)c=this[d]||{},c.nodeType===1&&(f.cleanData(c.getElementsByTagName("*")),c.innerHTML=a);c=0}catch(g){}}c&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(a){if(this[0]&&this[0].parentNode){if(f.isFunction(a))return this.each(function(b){var c=f(this),d=c.html();c.replaceWith(a.call(this,b,d))});typeof a!="string"&&(a=f(a).detach());return this.each(function(){var b=this.nextSibling,c=this.parentNode;f(this).remove(),b?f(b).before(a):f(c).append(a)})}return this.length?this.pushStack(f(f.isFunction(a)?a():a),"replaceWith",a):this},detach:function(a){return this.remove(a,!0)},domManip:function(a,c,d){var e,g,h,i,j=a[0],k=[];if(!f.support.checkClone&&arguments.length===3&&typeof j=="string"&&bd.test(j))return this.each(function(){f(this).domManip(a,c,d,!0)});if(f.isFunction(j))return this.each(function(e){var g=f(this);a[0]=j.call(this,e,c?g.html():b),g.domManip(a,c,d)});if(this[0]){i=j&&j.parentNode,f.support.parentNode&&i&&i.nodeType===11&&i.childNodes.length===this.length?e={fragment:i}:e=f.buildFragment(a,this,k),h=e.fragment,h.childNodes.length===1?g=h=h.firstChild:g=h.firstChild;if(g){c=c&&f.nodeName(g,"tr");for(var l=0,m=this.length,n=m-1;l<m;l++)d.call(c?bi(this[l],g):this[l],e.cacheable||m>1&&l<n?f.clone(h,!0,!0):h)}k.length&&f.each(k,function(a,b){b.src?f.ajax({type:"GET",global:!1,url:b.src,async:!1,dataType:"script"}):f.globalEval((b.text||b.textContent||b.innerHTML||"").replace(bf,"/*$0*/")),b.parentNode&&b.parentNode.removeChild(b)})}return this}}),f.buildFragment=function(a,b,d){var e,g,h,i,j=a[0];b&&b[0]&&(i=b[0].ownerDocument||b[0]),i.createDocumentFragment||(i=c),a.length===1&&typeof j=="string"&&j.length<512&&i===c&&j.charAt(0)==="<"&&!bb.test(j)&&(f.support.checkClone||!bd.test(j))&&(f.support.html5Clone||!bc.test(j))&&(g=!0,h=f.fragments[j],h&&h!==1&&(e=h)),e||(e=i.createDocumentFragment(),f.clean(a,i,e,d)),g&&(f.fragments[j]=h?e:1);return{fragment:e,cacheable:g}},f.fragments={},f.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){f.fn[a]=function(c){var d=[],e=f(c),g=this.length===1&&this[0].parentNode;if(g&&g.nodeType===11&&g.childNodes.length===1&&e.length===1){e[b](this[0]);return this}for(var h=0,i=e.length;h<i;h++){var j=(h>0?this.clone(!0):this).get();f(e[h])[b](j),d=d.concat(j)}return this.pushStack(d,a,e.selector)}}),f.extend({clone:function(a,b,c){var d,e,g,h=f.support.html5Clone||f.isXMLDoc(a)||!bc.test("<"+a.nodeName+">")?a.cloneNode(!0):bo(a);if((!f.support.noCloneEvent||!f.support.noCloneChecked)&&(a.nodeType===1||a.nodeType===11)&&!f.isXMLDoc(a)){bk(a,h),d=bl(a),e=bl(h);for(g=0;d[g];++g)e[g]&&bk(d[g],e[g])}if(b){bj(a,h);if(c){d=bl(a),e=bl(h);for(g=0;d[g];++g)bj(d[g],e[g])}}d=e=null;return h},clean:function(a,b,d,e){var g,h,i,j=[];b=b||c,typeof b.createElement=="undefined"&&(b=b.ownerDocument||b[0]&&b[0].ownerDocument||c);for(var k=0,l;(l=a[k])!=null;k++){typeof l=="number"&&(l+="");if(!l)continue;if(typeof l=="string")if(!_.test(l))l=b.createTextNode(l);else{l=l.replace(Y,"<$1></$2>");var m=(Z.exec(l)||["",""])[1].toLowerCase(),n=bg[m]||bg._default,o=n[0],p=b.createElement("div"),q=bh.childNodes,r;b===c?bh.appendChild(p):U(b).appendChild(p),p.innerHTML=n[1]+l+n[2];while(o--)p=p.lastChild;if(!f.support.tbody){var s=$.test(l),t=m==="table"&&!s?p.firstChild&&p.firstChild.childNodes:n[1]==="<table>"&&!s?p.childNodes:[];for(i=t.length-1;i>=0;--i)f.nodeName(t[i],"tbody")&&!t[i].childNodes.length&&t[i].parentNode.removeChild(t[i])}!f.support.leadingWhitespace&&X.test(l)&&p.insertBefore(b.createTextNode(X.exec(l)[0]),p.firstChild),l=p.childNodes,p&&(p.parentNode.removeChild(p),q.length>0&&(r=q[q.length-1],r&&r.parentNode&&r.parentNode.removeChild(r)))}var u;if(!f.support.appendChecked)if(l[0]&&typeof (u=l.length)=="number")for(i=0;i<u;i++)bn(l[i]);else bn(l);l.nodeType?j.push(l):j=f.merge(j,l)}if(d){g=function(a){return!a.type||be.test(a.type)};for(k=0;j[k];k++){h=j[k];if(e&&f.nodeName(h,"script")&&(!h.type||be.test(h.type)))e.push(h.parentNode?h.parentNode.removeChild(h):h);else{if(h.nodeType===1){var v=f.grep(h.getElementsByTagName("script"),g);j.splice.apply(j,[k+1,0].concat(v))}d.appendChild(h)}}}return j},cleanData:function(a){var b,c,d=f.cache,e=f.event.special,g=f.support.deleteExpando;for(var h=0,i;(i=a[h])!=null;h++){if(i.nodeName&&f.noData[i.nodeName.toLowerCase()])continue;c=i[f.expando];if(c){b=d[c];if(b&&b.events){for(var j in b.events)e[j]?f.event.remove(i,j):f.removeEvent(i,j,b.handle);b.handle&&(b.handle.elem=null)}g?delete i[f.expando]:i.removeAttribute&&i.removeAttribute(f.expando),delete d[c]}}}});var bp=/alpha\([^)]*\)/i,bq=/opacity=([^)]*)/,br=/([A-Z]|^ms)/g,bs=/^[\-+]?(?:\d*\.)?\d+$/i,bt=/^-?(?:\d*\.)?\d+(?!px)[^\d\s]+$/i,bu=/^([\-+])=([\-+.\de]+)/,bv=/^margin/,bw={position:"absolute",visibility:"hidden",display:"block"},bx=["Top","Right","Bottom","Left"],by,bz,bA;f.fn.css=function(a,c){return f.access(this,function(a,c,d){return d!==b?f.style(a,c,d):f.css(a,c)},a,c,arguments.length>1)},f.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=by(a,"opacity");return c===""?"1":c}return a.style.opacity}}},cssNumber:{fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":f.support.cssFloat?"cssFloat":"styleFloat"},style:function(a,c,d,e){if(!!a&&a.nodeType!==3&&a.nodeType!==8&&!!a.style){var g,h,i=f.camelCase(c),j=a.style,k=f.cssHooks[i];c=f.cssProps[i]||i;if(d===b){if(k&&"get"in k&&(g=k.get(a,!1,e))!==b)return g;return j[c]}h=typeof d,h==="string"&&(g=bu.exec(d))&&(d=+(g[1]+1)*+g[2]+parseFloat(f.css(a,c)),h="number");if(d==null||h==="number"&&isNaN(d))return;h==="number"&&!f.cssNumber[i]&&(d+="px");if(!k||!("set"in k)||(d=k.set(a,d))!==b)try{j[c]=d}catch(l){}}},css:function(a,c,d){var e,g;c=f.camelCase(c),g=f.cssHooks[c],c=f.cssProps[c]||c,c==="cssFloat"&&(c="float");if(g&&"get"in g&&(e=g.get(a,!0,d))!==b)return e;if(by)return by(a,c)},swap:function(a,b,c){var d={},e,f;for(f in b)d[f]=a.style[f],a.style[f]=b[f];e=c.call(a);for(f in b)a.style[f]=d[f];return e}}),f.curCSS=f.css,c.defaultView&&c.defaultView.getComputedStyle&&(bz=function(a,b){var c,d,e,g,h=a.style;b=b.replace(br,"-$1").toLowerCase(),(d=a.ownerDocument.defaultView)&&(e=d.getComputedStyle(a,null))&&(c=e.getPropertyValue(b),c===""&&!f.contains(a.ownerDocument.documentElement,a)&&(c=f.style(a,b))),!f.support.pixelMargin&&e&&bv.test(b)&&bt.test(c)&&(g=h.width,h.width=c,c=e.width,h.width=g);return c}),c.documentElement.currentStyle&&(bA=function(a,b){var c,d,e,f=a.currentStyle&&a.currentStyle[b],g=a.style;f==null&&g&&(e=g[b])&&(f=e),bt.test(f)&&(c=g.left,d=a.runtimeStyle&&a.runtimeStyle.left,d&&(a.runtimeStyle.left=a.currentStyle.left),g.left=b==="fontSize"?"1em":f,f=g.pixelLeft+"px",g.left=c,d&&(a.runtimeStyle.left=d));return f===""?"auto":f}),by=bz||bA,f.each(["height","width"],function(a,b){f.cssHooks[b]={get:function(a,c,d){if(c)return a.offsetWidth!==0?bB(a,b,d):f.swap(a,bw,function(){return bB(a,b,d)})},set:function(a,b){return bs.test(b)?b+"px":b}}}),f.support.opacity||(f.cssHooks.opacity={get:function(a,b){return bq.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?parseFloat(RegExp.$1)/100+"":b?"1":""},set:function(a,b){var c=a.style,d=a.currentStyle,e=f.isNumeric(b)?"alpha(opacity="+b*100+")":"",g=d&&d.filter||c.filter||"";c.zoom=1;if(b>=1&&f.trim(g.replace(bp,""))===""){c.removeAttribute("filter");if(d&&!d.filter)return}c.filter=bp.test(g)?g.replace(bp,e):g+" "+e}}),f(function(){f.support.reliableMarginRight||(f.cssHooks.marginRight={get:function(a,b){return f.swap(a,{display:"inline-block"},function(){return b?by(a,"margin-right"):a.style.marginRight})}})}),f.expr&&f.expr.filters&&(f.expr.filters.hidden=function(a){var b=a.offsetWidth,c=a.offsetHeight;return b===0&&c===0||!f.support.reliableHiddenOffsets&&(a.style&&a.style.display||f.css(a,"display"))==="none"},f.expr.filters.visible=function(a){return!f.expr.filters.hidden(a)}),f.each({margin:"",padding:"",border:"Width"},function(a,b){f.cssHooks[a+b]={expand:function(c){var d,e=typeof c=="string"?c.split(" "):[c],f={};for(d=0;d<4;d++)f[a+bx[d]+b]=e[d]||e[d-2]||e[0];return f}}});var bC=/%20/g,bD=/\[\]$/,bE=/\r?\n/g,bF=/#.*$/,bG=/^(.*?):[ \t]*([^\r\n]*)\r?$/mg,bH=/^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,bI=/^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,bJ=/^(?:GET|HEAD)$/,bK=/^\/\//,bL=/\?/,bM=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,bN=/^(?:select|textarea)/i,bO=/\s+/,bP=/([?&])_=[^&]*/,bQ=/^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+))?)?/,bR=f.fn.load,bS={},bT={},bU,bV,bW=["*/"]+["*"];try{bU=e.href}catch(bX){bU=c.createElement("a"),bU.href="",bU=bU.href}bV=bQ.exec(bU.toLowerCase())||[],f.fn.extend({load:function(a,c,d){if(typeof a!="string"&&bR)return bR.apply(this,arguments);if(!this.length)return this;var e=a.indexOf(" ");if(e>=0){var g=a.slice(e,a.length);a=a.slice(0,e)}var h="GET";c&&(f.isFunction(c)?(d=c,c=b):typeof c=="object"&&(c=f.param(c,f.ajaxSettings.traditional),h="POST"));var i=this;f.ajax({url:a,type:h,dataType:"html",data:c,complete:function(a,b,c){c=a.responseText,a.isResolved()&&(a.done(function(a){c=a}),i.html(g?f("<div>").append(c.replace(bM,"")).find(g):c)),d&&i.each(d,[c,b,a])}});return this},serialize:function(){return f.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?f.makeArray(this.elements):this}).filter(function(){return this.name&&!this.disabled&&(this.checked||bN.test(this.nodeName)||bH.test(this.type))}).map(function(a,b){var c=f(this).val();return c==null?null:f.isArray(c)?f.map(c,function(a,c){return{name:b.name,value:a.replace(bE,"\r\n")}}):{name:b.name,value:c.replace(bE,"\r\n")}}).get()}}),f.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(a,b){f.fn[b]=function(a){return this.on(b,a)}}),f.each(["get","post"],function(a,c){f[c]=function(a,d,e,g){f.isFunction(d)&&(g=g||e,e=d,d=b);return f.ajax({type:c,url:a,data:d,success:e,dataType:g})}}),f.extend({getScript:function(a,c){return f.get(a,b,c,"script")},getJSON:function(a,b,c){return f.get(a,b,c,"json")},ajaxSetup:function(a,b){b?b$(a,f.ajaxSettings):(b=a,a=f.ajaxSettings),b$(a,b);return a},ajaxSettings:{url:bU,isLocal:bI.test(bV[1]),global:!0,type:"GET",contentType:"application/x-www-form-urlencoded; charset=UTF-8",processData:!0,async:!0,accepts:{xml:"application/xml, text/xml",html:"text/html",text:"text/plain",json:"application/json, text/javascript","*":bW},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":a.String,"text html":!0,"text json":f.parseJSON,"text xml":f.parseXML},flatOptions:{context:!0,url:!0}},ajaxPrefilter:bY(bS),ajaxTransport:bY(bT),ajax:function(a,c){function w(a,c,l,m){if(s!==2){s=2,q&&clearTimeout(q),p=b,n=m||"",v.readyState=a>0?4:0;var o,r,u,w=c,x=l?ca(d,v,l):b,y,z;if(a>=200&&a<300||a===304){if(d.ifModified){if(y=v.getResponseHeader("Last-Modified"))f.lastModified[k]=y;if(z=v.getResponseHeader("Etag"))f.etag[k]=z}if(a===304)w="notmodified",o=!0;else try{r=cb(d,x),w="success",o=!0}catch(A){w="parsererror",u=A}}else{u=w;if(!w||a)w="error",a<0&&(a=0)}v.status=a,v.statusText=""+(c||w),o?h.resolveWith(e,[r,w,v]):h.rejectWith(e,[v,w,u]),v.statusCode(j),j=b,t&&g.trigger("ajax"+(o?"Success":"Error"),[v,d,o?r:u]),i.fireWith(e,[v,w]),t&&(g.trigger("ajaxComplete",[v,d]),--f.active||f.event.trigger("ajaxStop"))}}typeof a=="object"&&(c=a,a=b),c=c||{};var d=f.ajaxSetup({},c),e=d.context||d,g=e!==d&&(e.nodeType||e instanceof f)?f(e):f.event,h=f.Deferred(),i=f.Callbacks("once memory"),j=d.statusCode||{},k,l={},m={},n,o,p,q,r,s=0,t,u,v={readyState:0,setRequestHeader:function(a,b){if(!s){var c=a.toLowerCase();a=m[c]=m[c]||a,l[a]=b}return this},getAllResponseHeaders:function(){return s===2?n:null},getResponseHeader:function(a){var c;if(s===2){if(!o){o={};while(c=bG.exec(n))o[c[1].toLowerCase()]=c[2]}c=o[a.toLowerCase()]}return c===b?null:c},overrideMimeType:function(a){s||(d.mimeType=a);return this},abort:function(a){a=a||"abort",p&&p.abort(a),w(0,a);return this}};h.promise(v),v.success=v.done,v.error=v.fail,v.complete=i.add,v.statusCode=function(a){if(a){var b;if(s<2)for(b in a)j[b]=[j[b],a[b]];else b=a[v.status],v.then(b,b)}return this},d.url=((a||d.url)+"").replace(bF,"").replace(bK,bV[1]+"//"),d.dataTypes=f.trim(d.dataType||"*").toLowerCase().split(bO),d.crossDomain==null&&(r=bQ.exec(d.url.toLowerCase()),d.crossDomain=!(!r||r[1]==bV[1]&&r[2]==bV[2]&&(r[3]||(r[1]==="http:"?80:443))==(bV[3]||(bV[1]==="http:"?80:443)))),d.data&&d.processData&&typeof d.data!="string"&&(d.data=f.param(d.data,d.traditional)),bZ(bS,d,c,v);if(s===2)return!1;t=d.global,d.type=d.type.toUpperCase(),d.hasContent=!bJ.test(d.type),t&&f.active++===0&&f.event.trigger("ajaxStart");if(!d.hasContent){d.data&&(d.url+=(bL.test(d.url)?"&":"?")+d.data,delete d.data),k=d.url;if(d.cache===!1){var x=f.now(),y=d.url.replace(bP,"$1_="+x);d.url=y+(y===d.url?(bL.test(d.url)?"&":"?")+"_="+x:"")}}(d.data&&d.hasContent&&d.contentType!==!1||c.contentType)&&v.setRequestHeader("Content-Type",d.contentType),d.ifModified&&(k=k||d.url,f.lastModified[k]&&v.setRequestHeader("If-Modified-Since",f.lastModified[k]),f.etag[k]&&v.setRequestHeader("If-None-Match",f.etag[k])),v.setRequestHeader("Accept",d.dataTypes[0]&&d.accepts[d.dataTypes[0]]?d.accepts[d.dataTypes[0]]+(d.dataTypes[0]!=="*"?", "+bW+"; q=0.01":""):d.accepts["*"]);for(u in d.headers)v.setRequestHeader(u,d.headers[u]);if(d.beforeSend&&(d.beforeSend.call(e,v,d)===!1||s===2)){v.abort();return!1}for(u in{success:1,error:1,complete:1})v[u](d[u]);p=bZ(bT,d,c,v);if(!p)w(-1,"No Transport");else{v.readyState=1,t&&g.trigger("ajaxSend",[v,d]),d.async&&d.timeout>0&&(q=setTimeout(function(){v.abort("timeout")},d.timeout));try{s=1,p.send(l,w)}catch(z){if(s<2)w(-1,z);else throw z}}return v},param:function(a,c){var d=[],e=function(a,b){b=f.isFunction(b)?b():b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};c===b&&(c=f.ajaxSettings.traditional);if(f.isArray(a)||a.jquery&&!f.isPlainObject(a))f.each(a,function(){e(this.name,this.value)});else for(var g in a)b_(g,a[g],c,e);return d.join("&").replace(bC,"+")}}),f.extend({active:0,lastModified:{},etag:{}});var cc=f.now(),cd=/(\=)\?(&|$)|\?\?/i;f.ajaxSetup({jsonp:"callback",jsonpCallback:function(){return f.expando+"_"+cc++}}),f.ajaxPrefilter("json jsonp",function(b,c,d){var e=typeof b.data=="string"&&/^application\/x\-www\-form\-urlencoded/.test(b.contentType);if(b.dataTypes[0]==="jsonp"||b.jsonp!==!1&&(cd.test(b.url)||e&&cd.test(b.data))){var g,h=b.jsonpCallback=f.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,i=a[h],j=b.url,k=b.data,l="$1"+h+"$2";b.jsonp!==!1&&(j=j.replace(cd,l),b.url===j&&(e&&(k=k.replace(cd,l)),b.data===k&&(j+=(/\?/.test(j)?"&":"?")+b.jsonp+"="+h))),b.url=j,b.data=k,a[h]=function(a){g=[a]},d.always(function(){a[h]=i,g&&f.isFunction(i)&&a[h](g[0])}),b.converters["script json"]=function(){g||f.error(h+" was not called");return g[0]},b.dataTypes[0]="json";return"script"}}),f.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/javascript|ecmascript/},converters:{"text script":function(a){f.globalEval(a);return a}}}),f.ajaxPrefilter("script",function(a){a.cache===b&&(a.cache=!1),a.crossDomain&&(a.type="GET",a.global=!1)}),f.ajaxTransport("script",function(a){if(a.crossDomain){var d,e=c.head||c.getElementsByTagName("head")[0]||c.documentElement;return{send:function(f,g){d=c.createElement("script"),d.async="async",a.scriptCharset&&(d.charset=a.scriptCharset),d.src=a.url,d.onload=d.onreadystatechange=function(a,c){if(c||!d.readyState||/loaded|complete/.test(d.readyState))d.onload=d.onreadystatechange=null,e&&d.parentNode&&e.removeChild(d),d=b,c||g(200,"success")},e.insertBefore(d,e.firstChild)},abort:function(){d&&d.onload(0,1)}}}});var ce=a.ActiveXObject?function(){for(var a in cg)cg[a](0,1)}:!1,cf=0,cg;f.ajaxSettings.xhr=a.ActiveXObject?function(){return!this.isLocal&&ch()||ci()}:ch,function(a){f.extend(f.support,{ajax:!!a,cors:!!a&&"withCredentials"in a})}(f.ajaxSettings.xhr()),f.support.ajax&&f.ajaxTransport(function(c){if(!c.crossDomain||f.support.cors){var d;return{send:function(e,g){var h=c.xhr(),i,j;c.username?h.open(c.type,c.url,c.async,c.username,c.password):h.open(c.type,c.url,c.async);if(c.xhrFields)for(j in c.xhrFields)h[j]=c.xhrFields[j];c.mimeType&&h.overrideMimeType&&h.overrideMimeType(c.mimeType),!c.crossDomain&&!e["X-Requested-With"]&&(e["X-Requested-With"]="XMLHttpRequest");try{for(j in e)h.setRequestHeader(j,e[j])}catch(k){}h.send(c.hasContent&&c.data||null),d=function(a,e){var j,k,l,m,n;try{if(d&&(e||h.readyState===4)){d=b,i&&(h.onreadystatechange=f.noop,ce&&delete cg[i]);if(e)h.readyState!==4&&h.abort();else{j=h.status,l=h.getAllResponseHeaders(),m={},n=h.responseXML,n&&n.documentElement&&(m.xml=n);try{m.text=h.responseText}catch(a){}try{k=h.statusText}catch(o){k=""}!j&&c.isLocal&&!c.crossDomain?j=m.text?200:404:j===1223&&(j=204)}}}catch(p){e||g(-1,p)}m&&g(j,k,m,l)},!c.async||h.readyState===4?d():(i=++cf,ce&&(cg||(cg={},f(a).unload(ce)),cg[i]=d),h.onreadystatechange=d)},abort:function(){d&&d(0,1)}}}});var cj={},ck,cl,cm=/^(?:toggle|show|hide)$/,cn=/^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,co,cp=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]],cq;f.fn.extend({show:function(a,b,c){var d,e;if(a||a===0)return this.animate(ct("show",3),a,b,c);for(var g=0,h=this.length;g<h;g++)d=this[g],d.style&&(e=d.style.display,!f._data(d,"olddisplay")&&e==="none"&&(e=d.style.display=""),(e===""&&f.css(d,"display")==="none"||!f.contains(d.ownerDocument.documentElement,d))&&f._data(d,"olddisplay",cu(d.nodeName)));for(g=0;g<h;g++){d=this[g];if(d.style){e=d.style.display;if(e===""||e==="none")d.style.display=f._data(d,"olddisplay")||""}}return this},hide:function(a,b,c){if(a||a===0)return this.animate(ct("hide",3),a,b,c);var d,e,g=0,h=this.length;for(;g<h;g++)d=this[g],d.style&&(e=f.css(d,"display"),e!=="none"&&!f._data(d,"olddisplay")&&f._data(d,"olddisplay",e));for(g=0;g<h;g++)this[g].style&&(this[g].style.display="none");return this},_toggle:f.fn.toggle,toggle:function(a,b,c){var d=typeof a=="boolean";f.isFunction(a)&&f.isFunction(b)?this._toggle.apply(this,arguments):a==null||d?this.each(function(){var b=d?a:f(this).is(":hidden");f(this)[b?"show":"hide"]()}):this.animate(ct("toggle",3),a,b,c);return this},fadeTo:function(a,b,c,d){return this.filter(":hidden").css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){function g(){e.queue===!1&&f._mark(this);var b=f.extend({},e),c=this.nodeType===1,d=c&&f(this).is(":hidden"),g,h,i,j,k,l,m,n,o,p,q;b.animatedProperties={};for(i in a){g=f.camelCase(i),i!==g&&(a[g]=a[i],delete a[i]);if((k=f.cssHooks[g])&&"expand"in k){l=k.expand(a[g]),delete a[g];for(i in l)i in a||(a[i]=l[i])}}for(g in a){h=a[g],f.isArray(h)?(b.animatedProperties[g]=h[1],h=a[g]=h[0]):b.animatedProperties[g]=b.specialEasing&&b.specialEasing[g]||b.easing||"swing";if(h==="hide"&&d||h==="show"&&!d)return b.complete.call(this);c&&(g==="height"||g==="width")&&(b.overflow=[this.style.overflow,this.style.overflowX,this.style.overflowY],f.css(this,"display")==="inline"&&f.css(this,"float")==="none"&&(!f.support.inlineBlockNeedsLayout||cu(this.nodeName)==="inline"?this.style.display="inline-block":this.style.zoom=1))}b.overflow!=null&&(this.style.overflow="hidden");for(i in a)j=new f.fx(this,b,i),h=a[i],cm.test(h)?(q=f._data(this,"toggle"+i)||(h==="toggle"?d?"show":"hide":0),q?(f._data(this,"toggle"+i,q==="show"?"hide":"show"),j[q]()):j[h]()):(m=cn.exec(h),n=j.cur(),m?(o=parseFloat(m[2]),p=m[3]||(f.cssNumber[i]?"":"px"),p!=="px"&&(f.style(this,i,(o||1)+p),n=(o||1)/j.cur()*n,f.style(this,i,n+p)),m[1]&&(o=(m[1]==="-="?-1:1)*o+n),j.custom(n,o,p)):j.custom(n,h,""));return!0}var e=f.speed(b,c,d);if(f.isEmptyObject(a))return this.each(e.complete,[!1]);a=f.extend({},a);return e.queue===!1?this.each(g):this.queue(e.queue,g)},stop:function(a,c,d){typeof a!="string"&&(d=c,c=a,a=b),c&&a!==!1&&this.queue(a||"fx",[]);return this.each(function(){function h(a,b,c){var e=b[c];f.removeData(a,c,!0),e.stop(d)}var b,c=!1,e=f.timers,g=f._data(this);d||f._unmark(!0,this);if(a==null)for(b in g)g[b]&&g[b].stop&&b.indexOf(".run")===b.length-4&&h(this,g,b);else g[b=a+".run"]&&g[b].stop&&h(this,g,b);for(b=e.length;b--;)e[b].elem===this&&(a==null||e[b].queue===a)&&(d?e[b](!0):e[b].saveState(),c=!0,e.splice(b,1));(!d||!c)&&f.dequeue(this,a)})}}),f.each({slideDown:ct("show",1),slideUp:ct("hide",1),slideToggle:ct("toggle",1),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){f.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),f.extend({speed:function(a,b,c){var d=a&&typeof a=="object"?f.extend({},a):{complete:c||!c&&b||f.isFunction(a)&&a,duration:a,easing:c&&b||b&&!f.isFunction(b)&&b};d.duration=f.fx.off?0:typeof d.duration=="number"?d.duration:d.duration in f.fx.speeds?f.fx.speeds[d.duration]:f.fx.speeds._default;if(d.queue==null||d.queue===!0)d.queue="fx";d.old=d.complete,d.complete=function(a){f.isFunction(d.old)&&d.old.call(this),d.queue?f.dequeue(this,d.queue):a!==!1&&f._unmark(this)};return d},easing:{linear:function(a){return a},swing:function(a){return-Math.cos(a*Math.PI)/2+.5}},timers:[],fx:function(a,b,c){this.options=b,this.elem=a,this.prop=c,b.orig=b.orig||{}}}),f.fx.prototype={update:function(){this.options.step&&this.options.step.call(this.elem,this.now,this),(f.fx.step[this.prop]||f.fx.step._default)(this)},cur:function(){if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==null))return this.elem[this.prop];var a,b=f.css(this.elem,this.prop);return isNaN(a=parseFloat(b))?!b||b==="auto"?0:b:a},custom:function(a,c,d){function h(a){return e.step(a)}var e=this,g=f.fx;this.startTime=cq||cr(),this.end=c,this.now=this.start=a,this.pos=this.state=0,this.unit=d||this.unit||(f.cssNumber[this.prop]?"":"px"),h.queue=this.options.queue,h.elem=this.elem,h.saveState=function(){f._data(e.elem,"fxshow"+e.prop)===b&&(e.options.hide?f._data(e.elem,"fxshow"+e.prop,e.start):e.options.show&&f._data(e.elem,"fxshow"+e.prop,e.end))},h()&&f.timers.push(h)&&!co&&(co=setInterval(g.tick,g.interval))},show:function(){var a=f._data(this.elem,"fxshow"+this.prop);this.options.orig[this.prop]=a||f.style(this.elem,this.prop),this.options.show=!0,a!==b?this.custom(this.cur(),a):this.custom(this.prop==="width"||this.prop==="height"?1:0,this.cur()),f(this.elem).show()},hide:function(){this.options.orig[this.prop]=f._data(this.elem,"fxshow"+this.prop)||f.style(this.elem,this.prop),this.options.hide=!0,this.custom(this.cur(),0)},step:function(a){var b,c,d,e=cq||cr(),g=!0,h=this.elem,i=this.options;if(a||e>=i.duration+this.startTime){this.now=this.end,this.pos=this.state=1,this.update(),i.animatedProperties[this.prop]=!0;for(b in i.animatedProperties)i.animatedProperties[b]!==!0&&(g=!1);if(g){i.overflow!=null&&!f.support.shrinkWrapBlocks&&f.each(["","X","Y"],function(a,b){h.style["overflow"+b]=i.overflow[a]}),i.hide&&f(h).hide();if(i.hide||i.show)for(b in i.animatedProperties)f.style(h,b,i.orig[b]),f.removeData(h,"fxshow"+b,!0),f.removeData(h,"toggle"+b,!0);d=i.complete,d&&(i.complete=!1,d.call(h))}return!1}i.duration==Infinity?this.now=e:(c=e-this.startTime,this.state=c/i.duration,this.pos=f.easing[i.animatedProperties[this.prop]](this.state,c,0,1,i.duration),this.now=this.start+(this.end-this.start)*this.pos),this.update();return!0}},f.extend(f.fx,{tick:function(){var a,b=f.timers,c=0;for(;c<b.length;c++)a=b[c],!a()&&b[c]===a&&b.splice(c--,1);b.length||f.fx.stop()},interval:13,stop:function(){clearInterval(co),co=null},speeds:{slow:600,fast:200,_default:400},step:{opacity:function(a){f.style(a.elem,"opacity",a.now)},_default:function(a){a.elem.style&&a.elem.style[a.prop]!=null?a.elem.style[a.prop]=a.now+a.unit:a.elem[a.prop]=a.now}}}),f.each(cp.concat.apply([],cp),function(a,b){b.indexOf("margin")&&(f.fx.step[b]=function(a){f.style(a.elem,b,Math.max(0,a.now)+a.unit)})}),f.expr&&f.expr.filters&&(f.expr.filters.animated=function(a){return f.grep(f.timers,function(b){return a===b.elem}).length});var cv,cw=/^t(?:able|d|h)$/i,cx=/^(?:body|html)$/i;"getBoundingClientRect"in c.documentElement?cv=function(a,b,c,d){try{d=a.getBoundingClientRect()}catch(e){}if(!d||!f.contains(c,a))return d?{top:d.top,left:d.left}:{top:0,left:0};var g=b.body,h=cy(b),i=c.clientTop||g.clientTop||0,j=c.clientLeft||g.clientLeft||0,k=h.pageYOffset||f.support.boxModel&&c.scrollTop||g.scrollTop,l=h.pageXOffset||f.support.boxModel&&c.scrollLeft||g.scrollLeft,m=d.top+k-i,n=d.left+l-j;return{top:m,left:n}}:cv=function(a,b,c){var d,e=a.offsetParent,g=a,h=b.body,i=b.defaultView,j=i?i.getComputedStyle(a,null):a.currentStyle,k=a.offsetTop,l=a.offsetLeft;while((a=a.parentNode)&&a!==h&&a!==c){if(f.support.fixedPosition&&j.position==="fixed")break;d=i?i.getComputedStyle(a,null):a.currentStyle,k-=a.scrollTop,l-=a.scrollLeft,a===e&&(k+=a.offsetTop,l+=a.offsetLeft,f.support.doesNotAddBorder&&(!f.support.doesAddBorderForTableAndCells||!cw.test(a.nodeName))&&(k+=parseFloat(d.borderTopWidth)||0,l+=parseFloat(d.borderLeftWidth)||0),g=e,e=a.offsetParent),f.support.subtractsBorderForOverflowNotVisible&&d.overflow!=="visible"&&(k+=parseFloat(d.borderTopWidth)||0,l+=parseFloat(d.borderLeftWidth)||0),j=d}if(j.position==="relative"||j.position==="static")k+=h.offsetTop,l+=h.offsetLeft;f.support.fixedPosition&&j.position==="fixed"&&(k+=Math.max(c.scrollTop,h.scrollTop),l+=Math.max(c.scrollLeft,h.scrollLeft));return{top:k,left:l}},f.fn.offset=function(a){if(arguments.length)return a===b?this:this.each(function(b){f.offset.setOffset(this,a,b)});var c=this[0],d=c&&c.ownerDocument;if(!d)return null;if(c===d.body)return f.offset.bodyOffset(c);return cv(c,d,d.documentElement)},f.offset={bodyOffset:function(a){var b=a.offsetTop,c=a.offsetLeft;f.support.doesNotIncludeMarginInBodyOffset&&(b+=parseFloat(f.css(a,"marginTop"))||0,c+=parseFloat(f.css(a,"marginLeft"))||0);return{top:b,left:c}},setOffset:function(a,b,c){var d=f.css(a,"position");d==="static"&&(a.style.position="relative");var e=f(a),g=e.offset(),h=f.css(a,"top"),i=f.css(a,"left"),j=(d==="absolute"||d==="fixed")&&f.inArray("auto",[h,i])>-1,k={},l={},m,n;j?(l=e.position(),m=l.top,n=l.left):(m=parseFloat(h)||0,n=parseFloat(i)||0),f.isFunction(b)&&(b=b.call(a,c,g)),b.top!=null&&(k.top=b.top-g.top+m),b.left!=null&&(k.left=b.left-g.left+n),"using"in b?b.using.call(a,k):e.css(k)}},f.fn.extend({position:function(){if(!this[0])return null;var a=this[0],b=this.offsetParent(),c=this.offset(),d=cx.test(b[0].nodeName)?{top:0,left:0}:b.offset();c.top-=parseFloat(f.css(a,"marginTop"))||0,c.left-=parseFloat(f.css(a,"marginLeft"))||0,d.top+=parseFloat(f.css(b[0],"borderTopWidth"))||0,d.left+=parseFloat(f.css(b[0],"borderLeftWidth"))||0;return{top:c.top-d.top,left:c.left-d.left}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||c.body;while(a&&!cx.test(a.nodeName)&&f.css(a,"position")==="static")a=a.offsetParent;return a})}}),f.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,c){var d=/Y/.test(c);f.fn[a]=function(e){return f.access(this,function(a,e,g){var h=cy(a);if(g===b)return h?c in h?h[c]:f.support.boxModel&&h.document.documentElement[e]||h.document.body[e]:a[e];h?h.scrollTo(d?f(h).scrollLeft():g,d?g:f(h).scrollTop()):a[e]=g},a,e,arguments.length,null)}}),f.each({Height:"height",Width:"width"},function(a,c){var d="client"+a,e="scroll"+a,g="offset"+a;f.fn["inner"+a]=function(){var a=this[0];return a?a.style?parseFloat(f.css(a,c,"padding")):this[c]():null},f.fn["outer"+a]=function(a){var b=this[0];return b?b.style?parseFloat(f.css(b,c,a?"margin":"border")):this[c]():null},f.fn[c]=function(a){return f.access(this,function(a,c,h){var i,j,k,l;if(f.isWindow(a)){i=a.document,j=i.documentElement[d];return f.support.boxModel&&j||i.body&&i.body[d]||j}if(a.nodeType===9){i=a.documentElement;if(i[d]>=i[e])return i[d];return Math.max(a.body[e],i[e],a.body[g],i[g])}if(h===b){k=f.css(a,c),l=parseFloat(k);return f.isNumeric(l)?l:k}f(a).css(c,h)},c,a,arguments.length,null)}}),a.jQuery=a.$=f,typeof define=="function"&&define.amd&&define.amd.jQuery&&define("jquery",[],function(){return f})})(window);

/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.ui.core.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */
(function(a,b){function c(b,c){var e=b.nodeName.toLowerCase();if("area"===e){var f=b.parentNode,g=f.name,h;return!b.href||!g||f.nodeName.toLowerCase()!=="map"?!1:(h=a("img[usemap=#"+g+"]")[0],!!h&&d(h))}return(/input|select|textarea|button|object/.test(e)?!b.disabled:"a"==e?b.href||c:c)&&d(b)}function d(b){return!a(b).parents().andSelf().filter(function(){return a.curCSS(this,"visibility")==="hidden"||a.expr.filters.hidden(this)}).length}a.ui=a.ui||{};if(a.ui.version)return;a.extend(a.ui,{version:"1.8.20",keyCode:{ALT:18,BACKSPACE:8,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91}}),a.fn.extend({propAttr:a.fn.prop||a.fn.attr,_focus:a.fn.focus,focus:function(b,c){return typeof b=="number"?this.each(function(){var d=this;setTimeout(function(){a(d).focus(),c&&c.call(d)},b)}):this._focus.apply(this,arguments)},scrollParent:function(){var b;return a.browser.msie&&/(static|relative)/.test(this.css("position"))||/absolute/.test(this.css("position"))?b=this.parents().filter(function(){return/(relative|absolute|fixed)/.test(a.curCSS(this,"position",1))&&/(auto|scroll)/.test(a.curCSS(this,"overflow",1)+a.curCSS(this,"overflow-y",1)+a.curCSS(this,"overflow-x",1))}).eq(0):b=this.parents().filter(function(){return/(auto|scroll)/.test(a.curCSS(this,"overflow",1)+a.curCSS(this,"overflow-y",1)+a.curCSS(this,"overflow-x",1))}).eq(0),/fixed/.test(this.css("position"))||!b.length?a(document):b},zIndex:function(c){if(c!==b)return this.css("zIndex",c);if(this.length){var d=a(this[0]),e,f;while(d.length&&d[0]!==document){e=d.css("position");if(e==="absolute"||e==="relative"||e==="fixed"){f=parseInt(d.css("zIndex"),10);if(!isNaN(f)&&f!==0)return f}d=d.parent()}}return 0},disableSelection:function(){return this.bind((a.support.selectstart?"selectstart":"mousedown")+".ui-disableSelection",function(a){a.preventDefault()})},enableSelection:function(){return this.unbind(".ui-disableSelection")}}),a.each(["Width","Height"],function(c,d){function h(b,c,d,f){return a.each(e,function(){c-=parseFloat(a.curCSS(b,"padding"+this,!0))||0,d&&(c-=parseFloat(a.curCSS(b,"border"+this+"Width",!0))||0),f&&(c-=parseFloat(a.curCSS(b,"margin"+this,!0))||0)}),c}var e=d==="Width"?["Left","Right"]:["Top","Bottom"],f=d.toLowerCase(),g={innerWidth:a.fn.innerWidth,innerHeight:a.fn.innerHeight,outerWidth:a.fn.outerWidth,outerHeight:a.fn.outerHeight};a.fn["inner"+d]=function(c){return c===b?g["inner"+d].call(this):this.each(function(){a(this).css(f,h(this,c)+"px")})},a.fn["outer"+d]=function(b,c){return typeof b!="number"?g["outer"+d].call(this,b):this.each(function(){a(this).css(f,h(this,b,!0,c)+"px")})}}),a.extend(a.expr[":"],{data:function(b,c,d){return!!a.data(b,d[3])},focusable:function(b){return c(b,!isNaN(a.attr(b,"tabindex")))},tabbable:function(b){var d=a.attr(b,"tabindex"),e=isNaN(d);return(e||d>=0)&&c(b,!e)}}),a(function(){var b=document.body,c=b.appendChild(c=document.createElement("div"));c.offsetHeight,a.extend(c.style,{minHeight:"100px",height:"auto",padding:0,borderWidth:0}),a.support.minHeight=c.offsetHeight===100,a.support.selectstart="onselectstart"in c,b.removeChild(c).style.display="none"}),a.extend(a.ui,{plugin:{add:function(b,c,d){var e=a.ui[b].prototype;for(var f in d)e.plugins[f]=e.plugins[f]||[],e.plugins[f].push([c,d[f]])},call:function(a,b,c){var d=a.plugins[b];if(!d||!a.element[0].parentNode)return;for(var e=0;e<d.length;e++)a.options[d[e][0]]&&d[e][1].apply(a.element,c)}},contains:function(a,b){return document.compareDocumentPosition?a.compareDocumentPosition(b)&16:a!==b&&a.contains(b)},hasScroll:function(b,c){if(a(b).css("overflow")==="hidden")return!1;var d=c&&c==="left"?"scrollLeft":"scrollTop",e=!1;return b[d]>0?!0:(b[d]=1,e=b[d]>0,b[d]=0,e)},isOverAxis:function(a,b,c){return a>b&&a<b+c},isOver:function(b,c,d,e,f,g){return a.ui.isOverAxis(b,d,f)&&a.ui.isOverAxis(c,e,g)}})})(jQuery);;/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.ui.widget.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */
(function(a,b){if(a.cleanData){var c=a.cleanData;a.cleanData=function(b){for(var d=0,e;(e=b[d])!=null;d++)try{a(e).triggerHandler("remove")}catch(f){}c(b)}}else{var d=a.fn.remove;a.fn.remove=function(b,c){return this.each(function(){return c||(!b||a.filter(b,[this]).length)&&a("*",this).add([this]).each(function(){try{a(this).triggerHandler("remove")}catch(b){}}),d.call(a(this),b,c)})}}a.widget=function(b,c,d){var e=b.split(".")[0],f;b=b.split(".")[1],f=e+"-"+b,d||(d=c,c=a.Widget),a.expr[":"][f]=function(c){return!!a.data(c,b)},a[e]=a[e]||{},a[e][b]=function(a,b){arguments.length&&this._createWidget(a,b)};var g=new c;g.options=a.extend(!0,{},g.options),a[e][b].prototype=a.extend(!0,g,{namespace:e,widgetName:b,widgetEventPrefix:a[e][b].prototype.widgetEventPrefix||b,widgetBaseClass:f},d),a.widget.bridge(b,a[e][b])},a.widget.bridge=function(c,d){a.fn[c]=function(e){var f=typeof e=="string",g=Array.prototype.slice.call(arguments,1),h=this;return e=!f&&g.length?a.extend.apply(null,[!0,e].concat(g)):e,f&&e.charAt(0)==="_"?h:(f?this.each(function(){var d=a.data(this,c),f=d&&a.isFunction(d[e])?d[e].apply(d,g):d;if(f!==d&&f!==b)return h=f,!1}):this.each(function(){var b=a.data(this,c);b?b.option(e||{})._init():a.data(this,c,new d(e,this))}),h)}},a.Widget=function(a,b){arguments.length&&this._createWidget(a,b)},a.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",options:{disabled:!1},_createWidget:function(b,c){a.data(c,this.widgetName,this),this.element=a(c),this.options=a.extend(!0,{},this.options,this._getCreateOptions(),b);var d=this;this.element.bind("remove."+this.widgetName,function(){d.destroy()}),this._create(),this._trigger("create"),this._init()},_getCreateOptions:function(){return a.metadata&&a.metadata.get(this.element[0])[this.widgetName]},_create:function(){},_init:function(){},destroy:function(){this.element.unbind("."+this.widgetName).removeData(this.widgetName),this.widget().unbind("."+this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass+"-disabled "+"ui-state-disabled")},widget:function(){return this.element},option:function(c,d){var e=c;if(arguments.length===0)return a.extend({},this.options);if(typeof c=="string"){if(d===b)return this.options[c];e={},e[c]=d}return this._setOptions(e),this},_setOptions:function(b){var c=this;return a.each(b,function(a,b){c._setOption(a,b)}),this},_setOption:function(a,b){return this.options[a]=b,a==="disabled"&&this.widget()[b?"addClass":"removeClass"](this.widgetBaseClass+"-disabled"+" "+"ui-state-disabled").attr("aria-disabled",b),this},enable:function(){return this._setOption("disabled",!1)},disable:function(){return this._setOption("disabled",!0)},_trigger:function(b,c,d){var e,f,g=this.options[b];d=d||{},c=a.Event(c),c.type=(b===this.widgetEventPrefix?b:this.widgetEventPrefix+b).toLowerCase(),c.target=this.element[0],f=c.originalEvent;if(f)for(e in f)e in c||(c[e]=f[e]);return this.element.trigger(c,d),!(a.isFunction(g)&&g.call(this.element[0],c,d)===!1||c.isDefaultPrevented())}}})(jQuery);;/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.ui.tabs.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */
(function(a,b){function e(){return++c}function f(){return++d}var c=0,d=0;a.widget("ui.tabs",{options:{add:null,ajaxOptions:null,cache:!1,cookie:null,collapsible:!1,disable:null,disabled:[],enable:null,event:"click",fx:null,idPrefix:"ui-tabs-",load:null,panelTemplate:"<div></div>",remove:null,select:null,show:null,spinner:"<em>Loading&#8230;</em>",tabTemplate:"<li><a href='#{href}'><span>#{label}</span></a></li>"},_create:function(){this._tabify(!0)},_setOption:function(a,b){if(a=="selected"){if(this.options.collapsible&&b==this.options.selected)return;this.select(b)}else this.options[a]=b,this._tabify()},_tabId:function(a){return a.title&&a.title.replace(/\s/g,"_").replace(/[^\w\u00c0-\uFFFF-]/g,"")||this.options.idPrefix+e()},_sanitizeSelector:function(a){return a.replace(/:/g,"\\:")},_cookie:function(){var b=this.cookie||(this.cookie=this.options.cookie.name||"ui-tabs-"+f());return a.cookie.apply(null,[b].concat(a.makeArray(arguments)))},_ui:function(a,b){return{tab:a,panel:b,index:this.anchors.index(a)}},_cleanup:function(){this.lis.filter(".ui-state-processing").removeClass("ui-state-processing").find("span:data(label.tabs)").each(function(){var b=a(this);b.html(b.data("label.tabs")).removeData("label.tabs")})},_tabify:function(c){function m(b,c){b.css("display",""),!a.support.opacity&&c.opacity&&b[0].style.removeAttribute("filter")}var d=this,e=this.options,f=/^#.+/;this.list=this.element.find("ol,ul").eq(0),this.lis=a(" > li:has(a[href])",this.list),this.anchors=this.lis.map(function(){return a("a",this)[0]}),this.panels=a([]),this.anchors.each(function(b,c){var g=a(c).attr("href"),h=g.split("#")[0],i;h&&(h===location.toString().split("#")[0]||(i=a("base")[0])&&h===i.href)&&(g=c.hash,c.href=g);if(f.test(g))d.panels=d.panels.add(d.element.find(d._sanitizeSelector(g)));else if(g&&g!=="#"){a.data(c,"href.tabs",g),a.data(c,"load.tabs",g.replace(/#.*$/,""));var j=d._tabId(c);c.href="#"+j;var k=d.element.find("#"+j);k.length||(k=a(e.panelTemplate).attr("id",j).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").insertAfter(d.panels[b-1]||d.list),k.data("destroy.tabs",!0)),d.panels=d.panels.add(k)}else e.disabled.push(b)}),c?(this.element.addClass("ui-tabs ui-widget ui-widget-content ui-corner-all"),this.list.addClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"),this.lis.addClass("ui-state-default ui-corner-top"),this.panels.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom"),e.selected===b?(location.hash&&this.anchors.each(function(a,b){if(b.hash==location.hash)return e.selected=a,!1}),typeof e.selected!="number"&&e.cookie&&(e.selected=parseInt(d._cookie(),10)),typeof e.selected!="number"&&this.lis.filter(".ui-tabs-selected").length&&(e.selected=this.lis.index(this.lis.filter(".ui-tabs-selected"))),e.selected=e.selected||(this.lis.length?0:-1)):e.selected===null&&(e.selected=-1),e.selected=e.selected>=0&&this.anchors[e.selected]||e.selected<0?e.selected:0,e.disabled=a.unique(e.disabled.concat(a.map(this.lis.filter(".ui-state-disabled"),function(a,b){return d.lis.index(a)}))).sort(),a.inArray(e.selected,e.disabled)!=-1&&e.disabled.splice(a.inArray(e.selected,e.disabled),1),this.panels.addClass("ui-tabs-hide"),this.lis.removeClass("ui-tabs-selected ui-state-active"),e.selected>=0&&this.anchors.length&&(d.element.find(d._sanitizeSelector(d.anchors[e.selected].hash)).removeClass("ui-tabs-hide"),this.lis.eq(e.selected).addClass("ui-tabs-selected ui-state-active"),d.element.queue("tabs",function(){d._trigger("show",null,d._ui(d.anchors[e.selected],d.element.find(d._sanitizeSelector(d.anchors[e.selected].hash))[0]))}),this.load(e.selected)),a(window).bind("unload",function(){d.lis.add(d.anchors).unbind(".tabs"),d.lis=d.anchors=d.panels=null})):e.selected=this.lis.index(this.lis.filter(".ui-tabs-selected")),this.element[e.collapsible?"addClass":"removeClass"]("ui-tabs-collapsible"),e.cookie&&this._cookie(e.selected,e.cookie);for(var g=0,h;h=this.lis[g];g++)a(h)[a.inArray(g,e.disabled)!=-1&&!a(h).hasClass("ui-tabs-selected")?"addClass":"removeClass"]("ui-state-disabled");e.cache===!1&&this.anchors.removeData("cache.tabs"),this.lis.add(this.anchors).unbind(".tabs");if(e.event!=="mouseover"){var i=function(a,b){b.is(":not(.ui-state-disabled)")&&b.addClass("ui-state-"+a)},j=function(a,b){b.removeClass("ui-state-"+a)};this.lis.bind("mouseover.tabs",function(){i("hover",a(this))}),this.lis.bind("mouseout.tabs",function(){j("hover",a(this))}),this.anchors.bind("focus.tabs",function(){i("focus",a(this).closest("li"))}),this.anchors.bind("blur.tabs",function(){j("focus",a(this).closest("li"))})}var k,l;e.fx&&(a.isArray(e.fx)?(k=e.fx[0],l=e.fx[1]):k=l=e.fx);var n=l?function(b,c){a(b).closest("li").addClass("ui-tabs-selected ui-state-active"),c.hide().removeClass("ui-tabs-hide").animate(l,l.duration||"normal",function(){m(c,l),d._trigger("show",null,d._ui(b,c[0]))})}:function(b,c){a(b).closest("li").addClass("ui-tabs-selected ui-state-active"),c.removeClass("ui-tabs-hide"),d._trigger("show",null,d._ui(b,c[0]))},o=k?function(a,b){b.animate(k,k.duration||"normal",function(){d.lis.removeClass("ui-tabs-selected ui-state-active"),b.addClass("ui-tabs-hide"),m(b,k),d.element.dequeue("tabs")})}:function(a,b,c){d.lis.removeClass("ui-tabs-selected ui-state-active"),b.addClass("ui-tabs-hide"),d.element.dequeue("tabs")};this.anchors.bind(e.event+".tabs",function(){var b=this,c=a(b).closest("li"),f=d.panels.filter(":not(.ui-tabs-hide)"),g=d.element.find(d._sanitizeSelector(b.hash));if(c.hasClass("ui-tabs-selected")&&!e.collapsible||c.hasClass("ui-state-disabled")||c.hasClass("ui-state-processing")||d.panels.filter(":animated").length||d._trigger("select",null,d._ui(this,g[0]))===!1)return this.blur(),!1;e.selected=d.anchors.index(this),d.abort();if(e.collapsible){if(c.hasClass("ui-tabs-selected"))return e.selected=-1,e.cookie&&d._cookie(e.selected,e.cookie),d.element.queue("tabs",function(){o(b,f)}).dequeue("tabs"),this.blur(),!1;if(!f.length)return e.cookie&&d._cookie(e.selected,e.cookie),d.element.queue("tabs",function(){n(b,g)}),d.load(d.anchors.index(this)),this.blur(),!1}e.cookie&&d._cookie(e.selected,e.cookie);if(g.length)f.length&&d.element.queue("tabs",function(){o(b,f)}),d.element.queue("tabs",function(){n(b,g)}),d.load(d.anchors.index(this));else throw"jQuery UI Tabs: Mismatching fragment identifier.";a.browser.msie&&this.blur()}),this.anchors.bind("click.tabs",function(){return!1})},_getIndex:function(a){return typeof a=="string"&&(a=this.anchors.index(this.anchors.filter("[href$='"+a+"']"))),a},destroy:function(){var b=this.options;return this.abort(),this.element.unbind(".tabs").removeClass("ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible").removeData("tabs"),this.list.removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"),this.anchors.each(function(){var b=a.data(this,"href.tabs");b&&(this.href=b);var c=a(this).unbind(".tabs");a.each(["href","load","cache"],function(a,b){c.removeData(b+".tabs")})}),this.lis.unbind(".tabs").add(this.panels).each(function(){a.data(this,"destroy.tabs")?a(this).remove():a(this).removeClass(["ui-state-default","ui-corner-top","ui-tabs-selected","ui-state-active","ui-state-hover","ui-state-focus","ui-state-disabled","ui-tabs-panel","ui-widget-content","ui-corner-bottom","ui-tabs-hide"].join(" "))}),b.cookie&&this._cookie(null,b.cookie),this},add:function(c,d,e){e===b&&(e=this.anchors.length);var f=this,g=this.options,h=a(g.tabTemplate.replace(/#\{href\}/g,c).replace(/#\{label\}/g,d)),i=c.indexOf("#")?this._tabId(a("a",h)[0]):c.replace("#","");h.addClass("ui-state-default ui-corner-top").data("destroy.tabs",!0);var j=f.element.find("#"+i);return j.length||(j=a(g.panelTemplate).attr("id",i).data("destroy.tabs",!0)),j.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide"),e>=this.lis.length?(h.appendTo(this.list),j.appendTo(this.list[0].parentNode)):(h.insertBefore(this.lis[e]),j.insertBefore(this.panels[e])),g.disabled=a.map(g.disabled,function(a,b){return a>=e?++a:a}),this._tabify(),this.anchors.length==1&&(g.selected=0,h.addClass("ui-tabs-selected ui-state-active"),j.removeClass("ui-tabs-hide"),this.element.queue("tabs",function(){f._trigger("show",null,f._ui(f.anchors[0],f.panels[0]))}),this.load(0)),this._trigger("add",null,this._ui(this.anchors[e],this.panels[e])),this},remove:function(b){b=this._getIndex(b);var c=this.options,d=this.lis.eq(b).remove(),e=this.panels.eq(b).remove();return d.hasClass("ui-tabs-selected")&&this.anchors.length>1&&this.select(b+(b+1<this.anchors.length?1:-1)),c.disabled=a.map(a.grep(c.disabled,function(a,c){return a!=b}),function(a,c){return a>=b?--a:a}),this._tabify(),this._trigger("remove",null,this._ui(d.find("a")[0],e[0])),this},enable:function(b){b=this._getIndex(b);var c=this.options;if(a.inArray(b,c.disabled)==-1)return;return this.lis.eq(b).removeClass("ui-state-disabled"),c.disabled=a.grep(c.disabled,function(a,c){return a!=b}),this._trigger("enable",null,this._ui(this.anchors[b],this.panels[b])),this},disable:function(a){a=this._getIndex(a);var b=this,c=this.options;return a!=c.selected&&(this.lis.eq(a).addClass("ui-state-disabled"),c.disabled.push(a),c.disabled.sort(),this._trigger("disable",null,this._ui(this.anchors[a],this.panels[a]))),this},select:function(a){a=this._getIndex(a);if(a==-1)if(this.options.collapsible&&this.options.selected!=-1)a=this.options.selected;else return this;return this.anchors.eq(a).trigger(this.options.event+".tabs"),this},load:function(b){b=this._getIndex(b);var c=this,d=this.options,e=this.anchors.eq(b)[0],f=a.data(e,"load.tabs");this.abort();if(!f||this.element.queue("tabs").length!==0&&a.data(e,"cache.tabs")){this.element.dequeue("tabs");return}this.lis.eq(b).addClass("ui-state-processing");if(d.spinner){var g=a("span",e);g.data("label.tabs",g.html()).html(d.spinner)}return this.xhr=a.ajax(a.extend({},d.ajaxOptions,{url:f,success:function(f,g){c.element.find(c._sanitizeSelector(e.hash)).html(f),c._cleanup(),d.cache&&a.data(e,"cache.tabs",!0),c._trigger("load",null,c._ui(c.anchors[b],c.panels[b]));try{d.ajaxOptions.success(f,g)}catch(h){}},error:function(a,f,g){c._cleanup(),c._trigger("load",null,c._ui(c.anchors[b],c.panels[b]));try{d.ajaxOptions.error(a,f,b,e)}catch(g){}}})),c.element.dequeue("tabs"),this},abort:function(){return this.element.queue([]),this.panels.stop(!1,!0),this.element.queue("tabs",this.element.queue("tabs").splice(-2,2)),this.xhr&&(this.xhr.abort(),delete this.xhr),this._cleanup(),this},url:function(a,b){return this.anchors.eq(a).removeData("cache.tabs").data("load.tabs",b),this},length:function(){return this.anchors.length}}),a.extend(a.ui.tabs,{version:"1.8.20"}),a.extend(a.ui.tabs.prototype,{rotation:null,rotate:function(a,b){var c=this,d=this.options,e=c._rotate||(c._rotate=function(b){clearTimeout(c.rotation),c.rotation=setTimeout(function(){var a=d.selected;c.select(++a<c.anchors.length?a:0)},a),b&&b.stopPropagation()}),f=c._unrotate||(c._unrotate=b?function(a){e()}:function(a){a.clientX&&c.rotate(null)});return a?(this.element.bind("tabsshow",e),this.anchors.bind(d.event+".tabs",f),e()):(clearTimeout(c.rotation),this.element.unbind("tabsshow",e),this.anchors.unbind(d.event+".tabs",f),delete this._rotate,delete this._unrotate),this}})})(jQuery);;/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.effects.core.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */
jQuery.effects||function(a,b){function c(b){var c;return b&&b.constructor==Array&&b.length==3?b:(c=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(b))?[parseInt(c[1],10),parseInt(c[2],10),parseInt(c[3],10)]:(c=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(b))?[parseFloat(c[1])*2.55,parseFloat(c[2])*2.55,parseFloat(c[3])*2.55]:(c=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(b))?[parseInt(c[1],16),parseInt(c[2],16),parseInt(c[3],16)]:(c=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(b))?[parseInt(c[1]+c[1],16),parseInt(c[2]+c[2],16),parseInt(c[3]+c[3],16)]:(c=/rgba\(0, 0, 0, 0\)/.exec(b))?e.transparent:e[a.trim(b).toLowerCase()]}function d(b,d){var e;do{e=a.curCSS(b,d);if(e!=""&&e!="transparent"||a.nodeName(b,"body"))break;d="backgroundColor"}while(b=b.parentNode);return c(e)}function h(){var a=document.defaultView?document.defaultView.getComputedStyle(this,null):this.currentStyle,b={},c,d;if(a&&a.length&&a[0]&&a[a[0]]){var e=a.length;while(e--)c=a[e],typeof a[c]=="string"&&(d=c.replace(/\-(\w)/g,function(a,b){return b.toUpperCase()}),b[d]=a[c])}else for(c in a)typeof a[c]=="string"&&(b[c]=a[c]);return b}function i(b){var c,d;for(c in b)d=b[c],(d==null||a.isFunction(d)||c in g||/scrollbar/.test(c)||!/color/i.test(c)&&isNaN(parseFloat(d)))&&delete b[c];return b}function j(a,b){var c={_:0},d;for(d in b)a[d]!=b[d]&&(c[d]=b[d]);return c}function k(b,c,d,e){typeof b=="object"&&(e=c,d=null,c=b,b=c.effect),a.isFunction(c)&&(e=c,d=null,c={});if(typeof c=="number"||a.fx.speeds[c])e=d,d=c,c={};return a.isFunction(d)&&(e=d,d=null),c=c||{},d=d||c.duration,d=a.fx.off?0:typeof d=="number"?d:d in a.fx.speeds?a.fx.speeds[d]:a.fx.speeds._default,e=e||c.complete,[b,c,d,e]}function l(b){return!b||typeof b=="number"||a.fx.speeds[b]?!0:typeof b=="string"&&!a.effects[b]?!0:!1}a.effects={},a.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","borderColor","color","outlineColor"],function(b,e){a.fx.step[e]=function(a){a.colorInit||(a.start=d(a.elem,e),a.end=c(a.end),a.colorInit=!0),a.elem.style[e]="rgb("+Math.max(Math.min(parseInt(a.pos*(a.end[0]-a.start[0])+a.start[0],10),255),0)+","+Math.max(Math.min(parseInt(a.pos*(a.end[1]-a.start[1])+a.start[1],10),255),0)+","+Math.max(Math.min(parseInt(a.pos*(a.end[2]-a.start[2])+a.start[2],10),255),0)+")"}});var e={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]},f=["add","remove","toggle"],g={border:1,borderBottom:1,borderColor:1,borderLeft:1,borderRight:1,borderTop:1,borderWidth:1,margin:1,padding:1};a.effects.animateClass=function(b,c,d,e){return a.isFunction(d)&&(e=d,d=null),this.queue(function(){var g=a(this),k=g.attr("style")||" ",l=i(h.call(this)),m,n=g.attr("class")||"";a.each(f,function(a,c){b[c]&&g[c+"Class"](b[c])}),m=i(h.call(this)),g.attr("class",n),g.animate(j(l,m),{queue:!1,duration:c,easing:d,complete:function(){a.each(f,function(a,c){b[c]&&g[c+"Class"](b[c])}),typeof g.attr("style")=="object"?(g.attr("style").cssText="",g.attr("style").cssText=k):g.attr("style",k),e&&e.apply(this,arguments),a.dequeue(this)}})})},a.fn.extend({_addClass:a.fn.addClass,addClass:function(b,c,d,e){return c?a.effects.animateClass.apply(this,[{add:b},c,d,e]):this._addClass(b)},_removeClass:a.fn.removeClass,removeClass:function(b,c,d,e){return c?a.effects.animateClass.apply(this,[{remove:b},c,d,e]):this._removeClass(b)},_toggleClass:a.fn.toggleClass,toggleClass:function(c,d,e,f,g){return typeof d=="boolean"||d===b?e?a.effects.animateClass.apply(this,[d?{add:c}:{remove:c},e,f,g]):this._toggleClass(c,d):a.effects.animateClass.apply(this,[{toggle:c},d,e,f])},switchClass:function(b,c,d,e,f){return a.effects.animateClass.apply(this,[{add:c,remove:b},d,e,f])}}),a.extend(a.effects,{version:"1.8.20",save:function(a,b){for(var c=0;c<b.length;c++)b[c]!==null&&a.data("ec.storage."+b[c],a[0].style[b[c]])},restore:function(a,b){for(var c=0;c<b.length;c++)b[c]!==null&&a.css(b[c],a.data("ec.storage."+b[c]))},setMode:function(a,b){return b=="toggle"&&(b=a.is(":hidden")?"show":"hide"),b},getBaseline:function(a,b){var c,d;switch(a[0]){case"top":c=0;break;case"middle":c=.5;break;case"bottom":c=1;break;default:c=a[0]/b.height}switch(a[1]){case"left":d=0;break;case"center":d=.5;break;case"right":d=1;break;default:d=a[1]/b.width}return{x:d,y:c}},createWrapper:function(b){if(b.parent().is(".ui-effects-wrapper"))return b.parent();var c={width:b.outerWidth(!0),height:b.outerHeight(!0),"float":b.css("float")},d=a("<div></div>").addClass("ui-effects-wrapper").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0}),e=document.activeElement;return b.wrap(d),(b[0]===e||a.contains(b[0],e))&&a(e).focus(),d=b.parent(),b.css("position")=="static"?(d.css({position:"relative"}),b.css({position:"relative"})):(a.extend(c,{position:b.css("position"),zIndex:b.css("z-index")}),a.each(["top","left","bottom","right"],function(a,d){c[d]=b.css(d),isNaN(parseInt(c[d],10))&&(c[d]="auto")}),b.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"})),d.css(c).show()},removeWrapper:function(b){var c,d=document.activeElement;return b.parent().is(".ui-effects-wrapper")?(c=b.parent().replaceWith(b),(b[0]===d||a.contains(b[0],d))&&a(d).focus(),c):b},setTransition:function(b,c,d,e){return e=e||{},a.each(c,function(a,c){var f=b.cssUnit(c);f[0]>0&&(e[c]=f[0]*d+f[1])}),e}}),a.fn.extend({effect:function(b,c,d,e){var f=k.apply(this,arguments),g={options:f[1],duration:f[2],callback:f[3]},h=g.options.mode,i=a.effects[b];return a.fx.off||!i?h?this[h](g.duration,g.callback):this.each(function(){g.callback&&g.callback.call(this)}):i.call(this,g)},_show:a.fn.show,show:function(a){if(l(a))return this._show.apply(this,arguments);var b=k.apply(this,arguments);return b[1].mode="show",this.effect.apply(this,b)},_hide:a.fn.hide,hide:function(a){if(l(a))return this._hide.apply(this,arguments);var b=k.apply(this,arguments);return b[1].mode="hide",this.effect.apply(this,b)},__toggle:a.fn.toggle,toggle:function(b){if(l(b)||typeof b=="boolean"||a.isFunction(b))return this.__toggle.apply(this,arguments);var c=k.apply(this,arguments);return c[1].mode="toggle",this.effect.apply(this,c)},cssUnit:function(b){var c=this.css(b),d=[];return a.each(["em","px","%","pt"],function(a,b){c.indexOf(b)>0&&(d=[parseFloat(c),b])}),d}}),a.easing.jswing=a.easing.swing,a.extend(a.easing,{def:"easeOutQuad",swing:function(b,c,d,e,f){return a.easing[a.easing.def](b,c,d,e,f)},easeInQuad:function(a,b,c,d,e){return d*(b/=e)*b+c},easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c},easeInOutQuad:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b+c:-d/2*(--b*(b-2)-1)+c},easeInCubic:function(a,b,c,d,e){return d*(b/=e)*b*b+c},easeOutCubic:function(a,b,c,d,e){return d*((b=b/e-1)*b*b+1)+c},easeInOutCubic:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b+c:d/2*((b-=2)*b*b+2)+c},easeInQuart:function(a,b,c,d,e){return d*(b/=e)*b*b*b+c},easeOutQuart:function(a,b,c,d,e){return-d*((b=b/e-1)*b*b*b-1)+c},easeInOutQuart:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b*b+c:-d/2*((b-=2)*b*b*b-2)+c},easeInQuint:function(a,b,c,d,e){return d*(b/=e)*b*b*b*b+c},easeOutQuint:function(a,b,c,d,e){return d*((b=b/e-1)*b*b*b*b+1)+c},easeInOutQuint:function(a,b,c,d,e){return(b/=e/2)<1?d/2*b*b*b*b*b+c:d/2*((b-=2)*b*b*b*b+2)+c},easeInSine:function(a,b,c,d,e){return-d*Math.cos(b/e*(Math.PI/2))+d+c},easeOutSine:function(a,b,c,d,e){return d*Math.sin(b/e*(Math.PI/2))+c},easeInOutSine:function(a,b,c,d,e){return-d/2*(Math.cos(Math.PI*b/e)-1)+c},easeInExpo:function(a,b,c,d,e){return b==0?c:d*Math.pow(2,10*(b/e-1))+c},easeOutExpo:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c},easeInOutExpo:function(a,b,c,d,e){return b==0?c:b==e?c+d:(b/=e/2)<1?d/2*Math.pow(2,10*(b-1))+c:d/2*(-Math.pow(2,-10*--b)+2)+c},easeInCirc:function(a,b,c,d,e){return-d*(Math.sqrt(1-(b/=e)*b)-1)+c},easeOutCirc:function(a,b,c,d,e){return d*Math.sqrt(1-(b=b/e-1)*b)+c},easeInOutCirc:function(a,b,c,d,e){return(b/=e/2)<1?-d/2*(Math.sqrt(1-b*b)-1)+c:d/2*(Math.sqrt(1-(b-=2)*b)+1)+c},easeInElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e)==1)return c+d;g||(g=e*.3);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return-(h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g))+c},easeOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e)==1)return c+d;g||(g=e*.3);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return h*Math.pow(2,-10*b)*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e/2)==2)return c+d;g||(g=e*.3*1.5);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return b<1?-0.5*h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+c:h*Math.pow(2,-10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)*.5+d+c},easeInBack:function(a,c,d,e,f,g){return g==b&&(g=1.70158),e*(c/=f)*c*((g+1)*c-g)+d},easeOutBack:function(a,c,d,e,f,g){return g==b&&(g=1.70158),e*((c=c/f-1)*c*((g+1)*c+g)+1)+d},easeInOutBack:function(a,c,d,e,f,g){return g==b&&(g=1.70158),(c/=f/2)<1?e/2*c*c*(((g*=1.525)+1)*c-g)+d:e/2*((c-=2)*c*(((g*=1.525)+1)*c+g)+2)+d},easeInBounce:function(b,c,d,e,f){return e-a.easing.easeOutBounce(b,f-c,0,e,f)+d},easeOutBounce:function(a,b,c,d,e){return(b/=e)<1/2.75?d*7.5625*b*b+c:b<2/2.75?d*(7.5625*(b-=1.5/2.75)*b+.75)+c:b<2.5/2.75?d*(7.5625*(b-=2.25/2.75)*b+.9375)+c:d*(7.5625*(b-=2.625/2.75)*b+.984375)+c},easeInOutBounce:function(b,c,d,e,f){return c<f/2?a.easing.easeInBounce(b,c*2,0,e,f)*.5+d:a.easing.easeOutBounce(b,c*2-f,0,e,f)*.5+e*.5+d}})}(jQuery);;/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.effects.slide.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */
(function(a,b){a.effects.slide=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right"],e=a.effects.setMode(c,b.options.mode||"show"),f=b.options.direction||"left";a.effects.save(c,d),c.show(),a.effects.createWrapper(c).css({overflow:"hidden"});var g=f=="up"||f=="down"?"top":"left",h=f=="up"||f=="left"?"pos":"neg",i=b.options.distance||(g=="top"?c.outerHeight({margin:!0}):c.outerWidth({margin:!0}));e=="show"&&c.css(g,h=="pos"?isNaN(i)?"-"+i:-i:i);var j={};j[g]=(e=="show"?h=="pos"?"+=":"-=":h=="pos"?"-=":"+=")+i,c.animate(j,{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){e=="hide"&&c.hide(),a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(this,arguments),c.dequeue()}})})}})(jQuery);;

/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

;(function($){
	$.fn.superfish = function(op){

		var sf = $.fn.superfish,
			c = sf.c,
			$arrow = $(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),
			over = function(){
				var $$ = $(this), menu = getMenu($$);
				clearTimeout(menu.sfTimer);
				$$.showSuperfishUl().siblings().hideSuperfishUl();
			},
			out = function(){
				var $$ = $(this), menu = getMenu($$), o = sf.op;
				clearTimeout(menu.sfTimer);
				menu.sfTimer=setTimeout(function(){
					o.retainPath=($.inArray($$[0],o.$path)>-1);
					$$.hideSuperfishUl();
					if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
				},o.delay);	
			},
			getMenu = function($menu){
				var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
				sf.op = sf.o[menu.serial];
				return menu;
			},
			addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };
			
		return this.each(function() {
			var s = this.serial = sf.o.length;
			var o = $.extend({},sf.defaults,op);
			o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
				$(this).addClass([o.hoverClass,c.bcClass].join(' '))
					.filter('li:has(ul)').removeClass(o.pathClass);
			});
			sf.o[s] = sf.op = o;
			
			$('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
				if (o.autoArrows) addArrow( $('>a:first-child',this) );
			})
			.not('.'+c.bcClass)
				.hideSuperfishUl();
			
			var $a = $('a',this);
			$a.each(function(i){
				var $li = $a.eq(i).parents('li');
				$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});
			});
			o.onInit.call(this);
			
		}).each(function() {
			var menuClasses = [c.menuClass];
			if (sf.op.dropShadows  && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
			$(this).addClass(menuClasses.join(' '));
		});
	};

	var sf = $.fn.superfish;
	sf.o = [];
	sf.op = {};
	sf.IE7fix = function(){
		var o = sf.op;
		if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity!=undefined)
			this.toggleClass(sf.c.shadowClass+'-off');
		};
	sf.c = {
		bcClass     : 'sf-breadcrumb',
		menuClass   : 'sf-js-enabled',
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		shadowClass : 'sf-shadow'
	};
	sf.defaults = {
		hoverClass	: 'sfHover',
		pathClass	: 'overideThisToUse',
		pathLevels	: 1,
		delay		: 800,
		animation	: {opacity:'show'},
		speed		: 'normal',
		autoArrows	: true,
		dropShadows : true,
		disableHI	: false,		// true disables hoverIntent detection
		onInit		: function(){}, // callback functions
		onBeforeShow: function(){},
		onShow		: function(){},
		onHide		: function(){}
	};
	$.fn.extend({
		hideSuperfishUl : function(){
			var o = sf.op,
				not = (o.retainPath===true) ? o.$path : '';
			o.retainPath = false;
			var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
					.find('>ul').hide().css('visibility','hidden');
			o.onHide.call($ul);
			return this;
		},
		showSuperfishUl : function(){
			var o = sf.op,
				sh = sf.c.shadowClass+'-off',
				$ul = this.addClass(o.hoverClass)
					.find('>ul:hidden').css('visibility','visible');
			sf.IE7fix.call($ul);
			o.onBeforeShow.call($ul);
			$ul.animate(o.animation,o.speed,function(){ sf.IE7fix.call($ul); o.onShow.call($ul); });
			return this;
		}
	});

})(jQuery);

//(function(jQuery) {
//jQuery.fn.lavaLamp = function(o) {
//	o = jQuery.extend({ fx: 'swing',
//					  	speed: 500, 
//						click: function(){return true}, 
//						startItem: 'no',
//						returnDelay: 0,
//						autoReturn: false,
//						setOnClick: true,
//						homeTop:0,
//						homeLeft:0,
//						homeWidth:0,
//						homeHeight:0
//
//						}, 
//					o || {});
//
//	var $home;
//	// create homeLava element if origin dimensions set
//	if (o.homeTop || o.homeLeft) { 
//		$home = jQuery('<li class="homeLava selectedLava"></li>').css({ left:o.homeLeft, top:o.homeTop, width:o.homeWidth, height:o.homeHeight, position:'absolute' });
//		jQuery(this).prepend($home);
//	}
//		
//	return this.each(function() {
//		var path = location.pathname + location.search + location.hash;
//		var $selected = new Object;
//		var delayTimer;
//		var $back;
//		var ce; //current_element
//		
//		var $li = jQuery('li:not(.noLava)', this);
//		// check for complete path match, if so flag element into $selected
//		if ( o.startItem == 'no' )
//			$selected = jQuery('li a[href$="' + path + '"]', this).parent('li');
//			
//		// if still no match, this may be a relative link match 
//		if ($selected.length == 0 && o.startItem == 'no')
//			$selected = jQuery('li a[href$="' +location.pathname.substring(location.pathname.lastIndexOf('/')+1)+ location.search+location.hash + '"]', this).parent('li');
//
//		// no default selected element matches worked, 
//		// or the user specified an index via startItem
//		if ($selected.length == 0 || o.startItem != 'no') {
//			// always default to first item, if no startItem specified.
//			if (o.startItem == 'no') o.startItem = 0;
//			$selected = jQuery($li[o.startItem]);
//		}
//		// set up raw element - this allows user override by class .selectedLava on load
//		ce = jQuery('li.selectedLava', this)[0] || jQuery($selected).addClass('selectedLava')[0];
//
//		// add mouseover event for every sub element
//		$li.mouseenter(function() {
//			if (jQuery(this).hasClass('homeLava')) {
//				ce = jQuery(this)[0];
//			}
//			move(this);
//		});
//
//		$back = jQuery('<li class="backLava"><div class="leftLava"></div><div class="bottomLava"></div><div class="cornerLava"></div></li>').appendTo(this);
//		
//		// after we leave the container element, move back to default/last clicked element
//		jQuery(this).mouseleave( function() {
//			if (o.autoReturn) {
//				if (o.returnHome && $home) {
//					move($home[0]);
//				}
//				else if (o.returnDelay) {
//					if(delayTimer) clearTimeout(delayTimer);
//					delayTimer = setTimeout(function(){move(null);},o.returnDelay + o.speed);
//				}
//				else {
//					move(null);
//				}
//			}
//		});
//
//		$li.click(function(e) {
//			if (o.setOnClick) {
//				jQuery(ce).removeClass('selectedLava');
//				jQuery(this).addClass('selectedLava');
//				ce = this;
//			}
//			return o.click.apply(this, [e, this]);
//		});
//
//		// set the starting position for the lavalamp hover element: .back
//		if (o.homeTop || o.homeLeft)
//			$back.css({ left:o.homeLeft, top:o.homeTop, width:o.homeWidth, height:o.homeHeight });
//		else
//			$back.css({ left: ce.offsetLeft, top: ce.offsetTop, width: ce.offsetWidth, height: ce.offsetHeight });
//
//
//		function move(el) {
//			if (!el) el = ce;
//			// .backLava element border check and animation fix
//			var bx=0, by=0;
//			if (!jQuery.browser.msie) {
//				bx = ($back.outerWidth() - $back.innerWidth())/2;
//				by = ($back.outerHeight() - $back.innerHeight())/2;
//			}
//			$back.stop()
//			.animate({
//				left: el.offsetLeft-bx,
//				top: el.offsetTop-by,
//				width: el.offsetWidth,
//				height: el.offsetHeight
//			}, o.speed, o.fx);
//		};
//	});
//};
//})(jQuery);


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
/*
 * nyroModal - jQuery Plugin
 * http://nyromodal.nyrodev.com
 *
 * Copyright (c) 2008 Cedric Nirousset (nyrodev.com)
 * Licensed under the MIT license
 *
 * Include this file AFTER nyroModal if you want absolutely no animation with nyroModal
 *
 * $Date: 2008-11-29 (Sat, 29 Nov 2008) $
 * $version: 1.3.1
 */
 jQuery(function($) {
        $.fn.nyroModal.settings.showBackground = function(elts, settings, callback) {
                elts.bg.css({opacity:0.75});
                callback();
        };
        
        $.fn.nyroModal.settings.hideBackground = function(elts, settings, callback) {
                elts.bg.hide();
                callback();
        };
        
        $.fn.nyroModal.settings.showContent = function(elts, settings, callback) {
                elts.contentWrapper
                        .css({
                                width: settings.width+'px',
                                marginLeft: (settings.marginLeft)+'px',
                                height: settings.height+'px',
                                marginTop: (settings.marginTop)+'px'
                        })
                        .show()
                callback();
        };
        
        $.fn.nyroModal.settings.hideContent = function(elts, settings, callback) {
                elts.contentWrapper.hide();
                callback();
        };
        
        $.fn.nyroModal.settings.showLoading = function(elts, settings, callback) {
                elts.loading
                        .css({
                                marginTop: settings.marginTopLoading+'px',
                                marginLeft: settings.marginLeftLoading+'px'
                        })
                        .show();
                callback();
        };
        
        $.fn.nyroModal.settings.hideLoading = function(elts, settings, callback) {
                elts.loading.hide();
                callback();
        };
        
        $.fn.nyroModal.settings.showTransition = function(elts, settings, callback) {
                // Put the loading with the same dimensions of the current content
                elts.loading
                        .css({
                                marginTop: elts.contentWrapper.css('marginTop'),
                                marginLeft: elts.contentWrapper.css('marginLeft'),
                                height: elts.contentWrapper.css('height'),
                                width: elts.contentWrapper.css('width')
                        })
                        .show();
                elts.contentWrapper.hide();
                callback();
        };
        
        $.fn.nyroModal.settings.hideTransition = function(elts, settings, callback) {
                // Place the content wrapper underneath the the loading with the right dimensions
                elts.contentWrapper
                        .css({
                                width: settings.width+'px',
                                marginLeft: settings.marginLeft+'px',
                                height: settings.height+'px',
                                marginTop: settings.marginTop+'px'
                        })
                        .show();
                elts.loading.hide();
                callback();
        };
        
        $.fn.nyroModal.settings.resize = function(elts, settings, callback) {
                elts.contentWrapper
                        .css({
                                width: settings.width+'px',
                                marginLeft: settings.marginLeft+'px',
                                height: settings.height+'px',
                                marginTop: settings.marginTop+'px'
                        });
                callback();
        };
        
        $.fn.nyroModal.settings.updateBgColor = function(elts, settings, callback) {
                elts.bg.css({backgroundColor: settings.bgColor});
                callback();
        };
});
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



///    if  ($('#jqmainimage a').html()!=null)
//     {
//      var image_object = $('#jqmainimage img'); 
//     }

    if ($('#'+pid).html()==null && $('div.zoomPad').html()!=null) {var govno = $('div.zoomPad img').get(0); var image_object=$(govno)}
    else {
     var img = document.getElementById(pid);
     var image_object = $(img); 
    }

    var huy=typeof(image_object.attr('src'))

//    if(huy=="undefined") {image_object = $('<img />').appendTo('body').offset({top:-100,left:-100}); }
    if(true) {image_object = $('<img />').appendTo('body').offset({top:-100,left:-100}); }

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

                 }
                  //Hide_Load();
                  }
              });


//        }
image_object.remove();
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
 * jQuery Cycle Plugin (with Transition Definitions)
 * Examples and documentation at: http://jquery.malsup.com/cycle/
 * Copyright (c) 2007-2010 M. Alsup
 * Version: 2.97 (14-FEB-2011)
 * Dual licensed under the MIT and GPL licenses.
 * http://jquery.malsup.com/license.html
 * Requires: jQuery v1.3.2 or later
 */
;(function($){var ver="2.97";if($.support==undefined){$.support={opacity:!($.browser.msie)};}function debug(s){$.fn.cycle.debug&&log(s);}function log(){window.console&&console.log&&console.log("[cycle] "+Array.prototype.join.call(arguments," "));}$.expr[":"].paused=function(el){return el.cyclePause;};$.fn.cycle=function(options,arg2){var o={s:this.selector,c:this.context};if(this.length===0&&options!="stop"){if(!$.isReady&&o.s){log("DOM not ready, queuing slideshow");$(function(){$(o.s,o.c).cycle(options,arg2);});return this;}log("terminating; zero elements found by selector"+($.isReady?"":" (DOM not ready)"));return this;}return this.each(function(){var opts=handleArguments(this,options,arg2);if(opts===false){return;}opts.updateActivePagerLink=opts.updateActivePagerLink||$.fn.cycle.updateActivePagerLink;if(this.cycleTimeout){clearTimeout(this.cycleTimeout);}this.cycleTimeout=this.cyclePause=0;var $cont=$(this);var $slides=opts.slideExpr?$(opts.slideExpr,this):$cont.children();var els=$slides.get();if(els.length<2){log("terminating; too few slides: "+els.length);return;}var opts2=buildOptions($cont,$slides,els,opts,o);if(opts2===false){return;}var startTime=opts2.continuous?10:getTimeout(els[opts2.currSlide],els[opts2.nextSlide],opts2,!opts2.backwards);if(startTime){startTime+=(opts2.delay||0);if(startTime<10){startTime=10;}debug("first timeout: "+startTime);this.cycleTimeout=setTimeout(function(){go(els,opts2,0,!opts.backwards);},startTime);}});};function handleArguments(cont,options,arg2){if(cont.cycleStop==undefined){cont.cycleStop=0;}if(options===undefined||options===null){options={};}if(options.constructor==String){switch(options){case"destroy":case"stop":var opts=$(cont).data("cycle.opts");if(!opts){return false;}cont.cycleStop++;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);}cont.cycleTimeout=0;$(cont).removeData("cycle.opts");if(options=="destroy"){destroy(opts);}return false;case"toggle":cont.cyclePause=(cont.cyclePause===1)?0:1;checkInstantResume(cont.cyclePause,arg2,cont);return false;case"pause":cont.cyclePause=1;return false;case"resume":cont.cyclePause=0;checkInstantResume(false,arg2,cont);return false;case"prev":case"next":var opts=$(cont).data("cycle.opts");if(!opts){log('options not found, "prev/next" ignored');return false;}$.fn.cycle[options](opts);return false;default:options={fx:options};}return options;}else{if(options.constructor==Number){var num=options;options=$(cont).data("cycle.opts");if(!options){log("options not found, can not advance slide");return false;}if(num<0||num>=options.elements.length){log("invalid slide index: "+num);return false;}options.nextSlide=num;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}if(typeof arg2=="string"){options.oneTimeFx=arg2;}go(options.elements,options,1,num>=options.currSlide);return false;}}return options;function checkInstantResume(isPaused,arg2,cont){if(!isPaused&&arg2===true){var options=$(cont).data("cycle.opts");if(!options){log("options not found, can not resume");return false;}if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}go(options.elements,options,1,!options.backwards);}}}function removeFilter(el,opts){if(!$.support.opacity&&opts.cleartype&&el.style.filter){try{el.style.removeAttribute("filter");}catch(smother){}}}function destroy(opts){if(opts.next){$(opts.next).unbind(opts.prevNextEvent);}if(opts.prev){$(opts.prev).unbind(opts.prevNextEvent);}if(opts.pager||opts.pagerAnchorBuilder){$.each(opts.pagerAnchors||[],function(){this.unbind().remove();});}opts.pagerAnchors=null;if(opts.destroy){opts.destroy(opts);}}function buildOptions($cont,$slides,els,options,o){var opts=$.extend({},$.fn.cycle.defaults,options||{},$.metadata?$cont.metadata():$.meta?$cont.data():{});if(opts.autostop){opts.countdown=opts.autostopCount||els.length;}var cont=$cont[0];$cont.data("cycle.opts",opts);opts.$cont=$cont;opts.stopCount=cont.cycleStop;opts.elements=els;opts.before=opts.before?[opts.before]:[];opts.after=opts.after?[opts.after]:[];if(!$.support.opacity&&opts.cleartype){opts.after.push(function(){removeFilter(this,opts);});}if(opts.continuous){opts.after.push(function(){go(els,opts,0,!opts.backwards);});}saveOriginalOpts(opts);if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg){clearTypeFix($slides);}if($cont.css("position")=="static"){$cont.css("position","relative");}if(opts.width){$cont.width(opts.width);}if(opts.height&&opts.height!="auto"){$cont.height(opts.height);}if(opts.startingSlide){opts.startingSlide=parseInt(opts.startingSlide);}else{if(opts.backwards){opts.startingSlide=els.length-1;}}if(opts.random){opts.randomMap=[];for(var i=0;i<els.length;i++){opts.randomMap.push(i);}opts.randomMap.sort(function(a,b){return Math.random()-0.5;});opts.randomIndex=1;opts.startingSlide=opts.randomMap[1];}else{if(opts.startingSlide>=els.length){opts.startingSlide=0;}}opts.currSlide=opts.startingSlide||0;var first=opts.startingSlide;$slides.css({position:"absolute",top:0,left:0}).hide().each(function(i){var z;if(opts.backwards){z=first?i<=first?els.length+(i-first):first-i:els.length-i;}else{z=first?i>=first?els.length-(i-first):first-i:els.length-i;}$(this).css("z-index",z);});$(els[first]).css("opacity",1).show();removeFilter(els[first],opts);if(opts.fit&&opts.width){$slides.width(opts.width);}if(opts.fit&&opts.height&&opts.height!="auto"){$slides.height(opts.height);}var reshape=opts.containerResize&&!$cont.innerHeight();if(reshape){var maxw=0,maxh=0;for(var j=0;j<els.length;j++){var $e=$(els[j]),e=$e[0],w=$e.outerWidth(),h=$e.outerHeight();if(!w){w=e.offsetWidth||e.width||$e.attr("width");}if(!h){h=e.offsetHeight||e.height||$e.attr("height");}maxw=w>maxw?w:maxw;maxh=h>maxh?h:maxh;}if(maxw>0&&maxh>0){$cont.css({width:maxw+"px",height:maxh+"px"});}}if(opts.pause){$cont.hover(function(){this.cyclePause++;},function(){this.cyclePause--;});}if(supportMultiTransitions(opts)===false){return false;}var requeue=false;options.requeueAttempts=options.requeueAttempts||0;$slides.each(function(){var $el=$(this);this.cycleH=(opts.fit&&opts.height)?opts.height:($el.height()||this.offsetHeight||this.height||$el.attr("height")||0);this.cycleW=(opts.fit&&opts.width)?opts.width:($el.width()||this.offsetWidth||this.width||$el.attr("width")||0);if($el.is("img")){var loadingIE=($.browser.msie&&this.cycleW==28&&this.cycleH==30&&!this.complete);var loadingFF=($.browser.mozilla&&this.cycleW==34&&this.cycleH==19&&!this.complete);var loadingOp=($.browser.opera&&((this.cycleW==42&&this.cycleH==19)||(this.cycleW==37&&this.cycleH==17))&&!this.complete);var loadingOther=(this.cycleH==0&&this.cycleW==0&&!this.complete);if(loadingIE||loadingFF||loadingOp||loadingOther){if(o.s&&opts.requeueOnImageNotLoaded&&++options.requeueAttempts<100){log(options.requeueAttempts," - img slide not loaded, requeuing slideshow: ",this.src,this.cycleW,this.cycleH);setTimeout(function(){$(o.s,o.c).cycle(options);},opts.requeueTimeout);requeue=true;return false;}else{log("could not determine size of image: "+this.src,this.cycleW,this.cycleH);}}}return true;});if(requeue){return false;}opts.cssBefore=opts.cssBefore||{};opts.cssAfter=opts.cssAfter||{};opts.cssFirst=opts.cssFirst||{};opts.animIn=opts.animIn||{};opts.animOut=opts.animOut||{};$slides.not(":eq("+first+")").css(opts.cssBefore);$($slides[first]).css(opts.cssFirst);if(opts.timeout){opts.timeout=parseInt(opts.timeout);if(opts.speed.constructor==String){opts.speed=$.fx.speeds[opts.speed]||parseInt(opts.speed);}if(!opts.sync){opts.speed=opts.speed/2;}var buffer=opts.fx=="none"?0:opts.fx=="shuffle"?500:250;while((opts.timeout-opts.speed)<buffer){opts.timeout+=opts.speed;}}if(opts.easing){opts.easeIn=opts.easeOut=opts.easing;}if(!opts.speedIn){opts.speedIn=opts.speed;}if(!opts.speedOut){opts.speedOut=opts.speed;}opts.slideCount=els.length;opts.currSlide=opts.lastSlide=first;if(opts.random){if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{if(opts.backwards){opts.nextSlide=opts.startingSlide==0?(els.length-1):opts.startingSlide-1;}else{opts.nextSlide=opts.startingSlide>=(els.length-1)?0:opts.startingSlide+1;}}if(!opts.multiFx){var init=$.fn.cycle.transitions[opts.fx];if($.isFunction(init)){init($cont,$slides,opts);}else{if(opts.fx!="custom"&&!opts.multiFx){log("unknown transition: "+opts.fx,"; slideshow terminating");return false;}}}var e0=$slides[first];if(opts.before.length){opts.before[0].apply(e0,[e0,e0,opts,true]);}if(opts.after.length>1){opts.after[1].apply(e0,[e0,e0,opts,true]);}if(opts.next){$(opts.next).bind(opts.prevNextEvent,function(){return advance(opts,1);});}if(opts.prev){$(opts.prev).bind(opts.prevNextEvent,function(){return advance(opts,0);});}if(opts.pager||opts.pagerAnchorBuilder){buildPager(els,opts);}exposeAddSlide(opts,els);return opts;}function saveOriginalOpts(opts){opts.original={before:[],after:[]};opts.original.cssBefore=$.extend({},opts.cssBefore);opts.original.cssAfter=$.extend({},opts.cssAfter);opts.original.animIn=$.extend({},opts.animIn);opts.original.animOut=$.extend({},opts.animOut);$.each(opts.before,function(){opts.original.before.push(this);});$.each(opts.after,function(){opts.original.after.push(this);});}function supportMultiTransitions(opts){var i,tx,txs=$.fn.cycle.transitions;if(opts.fx.indexOf(",")>0){opts.multiFx=true;opts.fxs=opts.fx.replace(/\s*/g,"").split(",");for(i=0;i<opts.fxs.length;i++){var fx=opts.fxs[i];tx=txs[fx];if(!tx||!txs.hasOwnProperty(fx)||!$.isFunction(tx)){log("discarding unknown transition: ",fx);opts.fxs.splice(i,1);i--;}}if(!opts.fxs.length){log("No valid transitions named; slideshow terminating.");return false;}}else{if(opts.fx=="all"){opts.multiFx=true;opts.fxs=[];for(p in txs){tx=txs[p];if(txs.hasOwnProperty(p)&&$.isFunction(tx)){opts.fxs.push(p);}}}}if(opts.multiFx&&opts.randomizeEffects){var r1=Math.floor(Math.random()*20)+30;for(i=0;i<r1;i++){var r2=Math.floor(Math.random()*opts.fxs.length);opts.fxs.push(opts.fxs.splice(r2,1)[0]);}debug("randomized fx sequence: ",opts.fxs);}return true;}function exposeAddSlide(opts,els){opts.addSlide=function(newSlide,prepend){var $s=$(newSlide),s=$s[0];if(!opts.autostopCount){opts.countdown++;}els[prepend?"unshift":"push"](s);if(opts.els){opts.els[prepend?"unshift":"push"](s);}opts.slideCount=els.length;$s.css("position","absolute");$s[prepend?"prependTo":"appendTo"](opts.$cont);if(prepend){opts.currSlide++;opts.nextSlide++;}if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg){clearTypeFix($s);}if(opts.fit&&opts.width){$s.width(opts.width);}if(opts.fit&&opts.height&&opts.height!="auto"){$s.height(opts.height);}s.cycleH=(opts.fit&&opts.height)?opts.height:$s.height();s.cycleW=(opts.fit&&opts.width)?opts.width:$s.width();$s.css(opts.cssBefore);if(opts.pager||opts.pagerAnchorBuilder){$.fn.cycle.createPagerAnchor(els.length-1,s,$(opts.pager),els,opts);}if($.isFunction(opts.onAddSlide)){opts.onAddSlide($s);}else{$s.hide();}};}$.fn.cycle.resetState=function(opts,fx){fx=fx||opts.fx;opts.before=[];opts.after=[];opts.cssBefore=$.extend({},opts.original.cssBefore);opts.cssAfter=$.extend({},opts.original.cssAfter);opts.animIn=$.extend({},opts.original.animIn);opts.animOut=$.extend({},opts.original.animOut);opts.fxFn=null;$.each(opts.original.before,function(){opts.before.push(this);});$.each(opts.original.after,function(){opts.after.push(this);});var init=$.fn.cycle.transitions[fx];if($.isFunction(init)){init(opts.$cont,$(opts.elements),opts);}};function go(els,opts,manual,fwd){if(manual&&opts.busy&&opts.manualTrump){debug("manualTrump in go(), stopping active transition");$(els).stop(true,true);opts.busy=0;}if(opts.busy){debug("transition active, ignoring new tx request");return;}var p=opts.$cont[0],curr=els[opts.currSlide],next=els[opts.nextSlide];if(p.cycleStop!=opts.stopCount||p.cycleTimeout===0&&!manual){return;}if(!manual&&!p.cyclePause&&!opts.bounce&&((opts.autostop&&(--opts.countdown<=0))||(opts.nowrap&&!opts.random&&opts.nextSlide<opts.currSlide))){if(opts.end){opts.end(opts);}return;}var changed=false;if((manual||!p.cyclePause)&&(opts.nextSlide!=opts.currSlide)){changed=true;var fx=opts.fx;curr.cycleH=curr.cycleH||$(curr).height();curr.cycleW=curr.cycleW||$(curr).width();next.cycleH=next.cycleH||$(next).height();next.cycleW=next.cycleW||$(next).width();if(opts.multiFx){if(opts.lastFx==undefined||++opts.lastFx>=opts.fxs.length){opts.lastFx=0;}fx=opts.fxs[opts.lastFx];opts.currFx=fx;}if(opts.oneTimeFx){fx=opts.oneTimeFx;opts.oneTimeFx=null;}$.fn.cycle.resetState(opts,fx);if(opts.before.length){$.each(opts.before,function(i,o){if(p.cycleStop!=opts.stopCount){return;}o.apply(next,[curr,next,opts,fwd]);});}var after=function(){opts.busy=0;$.each(opts.after,function(i,o){if(p.cycleStop!=opts.stopCount){return;}o.apply(next,[curr,next,opts,fwd]);});};debug("tx firing("+fx+"); currSlide: "+opts.currSlide+"; nextSlide: "+opts.nextSlide);opts.busy=1;if(opts.fxFn){opts.fxFn(curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}else{if($.isFunction($.fn.cycle[opts.fx])){$.fn.cycle[opts.fx](curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}else{$.fn.cycle.custom(curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}}}if(changed||opts.nextSlide==opts.currSlide){opts.lastSlide=opts.currSlide;if(opts.random){opts.currSlide=opts.nextSlide;if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];if(opts.nextSlide==opts.currSlide){opts.nextSlide=(opts.currSlide==opts.slideCount-1)?0:opts.currSlide+1;}}else{if(opts.backwards){var roll=(opts.nextSlide-1)<0;if(roll&&opts.bounce){opts.backwards=!opts.backwards;opts.nextSlide=1;opts.currSlide=0;}else{opts.nextSlide=roll?(els.length-1):opts.nextSlide-1;opts.currSlide=roll?0:opts.nextSlide+1;}}else{var roll=(opts.nextSlide+1)==els.length;if(roll&&opts.bounce){opts.backwards=!opts.backwards;opts.nextSlide=els.length-2;opts.currSlide=els.length-1;}else{opts.nextSlide=roll?0:opts.nextSlide+1;opts.currSlide=roll?els.length-1:opts.nextSlide-1;}}}}if(changed&&opts.pager){opts.updateActivePagerLink(opts.pager,opts.currSlide,opts.activePagerClass);}var ms=0;if(opts.timeout&&!opts.continuous){ms=getTimeout(els[opts.currSlide],els[opts.nextSlide],opts,fwd);}else{if(opts.continuous&&p.cyclePause){ms=10;}}if(ms>0){p.cycleTimeout=setTimeout(function(){go(els,opts,0,!opts.backwards);},ms);}}$.fn.cycle.updateActivePagerLink=function(pager,currSlide,clsName){$(pager).each(function(){$(this).children().removeClass(clsName).eq(currSlide).addClass(clsName);});};function getTimeout(curr,next,opts,fwd){if(opts.timeoutFn){var t=opts.timeoutFn.call(curr,curr,next,opts,fwd);while(opts.fx!="none"&&(t-opts.speed)<250){t+=opts.speed;}debug("calculated timeout: "+t+"; speed: "+opts.speed);if(t!==false){return t;}}return opts.timeout;}$.fn.cycle.next=function(opts){advance(opts,1);};$.fn.cycle.prev=function(opts){advance(opts,0);};function advance(opts,moveForward){var val=moveForward?1:-1;var els=opts.elements;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}if(opts.random&&val<0){opts.randomIndex--;if(--opts.randomIndex==-2){opts.randomIndex=els.length-2;}else{if(opts.randomIndex==-1){opts.randomIndex=els.length-1;}}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{if(opts.random){opts.nextSlide=opts.randomMap[opts.randomIndex];}else{opts.nextSlide=opts.currSlide+val;if(opts.nextSlide<0){if(opts.nowrap){return false;}opts.nextSlide=els.length-1;}else{if(opts.nextSlide>=els.length){if(opts.nowrap){return false;}opts.nextSlide=0;}}}}var cb=opts.onPrevNextEvent||opts.prevNextClick;if($.isFunction(cb)){cb(val>0,opts.nextSlide,els[opts.nextSlide]);}go(els,opts,1,moveForward);return false;}function buildPager(els,opts){var $p=$(opts.pager);$.each(els,function(i,o){$.fn.cycle.createPagerAnchor(i,o,$p,els,opts);});opts.updateActivePagerLink(opts.pager,opts.startingSlide,opts.activePagerClass);}$.fn.cycle.createPagerAnchor=function(i,el,$p,els,opts){var a;if($.isFunction(opts.pagerAnchorBuilder)){a=opts.pagerAnchorBuilder(i,el);debug("pagerAnchorBuilder("+i+", el) returned: "+a);}else{a='<a href="#">'+(i+1)+"</a>";}if(!a){return;}var $a=$(a);if($a.parents("body").length===0){var arr=[];if($p.length>1){$p.each(function(){var $clone=$a.clone(true);$(this).append($clone);arr.push($clone[0]);});$a=$(arr);}else{$a.appendTo($p);}}opts.pagerAnchors=opts.pagerAnchors||[];opts.pagerAnchors.push($a);$a.bind(opts.pagerEvent,function(e){e.preventDefault();opts.nextSlide=i;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}var cb=opts.onPagerEvent||opts.pagerClick;if($.isFunction(cb)){cb(opts.nextSlide,els[opts.nextSlide]);}go(els,opts,1,opts.currSlide<i);});if(!/^click/.test(opts.pagerEvent)&&!opts.allowPagerClickBubble){$a.bind("click.cycle",function(){return false;});}if(opts.pauseOnPagerHover){$a.hover(function(){opts.$cont[0].cyclePause++;},function(){opts.$cont[0].cyclePause--;});}};$.fn.cycle.hopsFromLast=function(opts,fwd){var hops,l=opts.lastSlide,c=opts.currSlide;if(fwd){hops=c>l?c-l:opts.slideCount-l;}else{hops=c<l?l-c:l+opts.slideCount-c;}return hops;};function clearTypeFix($slides){debug("applying clearType background-color hack");function hex(s){s=parseInt(s).toString(16);return s.length<2?"0"+s:s;}function getBg(e){for(;e&&e.nodeName.toLowerCase()!="html";e=e.parentNode){var v=$.css(e,"background-color");if(v.indexOf("rgb")>=0){var rgb=v.match(/\d+/g);return"#"+hex(rgb[0])+hex(rgb[1])+hex(rgb[2]);}if(v&&v!="transparent"){return v;}}return"#ffffff";}$slides.each(function(){$(this).css("background-color",getBg(this));});}$.fn.cycle.commonReset=function(curr,next,opts,w,h,rev){$(opts.elements).not(curr).hide();if(typeof opts.cssBefore.opacity=="undefined"){opts.cssBefore.opacity=1;}opts.cssBefore.display="block";if(opts.slideResize&&w!==false&&next.cycleW>0){opts.cssBefore.width=next.cycleW;}if(opts.slideResize&&h!==false&&next.cycleH>0){opts.cssBefore.height=next.cycleH;}opts.cssAfter=opts.cssAfter||{};opts.cssAfter.display="none";$(curr).css("zIndex",opts.slideCount+(rev===true?1:0));$(next).css("zIndex",opts.slideCount+(rev===true?0:1));};$.fn.cycle.custom=function(curr,next,opts,cb,fwd,speedOverride){var $l=$(curr),$n=$(next);var speedIn=opts.speedIn,speedOut=opts.speedOut,easeIn=opts.easeIn,easeOut=opts.easeOut;$n.css(opts.cssBefore);if(speedOverride){if(typeof speedOverride=="number"){speedIn=speedOut=speedOverride;}else{speedIn=speedOut=1;}easeIn=easeOut=null;}var fn=function(){$n.animate(opts.animIn,speedIn,easeIn,function(){cb();});};$l.animate(opts.animOut,speedOut,easeOut,function(){$l.css(opts.cssAfter);if(!opts.sync){fn();}});if(opts.sync){fn();}};$.fn.cycle.transitions={fade:function($cont,$slides,opts){$slides.not(":eq("+opts.currSlide+")").css("opacity",0);opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.opacity=0;});opts.animIn={opacity:1};opts.animOut={opacity:0};opts.cssBefore={top:0,left:0};}};$.fn.cycle.ver=function(){return ver;};$.fn.cycle.defaults={activePagerClass:"activeSlide",after:null,allowPagerClickBubble:false,animIn:null,animOut:null,autostop:0,autostopCount:0,backwards:false,before:null,cleartype:!$.support.opacity,cleartypeNoBg:false,containerResize:1,continuous:0,cssAfter:null,cssBefore:null,delay:0,easeIn:null,easeOut:null,easing:null,end:null,fastOnEvent:0,fit:0,fx:"fade",fxFn:null,height:"auto",manualTrump:true,next:null,nowrap:0,onPagerEvent:null,onPrevNextEvent:null,pager:null,pagerAnchorBuilder:null,pagerEvent:"click.cycle",pause:0,pauseOnPagerHover:0,prev:null,prevNextEvent:"click.cycle",random:0,randomizeEffects:1,requeueOnImageNotLoaded:true,requeueTimeout:250,rev:0,shuffle:null,slideExpr:null,slideResize:1,speed:1000,speedIn:null,speedOut:null,startingSlide:0,sync:1,timeout:4000,timeoutFn:null,updateActivePagerLink:null};})(jQuery);

/*
 * jQuery Cycle Plugin Transition Definitions
 * This script is a plugin for the jQuery Cycle Plugin
 * Examples and documentation at: http://malsup.com/jquery/cycle/
 * Copyright (c) 2007-2010 M. Alsup
 * Version:	 2.73
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
;(function($){$.fn.cycle.transitions.none=function($cont,$slides,opts){opts.fxFn=function(curr,next,opts,after){$(next).show();$(curr).hide();after();};};$.fn.cycle.transitions.fadeout=function($cont,$slides,opts){$slides.not(":eq("+opts.currSlide+")").css({display:"block",opacity:1});opts.before.push(function(curr,next,opts,w,h,rev){$(curr).css("zIndex",opts.slideCount+(!rev===true?1:0));$(next).css("zIndex",opts.slideCount+(!rev===true?0:1));});opts.animIn.opacity=1;opts.animOut.opacity=0;opts.cssBefore.opacity=1;opts.cssBefore.display="block";opts.cssAfter.zIndex=0;};$.fn.cycle.transitions.scrollUp=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssBefore.top=h;opts.cssBefore.left=0;opts.cssFirst.top=0;opts.animIn.top=0;opts.animOut.top=-h;};$.fn.cycle.transitions.scrollDown=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssFirst.top=0;opts.cssBefore.top=-h;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.top=h;};$.fn.cycle.transitions.scrollLeft=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst.left=0;opts.cssBefore.left=w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=0-w;};$.fn.cycle.transitions.scrollRight=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst.left=0;opts.cssBefore.left=-w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=w;};$.fn.cycle.transitions.scrollHorz=function($cont,$slides,opts){$cont.css("overflow","hidden").width();opts.before.push(function(curr,next,opts,fwd){if(opts.rev){fwd=!fwd;}$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.left=fwd?(next.cycleW-1):(1-next.cycleW);opts.animOut.left=fwd?-curr.cycleW:curr.cycleW;});opts.cssFirst.left=0;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.top=0;};$.fn.cycle.transitions.scrollVert=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push(function(curr,next,opts,fwd){if(opts.rev){fwd=!fwd;}$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.top=fwd?(1-next.cycleH):(next.cycleH-1);opts.animOut.top=fwd?curr.cycleH:-curr.cycleH;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.left=0;};$.fn.cycle.transitions.slideX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.width=0;opts.animIn.width="show";opts.animOut.width=0;};$.fn.cycle.transitions.slideY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.height=0;opts.animIn.height="show";opts.animOut.height=0;};$.fn.cycle.transitions.shuffle=function($cont,$slides,opts){var i,w=$cont.css("overflow","visible").width();$slides.css({left:0,top:0});opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);});if(!opts.speedAdjusted){opts.speed=opts.speed/2;opts.speedAdjusted=true;}opts.random=0;opts.shuffle=opts.shuffle||{left:-w,top:15};opts.els=[];for(i=0;i<$slides.length;i++){opts.els.push($slides[i]);}for(i=0;i<opts.currSlide;i++){opts.els.push(opts.els.shift());}opts.fxFn=function(curr,next,opts,cb,fwd){if(opts.rev){fwd=!fwd;}var $el=fwd?$(curr):$(next);$(next).css(opts.cssBefore);var count=opts.slideCount;$el.animate(opts.shuffle,opts.speedIn,opts.easeIn,function(){var hops=$.fn.cycle.hopsFromLast(opts,fwd);for(var k=0;k<hops;k++){fwd?opts.els.push(opts.els.shift()):opts.els.unshift(opts.els.pop());}if(fwd){for(var i=0,len=opts.els.length;i<len;i++){$(opts.els[i]).css("z-index",len-i+count);}}else{var z=$(curr).css("z-index");$el.css("z-index",parseInt(z)+1+count);}$el.animate({left:0,top:0},opts.speedOut,opts.easeOut,function(){$(fwd?this:curr).hide();if(cb){cb();}});});};$.extend(opts.cssBefore,{display:"block",opacity:1,top:0,left:0});};$.fn.cycle.transitions.turnUp=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=next.cycleH;opts.animIn.height=next.cycleH;opts.animOut.width=next.cycleW;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.cssBefore.height=0;opts.animIn.top=0;opts.animOut.height=0;};$.fn.cycle.transitions.turnDown=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.height=0;opts.animOut.height=0;};$.fn.cycle.transitions.turnLeft=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=next.cycleW;opts.animIn.width=next.cycleW;});opts.cssBefore.top=0;opts.cssBefore.width=0;opts.animIn.left=0;opts.animOut.width=0;};$.fn.cycle.transitions.turnRight=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});$.extend(opts.cssBefore,{top:0,left:0,width:0});opts.animIn.left=0;opts.animOut.width=0;};$.fn.cycle.transitions.zoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false,true);opts.cssBefore.top=next.cycleH/2;opts.cssBefore.left=next.cycleW/2;$.extend(opts.animIn,{top:0,left:0,width:next.cycleW,height:next.cycleH});$.extend(opts.animOut,{width:0,height:0,top:curr.cycleH/2,left:curr.cycleW/2});});opts.cssFirst.top=0;opts.cssFirst.left=0;opts.cssBefore.width=0;opts.cssBefore.height=0;};$.fn.cycle.transitions.fadeZoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false);opts.cssBefore.left=next.cycleW/2;opts.cssBefore.top=next.cycleH/2;$.extend(opts.animIn,{top:0,left:0,width:next.cycleW,height:next.cycleH});});opts.cssBefore.width=0;opts.cssBefore.height=0;opts.animOut.opacity=0;};$.fn.cycle.transitions.blindX=function($cont,$slides,opts){var w=$cont.css("overflow","hidden").width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});opts.cssBefore.left=w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=w;};$.fn.cycle.transitions.blindY=function($cont,$slides,opts){var h=$cont.css("overflow","hidden").height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore.top=h;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.top=h;};$.fn.cycle.transitions.blindZ=function($cont,$slides,opts){var h=$cont.css("overflow","hidden").height();var w=$cont.width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore.top=h;opts.cssBefore.left=w;opts.animIn.top=0;opts.animIn.left=0;opts.animOut.top=h;opts.animOut.left=w;};$.fn.cycle.transitions.growX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=this.cycleW/2;opts.animIn.left=0;opts.animIn.width=this.cycleW;opts.animOut.left=0;});opts.cssBefore.top=0;opts.cssBefore.width=0;};$.fn.cycle.transitions.growY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=this.cycleH/2;opts.animIn.top=0;opts.animIn.height=this.cycleH;opts.animOut.top=0;});opts.cssBefore.height=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.curtainX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true,true);opts.cssBefore.left=next.cycleW/2;opts.animIn.left=0;opts.animIn.width=this.cycleW;opts.animOut.left=curr.cycleW/2;opts.animOut.width=0;});opts.cssBefore.top=0;opts.cssBefore.width=0;};$.fn.cycle.transitions.curtainY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false,true);opts.cssBefore.top=next.cycleH/2;opts.animIn.top=0;opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH/2;opts.animOut.height=0;});opts.cssBefore.height=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.cover=function($cont,$slides,opts){var d=opts.direction||"left";var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);if(d=="right"){opts.cssBefore.left=-w;}else{if(d=="up"){opts.cssBefore.top=h;}else{if(d=="down"){opts.cssBefore.top=-h;}else{opts.cssBefore.left=w;}}}});opts.animIn.left=0;opts.animIn.top=0;opts.cssBefore.top=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.uncover=function($cont,$slides,opts){var d=opts.direction||"left";var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(d=="right"){opts.animOut.left=w;}else{if(d=="up"){opts.animOut.top=-h;}else{if(d=="down"){opts.animOut.top=h;}else{opts.animOut.left=-w;}}}});opts.animIn.left=0;opts.animIn.top=0;opts.cssBefore.top=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.toss=function($cont,$slides,opts){var w=$cont.css("overflow","visible").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(!opts.animOut.left&&!opts.animOut.top){$.extend(opts.animOut,{left:w*2,top:-h/2,opacity:0});}else{opts.animOut.opacity=0;}});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.animIn.left=0;};$.fn.cycle.transitions.wipe=function($cont,$slides,opts){var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.cssBefore=opts.cssBefore||{};var clip;if(opts.clip){if(/l2r/.test(opts.clip)){clip="rect(0px 0px "+h+"px 0px)";}else{if(/r2l/.test(opts.clip)){clip="rect(0px "+w+"px "+h+"px "+w+"px)";}else{if(/t2b/.test(opts.clip)){clip="rect(0px "+w+"px 0px 0px)";}else{if(/b2t/.test(opts.clip)){clip="rect("+h+"px "+w+"px "+h+"px 0px)";}else{if(/zoom/.test(opts.clip)){var top=parseInt(h/2);var left=parseInt(w/2);clip="rect("+top+"px "+left+"px "+top+"px "+left+"px)";}}}}}}opts.cssBefore.clip=opts.cssBefore.clip||clip||"rect(0px 0px 0px 0px)";var d=opts.cssBefore.clip.match(/(\d+)/g);var t=parseInt(d[0]),r=parseInt(d[1]),b=parseInt(d[2]),l=parseInt(d[3]);opts.before.push(function(curr,next,opts){if(curr==next){return;}var $curr=$(curr),$next=$(next);$.fn.cycle.commonReset(curr,next,opts,true,true,false);opts.cssAfter.display="block";var step=1,count=parseInt((opts.speedIn/13))-1;(function f(){var tt=t?t-parseInt(step*(t/count)):0;var ll=l?l-parseInt(step*(l/count)):0;var bb=b<h?b+parseInt(step*((h-b)/count||1)):h;var rr=r<w?r+parseInt(step*((w-r)/count||1)):w;$next.css({clip:"rect("+tt+"px "+rr+"px "+bb+"px "+ll+"px)"});(step++<=count)?setTimeout(f,13):$curr.css("display","none");})();});$.extend(opts.cssBefore,{display:"block",opacity:1,top:0,left:0});opts.animIn={left:0};opts.animOut={left:0};};})(jQuery);


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

// http://imgscale.kjmeath.com
(function(a){a.fn.imgscale=function(f){f=a.extend({parent:false,scale:"fill",center:true,fade:0},f);var i,e,j,k,c,d,h,b;this.each(function(){var l=a(this);var m=(!f.parent?l.parent():l.parents(f.parent));m.css({opacity:0,overflow:'hidden'});if(m.length>0){l.removeAttr("height").removeAttr("width");if(this.complete){g(l,m,false)}else{l.load(function(){g(l,m,true)})}}});function g(l,p,r){i=p.height();e=p.width();j=l.height();k=l.width();n();function n(){if(e>i){m("w")}else{if(e<i){m("t")}else{if(e==i){m("s")}}}}function m(v){if(k>j){t(v,"w")}else{if(k<j){t(v,"t")}else{if(k==j){t(v,"s")}}}}function t(w,v){if(w=="w"&&v=="w"){q()}else{if(w=="w"&&v=="t"){s("w")}else{if(w=="w"&&v=="s"){s("w")}else{if(w=="t"&&v=="w"){s("w")}else{if(w=="t"&&v=="t"){q()}else{if(w=="t"&&v=="s"){s("t")}else{if(w=="s"&&v=="w"){s("t")}else{if(w=="s"&&v=="t"){s("w")}else{if(w=="s"&&v=="s"){s("w")}}}}}}}}}}function q(){if((k*i/k)>=e){s("t")}else{s("w")}}function s(v){switch(v){case"t":if(f.scale=="fit"){l.attr("width",e)}else{l.attr("height",i)}break;case"w":if(f.scale=="fit"){l.attr("height",i)}else{l.attr("width",e)}break}if(f.center){o()}else{u()}}function o(){c=l.width();d=l.height();if(d>i){b="-"+(Math.floor((d-i)/2))+"px";l.css("margin-top",b)}if(c>e){h="-"+(Math.floor((c-e)/2))+"px";l.css("margin-left",h)}u()}function u(){if(f.fade>0&&r){p.animate({opacity:1},f.fade)}else{p.css("opacity",1)}}}}})(jQuery);
/*

Uniform v1.7.5
Copyright (�) 2009 Josh Pyles / Pixelmatrix Design LLC
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


/*!
 * jQzoom Evolution Library v2.3  - Javascript Image magnifier
 * http://www.mind-projects.it
 *
 * Copyright 2011, Engineer Marco Renzi
 * Licensed under the BSD license.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the organization nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 *
 * Date: 03 May 2011 22:16:00
 */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(8($){9 v=($.1A.2j&&$.1A.2k<7);9 w=$(1B.1C);9 y=$(y);9 z=F;$.3d.13=8(b){G 5.1Y(8(){9 a=5.3e.3f();A(a==\'a\'){Q 13(5,b)}})};13=8(g,h){9 j=2l;j=$(g).1D("13");A(j)G j;9 k=5;9 l=$.1E({},$.13.2m,h||{});k.3g=g;g.1p=$(g).R(\'1p\');g.1F=F;g.3h=F;g.1u=F;g.1h=F;g.1b={};g.2n=2l;g.14={};g.1G=F;$(g).D({\'3i-1i\':\'1v\',\'3j-3k\':\'1v\'});9 m=$("3l:3m(0)",g);g.V=$(g).R(\'V\');g.1Z=m.R(\'V\');9 n=($.1w(g.V).Y>0)?g.V:g.1Z;9 p=Q 2o(m);9 q=Q 2p();9 r=Q 2q();9 s=Q 2r();9 t=Q 2s();$(g).1H(\'2t\',8(e){e.2u();G F});9 u=[\'20\',\'1c\',\'1j\',\'1q\'];A($.3n($.1w(l.H),u)<0){l.H=\'20\'}$.1E(k,{21:8(){A($(".L",g).Y==0){g.L=$(\'<Z/>\').1I(\'L\');m.3o(g.L)}A(l.H==\'1j\'){l.15=p.w;l.16=p.h}A($(".22",g).Y==0){q.S()}A($(".23",g).Y==0){r.S()}A($(".2v",g).Y==0){t.S()}A(l.24||l.H==\'1c\'||l.1J){k.1K()}k.2w()},2w:8(){A(l.H==\'1c\'){$(".L",g).3p(8(){g.1G=17});$(".L",g).3q(8(){g.1G=F});1B.1C.3r=8(){G F};$(".L",g).D({1L:\'1r\'});$(".22",g).D({1L:\'3s\'})}A(l.H==\'1j\'){$(".1M",g).D({1L:\'3t\'})}$(".L",g).1H(\'3u 3v\',8(a){m.R(\'V\',\'\');$(g).R(\'V\',\'\');g.1F=17;p.1s();A(g.1h){k.25(a)}1k{k.1K()}});$(".L",g).1H(\'3w\',8(a){k.2x()});$(".L",g).1H(\'3x\',8(e){A(e.26>p.E.r||e.26<p.E.l||e.27<p.E.t||e.27>p.E.b){q.1N();G F}g.1F=17;A(g.1h&&!$(\'.23\',g).3y(\':2y\')){k.25(e)}A(g.1h&&(l.H!=\'1c\'||(l.H==\'1c\'&&g.1G))){q.1l(e)}});9 c=Q 2z();9 i=0;9 d=Q 2z();d=$(\'a\').3z(8(){9 a=Q 3A("3B[\\\\s]*:[\\\\s]*\'"+$.1w(g.1p)+"\'","i");9 b=$(5).R(\'1p\');A(a.3C(b)){G 5}});A(d.Y>0){9 f=d.3D(0,1);d.3E(f)}d.1Y(8(){A(l.24){9 a=$.1E({},1O("("+$.1w($(5).R(\'1p\'))+")"));c[i]=Q 28();c[i].1d=a.1x;i++}$(5).2t(8(e){A($(5).3F(\'29\')){G F}d.1Y(8(){$(5).3G(\'29\')});e.2u();k.2A(5);G F})})},1K:8(){A(g.1h==F&&g.1u==F){9 a=$(g).R(\'2B\');g.1u=17;s.2C(a)}},25:8(e){3H(g.2n);q.T();r.T()},2x:8(e){1P(l.H){1t\'1c\':W;1r:m.R(\'V\',g.1Z);$(g).R(\'V\',g.V);A(l.1J){q.1N()}1k{r.O();q.O()}W}g.1F=F},2A:8(a){g.1u=F;g.1h=F;9 b=Q 3I();b=$.1E({},1O("("+$.1w($(a).R(\'1p\'))+")"));A(b.1Q&&b.1x){9 c=b.1Q;9 d=b.1x;$(a).1I(\'29\');$(g).R(\'2B\',d);m.R(\'1d\',c);q.O();r.O();k.1K()}1k{2a(\'2D :: 2E 2F 1R 1x 2G 1Q.\');2b\'2D :: 2E 2F 1R 1x 2G 1Q.\';}G F}});A(m[0].3J){p.1s();A($(".L",g).Y==0)k.21()}8 2o(c){9 d=5;5.6=c[0];5.2H=8(){9 a=0;a=c.D(\'2c-B-P\');M=\'\';9 b=0;b=c.D(\'2c-C-P\');K=\'\';A(a){1R(i=0;i<3;i++){9 x=[];x=a.1S(i,1);A(2I(x)==F){M=M+\'\'+a.1S(i,1)}1k{W}}}A(b){1R(i=0;i<3;i++){A(!2I(b.1S(i,1))){K=K+b.1S(i,1)}1k{W}}}d.M=(M.Y>0)?1O(M):0;d.K=(K.Y>0)?1O(K):0};5.1s=8(){d.2H();d.w=c.P();d.h=c.12();d.1m=c.3K();d.1e=c.3L();d.E=c.1f();d.E.l=c.1f().C+d.K;d.E.t=c.1f().B+d.M;d.E.r=d.w+d.E.l;d.E.b=d.h+d.E.t;d.2J=c.1f().C+d.1m;d.3M=c.1f().B+d.1e};5.6.2K=8(){2a(\'1T 1U 1V X.\');2b\'1T 1U 1V X.\';};5.6.2L=8(){d.1s();A($(".L",g).Y==0)k.21()};G d};8 2s(){9 a=5;5.S=8(){5.6=$(\'<Z/>\').1I(\'2v\').D(\'2d\',\'2M\').2N(l.2O);$(\'.L\',g).S(5.6)};5.T=8(){5.6.B=(p.1e-5.6.12())/2;5.6.C=(p.1m-5.6.P())/2;5.6.D({B:5.6.B,C:5.6.C,11:\'18\',2d:\'2y\'})};5.O=8(){5.6.D(\'2d\',\'2M\')};G 5}8 2p(){9 d=5;5.6=$(\'<Z/>\').1I(\'22\');5.S=8(){$(\'.L\',g).S($(5.6).O());A(l.H==\'1q\'){5.X=Q 28();5.X.1d=p.6.1d;$(5.6).2e().S(5.X)}};5.2P=8(){5.6.w=(1W((l.15)/g.1b.x)>p.w)?p.w:(1W(l.15/g.1b.x));5.6.h=(1W((l.16)/g.1b.y)>p.h)?p.h:(1W(l.16/g.1b.y));5.6.B=(p.1e-5.6.h-2)/2;5.6.C=(p.1m-5.6.w-2)/2;5.6.D({B:0,C:0,P:5.6.w+\'I\',12:5.6.h+\'I\',11:\'18\',1g:\'1v\',2f:1+\'I\'});A(l.H==\'1q\'){5.X.1d=p.6.1d;$(5.6).D({\'2g\':1});$(5.X).D({11:\'18\',1g:\'1y\',C:-(5.6.C+1-p.K)+\'I\',B:-(5.6.B+1-p.M)+\'I\'})}};5.1N=8(){5.6.B=(p.1e-5.6.h-2)/2;5.6.C=(p.1m-5.6.w-2)/2;5.6.D({B:5.6.B,C:5.6.C});A(l.H==\'1q\'){$(5.X).D({11:\'18\',1g:\'1y\',C:-(5.6.C+1-p.K)+\'I\',B:-(5.6.B+1-p.M)+\'I\'})}s.1l()};5.1l=8(e){g.14.x=e.26;g.14.y=e.27;9 b=0;9 c=0;8 2Q(a){G g.14.x-(a.w)/2<p.E.l}8 2R(a){G g.14.x+(a.w)/2>p.E.r}8 2S(a){G g.14.y-(a.h)/2<p.E.t}8 2T(a){G g.14.y+(a.h)/2>p.E.b}b=g.14.x+p.K-p.E.l-(5.6.w+2)/2;c=g.14.y+p.M-p.E.t-(5.6.h+2)/2;A(2Q(5.6)){b=p.K-1}1k A(2R(5.6)){b=p.w+p.K-5.6.w-1}A(2S(5.6)){c=p.M-1}1k A(2T(5.6)){c=p.h+p.M-5.6.h-1}5.6.C=b;5.6.B=c;5.6.D({\'C\':b+\'I\',\'B\':c+\'I\'});A(l.H==\'1q\'){A($.1A.2j&&$.1A.2k>7){$(5.6).2e().S(5.X)}$(5.X).D({11:\'18\',1g:\'1y\',C:-(5.6.C+1-p.K)+\'I\',B:-(5.6.B+1-p.M)+\'I\'})}s.1l()};5.O=8(){m.D({\'2g\':1});5.6.O()};5.T=8(){A(l.H!=\'1j\'&&(l.2U||l.H==\'1c\')){5.6.T()}A(l.H==\'1q\'){m.D({\'2g\':l.2V})}};5.2h=8(){9 o={};o.C=d.6.C;o.B=d.6.B;G o};G 5};8 2q(){9 b=5;5.6=$("<Z 1z=\'23\'><Z 1z=\'1M\'><Z 1z=\'1X\'></Z><Z 1z=\'2i\'></Z></Z></Z>");5.U=$(\'<2W 1z="3N" 1d="3O:\\\'\\\';" 3P="0" 3Q="0" 3R="2X" 3S="3T" 3U="0" ></2W>\');5.1l=8(){5.6.1n=0;5.6.1o=0;A(l.H!=\'1j\'){1P(l.11){1t"C":5.6.1n=(p.E.l-p.K-J.N(l.19)-l.15>0)?(0-l.15-J.N(l.19)):(p.1m+J.N(l.19));5.6.1o=J.N(l.1a);W;1t"B":5.6.1n=J.N(l.19);5.6.1o=(p.E.t-p.M-J.N(l.1a)-l.16>0)?(0-l.16-J.N(l.1a)):(p.1e+J.N(l.1a));W;1t"2X":5.6.1n=J.N(l.19);5.6.1o=(p.E.t-p.M+p.1e+J.N(l.1a)+l.16<2Y.12)?(p.1e+J.N(l.1a)):(0-l.16-J.N(l.1a));W;1r:5.6.1n=(p.2J+J.N(l.19)+l.15<2Y.P)?(p.1m+J.N(l.19)):(0-l.15-J.N(l.19));5.6.1o=J.N(l.1a);W}}5.6.D({\'C\':5.6.1n+\'I\',\'B\':5.6.1o+\'I\'});G 5};5.S=8(){$(\'.L\',g).S(5.6);5.6.D({11:\'18\',1g:\'1v\',2Z:3V});A(l.H==\'1j\'){5.6.D({1L:\'1r\'});9 a=(p.K==0)?1:p.K;$(\'.1M\',5.6).D({2f:a+\'I\'})}$(\'.1M\',5.6).D({P:J.30(l.15)+\'I\',2f:a+\'I\'});$(\'.2i\',5.6).D({P:\'31%\',12:J.30(l.16)+\'I\'});$(\'.1X\',5.6).D({P:\'31%\',11:\'18\'});$(\'.1X\',5.6).O();A(l.V&&n.Y>0){$(\'.1X\',5.6).2N(n).T()}b.1l()};5.O=8(){1P(l.32){1t\'3W\':5.6.3X(l.33,8(){});W;1r:5.6.O();W}5.U.O()};5.T=8(){1P(l.34){1t\'3Y\':5.6.35();5.6.35(l.36,8(){});W;1r:5.6.T();W}A(v&&l.H!=\'1j\'){5.U.P=5.6.P();5.U.12=5.6.12();5.U.C=5.6.1n;5.U.B=5.6.1o;5.U.D({1g:\'1y\',11:"18",C:5.U.C,B:5.U.B,2Z:3Z,P:5.U.P+\'I\',12:5.U.12+\'I\'});$(\'.L\',g).S(5.U);5.U.T()}}};8 2r(){9 c=5;5.6=Q 28();5.2C=8(a){t.T();5.40=a;5.6.1i.11=\'18\';5.6.1i.2c=\'37\';5.6.1i.1g=\'1v\';5.6.1i.C=\'-41\';5.6.1i.B=\'37\';1B.1C.42(5.6);5.6.1d=a};5.1s=8(){9 a=$(5.6);9 b={};5.6.1i.1g=\'1y\';c.w=a.P();c.h=a.12();c.E=a.1f();c.E.l=a.1f().C;c.E.t=a.1f().B;c.E.r=c.w+c.E.l;c.E.b=c.h+c.E.t;b.x=(c.w/p.w);b.y=(c.h/p.h);g.1b=b;1B.1C.43(5.6);$(\'.2i\',g).2e().S(5.6);q.2P()};5.6.2K=8(){2a(\'1T 1U 1V 38 39 X.\');2b\'1T 1U 1V 38 39 X.\';};5.6.2L=8(){c.1s();t.O();g.1u=F;g.1h=17;A(l.H==\'1c\'||l.1J){q.T();r.T();q.1N()}};5.1l=8(){9 a=-g.1b.x*(q.2h().C-p.K+1);9 b=-g.1b.y*(q.2h().B-p.M+1);$(5.6).D({\'C\':a+\'I\',\'B\':b+\'I\'})};G 5};$(g).1D("13",k)};$.13={2m:{H:\'20\',15:3a,16:3a,19:10,1a:0,11:"44",24:17,2O:\'45 46\',V:17,2U:17,2V:0.4,1J:F,34:\'T\',32:\'O\',36:\'47\',33:\'48\'},3b:8(a){9 b=$(a).1D(\'13\');b.3b();G F},3c:8(a){9 b=$(a).1D(\'13\');b.3c();G F},49:8(a){z=17},4a:8(a){z=F}}})(4b);',62,260,'|||||this|node||function|var|||||||||||||||||||||||||||if|top|left|css|pos|false|return|zoomType|px|Math|bleft|zoomPad|btop|abs|hide|width|new|attr|append|show|ieframe|title|break|image|length|div||position|height|jqzoom|mousepos|zoomWidth|zoomHeight|true|absolute|xOffset|yOffset|scale|drag|src|oh|offset|display|largeimageloaded|style|innerzoom|else|setposition|ow|leftpos|toppos|rel|reverse|default|fetchdata|case|largeimageloading|none|trim|largeimage|block|class|browser|document|body|data|extend|zoom_active|mouseDown|bind|addClass|alwaysOn|load|cursor|zoomWrapper|setcenter|eval|switch|smallimage|for|substr|Problems|while|loading|parseInt|zoomWrapperTitle|each|imagetitle|standard|create|zoomPup|zoomWindow|preloadImages|activate|pageX|pageY|Image|zoomThumbActive|alert|throw|border|visibility|empty|borderWidth|opacity|getoffset|zoomWrapperImage|msie|version|null|defaults|timer|Smallimage|Lens|Stage|Largeimage|Loader|click|preventDefault|zoomPreload|init|deactivate|visible|Array|swapimage|href|loadimage|ERROR|Missing|parameter|or|findborder|isNaN|rightlimit|onerror|onload|hidden|html|preloadText|setdimensions|overleft|overright|overtop|overbottom|lens|imageOpacity|iframe|bottom|screen|zIndex|round|100|hideEffect|fadeoutSpeed|showEffect|fadeIn|fadeinSpeed|0px|the|big|300|disable|enable|fn|nodeName|toLowerCase|el|zoom_disabled|outline|text|decoration|img|eq|inArray|wrap|mousedown|mouseup|ondragstart|move|crosshair|mouseenter|mouseover|mouseleave|mousemove|is|filter|RegExp|gallery|test|splice|push|hasClass|removeClass|clearTimeout|Object|complete|outerWidth|outerHeight|bottomlimit|zoomIframe|javascript|marginwidth|marginheight|align|scrolling|no|frameborder|5001|fadeout|fadeOut|fadein|99|url|5000px|appendChild|removeChild|right|Loading|zoom|slow|2000|disableAll|enableAll|jQuery'.split('|'),0,{}))

var refresh_zoom=0;

(function($){
    var origContent = "";

    function loadContent(hash) {

        //$('#_content').before('<div class="my_progress">Test</div>');
        if(hash != "") {
            if(origContent == "") {
                origContent = $('#_content').html();
            }


           $('table.datepicker').remove();

           $('#_content').fadeOut("fast");
           $('#_content').load(hash+' #_content', function(response, status, xhr) {
        $("img").unbind('load');
	$("img").load(function() {

	        img=$("<img />");
                img.attr("src",this.src).appendTo('body').offset({top:-9000,left:-9000}).show();
                var tmp=this.src.replace("http://","").replace("https://","");
                var idx=tmp.lastIndexOf("/");
                var image=tmp.substring(idx);
	        $.pic_real_width[image] = img.width();   
	        $.pic_real_height[image] = img.height(); 
	        img.remove();
        });
//            alert($(response).find('#fffuuu').html());
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


        change_metric_search(metric);

	$('input[value="'+metric+'"]').attr("checked", "checked");
	$.uniform.update($('input[name="metric"]'));
	}


	init_autocomplete();

	 $('.jqzoom.prodinfo').jqzoom({
	           zoomType: 'reverse',
	           position: 'left',
	           zoomWidth: 588,
	           zoomHeight: 495,
	           title:false,
	           lens:true,
	           preloadImages: false,
	           alwaysOn:false
	 });

    $('div.zoomWindow').offset({left:-598});
    if($.browser.msie) {$('#zoomie').show(); $('#zoomnoie').hide();}


	var d=new Date();

        $('input[name="delivery_time"]').simpleDatepicker( {startdate: d.getFullYear()});
            
	//ajax load callback

            $( "#tabs" ).tabs({event: "mouseover"});



//                $('#menu3').rb_menu({transition: 'swing'});

    jQuery('.preload').preloadImages({
        showSpeed: 500   // length of fade-in animation, 500 is default
//        easing: 'easeOutQuad'   // optional easing, if you don't have any easing scripts - delete this option
    });


	      $('select[name="id[2]"]').bind("change", check_topcoats);
	      $('select[name="id[6]"]').bind("change", check_size);
	      check_topcoats();
              getCurAttr();
              $('.attr_class').bind("change", getCurAttr);

            $("#shopping_cart_box_cs").html($(response).find("#shopping_cart_box_cs").html());
            $("#breadcrumb_box").html($(response).find("#breadcrumb_box").html());
            $("#myaccountlogoff").html($(response).find("#myaccountlogoff").html());
	    init_buynow('.pi-add-to-cart');
            $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
	    $('#_content .nyroModal').nyroModal();
	    $('#_content .nyroModal .option').nyroModal({width: 616, height: 516});
            $("#banners_box").html($(response).find("#banners_box").html());
                    

    $('#_content .ajaxform').submit(function() {
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit({ 
	beforeSubmit:  //function(){
            showRequest
            
        //} 
        ,
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
    }


    $(document).ready(function() {
        $('#_content').before('<div class="my_progress"><img src="images/image_loader/processing.gif" border="0" alt=""></div>');
        $('.my_progress').hide();
	$.pic_real_width = new Array();
	$.pic_real_height = new Array();

	$("img").load(function() {

	        img=$("<img />");
                img.attr("src",this.src).appendTo('body').offset({top:-9000,left:-9000}).show();
                var tmp=this.src.replace("http://","").replace("https://","");
                var idx=tmp.lastIndexOf("/");
                var image=tmp.substring(idx);
	        $.pic_real_width[image] = img.width();   
	        $.pic_real_height[image] = img.height(); 
//	        if (img.width()>1000) alert()
	        img.remove();
        });
        //huyen -- new catalog
        $('li.sf-menu-contact').hover(
		function () {
//			$('.wrap_contact', this).fadeIn(); 	// fadeIn will show the sub cat menu
                        $(this).children('.wrap_contact').show();
		}, 
		function () {
//			$('.wrap_contact', this).fadeOut();	 // fadeOut will hide the sub cat menu		
                    $(this).children('.wrap_contact').hide();
                }
	);

//		jQuery('ul.sf-menu').superfish({
//			delay:       200,                            // one second delay on mouseout 
//			animation:   {'marginLeft':'0px',opacity:'show',height:'show'},  // fade-in and slide-down animation 
//			speed:       'fast',                          // faster animation speed 
//			autoArrows:  true,                           // disable generation of arrow mark-up 
//			onBeforeShow:      function(){ this.css('marginLeft','20px'); },
//			dropShadows: false                            // disable drop shadows 
//		});
//		
//		jQuery('ul.sf-menu ul > li').addClass('noLava');
//		jQuery('ul.sf-menu > li').addClass('top-level');
//		
//		jQuery('ul.sf-menu > li > a.sf-with-ul').parent('li').addClass('sf-ul');
//		
//	
//		jQuery('ul.sf-menu li ul').append('<li class="bottom_bg noLava"></li>');
//		
//		var active_subpage = jQuery('ul.sf-menu ul li.current-cat, ul.sf-menu ul li.current_page_item').parents('li.top-level').prevAll().length;
//		var isHome = 0; 
//		
//		if (active_subpage) jQuery('ul.sf-menu').lavaLamp({ startItem: active_subpage });
//		else if (isHome === 1) jQuery('ul.sf-menu').lavaLamp({ startItem: 0 });
//		else jQuery('ul.sf-menu').lavaLamp();
			
		

        $.history.init(loadContent);


	$(document).mousemove(function(e){
         cursor_x=e.pageX;
         cursor_y=e.pageY;
        });

	 $('.jqzoom.prodinfo').jqzoom({
	           zoomType: 'reverse',
	           position: 'left',
	           zoomWidth: 588,
	           zoomHeight: 495,
	           lens:true,
	           title:false,
	           preloadImages: false,
	           alwaysOn:false
	 });

     if($.browser.msie) {$('#zoomie').show(); $('#zoomnoie').hide();}

      $('select[name="id[2]"]').bind("change", check_topcoats);
      $('select[name="id[6]"]').bind("change", check_size);
      check_topcoats();
      getCurAttr();
      $('.attr_class').bind("change", getCurAttr);
      
//huyen
   //alert('1');
    
           
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


    $('#whatsnew_box div.slideshow').cycle({
		fx: 'scrollUp', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
                speed:  2000, // speed of the transition (any valid fx speed value) 
                containerResize: 0,
                timeout: 5000, //pause between slide transitions
                slideResize:   0,
		pause:  1 //pause on hover 

	});                               

        init_buynow('.pi-add-to-cart');

	$.prettyLoader();
        $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");


        $('a.remote').live('click', function(e) {
                    var url = $(this).attr('href');
                    url = url.replace(/^.*#/, '');
                    $.history.load(url);
                    return false;
                });             
});


})(jQuery);

function getCurAttr(){
        var str_attr='';
        $('.attr_class').each(function(index,value) {       
            var id=$(this).attr('name').replace('id[','').replace(']','');
            var a=$(this).val();
            str_attr +=id+'-'+a+',';           
        });
        str_attr=str_attr.slice(0, -1);
        
        var products_id=$('input[name="products_id"]').attr('value');
        $.post("product_info.php", { products_id:products_id,str_attr:str_attr,action:'get_qty'},
            function(data){
//                console.log(data);
//                var last_attr=$('.attr_class').last().attr('name');
//                var last_attr_val=$('.attr_class').last().find("option:first").text();
                //console.log(last_attr);
                //$('select[name="' + last_attr + '"]').find("option:first").text(last_attr_val+' - Stock '+data);
                //$('select[name="' + last_attr + '"]').find("option:first").html(last_attr_val+' - Stock '+data);
                //if(data !='no-data')
               $('#qty_no').text(data);
                
                
        });
        
    }

function doRound(x, places) {
  return Math.round(x * Math.pow(10, places)) / Math.pow(10, places);
}

function change_metric(metric)
{

 var size_id=$('select[name="id[6]"]').attr('value');

 //if (typeof(size_id)!=='undefined')
  //{
      
  if (typeof(size_id)!=='undefined'&&typeof(document.getElementsByName('options_values_width['+size_id+']')[0]) != 'undefined'&&
    typeof(document.getElementsByName('options_values_height['+size_id+']')[0]) != 'undefined'&&
    typeof(document.getElementsByName('options_values_depth['+size_id+']')[0]) != 'undefined')
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
        width=width.toString().replace(".00","");
height=height.toString().replace(".00","");
depth=depth.toString().replace(".00","");

$.cookie("metric", metric);

if (metric=="inches")
 $('#size').html('<b>Size:</b> W '+width+' x D '+depth+' x H '+height+' inches');
else
 $('#size').html('<b>Size:</b> W '+width+' x D '+depth+' x H '+height+' cm');
  //}
  
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
        width=width.toString().replace(".00","");
height=height.toString().replace(".00","");
depth=depth.toString().replace(".00","");

$.cookie("metric", metric);

if (metric=="inches")
 $('#size').html('<b>Size:</b> W '+width+' x D '+depth+' x H '+height+' inches');
else
 $('#size').html('<b>Size:</b> W '+width+' x D '+depth+' x H '+height+' cm');
  }
 else return false;


}

function doNormalize(number)
{
if (number==0) return "";
else return number;
}

var lastmetric="inches";
function change_metric_search(metric, checked)
{
	if (typeof(document.getElementsByName('width_from')[0])=="undefined")
        return false;

if (lastmetric==metric) return false;
                    
 current_width_from=document.getElementsByName('width_from')[0].value;
 current_width_to=document.getElementsByName('width_to')[0].value;

 current_height_from=document.getElementsByName('height_from')[0].value;
 current_height_to=document.getElementsByName('height_to')[0].value;

 current_depth_from=document.getElementsByName('depth_from')[0].value;
 current_depth_to=document.getElementsByName('depth_to')[0].value;



      if (metric=="inches")
        {
	 document.getElementsByName('width_from')[0].value=doNormalize(doRound(parseFloat(current_width_from*0.3937),2));
	 document.getElementsByName('width_to')[0].value=doNormalize(doRound(parseFloat(current_width_to*0.3937),2));

	 document.getElementsByName('height_from')[0].value=doNormalize(doRound(parseFloat(current_height_from*0.3937),2));
	 document.getElementsByName('height_to')[0].value=doNormalize(doRound(parseFloat(current_height_to*0.3937),2));

	 document.getElementsByName('depth_from')[0].value=doNormalize(doRound(parseFloat(current_depth_from*0.3937),2));
	 document.getElementsByName('depth_to')[0].value=doNormalize(doRound(parseFloat(current_depth_to*0.3937),2));
	}
	else 
	{

	 document.getElementsByName('width_from')[0].value=doNormalize(doRound(parseFloat(current_width_from*2.54),2));
	 document.getElementsByName('width_to')[0].value=doNormalize(doRound(parseFloat(current_width_to*2.54),2));

	 document.getElementsByName('height_from')[0].value=doNormalize(doRound(parseFloat(current_height_from*2.54),2));
	 document.getElementsByName('height_to')[0].value=doNormalize(doRound(parseFloat(current_height_to*2.54),2));

	 document.getElementsByName('depth_from')[0].value=doNormalize(doRound(parseFloat(current_depth_from*2.54),2));
	 document.getElementsByName('depth_to')[0].value=doNormalize(doRound(parseFloat(current_depth_to*2.54),2));

	}

if (metric=="inches") $('span.meas').html("inches");
if (metric=="metric") $('span.meas').html("cm");

lastmetric=metric;

$.cookie("metric", metric);

}

function check_size()
{

if (typeof(document.getElementsByName('metric')[0])=='undefined') return false;

if (document.getElementsByName('metric')[0].checked) metric="inches";
else metric="metric";

if (typeof(document.getElementsByName('options_values_width['+this.value+']')[0]) != 'undefined'&&
    typeof(document.getElementsByName('options_values_height['+this.value+']')[0]) != 'undefined'&&
    typeof(document.getElementsByName('options_values_depth['+this.value+']')[0]) != 'undefined')
{ 
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
else return false;
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
     //getCurAttr();
   });
   
}
    function showRequest(formData, jqForm, options) {
     
     $('.my_progress').show(); 
     submitted=false;
     if ($(jqForm).attr('name')=="advanced_search") $('#search_result').fadeOut("fast");
     else {
         $('#_content').fadeOut("fast");              
     }
    
     return true;
    }
    //new catalog huyen
    function showResponse(responseText, statusText, xhr, $form)  {
            $('.my_progress').hide(); 
           if ($form.attr('name')=="advanced_search") $('#search_result').html($(responseText).find('#search_result').html());
           else {
               $('.cya-home-breakcum-top').html($(responseText).find('.cya-home-breakcum-top').html());
              
               $('.new_header_page').html($(responseText).find('.new_header_page').html());
               
               $('#_content').html($(responseText).find('#_content').html());
               if($(responseText).find('#error_payment_input').val!='') {
					$('#payment_error').show();
					$('#payment_error').html($(responseText).find('#error_payment_input').val());
			  }
			  if($(responseText).find('.action_ajax').val()=='chk_confirm' || $(responseText).find('.action_ajax').val()=='chk_success'){   
				   console.log('thjr');
                   $('.new_left_shopping').hide();
               }
           }

        $('table.datepicker').remove();
	var d=new Date();
        $('input[name="delivery_time"]').simpleDatepicker( {startdate: d.getFullYear()});


           $("#shopping_cart_box_cs").html($(responseText).find("#shopping_cart_box_cs").html());
           $("#breadcrumb_box").html($(responseText).find("#breadcrumb_box").html());
           //$("#categories_box").html($(responseText).find("#categories_box").html()); //uncomment for non-ajax categories box
           $("#reviews_box").html($(responseText).find("#reviews_box").html());
           $("#myaccountlogoff").html($(responseText).find("#myaccountlogoff").html());
           $("#banners_box").html($(responseText).find("#banners_box").html());


    jQuery('.preload').preloadImages({
        showSpeed: 500   // length of fade-in animation, 500 is default
//        easing: 'easeOutQuad'   // optional easing, if you don't have any easing scripts - delete this option
    });


            init_buynow ('.pi-add-to-cart');
          $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");

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
   });
}


function cart_product_remove_cs (products_id, scriptname)
{
 $.post("shopping_cart_cs.php?action=update_product_cs", { "products_id[]":products_id, "cart_delete[]":products_id},
   function(data){
     $("#_content").html($(data).find("#_content").html())
     $("#shopping_cart_box_cs").html($(data).find("#shopping_cart_box_cs").html())
     $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
   });
}

function cart_product_remove_fv (products_id, scriptname)
{
 $.post("shopping_cart_fv.php?action=update_product_fv", { "products_id[]":products_id, "cart_delete[]":products_id},
   function(data){
     get_fv_amount_product();
     $("#_content").html($(data).find("#_content").html())
//     $("#shopping_cart_box_cs").html($(data).find("#shopping_cart_box_cs").html())
     $("textarea, select:not(.uni), input:not(.star)").uniform().addClass("uni");
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
$( "#tabs" ).tabs({event: "mouseover"});

$(document).keyup(function(e) {
  if (e.keyCode == 27) { $('#image-mag-fullscreen').hide() }   // esc
});


$('table.versions').find('div.MagicToolboxSelector a').each(function(){
	$(this).attr('rel', 'group:versions;' + $(this).attr('rel'));
});

$('table.versions div.MagicToolboxSelector a img').each(function(){
	$(this).width('105').height('70');
});
               
//$('#menu3').rb_menu({transition: 'swing'});


metric=$.cookie("metric");
if (metric!=null)
{
 change_metric(metric);
 change_metric_search(metric);

 $('input[value="'+metric+'"]').attr("checked", "checked");
 $.uniform.update($('input[name="metric"]'));
}

	if($("ul.dropdown").length) {
		$("ul.dropdown li").dropdown();
	}
   
    $('div#versions .cya-info-pro-p-version').live('mouseover',function(e) {
            $(this).children('.tooltip').show();	
    }).live('mouseout',function() {
            $(this).children('.tooltip').hide();
    });
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

function versions_arrow_onclick(direction){
		try{
			var min_left =  (-1) * (105 * ($('#versions table tr td').length - 1));
			var cur_left = parseInt($('#versions').css('left').replace(/px/, ''));
			var left_val = 0;
			if (direction=='L'){
				if (cur_left<=min_left){
					left_val = min_left;
				} else {
					left_val = cur_left - 105;
				}
			} else if (direction='R'){
				if (cur_left>=0){
					left_val = 0;
				} else {
					left_val = cur_left + 105;
				}				
			}
			/*$('#versions').animate({
				left: left_val + 'px'
			}, 'slow');*/
			$('#versions').css({
				left: left_val
			});
		} catch(e) { alert(e); }
	}

jQuery.imagesPreload = function () {
    if (typeof arguments[arguments.length - 1] == 'function') {
        var callback = arguments[arguments.length - 1];
    } else {
        var callback = false;
    }
    if (typeof arguments[0] == 'object') {
        var images = arguments[0];
        var n = images.length;
    } else {
        var images = arguments;
        var n = images.length - 1;
    }
    var not_loaded = n;
    for (var i = 0; i < n; i++) {
        jQuery(new Image()).attr('src', images[i]).load(function() {
            if (--not_loaded < 1 && typeof callback == 'function') {
                callback();
            }
        });
    }
}
function getParameterByName(name)
{
  name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
  var regexS = "[\\?&]" + name + "=([^&#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.search);
  if(results == null)
    return "";
  else
    return decodeURIComponent(results[1].replace(/\+/g, " "));
}

function fill_quickview(product_id)
{
 $('#content').hide();
 $('#jqloading').show();
 $('#jqloading1').show();

 $('#qv_productattributes').html('<input type="hidden" name="products_id" value="'+product_id+'">');
 $('#qv_productsize').html('');
 $('#thumblist2').html('');
 $('#thumblist2').hide();
 $('#qv_version').html('');

 $('#qv_prev').unbind('click');
 $('#qv_next').unbind('click');

 $("#qv_prev").click(function() {
  quickview_prev(product_id);
 });
 $("#qv_next").click(function() {
  quickview_next(product_id);
 });

 $('#fill_projects').unbind('mouseover');
 $('#fill_projects').mouseover(function(){
  fill_projects(this, product_id, 0);
 });

 $('#productinfo_projects a').attr('id','pr_'+product_id);

 product_name=document.getElementsByName("product_name["+product_id+"]")[0].value;
 product_description=document.getElementsByName("product_description["+product_id+"]")[0].value;
 product_price=document.getElementsByName("product_price["+product_id+"]")[0].value;

 $('#qv_productname').html(product_name);
 $('#qv_productdescription').html(product_description);
 $('#qv_productprice').html("Price: "+product_price);

 $( "#tabs" ).tabs({event: "mouseover"});
 $.getJSON('quickview_ajax.php?products_id='+product_id, function(data) {

 $('#qv_productquanlity').html(data['quanlity']);
 $('#qv_productsize').html(data['size']);
 $('#qv_productattributes').append(data['attributes']);

 $('select[name="id[2]"]').bind("change", check_topcoats);
 $('select[name="id[6]"]').bind("change", check_size);
 check_topcoats();

 metric=$.cookie("metric");
 if (metric!=null)
 {
  change_metric(metric);
  $('input[value="'+metric+'"]').attr("checked", "checked");
 }



$('#qv_addtocart').html('<a onclick="cursor_y-=$(\'#nyroModalFull\').offset().top" class="pi-add-to-cart fv" id="b_'+product_id+'" href="javascript:void(0);"><img src="images/icons/add-favorites.png" border="0"></a>');
$('#qv_details').html('<a onclick="$.nyroModalRemove();" class="remote" href="product_info.php?products_id='+product_id+'"><img src="images/icons/item-details.png" border="0"></a>');
init_buynow('.pi-add-to-cart');

  var images = new Array();
  for (i=0;i<data['images'].length;i++)
  {
   images.push(data['images'][i]['thumb_image']);
   images.push(data['images'][i]['small_image']);
   images.push(data['images'][i]['big_image']);
   if (i==0) //main image
   {
    var mycontents='<a href="'+data['images'][i]['big_image']+'" class="jqzoom" rel=\'gal1\'  title="" ><img src="'+data['images'][i]['small_image']+'"  title=""  style="border: 4px solid #666;"></a>';
    $('#jqmainimage').html(mycontents);
    $('#thumblist').html('<li><a class="zoomThumbActive" href=\'javascript:void(0);\' rel="{gallery: \'gal1\', smallimage: \''+data['images'][i]['small_image']+'\',largeimage: \''+data['images'][i]['big_image']+'\'}"><img src=\''+data['images'][i]['thumb_image']+'\'></a></li>')
   }
   else {
    $('#thumblist').append('<li><a href=\'javascript:void(0);\' rel="{gallery: \'gal1\', smallimage: \''+data['images'][i]['small_image']+'\',largeimage: \''+data['images'][i]['big_image']+'\'}"><img src=\''+data['images'][i]['thumb_image']+'\'></a></li>');
   }
  }

    $.imagesPreload(images, function () {
	 $('#jqloading').hide();
         $('#content').show();
	 $('.jqzoom').jqzoom({
	           zoomType: 'reverse',
	           position: 'right',
	           xOffset : 18,
	           zoomWidth: 388,
	           zoomHeight: 495,
	           lens:true,
	           preloadImages: false,
	           alwaysOn:false
	 });
    });


  if (data['version_products']!==null)
  {
  var versionimages = new Array();

  for (i=0;i<data['version_products'].length;i++)
  {
   versionimages.push(data['version_products'][i]['thumb_image']);
   versionimages.push(data['version_products'][i]['small_image']);
   versionimages.push(data['version_products'][i]['big_image']);
   $('#thumblist2').append('<li style="text-align:center;"><a class="remote" onclick="$.nyroModalRemove();" href=\'product_info.php?products_id='+data['version_products'][i]['products_id']+'\' rel="{gallery: \'gal1\', smallimage: \''+data['version_products'][i]['small_image']+'\',largeimage: \''+data['version_products'][i]['big_image']+'\'}"><img src=\''+data['version_products'][i]['thumb_image']+'\'><br>See Details</a></li>');
  }

   if (versionimages.length>0)
   {
    $.imagesPreload(versionimages, function () {
     $('#jqloading1').hide();
     $('#thumblist2').show();
    });
   }
  }
  else {
     $('#jqloading1').hide();
     $('#qv_version').html('There are currently no additional versions for this item available.');
  }
 }); 
}
function quickview_prev(product_id)
{
 i=0;
 while(typeof($('#productname_'+i).val())!=='undefined')
 {
  nextval=parseInt($('#productname_'+parseInt(i+1)).val());

  if (nextval==product_id) 
   {
    fill_quickview($('#productname_'+i).val());
    return 1;
   }
  last=$('#productname_'+i).val();
  i++;
 }
 if (last.length>0) fill_quickview(last);
}

function quickview_next(product_id)
{
 i=1;
 while(typeof($('#productname_'+i).val())!=='undefined')
 {
  prevval=parseInt($('#productname_'+parseInt(i-1)).val());
  if (prevval==product_id) 
   {
    fill_quickview($('#productname_'+i).val());
    return 1;
   }
  i++;
 }
 if($('#productname_0').val().length>0) fill_quickview($('#productname_0').val());
}


function view_larger(objHandle,eventHandle)
{
if(typeof(eventHandle)!=="undefined")
{
 if (!eventHandle) var eventHandle = window.event;
 if (eventHandle) eventHandle.cancelBubble = true;
 if (eventHandle.stopPropagation) eventHandle.stopPropagation();
}
var id = $('#imagecontainer img.active').attr('src');
var tmp=id.replace("http://","").replace("https://","");
var idx=tmp.lastIndexOf("/");
var image=tmp.substring(idx);
id=escape(image);

$('img.fullScreen.active').height($.pic_real_height[id]);


var y_offset=$('div.cmpage').outerHeight();

if ($.pic_real_height[id]<($('#image-mag-fullscreen').height()-y_offset) && $.pic_real_width[id]<$('#image-mag-fullscreen').width()) 
{
 image_scale();
 return false;
}

$('img.fullScreen.active').offset({top:y_offset, left:0}).css("position","absolute");

//alert($('img.fullScreen:visible').offset().top);

   $('#imagecontainer').mousemove(function(e){




       if ($.pic_real_width[id]!=='undefined' && $.pic_real_height[id]!=='undefined' && ($.pic_real_width[id]>$('#image-mag-fullscreen').width() || $.pic_real_height[id]>$('#image-mag-fullscreen').height()+y_offset))
       {

         var x_scroll_rate=$.pic_real_width[id]/$('#image-mag-fullscreen').width()/2;
         var y_scroll_rate=$.pic_real_height[id]/$('#image-mag-fullscreen').height();

       if (e.pageX<$('#image-mag-fullscreen').width()/2 || e.pageY<$('#image-mag-fullscreen').height()/2)
         $("#imagecontainer img.active").offset({ top: -(e.pageY-y_offset*4)*y_scroll_rate, left: -e.pageX*x_scroll_rate});
       else if (Math.abs($("#imagecontainer img.active").offset().left)+$('#image-mag-fullscreen').width() < $.pic_real_width[id])
         $("#imagecontainer img.active").offset({left: -e.pageX*x_scroll_rate });
       else if (Math.abs($("#imagecontainer img.active").offset().top)+$('#image-mag-fullscreen').height() < $.pic_real_height[id])
         $("#imagecontainer img.active").offset({ top: -(e.pageY-y_offset*4)*y_scroll_rate});
       else
         $("#imagecontainer img.active").offset({ top: -(e.pageY-y_offset*4)*y_scroll_rate, left: -e.pageX*x_scroll_rate});
       }
   }); 

}

function image_scale(objHandle,eventHandle)
{
if(typeof(eventHandle)!=="undefined")
{
 if (!eventHandle) var eventHandle = window.event;
 if (eventHandle) eventHandle.cancelBubble = true;
 if (eventHandle.stopPropagation) eventHandle.stopPropagation();
}
if(!$('#image-mag-fullscreen').is(':visible')) return false;


 $('img.fullScreen.active').height($('#image-mag-fullscreen').height()-$('div.thumbs').outerHeight()-$('div.cmpage').outerHeight());
 $('img.fullScreen.active').offset({top:$('div.cmpage').outerHeight(), left:($('#image-mag-fullscreen').width()-$('img.fullScreen.active').width()-$('#fs_right').outerWidth()-$('#fs_left').outerWidth())/2});


 $('#imagecontainer').unbind('mousemove')
}

function image_swap(key)
{
 $('#imagecontainer img').removeClass("active").offset({top:-9000,left:-9000});

 $('#'+key).addClass("active").offset({top:$('div.cmpage').outerHeight(), left:0});
 if($('#clickForFitBttnOn').is(':visible')) {view_larger()}
 else image_scale();
}

function go_fullscreen()
{
$('#image-mag-fullscreen').fadeIn();

if($('a.zoomThumbActive').html()!=null)
{
 var active_id=$('img.fullScreen.active').attr('id').replace('img_','')
 var thumb_id=$('a.zoomThumbActive').attr('id').replace('thumb_','');

 if(active_id!=thumb_id)
 {
  $('#imagecontainer img').removeClass("active").offset({top:-9000,left:-9000});
  $('#imagecontainer img').each(function(){
    if (this.id.replace('img_','')==thumb_id)
          $(this).addClass("active").offset({top:$('div.cmpage').outerHeight(), left:0});
	})
 }
}

if($('#clickForFitBttnOn').is(':visible')) 
 view_larger()
else image_scale();
$('img.zoomEsc').delay(1500).fadeOut(1000);
}