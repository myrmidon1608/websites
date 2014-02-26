function meetTeam() {
    $('#team-info').replaceWith('<div id="team-info"></div>');
    
    $.post('php/teamcheck.php', function(data) {
        $('#team-info').append(data);
    });
    
    $('#teamScrn').slideDown(500);
    $('#navigation').css('display', 'none');
    $('.js234').css('display', 'none');
}

function meetMember(empl_id, e) {
    if(e != undefined) {
        var id = $(e).attr('class').split(' ')[1];
        $('#' + id + '-marker').css('display', 'block');
    }
    
    $('#member-info').replaceWith('<div id="member-info"></div>');
	$('#teamScrn').slideUp(500);
    $('#memberScrn').fadeIn(500);
    
    var member = {
        id: empl_id
    };
    
    $.ajax({
        type: 'POST',
        url: 'php/infocheck.php', 
        data: member, 
        dataType: 'html',
        success: function(data) {
            $('#member-info').append(data); 
        }   
    });
}


