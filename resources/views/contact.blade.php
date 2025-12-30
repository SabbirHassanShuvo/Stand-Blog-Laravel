@extends('layout.base')
@section('title')
    Stand Blog - Contect
@endsection
@section('content')
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('include.header')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>contact us</h4>
                            <h2>let’s stay in touch!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->


    <section class="contact-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="down-contact">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="sidebar-item contact-form">
                                    <div class="sidebar-heading">
                                        <h2>Send us a message</h2>
                                    </div>
                                    @if (session('error'))
                                        <div
                                            style="color: white;padding: 11px 29px;background: rgb(233, 13, 13);font-weight: 600;border-radius: 5px;margin-bottom: 20px;">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('sent'))
                                        <div
                                            style="color: green; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                            {{ session('sent') }}
                                        </div>
                                    @endif
                                    <div class="content">
                                        <form id="contact" action="{{ route('contect_sent') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                @error('name')
                                                    <div
                                                        style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                        {{ $message }}</div>
                                                @enderror
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="name" type="text" id="name"
                                                            placeholder="Your name">
                                                    </fieldset>
                                                </div>
                                                @error('email')
                                                    <div
                                                        style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                        {{ $message }}</div>
                                                @enderror
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="email" type="text" id="email"
                                                            placeholder="Your email">
                                                    </fieldset>
                                                </div>
                                                @error('message')
                                                    <div
                                                        style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                        {{ $message }}</div>
                                                @enderror
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <textarea name="message" rows="6" id="message" placeholder="Your Message"></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">Send
                                                            Message</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sidebar-item contact-information">
                                    <div class="sidebar-heading">
                                        <h2>contact information</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <h5>090-484-8080</h5>
                                                <span>PHONE NUMBER</span>
                                            </li>
                                            <li>
                                                <h5>info@company.com</h5>
                                                <span>EMAIL ADDRESS</span>
                                            </li>
                                            <li>
                                                <h5>123 Aenean id posuere dui,
                                                    <br>Praesent laoreet 10660
                                                </h5>
                                                <span>STREET ADDRESS</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div id="map">
                        <iframe
                            src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>


    @include('include/footer')
@endsection
