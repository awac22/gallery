@php
$breadcrumb = getContent('breadcrumb.content',true)
@endphp
<section class="inner-hero bg_img" data-background="{{getImage('assets/images/frontend/breadcrumb/'.$breadcrumb->data_values->background_image,'1920x1080')}}">
<div class="container">
<div class="row justify-content-center">
  <div class="col-lg-6 text-center">
    <h2 class="inner-hero__title">
    @if($page_title =='About')      
        About Gallery   
    @else
        {{trans($page_title??'')}}
    @endif  
    </h2>
  </div>
</div>
</div>
</section>