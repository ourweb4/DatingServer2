<?php
/*
* File Name: footer.blade.php
* Created on 1/3/2022
* (c)2022 Bill Banks
*/
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span><?= __tr('Copyright © __storeName__ __copyrightYear__', [
                        '__storeName__' => 'DateabilityApp.com',
                        '__copyrightYear__' => date('Y')
                    ]) ?> </span>
<span><?= __tr('This website was made by ') ?>
            <a href="http://ourweb.net">Ourweb.net</a>
            </span>
</div>
</div>
</footer>
<!-- End of Footer -->
