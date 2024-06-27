@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    WEFT REQUIREMENT REPORT
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>JW SO NO</th>
                        <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                        <th class="pl-7"><span class="text-dark-75">SORDER MTR.</span></th>
                        <th class="pl-7"><span class="text-dark-75">BEAM MTR</span></th>
                        <th class="pl-7"><span class="text-dark-75">EXPECTED MTR</span></th>
                        <th class="pl-7"><span class="text-dark-75">WEAVER</span></th>
                        <th class="pl-7"><span class="text-dark-75">WEFT</span></th>
                        <th class="pl-7"><span class="text-dark-75">WEFT CON. PER MTR</span></th>
                        <th class="pl-7"><span class="text-dark-75">TOTAL WEFT REQ</span></th>
                        <th class="pl-7"><span class="text-dark-75">TOTAL WEFT ISSUE</span></th>
                        <th class="pl-7"><span class="text-dark-75">TOTAL WEFT RECIEVED</span></th>
                        <th class="pl-7"><span class="text-dark-75">WEFT BALANCE(YARN TO GIVE)</span></th>
                        <th class="pl-7"><span class="text-dark-75">WEFT BALANCE</span></th>
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