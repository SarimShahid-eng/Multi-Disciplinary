<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ManuscriptTracker;
use Illuminate\Support\Facades\Route;
use App\helpers\ManuscriptIdGenerator;
use Symfony\Component\HttpFoundation\Response;

class EnsureStepCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $IdGenerator = new ManuscriptIdGenerator();

        $routeManuscriptId = $request->route('manuscriptId');
        if ($routeManuscriptId) {
            session(['manuscript_id' => $routeManuscriptId]);
        }

        $manuscriptId = session('manuscript_id');

        if (!$manuscriptId) {
            return redirect()->route('submission.create_manuscript', ['manuscriptId' => $IdGenerator->getLatestId()]);
        }
        // dd('sj');

        $findManuscript = $IdGenerator->decodeId($manuscriptId)[0];
        $tracker = ManuscriptTracker::where('manuscript_id', $findManuscript)->first();

        $stepOrder = config('steps');
        $currentRoute = Route::currentRouteName();

        $currentStepIndex = null;
        $nextIncompleteStepIndex = null;

        $stepKeys = array_keys($stepOrder);
        $routeValues = array_values($stepOrder);

        foreach ($stepKeys as $index => $stepKey) {
            $isStepDone = $tracker && $tracker->{$stepKey};

            if ($routeValues[$index] === $currentRoute) {
                $currentStepIndex = $index;
            }

            if (!$isStepDone && is_null($nextIncompleteStepIndex)) {
                $nextIncompleteStepIndex = $index;
            }
        }

        if (!is_null($currentStepIndex) && !is_null($nextIncompleteStepIndex)) {
            if ($currentStepIndex > $nextIncompleteStepIndex) {
                $redirectRoute = $stepOrder[$stepKeys[$nextIncompleteStepIndex]];
                return redirect()->route($redirectRoute, ['manuscriptId' => $manuscriptId]);
            }
        }

        return $next($request);
    }
}
