@extends('layouts.default')
@section('title', 'Inquiry Completed')

@section('content')
@include('layouts.app')
        <section>
          <div class="container mx-auto">
            <h1 class="mt-2 text-4xl font-bold font-heading h-40 text-center p-12">Your inquiry has been completed.</h1>
          </div>
        </section>

        <section class="mt-20 pb-64">
          <div class="container mx-auto text-center ">
            <p class="inline-block text-left">Thank you for your inquiry.<br>
            We will usually reply to your e-mail address within 3 business days of your inquiry. <br>
            We apologize for the inconvenience, but please be patient. <br>
            Please check your settings so that you can receive replies from info@anifo.com <br>
            An acceptance email will be sent to the email address you entered. <br>
            If you do not receive a completion email, the process may not have been successful. <br>
            We apologize for the inconvenience, but please follow the inquiry procedure again.
            </p>

            <p class="pt-10">Return to<a href="/" class="text-blue-600 hover:underline">Top Page</a></p>
          </div>
        </section>
@endsection
