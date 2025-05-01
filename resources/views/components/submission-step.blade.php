    <li>
        {{-- @dd($manuscript) --}}
        @if ($hasManuscript())
            {{-- @dd($manuscript) --}}
            <a href="{{ route($route, ['manuscriptId' => $manuscript]) }}" @class([
                'p-2',
                'new-class',
                'rounded-1',
                'text-primary',
                'active-link' => $isActive(),
            ])>
                {{ $label }}
            </a>
        @else
            <a href="#" onclick="return false;" class="disabled p-2 text-primary new-class rounded-1 text-muted">
                {{ $label }}
            </a>
        @endif
    </li>
