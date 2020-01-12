<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Page Expired</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<style>
		html,
		body {
			background-color: #fff;
			color: #636b6f;
			font-family: 'Nunito', sans-serif;
			font-weight: 100;
			height: 100vh;
			margin: 0;
		}

		.full-height {
			height: 100vh;
		}

		.flex-center {
			align-items: center;
			display: flex;
			justify-content: center;
		}

		.position-ref {
			position: relative;
		}

		.code {
			border-right: 2px solid;
			font-size: 26px;
			padding: 0 15px 0 15px;
			text-align: center;
		}

		.message {
			font-size: 18px;
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="flex-center position-ref full-height">
		<div class="code">
			419 </div>

		<div class="message" style="padding: 10px;">
			Page Expired </div>
	</div>
	<link rel='stylesheet' type='text/css' property='stylesheet'
		href='//0.0.0.0/_debugbar/assets/stylesheets?v=1569336942'>
	<script type='text/javascript' src='//0.0.0.0/_debugbar/assets/javascript?v=1569336942'></script>
	<script type="text/javascript">
		jQuery.noConflict(true);
	</script>
	<script>
		Sfdump = window.Sfdump || (function (doc) { var refStyle = doc.createElement('style'), rxEsc = /([.*+?^${}()|\[\]\/\\])/g, idRx = /\bsf-dump-\d+-ref[012]\w+\b/, keyHint = 0 <= navigator.platform.toUpperCase().indexOf('MAC') ? 'Cmd' : 'Ctrl', addEventListener = function (e, n, cb) { e.addEventListener(n, cb, false); }; (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); if (!doc.addEventListener) { addEventListener = function (element, eventName, callback) { element.attachEvent('on' + eventName, function (e) { e.preventDefault = function () {e.returnValue = false;}; e.target = e.srcElement; callback(e); }); }; } function toggle(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className, arrow, newClass; if (/\bsf-dump-compact\b/.test(oldClass)) { arrow = '▼'; newClass = 'sf-dump-expanded'; } else if (/\bsf-dump-expanded\b/.test(oldClass)) { arrow = '▶'; newClass = 'sf-dump-compact'; } else { return false; } if (doc.createEvent && s.dispatchEvent) { var event = doc.createEvent('Event'); event.initEvent('sf-dump-expanded' === newClass ? 'sfbeforedumpexpand' : 'sfbeforedumpcollapse', true, false); s.dispatchEvent(event); } a.lastChild.innerHTML = arrow; s.className = s.className.replace(/\bsf-dump-(compact|expanded)\b/, newClass); if (recursive) { try { a = s.querySelectorAll('.'+oldClass); for (s = 0; s < a.length; ++s) { if (-1 == a[s].className.indexOf(newClass)) { a[s].className = newClass; a[s].previousSibling.lastChild.innerHTML = arrow; } } } catch (e) { } } return true; }; function collapse(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-expanded\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function expand(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-compact\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function collapseAll(root) { var a = root.querySelector('a.sf-dump-toggle'); if (a) { collapse(a, true); expand(a); return true; } return false; } function reveal(node) { var previous, parents = []; while ((node = node.parentNode || {}) && (previous = node.previousSibling) && 'A' === previous.tagName) { parents.push(previous); } if (0 !== parents.length) { parents.forEach(function (parent) { expand(parent); }); return true; } return false; } function highlight(root, activeNode, nodes) { resetHighlightedNodes(root); Array.from(nodes||[]).forEach(function (node) { if (!/\bsf-dump-highlight\b/.test(node.className)) { node.className = node.className + ' sf-dump-highlight'; } }); if (!/\bsf-dump-highlight-active\b/.test(activeNode.className)) { activeNode.className = activeNode.className + ' sf-dump-highlight-active'; } } function resetHighlightedNodes(root) { Array.from(root.querySelectorAll('.sf-dump-str, .sf-dump-key, .sf-dump-public, .sf-dump-protected, .sf-dump-private')).forEach(function (strNode) { strNode.className = strNode.className.replace(/\bsf-dump-highlight\b/, ''); strNode.className = strNode.className.replace(/\bsf-dump-highlight-active\b/, ''); }); } return function (root, x) { root = doc.getElementById(root); var indentRx = new RegExp('^('+(root.getAttribute('data-indent-pad') || ' ').replace(rxEsc, '\\$1')+')+', 'm'), options = {"maxDepth":1,"maxStringLength":160,"fileLinkFormat":false}, elt = root.getElementsByTagName('A'), len = elt.length, i = 0, s, h, t = []; while (i < len) t.push(elt[i++]); for (i in x) { options[i] = x[i]; } function a(e, f) { addEventListener(root, e, function (e, n) { if ('A' == e.target.tagName) { f(e.target, e); } else if ('A' == e.target.parentNode.tagName) { f(e.target.parentNode, e); } else { n = /\bsf-dump-ellipsis\b/.test(e.target.className) ? e.target.parentNode : e.target; if ((n = n.nextElementSibling) && 'A' == n.tagName) { if (!/\bsf-dump-toggle\b/.test(n.className)) { n = n.nextElementSibling || n; } f(n, e, true); } } }); }; function isCtrlKey(e) { return e.ctrlKey || e.metaKey; } function xpathString(str) { var parts = str.match(/[^'"]+|['"]/g).map(function (part) { if ("'" == part) { return '"\'"'; } if ('"' == part) { return "'\"'"; } return "'" + part + "'"; }); return "concat(" + parts.join(",") + ", '')"; } function xpathHasClass(className) { return "contains(concat(' ', normalize-space(@class), ' '), ' " + className +" ')"; } addEventListener(root, 'mouseover', function (e) { if ('' != refStyle.innerHTML) { refStyle.innerHTML = ''; } }); a('mouseover', function (a, e, c) { if (c) { e.target.style.cursor = "pointer"; } else if (a = idRx.exec(a.className)) { try { refStyle.innerHTML = '.phpdebugbar pre.sf-dump .'+a[0]+'{background-color: #B729D9; color: #FFF !important; border-radius: 2px}'; } catch (e) { } } }); a('click', function (a, e, c) { if (/\bsf-dump-toggle\b/.test(a.className)) { e.preventDefault(); if (!toggle(a, isCtrlKey(e))) { var r = doc.getElementById(a.getAttribute('href').substr(1)), s = r.previousSibling, f = r.parentNode, t = a.parentNode; t.replaceChild(r, a); f.replaceChild(a, s); t.insertBefore(s, r); f = f.firstChild.nodeValue.match(indentRx); t = t.firstChild.nodeValue.match(indentRx); if (f && t && f[0] !== t[0]) { r.innerHTML = r.innerHTML.replace(new RegExp('^'+f[0].replace(rxEsc, '\\$1'), 'mg'), t[0]); } if (/\bsf-dump-compact\b/.test(r.className)) { toggle(s, isCtrlKey(e)); } } if (c) { } else if (doc.getSelection) { try { doc.getSelection().removeAllRanges(); } catch (e) { doc.getSelection().empty(); } } else { doc.selection.empty(); } } else if (/\bsf-dump-str-toggle\b/.test(a.className)) { e.preventDefault(); e = a.parentNode.parentNode; e.className = e.className.replace(/\bsf-dump-str-(expand|collapse)\b/, a.parentNode.className); } }); elt = root.getElementsByTagName('SAMP'); len = elt.length; i = 0; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; if ('SAMP' == elt.tagName) { a = elt.previousSibling || {}; if ('A' != a.tagName) { a = doc.createElement('A'); a.className = 'sf-dump-ref'; elt.parentNode.insertBefore(a, elt); } else { a.innerHTML += ' '; } a.title = (a.title ? a.title+'\n[' : '[')+keyHint+'+click] Expand all children'; a.innerHTML += '<span>▼</span>'; a.className += ' sf-dump-toggle'; x = 1; if ('sf-dump' != elt.parentNode.className) { x += elt.parentNode.getAttribute('data-depth')/1; } elt.setAttribute('data-depth', x); var className = elt.className; elt.className = 'sf-dump-expanded'; if (className ? 'sf-dump-expanded' !== className : (x > options.maxDepth)) { toggle(a); } } else if (/\bsf-dump-ref\b/.test(elt.className) && (a = elt.getAttribute('href'))) { a = a.substr(1); elt.className += ' '+a; if (/[\[{]$/.test(elt.previousSibling.nodeValue)) { a = a != elt.nextSibling.id && doc.getElementById(a); try { s = a.nextSibling; elt.appendChild(a); s.parentNode.insertBefore(a, s); if (/^[@#]/.test(elt.innerHTML)) { elt.innerHTML += ' <span>▶</span>'; } else { elt.innerHTML = '<span>▶</span>'; elt.className = 'sf-dump-ref'; } elt.className += ' sf-dump-toggle'; } catch (e) { if ('&' == elt.innerHTML.charAt(0)) { elt.innerHTML = '…'; elt.className = 'sf-dump-ref'; } } } } } if (doc.evaluate && Array.from && root.children.length > 1) { root.setAttribute('tabindex', 0); SearchState = function () { this.nodes = []; this.idx = 0; }; SearchState.prototype = { next: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx < (this.nodes.length - 1) ? this.idx + 1 : 0; return this.current(); }, previous: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx > 0 ? this.idx - 1 : (this.nodes.length - 1); return this.current(); }, isEmpty: function () { return 0 === this.count(); }, current: function () { if (this.isEmpty()) { return null; } return this.nodes[this.idx]; }, reset: function () { this.nodes = []; this.idx = 0; }, count: function () { return this.nodes.length; }, }; function showCurrent(state) { var currentNode = state.current(), currentRect, searchRect; if (currentNode) { reveal(currentNode); highlight(root, currentNode, state.nodes); if ('scrollIntoView' in currentNode) { currentNode.scrollIntoView(true); currentRect = currentNode.getBoundingClientRect(); searchRect = search.getBoundingClientRect(); if (currentRect.top < (searchRect.top + searchRect.height)) { window.scrollBy(0, -(searchRect.top + searchRect.height + 5)); } } } counter.textContent = (state.isEmpty() ? 0 : state.idx + 1) + ' of ' + state.count(); } var search = doc.createElement('div'); search.className = 'sf-dump-search-wrapper sf-dump-search-hidden'; search.innerHTML = ' <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0<\/span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> '; root.insertBefore(search, root.firstChild); var state = new SearchState(); var searchInput = search.querySelector('.sf-dump-search-input'); var counter = search.querySelector('.sf-dump-search-count'); var searchInputTimer = 0; var previousSearchQuery = ''; addEventListener(searchInput, 'keyup', function (e) { var searchQuery = e.target.value; /* Don't perform anything if the pressed key didn't change the query */ if (searchQuery === previousSearchQuery) { return; } previousSearchQuery = searchQuery; clearTimeout(searchInputTimer); searchInputTimer = setTimeout(function () { state.reset(); collapseAll(root); resetHighlightedNodes(root); if ('' === searchQuery) { counter.textContent = '0 of 0'; return; } var classMatches = [ "sf-dump-str", "sf-dump-key", "sf-dump-public", "sf-dump-protected", "sf-dump-private", ].map(xpathHasClass).join(' or '); var xpathResult = doc.evaluate('.//span[' + classMatches + '][contains(translate(child::text(), ' + xpathString(searchQuery.toUpperCase()) + ', ' + xpathString(searchQuery.toLowerCase()) + '), ' + xpathString(searchQuery.toLowerCase()) + ')]', root, null, XPathResult.ORDERED_NODE_ITERATOR_TYPE, null); while (node = xpathResult.iterateNext()) state.nodes.push(node); showCurrent(state); }, 400); }); Array.from(search.querySelectorAll('.sf-dump-search-input-next, .sf-dump-search-input-previous')).forEach(function (btn) { addEventListener(btn, 'click', function (e) { e.preventDefault(); -1 !== e.target.className.indexOf('next') ? state.next() : state.previous(); searchInput.focus(); collapseAll(root); showCurrent(state); }) }); addEventListener(root, 'keydown', function (e) { var isSearchActive = !/\bsf-dump-search-hidden\b/.test(search.className); if ((114 === e.keyCode && !isSearchActive) || (isCtrlKey(e) && 70 === e.keyCode)) { /* F3 or CMD/CTRL + F */ if (70 === e.keyCode && document.activeElement === searchInput) { /* * If CMD/CTRL + F is hit while having focus on search input, * the user probably meant to trigger browser search instead. * Let the browser execute its behavior: */ return; } e.preventDefault(); search.className = search.className.replace(/\bsf-dump-search-hidden\b/, ''); searchInput.focus(); } else if (isSearchActive) { if (27 === e.keyCode) { /* ESC key */ search.className += ' sf-dump-search-hidden'; e.preventDefault(); resetHighlightedNodes(root); searchInput.value = ''; } else if ( (isCtrlKey(e) && 71 === e.keyCode) /* CMD/CTRL + G */ || 13 === e.keyCode /* Enter */ || 114 === e.keyCode /* F3 */ ) { e.preventDefault(); e.shiftKey ? state.previous() : state.next(); collapseAll(root); showCurrent(state); } } }); } if (0 >= options.maxStringLength) { return; } try { elt = root.querySelectorAll('.sf-dump-str'); len = elt.length; i = 0; t = []; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; s = elt.innerText || elt.textContent; x = s.length - options.maxStringLength; if (0 < x) { h = elt.innerHTML; elt[elt.innerText ? 'innerText' : 'textContent'] = s.substring(0, options.maxStringLength); elt.className += ' sf-dump-str-collapse'; elt.innerHTML = '<span class=sf-dump-str-collapse>'+h+'<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span>'+ '<span class=sf-dump-str-expand>'+elt.innerHTML+'<a class="sf-dump-ref sf-dump-str-toggle" title="'+x+' remaining characters"> ▶</a></span>'; } } } catch (e) { } }; })(document); 
	</script>
	<style>
		.phpdebugbar pre.sf-dump {
			display: block;
			white-space: pre;
			padding: 5px;
			overflow: initial !important;
		}

		.phpdebugbar pre.sf-dump:after {
			content: "";
			visibility: hidden;
			display: block;
			height: 0;
			clear: both;
		}

		.phpdebugbar pre.sf-dump span {
			display: inline;
		}

		.phpdebugbar pre.sf-dump .sf-dump-compact {
			display: none;
		}

		.phpdebugbar pre.sf-dump a {
			text-decoration: none;
			cursor: pointer;
			border: 0;
			outline: none;
			color: inherit;
		}

		.phpdebugbar pre.sf-dump img {
			max-width: 50em;
			max-height: 50em;
			margin: .5em 0 0 0;
			padding: 0;
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAHUlEQVQY02O8zAABilCaiQEN0EeA8QuUcX9g3QEAAjcC5piyhyEAAAAASUVORK5CYII=) #D3D3D3;
		}

		.phpdebugbar pre.sf-dump .sf-dump-ellipsis {
			display: inline-block;
			overflow: visible;
			text-overflow: ellipsis;
			max-width: 5em;
			white-space: nowrap;
			overflow: hidden;
			vertical-align: top;
		}

		.phpdebugbar pre.sf-dump .sf-dump-ellipsis+.sf-dump-ellipsis {
			max-width: none;
		}

		.phpdebugbar pre.sf-dump code {
			display: inline;
			padding: 0;
			background: none;
		}

		.sf-dump-str-collapse .sf-dump-str-collapse {
			display: none;
		}

		.sf-dump-str-expand .sf-dump-str-expand {
			display: none;
		}

		.sf-dump-public.sf-dump-highlight,
		.sf-dump-protected.sf-dump-highlight,
		.sf-dump-private.sf-dump-highlight,
		.sf-dump-str.sf-dump-highlight,
		.sf-dump-key.sf-dump-highlight {
			background: rgba(111, 172, 204, 0.3);
			border: 1px solid #7DA0B1;
			border-radius: 3px;
		}

		.sf-dump-public.sf-dump-highlight-active,
		.sf-dump-protected.sf-dump-highlight-active,
		.sf-dump-private.sf-dump-highlight-active,
		.sf-dump-str.sf-dump-highlight-active,
		.sf-dump-key.sf-dump-highlight-active {
			background: rgba(253, 175, 0, 0.4);
			border: 1px solid #ffa500;
			border-radius: 3px;
		}

		.phpdebugbar pre.sf-dump .sf-dump-search-hidden {
			display: none !important;
		}

		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper {
			font-size: 0;
			white-space: nowrap;
			margin-bottom: 5px;
			display: flex;
			position: -webkit-sticky;
			position: sticky;
			top: 5px;
		}

		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper>* {
			vertical-align: top;
			box-sizing: border-box;
			height: 21px;
			font-weight: normal;
			border-radius: 0;
			background: #FFF;
			color: #757575;
			border: 1px solid #BBB;
		}

		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper>input.sf-dump-search-input {
			padding: 3px;
			height: 21px;
			font-size: 12px;
			border-right: none;
			border-top-left-radius: 3px;
			border-bottom-left-radius: 3px;
			color: #000;
			min-width: 15px;
			width: 100%;
		}

		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-next,
		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-previous {
			background: #F2F2F2;
			outline: none;
			border-left: none;
			font-size: 0;
			line-height: 0;
		}

		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-next {
			border-top-right-radius: 3px;
			border-bottom-right-radius: 3px;
		}

		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-next>svg,
		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-input-previous>svg {
			pointer-events: none;
			width: 12px;
			height: 12px;
		}

		.phpdebugbar pre.sf-dump .sf-dump-search-wrapper>.sf-dump-search-count {
			display: inline-block;
			padding: 0 5px;
			margin: 0;
			border-left: none;
			line-height: 21px;
			font-size: 12px;
		}

		.phpdebugbar pre.sf-dump,
		.phpdebugbar pre.sf-dump .sf-dump-default {
			word-wrap: break-word;
			white-space: pre-wrap;
			word-break: normal
		}

		.phpdebugbar pre.sf-dump .sf-dump-num {
			font-weight: bold;
			color: #1299DA
		}

		.phpdebugbar pre.sf-dump .sf-dump-const {
			font-weight: bold
		}

		.phpdebugbar pre.sf-dump .sf-dump-str {
			font-weight: bold;
			color: #3A9B26
		}

		.phpdebugbar pre.sf-dump .sf-dump-note {
			color: #1299DA
		}

		.phpdebugbar pre.sf-dump .sf-dump-ref {
			color: #7B7B7B
		}

		.phpdebugbar pre.sf-dump .sf-dump-public {
			color: #000000
		}

		.phpdebugbar pre.sf-dump .sf-dump-protected {
			color: #000000
		}

		.phpdebugbar pre.sf-dump .sf-dump-private {
			color: #000000
		}

		.phpdebugbar pre.sf-dump .sf-dump-meta {
			color: #B729D9
		}

		.phpdebugbar pre.sf-dump .sf-dump-key {
			color: #3A9B26
		}

		.phpdebugbar pre.sf-dump .sf-dump-index {
			color: #1299DA
		}

		.phpdebugbar pre.sf-dump .sf-dump-ellipsis {
			color: #A0A000
		}

		.phpdebugbar pre.sf-dump .sf-dump-ns {
			user-select: none;
		}

		.phpdebugbar pre.sf-dump .sf-dump-ellipsis-note {
			color: #1299DA
		}
	</style>
	<script type="text/javascript">
		var phpdebugbar = new PhpDebugBar.DebugBar();
phpdebugbar.addIndicator("php_version", new PhpDebugBar.DebugBar.Indicator({"icon":"code","tooltip":"Version"}), "right");
phpdebugbar.addTab("messages", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Messages", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
phpdebugbar.addIndicator("time", new PhpDebugBar.DebugBar.Indicator({"icon":"clock-o","tooltip":"Request Duration"}), "right");
phpdebugbar.addTab("timeline", new PhpDebugBar.DebugBar.Tab({"icon":"tasks","title":"Timeline", "widget": new PhpDebugBar.Widgets.TimelineWidget()}));
phpdebugbar.addIndicator("memory", new PhpDebugBar.DebugBar.Indicator({"icon":"cogs","tooltip":"Memory Usage"}), "right");
phpdebugbar.addTab("exceptions", new PhpDebugBar.DebugBar.Tab({"icon":"bug","title":"Exceptions", "widget": new PhpDebugBar.Widgets.ExceptionsWidget()}));
phpdebugbar.addTab("views", new PhpDebugBar.DebugBar.Tab({"icon":"leaf","title":"Views", "widget": new PhpDebugBar.Widgets.TemplatesWidget()}));
phpdebugbar.addTab("route", new PhpDebugBar.DebugBar.Tab({"icon":"share","title":"Route", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
phpdebugbar.addIndicator("currentroute", new PhpDebugBar.DebugBar.Indicator({"icon":"share","tooltip":"Route"}), "right");
phpdebugbar.addTab("queries", new PhpDebugBar.DebugBar.Tab({"icon":"database","title":"Queries", "widget": new PhpDebugBar.Widgets.LaravelSQLQueriesWidget()}));
phpdebugbar.addTab("emails", new PhpDebugBar.DebugBar.Tab({"icon":"inbox","title":"Mails", "widget": new PhpDebugBar.Widgets.MailsWidget()}));
phpdebugbar.addTab("gate", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Gate", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
phpdebugbar.addTab("session", new PhpDebugBar.DebugBar.Tab({"icon":"archive","title":"Session", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
phpdebugbar.addTab("request", new PhpDebugBar.DebugBar.Tab({"icon":"tags","title":"Request", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
phpdebugbar.setDataMap({
"php_version": ["php.version", ],
"messages": ["messages.messages", []],
"messages:badge": ["messages.count", null],
"time": ["time.duration_str", '0ms'],
"timeline": ["time", {}],
"memory": ["memory.peak_usage_str", '0B'],
"exceptions": ["exceptions.exceptions", []],
"exceptions:badge": ["exceptions.count", null],
"views": ["views", []],
"views:badge": ["views.nb_templates", 0],
"route": ["route", {}],
"currentroute": ["route.uri", ],
"queries": ["queries", []],
"queries:badge": ["queries.nb_statements", 0],
"emails": ["swiftmailer_mails.mails", []],
"emails:badge": ["swiftmailer_mails.count", null],
"gate": ["gate.messages", []],
"gate:badge": ["gate.count", null],
"session": ["session", {}],
"request": ["request", {}]
});
phpdebugbar.restoreState();
phpdebugbar.ajaxHandler = new PhpDebugBar.AjaxHandler(phpdebugbar, undefined, true);
phpdebugbar.ajaxHandler.bindToXHR();
phpdebugbar.setOpenHandler(new PhpDebugBar.OpenHandler({"url":"http:\/\/0.0.0.0\/_debugbar\/open"}));
phpdebugbar.addDataSet({"__meta":{"id":"Xf1300816a985e9401ebf7477a9eee862","datetime":"2020-01-12 19:41:02","utime":1578858062.839177,"method":"POST","uri":"\/api\/like?PostId=1","ip":"127.0.0.1"},"php":{"version":"7.2.24-0ubuntu0.18.04.1","interface":"apache2handler"},"messages":{"count":0,"messages":[]},"time":{"start":1578858062.769,"end":1578858062.8392,"duration":0.07019996643066406,"duration_str":"70.2ms","measures":[{"label":"Booting","start":1578858062.769,"relative_start":0,"end":1578858062.78964,"relative_end":1578858062.78964,"duration":0.020639896392822266,"duration_str":"20.64ms","params":[],"collector":null},{"label":"Application","start":1578858062.78996,"relative_start":0.020959854125976562,"end":1578858062.839202,"relative_end":1.9073486328125e-6,"duration":0.04924201965332031,"duration_str":"49.24ms","params":[],"collector":null}]},"memory":{"peak_usage":4361232,"peak_usage_str":"4.16MB"},"exceptions":{"count":1,"exceptions":[{"type":"Illuminate\\Session\\TokenMismatchException","message":"CSRF token mismatch.","code":0,"file":"\/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php","line":83,"stack_trace":"#0 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#1 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php(49): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#2 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\View\\Middleware\\ShareErrorsFromSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#3 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php(56): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#4 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Session\\Middleware\\StartSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#5 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php(37): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#6 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#7 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php(66): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#8 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Cookie\\Middleware\\EncryptCookies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#9 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#10 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(683): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(658): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#12 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(624): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#13 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(613): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#14 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(177): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#15 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(130): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#16 \/var\/www\/html\/your-project\/vendor\/barryvdh\/laravel-debugbar\/src\/Middleware\/InjectDebugbar.php(65): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#17 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Barryvdh\\Debugbar\\Middleware\\InjectDebugbar->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#18 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#19 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#20 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#21 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#22 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#23 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#24 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(62): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#25 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#26 \/var\/www\/html\/your-project\/vendor\/fideloper\/proxy\/src\/TrustProxies.php(57): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#27 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Fideloper\\Proxy\\TrustProxies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#28 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#29 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(152): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#30 \/var\/www\/html\/your-project\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(117): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#31 \/var\/www\/html\/your-project\/public\/index.php(55): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#32 {main}","surrounding_lines":["            });\n","        }\n","\n","        throw new TokenMismatchException('CSRF token mismatch.');\n","    }\n","\n","    \/**\n"],"xdebug_link":null}]},"views":{"nb_templates":2,"templates":[{"name":"errors::419 (vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/views\/419.blade.php)","param_count":2,"params":["errors","exception"],"type":"blade"},{"name":"errors::minimal (vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/views\/minimal.blade.php)","param_count":5,"params":["obLevel","__env","app","errors","exception"],"type":"blade"}]},"route":{"uri":"POST api\/like","middleware":"web","controller":"App\\Http\\Controllers\\PostController@like","namespace":"App\\Http\\Controllers","prefix":null,"where":[],"file":"app\/Http\/Controllers\/PostController.php:136-158"},"queries":{"nb_statements":0,"nb_failed_statements":0,"accumulated_duration":0,"accumulated_duration_str":"0\u03bcs","statements":[]},"swiftmailer_mails":{"count":0,"mails":[]},"gate":{"count":0,"messages":[]},"session":{"_token":"TSwK1cI6bu48D8PVK16Y2uxblunBbBwf0LUxcLD1","_flash":"array:2 [\n  \"old\" => []\n  \"new\" => []\n]","PHPDEBUGBAR_STACK_DATA":"[]"},"request":{"path_info":"\/api\/like","status_code":"<pre class=sf-dump id=sf-dump-596773906 data-indent-pad=\"  \"><span class=sf-dump-num>419<\/span>\n<\/pre><script>Sfdump(\"sf-dump-596773906\", {\"maxDepth\":0})<\/script>\n","status_text":"","format":"html","content_type":"text\/html; charset=UTF-8","request_query":"<pre class=sf-dump id=sf-dump-247827566 data-indent-pad=\"  \"><span class=sf-dump-note>array:1<\/span> [<samp>\n  \"<span class=sf-dump-key>PostId<\/span>\" => \"<span class=sf-dump-str>1<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-247827566\", {\"maxDepth\":0})<\/script>\n","request_request":"<pre class=sf-dump id=sf-dump-807565639 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-807565639\", {\"maxDepth\":0})<\/script>\n","request_headers":"<pre class=sf-dump id=sf-dump-1990962433 data-indent-pad=\"  \"><span class=sf-dump-note>array:9<\/span> [<samp>\n  \"<span class=sf-dump-key>filter<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"4 characters\">date<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>user-agent<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"21 characters\">PostmanRuntime\/7.21.0<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"3 characters\">*\/*<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>cache-control<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">no-cache<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>postman-token<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"36 characters\">df0c85a5-c639-4701-83c8-4d862f54a2f0<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>host<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"7 characters\">0.0.0.0<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-encoding<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"13 characters\">gzip, deflate<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>content-length<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str>0<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>connection<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"10 characters\">keep-alive<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1990962433\", {\"maxDepth\":0})<\/script>\n","request_server":"<pre class=sf-dump id=sf-dump-1726340774 data-indent-pad=\"  \"><span class=sf-dump-note>array:35<\/span> [<samp>\n  \"<span class=sf-dump-key>REDIRECT_STATUS<\/span>\" => \"<span class=sf-dump-str title=\"3 characters\">200<\/span>\"\n  \"<span class=sf-dump-key>HTTP_FILTER<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">date<\/span>\"\n  \"<span class=sf-dump-key>HTTP_USER_AGENT<\/span>\" => \"<span class=sf-dump-str title=\"21 characters\">PostmanRuntime\/7.21.0<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT<\/span>\" => \"<span class=sf-dump-str title=\"3 characters\">*\/*<\/span>\"\n  \"<span class=sf-dump-key>HTTP_CACHE_CONTROL<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">no-cache<\/span>\"\n  \"<span class=sf-dump-key>HTTP_POSTMAN_TOKEN<\/span>\" => \"<span class=sf-dump-str title=\"36 characters\">df0c85a5-c639-4701-83c8-4d862f54a2f0<\/span>\"\n  \"<span class=sf-dump-key>HTTP_HOST<\/span>\" => \"<span class=sf-dump-str title=\"7 characters\">0.0.0.0<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_ENCODING<\/span>\" => \"<span class=sf-dump-str title=\"13 characters\">gzip, deflate<\/span>\"\n  \"<span class=sf-dump-key>CONTENT_LENGTH<\/span>\" => \"<span class=sf-dump-str>0<\/span>\"\n  \"<span class=sf-dump-key>HTTP_CONNECTION<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">keep-alive<\/span>\"\n  \"<span class=sf-dump-key>PATH<\/span>\" => \"<span class=sf-dump-str title=\"70 characters\">\/usr\/local\/sbin:\/usr\/local\/bin:\/usr\/sbin:\/usr\/bin:\/sbin:\/bin:\/snap\/bin<\/span>\"\n  \"<span class=sf-dump-key>SERVER_SIGNATURE<\/span>\" => \"<span class=sf-dump-str title=\"68 characters\">&lt;address&gt;Apache\/2.4.29 (Ubuntu) Server at 0.0.0.0 Port 80&lt;\/address&gt;<span class=\"sf-dump-default sf-dump-ns\">\\n<\/span><\/span>\"\n  \"<span class=sf-dump-key>SERVER_SOFTWARE<\/span>\" => \"<span class=sf-dump-str title=\"22 characters\">Apache\/2.4.29 (Ubuntu)<\/span>\"\n  \"<span class=sf-dump-key>SERVER_NAME<\/span>\" => \"<span class=sf-dump-str title=\"7 characters\">0.0.0.0<\/span>\"\n  \"<span class=sf-dump-key>SERVER_ADDR<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">127.0.0.1<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PORT<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">80<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_ADDR<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">127.0.0.1<\/span>\"\n  \"<span class=sf-dump-key>DOCUMENT_ROOT<\/span>\" => \"<span class=sf-dump-str title=\"33 characters\">\/var\/www\/html\/your-project\/public<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_SCHEME<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">http<\/span>\"\n  \"<span class=sf-dump-key>CONTEXT_PREFIX<\/span>\" => \"\"\n  \"<span class=sf-dump-key>CONTEXT_DOCUMENT_ROOT<\/span>\" => \"<span class=sf-dump-str title=\"33 characters\">\/var\/www\/html\/your-project\/public<\/span>\"\n  \"<span class=sf-dump-key>SERVER_ADMIN<\/span>\" => \"<span class=sf-dump-str title=\"19 characters\">webmaster@localhost<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_FILENAME<\/span>\" => \"<span class=sf-dump-str title=\"43 characters\">\/var\/www\/html\/your-project\/public\/index.php<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_PORT<\/span>\" => \"<span class=sf-dump-str title=\"5 characters\">55382<\/span>\"\n  \"<span class=sf-dump-key>REDIRECT_URL<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">\/api\/like<\/span>\"\n  \"<span class=sf-dump-key>REDIRECT_QUERY_STRING<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">PostId=1<\/span>\"\n  \"<span class=sf-dump-key>GATEWAY_INTERFACE<\/span>\" => \"<span class=sf-dump-str title=\"7 characters\">CGI\/1.1<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PROTOCOL<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">HTTP\/1.1<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_METHOD<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">POST<\/span>\"\n  \"<span class=sf-dump-key>QUERY_STRING<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">PostId=1<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_URI<\/span>\" => \"<span class=sf-dump-str title=\"18 characters\">\/api\/like?PostId=1<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_NAME<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">\/index.php<\/span>\"\n  \"<span class=sf-dump-key>PHP_SELF<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">\/index.php<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_TIME_FLOAT<\/span>\" => <span class=sf-dump-num>1578858062.769<\/span>\n  \"<span class=sf-dump-key>REQUEST_TIME<\/span>\" => <span class=sf-dump-num>1578858062<\/span>\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1726340774\", {\"maxDepth\":0})<\/script>\n","request_cookies":"<pre class=sf-dump id=sf-dump-1075936352 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-1075936352\", {\"maxDepth\":0})<\/script>\n","response_headers":"<pre class=sf-dump id=sf-dump-1937601800 data-indent-pad=\"  \"><span class=sf-dump-note>array:5<\/span> [<samp>\n  \"<span class=sf-dump-key>cache-control<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"17 characters\">no-cache, private<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>date<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"29 characters\">Sun, 12 Jan 2020 19:41:02 GMT<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>content-type<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"24 characters\">text\/html; charset=UTF-8<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>set-cookie<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"331 characters\">laravel_session=eyJpdiI6Im90d0E3M25pNUdaalwveDNTaUFWemhnPT0iLCJ2YWx1ZSI6IlpUY1FvXC9LQ29wakVacVNFRDJrZkRVRW81dk9Qa0x4cGw2QTRCRFJSRVVVcmFtV2RWSFFOaUZjK3lUblprUFl1IiwibWFjIjoiYzRlNmM2OGE5NjcwNWZkZTQ4M2E4NmM4Nzg5MzcxNDg3NjcxMWRhZTM1YWYzZTA3Njk4NmUzM2FlODk4ZDI4YyJ9; expires=Sun, 12-Jan-2020 21:41:02 GMT; Max-Age=7200; path=\/; httponly<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>Set-Cookie<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"317 characters\">laravel_session=eyJpdiI6Im90d0E3M25pNUdaalwveDNTaUFWemhnPT0iLCJ2YWx1ZSI6IlpUY1FvXC9LQ29wakVacVNFRDJrZkRVRW81dk9Qa0x4cGw2QTRCRFJSRVVVcmFtV2RWSFFOaUZjK3lUblprUFl1IiwibWFjIjoiYzRlNmM2OGE5NjcwNWZkZTQ4M2E4NmM4Nzg5MzcxNDg3NjcxMWRhZTM1YWYzZTA3Njk4NmUzM2FlODk4ZDI4YyJ9; expires=Sun, 12-Jan-2020 21:41:02 GMT; path=\/; httponly<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1937601800\", {\"maxDepth\":0})<\/script>\n","session_attributes":"<pre class=sf-dump id=sf-dump-1902949042 data-indent-pad=\"  \"><span class=sf-dump-note>array:3<\/span> [<samp>\n  \"<span class=sf-dump-key>_token<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">TSwK1cI6bu48D8PVK16Y2uxblunBbBwf0LUxcLD1<\/span>\"\n  \"<span class=sf-dump-key>_flash<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp>\n    \"<span class=sf-dump-key>old<\/span>\" => []\n    \"<span class=sf-dump-key>new<\/span>\" => []\n  <\/samp>]\n  \"<span class=sf-dump-key>PHPDEBUGBAR_STACK_DATA<\/span>\" => []\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1902949042\", {\"maxDepth\":0})<\/script>\n"}}, "Xf1300816a985e9401ebf7477a9eee862");

	</script>
</body>

</html>