<?php
/*
* File Name: sidebar.blade.php
* Created on 1/3/2022
* (c)2022 Bill Banks
*/
?>

<div class="col">

    @if(Is_Admin())

        <ul class="nav">


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= url('admin') ?>">
                    Admin
                </a>
            </li>
            <br>
            <li class="nav-item">
                <a class="nav-link" href="<?= url('admin/gender') ?>">

                    Gender
                </a>
            </li>
            <br>
            <li class="nav-item">
                <a class="nav-link" href="<?= url('admin/education') ?>">

                    <span><?= __tr('Education') ?></span>
                </a>
            </li>
            <br>
            <li class="nav-item">
                <a class="nav-link" href="<?= url('admin/politics') ?>">

                    <span><?= __tr('Politics') ?></span>
                </a>
            </li>
            <br>
            <li class="nav-item">
                <a class="nav-link" href="<?= url('admin/children') ?>">

                    <span><?= __tr('Children') ?></span>
                </a>
            </li>
            <br>
            <li class="nav-item">

                <a class="nav-link" href="<?= url('admin/religion') ?>">

                    <span><?= __tr('Religion') ?></span>
                </a>
            </li>
            <br>
            <li class="nav-item">
                <a class="nav-link" href="<?= url('admin/dateabilitydeets') ?>">

                    <span><?= __tr('Dateabilitydeets (M)') ?></span>
                </a>
            </li>
            <br>
            <li class="nav-item">
                <a class="nav-link" href="<?= url('admin/interests') ?>">

                    <span><?= __tr('Interests (m)') ?></span>
                </a>
            </li>
            <br>
            <li class="nav-item">
                <a class="nav-link" href="<?= url('admin/pronouns') ?>">

                    <span><?= __tr('Pronouns (m)') ?></span>
                </a>
            </li>
            <br>


        </ul>
    @endif
</div>


<!-- End of Sidebar -->
