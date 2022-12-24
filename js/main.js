$('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    autoplay:true,
	autoplayTimeout:10000,
	autoplayHoverPause:false,
	autoplaySpeed: 2000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


$(document).ready(function(){


    $('.item-bus').show();
    $('.item-train').hide();
    $('.item-flight').hide();


    $('#bus span').addClass('line');

    $('#bus').click(function(){


        $('.item-bus').show();
        $('.item-train').hide();
        $('.item-flight').hide();


        $('#bus span').addClass('line');
        $('#train span').removeClass('line');
        $('#flight span').removeClass('line');
    })

    $('#train').click(function(){


        $('.item-bus').hide();
        $('.item-train').show();
        $('.item-flight').hide();


        $('#bus span').removeClass('line');
        $('#train span').addClass('line');
        $('#flight span').removeClass('line');
    })


    $('#flight').click(function(){


        $('.item-bus').hide();
        $('.item-train').hide();
        $('.item-flight').show();


        $('#bus span').removeClass('line');
        $('#train span').removeClass('line');
        $('#flight span').addClass('line');
    })



})



var a;
function show(){
    if(a==1){
        document.getElementById('accordion').style.display='none';
        document.getElementById('up').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=0;
    }
    else{
        document.getElementById('accordion').style.display='block';
        document.getElementById('up').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=1;
    }
}
function showI(){
    if(a==1){
        document.getElementById('accordion-1').style.display='none';
        document.getElementById('up1').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=0;
    }
    else{
        document.getElementById('accordion-1').style.display='block';
        document.getElementById('up1').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=1;
    }
}


function showIi(){
    if(a==1){
        document.getElementById('accordion-2').style.display='none';
        document.getElementById('up1').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=0;
    }
    else{
        document.getElementById('accordion-2').style.display='block';
        document.getElementById('up1').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=1;
    }
}



function showIii(){
    if(a==1){
        document.getElementById('accordion-3').style.display='none';
        document.getElementById('up1').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=0;
    }
    else{
        document.getElementById('accordion-3').style.display='block';
        document.getElementById('up1').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=1;
    }
}




function showIiii(){
    if(a==1){
        document.getElementById('accordion-4').style.display='none';
        document.getElementById('up1').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=0;
    }
    else{
        document.getElementById('accordion-4').style.display='block';
        document.getElementById('up1').innerHTML='<i class="fa-solid fa-chevron-up"></i>';
        return a=1;
    }
}


