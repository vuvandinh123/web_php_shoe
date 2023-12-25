<?php
namespace App\Libraries;
class Upload
{
public static function saveFile($args = [])
    {
        $upload = 1;
        $message = '';
        if (is_array($args) && array_key_exists('path_dir', $args) == true && array_key_exists('file', $args) == true) {
            $path_dir = $args['path_dir'];
            $file = $args['file'];
            $file_name = $file['name'];
            $path_file_name = $path_dir . basename($file_name);
            $type_file = strtolower(pathinfo($path_file_name, PATHINFO_EXTENSION));
            $extention = null;
            $maxsize = null;
            $rename = null;
            if (array_key_exists('extention', $args) == true) {
                $extention = $args['extention'];

            }
            if (array_key_exists('maxsize', $args) == true) {
                $maxsize = $args['maxsize'];
            }
            if (array_key_exists('rename', $args) == true) {
                $rename = $args['rename'];
                $path_file_name = $path_dir . $rename . '.' . $type_file;
                $file_name = $rename . '.' . $type_file;
            }
            if (!in_array($type_file, $extention)) {
                $upload = 0;
                $message = 'không hỗ trợ định dạng';
            }
            // if (file_exists($path_file_name)) {
            //     $upload = 0;
            //     $message = 'tập tin đã tồn tại';
            // }
            if ($file['size'] > $maxsize) {
                $upload = 0;
                $message = 'kích thước quá lớn';


            } 
            
            
        }
        else {
            $upload = 0;
            $mesage = 'tham số chuyền vào không đúng';

        }
        if ($upload == 1) {
            if (move_uploaded_file($file['tmp_name'], $path_file_name)) {
                $message = $file_name;
                $upload = true;
            }
        }
      
        return ['success' => $upload, 'result' => $message];
    }

    public static function deleteFile($args = [])
    {
        if(is_array($args)&&array_key_exists('path_dir',$args)==true&&array_key_exists('file',$args)==true)
        {
            $path_file_name = $args['path_dir'] . basename($args['file']);
            unlink($path_file_name);
        }
    }
    
}
class Pagination
{
    public static function pageCurrent()
    {
        $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $page = (is_numeric($page)) ? $page : 1;
        $page = ($page<=0)?1: $page;
        return $page;
    }
    public static function pageOffset($page, $limit)
    {
        return ($page - 1) * $limit;
    }
    public static function pageLinks($total, $current, $limit, $url = '')
    {
        if ($total == 0) return '';
        $numPage = floor($total / $limit);
        if (($total/$limit) - $numPage > 0)
        {
            $numPage += 1;
        }
        $html = "<ul class='pagination justify-content-center'>";
        if ($numPage ==1)
        {
            return '';
        }
        if ($current ==1)
        {
            $html .= "<li class='page-item'><a class='page-link'>Trang Dau </a></li>";
            $html .= "<li class='page-item'><a class='page-link'>Truoc </a></li>";
        }
        else
        {
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=1'>Trang Dau </a></li>";
            $html .= "<li class='page-item'><a class='page-link' href='$url&page=1'>Trang Dau </a></li>";
        }
        if ($current <=3)
        {
            for ($i =1; ($i<=5) and ($i <= $numPage); $i++)
            {
                if ($i == $current)
                {
                    $html.= "<li class='page-item'><a class='page-link'>" .$i. "</a></li>";
                }
                else
                {
                    $html.= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a></li>";
                }

            }
        }
        else
        {
            if ($numPage>= $current +2)
            {
                for ($i=$current-2; ($i<=$current+2) and ($i <= $numPage); $i++)
                {
                    if ($i ==$current)
                    {
                        $html.= "<li class='page-item'><a class='page-link'>".$i. "</a></li>";
                    }
                    else
                    {
                        $html.= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a></li>";
                    }
                }
            }
            else
            {
                for ($i = $numPage - 4; $i <= $numPage; $i++)
                {
                    if ($i >0)
                    {
                        if ($i == $current)
                        {
                            $html.= "<li class='page-item'><a class='page-link'>".$i. "</a></li>";
                        } else 
                        {
                            $html.= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a></li>";
                        }
                    }
                }
            }
        }
        if ($current == $numPage)
        {
            $html.= "<li class='page-item'><a class='page-link'>Sau</a></li>";
            $html.= "<li class='page-item'><a class='page-link'>Trang cuoi</a></li>";
        }
        else
        {
            $html.= "<li class='page-item'><a class='page-link' href='$url&page=" .($current + 1) . "'>Sau</a></li>";
            $html .= "<li class='page-item'><al class='page-link' href='$url&page=$numPage'>Trang cuoi</al></li>";
        }
        $html.= "</ul>";
        return $html;
    }
}