<{if $page.count gt 1}>
	<{if $page.current gt 1}>
        <a  href="<{$page.url}>&page=1">首页</a>
	<a  href="<{$page.url}>&page=<{$page.current-1}>">上一页</a>
	<{/if}>
	<{if $page.current ne $page.count}>
	<a  href="<{$page.url}>&page=<{$page.current+1}>">下一页</a>
        <a  href="<{$page.url}>&page=<{$page.count}>">末页</a>
	<{/if}>
<{/if}>