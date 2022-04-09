(function($) {
    $.fn.book = function(options) {
        var defaults = {
            onPageChange: function() {},
            speed: 400
        };
        var settings = $.extend(defaults, options);
        if (this.length > 1) {

            this.each(function() {

                $(this).book(options)

            });

            return this;

        }



        var pageIndex = 0;



        var $this = $(this);



        // The sections need to match the parent (<form>) container's size for animation to look correct

        var pages = $this.children('section').css({

            width: '100%',

            height: '100%',

            position: 'relative'

        });







        // The form will expand to fit the container it's in (unless overridden).

        //this.css({width:'100%', display:'flex', margin:'auto', overflow:'hidden'});  







        // Hide all but the first page

        // Add events to next and previous buttons found in the form

        this.initialize = function() {



            pages.hide();

            pages.first('section').show();



            pages.find('.page-next').on('click', this.nextPage);



            pages.find('.page-prev').on('click', this.prevPage);



            return this;

        }





        // Get current page number

        this.getPageIndex = function() {

            return pageIndex;

        }





        // Returns number of pages in this book

        this.getPageCount = function() {

            return pages.length;

        }





        // Set to a specific page

        this.setPage = function(i) {



            return changePage(i);

        }









        function changePage(index) {



            if (index >= 0 && index < pages.length && index != pageIndex) {





                // Only check validation if moving forward. Exit early if validation fails.

                if ((index > pageIndex) && (typeof $this.valid === 'function')) {

                    if (!$this.valid()) {

                        return this;

                    }

                }



                oldPageIndex = pageIndex; // retain for callback info

                $currentPage = pages.eq(pageIndex); // Get currently display page to slide off screen

                $newPage = pages.eq(index); // Get target page to slide onto screen

                pageIndex = index; // update pageIndex

                pageName = ($newPage[0].hasAttribute("name")) ? $newPage.attr('name') : null; // used in callback



                console.log('thingy');

                if (typeof settings.onPageChange == 'function') {

                    settings.onPageChange.call(this, oldPageIndex, pageIndex, pages.length, pageName);

                }







                if (index > oldPageIndex) { // move forward



                    $currentPage.hide("slide", {

                        direction: "left"

                    }, settings.speed, function() {

                        $newPage.show("slide", {

                            direction: "right"

                        }, settings.speed);

                    });



                } else { // move back  



                    $currentPage.hide("slide", {

                        direction: "right"

                    }, settings.speed, function() {

                        $newPage.show("slide", {

                            direction: "left"

                        }, settings.speed);

                    });



                }

            }
            return this;
        };
        // Moves forward to the next page, if one is available
        this.nextPage = function() {
            if (pageIndex >= pages.length - 1) return this;
            return changePage(pageIndex + 1);
        };
        // Moves back to the previous page. If on first page already, does nothing
        this.prevPage = function() {

            if (pageIndex == 0) return this;

            return changePage(pageIndex - 1);
        };
        return this.initialize();
    };
}(jQuery));

////////////////////start code for contact form 3///////////////////////////
$(document).ready(function() {
    $thing = $('#demo_contact3').book({
        onPageChange: updateProgress,
        speed: 200
    }).validate();
    /* IE doesn't have a trunc function */
    if (!Math.trunc) {
        Math.trunc = function(v) {
            return v < 0 ? Math.ceil(v) : Math.floor(v);
        };
    }
    /* Update progress bar whenever the page changes */
    function updateProgress(prevPageIndex, currentPageIndex, pageCount, pageName) {
        t = (currentPageIndex / (pageCount - 1)) * 100;
        $('.progress-bar').attr('aria-valuenow', t);
        $('.progress-bar').css('width', t + '%');
        //$('.progress span').text('Completed: '+Math.trunc(t)+'%');
        $('.progress-value').text(Math.trunc(t) + '%');
        //console.log("contact form 3 pageName="+pageName);
        if (currentPageIndex == 0) {
            $('.hideContactContant').show();
            $('.showContactContant').hide();
        }
        if (currentPageIndex == 1) {
            $('.hideContactContant').hide();
            $('.showContactContant').show();
            var poc=$('#contact_form2_h1').text();
            var reuest_product1 = $("input[name=purpose_of_contact]:checked").val();
            step_1 = '<div class="step_1"><strong>'+poc+'</strong><p>' + reuest_product1 + '<p></div>';
            $('.showContactFormData').append(step_1);
        }
        if (currentPageIndex == 2) {
            $('.hideContactContant').hide();
            $('.showContactContant').show();
            var areaofint = $("input[name=business_sales_area_interest]:checked").val();
            var baoi=$('#contact_form2_h2').text();
            var step_2 = '<div class="step_2"><strong>'+baoi+'</strong><p>' + areaofint + '</p></div>';
            $('.showContactFormData').append(step_2);

        }
        if (currentPageIndex == 3) {
            $('.hideContactContant').hide();
            $('.showContactContant').show();
            var contact_name = $("#contact_name").val();
            var contact_email = $("#contact_email").val();
            var contact_phone = $("#contact_mobile").val();
            var contact_country = $("#country2").val();
            var con=$('#contact_form2_h3').text();
            var step_3 = '<div class="step_3"><strong>'+con+'</strong><p>' + contact_name + '</p>' + '<p>' + contact_email + '</p>' + '<p>' + contact_phone + '</p>' + '<p>' + contact_country + '</p></div>';
            $('.showContactFormData').append(step_3);
        }
    }
    /* form's submit button */
    $('#sendForm').on('click', function(e) {
        e.preventDefault();
        $('#contactloader').addClass('loader');
        if ($('#demo_contact3').valid()) {
            // do ajax thingy here
            //alert('Your data was sent.');
            e.preventDefault();
            $('.hideContactContant').hide();
            $('.showContactContant').show();
            jQuery('#contact_msg3').html();
            $.ajax({
                url: './save_contact3_process',
                data: jQuery('#demo_contact3').serialize(),
                type: 'post',
                success: function(result) {
                    $('#contactloader').removeClass('loader');
                    if (result.status == "error") {
                        swal({
                            title: "Error",
                            text:result.message,
                            type: "error",
                            timer: 3000,
                            showConfirmButton: false
                        });
                        // jQuery.each(result.error, function(key, val) {
                        //     jQuery('#contact_msg3').html(val[0]);
                        // });
                    }
                    if (result.status == "success") {
                        swal({
                            title: "Success",
                            text:result.message,
                            type: "success",
                            timer: 3000,
                            showConfirmButton: false
                        });
                        setTimeout(function(){window.location.reload() }, 3000);
                        jQuery('#thankMessagefinal').show();
                        jQuery('#demo_contact3').hide();
                    }
                }
            });
        }
    });
    $('.contact_pervious_step1').on('click', function(e) {
        e.preventDefault();
        jQuery('.step_1').text('');
    });
    $('.contact_pervious_step2').on('click', function(e) {
        e.preventDefault();
        jQuery('.step_1').text('');
        jQuery('.step_2').text('');
        var reuest_product1 = $("input[name=purpose_of_contact]:checked").val();
        var poc=$('#contact_form2_h1').text();
        step_1 = '<div class="step_1"><strong>'+poc+'</strong><p>' + reuest_product1 + '<p></div>';
        $('.showContactFormData').append(step_1);
    });
}); // end document ready

////////////////////end code for contact form 3///////////////////////////
////////////////////start code for sales contact form///////////////////////////

$(document).ready(function() {
    $thing = $('#sales_contact_form').book({
        onPageChange: updateProgress,
        speed: 200
    }).validate();
    /* IE doesn't have a trunc function */

    if (!Math.trunc) {
        Math.trunc = function(v) {
            return v < 0 ? Math.ceil(v) : Math.floor(v);
        };
    }
    /* Update progress bar whenever the page changes */
    function updateProgress(prevPageIndex, currentPageIndex, pageCount, pageName) {
        t = (currentPageIndex / (pageCount - 1)) * 100;
        $('.progress-bar').attr('aria-valuenow', t);
        $('.progress-bar').css('width', t + '%');
        //$('.progress span').text('Completed: '+Math.trunc(t)+'%');
        $('.progress-value').text(Math.trunc(t) + '%');
        var data_html = '';
        if (currentPageIndex == 0) {
            $('.hideContant').show();
            $('.showContant').hide();
        }
        if (currentPageIndex == 1) {
            $('.hideContant').hide();
            $('.showContant').show();
            var reuest_product1 = $("input[name=sales_purpose_contact]:checked").val();
            var poc=$('#contact_form1_h1').text();
            step_1 = '<div class="step_1"><strong>'+poc+'</strong><p>' + reuest_product1 + '<p></div>';
            $('.showFormData').append(step_1);
        }
        if (currentPageIndex == 2) {
            $('.hideContant').hide();
            $('.showContant').show();
            var business_sales_area_interest = $("input[name=business_sales_area_interest]:checked").val();
            var baoi=$('#contact_form1_h2').text();
            var step_2 = '<div class="step_2"><strong>'+baoi+'</strong><p>' + business_sales_area_interest + '</p></div>';
            $('.showFormData').append(step_2);
        }
        if (currentPageIndex == 3) {
            $('.hideContant').hide();
            $('.showContant').show();
            var business_sales_msg = $("#business_enquiry_message").val();
            var hchelp=$('#contact_form1_h3').text();
            var step_3 = '<div class="step_3"><strong>'+hchelp+'</strong><p>' + business_sales_msg + '</p></div>';
            $('.showFormData').append(step_3);
        }
        if (currentPageIndex == 4) {
            $('.hideContant').hide();
            $('.showContant').show();
            var sales_name = $("#sales_name").val();
            var sales_email = $("#sales_email").val();
            var sales_phone = $("#sales_phone").val();
            var sales_country = $("#sales_country").val();
            var con=$('#contact_form1_h4').text();
            var step_4 = '<div class="step_4"><strong>'+con+'</strong><p>' + sales_name + '</p>' + '<p>' + sales_email + '</p>' + '<p>' + sales_phone + '</p>' + '<p>' + sales_country + '</p></div>';
            $('.showFormData').append(step_4);
        }
    }
    /* form's submit button */
    $('#sendSalesForm').on('click', function(e) {
        e.preventDefault();
         $('#contactloader').addClass('loader');
        if ($('#sales_contact_form').valid()) {
            // do ajax thingy here
            //alert('Your data was sent.');
            e.preventDefault();
            $('.hideContant').show();
            $('.showContant').hide();
            $('#sales_contact_msg3').html();
            $.ajax({
                url: $('#sales_contact_form').data('url'),
                data: $('#sales_contact_form').serialize(),
                type: 'post',
                success: function(result, status, xhr) {
                    $('#contactloader').removeClass('loader');
                    if (result.status == "error") {
                        swal({
                            title: "Error",
                            text:result.message,
                            type: "error",
                            timer: 3000,
                            showConfirmButton: false
                        });
                        // $.each(result.error, function(key, val) {
                        //     $('#sales_contact_msg3').html(val[0]);
                        // });
                    }
                    if (result.status == "success") {
                        //alert('data successfully submit.');
                        //jQuery('#demo_contact3')[0].reset();
                        // window.location.href='./contact-us';
                        $('#thankSalesMessagefinal').show();
                        $('#sales_contact_form').hide();
                        swal({
                            title: "Success",
                            text:result.message,
                            type: "success",
                            timer: 3000,
                            showConfirmButton: false
                        });
                        setTimeout(function(){window.location.reload() }, 3000);
                    }
                }
            });
        }
    });
    $('.pervious_step1').on('click', function(e) {
        e.preventDefault();
        jQuery('.step_1').text('');
    });
    $('.pervious_step2').on('click', function(e) {
        e.preventDefault();
        jQuery('.step_1').text('');
        jQuery('.step_2').text('');
        var poc=$('#contact_form1_h1').text();
        var reuest_product1 = $("input[name=sales_purpose_contact]:checked").val();
        step_1 = '<div class="step_1"><strong>'+poc+'</strong><p>' + reuest_product1 + '<p></div>';
        $('.showFormData').append(step_1);
    });
    $('.pervious_step3').on('click', function(e) {
        e.preventDefault();
        jQuery('.step_1').text('');
        jQuery('.step_2').text('');
        jQuery('.step_3').text('');
        jQuery('.step_4').text('');
        var poc=$('#contact_form1_h1').text();
        var baoi=$('#contact_form1_h2').text();
        var reuest_product1 = $("input[name=sales_purpose_contact]:checked").val();
        step_1 = '<div class="step_1"><strong>'+poc+'</strong><p>' + reuest_product1 + '<p></div>';
        $('.showFormData').append(step_1);
        var business_sales_area_interest = $("input[name=business_sales_area_interest]:checked").val();
        var step_2 = '<div class="step_2"><strong>'+baoi+'</strong><p>' + business_sales_area_interest + '</p></div>';
        $('.showFormData').append(step_2);
    });
    $('.pervious_step4').on('click', function(e) {
        e.preventDefault();
        jQuery('.step_1').text('');
        jQuery('.step_2').text('');
        jQuery('.step_3').text('');
        jQuery('.step_4').text('');
        var poc=$('#contact_form1_h1').text();
        var baoi=$('#contact_form1_h2').text();
        var hchelp=$('#contact_form1_h3').text();
        var con=$('#contact_form1_h3').text();
        var reuest_product1 = $("input[name=sales_purpose_contact]:checked").val();
        step_1 = '<div class="step_1"><strong>'+poc+'</strong><p>' + reuest_product1 + '<p></div>';
        $('.showFormData').append(step_1);
        var business_sales_area_interest = $("input[name=business_sales_area_interest]:checked").val();
        var step_2 = '<div class="step_2"><strong>'+baoi+'</strong><p>' + business_sales_area_interest + '</p></div>';
        $('.showFormData').append(step_2);
        var business_sales_msg = $("#business_enquiry_message").val();
        var step_3 = '<div class="step_3"><strong>'+hchelp+'</strong><p>' + business_sales_msg + '</p></div>';
        $('.showFormData').append(step_3);
    });
}); // end document ready
////////////////////end code for sales contact form //////////////////////////