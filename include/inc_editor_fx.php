<?php

/**
 *  These functions do several routines for editing
 */

/**
 * deactivateHotHtml disables the <script> <input> <form> <print> tags by inserting the </> characters
 */
function deactivateHotHtml(&$str) {
    $str = preg_replace('/script/i', 'scri</>pt', $str);
    $str = preg_replace('/form/i', 'for</>m', $str);
    $str = preg_replace('/input/i', 'inp</>ut', $str);
    $str = preg_replace('/echo/i', 'ec</>ho', $str);
    $str = preg_replace('/print/i', 'pr</>int', $str);

    return $str;
}

function hilite(&$str) {
    $sbuf = str_replace('**', '</span>', $str);
    return str_replace('*', '<span style="background:yellow">', $sbuf);
}

?>
