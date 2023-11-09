<?php

namespace app\Core;

class Bootstrap
{

    /**
     * @var CreateCrud
     */
    private $createCrud;
    /**
     * @var DeleteCrud
     */
    private $deleteCrud;
    public function __construct()
    {
        $this->createCrud = new CreateCrud();
        $this->deleteCrud = new DeleteCrud();
    }

    public function render(){
        include  "src/View/index.php";
    }

    public function createCrud(array $data)
    {
        $this->createCrud->execute($data);
    }

    public function deleteCrud(array $data)
    {
        $this->deleteCrud->execute($data);
    }
}