<?php

namespace App\Controller;

use App\Service\Calculator\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/calculator/', name: 'app_api_calculator_')]
class CalculatorController extends AbstractController
{
    public function __construct(private readonly Calculator $calculator) {}

    #[Route('add/{a}/{b}', name: 'add', methods: ['GET'])]
    public function add( float $a, float $b): JsonResponse
    {
        return new JsonResponse($this->calculator->add($a, $b));
    }

    #[Route('subtract/{a}/{b}', name: 'subtract', methods: ['GET'])]
    public function subtract(float $a, float $b): JsonResponse
    {
        return new JsonResponse($this->calculator->subtract($a, $b));
    }

    #[Route('multiply/{a}/{b}', name: 'multiply', methods: ['GET'])]
    public function multiply(float $a, float $b): JsonResponse
    {
        return new JsonResponse($this->calculator->multiply($a, $b));
    }

    #[Route('divide/{a}/{b}', name: 'divide', methods: ['GET'])]
    public function divide(float $a, float $b): JsonResponse
    {
        return new JsonResponse($this->calculator->divide($a, $b));
    }
}