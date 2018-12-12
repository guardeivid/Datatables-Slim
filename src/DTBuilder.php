<?php

namespace Gealtec\Datatables;;
use Illuminate\Http\Request;

interface DTBuilder
{
    public function buildDT()/*: DTResponse*/;
}
