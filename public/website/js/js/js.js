var category = document.getElementById('category')
var icon_category = document.getElementById('icon-dropdown')
var dropdown = document.getElementById('dropdown')
var nav = document.getElementsByClassName('nav')[0]
    category.onclick = () =>{
        if(dropdown.style.display=='none'){
            let background = document.getElementsByClassName('background-dark')[0]
            nav.style.borderRadius='7px 7px 0px 0px'
            icon_category.style.transform='rotate(180deg)'
            dropdown.style.display='block'
            $('#dropdown').addClass('active')
        }else{
            nav.style.borderRadius='7px'
            icon_category.style.transform='rotate(0deg)'
            dropdown.style.display='none'
            $('#dropdown').removeClass('active')
        }
    }
    
    $('.dropdown-items').hover(function(){
        $('.dropdown-category').css('display','none')
        $('.dropdown-items').removeClass('active-items')
        let category_id = splitId(this.id)
        $('#item-'+category_id).css('display','block')
        $(this).addClass('active-items')
    },function(){

    })

    // این قطعه کد برای منوی باز شونده در نسخه موبایل است.

    $(".menu-icon").click(function(){
        $(".background-menu").removeClass("hidden")
        $(".background-menu").addClass("active")
        $(".menu").animate({width:'250px'},150)
    })

    // این قطعه کد برای منوی باز شونده در نسخه موبایل است.

    $('.close-menu').click(function(){
        setTimeout(function(){
            $(".background-menu").removeClass("active")
            $(".background-menu").addClass("hidden")
        },200)
        $(".menu").animate({width:'0px'},100)
    })

    $('.button-darkmode-lightmode').click(function(){
        console.log();
    })

    //.این کد برای دسته بندی در نسخه موبایل است
    
    $('.category-dropdown').click(function(){
        let dropdown = $('.dropdown')
        if($(this).hasClass('active')){
            $(this).removeClass('active')
            $(this).children().css('transform','rotate(0deg)')
            dropdown.slideUp()
        }else{
            $(this).addClass('active');
            $(this).children().css('transform','rotate(180deg)') 
            dropdown.slideDown()
            dropdown.css('display','block')
        }
        
    })

    //.این کد برای دسته بندی در نسخه موبایل است

    $('.dropdown-items-menu').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active')
            let category_id = splitId(this.id)
            $('#icon-dropdown-'+category_id).css('transform','rotate(0deg)')
            $('#item-menu-'+category_id).slideUp()
        }else{
            $(this).addClass('active')
            let category_id = splitId(this.id)
            $('#icon-dropdown-'+category_id).css('transform','rotate(180deg)')
            $('#item-menu-'+category_id).slideDown()
        }
    })

    function splitId(text)
    {
        return text.split('-').pop()
    }


    //این کد برای قسمت پنل باز شونده برای خروج و مدیریت است

    $('.account').click(function(){
        if($('.dropdown-account').hasClass('active'))
        {
            $('.dropdown-account').removeClass('active')
            $('.dropdown-account').slideUp()
        }else{
            $('.dropdown-account').addClass('active')
            $('.dropdown-account').slideDown()
        }
        
    })
    