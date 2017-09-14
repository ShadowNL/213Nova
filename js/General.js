var lastClickedEditVak;
var LastClickedEditSector;
var LastClickedEditOpdracht;

function initEditOpdracht() {
    $('.opdrachten-label-download-btn').click(function () {
        console.log('print!', $(this).attr('opdrachtid'));
        LastClickedEditOpdracht = $(this).attr('opdrachtid');
        lastClickedEditVak = $(this).attr('vakid');
    });
}

$(document).ready(function () {
    //initial

    // $('#addsubject a').click(function () {
    //     var page = $(this).attr('href');
    //     $('#content').load(page + '.php');
    //     return false;
    // });

    $('.menuitem:not(#addsubject)').click(function () {
        console.log($(this).attr('vak'), $(this).attr('sector'));
        var SectorID = $(this).attr('sector');
        var VakID = $(this).attr('vak');
        lastClickedEditVak = $(this).attr('vak');
        LastClickedEditSector = $(this).attr('sector');
        var page = 'index.php?SectorID=' + SectorID + '&VakID=' + VakID;
        $('#content').load(page);
        window.history.replaceState(null, null, '2_Sectorhome.php?SectorID=' + SectorID + '&VakID=' + VakID + window.location.hash);
    });

    $('#btn-logout').click(function() {
        $.ajax({
            type:'POST',
            url:'Logout.php',
            data: { },
            success: function(response){
                location.reload();
            }
        });
    });
})

