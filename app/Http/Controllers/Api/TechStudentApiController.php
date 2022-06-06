<?php

namespace App\Http\Controllers\Api;

use App\Models\TechSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechStudentApiController extends CentralApiController
{
    public function get_technology_by_session(TechSession $session)
    {
        return success_response('Successfull', $session->probidhan->technology);
    }
}
