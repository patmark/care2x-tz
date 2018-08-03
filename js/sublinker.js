/* author: Lorilla Bong */
/* Generated by AceHTML Freeware http://freeware.acehtml.com */
/* Creation date: 24.06.01 */

//<!-- Beginning of JavaScript -
// CREDITS:
// SUPER-SIMPLE: add submenus to any textlink!
// by Urs Dudli and Peter Gehrig 
// Copyright (c) 2000 Peter Gehrig and Urs Dudli. All rights reserved.
// Permission given to use the script provided that this notice remains as is.
// Additional scripts can be found at http://www.24fun.com/fast/index.html
// info@24fun.com
// 9/7/2000

// IMPORTANT: 
// If you add this script to a script-library or a script-archive 
// you are required to insert a highly visible link to http://www.24fun.com/fast/index.html 
// right into the webpage where the script
// will be displayed.

// CONFIGURATION:
// Go to http://www.24fun.com/fast/index.html, open category 'utility' and 
// download the ZIP-file of this script containing the the script-file 
// with colorized step-by-step instructions for easy configuration.

// How long shall the submenu be visible? Answer in seconds
var standstill = 2

// horizontal distance from the textlink to the submenu (pixels)
var xdistance = 0

// vertical distance from the textlink to the submenu (pixels)
var ydistance = 20

// Do not edit the variables below
var timer
var x, y
var standstill = 1000 * standstill
var opensubmenu
var closesubmenu
var activated = false

function initiate() {
    if (document.all) {
        closesubmenu = eval("document.all.submenu1.style")
        activated = true
    }
    if (document.layers) {
        closesubmenu = eval("document.submenu1")
        activated = true
    }
}

function show(whatsubmenu) {
    if (activated) {
        if (document.all) {
            closesubmenu.visibility = "hidden"
            closesubmenu = eval("document.all." + whatsubmenu + ".style")
            opensubmenu = eval("document.all." + whatsubmenu + ".style")
            opensubmenu.posTop = y + ydistance
            opensubmenu.posLeft = x + xdistance
            opensubmenu.visibility = "visible"
            timer = setTimeout("hidesubmenu()", standstill)
        }
        if (document.layers) {
            closesubmenu.visibility = "hidden"
            closesubmenu = eval("document." + whatsubmenu)
            opensubmenu = eval("document." + whatsubmenu)
            opensubmenu.top = y + ydistance
            opensubmenu.left = x + xdistance
            opensubmenu.visibility = "visible"
            timer = setTimeout("hidesubmenu()", standstill)
        }
    }
}

function hidesubmenu() {
    clearTimeout(timer)
    closesubmenu.visibility = "hidden"
    opensubmenu.visibility = "hidden"
}


function handlerMM(e) {
    x = (document.layers) ? e.pageX : document.body.scrollLeft + event.clientX
    y = (document.layers) ? e.pageY : document.body.scrollTop + event.clientY
}

if (document.layers) {
    document.captureEvents(Event.MOUSEMOVE);
}
document.onmousemove = handlerMM;
window.onload = initiate

// - End of JavaScript - -->
