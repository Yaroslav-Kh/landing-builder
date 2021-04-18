<?php


namespace App\Repository;


use App\Models\Domain;
use App\Models\Landing;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class DomainRepository extends BaseRepository implements DomainRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Domain $model
     */
    public function __construct(Domain $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getDomains(): array
    {

        $landings = Landing::select('domain')->get()->toArray();

        if (empty($landings)) {
            return Domain::select('domain')->get()->toArray() ?? [];
        }

        $sql = Domain::select('domain');

        foreach ($landings as $landing) {
            $sql->whereNotIn('domain',[$landing['domain']]);
        }

        return $sql->get()->toArray();
    }



    /**
     * @return mixed
     */
    public function getByDomain($domain)
    {

        $result = $this->model->select('image','title','subtitle','content','template','font_color')
            ->where('domain', $domain)
            ->first();

        if (null === $result) {
            return false;
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getDomainsCount()
    {
        $landings = Landing::select('domain')->get()->toArray();

        if (empty($landings)) {
            return Domain::select('domain')->count();
        }

        $sql = Domain::select('domain');

        foreach ($landings as $landing) {
            $sql->whereNotIn('domain',[$landing['domain']]);
        }

        return $sql->count();
    }

}
