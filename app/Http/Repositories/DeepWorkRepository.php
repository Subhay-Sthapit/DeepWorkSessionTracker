<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\DeepWorkInterface;
use App\Models\DeepWorkSession;
use Carbon\Carbon;

class DeepWorkRepository implements DeepWorkInterface
{

    public function createDeepWorkSession($data)
    {
        return DeepWorkSession::create($data); // todo error handling
    }

    public function startDeepWorkSession(DeepWorkSession $deepWorkSession,$data)
    {
        return $deepWorkSession->update($data);
    }

    public function findDeepWorkSessionWithId($id)
    {
        return DeepWorkSession::where('id','=',$id)->first();
    }
}
