<?php

#====================================================================================================#
# ar2uni v0.1 (Arabic-win1256 encoder to Unicode)                                                    # 
#====================================================================================================#
# Information:                                                                                       #
#        This is PHP function for covert Arabic encoding string to                                   #
#        unicode that can use to show Arabic charactor in  PDF Documents.                  #
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
    ',' => 161, '�' => 162, '�' => 163, '�' => 164, '�' => 165, '�' => 166, '�' => 167,
    '�' => 168, '�' => 169, '�' => 170, '�' => 171, '�' => 172, '�' => 174, '�' => 176,
    '�' => 177, '�' => 178, '�' => 179, '�' => 180, '�' => 182, '�' => 184, '�' => 185,
    '�' => 186, '�' => 187, '�' => 188, '�' => 189, '�' => 190, '�' => 191, '�' => 192,
    '�' => 193, '�' => 194, '�' => 195, '�' => 196, '�' => 197, '�' => 198, '�' => 199,
    '�' => 200, '�' => 201, '�' => 202, '�' => 203, '�' => 204);

$ar2unimap2 = array(// One bit character initial form
    '�' => 165, '�' => 166, '�' => 167, '�' => 168, '�' => 205, '�' => 170, '�' => 206,
    '�' => 207, '�' => 208, '�' => 209, '�' => 210, '�' => 211, '�' => 180, '�' => 182,
    '�' => 184, '�' => 185, '�' => 212, '�' => 213, '�' => 214, '�' => 215, '�' => 190,
    '�' => 191, '�' => 216, '�' => 217, '�' => 218, '�' => 219, '�' => 220, '�' => 221,
    '�' => 222, '�' => 223, '�' => 224, '�' => 202, '�' => 225);

$ar2unimap3 = array(// One bit character medial form
    '�' => 205, '�' => 206, '�' => 207, '�' => 208, '�' => 209, '�' => 210, '�' => 211,
    '�' => 212, '�' => 213, '�' => 214, '�' => 215, '�' => 190, '�' => 191, '�' => 226,
    '�' => 227, '�' => 228, '�' => 229, '�' => 220, '�' => 221, '�' => 222, '�' => 223,
    '�' => 230, '�' => 225);

$ar2unimap4 = array(// One bit character final form
    '�' => 231, '�' => 232, '�' => 167, '�' => 233, '�' => 234, '�' => 235, '�' => 171,
    '�' => 236, '�' => 174, '�' => 176, '�' => 237, '�' => 238, '�' => 239, '�' => 180,
    '�' => 182, '�' => 184, '�' => 185, '�' => 186, '�' => 187, '�' => 188, '�' => 189,
    '�' => 190, '�' => 191, '�' => 240, '�' => 241, '�' => 195, '�' => 196, '�' => 197,
    '�' => 198, '�' => 199, '�' => 200, '�' => 242, '�' => 202, '�' => 243, '�' => 244);

$ar2unimap5 = array(// Two bit character isolated & initial form
    '��' => 245,
    '��' => 246,
    '��' => 247,
    '��' => 248);

$ar2unimap6 = array(// Two bit character final form 
    '��' => 249,
    '��' => 250,
    '��' => 251,
    '��' => 252);



#================================================// end of character maps//=============================================

function ar2uni($sti) {
    global $ar2unimap, $ar2unimap2, $ar2unimap3, $ar2unimap4, $ar2unimap5, $ar2unimap6;
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
                $sto .=chr($ar2unimap[$sti{$i}]);
            } elseif ($sti{$i - 1} == " ") {

                if ($ar2unimap3[$sti{$i + 1}]) {
                    $sto .=chr($ar2unimap4[$sti{$i}]);
                } else {
                    $sto .=chr($ar2unimap[$sti{$i}]);
                }
            } elseif ($sti{$i + 1} == " ") {
                $sto .=chr($ar2unimap2[$sti{$i}]);
            } else {

                if ($ar2unimap3[$sti{$i + 1}]) {
                    $sto .=chr($ar2unimap3[$sti{$i}]);
                } else {
                    $sto .=chr($ar2unimap2[$sti{$i}]);
                }
            }
            #=========================// for one bit character have 3 forms//================
        } elseif ($ar2unimap2[$sti{$i}]) {

            if ($sti{$i - 1} == " " and $sti{$i + 1} == " ") {
                $sto .=chr($ar2unimap[$sti{$i}]);
            } elseif ($sti{$i - 1} == " ") {

                if ($ar2unimap3[$sti{$i + 1}]) {

                    if ($sti{$i} == "�" and $sti{$i + 1} == "�") {// to check lam alef  Two bit character
                        if ($ar2unimap3[$sti{$i + 2}]) {
                            $sto .=chr($ar2unimap6["��"]);
                        } else {
                            $sto .=chr($ar2unimap5["��"]);
                        }
                        $i++;
                    } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                        if ($ar2unimap3[$sti{$i + 2}]) {
                            $sto .=chr($ar2unimap6["��"]);
                        } else {
                            $sto .=chr($ar2unimap5["��"]);
                        }
                        $i++;
                    } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                        if ($ar2unimap3[$sti{$i + 2}]) {
                            $sto .=chr($ar2unimap6["��"]);
                        } else {
                            $sto .=chr($ar2unimap5["��"]);
                        }
                        $i++;
                    } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                        if ($ar2unimap3[$sti{$i + 2}]) {
                            $sto .=chr($ar2unimap6["��"]);
                        } else {
                            $sto .=chr($ar2unimap5["��"]);
                        }
                        $i++;
                    } else {
                        $sto .=chr($ar2unimap4[$sti{$i}]);
                    }
                } else {
                    $sto .=chr($ar2unimap[$sti{$i}]);
                }
            } elseif ($sti{$i + 1} == " ") {
                $sto .=chr($ar2unimap[$sti{$i}]);
            } else {

                if ($ar2unimap3[$sti{$i + 1}]) {

                    if ($sti{$i} == "�" and $sti{$i + 1} == "�") {// to check lam alef  Two bit character
                        if ($ar2unimap3[$sti{$i + 2}]) {
                            $sto .=chr($ar2unimap6["��"]);
                        } else {
                            $sto .=chr($ar2unimap5["��"]);
                        }
                        $i++;
                    } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                        if ($ar2unimap3[$sti{$i + 2}]) {
                            $sto .=chr($ar2unimap6["��"]);
                        } else {
                            $sto .=chr($ar2unimap5["��"]);
                        }
                        $i++;
                    } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                        if ($ar2unimap3[$sti{$i + 2}]) {
                            $sto .=chr($ar2unimap6["��"]);
                        } else {
                            $sto .=chr($ar2unimap5["��"]);
                        }
                        $i++;
                    } elseif ($sti{$i} == "�" and $sti{$i + 1} == "�") {
                        if ($ar2unimap3[$sti{$i + 2}]) {
                            $sto .=chr($ar2unimap6["��"]);
                        } else {
                            $sto .=chr($ar2unimap5["��"]);
                        }
                        $i++;
                    } else {
                        $sto .=chr($ar2unimap4[$sti{$i}]);
                    }
                } else {
                    $sto .=chr($ar2unimap[$sti{$i}]);
                }
            }
            #=========================// for one bit character have 2forms//================
        } elseif ($ar2unimap4[$sti{$i}]) {

            if ($sti{$i - 1} == " " and $sti{$i + 1} == " ") {
                $sto .=chr($ar2unimap[$sti{$i}]);
            } elseif ($sti{$i - 1} == " ") {

                if ($ar2unimap3[$sti{$i + 1}]) {
                    $sto .=chr($ar2unimap4[$sti{$i}]);
                } else {
                    $sto .=chr($ar2unimap[$sti{$i}]);
                }
            } elseif ($sti{$i + 1} == " ") {
                $sto .=chr($ar2unimap[$sti{$i}]);
            } else {

                if ($ar2unimap3[$sti{$i + 1}]) {
                    $sto .=chr($ar2unimap4[$sti{$i}]);
                } else {
                    $sto .=chr($ar2unimap[$sti{$i}]);
                }
            }
            #=========================// for one bit character have 1 form//================
        } elseif ($ar2unimap[$sti{$i}]) {
            $sto .=chr($ar2unimap[$sti{$i}]);
        } else {
            $sto .= $sti{$i};
        }
    }
    return $sto;
}

?>
