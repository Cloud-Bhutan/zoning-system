<div>
    <input type="text" wire:model="mobile_no" />

    @if($householdDetails)
    <ul>
        @foreach($householdDetails as $householdDetail)
        <li>
            {{ $householdDetail->mobile_number }}
        </li>
        @endforeach
    </ul>
    {{ $householdDetails->onEachSide(1)->links() }}
    @endif
</div>
