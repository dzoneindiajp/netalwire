(function($){
	$.fn.book = function(options){
		
		var defaults = {
			onPageChange: function(){},
			speed: 400
		};
		
		var settings = $.extend(defaults, options);
		
		
		if (this.length > 1){
			this.each(function(){ $(this).book(options) });
			return this;
		}
		
		var pageIndex = 0;
		
		var $this = $(this);
		
		// The sections need to match the parent (<form>) container's size for animation to look correct
		var pages = $this.children('section').css({width:'100%',height:'100%',position:'relative'}); 
		
		
		
		// The form will expand to fit the container it's in (unless overridden).
		//this.css({width:'100%', display:'flex', margin:'auto', overflow:'hidden'});  
		
		
		
		// Hide all but the first page
		// Add events to next and previous buttons found in the form
		this.initialize = function(){
			
			pages.hide();
			pages.first('section').show();
			
			pages.find('.page-next').on('click', this.nextPage);
		
			pages.find('.page-prev').on('click', this.prevPage);
			
			return this;
		}
		
		
		// Get current page number
		this.getPageIndex = function(){
			return pageIndex;
		}
		
		
		// Returns number of pages in this book
		this.getPageCount = function(){
			return pages.length;
		}
		
	
		// Set to a specific page
		this.setPage = function(i){
			
			return changePage(i);
		}
		
		
		
		
		function changePage(index){
			
			if (index >= 0 && index < pages.length && index != pageIndex){
				

				// Only check validation if moving forward. Exit early if validation fails.
				if ((index > pageIndex) && (typeof $this.valid === 'function')){
					if (!$this.valid()){
						return this;
					}
				}
				
				oldPageIndex = pageIndex;            // retain for callback info
				$currentPage = pages.eq(pageIndex);  // Get currently display page to slide off screen
				$newPage     = pages.eq(index);      // Get target page to slide onto screen
				pageIndex    = index;                // update pageIndex
				pageName     = ($newPage[0].hasAttribute("name")) ? $newPage.attr('name') : null;  // used in callback
				
				console.log('thingy');
				if (typeof settings.onPageChange == 'function'){
					settings.onPageChange.call(this, oldPageIndex, pageIndex, pages.length, pageName );
				}
				
				
				
				if (index > oldPageIndex){ // move forward
						
					$currentPage.hide("slide", {direction:"left"}, settings.speed, function(){
						$newPage.show("slide", {direction:"right"}, settings.speed);
					});
				
				}else{ // move back  
				
					$currentPage.hide("slide", {direction:"right"}, settings.speed, function(){
						$newPage.show("slide", {direction:"left"}, settings.speed);
					});
					
				}
				
			}
			return this;
		};
		
		
		
		// Moves forward to the next page, if one is available
		this.nextPage = function(){
			if (pageIndex >= pages.length-1) return this;
			return changePage(pageIndex+1);
		};
		
		
		
		// Moves back to the previous page. If on first page already, does nothing
		this.prevPage = function(){
			if (pageIndex == 0) return this;
			return changePage(pageIndex-1);

		};

		
		return this.initialize();
	};
	
	
}(jQuery));

/////////////////////start code for contact us form 3//////////////////////////
         $(document).ready(function(){
         
         	$thing = $('#demo_contact3').book({
         		onPageChange:updateProgress,
         		speed:200}
         	).validate();
         
         
         	/* IE doesn't have a trunc function */
         	if (!Math.trunc) {
         		Math.trunc = function (v) {
         			return v < 0 ? Math.ceil(v) : Math.floor(v);
         		};
         	}
         
         
         	/* Update progress bar whenever the page changes */
         	function updateProgress(prevPageIndex, currentPageIndex, pageCount, pageName){
         		t = (currentPageIndex / (pageCount-1)) * 100;
         
         		$('.progress-bar').attr('aria-valuenow', t);
         		$('.progress-bar').css('width', t+'%');
         		//$('.progress span').text('Completed: '+Math.trunc(t)+'%');
         		$('.progress-value').text(Math.trunc(t)+'%');
         
         		console.log(pageName);
         
         	}
         
         	/* form's submit button */
         	$('#sendForm').on('click', function(e){
         		e.preventDefault();
         
         		if ($('#demo_contact3').valid()){
         			// do ajax thingy here
         			//alert('Your data was sent.');
         			
                     e.preventDefault();
                     jQuery('#contact_msg3').html();
                    jQuery.ajax({
                    url:'./save_contact3_process',
                    data:jQuery('#demo_contact3').serialize(),
                    type:'post',
                    success:function(result){
                        //console.log("====ddddd====="+result.mobile);
                        //console.log("========="+result[0].mobile);
                      if(result.status=="error"){
                            jQuery.each(result.error,function(key,val){
                            //jQuery('#'+key+'_error').html(val[0]);
                            //console.log(key+"====fdgdfgdfgfd====="+val[0]);
                            jQuery('#contact_msg3').html(val[0]);
                            });
                        
                      }
                      
                      if(result.status=="success"){
                          alert('data successfully submit.');
                          //jQuery('#demo_contact3')[0].reset();
                       window.location.href='./contact-us';
                      }
                    }
                    });
         		}
         	});
         
         
         
         }); 
         // end document ready