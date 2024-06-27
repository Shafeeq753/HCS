@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    JOBWORK FABRIC INWARD REPORT
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>SL NO</th>
                        <th class="pl-7"><span class="text-dark-75">DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">CONTTRACT NO</span></th>
                        <th class="pl-7"><span class="text-dark-75">SLIP NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">ENT NO</span></th>
                        <th class="pl-7"><span class="text-dark-75">PARTY NAME</span></th>
                        <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                        <th class="pl-7"><span class="text-dark-75">PIECE NO</span></th>
                        <th class="pl-7"><span class="text-dark-75">INWARD MTR</span></th>
                        <th class="pl-7"><span class="text-dark-75">INSPECTION MTR</span></th>
                        <th class="pl-7"><span class="text-dark-75">REJECTED</span></th>
                        <th class="pl-7"><span class="text-dark-75">EXCEE/SHORTAGE MTR</span></th>
                        <th class="pl-7"><span class="text-dark-75">BALE NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">CHALLAN NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">REMARKS</span></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($certifications))
                        @foreach ($certifications as $key => $certification)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $certification->name }}</td>
                                <td>{{ $certification->status }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('certification.edit', $certification->id) }}"
                                        class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                        <i class="la la-edit"></i>
                                    </a>
                                    {{ html()->form('DELETE', '/certification/' . $certification->id)->open() }}
                                    <button type="submit" class="btn btn-danger btn-sm btn-clean btn-icon ml-3"
                                        title="Delete">
                                        <i class="la la-trash"></i>
                                    </button>
                                    {{ html()->form()->close() }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="assets/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/js/datatables/certifications.js"></script>
@endpush
