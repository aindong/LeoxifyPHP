$(function() {
    
    $.get('dashboard/xhrGetListings', function(o) {
        
        for(var i = 0; i<o.length; i++) {
            $('#listInserts').append('<div>' + o[i].text + '<a href="#" class="del" rel="' + o[i].id + '">X</a></div>');
        }
        
        
        $('.del').live('click', function() {
            delitem = $(this);
            var id = $(this).attr('rel');
            
            $.post('dashboard/xhrDeleteList', {'id': id}, function(o) {
                delitem.parent().remove();
            }, 'json');
            
            
            return false;
        });
                
    }, 'json');
    
    
    
    $('#randomInsert').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        
        $.post(url, data, function(o) {
            
            $('#listInserts').append('<div>' + o.text + '<a href="#" class="del" rel="' + o.id + '">X</a></div>');
            
        }, 'json');
        
        return false;
        
    });
    

});