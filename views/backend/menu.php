
<nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="index.php" class="nav-link active">
                                
                            <img class="mr-2" src="../public/image/icon/shop.png" alt="">
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="?option=product" class="nav-link">
                            <img class="mr-2" src="../public/image/icon/open-box.png" alt="">
                                <p>
                                    Sản phẩm
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"><?=$allproduct?></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?option=product&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/select.png" alt="">
                                        <p>Tất cả sản phẩn</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?option=accessory&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/select.png" alt="">
                                        <p>Phụ kiện</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?option=category&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/category.png" alt="">
                                        <p>Danh mục</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?option=brand&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/brand.png" alt="">
                                        <p>Thương hiệu</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                            <img class="mr-2" src="../public/image/icon/post.png" alt="">
                                <p>
                                    Bài viết
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"><?=$allpost?></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?option=post&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/checklist.png" alt="">
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?option=topic&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/theme.png" alt="">
                                        <p>Chủ đề</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                                    <a href="?option=page&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/theme.png" alt="">
                                        <p>Trang đơn</p>
                                    </a>
                                </li>
                        <li class="nav-item has-treeview">
                            <a href="?option=user&sort=desc&page=1" class="nav-link">
                            <img class="mr-2" src="../public/image/icon/group.png" alt="">
                                <p>
                                    Thành viên
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"><?=$alluser?></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                    <a href="?option=user&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/list.png" alt="">
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?option=user&cat=create" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/plust.png" alt="">
                                    <p>Thêm Admin</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="?option=order" class="nav-link">
                            <img class="mr-2" src="../public/image/icon/payment.png" alt="">
                                <p>
                                    Đơn hàng
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"><?=$allorder?></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?option=order&sort=desc&page=1" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/box.png" alt="">
                                        <p>Tất cả đơn hàng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                            <img class="mr-2" src="../public/image/icon/theme1.png" alt="">
                                <p>
                                    Giao Diện
                                    <i class="fas fa-angle-left right"></i>
                                    
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?option=menu" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/menu.png" alt="">
                                        <p>Menu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?option=slider" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/slider.png" alt="">
                                        <p>Slider</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?option=banner" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/slider.png" alt="">
                                        <p>Banner</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?option=contact" class="nav-link">
                                    <img class="mr-2" src="../public/image/icon/contact.png" alt="">
                                        <p>Liên hệ</p>
                                    </a>
                                </li>
                            </ul>
                            <style>
                                .poss{
                                    position: relative;
                                    left: -20px;
                                    top: 0px;
                                }
                            </style>
                            
                        </li>
                        
                    </ul>
                   
                </nav>
                <li class="nav-item mt-5 poss">
                                   <a class=" rounder-0 bg-danger p-1" href="logout.php">Đăng xuất</a>
                </li>