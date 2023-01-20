@extends('layouts.default')
@section('title', 'ContactUs')

@section('content')
<section class="bg-gray-100 pt-2">
  <div class="container mx-auto">
    <p class="text-left px-4 pt-2 text-gray-400"><a href="#" class="text-blue-600 hover:underline">Home</a><span class="px-2">&gt</span>Contact Us</p>
    <h1 class="mt-2 text-4xl font-bold font-heading h-40 text-center p-12">Contact Us</h1>
  </div>
</section>

<section class="mt-20 pb-24">
  <div class="w-192 mx-auto">
    <p class="text-left">Please fill out the form below and submit.<br>
      We will usually reply to your e-mail address within 3 business days of your inquiry.<br>
      In addition, Please check your settings in advance so that you can receive replies from info@anifo.com
    </p>
    <div class="mt-8">
      <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
      @if($errors->any())
      <div class="mb-8 py-4 px-6 border border-pink-300 bg-pink-50 rounded">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
      </div>
      @endif
      <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->

      <form action="{{ route('contact') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-left p-1 my-1 font-medium">Name<span class="text-white text-xs bg-yellow-400 mx-2 py-1 px-2">required</span></label>
          <input id="name" class="w-full p-4 text-xs leading-none bg-blueGray-50 rounded outline-none border" type="text" placeholder="ex.) John Doe" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
            <p class="text-red-400">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="mb-4">
          <label for="phone" class="block text-left p-1 my-1 font-medium">Phone</label>
          <input id="phone" class="w-full p-4 text-xs leading-none bg-blueGray-50 rounded outline-none border" type="text" placeholder="ex.) 0312345678" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-left p-1 my-1 font-medium">E-mail<span class="text-white text-xs bg-yellow-400 mx-2 py-1 px-2">required</span></label>
          <input id="email" class="w-full p-4 text-xs leading-none bg-blueGray-50 rounded outline-none border" type="email" placeholder="info@example.com" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-4">
          <label for="body" class="block text-left p-1 my-1 font-medium">Contact Description<span class="text-white text-xs bg-yellow-400 mx-2 py-1 px-2">required</span></label>
          <textarea id="body" class="w-full h-24 p-4 text-xs leading-none resize-none bg-blueGray-50 rounded outline-none border" type="text" placeholder="Please feel free to fill in the form." name="body">{{ old('body') }}</textarea>
        </div>
        <div class="text-center">
            <p>By submitting your information, you agree to the <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a></p>
            <button class="mt-6 text-white font-semibold leading-none bg-blue-600 hover:bg-blue-700 rounded py-4 px-12" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
