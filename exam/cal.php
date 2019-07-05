<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>经纬仪计算</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="white">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" media="screen and (min-device-width: 800px)" href="css/widestyle.css" />
        <script type="text/javascript" src="../rikang/js/jquery-1.7.1.min.js"></script>
		<style type="text/css">
            input {
                border-radius: 0;
            }
            
            .deg {
                width: 40px;
            }
            
            .content {
                width: 100%;
            }
            
            textarea {
                width: 80%;
                height: 4rem;
            }
            
            .content>div {
                margin: 5px;
            }
            
            button {
                border: none;
                width: 80px;
                color: white;
                padding: 5px;
                background-color: #333;
            }
            
            .result_span {
                font-weight: bold;
                font-size: 2rem;
                color: red;
                
            }
		</style>
    </head>
    <body>
        <div class="content">
            <div><span>丝1</span><input type="number" id="ss"/></div>
            <div><span>丝2</span><input type="number" id="xs"/></div>
            <div><span>仰角</span>
                <input id="yjd" type="tel" class="deg" maxlength="3" value="270"/>°
                <input id="yjm" type="tel" class="deg" maxlength="2" value="0"/>′
                <input id="yjs" type="number"  value="0" class="deg"/>″</div>
            <div><span>--------------------------------------</span></div>
            <div><span>角度1</span>
                <input id="ydsd" type="tel" class="deg" maxlength="3"/>°
                <input id="ydsm" type="tel" class="deg" maxlength="2"/>′
                <input id="ydss" type="number" class="deg"/>″</div>
            <div><span>角度2</span>
                <input id="ydxd" type="tel" class="deg" maxlength="3"/>°
                <input id="ydxm" type="tel" class="deg" maxlength="2"/>′
                <input id="ydxs" type="number" class="deg"/>″</div>
            <div><button onclick="cal();">计算</button></div>
            <div id = "result"></div>
            <div><span>草稿区</span><br/><textarea></textarea></div>
        </div>
        
        <script type="text/javascript">
            
            function cal() {
                var html = "";
                var ss = $('#ss').val();
                var xs = $('#xs').val();
                
                if (xs > ss) {
                    var t = xs;
                    xs = ss;
                    ss = t;
                }
                
                var yj = parseFloat($('#yjd').val()) + parseFloat($('#yjm').val() / 60) +  parseFloat($('#yjs').val() / 3600);
                
                var yj_b = yj - 270;
                var yj_cos2 = Math.pow(Math.cos(toArc(yj_b)), 2)
                html += "丝差 = " + (ss - xs) + "<br/>";
                html += "仰角 = " + yj_b + " cos^2 = " + yj_cos2 + "<br/>";
                var D = (ss - xs) * yj_cos2 * 100;
                
                var yds =  parseFloat($('#ydsd').val()) +  parseFloat($('#ydsm').val() / 60) +   parseFloat($('#ydss').val() / 3600);
                var ydx =  parseFloat($('#ydxd').val()) +  parseFloat($('#ydxm').val() / 60) +   parseFloat($('#ydxs').val() / 3600);
                
                
                if (ydx > yds) {
                    var t = yds;
                    yds = ydx;
                    ydx = t;
                }
                
                var yds_b = yds - 270;
                var yds_tan = Math.tan(toArc(yds_b));
                var ydx_b = ydx - 270;
                var ydx_tan = Math.tan(toArc(ydx_b));
                
                html += "角度上 = " + yds_b + " tan = " + yds_tan + "<br/>";
                html += "角度下 = " + ydx_b + " tan = " + ydx_tan + "<br/>";
                
                var r = D * (yds_tan - ydx_tan);
                
                var result = '<span class="result_span">高差: ' + r + '</span><br/>';
                $('div#result').html(result + html);
            }
            
            function toArc(n) {
                return n *  0.017453293;
            }
            
            
            
        </script>
    </body>
</html>