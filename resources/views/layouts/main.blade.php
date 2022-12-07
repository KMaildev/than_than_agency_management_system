@include('layouts.includes.header')
@include('layouts.includes.top')
@include('layouts.includes.menu')
@include('layouts.includes.alert')

<div class="container-xxl flex-grow-1 container-p-y">
    @yield('content')
</div>

@include('layouts.includes.footer')
