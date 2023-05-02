@extends($activeTemplate.'layouts.frontend')

@php
    $content = getContent('about.content',true)->data_values;
@endphp

@section('content')
@include($activeTemplate.'partials.breadcrumb')

  <section class="pt-60 pb-10">
    <div class="container">
      
      <div class="row justify-content-center pb-60 text-center">
       
      <p>{{__(@$content->summery)}}</p>
      
    </div>
    
    </div>
  </section>
  @endsection
