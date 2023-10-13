$('.sweet-conf').click(function(event){
    var linkURL = $(this).attr("href");
    var texte = $(this).attr("data");
    event.preventDefault();

        swal({
            title: "Attention !",
            text: texte,
            icon: "warning",
            buttons: {
                cancel: "Annuler",
                confirm:"confirmer"
            },
            // buttons: true,
            dangerMode: true,
        }).then( (willDelete) =>{
            if (willDelete) {
                window.location = linkURL;
            }
        });

  });

var SweetAlert_custom = {
    init: function() {

        var elem = document.querySelector('.sweet-gen');
        var canLink = elem ? elem : "";
        canLink.onclick = function(){
            var linkURL = $(this).attr("href");
            var texte = $(this).attr("data");

               swal({
                   title: "Attention !",
                   text: texte,
                   icon: "warning",
                   buttons: {
                       cancel: "Annuler",
                       confirm:"confirmer"
                   },
                   // buttons: true,
                   dangerMode: true,
               }).then( (willDelete) =>{
                   if (willDelete) {
                       window.location = linkURL;
                   }
               });
         };
    }
};
(function($) {
    SweetAlert_custom.init()
})(jQuery);
