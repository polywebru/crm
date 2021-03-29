<?php

namespace App\Http\Controllers;

use App\Exceptions\LastModifiedException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function checkModelModifiedSince(Model $model, Request $request)
    {
        if (!$lastModified = $request->header('Last-Modified')) {
            return;
        }

        $updatedTimestamp = $model->updated_at->getTimestamp();
        $lastModifiedTimestamp = Carbon::createFromFormat('Y-m-d H:i:s', $lastModified)->getTimestamp();

        $diff = $updatedTimestamp - $lastModifiedTimestamp;

        if ($diff < 0) {
            throw new LastModifiedException();
        }
    }
}
