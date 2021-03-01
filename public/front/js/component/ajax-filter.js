$(document).ready(function(){

FilterJS(services, "#service_list", {
    template: '#templateaa',
    search: { ele: '#search_box' },
    callbacks: {
      afterFilter: function(result){
        $('#total_products').text(result.length);
      }
    }
  });

});
