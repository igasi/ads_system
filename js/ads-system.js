/**
 * Created by igasi on 4/5/16.
 */

/* Script Ads System.
 ========================================================================= */

/*==DRUPAL BEHAVIOR ==*/
(function ( $, Drupal, drupalSettings) {

    // Ad system logic.

    function gatherAdsBlocks(){

        var adTypes = [];
        var blocks = $(".block-entity-ads");

        $.each(blocks, function(index, value){
            adTypes.push($(value).attr("id"));
        });

        return adTypes;
    }



    // Ad system init behavior.
    Drupal.behaviors.adsSystem = {
        attach: function (context, settings) {
            //console.log("Added ads system js. Yay!!");
            var $context = $(context);

            var adTypes = gatherAdsBlocks();

            // Load ads per blockType.
            if (adTypes.length > 0) {
                $.ajax({
                    url: Drupal.url('ads/getall'),
                    type: 'POST',
                    data: {'adTypes[]': adTypes},
                    dataType: 'json',
                    success: function (results) {
                        var screenW = screen.width;

                        $.each(results, function(blockType, adIds){

                            $.each(adIds, function(adId, ad){

                                if (screenW >= ad.breakpoint_min.size && screenW <= ad.breakpoint_max.size){
                                    $("#" + blockType).text("").append( ad.render );
                                    $("#" + blockType + " .ad")
                                        .css("width", ad.size.w + "px" );
                                    //.css("height", ad.size.h + "px" );
                                }
                            });

                        });


                    }
                });
            }

        }
    };

})( jQuery, Drupal, drupalSettings);
/*== end behavior ==*/
