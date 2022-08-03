@component('mail::message')
<div class="d-block" style="direction: rtl; text-align: center;">
{{ $name }} عزیز!
<br>
# ایمیل خود را تایید کنید
</div>
@component('mail::button', ['url' => $link])
تایید ایمیل
@endcomponent
با تشکر<br>
F4KH4R!1
@endcomponent
