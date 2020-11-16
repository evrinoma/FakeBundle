<?php

namespace Evrinoma\FakeBundle\Controller;


use Evrinoma\DtoBundle\Factory\FactoryDto;
use Evrinoma\FakeBundle\Dto\FakeDto;
use Evrinoma\FakeBundle\Manager\FakeManagerInterface;
use Evrinoma\UtilsBundle\Controller\AbstractApiController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;


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
    /**
     * @var FactoryDto
     */
    private $factoryDto;

    /**
     * @var Request
     */
    private $request;
//endregion Fields

//region SECTION: Constructor
    /**
     * SoapApiController constructor.
     *
     * @param SerializerInterface  $serializer
     * @param RequestStack         $requestStack
     * @param FactoryDto           $factoryDto
     * @param FakeManagerInterface $fakeManager
     */
    public function __construct(
        SerializerInterface $serializer,
        RequestStack $requestStack,
        FactoryDto $factoryDto,
        FakeManagerInterface $fakeManager
    ) {
        parent::__construct($serializer);
        $this->request     = $requestStack->getCurrentRequest();
        $this->factoryDto  = $factoryDto;
        $this->fakeManager = $fakeManager;
    }
//endregion Constructor

//region SECTION: Public
    /**
     * @Rest\Get("/api/fake/log", name="api_fake_log", options={"expose"=true})
     * @SWG\Get(tags={"fake"})
     * @SWG\Response(response=200,description="Get fake log")
     * @SWG\Parameter(
     *     name="Evrinoma\FakeBundle\Dto\FakeDto[entity_type]",
     *     in="query",
     *     type="array",
     *     default=null,
     *     description="exchange entity list",
     *     items=@SWG\Items(
     *         type="string",
     *         ref=@Model(type=Evrinoma\FakeBundle\Form\Rest\EntityType::class)
     *     )
     * )
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getLogsAction()
    {
        $fakeDto = $this->factoryDto->setRequest($this->request)->createDto(FakeDto::class);
        return $this->json($this->fakeManager->setRestSuccessOk()->getlog($fakeDto), $this->fakeManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/fake/services", name="api_fake_service", options={"expose"=true})
     * @SWG\Get(tags={"fake"})
     * @SWG\Response(response=200,description="Get fake service")
     * @SWG\Parameter(
     *     name="Evrinoma\FakeBundle\Dto\FakeDto[entity_type]",
     *     in="query",
     *     type="array",
     *     default=null,
     *     description="exchange entity list",
     *     items=@SWG\Items(
     *         type="string",
     *         ref=@Model(type=Evrinoma\FakeBundle\Form\Rest\EntityType::class)
     *     )
     * )
     * @SWG\Parameter(
     *     name="Evrinoma\FakeBundle\Dto\FakeDto[group]",
     *     in="query",
     *     type="array",
     *     default=null,
     *     description="exchange entity list",
     *     items=@SWG\Items(
     *         type="string",
     *         ref=@Model(type=Evrinoma\FakeBundle\Form\Rest\GroupType::class)
     *     )
     * )
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getServiceAction()
    {
        $fakeDto = $this->factoryDto->setRequest($this->request)->createDto(FakeDto::class);
        return $this->json($this->fakeManager->setRestSuccessOk()->getService($fakeDto), $this->fakeManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/fake/entity_type", name="api_fake_entity_type", options={"expose"=true})
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
     * @Rest\Get("/api/fake/group", name="api_fake_group", options={"expose"=true})
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