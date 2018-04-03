<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>菜鸟教程(runoob.com)</title>
    <script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $.post("http://localhost/jqueryajax/jieshou.php",{
                        name:"菜鸟教程",
                        url:"http://www.runoob.com"
                    },
                    function(data,status){
                        alert("数据: \n" + data + "\n状态: " + status);
                        $('p').text(data);
                    });
            });
        });
    </script>
</head>
<body>
<p>yguyguugugygu</p>
<button>发送一个 HTTP POST 请求页面并获取返回内容</button>

</body>
</html>