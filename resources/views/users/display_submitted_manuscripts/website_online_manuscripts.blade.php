<x-submitted-manuscript-layout>
    <x-slot name="rows">
        @forelse ($publishes as $publish)
            <tr>
                <td>{{ @$publish->manuscriptId }}</td>
                <td>{{ @$publish->journal->name }}</td>
                <td>{{ @$publish->title }}</td>
                <td> Website online </td>

                <td>{{ \Carbon\Carbon::parse(@$publish->submission_date)->format('Y-m-d') }}</td>

                <td><a href="#">
                      <i data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="search" class="ri-search-line text-primary fw-medium" ></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">There are no uploaded manuscripts. <a
                        href="{{ route('submission.reset_manuscript') }}" class="text-primary fw-medium"> Click here to
                        submit your
                        manuscript. </a>
                </td>
            </tr>
        @endforelse
    </x-slot>
</x-submitted-manuscript-layout>
