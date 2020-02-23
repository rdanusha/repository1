@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Clothe</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 order-md-1">
                                @include('layouts.flash-message')
                                <form method="post" id="clothes_form"
                                      class="needs-validation "
                                      data-parsley-validate=""
                                      novalidate=""
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text"
                                               class="form-control {{($errors->first('name')?'is-invalid':'')}}"
                                               value="{{ old('name')  }}" name="name" id="name" placeholder=""
                                               required="">
                                        @if( $errors->first('name'))
                                            <div class="invalid-feedback">{{  $errors->first('name') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="product-code">Product Code</label>
                                        <input type="text"
                                               class="form-control {{($errors->first('product_code')?'is-invalid':'')}}"
                                               name="product_code"
                                               id="product_code" placeholder="" required=""
                                               value="{{ old('product_code')  }}">
                                        @if( $errors->first('product_code'))
                                            <div class="invalid-feedback">{{  $errors->first('product_code') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="description">Short Description</label>
                                        <textarea
                                            class="form-control {{($errors->first('description')?'is-invalid':'')}}"
                                            name="description"
                                            id="description">{{ old('description')  }}</textarea>
                                        @if( $errors->first('description'))
                                            <div class="invalid-feedback">{{  $errors->first('description') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="cost">Cost</label>
                                        <input type="text"
                                               class="form-control {{($errors->first('cost')?'is-invalid':'')}}"
                                               name="cost"
                                               id="cost" placeholder="" required="" value="{{ old('cost')  }}">
                                        @if( $errors->first('cost'))
                                            <div class="invalid-feedback">{{  $errors->first('cost') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="color">Color</label>
                                        <input type="text"
                                               class="form-control {{($errors->first('color')?'is-invalid':'')}}"
                                               name="color"
                                               id="color" placeholder="" required="" value="{{ old('color')  }}">
                                        @if( $errors->first('color'))
                                            <div class="invalid-feedback">{{  $errors->first('color') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="size">Size</label>
                                        <input type="text"
                                               class="form-control {{($errors->first('size')?'is-invalid':'')}}"
                                               name="size"
                                               id="size" placeholder="" required="" value="{{ old('size')  }}">
                                        @if( $errors->first('size'))
                                            <div class="invalid-feedback">{{  $errors->first('size') }}</div>
                                        @endif
                                    </div>

                                    <hr class="mb-4">
                                    <div class="mb-3 ">
                                        <label for="brand">Brand</label>

                                    </div>
                                    <hr class="mb-4">
                                    <div class="col-3">
                                        <hr class="mb-2">
                                        <button class="btn btn-primary btn-lg btn-block" id="submit-button"
                                                type="submit">
                                            Submit
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $(function () {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $('#clothes_form').submit(function (e) {
                e.preventDefault();
                // $('#clothes_form').parsley();
                if ($(this).parsley().isValid()) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('clothes.store')}}",
                        success: function (data) {
                            toastr.options = {"positionClass": "toast-top-center"};
                            toastr.success(data.success)
                            $('#clothes_form').trigger("reset");
                            $('#clothes_form').parsley().reset();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    </script>
@endsection
