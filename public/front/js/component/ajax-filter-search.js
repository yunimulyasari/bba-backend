$(document).ready(function(){

  /////// filter search
  // FilterJS(services, "#service_list", {
  //   template: '#modal__product--li',
  //   criterias:[
  //     {field: 'status--cat', ele: '#status--cat :checkbox'}
  //   ],
  //   search: { ele: '#search_box' }
  // });
  
  FilterJS(services, "#filter_search", {
    template: '#modal__product--li',
    // criterias:[
    //   {field: 'status', ele: '#status :checkbox'}
    // ],
    search: { ele: '#search__box' }
  });


  /////// filter select
    // $('#price_filter').val('0-500');
    //   $("#price_slider").slider({
    //     range:true,
    //     min: 0,
    //     max: 500,
    //     values:[0, 500],
    //     step: 5,
    //     slide: function(event, ui) {
    //       $("#price_range_label").html('$' + ui.values[ 0 ] + ' - $' + ui.values[ 1 ] );
    //       $('#price_filter').val(ui.values[0] + '-' + ui.values[1]).trigger('change');
    //     }
    //   });

    // $('#status--cat :checkbox').prop('checked', true);

    // FilterJS(services_select, "#filter__select", {
    //     template: '#modal__product--li',
    //     criterias:[
    //       {field: 'status--cat', ele: '#status--cat :checkbox'}
    //     ]
    //     // search: { ele: '#search_box' }
    // });

});
