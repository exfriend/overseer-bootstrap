<?php

function present_logs_for_web( $log_data )
{
    $log_data = nl2br( htmlspecialchars( $log_data ) );
    $log_data = str_replace( '&lt;error&gt;', '<span style=color:#ff6666>', $log_data );
    $log_data = str_replace( '&lt;/error&gt;', '</span>', $log_data );
    $log_data = str_replace( '&lt;info&gt;', '<span style="color:#00b3ee">', $log_data );
    $log_data = str_replace( '&lt;/info&gt;', '</span>', $log_data );
    $log_data = str_replace( '&lt;comment&gt;', '<span style="color:gold">', $log_data );
    $log_data = str_replace( '&lt;/comment&gt;', '</span>', $log_data );
    return $log_data;
}