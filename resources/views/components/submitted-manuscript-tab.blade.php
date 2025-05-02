<style>
    .active-link {
        background-color: #405189;
        color: white !important;
        font-weight: 500
    }
</style>
<a href="{{ route($route) }}" @class([
    'p-2',
    'new-class',
    'rounded-1',
    'text-primary',
    'active-link' => $isActive(),
])>
    {{ $label }}
</a>
