<x-submitted-manuscript-layout>
    <x-slot name="rows">
        @forelse ($underProcessings as $underProcessing)
            <tr>
                <td>{{ @$underProcessing->manuscriptId }}</td>
                <td>{{ @$underProcessing->journal->name }}</td>
                <td>{{ @$underProcessing->title }}</td>
                <td> Under processing </td>
                <td>{{ \Carbon\Carbon::parse(@$underProcessing->submission_date)->format('Y-m-d') }}</td>

                <td><button class="btn btn-primary btn-sm ps-2 pe-2 pt-0 pb-0">
                        <i class="ri-eye-fill"></i>
                    </button>

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
