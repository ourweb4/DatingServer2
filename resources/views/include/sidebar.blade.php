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
          @if(Is_Login())
            <li  class="nav-item">                        <a class="nav-link" href="<?= url('/userprofile/' . $user_id) ?>">
                    <span><?= __tr('My Profile') ?></span>
                </a>
            </li>
                <li  class="nav-item">                        <a class="nav-link" href="<?= url('/message' ) ?>">
                        <span><?= __tr('My Messages') ?></span>
                    </a>
                </li>
                <li  class="nav-item">                        <a class="nav-link" href="<?= url('/photos' ) ?>">
                        <span><?= __tr('My Photos') ?></span>
                    </a>
                </li>
                <li  class="nav-item">                        <a class="nav-link" href="<?= url('/match' ) ?>">
                        <span><?= __tr('Matchs') ?></span>
                    </a>
                </li>

                <li  class="nav-item">                        <a class="nav-link" href="<?= url('/like/who' ) ?>">
                        <span><?= __tr('Who I like') ?></span>
                    </a>
                </li>

                <li  class="nav-item">                        <a class="nav-link" href="<?= url('/like/me' ) ?>">
                        <span><?= __tr('Who like me') ?></span>
                    </a>
                </li>
            @endif

        </ul>


    </div>
