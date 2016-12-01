$(document).ready(function() {


	function getMakeAndModel() {
	var loc = window.location; //get url
	var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
	var folders = pathName.split("/"); // url to array
	var carMake = folders[1]; //get make 
	carMake = carMake.substr(0,1).toUpperCase()+carMake.substr(1);
	if (carMake === "rolls-royce") { 
	carMake = "Rolls-Royce"}
	
	else if (carMake === "aston-martin") { 
	carMake = "Aston Martin"}
	
		
	if (carMake === "Aston Martin") {
	  setTimeout(function(){
	   $( "input[value='" + carMake + "'" ).trigger( "click" ); // select the Make that matches
	   setTimeout(function(){
						   $( "input[value='" + carMake + "'" ).trigger( "click" );
		}, 500); // select the Make that matches
	 
	  }, 500);
	 }	else if (carMake != "Aston Martin") {
	  setTimeout(function(){
	   $( "input[value='" + carMake + "'" ).trigger( "click" ); // select the Make that matches
	  
	 
	  }, 500);
	 }
	 
	 

	 	
	}
	getMakeAndModel() ;
	 

	
	updateGarageButtonsOnList();
	
	/* Shortlist 'bounce' effect and counter increment
	?????????????????????????????????????????????????? */	

	$( "body" ).on( "click", ".shortlist-add", function() {
														
		$(this).addClass('clicked');
		
		var buttonTopOffset =  $(this).offset().top - $(window).scrollTop() + 12;
		var buttonLeftOffset = $(this).offset().left + 35;	
		
		var shortlistTopOffset =  $('#shortlist-sticky .shortlist-icon').offset().top - $(window).scrollTop();
		var shortlistRightOffset = $('#shortlist-sticky .shortlist-icon').offset().left + $('#shortlist-sticky .shortlist-icon').width();
		
		$('#shortlist-sticky .shortlist-icon').after( '<span id="shortlist-vehicle-animation"><i class="fa fa-heart"></i></span>' );
		$('#shortlist-vehicle-animation')
			.css({left: buttonLeftOffset + "px", top: buttonTopOffset + "px"})
			.animate({left: shortlistRightOffset + "px", top: shortlistTopOffset + "px"}, 1000, 'easeInCubic',function () {
				$(this).remove();
				$('#shortlist-sticky').effect("bounce", {times:3, direction:'left', distance: 10}, 400);	
				$('.shortlist-count').text(parseInt($('.shortlist-count').text(), 10)+1);
				showHideShortlistCount()
			});
		
	});
	$( "body" ).on("click", ".shortlist-remove", function(){
		$('.shortlist-count').text(parseInt($('.shortlist-count').text(), 10)-1);
		showHideShortlistCount();
	});
	
	/* MULTI SEARCH */
	
	//duplicate and convert multiselect to list
	$('#make-search').append('<ul class="multi-choice"></ul>');
	$('#make-container .multi-select option').each(function() {
		$(this).parentsUntil('#make-container').children('ul.multi-choice').append('<li><input type="checkbox" value="' + $(this).val() + '"> ' + $(this).text() + '</li>');
	});
	$('#model-search').append('<ul class="multi-choice"></ul>');
	$('#model-container .multi-select option').each(function() {
		$(this).parentsUntil('#model-container').children('ul.multi-choice').append('<li><input type="checkbox" value="' + $(this).val() + '"> ' + $(this).text() + '</li>');
	});
	
	//Wrap list with parent div
	$('.multi-choice').wrap('<div class="trigger"></div>');
	$('#make-search .trigger').prepend('<span>Select Makes</span>');
	$('#model-search .trigger').prepend('<span>Select Models</span>');
	$('.trigger').prepend('<div class="select-button">OK</div>');
	$('.trigger span').click(function() {
		$(this).siblings('ul.multi-choice').toggle();
		$(this).siblings('.select-button').toggle();
	});
	
	$('.trigger .select-button').click(function() {
		$(this).siblings('ul.multi-choice').toggle();
		$(this).hide();
	});	
	
	$(document).mouseup(function(e){
  	  	var container = $("#make-container .trigger");
		if (!container.is(e.target) // if the target of the click isn't the container...
      	  && container.has(e.target).length === 0) // ... nor a descendant of the container
  	 	{
        	container.children('.multi-choice').hide();
			container.children('.select-button').hide();
    	}
	});
	$(document).mouseup(function(e){
  	  	var container = $("#model-container .trigger");
		if (!container.is(e.target) // if the target of the click isn't the container...
      	  && container.has(e.target).length === 0) // ... nor a descendant of the container
  	 	{
        	container.children('.multi-choice').hide();
			container.children('.select-button').hide();
    	}
	});
	
	//Make full list item clickable
	$('.multi-choice li').each(function(){
		$(this).click(function() {
               var cb = $(this).find("input[type=checkbox]");

                    if (cb.attr("checked")) {
						$(cb).removeAttr("checked").change();
                       
                    } else {
						$(cb).prop("checked", true);
                         $(cb).attr("checked", true).change();
                    }
                }
         );
	});
		 $('.multi-choice li input').click(
    function(event){
        event.stopPropagation();
    });	
	
	//Bind checkbox to select option
	$('#make-search .multi-choice li').each(function(){
		$(this).children('input[type=checkbox]').change(function(){
			
			var same = $(this).val();
			var selectOption = $(this).parentsUntil('#make-container').find('.multi-select option[value="'+same+'"]');
			if ($(this).val() == selectOption.val()) {		
				if (selectOption.attr('selected')) {
					selectOption.removeAttr('selected').change();
					var makeTotal = $('#make-container').find('option:selected').length;
					if(makeTotal > 0){
						$('#make-container .trigger span').text(makeTotal+' makes selected');
					} else if (makeTotal == 0) {
						$('#make-container .trigger span').text('Select Makes');
					}
				} else {
					selectOption.attr("selected", true).change();
					var makeTotal = $('#make-container').find('option:selected').length;
					if(makeTotal > 0){
						$('#make-container .trigger span').text(makeTotal+' makes selected');
					} else if (makeTotal == 0) {
						$('#make-container .trigger span').text('Select Makes');
					}
				}
			}
		});
	});
	$('#model-search .multi-choice li').each(function(){
		$(this).children('input[type=checkbox]').change(function(){
			var same = $(this).val();
			var modelOption = $(this).parentsUntil('#model-container').find('.multi-select option[value="'+same+'"]');
			if ($(this).val() == modelOption.val()) {		
				if (modelOption.attr('selected')) {
					modelOption.removeAttr('selected').change();
					var modelTotal = $('#model-container').find('option:selected').length;
					if(modelTotal > 0){
						$('#model-container .trigger span').text(modelTotal+' models selected');
					} else if (modelTotal == 0) {
						$('#model-container .trigger span').text('Select Models');
					}
				} else {
					modelOption.attr("selected", true).change();
					var modelTotal = $('#model-container').find('option:selected').length;
					if(modelTotal > 0){
						$('#model-container .trigger span').text(modelTotal+' models selected');
					} else if (modelTotal == 0) {
						$('#model-container .trigger span').text('Select Models');
					}
				}
			}
		});
	});
	
	// Check selections on results page
	if (window.location.href.indexOf("/approved-used") > -1) {
		$('.multi-choice li').each(function(){
			var value = $(this).children('input[type=checkbox]').val().split(' ').join('+');
			if (window.location.href.indexOf(value) > -1) {
				$(this).children('input[type=checkbox]').attr('checked', true);
			}
		});
		var makeTotal = $('#make-container').find('option:selected').length;
		if(makeTotal > 0){
			$('#make-container .trigger span').text(makeTotal+' makes selected');
		} else if (makeTotal == 0) {
			$('#make-container .trigger span').text('Select Makes');
		}
		var modelTotal = $('#model-container').find('option:selected').length;
		if(modelTotal > 0){
			$('#model-container .trigger span').text(modelTotal+' models selected');
		} else if (modelTotal == 0) {
			$('#model-container .trigger span').text('Select Models');
		}
	}
	
});

function GetCounts() {
	$('#model-search .trigger').remove();
	$('#model-search').append('<ul class="multi-choice"></ul>');
	$('#model-container .multi-select option').each(function() {
		$(this).parentsUntil('#model-container').children('ul.multi-choice').append('<li><input type="checkbox" value="' + $(this).val() + '"> ' + $(this).text() + '</li>');
	});
	$('#model-search .multi-choice').wrap('<div class="trigger"></div>');
	$('#model-search .trigger').prepend('<span>Select Models</span>');
	$('.trigger').prepend('<div class="select-button">OK</div>');
	$('#model-search .trigger span').click(function() {
		$(this).siblings('ul.multi-choice').toggle();
		$(this).siblings('.select-button').toggle();
	});
	$('#model-search .trigger .select-button').click(function() {
		$(this).siblings('ul.multi-choice').toggle();
		$(this).hide();
	});
	$('#model-search .multi-choice li').each(function(){
		$(this).children('input[type=checkbox]').change(function(){
			var same = $(this).val();
			var modelOption = $(this).parentsUntil('#model-container').find('.multi-select option[value="'+same+'"]');
			if ($(this).val() == modelOption.val()) {		
				if (modelOption.attr('selected')) {
					modelOption.removeAttr('selected').change();
					var modelTotal = $('#model-container').find('option:selected').length;
					if(modelTotal > 0){
						$('#model-container .trigger span').text(modelTotal+' models selected');
					} else if (modelTotal == 0) {
						$('#model-container .trigger span').text('Select Model');
					}
				} else {
					modelOption.attr("selected", true).change();
					var modelTotal = $('#model-container').find('option:selected').length;
					if(modelTotal > 0){
						$('#model-container .trigger span').text(modelTotal+' models selected');
					} else if (modelTotal == 0) {
						$('#model-container .trigger span').text('Select Models');
					}
				}
			}
		});
	});
	$('#model-search .multi-choice li').each(function(){
		$(this).click(function() {
		   var cb = $(this).find("input[type=checkbox]");
				if (cb.attr("checked")) {
					$(cb).removeAttr("checked").change();                       
				} else {
					$(cb).prop("checked", true);
					$(cb).attr("checked", true).change();
				}
			});
	});
	 $('.multi-choice li input').click(function(event){
		 event.stopPropagation();
	 });
}


/* This function loops through each vehicle in the main used car repeater and checks whether 
it is present in the used car shortlist repeater and shows/hides the garage buttons accordingly.
–––––––––––––––––––––––––––––––––––––––––––––––––– */
function updateGarageButtonsOnList() {

  $(".used-list-vehicle").each(function () {
      var url = $(this).find("a:first").attr("href");
      var currentCar = this;
      var found = false;

      //Check if the url is also within the shortlist repeater
      $(".shortlist-vehicle a").each(function () {
          if (url == $(this).attr("href")) {
              found = true;
			  
          }
      });

      if (found) {
          $(currentCar).find(".shortlist-add").hide();
          $(currentCar).find(".shortlist-remove").show();
      }
      else {
          $(currentCar).find(".shortlist-add").show();
          $(currentCar).find(".shortlist-remove").hide();
      }
  });
}

Sys.WebForms.PageRequestManager.getInstance().add_endRequest(updateGarageButtonsOnList);