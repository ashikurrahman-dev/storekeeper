@extends('backend.layouts.app')
@section('title','IMS | Add Product')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Product -> Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('product.index') }}" class="btn btn-success"
                                            id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Back</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label">
                                                Product Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label">
                                                Price
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label">
                                                Quantity
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="stock" class="form-control" value="{{ old('stock') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label">
                                                Product Thumbnail
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" name="thumbnail" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label"> 
                                                Short Description
                                            </label>
                                            <input type="text" name="short_desc" class="form-control" value="{{ old('short_desc') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label">
                                                Description
                                            </label>
                                            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->   

    <!-- Add Color Pop-up End  -->
    @include('backend.layouts.footer')

</div>
<!-- end main content-->

@endsection