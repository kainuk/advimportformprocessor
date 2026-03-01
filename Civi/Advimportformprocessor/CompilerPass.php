<?php

namespace Civi\Advimportformprocessor;
use CRM_Advimportformprocessor_ExtensionUtil as E;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CompilerPass implements CompilerPassInterface {

  /**
   * Register this one action: XcmGetOrCreate
   */
  public function process(ContainerBuilder $container) {
    if (!$container->hasDefinition('action_provider')) {
      return;
    }
    $typeFactoryDefinition = $container->getDefinition('action_provider');
    $typeFactoryDefinition->addMethodCall('addAction', ['ExcelDateToISO', 'Civi\Advimportformprocessor\ActionProvider\Action\ExcelDateToISO', E::ts('Advimport: ExcelDateToISO'), [
        \Civi\ActionProvider\Action\AbstractAction::DATA_RETRIEVAL_TAG
    ]]);
  }
}