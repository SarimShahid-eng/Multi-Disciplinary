<x-app-layout>
    <style>
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            min-height: 40px;
            align-items: center;
        }

        .tag {
            background-color: #435590;
            color: white;
            padding: 5px 10px;
            margin: 2px;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .tag .remove-tag {
            cursor: pointer;
            margin-left: 5px;
            font-weight: bold;
            margin-right: 10px;
        }

        .tags-input {
            border: none;
            outline: none;
            flex-grow: 1;
            padding: 5px;
        }

        .cross_icon {
            border-radius: 0;
            color: white;
            font-weight: bold;
        }

        .incomplete_sub_border::after {
            content: "";
            background: #405189;
            height: 1px;
            position: absolute;
            width: 100%;
            left: 0;
            bottom: 0;
            -webkit-transition: all 250ms ease 0s;
            transition: all 250ms ease 0s;
            -webkit-transform: scale(0);
            /* transform: scale(0); */
            transform: scale(1);
            /* color: #405189; */
        }

        .incomp-sub {
            padding: 1rem 1rem;
            background-color: #8080802e;
        }

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

                        {{-- <li> <a href="{{ route('submission.create_manuscript') }}" @class([
                            'text-primary',
                            'new-class',
                            'p-2',
                            'rounded-1',
                            'active-link' => request()->routeIs('submission.create_manuscript'),
                        ])
                                class="">Step 1 | Manuscript Information</a>
                        </li> --}}
                        {{-- @dd($manuscript) --}}
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
