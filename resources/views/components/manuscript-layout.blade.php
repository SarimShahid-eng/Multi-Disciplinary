<x-app-layout>
    <style>
        .active-link {
            background-color: #405189;
            color: white !important;
            font-weight: 500
        }
    </style>
    <div class="row">

        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header pb-1">
                    <ul class="d-flex ps-0">


                        <x-submission-step route="submission.create_manuscript" label="Step 1 | Manuscript Information"
                            :manuscript="$manuscript" />
                        <x-submission-step route="submission.create_author" label="Step 2 | Author Information"
                            :manuscript="$manuscript" />
                        <x-submission-step route="submission.create_reviewer" label="Step 3 | Reviewer Information"
                            :manuscript="$manuscript" />
                        <x-submission-step route="submission.create_statement" label="Step 4 | Statement"
                            :manuscript="$manuscript" />


                    </ul>

                </div>
                <div class="card-body p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <!--end row-->
    </div>
    </div>
    </div>


    </div>

    <!--end col-->
    </div>

</x-app-layout>
