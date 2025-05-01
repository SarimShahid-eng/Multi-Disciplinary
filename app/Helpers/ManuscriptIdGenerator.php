<?php

namespace App\helpers;

use Hashids\Hashids;
use App\Models\Manuscript;

class ManuscriptIdGenerator
{
    /**
     * Create a new class instance.
     */

    function getLatestId()
    {
        $hashids = new Hashids('', 25);
        $count = Manuscript::select('id')->latest()->first();
        if (!$count) {
            $count = 1;
        } else {
            $count =  ++$count->id;
        }
        return $hashids->encode($count);
    }
    function encodeId($id)
    {
        $hashids = new Hashids('', 25);
        return $hashids->encode($id);
    }
    function decodeId($id)
    {
        $hashids = new Hashids('', 25);
        return $hashids->decode($id);
    }
}
