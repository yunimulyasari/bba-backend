var show_per_page = 12, number_of_items,number_of_pages; 


$(document).ready(function() {

    $('body').append('<div class="product__pagination"></div><input id=current_page type=hidden><input id=show_per_page type=hidden>');
    $('#current_page').val(0);
    $('#show_per_page').val(show_per_page);
    
    number_of_items = $('#filter').children('p').size();
    number_of_pages = Math.ceil(number_of_items / show_per_page);
    
   createPagination(1);
    
});

 

function createPagination(page){
	var navigation_html ='<ul class="product__pagination--ul">';
        navigation_html += '<li class="product__pagination--li"><a href="#" class="prev product__pagination--a" onclick="previous()"><span class="icon--pagination icon--pagination--left"> Prev </span></a></li>';
    
    for (var i=page; i < (page + 4); i++ ) {
        navigation_html += '<li class="product__pagination--li"><a href="#" class="page product__pagination--a" onclick="go_to_page(' + i + ')" longdesc="' + i + '">' + i + '</a></li>';
    }
    navigation_html += '<li class="product__pagination--li"><a href="#" class="next product__pagination--a" onclick="next()"><span class="icon--pagination icon--pagination--right"> Next </span></a></li>';
    navigation_html +='</ul>';

    $('.product__pagination').html(navigation_html);
    $('.product__pagination .page:first').addClass('product__pagination--active');

    $('#filter').children().css('display', 'none');
    $('#filter').children().slice(0, show_per_page).css('display', 'block');
}


function go_to_page(page_num) {
    var show_per_page = parseInt($('#show_per_page').val(), 0);

    start_from = (page_num -1) * show_per_page;

    end_on = start_from + show_per_page;

    $('#filter').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

    //$('.page[longdesc=' + page_num + ']').addClass('active').siblings('.active').removeClass('active');
    $(".product__pagination--active").removeClass('product__pagination--active');

	$('.page[longdesc=' + page_num + ']').addClass('product__pagination--active');

    $('#current_page').val(page_num);
}



function previous() {
	var number_of_items = $('#filter').children('p').size();

    var currentPage = parseInt($('.product__pagination').find('a:eq(1)').text());
    
    var prev = currentPage - 1;
    if(prev < 1){
        prev = 1;
    }
    
    createPagination(prev);
    go_to_page(prev);

}


function next() {
    var number_of_items = $('#filter').children('p').size();
    console.log(number_of_items);
    var currentPage = parseInt($('.product__pagination').find('a:eq(1)').text());
    
    var next = currentPage + 1;
    if(next > (number_of_pages - 4)){
        next = number_of_pages - 3;
    }
    
    createPagination(next);
    go_to_page(next);
    
}