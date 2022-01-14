<?php
/*
* File Name: sidebar.blade.php
* Created on 1/3/2022
* (c)2022 Bill Banks
*/
<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="<?= route('user.profile_view', ['username' => getUserAuthInfo('profile.username')]) ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= getStoreSettings('small_logo_image_url') ?>" alt="<?= getStoreSettings('name') ?>">
        </div>
        <img class="lw-logo-img" src="<?= getStoreSettings('logo_image_url') ?>" alt="<?= getStoreSettings('name') ?>">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
        <a class="nav-link" href="<?= route('home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?= __tr('Home') ?></span>
       </a>
      </li>
<li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
    <a class="nav-link" href="<?= route('admin.gender') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?= __tr('gender') ?></span>
    </a>
</li>
<li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
    <a class="nav-link" href="<?= route('admin.education') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?= __tr('Education') ?></span>
    </a>
</li>
<li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
    <a class="nav-link" href="<?= route('admin.politics') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?= __tr('Politics') ?></span>
    </a>
</li>
<li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
    <a class="nav-link" href="<?= route('admin.children') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?= __tr('Children') ?></span>
    </a>
</li>
<li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
    <a class="nav-link" href="<?= route('admin.religion') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?= __tr('Religion') ?></span>
    </a>
</li>
<li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
    <a class="nav-link" href="<?= route('admin.dateabilitydeets') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?= __tr('Dateabilitydeets (M)') ?></span>
    </a>
</li>
<li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
    <a class="nav-link" href="<?= route('admin.interests') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?= __tr('Interests (m)') ?></span>
    </a>
</li>
<li class="nav-item <?= makeLinkActive('manage.dashboard') ?> mt-2">
    <a class="nav-link" href="<?= route('admin.pronouns') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?= __tr('Pronouns (m)') ?></span>
    </a>
</li>






<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->
