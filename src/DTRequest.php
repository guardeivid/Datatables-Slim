<?php

namespace Gealtec\Datatables;
use Slim\Http\Request;


class DTRequest
{
    public $sort;
    public $sortCol;
    public $sortDir;
    public $paginate;
    public $page;
    public $start;
    public $length;
    public $search;
    public $searchTerms;
    public $searchColumns;
    public $columns;
    public $draw;

    public function __construct(Request $request)
    {
        $params=$request->getQueryParams();

        $this->sort = !empty($params['columns'][$params['order'][0]['column']]);

        $col = $params['columns'][$params['order'][0]['column']];

        $this->sortCol = (!empty($col['name'])) ? $col['name'] : $col['data'];

        $this->sortDir = ($params['order'][0]['dir'] === 'asc') ? 'asc' : 'desc';

        $this->paginate = (isset($params['start']) && isset($params['length']) && (int) $params['length'] !== -1);

        $this->page = ($this->paginate) ? ($params['start'] / $params['length']) + 1 : 1;

        $this->start = $params['start'];

        $this->length = $params['length'];

        $this->draw = (int) $params['draw'];

        $this->search = !empty($params['search']['value']);

        $this->searchTerms = explode(" ", strtolower($params['search']['value']));

        $this->columns = collect($params['columns'])
            ->map(function ($col) {
                return !empty($col['name']) ? $col['name'] : $col['data'];
            });

        $this->searchColumns = collect($params['columns'])
            ->filter(function($col){
                return $col['searchable'] === 'true';
            })
            ->map(function ($col) {
                return !empty($col['name']) ? $col['name'] : $col['data'];
            });
    }

}
