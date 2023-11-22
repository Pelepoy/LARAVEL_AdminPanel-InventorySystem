@if (Session::has('success'))
<div x-data="{ show : true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="alert alert-success" role="Alert">
    <strong>{{ Session::get('success')}}</strong>
</div>
@endif