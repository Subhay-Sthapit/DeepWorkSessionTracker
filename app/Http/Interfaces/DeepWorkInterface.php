<?php

namespace App\Http\Interfaces;

use App\Models\DeepWorkSession;

interface DeepWorkInterface
{
    public function createDeepWorkSession($data);
    public function startDeepWorkSession(DeepWorkSession $deepWorkSession,$data);
    public function findDeepWorkSessionWithId($id);
}
