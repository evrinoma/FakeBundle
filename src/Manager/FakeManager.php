<?php

namespace Evrinoma\FakeBundle\Manager;


use Evrinoma\FakeBundle\Fake\Model;
use Evrinoma\FakeBundle\Fake\Service;
use Evrinoma\UtilsBundle\Manager\AbstractBaseManager;
use Evrinoma\UtilsBundle\Rest\RestTrait;


/**
 * Class FakeManager
 *
 * @package Evrinoma\FakeBundle\Manager
 */
final class FakeManager extends AbstractBaseManager implements FakeManagerInterface
{
    use RestTrait;



    /**
     * @var array
     */
    private $services = [];

    /**
     * FakeManager constructor.
     */
    public function __construct()
    {
        $this->services[Model::ITE_NG][] = new Service(Model::ITE_NG, Model::SOAP, '1cBuhOk', ['SOAP_VERSION' => '1']);
        $this->services[Model::ITE_NG][] = new Service(Model::ITE_NG, Model::LDAP, '172.20.1.6', ['VERSION' => '2020', 'cloud' => 'false']);
        $this->services[Model::ITE_NG][] = new Service(Model::ITE_NG, Model::MAIL, '172.20.1.4', []);

        $this->services[Model::KZKT][] = new Service(Model::KZKT, Model::SOAP, '1cBuhOk', ['SOAP_VERSION' => '2']);
        $this->services[Model::KZKT][] = (new Service(Model::KZKT, Model::MAIL, '172.16.45.4', []))->setActiveToDelete();
        $this->services[Model::KZKT][] = new Service(Model::KZKT, Model::LDAP, '172.16.45.12', ['VERSION' => '2012', 'cloud' => 'true']);

        $this->services[Model::NEKENG][] = new Service(Model::NEKENG, Model::SOAP, '1cBuhOk', ['SOAP_VERSION' => '1', 'NTLM' => 'true']);
        $this->services[Model::NEKENG][] = (new Service(Model::NEKENG, Model::LDAP, '172.20.1.20', ['VERSION' => '2010', 'cloud' => 'false']))->setActiveToBlocked();
        $this->services[Model::NEKENG][] = new Service(Model::NEKENG, Model::MAIL, '172.16.45.4', []);
    }

    public function getStatus(string $type):array
    {

        $type = 'User';




        return [];
    }

    public function getService(string $server):array
    {
        return array_key_exists($server, $this->services)? $this->services[$server] : [];
    }

    public function getRestStatus(): int
    {
        return $this->status;
    }
}