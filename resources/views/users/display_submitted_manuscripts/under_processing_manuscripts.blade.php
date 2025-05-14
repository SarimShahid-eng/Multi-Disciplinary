<x-submitted-manuscript-layout>
    <x-slot name="rows">
        @forelse ($underProcessings as $underProcessing)
            <tr>
                <td>{{ @$underProcessing->manuscriptId }}</td>
                <td>{{ @$underProcessing->journal->name }}</td>
                <td>{{ @$underProcessing->title }}</td>
                <td> Submitted </td>
                <td>{{ \Carbon\Carbon::parse(@$underProcessing->submission_date)->format('Y-m-d') }}</td>

                <td>
                    <a href="{{ route('mansucript_details.view_manuscript_details', $underProcessing->encoded_id) }}">
                      <i data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="view" class="ri-search-line text-primary fw-medium" ></i>
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
