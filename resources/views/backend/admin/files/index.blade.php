@extends('layouts.admin-master')
@section('title', 'Manage Files')
@section('content')

{{-- Model --}}

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white-all">
                <h5 class="modal-title" id="formModal">Add File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" href="{{route('admin.files.save')}}" role="form" class="needs-validation" id="formAddFile" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type">Type <span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="images">Images</option>
                                        <option value="files">Files</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="folder">Folder <span class="text-danger">*</span></label>
                                    <select name="folder" id="folder" class="form-control">
                                        <option value="products">Product</option>
                                        <option value="multi-products">Multi Products</option>
                                        <option value="sliders">Slider</option>
                                        <option value="categories">Category</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="file">File <span class="text-danger">*</span></label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12 text-danger">
                                Note : All * Mark Fields are Compulsory !
                            </div>
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
</div>

{{-- Model End --}}

<section class="section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-dark text-white-all">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                    Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Manage Files </li>
            <li class="breadcrumb-item"><a href="#addModal" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add Files </a></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header bg-dark text-white-all">
            <h4>Manage Files</h4>
            <p><strong>Note: </strong> copy the file name</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover datatable" style="width:100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Folder Location</th>
                            <th>File Name</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($files as $key => $file)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{!! pathinfo($file)['dirname'] !!}</td>
                            <td>
                                {!! pathinfo($file)['basename'] !!}
                            </td>
                            <td>
                                <a href="{!! asset('storage/'. $file) !!}" target="_blank">
                                    click here to view
                                </a>
                            </td>
                        </tr>

                        @empty
                        <tr class="text-center">
                            <td class="text-danger" colspan="6">
                                <h4>No Record Found..</h4>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Folder Location</th>
                            <th>File Name</th>
                            <th>Link</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</section>

<form id="formDelete" method="POST" action="{{ route('admin.files.delete') }}">
    @csrf

    <input type="hidden" name="faq_id" id="txtFaqID">
</form>
@endsection

@section('extrajs')
<script>
    $(document).ready(function() {


        $("#formAddFile").validate({
            rules: {

                question: {
                    required: true
                },

                answer: {
                    required: true
                },
            },
            messages: {

                question: {
                    required: "Please Enter Question"
                },

                answer: {
                    required: "Please Enter Answer"
                },
            },
            submitHandler: function(form) {
                $('.btnSubmit').attr('disabled', 'disabled');
                $(".btnSubmit").html('<span class="fa fa-spinner fa-spin"></span> Loading...');
                form.submit();
            }
        });

        $(".delete-object").click(function() {
            if (window.confirm(
                    "Are you sure, You want to Delete ? ")) {
                $("#txtFaqID").val($(this).attr("data-obj-id"));
                $("#formDelete").submit();
                $(this).attr('disabled', 'disabled');
                $(this).html('<span class="fa fa-spinner fa-spin"></span> Loading...');
            }
        });
    });
</script>
@endsection