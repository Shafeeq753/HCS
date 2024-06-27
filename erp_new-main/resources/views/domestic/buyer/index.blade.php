@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Domestic Buyer List
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{route('domestic.buyer.create')}}"
                    class="btn btn-primary font-weight-bolder mr-2">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span> Add
                </a>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>id</th>
                        <th class="pl-7"><span class="text-dark-75">Buyer Name</span></th>
                        <th class="pl-7"><span class="text-dark-75">Buyer No.</span></th>
                        <th class="pl-7"><span class="text-dark-75">Country</span></th>
                        <th class="pl-7"><span class="text-dark-75">State</span></th>
                        <th class="pl-7"><span class="text-dark-75">City</span></th>
                        <th class="pl-7"><span class="text-dark-75">Address</span></th>
                        <th class="pl-7"><span class="text-dark-75">Pin Code</span></th>
                        <th class="pl-7"><span class="text-dark-75">Representative Name</span></th>
                        <th class="pl-7"><span class="text-dark-75">Created In</span></th>
                        <th class="pl-7"><span class="text-dark-75">Status</span></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @if (!empty($buyers))
                    @foreach ($buyers as $key => $buyer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $buyer->name }}</td>
                            <td>{{ $buyer->gst }}</td>
                            <td>{{ $buyer?->country?->name }}</td>
                            <td>{{ $buyer?->state?->name }}</td>
                            <td>{{ $buyer?->city?->name }}</td>
                            <td>{{ $buyer->address_1 }}</td>
                            <td>{{ $buyer->buyer_pincode }}</td>
                            <td>@foreach($buyer->representatives as $item)
                                @if($loop->first)
                                        {{ $item->representative_name }}
                                    @endif
                            @endforeach</td>
                            <td></td>
                            <td>{{ $buyer->is_active }}</td>
                            <td class="d-flex">
                                <a href="{{ route('domestic.buyer.edit', $buyer->id) }}"
                                   class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                    <i class="la la-edit"></i>
                                </a>
                                {{ html()->form('DELETE', '/domestic/buyer/' . $buyer->id)->open() }}
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

    <div class="modal fade" id="addCertificationModel" tabindex="-1" role="dialog"
        aria-labelledby="addCertificationModelLabel" aria-hidden="true">
        {{ html()->form('POST', '/certification')->open() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Certification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                placeholder="Enter Name" value="{{ old('name') }}" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label>Status:</label>
                            <div class="col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" name="status" checked="checked" value="1" />
                                        <span></span>
                                        Active
                                    </label>
                                    <label class="radio radio-danger">
                                        <input type="radio" name="status" value="0" />
                                        <span></span>
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
@endsection

@push('scripts')
    <script src="assets/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/js/datatables/certifications.js"></script>
@endpush
