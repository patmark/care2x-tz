<?php

#====================================================================================================#
# ar2uni v0.1 (Arabic-win1256 encoder to Unicode)                                                                                                            # 
#====================================================================================================#
# Information:                                                                                       #
#        This is PHP function for covert Arabic encoding string to                                   #
#        unicode that can use to show Arabic charactor in  function ImageTTFText().                  #
#        It Tested and worked with Multilanguage arial.ttf V2.98                                     #
#                                                                                                    #
# Version History:                                                                                   #
#        version 0.1 : First release. created on ( 22/01/2004) By Walid Fathalla                     #
#                                                                                                    #
# Bug Report and Suggestion to:                                                                      #
#        Walid Fathalla                                                                              #
#        fathalla_w@hotmail.com                                                                      #
#                                                                                                    #
#====================================================================================================#
# Example:                                                                                           #
#        include_once($root_path.'inc_ttf_ar2uni.php');                                              #
#        ImageTTFText ($image, 8, 0, 3, 15, $white, "arial.ttf",ar2uni("$ArabicString"));            #
#====================================================================================================#
# For Arabic Website: If you thing this module useful to you, please send to                         #
#                     me back to my email fathalla_w@hotmail.com.                                    #
#                                                                                                    #
#====================================================================================================#
#================================================// Arabic character maps//=============================================
$ar2unimap = array(// One bit character isolated form
    ',' => "&#1548;", '�' => "&#1563;", '�' => "&#1567;", '�' => "&#1569;", '�' => "&#1570;", '�' => "&#1571;", '�' => "&#1572;",
    '�' => "&#1573;", '�' => "&#1574;", '�' => "&#1575;", '�' => "&#1576;", '�' => "&#1577;", '�' => "&#1578;", '�' => "&#1579;",
    '�' => "&#1580;", '�' => "&#1581;", '�' => "&#1582;", '�' => "&#1583;", '�' => "&#1584;", '�' => "&#1585;", '�' => "&#1586;",
    '�' => "&#1587;", '�' => "&#1588;", '�' => "&#1589;", '�' => "&#1590;", '�' => "&#1591;", '�' => "&#1592;", '�' => "&#1593;",
    '�' => "&#1594;", '�' => "&#1600;", '�' => "&#1601;", '�' => "&#1602;", '�' => "&#1603;", '�' => "&#1604;", '�' => "&#1605;",
    '�' => "&#1606;", '�' => "&#1607;", '�' => "&#1608;", '�' => "&#1609;", '�' => "&#1610;", '�' => "&#1611;", '�' => "&#1612;",
    '�' => "&#1613;", '�' => "&#1614;", '�' => "&#1615;", '�' => "&#1616;", '�' => "&#1617;", '�' => "&#1618;");

$ar2unimap2 = array(// One bit character initial form
    '�' => "&#65153;", '�' => "&#65155;", '�' => "&#65157;", '�' => "&#65159;", '�' => "&#65163;", '�' => "&#65165;", '�' => "&#65169;",
    '�' => "&#65175;", '�' => "&#65179;", '�' => "&#65183;", '�' => "&#65187;", '�' => "&#65191;", '�' => "&#65193;", '�' => "&#65195;",
    '�' => "&#65197;", '�' => "&#65199;", '�' => "&#65203;", '�' => "&#65207;", '�' => "&#65211;", '�' => "&#65215;", '�' => "&#65219;",
    '�' => "&#65223;", '�' => "&#65227;", '�' => "&#65231;", '�' => "&#65235;", '�' => "&#65239;", '�' => "&#65243;", '�' => "&#65247;",
    '�' => "&#65251;", '�' => "&#65255;", '�' => "&#65259;", '�' => "&#65261;", '�' => "&#65267;");

$ar2unimap3 = array(// One bit character medial form
    '�' => "&#65164;", '�' => "&#65170;", '�' => "&#65176;", '�' => "&#65180;", '�' => "&#65184;", '�' => "&#65188;", '�' => "&#65192;",
    '�' => "&#65204;", '�' => "&#65208;", '�' => "&#65212;", '�' => "&#65216;", '�' => "&#65220;", '�' => "&#65224;", '�' => "&#65228;",
    '�' => "&#65232;", '�' => "&#65236;", '�' => "&#65240;", '�' => "&#65244;", '�' => "&#65248;", '�' => "&#65252;", '�' => "&#65256;",
    '�' => "&#65260;", '�' => "&#65268;");

$ar2unimap4 = array(// One bit character final form
    '�' => "&#65154;", '�' => "&#65156;", '�' => "&#65158;", '�' => "&#65160;", '�' => "&#65162;", '�' => "&#65166;", '�' => "&#65168;",
    '�' => "&#65172;", '�' => "&#65174;", '�' => "&#65178;", '�' => "&#65182;", '�' => "&#65186;", '�' => "&#65190;", '�' => "&#65194;",
    '�' => "&#65196;", '�' => "&#65198;", '�' => "&#65200;", '�' => "&#65202;", '�' => "&#65206;", '�' => "&#65210;", '�' => "&#65214;",
    '�' => "&#65218;", '�' => "&#65222;", '�' => "&#65226;", '�' => "&#65230;", '�' => "&#65234;", '�' => "&#65238;", '�' => "&#65242;",
    '�' => "&#65246;", '�' => "&#65250;", '�' => "&#65254;", '�' => "&#65258;", '�' => "&#65262;", '�' => "&#65264;", '�' => "&#65266;");

$ar2unimap5 = array(// Two bit character isolated & initial form
    '��' => "&#65269;",
    '��' => "&#65271;",
    '��' => "&#65273;",
    '��' => "&#65275;");

$ar2unimap6 = array(// Two bit character final form 
    '��' => "&#65270;",
    '��' => "&#65272;",
    '��' => "&#65274;",
    '��' => "&#65276;");
#================================================// end of character maps//=============================================

function ar2uni($sti) {
    global $ar2unimap, $ar2unimap2, $ar2unimap3, $ar2unimap4, $ar2unimap5, $ar2unimap6;


    # Patch by Elpidio 2004-02-06
    # If the text is encoded in unicode, reverse the order and return
    if (strstr($sti, '&#') && strstr($sti, ';')) {
        $buf = explode(';', $sti);
        $buf = array_reverse($buf);
        # Remove the first element which is empty
        unset($buf[0]);
        $sti = implode(';', $buf);
        return trim($sti) . ';';
    } else {

        $sti .= " ";
        $temp = $sti;
        $sti = strrev($temp);
        $sti .= " ";
        $sto = '';
        $len = strlen($sti);

        for ($i = 1; $i < $len - 1; $i++) {
            #=========================// for one bit character have 4 forms//================
            if ($ar2unimap3[$sti{$i}]) {

                if ($sti{$i - 1} == " " and $sti{$i + 1} == " ") {
                    $sto .=$ar2unimap[$sti{$i}];
                } elseif ($sti{$i - 1} == " ") {

                    if ($ar2unimap3[$sti{$i + 1}]) {
                        $sto .=$ar2unimap4[$sti{$i}];
                    } else {
                        $sto .=$ar2unimap[$sti{$i}];
                    }
                } elseif ($sti{$i + 1} == " ") {
                    $sto .=$ar2unimap2[$sti{$i}];
                } else {

                    if ($ar2unimap3[$sti{$i + 1}]) {
                        $sto .=$ar2unimap3[$sti{$i}];
                    } else {
                        $sto .=$ar2unimap2[$sti{$i}];
                    }
                }
                #=========================// for one bit character have 3 forms//================
            } elseif ($ar2unimap2[$sti{$i}]) {

                if ($sti{$i - 1} == " " and $sti{$i + 1} == " ") {
                    $sto .=$ar2unimap[$sti{$i}];
                } elseif ($sti{$i - 1} == " ") {

                    if ($ar2unimap3[$sti{$i + 1}]) {

                        if ($sti{$i} == "�" and $sti{$i + 1} == "�") {// to check lam alef  Two bit character
                            if ($ar2unimap3[$sti{$i + 2}]) {
                                $sto .=$ar2unimap6["��"];
                            } else {
                                $sto .=$ar2unimap5["��"];
                            }
                            $i++;
                        } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                            if ($ar2unimap3[$sti{$i + 2}]) {
                                $sto .=$ar2unimap6["��"];
                            } else {
                                $sto .=$ar2unimap5["��"];
                            }
                            $i++;
                        } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                            if ($ar2unimap3[$sti{$i + 2}]) {
                                $sto .=$ar2unimap6["��"];
                            } else {
                                $sto .=$ar2unimap5["��"];
                            }
                            $i++;
                        } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                            if ($ar2unimap3[$sti{$i + 2}]) {
                                $sto .=$ar2unimap6["��"];
                            } else {
                                $sto .=$ar2unimap5["��"];
                            }
                            $i++;
                        } else {
                            $sto .=$ar2unimap4[$sti{$i}];
                        }
                    } else {
                        $sto .=$ar2unimap[$sti{$i}];
                    }
                } elseif ($sti{$i + 1} == " ") {
                    $sto .=$ar2unimap[$sti{$i}];
                } else {

                    if ($ar2unimap3[$sti{$i + 1}]) {

                        if ($sti{$i} == "�" and $sti{$i + 1} == "�") {// to check lam alef  Two bit character
                            if ($ar2unimap3[$sti{$i + 2}]) {
                                $sto .=$ar2unimap6["��"];
                            } else {
                                $sto .=$ar2unimap5["��"];
                            }
                            $i++;
                        } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                            if ($ar2unimap3[$sti{$i + 2}]) {
                                $sto .=$ar2unimap6["��"];
                            } else {
                                $sto .=$ar2unimap5["��"];
                            }
                            $i++;
                        } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                            if ($ar2unimap3[$sti{$i + 2}]) {
                                $sto .=$ar2unimap6["��"];
                            } else {
                                $sto .=$ar2unimap5["��"];
                            }
                            $i++;
                        } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                            if ($ar2unimap3[$sti{$i + 2}]) {
                                $sto .=$ar2unimap6["��"];
                            } else {
                                $sto .=$ar2unimap5["��"];
                            }
                            $i++;
                        } else {
                            $sto .=$ar2unimap4[$sti{$i}];
                        }
                    } else {
                        $sto .=$ar2unimap[$sti{$i}];
                    }
                }
                #=========================// for one bit character have 2forms//================
            } elseif ($ar2unimap4[$sti{$i}]) {

                if ($sti{$i - 1} == " " and $sti{$i + 1} == " ") {
                    $sto .=$ar2unimap[$sti{$i}];
                } elseif ($sti{$i - 1} == " ") {

                    if ($ar2unimap3[$sti{$i + 1}]) {
                        $sto .=$ar2unimap4[$sti{$i}];
                    } else {
                        $sto .=$ar2unimap[$sti{$i}];
                    }
                } elseif ($sti{$i + 1} == " ") {
                    $sto .=$ar2unimap[$sti{$i}];
                } else {

                    if ($ar2unimap3[$sti{$i + 1}]) {
                        $sto .=$ar2unimap4[$sti{$i}];
                    } else {
                        $sto .=$ar2unimap[$sti{$i}];
                    }
                }
                #=========================// for one bit character have 1 form//================
            } elseif ($ar2unimap[$sti{$i}]) {
                $sto .=$ar2unimap[$sti{$i}];
            } else {
                $sto .= $sti{$i};
            }
        }
        return $sto;
    }
}

?>
