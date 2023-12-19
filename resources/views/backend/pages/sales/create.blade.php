@extends('backend.layouts.app')
@section('title','IMS | Add Sales')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Product -> Sales</h4>

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
                            <form action="{{ route('sales.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="product_id" class="form-label">
                                                Product Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select class="form-select" name="product_id" id="product_id">
                                                    <option selected disabled>Choose Products...</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->product_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="price-input" class="form-label">
                                                Price
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="price" class="form-control" id="price-input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="quantity" class="form-label">
                                                Quantity
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="quantity" class="form-control" id="quantity">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Sales</button>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle change event on the dropdown
        $('#product_id').change(function () {
            // Get the selected option
            var selectedOption = $(this).find('option:selected');

            // Update the price input with the data-price attribute of the selected option
            $('#price-input').val(selectedOption.data('price'));
        });
    });
</script>