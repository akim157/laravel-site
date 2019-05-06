<?php
namespace Corp\Repositories;

use Corp\Portfolio;

class PortfoliosRepository extends Repository
{
    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }

    public function one($alis, $attr = [])
    {
        $portfolio = parent::one($alis);
        if($portfolio && $portfolio->img)
        {
            $portfolio->img = json_decode($portfolio->img);
        }
        return $portfolio;
    }
}
