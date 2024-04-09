<?php 

function compare($a, $b) {
    $a_get_fields = $a->__get('giveaway_end_date');
    $b_get_fields = $b->__get('giveaway_end_date');
    echo $a, $b;
    if($a_get_fields == $b_get_fields) {
      return 0;
    }
    return ($a_get_fields < $b_get_fields) ? -1 : 1;
}