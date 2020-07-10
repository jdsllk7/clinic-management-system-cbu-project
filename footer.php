<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Header</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<!-- jquery plugins here-->

<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- owl carousel js -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- contact js -->
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<script src="js/myScript.js"></script>
<script src="js/form_script.js"></script>
<script src="js/loadData.js"></script>

<script>
    function displayAlertMsgPhp(msg, type) {
        $(".toast-body").text(msg);
        if (type === true) {
            $(".toast-body").css("color", "green");
        } else {
            $(".toast-body").css("color", "red");
        }
        $(".toast").toast("show");
    } //end displayAlertMsgPhp()
</script>

<?php

if (isset($_GET["msg"])) {
    echo '
        <script>
            displayAlertMsgPhp("' . $_GET["msg"] . '", ' . $_GET["type"] . ');
        </script>
    ';
}

?>

</body>

</html>