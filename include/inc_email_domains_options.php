<?php

/* ------begin------ This protection code was suggested by Luki R. luki@karet.org ---- */
if (preg_match("/inc_email_domains_options.php/i", $_SERVER['PHP_SELF']))
    die('<meta http-equiv="refresh" content="0; url=../">');
/* ------end------ */

$email_domains = array("intranet", "plop", "hnop", "allgemein.chir",
    "allgemein.chir.op", "innere1", "innere2", "gyn.op",
    "unfall.op", "augen.op", "augen", "plastische", "gyn",
    "kst", "kks");
?>
