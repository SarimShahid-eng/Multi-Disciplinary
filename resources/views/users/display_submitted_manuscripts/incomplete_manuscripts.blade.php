<x-submitted-manuscript-layout>
    @include('users.commonModal.postModal')
    <x-slot name="rows">
        @forelse ($incompleteManuscripts as $incompleteManuscript)
            <tr>
                <td>{{ @$incompleteManuscript->journal->name }}</td>
                <td>{{ @$incompleteManuscript->title }}</td>
                <td>Step {{ $incompleteManuscript->completed_steps_count }} of 4</td>
                <td>{{ \Carbon\Carbon::parse(@$incompleteManuscript->submission_date)->format('Y-m-d') }}</td>
                <td>
                    @php
                        $encodedId = app(App\Helpers\ManuscriptIdGenerator::class)->encodeId($incompleteManuscript->id);
                    @endphp
                    <a class="btn btn-primary btn-sm ps-2 pe-2 pt-0 pb-0"
                        href="{{ $incompleteManuscript->getNextStepRoute($encodedId) }}">
                        <i class="ri-pencil-fill"></i>
                    </a>
                    <button data-url="{{ route('submitted_manuscripts.delete_incomplete') }}"
                        data-id="{{ $encodedId }}" class="delete btn btn-danger btn-sm ps-2 pe-2 pt-0 pb-0">
                        <i class="ri-close-line fw-bold "></i>
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
    @push('page-script')
        <script>
            $('.delete').on('click', function() {
                var currentUrl = $(this).data('url');
                var id = $(this).data('id');
                $('#remove_data_form').attr('action', currentUrl);
                $('#remove_data_id').val(id);
                $('.customText').text('Are you sure you want to delete this manuscript?');
                $('#remove_data').modal('show');
            });
        </script>
    @endpush

</x-submitted-manuscript-layout>
