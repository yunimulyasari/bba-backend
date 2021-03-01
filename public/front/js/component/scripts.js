var show_per_page = 12, number_of_items,number_of_pages; 

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /////// collapse
    $('input[type=radio]').on('change', function () {
        if (!this.checked) return
        $('.collapse').not($('div.' + $(this).attr('class'))).slideUp();
        $('.collapse.' + $(this).attr('class')).slideDown();
    });
      

$('.qty').keyup(function () { 
    var sum = 0;
    $('.subT').each(function() {
        sum += Number($(this).val());
    });
    //$('h3#totalcart').text('Rp. '+ (sum/1000).toFixed(3));

   $('h3#totalcart').text('Rp. '+ addPeriod(sum));
    $('#grandtotal').val(sum);
});

function addPeriod(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}



    /////// popup paymentmethod & shopping alert
    $("#shopping__alert--popup").click(function(event) { //#process__to__payment
        event.preventDefault();
        var popuppm = $(this).attr("href");
        $(".popup__shopping--wrapper").removeClass("popup--hide");
        $(".popup__shopping--wrapper").addClass("popup--show");     
    });



    /////// popup paymentmethod & shopping alert
    
    $("#shopping__alert--popup").click(function(event) { //#process__to__payment
        event.preventDefault();
        var popuppm = $(this).attr("href");
        $(".popup__shopping--wrapper").removeClass("popup--hide");
        $(".popup__shopping--wrapper").addClass("popup--show");     
    });

    /////// menu header responsive
    $('.menu__responsive').hide();
    $('.logo--menu').click(function(){
        $('.menu__responsive').slideToggle('slow');
    }); 

    if ($(window).width() < 700) {
        /////// account name in header
        $(".accountname--link").click(function(event) {
            $(".menu--accountname__responsive--ul").slideToggle("slow");
        });
    }
    if ($(window).width() > 700) {
        /////// account name in header
        $(".accountname--link").click(function(event) {
            if ($(".menu--accountname--ul").hasClass("hide--menu--accountname")){
                $(".menu--accountname--ul").removeClass("hide--menu--accountname");
                $(".menu--accountname--ul").addClass("show--menu--accountname");
            }
            else{
                $(".menu--accountname--ul").removeClass("show--menu--accountname");
                $(".menu--accountname--ul").addClass("hide--menu--accountname");
            }
            
        });
    }

    if ($(window).width() < 1024) {
        /////// when click, collapse category
        $(".collapse__link--cat").click(function(event) {
            $(".collapse__container--cat").slideToggle("slow");
            if ($(".icon--collapse--cat").hasClass("icon--collapse--min")){
                $(".icon--collapse--cat").removeClass("icon--collapse--min");
                $(".icon--collapse--cat").addClass("icon--collapse--max");
            }
            else{
                $(".icon--collapse--cat").removeClass("icon--collapse--max");
                $(".icon--collapse--cat").addClass("icon--collapse--min");
            }
        });
        /////// when click, collapse color
        $(".collapse__link--col").click(function(event) {
            $(".collapse__container--col").slideToggle("slow");
            if ($(".icon--collapse--col").hasClass("icon--collapse--min")){
                $(".icon--collapse--col").removeClass("icon--collapse--min");
                $(".icon--collapse--col").addClass("icon--collapse--max");
            }
            else{
                $(".icon--collapse--col").removeClass("icon--collapse--max");
                $(".icon--collapse--col").addClass("icon--collapse--min");
            }
        });
        /////// when click, collapse ocassion
        $(".collapse__link--oca").click(function(event) {
            $(".collapse__container--oca").slideToggle("slow");
            if ($(".icon--collapse--oca").hasClass("icon--collapse--min")){
                $(".icon--collapse--oca").removeClass("icon--collapse--min");
                $(".icon--collapse--oca").addClass("icon--collapse--max");
            }
            else{
                $(".icon--collapse--oca").removeClass("icon--collapse--max");
                $(".icon--collapse--oca").addClass("icon--collapse--min");
            }
        });
        /////// when click, collapse price
        $(".collapse__link--price").click(function(event) {
            $(".collapse__container--price").slideToggle("slow");
            if ($(".icon--collapse--price").hasClass("icon--collapse--min")){
                $(".icon--collapse--price").removeClass("icon--collapse--min");
                $(".icon--collapse--price").addClass("icon--collapse--max");
            }
            else{
                $(".icon--collapse--price").removeClass("icon--collapse--max");
                $(".icon--collapse--price").addClass("icon--collapse--min");
            }
        });
        
        /////// when click, collapse footer                
        $(".collapse__link--footer").click(function(event) {  
            $(".collapse__container--footer").slideToggle("slow");                                
                if ($(".icon--collapse--footer").hasClass("icon--collapse--min")){
                    $(".icon--collapse--footer").removeClass("icon--collapse--min");
                    $(".icon--collapse--footer").addClass("icon--collapse--max");
                    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
                    return false; 
                }
                else{
                    $(".icon--collapse--footer").removeClass("icon--collapse--max");
                    $(".icon--collapse--footer").addClass("icon--collapse--min");
                }
        });
    } else {
        // 

    }         

    /////// responsive img
    molt($('.molt')).start();

    function invoicehash(){
        /////// when click, show invoice with hash
        $(".table__orderhistory--list td a").click(function(event) {
            event.preventDefault();
            var id = $(this).attr("id");
            var hash = id.substr(id.indexOf("#"));

            if(window.location.hash) {
                // Fragment exists
                // history.pushState("", document.title, window.location.pathname + window.location.search);
                // window.location.hash='account_orderhistory';
                // give hash without jumping
                if(history.pushState) {
                    history.pushState(null, null, '#account_orderhistory');
                }
                else {
                    location.hash = '#account_orderhistory';
                }
                location.replace(document.URL+hash);                    
                $(".invoice__data__wrapper").not(hash).css({"display":"none"});
                $(hash).fadeIn('slow');                   
            } 
            else {
                // Fragment doesn't exist
                location.replace(document.URL+hash);                    
                $(".invoice__data__wrapper").not(hash).css({"display":"none"});
                $(hash).fadeIn('slow');
            }
        });
    }
    invoicehash();

    /////// tab account with hash
    $(".account__right--ul li:first").addClass("account__right--active");
    $(".account__right--ul li a").click(function(event) {
        event.preventDefault();
        $(this).closest('li').addClass("account__right--active").siblings().removeClass("account__right--active");
        var tab = $(this).attr("id");
        $(".tab--account").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
    $(".account__right--ul li:first a").click(function(event) {
        event.preventDefault();
        // history.pushState("", document.title, window.location.pathname + window.location.search);
        // window.location.hash='account_profile';
        // give hash without jumping
        if(history.pushState) {
            history.pushState(null, null, '#account_profile');
        }
        else {
            location.hash = '#account_profile';
        }
    });
    $(".account__right--ul li:nth-child(2) a").click(function(event) {
        event.preventDefault();
        // history.pushState("", document.title, window.location.pathname + window.location.search);
        // window.location.hash='account_orderhistory';
        if(history.pushState) {
            history.pushState(null, null, '#account_orderhistory');
        }
        else {
            location.hash = '#account_orderhistory';
        }
        $(".account__right--ul li:nth-child(2)").addClass("account__right--active").siblings().removeClass("account__right--active");            
        $(".tab--account").not("#account_orderhistory").css("display", "none");

        $(".invoice__data__wrapper").css({"display":"none"});
        // $(hashpart).fadeIn('slow');
    });
    $(".account__right--ul li:nth-child(3) a").click(function(event) {
        event.preventDefault();
        // history.pushState("", document.title, window.location.pathname + window.location.search);
        // window.location.hash='account_paymentconfirmation';
        if(history.pushState) {
            history.pushState(null, null, '#account_paymentconfirmation');
        }
        else {
            location.hash = '#account_paymentconfirmation';
        }
    });

    // when hash is
    if(window.location.hash) {        
        // call function
        // hash
        var thehash = window.location.hash;
        var hashpart = thehash.substring(21, thehash.length);

        if (thehash == "#account_orderhistory"){
            // history.pushState("", document.title, window.location.pathname + window.location.search);
            // window.location.hash='account_orderhistory';
            if(history.pushState) {
                history.pushState(null, null, '#account_orderhistory');
            }
            else {
                location.hash = '#account_orderhistory';
            }
            $("#account_profile").css("display", "none");
            $(".account__right--ul li:nth-child(2)").addClass("account__right--active").siblings().removeClass("account__right--active");            
            $(".tab--account").not(thehash).css("display", "none");
            $(thehash).fadeIn();                     
            // invoince tab with hash
            invoicehash();               
        }
        else if (thehash == "#account_paymentconfirmation"){
            $("#account_profile").css("display", "none");
            $(".account__right--ul li:nth-child(3)").addClass("account__right--active").siblings().removeClass("account__right--active");            
            $(".tab--account").not(thehash).css("display", "none");
            $(thehash).fadeIn();   
        }
        else if (thehash == ("#account_orderhistory"+hashpart)){
            $("#account_profile").css("display", "none");
            $(".account__right--ul li:nth-child(2)").addClass("account__right--active").siblings().removeClass("account__right--active");            
            $(".tab--account").not("#account_orderhistory").css("display", "none");
            $("#account_orderhistory").fadeIn();

            $(".invoice__data__wrapper").not(hashpart).css({"display":"none"});
            $(hashpart).fadeIn('slow');

            // alert(hashpart);    
        }
        else{
            $(".tab--account").css("display", "none");
            $(".account__right--ul li:first").addClass("account__right--active").siblings().removeClass("account__right--active");            
            $(".tab--account").not(thehash).css("display", "none");
            $(thehash).fadeIn();
        }      
    }
    

    function change_web(selected)
    {
       
        var select = $("#province");
        var sel    = $("#city");
        select.attr("disabled","disabled");
        sel.attr("disabled","disabled");

        var webid   = select.val();
        var url     = select.data("url");

            if(data_dropdown[webid] != undefined || data_dropdown[webid] != null)

            {
                sel.empty().append(data_dropdown[webid]);
                select.removeAttr("disabled");
                sel.removeAttr("disabled");
                if(selected !=null) sel.val(selected);
            }
            else 
            {
                $.get(url + "/" + webid,function(ret){

                    var data = ret;
                    if(data.result.status == true)
                    {
                        var html = repopulate_data_dropdown(data.result.data);
                        data_dropdown[webid] = html;
                        sel.empty().append(data_dropdown[webid]);
                        select.removeAttr("disabled");
                        sel.removeAttr("disabled");
                        if(selected != null) sel.val(selected);
                    }else {
                        generate_alert(data.result.status,data.result.msg);
                    }
                });
            }
     }


    function generate_alert(status, msg)
    {
        var html = "";
        html += "<div class='pure-form__line'>"
            html += "<label></label>";
            if(status != true)
            {
                html += "<div class='notification fail canhide career-notif'>" + msg + "</div>";
            } else {
                html += "<div class='notification success canhide career-notif'>" + msg + "</div>";
            }
        html += "</div>";
        return html;
    }

    /* remove cart */
    $(".mp-del-cart").click(function(){

        var btn = $(this);
        var id = btn.data("id");
        var _data = "id=" + id;
        var url = btn.data("url");
        //var price = ("#totalcart");
        if(confirm("Are you sure to remove this cart?"))
        {
           var tr = btn.parents('tr');
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: _data,
                success: function(ret)
                {
                    if(ret.result.status)
                    {
                        tr.fadeOut("slow", function(){
                            tr.remove();
                        });
                        $('#totalcart').html(ret.result.totalcart);
                        location.reload();
                         console.log(ret.result.totalcart);
                         price.html(ret.result.totalcart);


                    } else {
                        alert(ret.result.msg);
                        location.reload();
                    }
                }
            });
        }
     });


    /*subscribe newsletter */
    $("#subscribe").click(function() {
      
         $(".info__alert").remove();
       
       
        var email   = $(".input--subscribe").val();
        var url     = window.location.origin;
        var domain  = url+"/subscribe";
        var html = "";
       
        $.ajax({
            type: "POST",
            url: domain,
            dataType: "json",
            data: {email: email},
            success: function(ret) {

                    

                    if(ret.result.status == true)
                    {
                        html += " <span class='info__alert alert--success'><span class='icon--alert--success'></span>" + ret.result.message + "</span>";
                    } else {
                        html += " <span class='info__alert alert--failed'><span class='icon--alert--failed'></span>" +ret.result.message + "</span>";

                    }

                    $(html).insertAfter( ".form__content--subscribe" );
                    $(".input--subscribe").val("");
                    $(".info__alert").show().delay(2000).fadeOut();

               
            }
        });
        return false;
    });




    /* Filter by DropdownList */
      $('#dropdownsearch').change(function(){
             $('.product--ul').empty();
             $('.product__pagination').empty();
             var sel   = $("#dropdownsearch");
             var value  = sel.val();

             searchProduct(value);
      });

      function searchProduct(value)
      {
        var url     = window.location.origin;
        var domain  = base_url+"/ajax_dropdown_search";
            $.ajax({
            type: "POST",
            url:  domain,
            dataType: 'json',
            cache: false,
            data:  {filterOpts: value},
            beforeSend: function () {
                    
                      $('.product--ul').append(loadergif());
                },
            success: function(results){
                $('.loader--show').remove();
                $('.product--ul').append(makeTable(results));

                $('#current_page').val(0);
                $('#show_per_page').val(show_per_page);
                
                number_of_pages = Math.ceil(number_of_items / show_per_page);
                
                createPagination(1);
                }
        });
      }



    /* Filter Checkbox */

    
// http://hibbard.eu/use-ajax-to-filter-mysql-results-set/
// http://community.sitepoint.com/t/use-ajax-to-filter-mysql-results-with-multiple-checkbox-option/38018/83
// http://www.iprogrammerindia.in/filter-products-using-php-mysql-and-jquery/
// http://community.sitepoint.com/t/use-ajax-to-filter-mysql-results-with-multiple-checkbox-option/38018


    function filter(){
        var a =[];
        $('input[name="categorycheck"]:checked').each(function(){
            a.push($(this).val());
        });

        var b ="&categorycheck=" + a,
            c = [];
        $('input[name="colourcheck"]:checked').each(function(){
            c.push($(this).val());
        });  

        var f="&colourcheck=" + c,
            d=[];
        $('input[name="occasioncheck"]:checked').each(function(){
            d.push($(this).val());
        });

        var g ="&occasioncheck=" + d,
            e =[];
        $('input[name="radio__price"]:checked').each(function(){
            e.push($(this).val());
        });    


        b = b + f + g +("&radio__price=" + e);
        b = b.substring(1,b.length);

        return b;
    }


    function makeTable(data){
        var url =window.location.origin;
        var li = "";
        $.each(data,function(){
            var name = this.name;
            var price = accounting.formatNumber(this.price, {     
                                                              symbol   : "Rp",  
                                                              thousand : ".",  
                                                              decimal  : ",",  
                                                            });

            //li += "<p>";
            li += "<li class='product--li'>";

            li += "<a href='"+base_url+"/product/"+this.id+"-"+name.replace(/\s+/g, '_')+"'class='product--a'>";
            
            li += "<img src='"+base_url+"/assets/img/Products/product/"+this.image+"' class='product--img' alt>";
            li += "<h3 class='product--title'>"+this.name+"</h3>";
            li += "<h3 class='product--price'>Rp. "+price+",-</h3>";

            li += "</a>";
            li +="</li>";
           // li += "</p>";
            
        })
        return li;
    }
    
//loader gif for search
    function loadergif(){

        var loader ="";

        loader += "<div class='loader--show'>";
        loader += " <div class='loader--gif'>";
        loader += "</div>";
        loader += "</div>";

        return loader;
        // $( "#filter" ).append( $( "div.loader--gif" ) );
        // $("#filter").append( $newdiv1 ).fadeIn(1000);        
        // if($('.loader').hasClass("loader--show")){
        //     $('.loader').removeClass('loader--show');
        // }
        // else{
        //     $('.loader').addClass('loader--show');
        // }
    }

    /* end loader gif */

    /*payment confirmation */

     
    $("#paymentconfirmation").click(function() {
        
        $(".form__content--info").hide();
        var invoiceid       = $("input[name='invoiceid']").val();
        var banktransfer    =  $("#banktransfer").val();
        var email           =  $("input[name='email']").val();
        var totalpayment    =  $("input[name='totalpayment']").val();
        var note            =  $("#note").val();
        var date            =  $("input[name='date']").val();


        var url     = window.location.origin;
        var domain  = url+"/paymentconfirmation";
        var html = "";
       
        $.ajax({
            type: "POST",
            url: domain,
            dataType: "json",
            data: {invoiceid:invoiceid,banktransfer:banktransfer,
                   email: email,totalpayment:totalpayment,note:note,date:date},
            success: function(ret) {

                    

                    if(ret.result.status == true)
                    {

                        html += " <span class='form__content--info info--success'>" + ret.result.message + "</span>";
                        $("input[name='invoiceid']").val("");
                        $("#banktransfer").val("");
                        $("input[name='email']").val("");
                        $("input[name='totalpayment']").val("");
                        $("#note").val("");
                        $("input[name='date']").val("");
                    } else {
                        html += " <span class='form__content--info info--failed'>*" +ret.result.message + "</span></br> ";
                    }

                    $(html).insertAfter( ".button--account");
                  
               
            }
        });
        return false;
    });
    /* End Payment Confirmation */

     $("#datepicker").datepicker({
         format: 'yyyy-mm-dd'
     });

});//end


function createPagination(page){
    console.log(page);
   //product ul more than 48
    var navigation_html ='<ul class="product__pagination--ul">';
        navigation_html += '<li class="product__pagination--li"><a href="javascript:previous();" class="prev product__pagination--a"><span class="icon--pagination icon--pagination--left">  </span></a></li>';
    
    for (var i=page; i < (page + 4); i++ ) {
        navigation_html += '<li class="product__pagination--li"><a href="javascript:go_to_page(' + i +')" longdesc="' + i + '" class="page product__pagination--a">' + i + '</a></li>';
    }
    navigation_html += '<li class="product__pagination--li"><a href="javascript:next();" class="next product__pagination--a"><span class="icon--pagination icon--pagination--right">  </span></a></li>';
    navigation_html +='</ul>';
    //end ul more than 48

    var show_per_page = 12; 

    var number_of_items = $('#filter').children('li').size();

    var number_of_pages = Math.ceil(number_of_items/show_per_page);
    
    console.log(number_of_items);
    //var minPg ='test';
   
    var current_link = 1;
    var minPg ='<ul class="product__pagination--ul">';
    while(number_of_pages >= current_link){
        minPg       += '<li class="product__pagination--li"><a class="page product__pagination--a" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 0) +'</a></li>';
        current_link++;
    }
    minPg +='</ul>';

    if(number_of_items <= 48)
    {
        $('#pagingDiv').html(minPg);
    }else{
        $('#pagingDiv').html(navigation_html);
    }
    $('#pagingDiv .page:first').addClass('product__pagination--active');

    $('#filter').children().css('display', 'none');
    $('#filter').children().slice(0, show_per_page).css('display', 'block');
}


function go_to_page(page_num) {

    var show_per_page = parseInt($('#show_per_page').val());

    start_from = (page_num -1) * show_per_page;

    end_on = start_from + show_per_page;

    $('#filter').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

    //$('.page[longdesc=' + page_num + ']').addClass('active').siblings('.active').removeClass('active');
    $(".product__pagination--active").removeClass('product__pagination--active');

    $('.page[longdesc=' + page_num + ']').addClass('product__pagination--active');

    $('#current_page').val(page_num);
}



function previous() {
    var show_per_page = 12;
    var number_of_items = $('#filter').children('li').size();
    console.log(number_of_items);
   var number_of_pages = Math.ceil(number_of_items / show_per_page);

   var currentPage = parseInt($('#pagingDiv').find('a:eq(1)').text());
    
    var prev = currentPage - 1;
    if(prev < 1){
        prev = 1;
    }
    
    createPagination(prev);
    go_to_page(prev);

}



function next() {
   var show_per_page = 12;
    var number_of_items = $('#filter').children('li').size();
    console.log(number_of_items);
   var number_of_pages = Math.ceil(number_of_items / show_per_page);

    var currentPage = parseInt($('#pagingDiv').find('a:eq(1)').text());
    // console.log(currentPage);
    var next = currentPage + 1;
     console.log(next);
     console.log(number_of_pages);
    if(next > (number_of_pages - 4)){
        next = number_of_pages - 3;
        console.log(next);
    }
    
    createPagination(next);
    go_to_page(next);
    
}//end
