(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */




})( jQuery );



function option_views(range,start,end){
    
 
jQuery('select.chartlayout').change(function() {
 
        //Use $option (with the "$") to see that the variable is a jQuery object
            var $option = jQuery(this).find('option:selected');
            //Added with the EDIT
            var value = $option.val();//to get content of "value" attrib
            var prevdate = jQuery('input#compare-range-picker').val();
        
             jQuery.ajax({
                 type : "GET",
                 url : ajaxurl,
                 data : {action: "change_chart",metrics:value,range:false,start:start,end:end,prevdate:prevdate},
                 success: function(response) {
                   jQuery('.my-chart').html(response);
                     //console.log(response);
                    console.log(prevdate+'kjikkjkjk');
                    //chart();
                }
            }); 
            
            
        });   
 
    
    
    
}

/*function click_option() {
    jQuery('.pillbox-toggle .pillbox').click(function () {
        jQuery('.pillbox-toggle .pillbox').removeClass('active');
        jQuery(this).addClass('active');
        var val = jQuery(this).val();
         
  
        /*jQuery.ajax({
    		 type : "GET",
    		 url : ajaxurl,
    		 data : {action: "chart_layout",layout:val},
    		 success: function(response) {
    		     jQuery('.my-chart').html(response);
    		   //  alert(response);
    		    //chart();
    		}
    	});    
    });
}



function chart(range,start,end){  
    jQuery.ajax({
		 type : "GET",
		 url : ajaxurl,
		 data : {action: "my_google_analytic_chart",range:range,stardate:start,endDate:end},
		 success: function(response) {
		    jQuery('.my-chart').html(response);
		    //chart();
		}
	});
	click_option();
	
	

}
*/

jQuery(document).ready(function ($){
    jQuery( "#accordion" ).accordion({heightStyle: 'content', collapsible: false});

    //On click any <h3> within the container
    jQuery('#container-inner-acc h3').click(function(e) {
    
        //Close all <div> but the <div> right after the clicked <a>
        jQuery(e.target).next('div').siblings('div').slideUp('fast');
    
        //Toggle open/close on the <div> after the <h3>, opening it if not open.
        jQuery(e.target).next('div').slideToggle('fast');
    });
var date_ = new Date();    
var date_present = new Date();
date_present.setDate(date_present.getDate() + 7); 


//chart('false',date_,date_present);

    jQuery('.daterange').daterangepicker({
        "linkedCalendars": false,
        "autoUpdateInput": false,
        "showCustomRangeLabel": false,
        "startDate": date_,
        "endDate": date_present,
      
    //sets the maximum number of days
    
    }, function(start, end, label) {
     
        jQuery('input.daterange').val(start.format('MMM DD Y') + ' to ' + end.format('MMM DD Y'));
        jQuery('.analytics-content').css('opacity','.5');
       // chart(true,start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
    	var prevdate = jQuery('select#generaldate').val();
    
        jQuery.ajax({
    		 type : "GET",
    		 url : ajaxurl,
    		 data : {

                action: "my_google_analytic",
                range:'true',
                stardate:start.format('YYYY-MM-DD'),
                endDate:end.format('YYYY-MM-DD'),
                prevdate:prevdate

             },
             beforeSend: function(response){
                 jQuery('div#loading').show();
             },
    		 success: function(response) {
    		   // console.log(response);
    		   jQuery('div#loading').hide();
    		    jQuery('.analytics-content').css('opacity','1');
    		    jQuery('.analytics-content').html(response);
    		  //  click_option();
    		    option_views(true,start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
              
    		    
    		}
    	});
    	
    	
     
    });

jQuery('select#Previousp').change(function () {
       var $option = jQuery(this).find('option:selected');
       var value = $option.val();
       var range = jQuery('input.daterange').val();
       var range_date = range.split('to');    
        jQuery('.analytics-content').css('opacity','0.5');    
        switch (value) {
          case 'month':
                var d = new Date(range_date[0]);
                d.setMonth(d.getMonth() - 2);
                var prev_start = d.toLocaleDateString();
                d.setMonth(d.getMonth() + 1);
                var prev_end = d.toLocaleDateString();
                jQuery('input#compare-range-picker').val(prev_start+' to '+prev_end);
                var prevdate = prev_start+' to '+prev_end;
 
            break;
          case 'year':
                 var d = new Date(range_date[0]);
                d.setMonth(d.getMonth() - 12);
                var prev_start = d.toLocaleDateString();
                d.setMonth(d.getMonth() + 12);
                var prev_end = d.toLocaleDateString();
                jQuery('input#compare-range-picker').val(prev_start+' to '+prev_end);
                var prevdate = prev_start+' to '+prev_end;
            break;
          case 'custom':
                 console.log(value);
            break;

        }
            jQuery.ajax({
             type : "GET",
             url : ajaxurl,
             data : {

                action: "my_google_analytic",
                compare:'true',
                stardate:range_date[0],
                endDate:range_date[1],
                prevdate:prevdate

             },
             success: function(response) {
               // console.log(response);
                jQuery('.analytics-content').css('opacity','1');
                jQuery('.analytics-content').html(response);
              //  click_option();
     
               
                
            }
        });
        
 
});


 

jQuery('li.ndl-SecondaryTab-item .ndl-Option').click(function (){
    jQuery('li.ndl-SecondaryTab-item .ndl-Option').removeClass('is-active');
    jQuery(this).addClass('is-active');

    var tab = jQuery(this).parent('li').attr('data');
    var current_date = jQuery('input.daterange').val();
    var prev_date = jQuery('select#generaldate').val();
    
         jQuery.ajax({
                 type : "GET",
                 url : ajaxurl,
                 data : {action: "tab_layout_data",tab:tab,current_date:current_date,prev_date:prev_date},
                 beforeSend: function(response){
                     jQuery('div#loading').show();
                 },
                 success: function(response) {
                    jQuery('div#loading').hide();
                    jQuery('.analytics-content').html(response);
                     
                    //chart();
                }
            }); 
            
 

});


});


    

 