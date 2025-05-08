<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxWords implements ValidationRule
{
    protected int $limit;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $wordCount = str_word_count(strip_tags($value));

        if ($wordCount > $this->limit) {
            $fail("The :attribute must not exceed {$this->limit} words. Currently: {$wordCount} words.");
        }
    }
}
