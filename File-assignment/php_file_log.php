<!DOCTYPE html>
<html>

<body>
    <p>Reload để lưu time đăng nhập url</p>
</body>

</html>


<?php
function createLog()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $myfile = "log.txt";
        file_put_contents($myfile, "Truy cập lúc: $date" . "\n", FILE_APPEND);
        $content = file_get_contents($myfile);
        echo "Nội dung file log.txt là :";
        echo nl2br($content);
    }
}
createLog();
?>