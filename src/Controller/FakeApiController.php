<?php

namespace Evrinoma\FakeBundle\Controller;


use Evrinoma\FakeBundle\Manager\FakeManagerInterface;
use Evrinoma\UtilsBundle\Controller\AbstractApiController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use JMS\Serializer\SerializerInterface;


/**
 * Class FakeApiController
 *
 * @package Evrinoma\FakeBundle\Controller
 */
final class FakeApiController extends AbstractApiController
{
//region SECTION: Fields
    /**
     * @var FakeManagerInterface
     */
    private $fakeManager;
//endregion Fields

//region SECTION: Constructor
    /**
     * SoapApiController constructor.
     *
     * @param SerializerInterface  $serializer
     * @param FakeManagerInterface $soapManager
     */
    public function __construct(
        SerializerInterface $serializer,
        FakeManagerInterface $fakeManager
    ) {
        parent::__construct($serializer);
        $this->fakeManager = $fakeManager;
    }
//endregion Constructor

//region SECTION: Public
    /**
     * @Rest\Get("/api/fake/log", name="api_fake_log")
     * @SWG\Get(tags={"fake"})
     * @SWG\Response(response=200,description="Get fake log")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getLogsAction()
    {
        return $this->json($this->fakeManager->setRestSuccessOk()->getlog(\Evrinoma\FakeBundle\Fake\Model::CODE), $this->fakeManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/fake/services", name="api_fake_service")
     * @SWG\Get(tags={"fake"})
     * @SWG\Response(response=200,description="Get fake service")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getServiceAction()
    {
        return $this->json($this->fakeManager->setRestSuccessOk()->getService(\Evrinoma\FakeBundle\Fake\Model::ITE_NG, \Evrinoma\FakeBundle\Fake\Model::CODE), $this->fakeManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/fake/entity_type", name="api_fake_entity_type")
     * @SWG\Get(tags={"fake"})
     * @SWG\Response(response=200,description="Get fake entity")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getEntityTypesAction()
    {
        return $this->json($this->fakeManager->setRestSuccessOk()->getEntityTypes(), $this->fakeManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/fake/group", name="api_fake_group")
     * @SWG\Get(tags={"fake"})
     * @SWG\Response(response=200,description="Get fake group")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getTypesAction()
    {
        return $this->json($this->fakeManager->setRestSuccessOk()->getGroups(), $this->fakeManager->getRestStatus());
    }
//endregion Public
}