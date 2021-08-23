
@if ($logged_in_user->hasAllAccess())
    <x-utils.view-button :href="route('admin.dzongkhag.show', $dzongkhag)" />
    <x-utils.edit-button :href="route('admin.dzongkhag.edit', $dzongkhag)" />
@endif

@if ($logged_in_user->hasAllAccess())
    <x-utils.delete-button :href="route('admin.dzongkhag.destroy', $dzongkhag)" />
@endif