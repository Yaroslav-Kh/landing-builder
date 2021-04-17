<?php


namespace App\Repository;


interface LandingRepositoryInterface
{

    public function all();

    public function getDomains();

    public function getDomainsCount();

    public function getByDomain($domain);

    public function getTemplates();



}
