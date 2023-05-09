(function($) {

  /**
   * Hide errors on an element
   * @param  {jQuery} indvElement
   *   The individual form input element to hide errors.
   */
  function hideErrorsOnElement(indvElement) {
    var indvElementWrapper = indvElement.find('.js-form-item');
    indvElementWrapper.removeClass('form-item--error');
    // get all the sub date elements showing an error
    var dateElementErrorMessages = indvElementWrapper.find('div.form-item--error-message');;
    // skip the 1st as this is the parent date element
    for (i = 0; i < dateElementErrorMessages.length; i++) {
      dateElementErrorMessages.eq(i).addClass('hidden');
    }
  }


  Drupal.behaviors.bhcc_webform_date = {
    attach: function(context, settings) {
      $(once('hide-errors-on-element', '.js-webform-type-bhcc-webform-date', context)).each(function () {
        hideErrorsOnElement($(this));
      });
    }
  }

}) (jQuery);
