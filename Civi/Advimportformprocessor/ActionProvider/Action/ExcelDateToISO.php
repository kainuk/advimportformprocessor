<?php
namespace Civi\Advimportformprocessor\ActionProvider\Action;
use CRM_Advimportformprocessor_ExtensionUtil as E;
use \Civi\ActionProvider\Action\AbstractAction;
use \Civi\ActionProvider\Parameter\ParameterBagInterface;
use \Civi\ActionProvider\Parameter\Specification;
use \Civi\ActionProvider\Parameter\SpecificationBag;
use \Civi\ActionProvider\Utils\CustomField;
class ExcelDateToISO extends AbstractAction
{

  protected function doAction(ParameterBagInterface $parameters, ParameterBagInterface $output) {
    $unix = ($parameters->getParameter('exceldate') - 25569) * 86400;
    $output->setParameter('date',gmdate("Y-m-d H:i:s", $unix));
  }

  public function getConfigurationSpecification() {
    return new SpecificationBag([]);
  }

  public function getParameterSpecification() {
    return new SpecificationBag(
      [new Specification('exceldate', 'Integer', E::ts('Excel Date'), true, null, null, null, false)]
    );
  }

  public function getOutputSpecification() {
    return new SpecificationBag(
    [new Specification('date', 'Date', E::ts('Date'), true, null, null, null, false)]);
  }

}