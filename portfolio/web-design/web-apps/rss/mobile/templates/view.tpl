<!DOCTYPE html>
<html>
<head>
<title>RSS</title>
</head>
	<body>
		<div data-role="page" data-add-back-btn="true">
            <div data-role="header" data-theme="a">
            <h1>RSS</h1> 
  			</div>
            
			{section name = info loop = $items}
 			<h3>{$items[info].title}</h3>

                <h4><a href=\"{$items[info].link}\" target=\"_blank\">{$items[info].title}</a> ({$items[info].pubDate})</h4>
              	<p>{$items[info].description}</p>
                <hr />
			{/section}
 		</div>
	</body>
</html>