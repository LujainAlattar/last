@extends('layout.otherMaster')
@section('title')
    <title>Contact</title>
@endsection


@section('header-style')
<style>
    .form-error {
        color: red;
    }
</style>

@endsection

@section('content')
    <!-- contact section -->

    <section class="contact_section layout_padding">
        <div class="container">

            <h2 class="main-heading">
                Contact Now

            </h2>
            <p class="text-center">
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla

            </p>
            <div class="">
                <div class="contact_section-container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="contact-form">
                                <form action="{{ route('contact.store') }}" method="POST" id="contact-form">
                                    @csrf
                                    <div>
                                        <input type="text" name="name" id="name" placeholder="Name">
                                        <p class="form-error" id="name-error"></p>
                                    </div>
                                    <div>
                                        <input type="email" name="email" id="email" placeholder="Email">
                                        <p class="form-error" id="email-error"></p>
                                    </div>
                                    <div>
                                        <input type="text" name="message" id="message" placeholder="Message" class="input_message">
                                        <p class="form-error" id="message-error"></p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn_on-hover">
                                            Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- end contact section -->
@endsection
@section('script-content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const messageInput = document.getElementById('message');

            form.addEventListener('submit', function(event) {
                let valid = true;

                // Reset error messages
                document.querySelectorAll('.form-error').forEach(function(errorElement) {
                    errorElement.textContent = '';
                });

                // Validate name
                if (nameInput.value.trim() === '') {
                    valid = false;
                    document.getElementById('name-error').textContent = 'Name is required';
                }

                // Validate email
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailInput.value)) {
                    valid = false;
                    document.getElementById('email-error').textContent = 'Invalid email format';
                }

                // Validate message
                if (messageInput.value.trim() === '') {
                    valid = false;
                    document.getElementById('message-error').textContent = 'Message is required';
                }

                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
<!-- end google map js -->
