<?php
//require_once "../rikang/common/header.php";
session_start();
require_once "common/validate_login.php";
require_once "class/Question.class.php";
require_once "class/AllQuestion.class.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>模拟考试系统</title>
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
        <script type="text/javascript">
            var exam_id = <?php echo $_GET['id'];?>;
            var ts = <?php echo ($_GET['id'] == 20 || $_GET['id'] == 21 || $_GET['id'] == 22) ? '55' : '50';?> ;
            ts = <?php echo ($_GET['id'] == 30) ? '100' : ts;?>;
            ts = <?php echo ($_GET['id'] == 45) ? '300' : ts;?>;
            ts *= 60;
            
        </script>
        <div class="container">
        <aside id="menu">
            <ul>
                <li><a href="javascript:location.reload();">重新考试</a></li> 
                <li><a href="choose.php">试题列表</a></li> 
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
        <header>
            <span id="more-menu" class="more_menu"></span>
            <span>剩余时间 <d id="timer"></d></span>         
            <span onclick="upload()">交卷 <d id="score"></d></span>
        </header>
        	
        <div id="wrapper" class = "content">
        <?php
		if ($_GET['id'] == '2') {
			$qs = new Questions('data/dx.txt');
			$qs->writeRandom(100);
        } else if ($_GET['id'] == '3') {
            $qs = new AllQuestion('data/datanet.txt');
            $qs->write();
        } else if ($_GET['id'] == '4') {
            $qs = new AllQuestion('data/info_basic.txt');
            $qs->write();
        } else if ($_GET['id'] == '5') {
            $qs = new AllQuestion('data/wireless[fix_2_2].txt');
            $qs->write();
        } else if ($_GET['id'] == '6') {
            $qs = new AllQuestion('data/idc.txt');
            $qs->write();
        } else if ($_GET['id'] == '7') {
            $qs = new AllQuestion('data/internetsafe.txt');
            $qs->write();
        } else if ($_GET['id'] == '8') {
            $qs = new AllQuestion('data/corenet.txt');
            $qs->write();
        } else if ($_GET['id'] == '9') {
            $qs = new AllQuestion('data/terminal.txt');
            $qs->write();
        } else if ($_GET['id'] == '10') {
            $qs = new AllQuestion('data/sgcc_fresh_train_culture.txt');
            $qs->write();
        } else if ($_GET['id'] == '11') {
            $qs = new AllQuestion('data/sgcc_fresh_train_makings.txt');
            $qs->write();
        } else if ($_GET['id'] == '12') {
            $qs = new AllQuestion('data/sgcc_fresh_train_skill.txt');
            $qs->write();
        } else if ($_GET['id'] == '13') {
            $qs = new AllQuestion('data/sgcc_fresh_train_business.txt');
            $qs->write();
        } else if ($_GET['id'] == '14') {
            $qs = new AllQuestion('data/dlpd_cjg.txt');
            $qs->write();
        } else if ($_GET['id'] == '15') {
            $qs = new AllQuestion('data/dlpd_zjg.txt');
            $qs->write();
        } else if ($_GET['id'] == '16') {
            $qs = new AllQuestion('data/dlpd_gjg.txt');
            $qs->write();
        } else if ($_GET['id'] == '17') {
            $qs = new AllQuestion('data/dlpd_js.txt');
            $qs->write();
        } else if ($_GET['id'] == '18') {
            $qs = new AllQuestion('data/dlpd_gjjs.txt');
            $qs->write();
        } else if ($_GET['id'] == '19') {
            $qs = new AllQuestion('data/sdxl_danx_cjg.txt');
            $qs->write();
        } else if ($_GET['id'] == '20') {
            $qs = new AllQuestion('data/sgcc_fresh_train_line.txt');
            $qs->write();
        } else if ($_GET['id'] == '21') {
            $qs = new AllQuestion('data/2016_nj_zz.txt');
            $qs->write();
        } else if ($_GET['id'] == '22') {
            $qs = new AllQuestion('data/2016_nj_xl.txt');
            $qs->write();
        } else if ($_GET['id'] == '23') {
            $qs = new AllQuestion('data/zz_dxt.txt');
            $qs->write();
        } else if ($_GET['id'] == '24') {
            $qs = new AllQuestion('data/zz_pad_cj.txt');
            $qs->write();
        } else if ($_GET['id'] == '25') {
            $qs = new AllQuestion('data/zz_dxt_zjg.txt');
            $qs->write();
        } else if ($_GET['id'] == '26') {
            $qs = new AllQuestion('data/zz_dx_zjg.txt');
            $qs->write();
        } else if ($_GET['id'] == '27') {
            $qs = new AllQuestion('data/zz_pd_zjg.txt');
            $qs->write();
        }  else if ($_GET['id'] == '28') {
            $qs = new AllQuestion('data/zz_100.txt');
            $qs->writeNum(33);
        }  else if ($_GET['id'] == '30') {
            $qs = new AllQuestion('data/xlag_dx.txt');
            $qs->write();
        }  else if ($_GET['id'] == '31') {
            $qs = new AllQuestion('data/xlag_ddx.txt');
            $qs->write();
        }  else if ($_GET['id'] == '32') {
            $qs = new AllQuestion('data/xlan_pd.txt');
            $qs->write();
        }  else if ($_GET['id'] == '33') {
            $qs = new AllQuestion('data/xlag.txt');
            $qs->writeNum(66);
        }  else if ($_GET['id'] == '40' && ($_SESSION['permission'] == 0 ||  $_SESSION['permission'] == 10)) {
            $qs = new AllQuestion('data/pms2.0_dx.txt');
            $qs->write();
        }  else if ($_GET['id'] == '41' && ($_SESSION['permission'] == 0 ||  $_SESSION['permission'] == 10)) {
            $qs = new AllQuestion('data/pms2.0_ddx.txt');
            $qs->write();
        }  else if ($_GET['id'] == '42' && ($_SESSION['permission'] == 0 ||  $_SESSION['permission'] == 10)) {
            $qs = new AllQuestion('data/pms2.0_pd.txt');
            $qs->write();
        }  else if ($_GET['id'] == '45') {
            $qs = new AllQuestion('data/10千伏配网架空线路带电作业技能竞赛.txt');
            $qs->write();
        }
		?>
        </div>
        <footer>Copyright© YP STUDIO. 2016.<br/>Email: yaopengdn@126.com</footer>
        </div>
        </div>
        <script type="text/javascript" src="js/common.js?v=201606011"></script>
        <script type="text/javascript" src="js/page.js?v=201606011"></script>
        <script type="text/javascript">
            //$("#score").bind('click', upload);
            showTime();
            var tr = setInterval("timer()",1000);
            function timer()  
            {  
                
            	ts = ts - 1; 
                showTime();
                if (ts == 0) {
                    upload();
                    alert('考试时间已到');
                }                 
               	
            }
            
            function showTime() {
                var hh = parseInt(ts / 3600, 10);
                var mm = parseInt(ts / 60 % 60, 10);
                var ss = parseInt(ts % 60, 10);
       			hh = checkTime(hh);
                mm = checkTime(mm);  
                ss = checkTime(ss);  
                document.getElementById("timer").innerHTML = hh + ":" + mm + ":" + ss;  
            }
            
            function checkTime(i)    
            {    
               if (i < 10) {
                   i = "0" + i;    
               }    
               return i;    
            }  
            
            function upload() {
                clearTimeout(tr);
                $("#score").parent().removeAttr("onclick");
                var qs = $('.question div');
                var len = qs.length;
                var right = 0;
                console.log(len);
                for (var i = 0; i < len; i++) {
                    var ans = "";
                    $(qs[i]).find('input:checkbox:checked, input:radio:checked').each(function (i) {
                        ans += $(this).val();   
                    });
                    var result = $(qs[i]).children('input:hidden').val();
                    
                    if (ans.toLowerCase() == result.toLowerCase()) {
                        $(qs[i]).remove();
                        right++;
                    } else {
                        $(qs[i]).children('input:hidden').after('<p style="color: green">正确答案：' + result + ';</p>');
                    }
                    myScroll.refresh();
                }
                var grade = (right / len * 100).toFixed(2);
                $('#score').html(grade);
                $.ajax({
        			url: 'ajax/post_grade.php',
        			type: 'post',
        			data: {grade: grade, exam_id : exam_id},
        			dataType: 'html',
        			success: function(data) {
        			}
    			});
            }
        </script>
    </body>
</html>

<?php
//require_once "../rikang/common/footer.php";
?>