function splitId(text)
{
    return text.split('-').pop()
}

//این کد برای منوی دسکتاب است

$('.menu-dropdown').click(function(){
    let menu_id = splitId(this.id)
    if($('#dropdown-'+menu_id).hasClass('active')){
        $('#dropdown-'+menu_id).slideUp()
        $('.icon-dropdowm-'+menu_id).css('transform','rotate(0deg)')
        $('#dropdown-'+menu_id).removeClass('active')

    }else{
        $('.dropdown').slideUp()
        $('.dropdown').removeClass('active')
        $('.icon-dropdown-menu').css('transform','rotate(0deg)')
        $('#dropdown-'+menu_id).slideDown()
        $('.icon-dropdowm-'+menu_id).css('transform','rotate(180deg)')
        $('#dropdown-'+menu_id).addClass('active')
    }
})

//این کد برای منوی موبایل است
$('.menu-dropdown-sm').click(function(){
    let menu_id = splitId(this.id)
    if($('#dropdown-sm-'+menu_id).hasClass('active')){
        $('#dropdown-sm-'+menu_id).slideUp()
        $('.icon-dropdowm-'+menu_id).css('transform','rotate(0deg)')
        $('#dropdown-sm-'+menu_id).removeClass('active')
    }else{
        $('#dropdown-sm-'+menu_id).slideDown()
        $('.icon-dropdowm-'+menu_id).css('transform','rotate(180deg)')
        $('#dropdown-sm-'+menu_id).addClass('active')
    }
})

//این کد برای باز شدن منوی موبایل است
$('.icon-menu').click(function(){
    $('.background-menu').removeClass('d-none')
    $('.menu').animate({width:'250px'},150)
})

//این کد برای بسته شدن منوی موبایل است
$('.close-menu').click(function(){

    $('.menu').animate({width:'0px'},150)
    setTimeout(function(){
        $('.background-menu').addClass('d-none')
    },150)

})

//این قطعه کد برای منوی باز یسته شونده در نسخه دسکتاپ است.
$('.icon_menu_panel').click(function (){
    if ($(this).hasClass('active'))
    {
        $(this).removeClass('active')
        $('.icon-dropdown-menu').removeClass('d-none')
        $('.panel_right').removeClass('text-center')
        $('.panel_left').attr('style','')
        $('.panel_right').attr('style','')
        $('.option_panel').removeClass('d-none')
        $('.dropdown').removeClass('position-absolute bg-white border border-dark rounded-3')
        $('.dropdown').children().addClass('col-xl-9')
    }else {
        $(this).addClass('active')
        $('.icon-dropdown-menu').addClass('d-none')
        $('.panel_right').addClass('text-center')
        $('.panel_left').css('width','92%')
        $('.panel_right').css('width','50px')
        $('.option_panel').addClass('d-none')
        $('.dropdown').removeClass('active')
        $('.dropdown').css('display','none')
        $('.dropdown').addClass('position-absolute bg-white border border-dark rounded-3')
        $('.dropdown').children().removeClass('col-xl-9')
    }
})

