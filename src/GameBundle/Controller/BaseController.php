<?php

namespace GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    private $entityMenager;
    
    public function __construct()
    {
        $this->entityMenager = $this->get('doctrine')->getManager();
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }
}
