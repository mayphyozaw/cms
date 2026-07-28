@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">BOQ Details</h4>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            BOQ Details
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="gap-2 d-flex align-items-center flex-wrap">

                <a href="{{ route('projectmanage.projects.index') }}" class="btn btn-outline-light shadow">
                    <span style="color:black">{{ $project->client->project_code }} @
                        {{ $project->client->name }} - ({{ $project->client->length }} * {{ $project->client->width }}) -
                        {{ $project->client->building_area }} sqft
                    </span>
                </a>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        BILL OF QUANTITIES (BOQ)
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.boq-quantity-detail.store', [$project->id, $boq->id]) }}"
                        method="POST" id="submit-form" enctype="multipart/form-data">
                        @csrf
                        {{-- ================= PROJECT INFO ================= --}}
                        

                        {{-- ================= ITEMS AND TOTAL ================= --}}
                        <div class="card">
                            <div class="card-body">
                                {{-- ================= ITEMS ================= --}}
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            No
                                                        </th>
                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Particular
                                                        </th>
                                                        
                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Qty
                                                        </th>

                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Unit
                                                        </th>



                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                


                                                <tbody id="table-body">

                                                </tbody>
                                            </table>
                                            <div class="py-3">
                                                <button type="button" id="add-section" class="btn btn-primary btn-sm">+
                                                    Scope Title
                                                </button>
                                                <button type="button" id="add-item" class="btn btn-success btn-sm">+
                                                    Scope Item
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <style>
                                    .proposal-content {
                                        word-wrap: break-word;
                                        line-height: 1.6;
                                    }

                                    .proposal-content ul {
                                        display: block !important;
                                        list-style-type: disc !important;
                                        list-style-position: outside !important;
                                        padding-left: 2.0rem !important;
                                        margin-top: 10px !important;
                                        margin-bottom: 10px !important;
                                    }

                                    .proposal-content li {
                                        display: list-item !important;
                                        list-style-type: disc !important;
                                        margin-bottom: 5px;
                                    }

                                    .proposal-content ol {
                                        display: block !important;
                                        list-style-type: decimal !important;
                                        padding-left: 2.0rem !important;
                                    }
                                </style>

                                <div class="col-md-12 mt-2">
                                    <label class="form-label">
                                        Remark:
                                    </label>
                                    <textarea class="summernote" name="remark"></textarea>
                                </div>

                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- {!! JsValidator::formRequest('App\Http\Requests\BQ\BQWorkCategoryStoreRequest', '#submit-form') !!} --}}


    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Write Remark or Specifications:',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#work_scope_id').on('change', function() {

                let workScopeId = $(this).val();

                $.ajax({
                    url: "{{ route('projectmanage.get.boq.category') }}",
                    type: "GET",
                    data: {
                        work_scope_id: workScopeId
                    },
                    success: function(response) {

                        $('#boq_work_type').html(
                            `<option value="${response[0].boq_work_types}">
                                ${response[0].boq_work_types}
                            </option>`
                        );

                        let options = '';

                        response.forEach(item => {
                            options += `<option value="${item.id}">
                                        ${item.category_name}
                                        </option>`;
                        });

                        $('#boq_work_category_id').html(options);

                    }
                });

            });


            $('#client_id').on('change', function() {
                let clientId = $(this).val();
                $.ajax({
                    url: "{{ route('projectmanage.clients_get') }}",
                    type: 'GET',
                    data: {
                        client_id: clientId,
                    },
                    success: function(data) {
                        $('#address').val(data.address);
                        $('#phone').val(data.phone);
                        $('#project_code').val(data.project_code);
                        $('#site_location').val(data.site_location);
                        $('#building_area').val(data.building_area);
                        $('#job_scope').val(data.job_scope);
                        $('#storeys').val(data.storeys);
                        $('#client_type').val(data.client_type);
                    },
                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });


            $(document).on('change', '.drawing_measurement_id', function() {

                let drawingMeasurementId = $(this).val();

                let currentRow = $(this).closest('tr');

                $.ajax({
                    url: "{{ route('projectmanage.get.drawing.measurement.detail') }}",
                    type: "GET",
                    data: {
                        drawing_measurement_id: drawingMeasurementId
                    },
                    success: function(response) {

                        
                        currentRow.find('.quantity').val(response.quantity);
                        currentRow.find('.unit').val(response.unit);

                    }
                });

            });

            // ADD ITEM
            let itemRowIndex = $('#table-body tr').length;
            let sectionCount = 0;
            let currentSection = 0;
            let sectionItemCount = {};
            $('#add-section').click(function() {
                sectionCount++;
                currentSection = sectionCount;
                sectionItemCount[currentSection] = 0;
                itemRowIndex++;
                let html = `
                    <tr class="section-row">
                        <td>${sectionCount}</td>
                        <td colspan="3">
                            <input type="text" name="rows[${itemRowIndex}][title]" placeholder="Section Title" class="form-control">
                            <input type="hidden" name="rows[${itemRowIndex}][type]" value="section">
                            <input type="hidden" name="rows[${itemRowIndex}][item_no]" value="${sectionCount}">
                        </td>
                        <td>
                            <button type="button" class="remove btn btn-sm btn-danger">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>`;

                $('#table-body').append(html);
                refreshNumbering();
            });

            $('#add-item').click(function() {

                sectionItemCount[currentSection]++;
                let itemNo = currentSection + '.' + sectionItemCount[currentSection];
                itemRowIndex++;

                let html = `
                        <tr class="item-row">

                            <td>${itemNo}</td>

                            <td>
                                <input type="hidden" name="rows[${itemRowIndex}][type]" value="item">
                                <input type="hidden" name="rows[${itemRowIndex}][item_no]" value="${itemNo}">
                            
                                <select name="rows[${itemRowIndex}][drawing_measurement_id]" 
                                    class="form-control drawing_measurement_id select2">
                                   <option value="">
                                        Select Drawing Measurement
                                    </option>

                                    @foreach ($drawingMeasurements as $measurement)
                                        <option value="{{ $measurement->id }}"
                                            data-unit="{{ $measurement->unit }}">
                                            {{ $measurement->category?->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            
                            
                            <td>
                                <input type="number" name="rows[${itemRowIndex}][quantity]" class="form-control quantity" readonly step="0.001">
                            </td>

                            

                            <td>
                                <input type="text" name="rows[${itemRowIndex}][unit]" class="form-control unit" readonly>
                            </td>

                            
                            <td>
                                <button type="button" class="remove btn btn-sm btn-danger">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>`;

                $('#table-body').append(html);
                refreshNumbering();
            });

            function refreshNumbering() {
                let sectionIndex = 0;
                let itemIndex = 0;
                $('#table-body tr').each(function() {
                    let row = $(this);
                    // SECTION
                    if (row.hasClass('section-row')) {
                        sectionIndex++;
                        itemIndex = 0;

                        row.find('td:first').text(sectionIndex);
                        row.find('input[name*="[item_no]"]').val(sectionIndex);
                    }
                    // ITEM
                    if (row.hasClass('item-row')) {
                        itemIndex++;

                        let itemNo = sectionIndex + '.' + itemIndex;

                        row.find('td:first').text(itemNo);
                        row.find('input[name*="[item_no]"]').val(itemNo);
                    }
                });
                sectionCount = sectionIndex;
                currentSection = sectionIndex;
            }
            // REMOVE ITEM
            $(document).on('click', '.remove', function() {
                let row = $(this).closest('tr');
                if (row.hasClass('section-row')) {
                    let hasItems = false;
                    row.nextAll().each(function() {
                        if ($(this).hasClass('section-row')) {
                            return false;
                        }
                        if ($(this).hasClass('item-row')) {
                            hasItems = true;
                            return false;
                        }
                    });

                    // if (hasItems) {
                    //     alert('Delete items under this section first!');
                    //     return;
                    // }
                }
                row.remove();
                refreshNumbering();
                calculateTotal();
            });

        });
    </script>
@endpush
