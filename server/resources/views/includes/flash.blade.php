@if(Session::has('flash'))
@php
  $flash = Session::get('flash');   
@endphp
<div id="flash-wrapper" class="card m-5 animated bounceInDown" style="width:fit-content;position:absolute;left:50%;transform:translate(-50%);">
  <div class="card-content flex items-center justify-center" style="padding:1rem;">
    @if($flash['type'] === 'error')
      <i class="fas fa-times-circle fa-2x text-red mr-3"></i>
    @elseif($flash['type'] === 'warning')
      <i class="fas fa-exclamation-triangle fa-2x text-yellow mr-3"></i>
    @else
      <i class="fas fa-check-circle fa-2x text-green mr-3"></i>
    @endif
    <p class="text-lg">{{ $flash['text'] }}</p>
  </div>
</div>
@endif