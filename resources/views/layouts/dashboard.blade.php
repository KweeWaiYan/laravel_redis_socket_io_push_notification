<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <!-- meta tags -->
      @include("layouts.partials.metas")
      <!-- Favicon -->
      <link rel="icon" type="image/png" href="/imgs/favicon/favicon.png">
      <!-- Title -->
      <title>{{ env("APP_NAME") }}</title>
      <!-- Styles -->
      <link rel="stylesheet" type="text/css" href="{{ mix('/css/dashboard/app.css') }}">
   </head>
   <body>
      <div id="app">
         <!-- -->
         <input type="hidden" id="user-id" value="{{ auth()->user()->id }}">
         <!-- navbar -->
         @include("layouts.partials.dashboard.navbar")
         <!-- Content -->
         <div class="content">
            <div class="title">
               <h3 class="mt-5">
                  You total amount is: <span id="userAmount">{{ auth()->user()->crypt_amount }}</span>
               </h3>
            </div>
            @yield("content")
         </div>
         @include('layouts.partials.form-error')
         @include('layouts.partials.footer')

         <!-- end of app -->
      </div>
      <!-- layout modal -->
      <div class="modal fade" id="layoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="layoutModalTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <ul id="layoutModalBody">
                  </ul>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- modal end -->
      <script type="text/javascript" src="{{ mix('/js/dashboard/app.js') }}"></script>
   </body>
</html>
