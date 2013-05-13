<?php

function validate_delivery($r_f_no, $r_kg, $r_dt) {
    $errors = array('valid' => true, 'fn' => '', 'kg' => '', 'dt' => '');
    $has_errors = FALSE;
    if ($r_f_no == '') {
        $has_errors = TRUE;
        $errors['fn'] = '<span class="label label-warning "><i class="icon-warning-sign icon-white"></i> Enter a farmer Number!</span>';
    }
    if ($r_kg == '') {
        $has_errors = TRUE;
        $errors['kg'] = '<span class="label label-warning "><i class="icon-warning-sign icon-white"></i> Enter Number of KGs Delivered!</span>';
    } elseif (!is_numeric($r_kg)) {
        $has_errors = TRUE;
        $errors['kg'] = '<span class="label label-warning "><i class="icon-warning-sign icon-white"></i> Enter Kilos in numbers!</span>';
    }
    if ($r_dt=='') {
        $has_errors = TRUE;
        $errors['dt'] = '<span class="label label-warning "><i class="icon-warning-sign icon-white"></i> Enter a valid date and time!</span>';
    }



    $errors['valid'] = !$has_errors;
    return $errors;
}

?>
