<?php

namespace Evrinoma\FakeBundle\Manager;


use Evrinoma\FakeBundle\Fake\Log;
use Evrinoma\FakeBundle\Fake\Model;
use Evrinoma\FakeBundle\Fake\Record;
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

//region SECTION: Fields
    /**
     * @var array
     */
    private $services = [];

    /**
     * @var array
     */
    private $entitys = [];

    /**
     * @var array
     */
    private $logs = [];
//endregion Fields

//region SECTION: Constructor
    /**
     * FakeManager constructor.
     */
    public function __construct()
    {

        $this
            ->createServices()
            ->createEntitys()
            ->createLogs();
    }
//endregion Constructor

//region SECTION: Private
    private function createServices()
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

        return $this;
    }

    private function createEntitys()
    {
        $this->entitys[Model::USER]     = [Model::ITE_NG, Model::KZKT, Model::NEKENG];
        $this->entitys[Model::CONTRACT] = [Model::ITE_NG, Model::NEKENG];
        $this->entitys[Model::PROJECT]  = [Model::KZKT, Model::NEKENG];
        $this->entitys[Model::STAGE]    = [Model::NEKENG];
        $this->entitys[Model::ESTIMATE] = [Model::ITE_NG];
        $this->entitys[Model::CODE]     = [Model::ITE_NG];

        return $this;
    }

    private function generateEvent()
    {
        $event       = new \stdClass();
        $r           = random_int(0, 2);
        $event->name = ($r == 2 ? 'new' : ($r == 1 ? 'edit' : 'delete'));
        $r           = random_int(0, 1);
        if ($r == 1) {
            $r          = random_int(0, 2);
            $event->url = ($r == 2 ? 'http' : ($r == 1 ? 'ldap' : 'https'))."://".md5(random_bytes(random_int(5, 15))).".ru/";
        }
        $r = random_int(0, 1);
        if ($r == 1) {
            $r             = random_int(0, 2);
            $event->active = ($r == 2 ? 'b' : ($r == 1 ? 'a' : 'b'));
            $r             = random_int(0, 2);
        }

        return $event;
    }

    private function generateRecords(int $count, string $date): array
    {
        $records = [];
        for ($i = 0; $i < $count; $i++) {
            $r          = random_int(0, 2);
            $h          = ($i % 24);
            $m          = ($i % 60);
            $records [] = new Record(
                $i,
                md5(random_int(0, 65535)),
                $date." ".($h < 9 ? "0" : "").$h.":".($m < 9 ? "0" : "").$m,
                md5(random_bytes(random_int(10, 65535))),
                $this->generateEvent(),
                ($r == 2 ? 'new' : ($r == 1 ? 'edit' : 'delete')),
                random_int(400, 500)
            );
        }

        return $records;
    }

    private function genereateLog(string $group, int $days, string $date): array
    {
        $logs    = [];
        $curDate = new \DateTime($date);
        for ($i = 0; $i < $days; $i++) {

            $r    = random_int(0, 2);
            $type = ($r == 2 ? 'static' : ($r == 1 ? 'dynamic' : 'unknown'));

            $r      = random_int(0, 2);
            $status = ($r == 2 ? 'ok' : ($r == 1 ? 'warning' : 'error'));

            $r       = random_int(0, 8);
            $options = ($r == 8 ? ['skip', 'override'] :
                ($r == 7 ? ['skip', 'event', 'empty'] :
                    ($r == 6 ? ['random', 'override'] :
                        ($r == 5 ? ['skip', 'random', 'new'] :
                            ($r == 4 ? ['skip'] :
                                ($r == 3 ? ['skip', 'event'] :
                                    ($r == 2 ? ['skip', 'new'] :
                                        ($r == 1 ? ['skip', 'random', 'override'] : ['random', 'override']))))))));

            $sCurDate = $curDate->format('Y-m-d');

            $logs [] = new Log($sCurDate, $group, $type, $options, $this->generateRecords(random_int(0, 100), $sCurDate), $status);
            $curDate->modify('+1 day');
        }

        return $logs;
    }


    private function createLogs()
    {
        foreach ($this->entitys as $entity => $values) {
            foreach ($values as $value) {
                $this->logs[$entity][$value] = $this->genereateLog($entity, random_int(0, 20), "2020-09-01");
            }
        }

        return $this;
    }
//endregion Private

//region SECTION: Getters/Setters
    public function getlog(string $entityType): array
    {
        return array_key_exists($entityType, $this->logs) ? $this->logs[$entityType] : [];
    }

    /**
     * @return array
     */
    public function getEntityTypes(): array
    {
        return [
            Model::USER,
            Model::CONTRACT,
            Model::PROJECT,
            Model::STAGE,
            Model::ESTIMATE,
            Model::CODE,
        ];
    }

    /**
     * @return array
     */
    public function getGroups(): array
    {
        return [
            Model::ITE_NG,
            Model::KZKT,
            Model::NEKENG,
        ];
    }

    /**
     * @param string      $group
     * @param string|null $entityType
     *
     * @return array
     */
    public function getService(string $group, string $entityType = null): array
    {
        if (!$entityType) {
            $service = array_key_exists($group, $this->services) ? $this->services[$group] : $this->services;
        } else {
            $keys    = array_key_exists($entityType, $this->entitys) ? $this->entitys[$entityType] : [];
            $service = array_intersect_key($this->services, array_flip($keys));
        }

        return $service;
    }

    /**
     * @return int
     */
    public function getRestStatus(): int
    {
        return $this->status;
    }
//endregion Getters/Setters
}
