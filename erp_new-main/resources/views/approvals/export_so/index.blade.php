@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Export SO List
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>id</th>
                        <th class="pl-7"><span class="text-dark-75">No.</span></th>
                        <th class="pl-7"><span class="text-dark-75">SO Date</span></th>
                        <th class="pl-7"><span class="text-dark-75">SO No</span></th>
                        <th class="pl-7"><span class="text-dark-75">Buyer Name</span></th>
                        <th class="pl-7"><span class="text-dark-75">Sort No.</span></th>
                        <th class="pl-7"><span class="text-dark-75">Quality</span></th>
                        <th class="pl-7"><span class="text-dark-75">Order Quantity</span></th>
                        <th class="pl-7"><span class="text-dark-75">Delivery Date</span></th>
                        <th class="pl-7"><span class="text-dark-75">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($buyers))
                        @foreach ($buyers as $key => $buyer)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $buyer->name }}</td>
                                <td>{{ $buyer->no }}</td>
                                <td>{{ $buyer->country }}</td>
                                <td>{{ $buyer->state }}</td>
                                <td>{{ $buyer->city }}</td>
                                <td>{{ $buyer->address }}</td>
                                <td>{{ $buyer->pincode }}</td>
                                <td>{{ $buyer->representative }}</td>
                                <td>{{ $buyer->created_in }}</td>
                                <td>{{ $buyer->status }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('buyers.edit', $buyer->id) }}"
                                        class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                        <i class="la la-edit"></i>
                                    </a>
                                    {{ html()->form('DELETE', '/buyers/' . $buyer->id)->open() }}
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
    <script src="assets/js/datatables/invoice_settings.js"></script>
@endpush
