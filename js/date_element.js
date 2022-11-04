(function($) {

  /**
   * Hide errors on an element
   * @param  {jQuery} indvElement
   *   The individual form input element to hide errors.
   */
  function hideErrorsOnElement(indvElement) {
    var indvElementWrapper = indvElement.find('.js-form-item');
    var indvElementWrapperDiv = indvElementWrapper.find('.div');
    //indvElementWrapper.addClass('visually-hidden');
    indvElementWrapper.removeClass('has-error');
    indvElement.find('input + .invalid-feedback').remove();

    
    // get all the sub date elements showing an error
    // var subElements = indvElementWrapperDiv.getElementsByClassName("form-required");
    // var thumbLi = $('.form-required').find('div');
    //var thumbLi = $('.form-required.form-item--error-message');
    // var thumbLi = $('.form-required').find('.form-item--error-message');
    // var thumbLi = $('.form-required div');
    // var thumbLi = $('label.form-required');
    var dateElementErrorMessages = $('div.form-item--error-message');
    // skip the 1st as this is the parent date element
    for (i = 1; i <= dateElementErrorMessages.length; i++) {
      dateElementErrorMessages.eq(i).addClass('visually-hidden');
    }
/*     for (var i = 0; i < subElements.length; i++) {
      //hide the error message;
      var div = subElements[i].addClass("visually-hidden");
    }  */   
    
/*     subElementslist = indvElementWrapperDiv.getElementsByClassName("form-required");
    for (let i = 0; i < subElementslist.length; i++) {
      subElementslist[i].each(function(index, element) {
        $(element).addClass("odd");
      });
    }  */

/*     $('.form-required').each(function(index, element) {
      $(element).addClass("odd");
    });    */
  }

  Drupal.behaviors.bhcc_webform_date = {
    attach: function(context, settings) {
      $('.js-webform-type-bhcc-webform-date', context).once('hide-errors-on-element').each(function() {
        hideErrorsOnElement($(this));
      });
    }
  }

}) (jQuery);
