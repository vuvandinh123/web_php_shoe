<?php

use App\Models\Menu;

$args_mainmenu = [
    ['parent_id', '=', '0'],
    ['status', '=', '1'],
    ['position', '=', 'mainmenu']
];
$lis_menu = Menu::where($args_mainmenu)->orderBy('sort_order', 'asc')->get();
?>

<ul class="d-flex ">

    <?php foreach ($lis_menu as $value) : ?>

        <?php $args_mainmenu1 = [
            ['parent_id', '=', $value->id],
            ['status', '=', '1'],
            ['position', '=', 'mainmenu']
        ];
        $lis_menu1 = Menu::where($args_mainmenu1)->orderBy('sort_order', 'asc')->get();
        if (count($lis_menu1) != 0) : ?>
            <li class="ms-5 h-100 nav-item-sp"><a class="text-white fs-4 fw-bold text-uppercase" href="<?= $value->link ?>"><?= $value->name ?></a>
                <i class="ms-2 fa-solid fa-caret-down text-white fs-5 "></i>
                <div class="nav-item-hover1">
                    <div class="row drop_dow-item mb-4">
                        <?php foreach ($lis_menu1 as $value) : ?>
                            <div class="col ms-5 fs-4 fw-bold"><a class="text-dark fw-bold d-block fs-4 text-uppercase block" href="<?= $value->link ?>"><?= $value->name ?></a></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row drop_dow-item">
                        <?php foreach ($lis_menu1 as $value) : ?>
                            <?php $args_mainmenu2 = [
                                ['parent_id', '=', $value->id],
                                ['status', '=', '1'],
                                ['position', '=', 'mainmenu'],
                            ];
                            $lis_menu2 = Menu::where($args_mainmenu2)->orderBy('sort_order', 'asc')->get(); ?>
                            <div class="col m-0">
                                <?php foreach ($lis_menu2 as $value) : ?>
                                    <ul class="ps-5">
                                        <li class="dropdown-item fs-5 text-capitalize "><a class="fs-5 a-hover d-block" href="<?= $value->link ?>"><?= $value->name ?></a> </li>
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
        <?php else : ?>
            <li class="ms-5 nav-item-sp h-100  pointer"><a class="text-white d-block h-100  fs-4 fw-bold text-uppercase" href="<?= $value->link ?>"><?= $value->name ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<style>

</style>