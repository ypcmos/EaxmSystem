<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>登录</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="white">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" media="screen and (min-device-width: 800px)" href="css/widestyle.css" />
        <script type="text/javascript" src="../rikang/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/sha1.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        
    </head>
    <body>
        <div class="container">
            <aside id="menu">
                <ul>
                    <li><a onclick="alert('功能建设中');">注册</a></li>
                    <li><a href="data/格式.docx">题库导入格式</a></li> 
                    <li><a href="http://github.com/ypcmos">开源项目</a></li>  			
                </ul>
            </aside>
        
            <div id="main" class="main">
                <header class="index_header">
                    <a class="more_menu" id="more-menu"></a>
                    <span>模拟考试系统</span>                   
                </header>
                <div id="wrapper" class="content">
                    <div class="login">
                        <div class="login_title">
                            <span>登录</span>
                        </div>
                        <div class="login_body">
                            <div class="login_content">
                                <img src="img/user.png"/>
                                <input id="username" type="text"placeholder="用户名" autocomplete="off">    
                            </div>
                            
                            <div class="login_content">
                                <img src="img/password.png"/>
                                <input type="password" id="password" placeholder="密码" autocomplete="off">                 
                            </div>
                            <div class="login_submit">
                                <input type="button" id="login" class="submit"/>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>Copyright© YP STUDIO. 2016.<br/>Email: yaopengdn@126.com</footer>
            </div>
        </div>
        <script type="text/javascript" src="js/common.js?v=20160601"></script>
        <script type="text/javascript" src="js/indexpage.js?v=20160611"></script>
    </body>
</html>