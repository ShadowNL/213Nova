$(document).ready(function () {
    //initial
    $('#content').load('index.php');

    // $('#addsubject a').click(function () {
    //     var page = $(this).attr('href');
    //     $('#content').load(page + '.php');
    //     return false;
    // });

    $('.menuitem:not(#addsubject)').click(function () {
        console.log($(this).attr('vak'), $(this).attr('sector'));
        var SectorID = $(this).attr('sector');
        var VakID = $(this).attr('vak');
        var page = 'index.php?SectorID=' + SectorID + '&VakID=' + VakID;
        $('#content').load(page);
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

