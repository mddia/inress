{include file='../inc.doctype.tpl'}
	<head>
		{include file='inc.head.tpl'}
		{include file='admin/inc.css.tpl'}
		{include file='admin/inc.javascript.tpl'}
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Administration - {$TITLE}</title>
	</head>
	<body>
		<div id="wrap">
			{include file='admin/pages/board.topInfos.tpl'}
			<!--  -->
			<div id="page-body">
				{include file='admin/pages/board.menu.tpl'}
				{include file="admin/pages/board.content.tpl"}				
			</div>
			{include file='admin/pages/board.footer.tpl'}
		</div>
	</body>
</html>