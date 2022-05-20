function splitId(text)
{
    return text.split('-').pop()
}

//این کد برای منوی دسکتاب است

$('.menu-dropdown').click(function(){
    let menu_id = splitId(this.id)
    if($('#dropdown-'+menu_id).hasClass('active')){
        console.log(2)
        $('#dropdown-'+menu_id).slideUp()
        $('.icon-dropdowm-'+menu_id).css('transform','rotate(0deg)')
        $('#dropdown-'+menu_id).removeClass('active')

    }else{
        console.log(1)
        console.log($('.dropdown'))
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
