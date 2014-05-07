/* nav.js - javascript for the navigation feature
 *
 */

"use strict";

function show_tab(tabid)
{
    var activetab = document.getElementById(tabid);
    var tabbar    = activetab.parentNode;
    var alltabs   = tabbar.childNodes;
    var tabnum    = -1; // when we hit the first one, we'll add 1
    var hottab;

    for (var i = 0; i < alltabs.length; i++) {
        if ( alltabs[i].hasAttribute ) { // make sure it's an object
            if (alltabs[i].hasAttribute("class") ) {
                alltabs[i].removeAttribute("class");
            }
            tabnum++;
            if ( alltabs[i] == activetab ) {
                hottab = tabnum;
            }
        }
    }
    activetab.setAttribute("class", "thistab");

    var allcards = document.querySelectorAll(".cardstack");

    for (i = 0; i < allcards.length; i++) {
        if (i == hottab) {
            allcards[i].setAttribute("style", "display: block");
        } else {
            allcards[i].setAttribute("style", "display: none");
        }
    }
}

/* About "make sure it's an object" up above:
 * We declared a UL, and then we put LIs in it.  To a person, the
 * only child nodes of the UL are the LIs.  But to a web browser,
 * the hunks of whitespace between the LIs might get nodes as
 * text in the tree.  We don't want to count any whitespace nodes,
 * so that's why we do that test.
 */
