<?php


namespace App\Repository;


interface DomainRepositoryInterface
{

    public function getDomains();

    public function getDomainsCount();

    public function getByDomain($domain);

}
