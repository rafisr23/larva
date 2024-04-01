<x-layout.default>
    <x-slot name="title">{{ $title }}</x-slot>

    <div>
        <div class="grid gap-6 mb-6">
            <div class="panel">
                <div class="tems-center justify-between">
                    <h5 class="font-semibold text-xl">Contact List</h5>
                    {{-- <p class="text-xs">* Is Required</p> --}}
                </div>
            </div>
            <div class="panel">
                <div class="md:flex">
                    <form action="{{ route('admin.contact.store') }}" method="POST" class="flex-grow" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="contact_id" value="{{ isset($contact->id) ? encrypt($contact->id) : '' }}">
                        <div class="mt-4 @error('address') has-error @enderror">
                            <label for="address">Address <sup class="text-danger">*</sup></label>
                            <textarea id="address" name="address" class="form-textarea" placeholder="Enter Address">{{ old('address', isset($contact->address) ? $contact->address : '') }}</textarea>
                            @error('address')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-4 mt-4">
                            <div class="@error('city') has-error @enderror">
                                <label for="city">City<sup class="text-danger">*</sup></label>
                                <input id="city" name="city" type="text" placeholder="Enter City" class="form-input" value="{{ old('city', isset($contact->city) ? $contact->city : '') }}"/>
                                @error('city')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('country') has-error @enderror">
                                <label for="country">Country <sup class="text-danger">*</sup></label>
                                <input id="country" name="country" type="text" placeholder="Enter Country" class="form-input" value="{{ old('country', isset($contact->country) ? $contact->country : '') }}" />
                                @error('country')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('postal_code') has-error @enderror">
                                <label for="postal_code">Postal Code <sup class="text-danger">*</sup></label>
                                <input id="postal_code" name="postal_code" type="text" placeholder="Enter Postal Code" class="form-input" value="{{ old('postal_code', isset($contact->postal_code) ? $contact->postal_code : '') }}"/>
                                @error('postal_code')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('telephone') has-error @enderror">
                                <label for="telephone">Telephone</label>
                                <input id="telephone" name="telephone" type="text" placeholder="Enter Telephone" class="form-input" value="{{ old('telephone', isset($contact->telephone) ? $contact->telephone : '') }}"/>
                                @error('telephone')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('phone') has-error @enderror">
                                <label for="phone">Phone Number <sup class="text-danger">*</sup></label>
                                <input id="phone" name="phone" type="text" placeholder="Enter Phone Number" class="form-input" value="{{ old('phone', isset($contact->phone) ? $contact->phone : '') }}" />
                                @error('phone')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('email') has-error @enderror">
                                <label for="email">Email <sup class="text-danger">*</sup></label>
                                <input id="email" name="email" type="email" placeholder="Enter Email" class="form-input" value="{{ old('email', isset($contact->email) ? $contact->email : '') }}"/>
                                @error('email')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('instagram') has-error @enderror">
                                <label for="instagram">Instagram <sup class="text-danger">*</sup></label>
                                <input id="instagram" name="instagram" type="instagram" placeholder="Enter instagram" class="form-input" value="{{ old('instagram', isset($contact->instagram) ? $contact->instagram : '') }}"/>
                                @error('instagram')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="@error('youtube') has-error @enderror">
                                <label for="youtube">Youtube <sup class="text-danger">*</sup></label>
                                <input id="youtube" name="youtube" type="youtube" placeholder="Enter youtube" class="form-input" value="{{ old('youtube', isset($contact->youtube) ? $contact->youtube : '') }}"/>
                                @error('youtube')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="!mt-8 flex">
                            <a href="{{ route('admin.contact.index') }}" class="btn btn-warning w-24 me-1">Back</a>
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        animation: true,
                        showConfirmButton: false,
                        timer: 3000,
                        customClass: {
                            popup: 'color-success'
                        },
                        showCloseButton: true,
                        target: document.getElementById('toast')
                    });
                    toast.fire({
                        icon: 'success',
                        title: "{{ session('success') }}",
                        padding: '10px 20px'
                    });
                @endif
            });
        });
        
        
    </script>
</x-layout.default>