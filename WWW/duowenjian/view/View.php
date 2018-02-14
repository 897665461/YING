<?php

class View
{
    public function biaodan()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>文件上传</title>
    </head>
    <body>
    <form name="wenjian" method="post" action="/chuandi" enctype="multipart/form-data">
        文件1：<input type="file" name="kuang"><br/>
        文件2：<input type="file" name="kuang"><br/>
        文件3：<input type="file" name="kuang"><br/>
        <input type="submit" value="提交">
    </form>
    </body>
    </html>
    <?php
    }
}


?>
