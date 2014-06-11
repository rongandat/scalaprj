<?php
/*
  $Id: form_check.js.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<script language="javascript"><!--
var form = "";
var submitted = false;
var error = false;
var error_message = "";

function check_input(field_name, field_size, message) {
  if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
    var field_value = form.elements[field_name].value;

    if (field_value.length < field_size) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}


function check_state(field_name, field_size, message) {
  if (form.elements[field_name]){
    var field_value = form.elements[field_name].value;

    if (field_value.length < field_size) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}

function check_radio(field_name, message) {
  var isChecked = false;

  if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
    var radio = form.elements[field_name];

    for (var i=0; i<radio.length; i++) {
      if (radio[i].checked == true) {
        isChecked = true;
        break;
      }
    }

    if (isChecked == false) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}

function check_select(field_name, field_default, message) {
  if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
    var field_value = form.elements[field_name].value;

    if (field_value == field_default) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}

function check_password(field_name_1, field_name_2, field_size, message_1, message_2) {
	//alert(error_message);
  if (form.elements[field_name_1] && (form.elements[field_name_1].type != "hidden")) {
    var password = form.elements[field_name_1].value;
    var confirmation = form.elements[field_name_2].value;

    if (password.length < field_size && password.length > 8) {
      error_message = error_message + "* Your Password must contain a minimum of 5 and maximum of 8 characters.\n";
      error = true;
    } else if (password != confirmation) {
      error_message = error_message + "* " + message_2 + "\n";
      error = true;
    }
  }
}

function check_password_new(field_name_1, field_name_2, field_name_3, field_size, message_1, message_2, message_3) {
  if (form.elements[field_name_1] && (form.elements[field_name_1].type != "hidden")) {
    var password_current = form.elements[field_name_1].value;
    var password_new = form.elements[field_name_2].value;
    var password_confirmation = form.elements[field_name_3].value;

    if (password_current.length < field_size && password_current.length > 8) {
      error_message = error_message + "* Your Password must contain a minimum of 5 and maximum of 8 characters.\n";
      error = true;
    } else if (password_new.length < field_size) {
      error_message = error_message + "* Your Password must contain a minimum of 5 and maximum of 8 characters.\n";
      error = true;
    
	} else if (password_new.length > 8) {
      error_message = error_message + "* Your Password must contain a minimum of 5 and maximum of 8 characters.\n";
      error = true;
    }
	else if (password_new != password_confirmation) {
      error_message = error_message + "* " + message_3 + "\n";
      error = true;
    }
  }
}

function formatPhone(obj,message) {
    var country = document.getElementById("countrySelect").value;
    if(country!='US'){
        return;
    }
    else{      
        //var phoneno = /^\d{10}$/;  
        //if(form.elements[obj].value.match(phoneno))  
        //{  
            var numbers = form.elements[obj].value.replace(/[^0-9+]/g, '');
            var charf = {0:'(',3:') ',6:' - '};
            form.elements[obj].value = '';
            for (var i = 0; i < numbers.length; i++) {
                form.elements[obj].value += (charf[i]||'') + numbers[i];
            }  
        //}  
//        else  
//        {  
//           error_message = error_message + "* " + message + "\n";
//            error = true; 
//           return false;  
//        }  
    }
    
}

function formatFax(obj,message) {
    var country = document.getElementById("countrySelect").value;
    if(country!='US'){
        return;
    }
    else{
        var fax=form.elements[obj].value;
        if(fax.length>0){
            //var phoneno = /^\d{10}$/;  
            //if(form.elements[obj].value.match(phoneno))  
            //{  
                var numbers = form.elements[obj].value.replace(/[^0-9+]/g, '');
                var charf = {0:'(',3:') ',6:' - '};
                form.elements[obj].value = '';
                for (var i = 0; i < numbers.length; i++) {
                    form.elements[obj].value += (charf[i]||'') + numbers[i];
                }  
           // }  
//            else  
//            {  
//               error_message = error_message + "* " + message + "\n";
//                error = true; 
//               return false;  
//            } 
        }
        else return;
    }
    
}

function check_form_ac(form_name) {
  if (submitted == true) {
    alert("<?php echo JS_ERROR_SUBMITTED; ?>");
    return false;
  }

  error = false;
  form = form_name;
  error_message = "<?php echo JS_ERROR; ?>";

<?php if (ACCOUNT_GENDER == 'true') echo '  check_radio("gender", "' . ENTRY_GENDER_ERROR . '");' . "\n"; ?>

  check_input("firstname", <?php echo ENTRY_FIRST_NAME_MIN_LENGTH; ?>, "<?php echo ENTRY_FIRST_NAME_ERROR; ?>");
  check_input("lastname", <?php echo ENTRY_LAST_NAME_MIN_LENGTH; ?>, "<?php echo ENTRY_LAST_NAME_ERROR; ?>");

<?php if (ACCOUNT_DOB == 'true') echo '  check_input("dob", ' . ENTRY_DOB_MIN_LENGTH . ', "' . ENTRY_DATE_OF_BIRTH_ERROR . '");' . "\n"; ?>

  check_input("email_address", <?php echo ENTRY_EMAIL_ADDRESS_MIN_LENGTH; ?>, "<?php echo ENTRY_EMAIL_ADDRESS_ERROR; ?>");
  check_input("street_address", <?php echo ENTRY_STREET_ADDRESS_MIN_LENGTH; ?>, "<?php echo ENTRY_STREET_ADDRESS_ERROR; ?>");
  check_input("postcode", <?php echo ENTRY_POSTCODE_MIN_LENGTH; ?>, "<?php echo ENTRY_POST_CODE_ERROR; ?>");
  check_input("city", <?php echo ENTRY_CITY_MIN_LENGTH; ?>, "<?php echo ENTRY_CITY_ERROR; ?>");

  check_input("website", 4, "Your Website must contain a minimum of 4 characters.");
  check_input("company", 2, "Your Company must contain a minimum of 2 characters.");

<?php //if (ACCOUNT_STATE == 'true') echo '  check_state("new_state", ' . ENTRY_STATE_MIN_LENGTH . ', "' . ENTRY_STATE_ERROR . '");' . "\n"; ?>

  check_select("country", "", "<?php echo ENTRY_COUNTRY_ERROR; ?>");

  check_input("title", 3, "<?php echo ENTRY_TITLE_NUMBER_ERROR; ?>");
  
  check_input("telephone", <?php echo ENTRY_TELEPHONE_MIN_LENGTH; ?>, "<?php echo ENTRY_TELEPHONE_NUMBER_ERROR; ?>");
  formatPhone('telephone','Not a valid Phone Number');
  formatFax('fax','Not a valid Fax Number');
  check_select("customers_group", "", "<?php echo ENTRY_GROUP_ERROR; ?>");

  check_password("password", "confirmation", <?php echo ENTRY_PASSWORD_MIN_LENGTH; ?>, "Your Password must contain a minimum of 5 and maximum of 8 characters.", "<?php echo ENTRY_PASSWORD_ERROR_NOT_MATCHING; ?>");
  check_password_new("password_current", "password_new", "password_confirmation", <?php echo ENTRY_PASSWORD_MIN_LENGTH; ?>, "Your Password must contain a minimum of 5 and maximum of 8 characters.", "<?php echo ENTRY_PASSWORD_NEW_ERROR; ?>", "<?php echo ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING; ?>");

  if (error == true) {
    alert(error_message);
    return false;
  } else {
/*    submitted = true;
        $(form_name).ajaxSubmit({
	beforeSubmit:  showRequest,
        success:       showResponse  // post-submit callback 

    }); */
    return true;
  }
}

function check_form_ac1(form_name) {
  if (submitted == true) {
    alert("<?php echo JS_ERROR_SUBMITTED; ?>");
    return false;
  }

  error = false;
  form = form_name;
  error_message = "<?php echo JS_ERROR; ?>";

<?php if (ACCOUNT_GENDER == 'true') echo '  check_radio("gender", "' . ENTRY_GENDER_ERROR . '");' . "\n"; ?>

  check_input("firstname", <?php echo ENTRY_FIRST_NAME_MIN_LENGTH; ?>, "<?php echo ENTRY_FIRST_NAME_ERROR; ?>");
  check_input("lastname", <?php echo ENTRY_LAST_NAME_MIN_LENGTH; ?>, "<?php echo ENTRY_LAST_NAME_ERROR; ?>");

<?php if (ACCOUNT_DOB == 'true') echo '  check_input("dob", ' . ENTRY_DOB_MIN_LENGTH . ', "' . ENTRY_DATE_OF_BIRTH_ERROR . '");' . "\n"; ?>

  check_input("email_address", <?php echo ENTRY_EMAIL_ADDRESS_MIN_LENGTH; ?>, "<?php echo ENTRY_EMAIL_ADDRESS_ERROR; ?>");
  check_input("street_address", <?php echo ENTRY_STREET_ADDRESS_MIN_LENGTH; ?>, "<?php echo ENTRY_STREET_ADDRESS_ERROR; ?>");
  check_input("postcode", <?php echo ENTRY_POSTCODE_MIN_LENGTH; ?>, "<?php echo ENTRY_POST_CODE_ERROR; ?>");
  check_input("city", <?php echo ENTRY_CITY_MIN_LENGTH; ?>, "<?php echo ENTRY_CITY_ERROR; ?>");

  check_input("website", 4, "Your Website must contain a minimum of 4 characters.");
  check_input("company", 2, "Your Company must contain a minimum of 2 characters.");

  check_input("title", 3, "<?php echo ENTRY_TITLE_NUMBER_ERROR; ?>");

<?php if (ACCOUNT_STATE == 'true') echo '  check_input("state", ' . ENTRY_STATE_MIN_LENGTH . ', "' . ENTRY_STATE_ERROR . '");' . "\n"; ?>

  check_select("country", "", "<?php echo ENTRY_COUNTRY_ERROR; ?>");


  check_input("telephone", <?php echo ENTRY_TELEPHONE_MIN_LENGTH; ?>, "<?php echo ENTRY_TELEPHONE_NUMBER_ERROR; ?>");
  
  check_select("customers_group", "", "<?php echo ENTRY_GROUP_ERROR; ?>");

  check_password("password", "confirmation", <?php echo ENTRY_PASSWORD_MIN_LENGTH; ?>, "<?php echo ENTRY_PASSWORD_ERROR; ?>", "<?php echo ENTRY_PASSWORD_ERROR_NOT_MATCHING; ?>");
  check_password_new("password_current", "password_new", "password_confirmation", <?php echo ENTRY_PASSWORD_MIN_LENGTH; ?>, "<?php echo ENTRY_PASSWORD_ERROR; ?>", "<?php echo ENTRY_PASSWORD_NEW_ERROR; ?>", "<?php echo ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING; ?>");

  if (error == true) {
    alert(error_message);
    return false;
  } else {
    submitted = true;
        $(form_name).ajaxSubmit({
	beforeSubmit:  showRequest,
        success:       showResponse  // post-submit callback 

    }); 
    return false;
  }
}
//--></script>