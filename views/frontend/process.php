<?php
if (isset($_POST['submit'])) {
    $name = array();
    $tmp_name = array();
    $error = array();
    $ext = array();
    $size = array();
    foreach ($_FILES['file']['name'] as $file) {
        $name[] = $file;
    }
    foreach ($_FILES['file']['tmp_name'] as $file) {
        $tmp_name[] = $file;
    }
    foreach ($_FILES['file']['error'] as $file) {
        $error[] = $file;
    }
    foreach ($_FILES['file']['type'] as $file) {
        $ext[] = $file;
    }
    foreach ($_FILES['file']['size'] as $file) {
        $size[] = round($file / 1024, 2);
    } //Phần này lấy giá trị ra từng mảng nhỏ

    echo "Tổng số file được tải lên: " . count($name) . " file";
    echo "\n\nTên file\nLoại\nKích thước\nThư mục";
    for ($i = 0; $i < count($name); $i++) {
        if ($error[$i] < 0) {
            echo "Lỗi: " . $error[$i];
        } else
if ($ext[$i] != 'application/save') {
            echo "File không được hổ trợ" . $ext[$i];
        } else {
            $temp = preg_split('/[\/\\\\]+/', $name[$i]);
            $filename = $temp[count($temp) - 1];
            $upload_dir = "../download/";
            $upload_file = $upload_dir . $filename;
            if (file_exists($upload_file)) {
                echo 'File đã tồn tại';
            } else {
                if (move_uploaded_file($tmp_name[$i], $upload_file)) {
                    echo "\n<p>" . $name[$i] . "</p>\n";
                    echo "\n<p>" . $ext[$i] . "</p>\n";
                    echo "\n<p>" . $size[$i] . " kB</p>\n";
                    echo "\n<p>" . $upload_file . "</p>\n";

                    $date = date("d-m-Y");
                    @mysqli_connect('stringhost', 'stringUsername', 'stringPass', 'stringDatabase');
                    @mysqli_query($conn, "INSERT INTO `tablename` VALUES (null,'{$name[$i]}','{$size[$i]}','$upload_dir','$date',0)") or
                        die("Bi loi them du lieu" . mysqli_error($conn));
                    @mysqli_close($conn);
                } else
                    echo 'loi';
            }
        } //End khoi cau lenh up file va them vao CSDL;
    } //End vong lap for cho tat ca cac file;
    echo '</p>';
}
