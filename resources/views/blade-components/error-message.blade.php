@if(session('error'))
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 z-[50] absolute top-1/4 -translate-y-1/2 left-1/2 -translate-x-1/2" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ session('error') }}</span>
  </div>
@endif