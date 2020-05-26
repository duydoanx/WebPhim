<h5 class="text-light mt-3">Bình luận</h5>
<div class="container mt-3">
    <form id="my_form" method="post" action="Other/commentAPI.php">
        <?php
            echo "<input hidden name=\"id\" value=\"".$_REQUEST['id']."\">";
        ?>
        <input hidden name="comment" value="true">
        <div class="row">
            <div class="col-12">
                <textarea id="text-comment" class="form-control w-100" name="noidung" required="" placeholder="Viết bình luận ở đây..."></textarea>
            </div>
            <div class="container-fluid d-flex justify-content-end mt-3">
                <button class="btn btn-primary" type="submit">Gửi</button>
            </div>
        </div>
    </form>

    <?php
        echo "<div class=\"container cmt\" data-id = \"".$_REQUEST['id']."\">"
    ?>

    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script/CommentScript.js"></script>
