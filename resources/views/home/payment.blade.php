@extends('layout.otherMaster')

@section('title')
    <title>Payment</title>
@endsection

@section('content')
    <!-- Payment Form Section -->
    <section class="payment-form-section layout_padding" style="margin-top: -150px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="payment-form">
                        <h2 class="main-heading">Payment Details</h2>
                        <form action="{{ route('process.payment') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name on Card</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" id="cardNumber" name="cardNumber" class="form-control" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="expiryDate">Expiry Date</label>
                                    <input type="month" id="expiryDate" name="expiryDate" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" class="form-control" pattern="\d{3}"
                                        maxlength="3" required>
                                </div>
                            </div>
                            <input type="hidden" id="selectedAppointmentId" name="selectedAppointmentId" value="">
                            <input type="hidden" id="selectedClassId" name="selectedClassId" value="">

                            <button type="submit" class="btn btn-primary">Pay Now</button>
                            <br><br><br><br><br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Payment Form Section -->

    <script>
        // Retrieve data from local storage and set it in the hidden fields before form submission
        document.addEventListener("DOMContentLoaded", function() {
            const selectedAppointmentId = localStorage.getItem('selectedAppointmentId');
            const selectedClassId = localStorage.getItem('selectedClassId');

            if (selectedAppointmentId && selectedClassId) {
                // Set the values in the hidden input fields
                document.getElementById('selectedAppointmentId').value = selectedAppointmentId;
                document.getElementById('selectedClassId').value = selectedClassId;
            }
        });
    </script>
@endsection
