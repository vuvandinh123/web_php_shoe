<?php
use App\Models\Post;
$sort = $_REQUEST['sort']??'';
$option = $_REQUEST['option'] ?? '';

// $list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])->get();
                $all=Post::where([['status', '!=', 0], ['type', '=', 'page']])->count();
                $pageNumber = $_REQUEST['page'] ?? 1 ;
                $hienthi = 4;
                $linkhienthi = ($pageNumber - 1) * $hienthi;
                $number_of_page=ceil($all/$hienthi);
                $key = '';
                if(isset($_POST['search']) && !empty($_POST['search']))
                {
                    $key = $_POST['search'];
                    $list_post = Post::join('topic','topic.id','=','post.topic_id')->where([['post.status', '!=', 0], ['post.type', '=', 'page']])->where('title','like',"%".$key.'%')
                    ->orwhere('name','like',"%".$key.'%')
                    // ->orwhere('id','=',$key)
                    ->select("post.*",'topic.name as topic_name')
                    ->get();
                } 
                else {
                    if ($sort == 'desc') {
                        $list_post = Post::join('topic','topic.id','=','post.topic_id')->where([['post.status', '!=', 0], ['post.type', '=', 'page']])
                    ->skip($linkhienthi)
                    ->take($hienthi)
                    ->orderBy('created_at', 'desc')
                    ->select("post.*",'topic.name as topic_name')
                    ->get();
                    } elseif ($sort == 'asc') {
                        $list_post = Post::join('topic','topic.id','=','post.topic_id')->where([['post.status', '!=', 0], ['post.type', '=', 'page']])
                        ->skip($linkhienthi)
                        ->take($hienthi)
                        ->orderBy('created_at', 'asc')
                        ->select("post.*",'topic.name as topic_name')
                        ->get();
                
                    } 
                    else{
                        $list_post = Post::join('topic','topic.id','=','post.topic_id')->where([['post.status', '!=', 0], ['post.type', '=', 'page']])
                        ->skip($linkhienthi)
                        ->take($hienthi)
                        ->orderBy('created_at', 'desc')
                        ->select("post.*",'topic.name as topic_name')
                        ->get();
                    }
                
                }
                ?>
                <?php
                $j = '';
                if(isset( $_REQUEST['page'])&&!empty(['page']))
                        $j=$_REQUEST['page'] ?>

                        
<?php require_once("../views/backend/header.php") ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang đơn</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Trang đơn</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                        <label for="">Sắp xếp: </label>
                        <div class="form-check mx-3">
                            <?php
                            $kieu = 'desc';
                            $value = 'Mới nhất';
                            include('../app/sort.php') ?>
                        </div>
                        <div class="form-check mx-3">
                            <?php
                            $kieu = 'asc';
                            $value = 'Cũ nhất';
                            include('../app/sort.php') ?>
                        </div>

                    </div>
                    <div><a href="?option=page&cat=create" class="btn bg-primary rounded-0 "><i class="fa-solid fa-plus"></i></a><button
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></button></div>
                </div>
                <div class="input-group mb-3">
                    <form action="" method="post" class="d-flex w-100">
                        <input type="text" class="form-control rounded-0" name="search" placeholder="Tìm bài viết..."
                            aria-label="Recipient's username" aria-describedby="button-addon2" value="<?=$key ?>">
                        <input class="btn btn-outline-danger rounded-0 px-5" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="card-body">
            <form action="?option=page&cat=process" method="post" enctype="multipart/form-data">
                <div class="table-responsive">

                    <table class="table table-hover ">
                        <thead>
                            <tr class="bg-primary">

                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Hình</th>
                                <th scope="col">Tiêu đề bài viêt</th>
                                <th scope="col">Slug</th>

                                <th scope="col">Ngày tạo</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_post as $value): ?>
                            <tr>

                                <td class="">
                                    <input name="check_id[]" value="<?=$value->id?>" type="checkbox">
                                </td>
                                <th scope="row"><?=$value['id']?></th>
                                <td>
                                    <img width="50px" height="50px" src="../public/image/post/<?=$value['image']?>"
                                        alt="<?=$value['title']?>">
                                </td>
                                <td class=""><?=$value['title']?></td>

                                <td>
                                    <?=$value->slug?>
                                </td>

                                <td class=''>

                                <?=date_format($value['created_at'],"H:i:s d/m/Y ") ?></td>
                        
                                <td class="text-right">
                                    <?php if($value->status=='1'):?>
                                    <a title="Tắt" class="btn btn-primary"
                                        href="index.php?option=page&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>">
                                        <i class="fa-solid fa-toggle-on"></i></a>
                                    <?php else:?>
                                    <a title="Bật" class="btn btn-danger"
                                        href="index.php?option=page&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i
                                            class="fa-solid fa-toggle-off "></i></a>
                                    <?php endif;?>
                                    <a title="sửa" class="mx-2 btn btn-warning"
                                        href="index.php?option=page&cat=edit&id=<?=$value->id?>"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a title="xem" class="mr-2 btn btn-primary"
                                        href="index.php?option=page&cat=show&id=<?=$value->id?>"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a title="Xóa vào thùng rác" class="btn btn-danger mr-2"
                                        href="index.php?option=page&cat=delete&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            
            <div class="card-footer">
                <div class="d-flex justify-content-between mb-3">
                    <div><button name="deletes" type="submit" class="btn bg-danger rounded-0 ">Xóa</button></div>
                    <div>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <span class="page-link"><a href="?option=page&sort=<?=$sort ?>&page=1">Đầu</a></span>
                                </li>
                                <?php for($i=1;$i<=$number_of_page;$i++): ?>
                                <li class="page-item"> <a class=' page-link <?php if($j==$i)echo 'bg-primary' ?>'
                                        href='?option=page&sort=<?=$sort ?>&page=<?=$i?>'><?=$i?></a></li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="?option=page&sort=<?=$sort ?>&page=<?=--$i?>">Cuối</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div><a class="btn bg-primary rounded-0 " href="index.php?option=page&cat=create">Thêm</a>
                        <a class="btn bg-danger rounded-0 " href="index.php?option=page&cat=recycle&page=1">Thùng
                            rác</a>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
</form>
<?php require_once("../views/backend/footer.php") ?>