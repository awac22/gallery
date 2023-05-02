@php
$footer = getContent('footer.content',true);
$footerElement = getContent('footer.element',false);
$policies = getContent('policy.element',false,'',1);

@endphp



<footer class="bg--title">
  <div class="container">
      <div class="footer-top pt-80 pb-80">
          <div class="footer-logo">
            <a href="{{route('home')}}">
              <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('image')">
            </a>
          </div>
          <p>        
		      @php echo $footer->data_values->summery @endphp
		  <div class="footer_menu">
		  <ul class="nav">
            <li> 
			<a href="{{route('home')}}">@lang('Home')</a>
			</li>
            <li class=""><a href="{{route('view.all')}}">@lang('Photos')</a>
            </li>
              @auth
              @if (auth()->user()->con_flag==1)
              <li><a href="{{route('contributor.image.upload')}}">@lang('Upload')</a></li>
              @endif
            
              @if (auth()->user()->follows->count()!=0)
              <li><a href="{{route('user.feed')}}">@lang('Feed')</a></li>
              @endif

              @endauth
             
               @foreach($pages as $k => $data)
               <li><a href="{{route('pages',[$data->slug])}}">{{trans($data->name)}}</a></li>
               @endforeach
               <li><a href="{{route('faq')}}">@lang('Faq')</a></li>
           
               @guest
               <li><a href="https://anywhereanycity.com/support/">Support</a></li>
               @endguest

              @auth
              <li><a href="{{route('ticket')}}">@lang('Support')</a></li>
              @endauth

              <li><a href="{{url('view/all/photos') }}">@lang('Explore')</a>
              <li><a href="https://anywhereanycity.com/home/newsletter">Subscribe Newsletter</a>
              <li><a href="https://anywhereanycity.com/gallery/contact">Contact Us</a>
               @foreach ($policies as $policy)
              <li><a href="{{route('links',[slug($policy->data_values->title), $policy->id])}}">{{__($policy->data_values->title)}}</a></li>
            @endforeach
              </li>
            </ul></div>
        
      </div>
      <div class="footer-bottom d-flex flex-wrap-reverse justify-content-between align-items-center py-3">
          <div class="copyright">
         <!--  @lang(' Copyright') © {{date('Y')}} | @lang('All Right Reserved by') <a href="{{url('home')}}" class="base--color">{{$general->sitename}}</a>
            -->
			© {{date('Y')}} All Rights Reserved by AnywhereAnycity.Com LLC
          </div>
          <ul class="social-icons">
              @foreach ($footerElement as $item)
                <li><a href="{{$item->data_values->link}}" target="_blank">@php echo $item->data_values->social_icon @endphp</a></li>
              @endforeach
          </ul>
      </div>
  </div>
</footer>


@push('script')

<script>
    'use strict'
    $('#subscribe').on('click',function(){
     var url = '{{route("subscribe")}}'
      var data = {
        email : $('#email').val(),
      }
      axios.post(url,data, {
      headers: {
        'Content-Type': 'application/json',
      }

      })
      .then(function (response) {
      $('#email').val('');

        if(response.data.error){
          iziToast.error({message:response.data.error, position: "topRight"})
        }

        iziToast.success({message:response.data.success, position: "topRight"})

      })
      .catch(function (error) {
        console.log(error);
      })
    })
</script>

@endpush


 