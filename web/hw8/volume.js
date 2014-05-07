
/* volume.js - Convert Volumes
 *
 * Kyle Hughes hw8
 */

"use strict";

/* Load the Factors from the JSON file.
 */
var volume_conversions;
function saveReturnVolume(data)
{
    volume_conversions = JSON.parse(data);
}
ajaxFetch("volume.json", saveReturnVolume);
/*
 *Creats the volumes and liquid measure forms
 */

function makeVolumeBoxes()
{
    document.write('<table style="margin: 1ex; border: 1px solid grey; padding: 5px;">');
    document.write('<caption></caption>');
    document.write('<colgroup>');
       document.write('<col span="1" style="text-align: right;" />');
    document.write('</colgroup>');

    for (var i = 0; i < volume_conversions.Factor.length; i++) {
        document.write("<tr>\n");
        document.write("   <td> " + volume_conversions.Factor[i].name  + " </td> \n");
        document.write("   <td> <input type='text' size='50' \n");
        document.write("         onkeyup='convert_volume(this);' \n");
        document.write("         id='" + volume_conversions.Factor[i].name + "'> \n");
        document.write("   </td>\n");
        document.write("</tr>\n\n");
    }
    document.write('</table>');
}


/* Convert the input, whatever it is, to liters.
 * Then convert liters to all the possible units.
 * The alternative is to have a whole bunch of conversions for each
 * possible input, which would grow very large.
 */
function convert_volume(item) {
    var input;   // value to be converted
    var numdec;  // how many decimal places we want
    // get value
    if (item.value.length > 0) {
        input = parseFloat(item.value);
    } else {
        // default value if box is empty
        input = 0;
    }
    // find out how decimal places on the input
    if ( item.value.split('.').length == 1 ) {
        // if no decimal point, default to 3
        numdec = 3;
    } else {
        numdec = item.value.split('.')[1].length;
    }

    // convert the input to liters
    for (var i = 0; i < volume_conversions.Factor.length; i++) {
        if (volume_conversions.Factor[i].name == item.id) {
            var liters = input * volume_conversions.Factor[i].from;
            break;
        }
    }

    /* Fill in the boxes
     * Math.round() converts its argument to an integer.
     * but any number has a "toFixed()" method which lets you specify
     * how many digits you want.
     */
    for (var i=0; i < volume_conversions.Factor.length; i++) {
        if (item.id != volume_conversions.Factor[i].name)
            document.getElementById(volume_conversions.Factor[i].name).value  =
                (liters * volume_conversions.Factor[i].to).toFixed(numdec);
    }
}

