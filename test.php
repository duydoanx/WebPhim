<p>
        <?php
        $_REQUEST['text'] = str_replace('<', '&lt;', $_REQUEST['text']);
        echo $_REQUEST['text'];
        ?>
        <div class="container">
            <div class="card w-100 rounded rounded-lg mb-3">
                <div class="card-header">".($controllerUser->getUserFromEmail($item->getEMAIL()))->getUSERNAME()."</div>
                <div class="card-body">
                    <p class="card-text">".$item->getNOIDUNG()."</p>
                </div>
            </div>
        </div>

</p>

