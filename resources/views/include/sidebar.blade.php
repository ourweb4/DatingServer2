<?php
/*
* File Name: sidebar.blade.php
* Created on 1/3/2022
* (c)2022 Bill Banks
*/
    use Illuminate\Support\Facades\Auth;

    $user_id = Auth::id();
?>
<div class="col">
        <ul class="nav">
                        <li  class="nav-item">                        <a class="nav-link" href="<?= url('/home') ?>">
                            <span><?= __tr('Home') ?></span>
                        </a>
                        </li>

                        @if(Is_Admin())
                            <li  class="nav-item">                        <a class="nav-link" href="<?= url('/admin') ?>">
                                    <span><?= __tr('Admin') ?></span>
                                </a>
                            </li>
                        @endif

            <li  class="nav-item">                        <a class="nav-link" href="<?= url('/userprofile/' . $user_id) ?>">
                    <span><?= __tr('My Profile') ?></span>
                </a>
            </li>

        </ul>


    </div>
