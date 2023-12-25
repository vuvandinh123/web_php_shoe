<?php

use App\Models\Topic;
use App\Models\Post;
use App\Libraries\Upload;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$list_topic = Topic::where('status', '!=', 0)->get();
$html_topic_id = '';
$post = Post::where('status', '!=', 0)->find($id);
foreach ($list_topic as $value) {
    $html_topic_id .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
}
?>
<?php

?>

<?php require_once("../views/backend/header.php") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="font-weight-bold text-danger">Sửa bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="?option=post&sort=desc&page=1">Bìa viết</a></li>
                        <li class="breadcrumb-item active">Sửa bài viết</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            <div class="d-flex justify-content-between mb-3">


<a title="Quay lại" class="btn bg-primary rounded-0 fw-bold" href="?option=post&sort=desc&page=1">
    <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại </a>
<div>
<p title="Lưu" class="btn rounded-0 m-0 p-0">
    <img width="20px" height="20px" src="../public/image/icon/diskette.png" alt=""></p>
</div>


</div>
            </div>
            <div class="card-body">

                <form action="?option=post&cat=process&id=<?=$post->id?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="input1">Tên bài viết</label>
                                <input id="input1" value="<?=$post->title?>" type="text" name="title" class="form-control" placeholder="Nhập tên bài viết">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input id="slug"value="<?=$post->slug?>" type="text" name="slug" class="form-control" placeholder="Nhập slug bài viết">
                            </div>
                            
                            <div class="form-group">
                                <label for="detail">Chi tiết bài viết</label>
                                <textarea id="area"value="" name="detail" id="area" name="metadesc" class="form-control" placeholder="Chi tiết bài viết"  rows="3"><?=$post->detail?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input2">Từ khóa</label>
                                <textarea name="metakey"value="" class="form-control" placeholder="Từ khóa" id="input2" rows="3"><?=$post->metakey?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input3">Mô tả</label>
                                <textarea id="area" name="metadesc"value="" class="form-control" placeholder="Mô tả"  rows="3"><?=$post->metadesc?></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            
                            <div class="form-group">
                                <label for="input5">Chủ đề</label>
                                <select id="input5" name="topic_id" class="form-control" id="exampleFormControlSelect1">
                                    <?= $html_topic_id ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="file">Hình đại diện</label>
                                <input name="img" type="file" class="form-control-file" id="file">
                            </div>

                            <div class="form-group">
                                <label for="input6">Trạng thái</label>
                                <select id="input6" name="status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                    <input name="edit" class="btn bg-danger" type="submit" value="Sửa">
                    <input class="btn bg-info" type="reset" value="Hủy">
                    </div>
                   
                </form>
            </div>

        </div>
</div>
<!-- /.card-body -->

<div class="card-footer">


</div>
<!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>

<?php require_once("../views/backend/footer.php") ?>