<?php

namespace app\Core;

class CreateCrud
{
    private function createService($entityName){
        $template = file_get_contents('ServiceTemplate.txt');
        $filename = ucfirst($entityName). 'Service.php';
        $filePath = 'app/Services/'.$filename;

        $template = $this->replace($template, $entityName);

        if (file_put_contents($filePath, $template) !== false) {
            echo "<info>Service for  $entityName created in $filePath!</info>";
        } else {
            echo "<error>Service not created</error>";
        }
    }

    private function createController($entityName){
        $template = file_get_contents('ControllerTemplate.txt');
        $filename = ucfirst($entityName). 'Controller.php';
        $filePath = 'app/Http/Controllers/'.$filename;

        $template = $this->replace($template, $entityName);

        if (file_put_contents($filePath, $template) !== false) {
            echo "<info>Controller for  $entityName created in $filePath!</info>";
        } else {
            echo "<error>Controller not created</error>";
        }
    }

    private function createModel($entityName){
        $template = file_get_contents('ModelTemplate.txt');
        $filename = ucfirst($entityName). '.php';
        $filePath = 'app/Models/'.$filename;

        $template = $this->replace($template, $entityName);
        $template = str_replace('{{TABLE_NAME}}' , strtolower($entityName).'s', $template);

        if (file_put_contents($filePath, $template) !== false) {
            echo "<info>Model for  $entityName created in $filePath!</info>";
        } else {
            echo "<error>Model not created</error>";
        }
    }

    private function createServiceInterface($entityName){
        $template = file_get_contents('IServiceTemplate.txt');
        $filename = "I".ucfirst($entityName). 'Service.php';
        $filePath = 'app/Interfaces/Services/'.$filename;

        $template = $this->replace($template, $entityName);

        if (file_put_contents($filePath, $template) !== false) {
            echo "<info>Service for  $entityName created in $filePath!</info>";
        } else {
            echo "<error>Service not created</error>";
        }
    }

    private function createRepository($entityName){
        $template = file_get_contents('RepositoryTemplate.txt');
        $filename = ucfirst($entityName). 'Repository.php';
        $filePath = 'app/Repositories/'.$filename;

        $template = $this->replace($template, $entityName);

        if (file_put_contents($filePath, $template) !== false) {
            echo "<info>Repository  for  $entityName created in $filePath!</info>";
        } else {
            echo "<error>Repository not created</error>";
        }
    }

    private function replace($template, $entityName): string{
        $template = str_replace('{{UC_FIRST_ENTITY_NAME}}', ucfirst($entityName), $template);
        $template = str_replace('{{LC_FIRST_ENTITY_NAME}}', lcfirst($entityName), $template);
        return $template;
    }

    private function createRepositoryInterface($entityName){
        $template = file_get_contents('IRepositoryTemplate.txt');
        $filename = "I".ucfirst($entityName). 'Repository.php';
        $filePath = 'app/Interfaces/Repositories/'.$filename;

        $template = $this->replace($template, $entityName);

        if (file_put_contents($filePath, $template) !== false) {
            echo "<info>IRepository  for  $entityName created in $filePath!</info>";
        } else {
            echo "<error>IRepository not created</error>";
        }
    }

    public function execute(array $data)
    {
        $entityValue = $data['entity_name'];
        $this->createModel($entityValue);
        $this->createRepositoryInterface($entityValue);
        $this->createRepository($entityValue);
        $this->createServiceInterface($entityValue);
        $this->createService($entityValue);
        $this->createController($entityValue);
    }
}