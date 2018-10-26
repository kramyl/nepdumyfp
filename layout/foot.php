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
        "lengthMenu": [5, 10],
        "pagingType": "full_numbers"
      });
    } );

    function calculateDate(birthdate){
      var mdate = birthdate.value;
      var mdate = mdate.toString();
      var yearThen = parseInt(mdate.substring(0,4), 10);
      var monthThen = parseInt(mdate.substring(5,7), 10);
      var dayThen = parseInt(mdate.substring(8,10), 10);

      var today = new Date();
      var birthday = new Date(yearThen, monthThen-1, dayThen);

      var differenceInMilisecond = today.valueOf() - birthday.valueOf();

      var year_age = Math.floor(differenceInMilisecond / 31536000000);
      var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);

      if ((today.getMonth() == birthday.getMonth()) && (today.getDate() == birthday.getDate())) {
          alert("Happy B'day!!!");
      }

      var month_age = Math.floor(day_age/30);

      day_age = day_age % 30;

      if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
          document.getElementById("form_Age").value = "Invalid birthday - Please try again!";
      }
      else {
          document.getElementById("form_Age").value = year_age;
      }
    }

    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
      });
    }, 3000);
</script>
