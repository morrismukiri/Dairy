</div>
<div id="footer" class="modal-footer">
    &copy; <?php echo date('Y'); ?> <a href="https://github.com/morrismukiri">Morris Mukiri</a>.
</div>
<script type="text/javascript" src="<?php Page_Url() ?>js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php Page_Url() ?>js/dataTableDefaults.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.table').dataTable({
           
		"sDom": "<'row'<'span5'l><'span5'f>r>t<'row'<'span5'i><'span5'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
                }
        });
        $.extend($.fn.dataTableExt.oStdClasses, {
            "sWrapper": "dataTables_wrapper form-inline"
        });
    });
</script>

</body>
</html>
