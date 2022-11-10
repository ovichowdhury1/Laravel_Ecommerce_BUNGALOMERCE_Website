@extends('apps.backend')
@section('title', 'ADD PRODUCT')
@section('css')
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-image: url("https://i.imgur.com/GMmCQHC.png");
            background-repeat: no-repeat;
            background-size: 100% 100%
        }

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .blue-text {
            color: #00BCD4
        }

        .form-control-label {
            margin-bottom: 0
        }

        input,
        textarea,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }

        .btn-block:hover {
            color: #fff !important
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }
    </style>
@endsection
@section('main')
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-10 col-lg-10 col-12 text-center">
                <form class="form-card" onsubmit="event.preventDefault()">
                    <div class="row justify-content-between text-left my-5">
                        <div class="form-group col-sm-4 flex-column d-flex"> <label
                                class="form-control-label px-3">Catagory<span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                    onblur="validate(4)">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                </select>
                                <label for="floatingSelect">select catagory</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Sub
                                Catagory<span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                    onblur="validate(4)">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">select sub catagory</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Product
                                Type<span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                    onblur="validate(4)">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">select product type</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left mb-5">
                        <div class="form-group col-md-3 flex-column d-flex"> <label
                                class="form-control-label px-3">Brand<span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                    onblur="validate(4)">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">select brand</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3 flex-column d-flex"> <label
                                class="form-control-label px-3">manufacturer<span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                    onblur="validate(4)">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">select manufacturer</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3 flex-column d-flex"> <label
                                class="form-control-label px-3">supplier<span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                    onblur="validate(4)">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">select supplier</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3 flex-column d-flex"> <label class="form-control-label px-3">unit of
                                measure<span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                    onblur="validate(4)">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">select uom type</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left mb-5">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First
                                name<span class="text-danger"> *</span></label> <input type="text" id="fname"
                                name="fname" placeholder="Enter your first name" onblur="validate(1)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last
                                name<span class="text-danger"> *</span></label> <input type="text" id="lname"
                                name="lname" placeholder="Enter your last name" onblur="validate(2)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Business
                                email<span class="text-danger">
                                    *</span></label> <input type="text" id="email" name="email" placeholder=""
                                onblur="validate(3)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Business
                                email<span class="text-danger">
                                    *</span></label> <input type="text" id="email" name="email" placeholder=""
                                onblur="validate(3)"> </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn-block btn-primary">add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
