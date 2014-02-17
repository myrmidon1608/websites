function meetTeam() {
    $('#team-info').replaceWith('<div id="team-info"></div>');
    
    $('#teamScrn').slideDown(500);
    $('#navigation').css('display', 'none');
    
    $.post('php/teamcheck.php', function(data) {
        $('#team-info').append(data);
    });
}

function meetMember(empl_id) {
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


