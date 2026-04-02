@extends('layouts.admin-master')
@section('title', 'Manage Offers')
@section('content')


{{-- Model --}}

<div class="modal" id="addModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white-all">
                <h5 class="modal-title" id="formModal">Add Offer Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formAddOffer" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{ old('title') }}" name="title" type="text"
                                    id="title" placeholder="Title" required>
                            </div>
                        </div>
                        
                        {{-- ================================ --}}
                        {{-- =========================Coupon Code========================= --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="code">Coupon Code <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{ old('code') }}" name="code" type="text" id="code" placeholder="e.g. COMFORT1000" required>
                            </div>
                        </div>
                    
                        {{-- =========================Discount Type========================= --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="type">Discount Type <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="flat" {{ old('type') == 'flat' ? 'selected' : '' }}>Flat (₹)</option>
                                    <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Percentage (%)</option>
                                </select>
                            </div>
                        </div>
                    
                        {{-- =========================Discount Value========================= --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="value">Discount Value <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{ old('value') }}" name="value" type="number" step="0.01" id="value" placeholder="e.g. 1000 or 10" required>
                            </div>
                        </div>
                    
                        {{-- =========================Minimum Order Amount========================= --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="min_order_amount">Minimum Order Amount</label>
                                <input class="form-control" value="{{ old('min_order_amount') }}" name="min_order_amount" type="number" step="0.01" id="min_order_amount" placeholder="e.g. 5000">
                            </div>
                        </div>
                    
                        {{-- =========================Max Uses========================= --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="max_uses">Max Uses</label>
                                <input class="form-control" value="{{ old('max_uses') }}" name="max_uses" type="number" id="max_uses" placeholder="e.g. 100">
                            </div>
                        </div>
                    
                        {{-- =========================Uses Per User========================= --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="uses_per_user">Uses Per User</label>
                                <input class="form-control" value="{{ old('uses_per_user') }}" name="uses_per_user" type="number" id="uses_per_user" placeholder="e.g. 1">
                            </div>
                        </div>
                    
                        {{-- =========================Start Date========================= --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input class="form-control" value="{{ old('start_date') }}" name="start_date" type="datetime-local" id="start_date">
                            </div>
                        </div>
                    
                        {{-- =========================End Date========================= --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input class="form-control" value="{{ old('end_date') }}" name="end_date" type="datetime-local" id="end_date">
                            </div>
                        </div>
                    
                        {{-- =========================Status========================= --}}
                        <!--<div class="col-md-12">-->
                        <!--    <div class="form-group">-->
                        <!--        <label for="is_active">Status</label>-->
                        <!--        <select name="is_active" id="is_active" class="form-control">-->
                        <!--            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>-->
                        <!--            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>-->
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-md-12">
                            <div class="form-group form-check">
                                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ old('is_active', 1) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 text-danger">
                        Note : All * Mark Fields are Compulsory !
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btnSubmit">
                        <i class="fa fa-plus"></i> Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Model End --}}

<section class="section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-dark text-white-all">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                    Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Offers</li>
            <li class="breadcrumb-item"><a href="#addModal" data-toggle="modal" data-target="#addModal"><i
                        class="fas fa-plus"></i> Add Offer Title</a></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header bg-dark text-white-all">
            <h4>Manage Offers</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover datatable" style="width:100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <!--<th>Added On</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offers as $offer)
                        <tr>
                            <td>{{ $offer->id }}</td>
                            <td>{{ $offer->title }}</td>
                            <td>{{ $offer->code }}</td>
                            <td>
                                @if($offer->type == 'percent')
                                    {{ $offer->value }}%
                                @else
                                    ₹{{ number_format($offer->value, 2) }}
                                @endif
                            </td>
                            <td>
                                {{ $offer->start_date ? date('d-M-Y h:i A', strtotime($offer->start_date)) : '-' }}
                            </td>
                            <td>
                                {{ $offer->end_date ? date('d-M-Y h:i A', strtotime($offer->end_date)) : '-' }}
                            </td>
                            <td>
                                {{ $offer->is_active ? 'Active' : 'Inactive' }}
                                <!--{{ $offer->status == true ? 'Active' : 'Blocked' }}-->
                            </td>
                            <!--<td>{{ date('d-M-Y h:i A', strtotime($offer->created_at)) }}</td>-->
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('admin.offers.edit', $offer->id) }}" class="dropdown-item"
                                            title="Edit Detail">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td class="text-danger" colspan="8">
                                <h4>No Offers Found..</h4>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <!--<th>Added On</th>-->
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</section>

@endsection

@section('extrajs')
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js">
</script>
<script>
    $(document).ready(function () {
        
        $("#formAddOffer").validate({
            rules: {

                category_id: {
                    required: true
                },

                product_id: {
                    required: true
                },

                offer_product_id: {
                    required: true
                },

                offer_color_id: {
                    required: true
                },

                offer_size_id: {
                    required: true
                },

                purchase_qty: {
                    required: true
                },

                offered_qty: {
                    required: true
                },

            },
            messages: {

                category_id: {
                    required: "Please Select Category"
                },

                product_id: {
                    required: "Please Select Product"
                },

                offer_product_id: {
                    required: "Please Select Offer Product"
                },

                offer_color_id: {
                    required: "Please Select Offer Color"
                },

                offer_size_id: {
                    required: "Please Select Offer Size"
                },

                purchase_qty: {
                    required: "Please Enter Purchase Quantity"
                },

                offered_qty: {
                    required: "Please Enter Offered Quantity"
                },

            },
            submitHandler: function (form) {
                $('.btnSubmit').attr('disabled', 'disabled');
                $(".btnSubmit").html('<span class="fa fa-spinner fa-spin"></span> Loading...');
                form.submit();
            }
        });

        $('#category_id').change(function () {

            var cateID = $(this).val();

            if (cateID.length > 0) {

                $(".modal-content").LoadingOverlay("show");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    url: "{{ route('admin.offers.getProduct') }}",
                    type: 'POST',
                    data: {
                        cate_id: cateID,
                    },

                    success: function (result) {
                        var products = result.products;

                        var html = '';


                        if (products.length > 0) {

                            html += '<option value="">--Select Product--</option>';

                            products.forEach(data => {

                                html +=
                                    `<option value="${data.id}">${data.title}</option>`
                            });

                        } else {
                            html += '<option value="">No Product Found</option>';

                        }

                        $('.products').html(html);

                        $(".modal-content").LoadingOverlay("hide", true);

                    }
                });
            }

        });

        $('#product_id').change(function () {
            var prodID = $(this).val();

            if (prodID.length > 0) {

                $(".modal-content").LoadingOverlay("show");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    url: "{{ route('admin.offers.getColors') }}",
                    type: 'POST',
                    data: {
                        prod_id: prodID,
                    },

                    success: function (result) {

                        var colors = result.colors;
                        var sizes = result.sizes;

                        var html = '';
                        var sizehtml = '';

                        if (colors.length > 0) {

                            html += '<option value="">--Select Color--</option>';

                            colors.forEach(data => {

                                html +=
                                    `<option value="${data.id}">${data.color.title}</option>`
                            });

                            $('.offer_colors').html(html);

                        } else {

                            html += '<option value="">No Colors Found</option>';

                            $('.offer_colors').html(html);
                        }

                        if (sizes.length > 0) {

                            sizehtml += '<option value="">--Select Size--</option>';

                            sizes.forEach(data => {

                                sizehtml +=
                                    `<option value="${data.id}">${data.size.title}</option>`
                            });

                            $('.offer_sizes').html(sizehtml);

                        } else {

                            sizehtml += '<option value="">No Sizes Found</option>';

                            $('.offer_sizes').html(sizehtml);
                        }

                        $(".modal-content").LoadingOverlay("hide", true);
                    }
                });
            }

        });
    });

</script>
@endsection