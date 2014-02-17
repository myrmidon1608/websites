<!DOCTYPE html>
<html>
	<head>
    	<title>RSS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0-rc.1/jquery.mobile-1.1.0-rc.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.1.0-rc.1/jquery.mobile-1.1.0-rc.1.min.js"></script>
        <style type="text/css">
			a {
				color:#666666;
				text-decoration:none;}
			
			a:hover{
				text-decoration:underline;
			}
				
            table {
                border:1px solid #CCCCCC;
                border-collapse:collapse;
            }
 
            th {
                text-align:left;
                background-color:#CCCCCC;
                border-bottom:2px solid #666666;
                padding:10px;
            }
 
            td {
                border:1px solid #CCCCCC;
                padding:0px 10px;
            }
        </style>
    </head>
    
    <body>
    	<div data-role="page">
        	<div data-role="header">
            <h1>RSS</h1>
            </div>
			{if $echo}
            	<p style="color: #090">{$echo}</p>
        	{/if}
            <form method="post" action="index.php?state=add">
                <div data-role="header" data-theme="d"><h2>URL</h2></div><br />
                <input type="text" name="rssurl" size="99" /><br /><br />
                <div data-role="header" data-theme="d"><h2>Title</h2></div><br/>
                <input type="text" name="rsstitle" size="99" /><br /><br/>
                <input type="submit" name="submit" value="Submit" />
        	</form>
        	<hr />
   			<div data-role="content">
    			<table>
        			<tr>
                        <th>RSS Feeds</th>
                        <th>Actions</th>
        			</tr>
      				{section name = info loop = $rss}
            		<tr>
                        <td><h3>{$rss[info].title}</h3></td>
                        <td><a href="index.php?state=view&feed_id={$rss[info].id}">View</a> | <a href="index.php?state=delete&feed_id={$rss[info].id}">Delete</a></td>	
            		</tr>
                 	{/section}
        		</table>
    		</div>
		</div>
	</body>
</html>