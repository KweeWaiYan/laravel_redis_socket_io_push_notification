<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
   <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Crypta') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!-- Left Side Of Navbar -->
         <ul class="navbar-nav mr-auto">
         </ul>
         <!-- Right Side Of Navbar -->
         <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            <li class="nav-item dropdown" >
               <a id="navbarDropdown2" class="nav-link dropdown-toggle" @click="transactionsClick" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-bell notifications-icon"></i>
                   <span class="badge badge-primary badge-pill" id="unread_notifs">{{ count(auth()->user()->unreadNotifications) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1" id="dropd_transactions">
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="{{ route('transactions') }}">See all transactions</a>
                </div>
            </li>
            <li class="nav-item dropdown">
               <a id="navbarDropdown2" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user notifications-icon"></i>
               {{ Auth::user()->username }} <span class="caret"></span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown2">
                   <a class="dropdown-item" href="{{ route('transfer') }}">Transfer</a>
                   <a class="dropdown-item" href="{{ route('transactions') }}">Transactions</a>
                   <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
               </div>
            </li>
         </ul>
      </div>
   </div>
</nav>


