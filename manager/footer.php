<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12" style="color:white">Designed And Developed By:Wolkite University Computer Science
        students</div>
</div>
<!--end-Footer-part-->
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.dashboard.js"></script>
<script src="js/jquery.gritter.min.js"></script>
<script src="js/matrix.interface.js"></script>
<script src="js/matrix.chat.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/matrix.form_validation.js"></script>
<script src="js/jquery.wizard.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.popover.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

<script src="js/matrix.tables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $('.textarea_editor').wysihtml5();
</script>
</body>

</html>
<script type="text/javascript">
    function select_quality(vari) {
        $('#category').html('');
        //$('#city').html('<option>Select City</option>');
        $.ajax({
            type: 'post',
            url: 'ajax_selection.php',
            data: {
                vari: vari
            },
            success: function(data) {
                $('#category').html(data);
            }
        })
    }

    function select_type(vari) {
        $('#type').html('');
        //$('#city').html('<option>Select City</option>');
        $.ajax({
            type: 'post',
            url: 'ajax_selection.php',
            data: {
                type: vari
            },
            success: function(data) {
                $('#type').html(data);
            }
        })
    }
</script>