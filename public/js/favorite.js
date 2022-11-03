if ($('.bt-like').length > 0) {
    $('.bt-like').on("click", function(event) {
        event.stopPropagation();
        let bt = $(this);
        let url = "";
        if ($(this).hasClass('fa-regular')){
            url = "/favorite";
        }else{
            url = "/remove-favorite";
        }
        // on récupère l'id :
        let id = $(this).attr('data-id');
        // on envoie la requête Ajax :
        $.ajax({
            url: url,
            type: 'POST',
            data: {id:id},
        }).done(function(response) {
            if($(bt).hasClass('fa-regular')){
                $(bt).removeClass('fa-regular');
                $(bt).addClass('fa-solid');
            }else{
                $(bt).removeClass('fa-solid');
                $(bt).addClass('fa-regular');
            }
        });
    });
}