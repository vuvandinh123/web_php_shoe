<?php if ($option == 'product') : ?>
    <a class="<?php if ($sort == $kieu)
                    echo 'text-danger';
                else echo 'text-dark' ?>" href="?option=product&sort=<?= $kieu ?>&page=1">

        <?php if ($sort == $kieu)
            echo '<i class="fa-solid fa-square-check text-danger mr-2 me-2"></i>' . $value;
        else  echo  '<i class="fa-regular fa-square mr-2 me-2 text-danger"></i>' . $value; ?>
    </a>
<?php endif; ?>


<?php if ($option == 'category') : ?>
    <a class="<?php
                if ($sort == $kieu)
                    echo 'text-danger';
                else echo 'text-dark' ?>" href="?option=category&sort=<?= $kieu ?>&page=1">

        <?php if ($sort == $kieu)
            echo '<i class="fa-solid fa-square-check text-danger mr-2"></i>' . $value;
        else  echo  '<i class="fa-regular fa-square mr-2 text-danger"></i>' . $value; ?>
    </a>
<?php endif; ?>

<?php if ($option == 'brand') : ?>
    <a class="<?php
                if ($sort == $kieu)
                    echo 'text-danger';
                else echo 'text-dark' ?>" href="?option=brand&sort=<?= $kieu ?>&page=1">

        <?php if ($sort == $kieu)
            echo '<i class="fa-solid fa-square-check text-danger mr-2"></i>' . $value;
        else  echo  '<i class="fa-regular fa-square mr-2 text-danger"></i>' . $value; ?>
    </a>
<?php endif; ?>

<?php if ($option == 'post') : ?>
    <a class="<?php
                if ($sort == $kieu)
                    echo 'text-danger';
                else echo 'text-dark' ?>" href="?option=post&sort=<?= $kieu ?>&page=1">

        <?php if ($sort == $kieu)
            echo '<i class="fa-solid fa-square-check text-danger mr-2"></i>' . $value;
        else  echo  '<i class="fa-regular fa-square mr-2 text-danger"></i>' . $value; ?>
    </a>
<?php endif; ?>
<?php if ($option == 'topic') : ?>
    <a class="<?php
                if ($sort == $kieu)
                    echo 'text-danger';
                else echo 'text-dark' ?>" href="?option=topic&sort=<?= $kieu ?>&page=1">

        <?php if ($sort == $kieu)
            echo '<i class="fa-solid fa-square-check text-danger mr-2"></i>' . $value;
        else  echo  '<i class="fa-regular fa-square mr-2 text-danger"></i>' . $value; ?>
    </a>
<?php endif; ?>

<?php if ($option == 'user') : ?>
    <a class="<?php
                if ($sort == $kieu)
                    echo 'text-danger';
                else echo 'text-dark' ?>" href="?option=user&sort=<?= $kieu ?>&page=1">

        <?php if ($sort == $kieu)
            echo '<i class="fa-solid fa-square-check text-danger mr-2"></i>' . $value;
        else  echo  '<i class="fa-regular fa-square mr-2 text-danger"></i>' . $value; ?>
    </a>
<?php endif; ?>

<?php if ($option == 'order') : ?>
    <a class="<?php
                if ($sort == $kieu)
                    echo 'text-danger';
                else echo 'text-dark' ?>" href="?option=order&sort=<?= $kieu ?>&page=1">

        <?php if ($sort == $kieu)
            echo '<i class="fa-solid fa-square-check text-danger mr-2"></i>' . $value;
        else  echo  '<i class="fa-regular fa-square mr-2 text-danger"></i>' . $value; ?>
    </a>
<?php endif; ?>

<?php if ($option == 'page') : ?>
    <a class="<?php
                if ($sort == $kieu)
                    echo 'text-danger';
                else echo 'text-dark' ?>" href="?option=page&sort=<?= $kieu ?>&page=1">

        <?php if ($sort == $kieu)
            echo '<i class="fa-solid fa-square-check text-danger mr-2"></i>' . $value;
        else  echo  '<i class="fa-regular fa-square mr-2 text-danger"></i>' . $value; ?>
    </a>
<?php endif; ?>