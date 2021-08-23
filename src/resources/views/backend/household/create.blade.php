<x-forms.post :action="route('admin.household.update',[$household[0]->id])">
    <x-backend.card>
        <x-slot name="body">
            <div>
                <div class="form-group row font-weight-bold">
                    <label for="name" class="col-md-3 col-form-label">@lang('Zone')</label>
                    <div class="col-md-9">
                        <label>{{$household[0]->building->subzone->zone->name}}</label>
                    </div>
                </div>
                <div class="form-group row font-weight-bold">
                    <label for="name" class="col-md-3 col-form-label">@lang('Sub Zone')</label>
                    <div class="col-md-9">
                        <label>{{$household[0]->building->subzone->name}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('Name of Head of Family')</label>
                    <div class="col-md-9">
                        <input type="text" required name="name" autocomplete="off" value="{{$household[0]->name}}" class="form-control" placeholder="{{ __('Name') }}"  maxlength="100" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('Total Female Member')</label>
                    <div class="col-md-9">
                        <input type="number" required  autocomplete="off" name="total_female" class="form-control" placeholder="{{ __('Total Female') }}" value="{{$household[0]->total_female}}" maxlength="100" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('Total Male Member')</label>
                    <div class="col-md-9">
                        <input type="number" required  autocomplete="off" name="total_male" class="form-control" placeholder="{{ __('Total Male') }}" value="{{$household[0]->total_male}}" maxlength="100" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('Total Member Below Age 10')</label>
                    <div class="col-md-9">
                        <input type="number" required  autocomplete="off" name="total_below_10" class="form-control" placeholder="{{ __('Total below 10') }}" value="{{$household[0]->total_below_10}}" maxlength="100" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('Total Member Above Age 60')</label>
                    <div class="col-md-9">
                        <input type="number" required autocomplete="off" name="total_above_60" class="form-control" placeholder="{{ __('Total above 60') }}" value="{{$household[0]->total_below_10}}" maxlength="100" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('Emergency Contact No.')</label>
                    <div class="col-md-9">
                        <input type="text"  required autocomplete="off" name="emergency_contact_no" class="form-control" placeholder="{{ __('Emergency contact no.') }}" value="{{$household[0]->emergency_contact_no}}" maxlength="100" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('Nationality')</label>
                    <div class="col-md-9">
                        <select name="nationality" required="required" class="form-control">
                            <option value="">Select Nationality</option>
                            <option value="Bhutanese" <?php if($household[0]->nationality=='Bhutanese'){echo 'selected';}?>>Bhutanese National</option>
                            <option value="Foreign" <?php if($household[0]->nationality=='Foreign'){echo 'selected';}?>>Foreign National</option>
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="text-center">
                <button class="btn btn-sm btn-primary col-lg-2" type="submit">@lang('Save')</button>
            </div>
        </x-slot>
    </x-backend.card>
</x-forms.post>