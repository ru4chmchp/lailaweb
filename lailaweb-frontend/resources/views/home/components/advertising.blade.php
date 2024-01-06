 <!-- Grid column -->
 @foreach ($newsletters as $key => $item)
     <div class=" {{ $key == 0 ? 'col-lg-8 mb-3 mb-md-4 pb-lg-2' : 'col-lg-4 mb-4' }} col-md-12">

         <!-- Image -->
         <div class="view zoom z-depth-1 {{ $key != 0 ? 'photo' : '' }}">
             @php
                 $baseUrl = config('app.baseUrl');
             @endphp
             <img src="{{ asset($baseUrl . $item->image_path) }}" class="img-newsletter" alt="sample image">

             <div class="mask">

                 <div
                     class="{{ $key == 0 ? 'light-blue-text  d-flex align-items-center pt-4 ml-lg-3 ml-3 pl-lg-3 pl-md-5 pl-3' : 'white-text flex-start text-center' }}">

                     <div>



                         <h2 class="card-title font-weight-bold pt-5 title-h2"><strong>{{ $item->name }}</strong></h2>

                         <p class="title-content">{{ $item->content }}</p>


                     </div>

                 </div>

             </div>

         </div>
         <!-- Image -->

     </div>
 @endforeach
