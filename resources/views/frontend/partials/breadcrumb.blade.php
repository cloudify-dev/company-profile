 <!--==============================
                    Breadcumb
                ==============================-->
 <div class="breadcumb-wrapper" data-bg-src="{{ asset($bgImage ?? 'assets_frontend/assets/img/bg/breadcumb-bg.jpg') }}">
     <div class="container">
         <div class="breadcumb-content">
             <h1 class="breadcumb-title">{{ $title ?? 'Page Title' }}</h1>
             <ul class="breadcumb-menu">
                 <li><a href="{{ url('/') }}">Home</a></li>
                 @if (isset($breadcrumb) && is_array($breadcrumb))
                     @foreach ($breadcrumb as $item)
                         <li>
                             @if (isset($item['url']))
                                 <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                             @else
                                 {{ $item['label'] }}
                             @endif
                         </li>
                     @endforeach
                 @else
                     <li>{{ $title ?? 'Page Title' }}</li>
                 @endif
             </ul>
         </div>
     </div>
 </div>
