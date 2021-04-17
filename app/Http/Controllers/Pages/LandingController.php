<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandingRequest;
use App\Models\Domain;
use App\Models\Landing;

use App\Repository\LandingRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class LandingController extends Controller
{

    private LandingRepositoryInterface $landingRepository;

    public function __construct(LandingRepositoryInterface $landingRepository)
    {
        $this->landingRepository = $landingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {

        return view('pages.landings.list', [
            'free_domains' => $this->landingRepository->getDomainsCount(),
            'landings' => $this->landingRepository->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('pages.landings.form', [
            'domains'   => $this->landingRepository->getDomains(),
            'templates' => $this->landingRepository->getTemplates(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LandingRequest $request
     * @return RedirectResponse
     */
    public function store(LandingRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if ($validated) {
            $slug = Str::slug($request->input('title'));

            $imageMimeType = explode('/', $request->file('image')->getClientMimeType())[1];
            $path = 'image/landings/'.$slug.'/';
            $filename = $slug.'.'. $imageMimeType;

            $request->file('image')->storeAs(
                $path,
                $filename,
                'public'
            );

            $data = $request->all();
            $data['image'] = $path.$filename;
            $data['user_id'] = Auth::id();

            (new Landing())->fill($data)->save();

            return redirect()
                ->route('landings.index')
                ->with('success' , 'Landing page has been successfully added ');
        }
    }

}
