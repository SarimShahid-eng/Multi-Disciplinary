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
        $manuscriptId = session('manuscript_id');
        $IdGenerator = new ManuscriptIdGenerator();

        if (!$manuscriptId) {
            return redirect()->route('submission.create_manuscript');
        }
        if (session()->has('manuscript_id')) {
            $findManuscript = $IdGenerator->decodeId($manuscriptId)[0];
        } else {
            $findManuscript = $IdGenerator->getLatestId();
        }
        $tracker = ManuscriptTracker::where('manuscript_id', $findManuscript)->first();
        // dd($tracker);
        $stepOrder = config('steps');

        $currentRoute = Route::currentRouteName();

        $currentStepIndex = null;
        $nextIncompleteStepIndex = null;

        $stepKeys = array_keys($stepOrder);
        // dd($stepKeys);
        $routeValues = array_values($stepOrder);

        foreach ($stepKeys as $index => $stepKey) {
            $isStepDone = $tracker && $tracker->{$stepKey};
            // dd($isStepDone);
            if ($routeValues[$index] === $currentRoute) {
                $currentStepIndex = $index;
            }

            if (!$isStepDone && is_null($nextIncompleteStepIndex)) {
                $nextIncompleteStepIndex = $index;
            }
        }

        // Allow access if current step is before or equal to the next incomplete step
        if (!is_null($currentStepIndex) && !is_null($nextIncompleteStepIndex)) {
            if ($currentStepIndex > $nextIncompleteStepIndex) {
                // Redirect to the first incomplete step
                $redirectRoute = $stepOrder[$stepKeys[$nextIncompleteStepIndex]];
                return redirect()->route($redirectRoute, ['manuscriptId' => $manuscriptId]);
            }
        }

        return $next($request);
    }
}
