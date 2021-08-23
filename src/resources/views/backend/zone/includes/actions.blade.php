@if ($logged_in_user->hasAllAccess())
    <x-utils.view-button :href="route('admin.zone.show', $zone)" />
    <x-utils.edit-button :href="route('admin.zone.edit', $zone)" />
@endif

@if ($logged_in_user->hasAllAccess())
    <x-utils.delete-button :href="route('admin.zone.destroy', $zone)" />
@endif