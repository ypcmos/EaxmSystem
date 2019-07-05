<?php
session_start();
require_once "common/validate_login.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>选择题库</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="white">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" media="screen and (min-device-width: 800px)" href="css/widestyle.css" />
        <script type="text/javascript" src="../rikang/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/sha1.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/iscroll.js"></script>
        
    </head>
    <body>
        <div class="container">
            <aside id="menu">
                <ul>
                    <li><a href="logout.php">注销</a></li>       
                    <?php if ($_SESSION['permission'] < 2) {
                    ?>
                    <li><a href="results.php">成绩统计</a></li>  
                    <?php
                    }
                    ?>
                    <li><a href="http://github.com/ypcmos">开源项目</a></li>    			
                </ul>
            </aside>
        
            <div id="main" class="main">
                <header class="index_header">
                    <a class="more_menu" id="more-menu"></a>
                    <span>模拟考试系统</span>                   
                </header>
                <div id="wrapper" class="content whole_width">
                    <div id="scroller">
                        <ul>
                            <li>电缆竞赛单选题</li>
                            <li onclick="window.location.href='test.php?id=2'" class="pointer">电缆竞赛多选题</li>
                            <li>电缆竞赛判断题</li>
                            <li onclick="window.location.href='test.php?id=3'" class="pointer">数据网</li>
                            <li onclick="window.location.href='test.php?id=6'" class="pointer">IDC和云</li>
                            <li onclick="window.location.href='test.php?id=7'" class="pointer">网络安全</li>
                            <li onclick="window.location.href='test.php?id=5'" class="pointer">无线网</li>
                            <li onclick="window.location.href='test.php?id=8'" class="pointer">核心网</li>
                            <li onclick="window.location.href='test.php?id=9'" class="pointer">接入与终端</li>
                            <li onclick="window.location.href='test.php?id=4'" class="pointer">通信基础知识</li>
                            <li onclick="window.location.href='test.php?id=10'" class="pointer">2016国网培训-企业文化</li>
                            <li onclick="window.location.href='test.php?id=11'" class="pointer">2016国网培训-素质提升</li>
                            <li onclick="window.location.href='test.php?id=12'" class="pointer">2016国网培训-基本技能</li>
                            <li onclick="window.location.href='test.php?id=13'" class="pointer">2016国网培训-主营业务</li>
                            <li onclick="window.location.href='test.php?id=20'" class="pointer">2016国网培训-输电线路运检 （专业）</li>
                            <li onclick="window.location.href='test.php?id=14'" class="pointer">电缆判断题-初级工</li>
                            <li onclick="window.location.href='test.php?id=15'" class="pointer">电缆判断题-中级工</li>
                            <li onclick="window.location.href='test.php?id=16'" class="pointer">电缆判断题-高级工</li>
                            <li onclick="window.location.href='test.php?id=17'" class="pointer">电缆判断题-技师</li>
                            <li onclick="window.location.href='test.php?id=18'" class="pointer">电缆判断题-高级技师</li>
                            <li onclick="window.location.href='test.php?id=19'" class="pointer">线路单选题-初级工</li>
                            <li onclick="window.location.href='test.php?id=23'" class="pointer">线路多选题-初级工</li>
                            <li onclick="window.location.href='test.php?id=24'" class="pointer">线路判断题-初级工</li>
                            <li onclick="window.location.href='test.php?id=25'" class="pointer">线路单选题-中级工</li>
                            <li onclick="window.location.href='test.php?id=26'" class="pointer">线路多选题-中级工</li>
                            <li onclick="window.location.href='test.php?id=27'" class="pointer">线路判断题-中级工</li>
                            <li onclick="window.location.href='test.php?id=28'" class="pointer">线路转正(随机99题)</li>
                            <li onclick="window.location.href='test.php?id=21'" class="pointer">2016南京电缆转正</li>
                            <li onclick="window.location.href='test.php?id=22'" class="pointer">2016南京线路转正</li>
                            <li onclick="window.location.href='test.php?id=30'" class="pointer">2016线路安规-单选题</li>
                            <li onclick="window.location.href='test.php?id=31'" class="pointer">2016线路安规-多选题</li>
                            <li onclick="window.location.href='test.php?id=32'" class="pointer">2016线路安规-判断题</li>
                            <li onclick="window.location.href='test.php?id=33'" class="pointer">2016线路安规(随机198题)</li>
                            <?php if ($_SESSION['permission'] == 0 ||  $_SESSION['permission'] == 10) {
                        	?>
                            <li onclick="window.location.href='test.php?id=40'" class="pointer">2016PMS2.0-单选题</li>
                            <li onclick="window.location.href='test.php?id=41'" class="pointer">2016PMS2.0-多选题</li>
                            <li onclick="window.location.href='test.php?id=42'" class="pointer">2016PMS2.0-判断题</li>
                            
                            <?php }
                        	?>
                            <li onclick="window.location.href='test.php?id=45'" class="pointer">10千伏配网架空线路带电作业技能竞赛</li>
                        </ul>
                    </div>
                	
        		</div>
                <footer>Copyright© YP STUDIO. 2016.<br/>Email: yaopengdn@126.com</footer>
        	</div>
        </div>
        <script type="text/javascript" src="js/common.js?v=201606011"></script>
        <script type="text/javascript" src="js/page.js?v=201606011"></script>
      </body>
</html>