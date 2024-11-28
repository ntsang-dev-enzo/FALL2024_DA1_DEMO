<?php

namespace App\Views\Client\Components;

use App\Models\MiniCategory;
use App\Views\Client\Components\Mini_Category;
use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="nav-item dropdown dropend">
            <div class="dropdown-button">
                <a href="/products">
                <button class="dropdown-item-button">
                        Tất cả
                </button></a>
                <?php
                foreach ($data as $item) :
                ?><a href="/products/categories/<?= $item['id'] ?>">
                    <button class="dropdown-item-button">
                            <?= $item['name'] ?>
                    </button></a>
                <?php
                endforeach;
                ?>


            </div>
        </div>

<?php


    }
}
