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
     * @Rest\Get("/api/fake/get", name="api_get_fake")
     * @SWG\Get(tags={"fake"})
     * @SWG\Response(response=200,description="Get fake data")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAction()
    {
        return $this->json($this->fakeManager->setRestSuccessOk()->getData(), $this->fakeManager->getRestStatus());
    }
//endregion Public
}