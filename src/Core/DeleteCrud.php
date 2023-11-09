<?php

namespace app\Core;

class DeleteCrud
{
    private function deleteService($entityName ){
        $filename = ucfirst($entityName). 'Service.php';
        $filePath = 'app/Services/'.$filename;

        if(file_exists($filePath)){
            if (unlink($filePath)) {
                echo "<info>Service $filename deleted!</info>";
            } else {
                echo "<error>Service $filename not deleted</error>";
            }
        }

    }

    private function deleteController($entityName ){
        $filename = ucfirst($entityName). 'Controller.php';
        $filePath = 'app/Http/Controllers/'.$filename;

        if(file_exists($filePath)){
            if (unlink($filePath)) {
                echo "<info>Controller $filename deleted!</info>";
            } else {
                echo "<error>Controller $filename not deleted</error>";
            }
        }
    }

    private function deleteServiceInterface($entityName ){
        $filename = "I".ucfirst($entityName). 'Service.php';
        $filePath = 'app/Interfaces/Services/'.$filename;

        if(file_exists($filePath)){
            if (unlink($filePath)) {
                echo "<info>Interface $filename deleted!</info>";
            } else {
                echo "<error>Interface $filename not deleted</error>";
            }
        }
    }

    private function deleteRepository($entityName ){
        $filename = ucfirst($entityName). 'Repository.php';
        $filePath = 'app/Repositories/'.$filename;

        if(file_exists($filePath)){
            if (unlink($filePath)) {
                echo "<info>Repository $filename deleted!</info>";
            } else {
                echo "<error>Repository $filename not deleted</error>";
            }
        }
    }

    private function deleteRepositoryInterface($entityName){
        $filename = "I".ucfirst($entityName). 'Repository.php';
        $filePath = 'app/Interfaces/Repositories/'.$filename;

        if(file_exists($filePath)){
            if (unlink($filePath)) {
                echo "<info>Interface $filename deleted!</info>";
            } else {
                echo "<error>Interface $filename not deleted!</error>";
            }
        }
    }


    public function execute(array $data)
    {
        $entityValue = $data['entity_name'];

        $this->deleteModel($entityValue);
        $this->deleteRepositoryInterface($entityValue);
        $this->deleteRepository($entityValue);
        $this->deleteServiceInterface($entityValue);
        $this->deleteService($entityValue);
        $this->deleteController($entityValue);

    }

    private function deleteModel($entityName)
    {
        $filename = ucfirst($entityName). '.php';
        $filePath = 'app/Models/'.$filename;

        if(file_exists($filePath)){
            if (unlink($filePath)) {
                echo "Model $filename deleted!";
            } else {
                echo "Model $filename not deleted!";
            }
        }

    }
}