<?php
session_start();
require_once "common/validate_login.php";
require_once "common/validate_permission.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>成绩统计</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="white">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" media="screen and (min-device-width: 800px)" href="css/widestyle.css" />
        <script type="text/javascript" src="../rikang/js/jquery-1.7.1.min.js"></script>    
        <script type="text/javascript" src="js/iscroll.js"></script>
    </head>
    <body>
        <div class="container">
            <aside id="menu">
                <ul>
                    <li><a href="choose.php">试题列表</a></li>
                    <li><a href="logout.php">注销</a></li> 
                    <li><a href="http://github.com/ypcmos">开源项目</a></li>  			
                </ul>
            </aside>
        
            <div id="main" class="main">
                 <header class="index_header">
                    <a class="more_menu" id="more-menu"></a>
                    <span>模拟考试系统</span>                   
                </header>
                <div id="wrapper" class="content">
                    <div id = "results">
                    </div>
                </div>
                <footer>Copyright© YP STUDIO. 2016.<br/>Email: yaopengdn@126.com</footer>
            </div>
        </div>
        <script type="text/javascript" src="js/common.js?v=20160601"></script>
        <script type="text/javascript" src="js/page.js?v=20160601"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajax({
                url: 'ajax/get_results.php',
                type: 'post',
                dataType: 'json',
                success: function(obj) {
                        console.log(obj);
                    	var html = '<table border="0" cellpadding="0" cellspacing="0" align="center"><tr><th>用户名</th><th>题型</th><th>成绩</th><th>时间</th></tr>';
                        for (var i = 0; i < obj.length; i++) {
                            obj[i] = eval('(' + obj[i] + ')');
                            console.log(obj[i].time);
                            html += "<tr><td>" + obj[i].user_name + "</td><td>" + obj[i].exam_id + "</td><td>" + obj[i].grade + "</td><td>" + obj[i].time + "</td></tr>";
                    	}
                    	html += "</table>";
                    	$('#results').html(html);
                    	myScroll.refresh();
                	}
                });
            });
        </script>
    </body>
</html>