<?php

namespace Drupal\bhcc_webform_date\Element;

use Drupal\localgov_forms_date\Element\LocalgovFormsDate;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Provides a 'bhcc_webform_date'.
 *
 * Webform composites contain a group of sub-elements.
 *
 * IMPORTANT:
 * Webform composite can not contain multiple value elements (i.e. checkboxes)
 * or composites (i.e. webform_address)
 *
 * @FormElement("bhcc_webform_date")
 *
 * @see \Drupal\webform\Element\WebformCompositeBase
 * @see \Drupal\webform_example_composite\Element\WebformExampleComposite
 */
class BHCCWebformDate extends LocalgovFormsDate {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {

    $today = strtotime('now');
    $todayFormat = date('d/m/Y', $today);
    $description = 'For example ' . $todayFormat;
    $parentInfo = parent::getInfo();
    $childInfo = [
      '#description' => $description,
      '#date_date_format' => 'd/m/Y',
      '#date_time_format' => 'H:i:s',
      '#date_time_element' => 'none',
    ];
    $returnInfo = array_replace($parentInfo, $childInfo);
    return $returnInfo;
  }

  /**
   * {@inheritdoc}
   */
  public static function validateDatelist(&$element, FormStateInterface $form_state, &$complete_form) {

/*     $element['#date_date_format'] = 'd/m/Y';
    $element['#date_time_format'] = 'H:i:s';
    $element['#date_time_element'] = 'none'; */
 /*    $today = strtotime('now');
    $todayFormat = date('d/m/Y', $today);
    echo $todayFormat; */
    parent::validateDatelist($element, $form_state, $complete_form);

  }
}
