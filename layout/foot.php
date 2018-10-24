<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/form_validator/jquery.form-validator.js"></script>
<script src="js/jquery-input-mask-phone-number.js"></script>
<script type="text/javascript" src="ext/DataTables/datatables.min.js"></script>
<script type="text/javascript">
  var setupValidation = function() {
    $.validate({
        lang: 'en'
      });
    };

    $.formUtils.loadModules('location, date, security, file', null, setupValidation);
    $.validate({
      modules : 'security',
      modules : 'sanitize',
      onError : function($form) {
        return false;
      }
    });
    $(document).ready(function () {
        $('#form_ContactNumber').usPhoneFormat({
            format: 'xxx-xxx-xxxx',
        });
    });
    function ModalReParent(id){
      $(id).appendTo("body")
    }
    $(document).ready( function () {
      $('#table').DataTable({
        "searching":   false,
        "lengthMenu": [5, 10, 20, "All"],
        "pagingType": "full_numbers"
      });
    } );
</script>
