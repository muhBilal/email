<div id="hs-application-sidebar" class="hs-overlay  [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-[260px] h-full
    hidden
    fixed inset-y-0 start-0 z-[60]
    bg-white border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
    dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
      <div class="px-6 pt-4">
        <!-- Logo -->
        <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="#" aria-label="Radnet">
          <img src="{{ asset('images/radnet-logo.webp') }}" alt="">
        </a>
        <!-- End Logo -->
      </div>

      <!-- Content -->
      <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
          <ul class="flex flex-col space-y-1">
              <li>
                  <a href="{{ route('emailIndex') }}"
                      class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg 
                      {{ request()->routeIs('emailIndex') ? 'bg-orange-500 text-white' : 'text-gray-800' }}
                      hover:{{ request()->routeIs('emailIndex') ? 'bg-orange-500' : 'bg-gray-100' }}
                      focus:outline-none">
                      <i class="fas fa-users mr-2"></i>
                      Clients
                  </a>
              </li>
              <li>
                  <a href="{{ route('email-template') }}"
                      class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg 
                      {{ request()->routeIs('email-template') ? 'bg-orange-500 text-white' : 'text-gray-800' }}
                      hover:{{ request()->routeIs('email-template') ? 'bg-orange-500' : 'bg-gray-100' }}
                      ">
                      <i class="fas fa-book mr-2"></i>
                      Template
                  </a>
              </li>
          </ul>
      </nav>
      </div>
      <!-- End Content -->
    </div>
  </div>