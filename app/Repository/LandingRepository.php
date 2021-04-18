<?php


namespace App\Repository;

use App\Models\Domain;
use App\Models\Landing;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LandingRepository extends BaseRepository implements LandingRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Landing $model
     */
    public function __construct(Landing $model)
    {
        parent::__construct($model);
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->model->select('image','title','domain')->where('user_id', Auth::id())->get()->toArray() ?? [];
    }

    /**
     * @return mixed
     */
    public function getTemplates(): array
    {
        $files = Storage::disk('templates')->files();

        $templates = [];

        foreach ($files as $file) {

            $templates[] = explode('.',$file)[0];

        }

        return $templates;
    }

}
