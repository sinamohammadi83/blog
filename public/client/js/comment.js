function reply(reply){
    let comment= $('#reply-'+$(reply).attr('data-comment-id'))

    if (comment.hasClass('active'))
    {
        $(reply).children().removeClass('rotate')
        comment.slideUp()
        comment.removeClass('active')
    }else {
        $(reply).children().addClass('rotate')
        comment.slideDown()
        comment.addClass('active')
    }


}
