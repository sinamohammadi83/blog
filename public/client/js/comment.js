$('.reply').click(function (){
    let comment= $('#reply-'+$(this).attr('data-comment-id'))

    if (comment.hasClass('active'))
    {
        $(this).children().removeClass('rotate')
        comment.slideUp()
        comment.removeClass('active')
    }else {
        $(this).children().addClass('rotate')
        comment.slideDown()
        comment.addClass('active')
    }


})
