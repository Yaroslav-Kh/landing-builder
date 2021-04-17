<?php

namespace App\Http\Controllers;

use App\Repository\LandingRepositoryInterface;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    private LandingRepositoryInterface $landingRepository;

    public function __construct(LandingRepositoryInterface $landingRepository)
    {
        $this->landingRepository = $landingRepository;
    }

    public function index(Request $request) {

        $landing = $this->landingRepository->getByDomain($request->getHost());

        return view('templates.'.$landing['template'], [
            'landing'=> $landing
        ]);
    }

}
