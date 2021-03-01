$(document).ready(function(){

  /////// filter select
  // $('#category :checkbox').prop('checked', false);
  // $('#color :checkbox').prop('checked', false);
  // $('#occasion :checkbox').prop('checked', false);
  // $('#price :checkbox').prop('checked', false);
  var filterfunc1 = (function() {
      FilterJS(services, "#filter", {
          template: '#modal__product--li',
          criterias:[{field: 'price', ele: '#price :checkbox'},
                    {field: 'category', ele: '#category :checkbox'},
                    {field: 'color', ele: '#color :checkbox'},
                    {field: 'occasion', ele: '#occasion :checkbox'}],
          search: { ele: '#search__box__select' }
      });
  });
  filterfunc1();

  /////// filter search
  $('#status2 :checkbox').prop('checked', true);
  var filterfunc2 = (function() {
      FilterJS(services, "#filter_search", {
          template: '#modal__product--li',
          criterias:[
            {field: 'status2', ele: '#status2 :checkbox'}
          ],
          search: { ele: '#search__box' }
      });
  });

  /////// popup search
  $(".menu__account--ul li .popup--search--a").click(function(event) {      
      filterfunc2();
  });


});
