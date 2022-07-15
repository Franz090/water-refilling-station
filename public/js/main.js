let Request = {
   ajax: (controller,container = '',params = {},beforesend = false) => {
         return $.ajax({
            url: `${server}${controller}`,
            type: "POST",
            data: params,
            error: function (x, t, r) {
               console.log(x + " " + " " + t + " " + r);
            },
            beforeSend: function () {
               if(beforesend!=false){
                  loader = $(container);
                  loader.html('<div class="loader d-flex justify-content-center"><img src="'+server+'public/img/spinner.gif" alt="Spinner"></div>');
               }
            },
            success: function (data) {
               if(container != ''){
                  setTimeout(function(){ 
                     let div = $(container);
                     div.html(data);
                  }, 1000);
               }
            },
      });
   },
}

