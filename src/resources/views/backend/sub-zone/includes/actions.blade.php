@if ($logged_in_user->hasAllAccess())
    <x-utils.view-button :href="route('admin.sub-zone.show', $sub_zone)" />
    <x-utils.edit-button :href="route('admin.zone.edit', $sub_zone)" />
@endif

@if ($logged_in_user->hasAllAccess())
    <x-utils.delete-button :href="route('admin.sub-zone.destroy', $sub_zone)" />
@endif