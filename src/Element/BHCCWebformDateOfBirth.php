<?php

namespace Drupal\bhcc_webform_date\Element;

/**
 * Provides a 'bhcc_webform_date_of_birth'.
 *
 * Webform composites contain a group of sub-elements.
 *
 *
 * IMPORTANT:
 * Webform composite can not contain multiple value elements (i.e. checkboxes)
 * or composites (i.e. webform_address)
 *
 * @FormElement("bhcc_webform_date_of_birth")
 *
 * @see \Drupal\webform\Element\WebformCompositeBase
 * @see \Drupal\webform_example_composite\Element\WebformExampleComposite
 */
class BHCCWebformDateOfBirth extends BHCCWebformDate {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {

    $parentInfo = parent::getInfo();
    $childInfo = [
      '#description' => $this->t('For example 08/02/1982'),
    ];
    $returnInfo = array_replace($parentInfo, $childInfo);
    return $returnInfo;

  }

}
