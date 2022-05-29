
function reply(reply)
{
    let reply_id = splitId(reply.id)
    if($('#reply-'+reply_id).hasClass('active')){
        $('#icon-reply-'+reply_id).removeClass('d-none')
        $('#icon-close-reply-'+reply_id).addClass('d-none')
        $('#reply-'+reply_id).slideUp()
        $('#reply-'+reply_id).removeClass('active')
    }else{
        $('#icon-reply-'+reply_id).addClass('d-none')
        $('#icon-close-reply-'+reply_id).removeClass('d-none')
        $('#reply-'+reply_id).addClass('active')
        $('#reply-'+reply_id).slideDown()
        }
}
