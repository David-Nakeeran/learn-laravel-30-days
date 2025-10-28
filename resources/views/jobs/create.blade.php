<x-layout>
    <x-slot:heading>
    Create Job
    </x-slot:heading>

<form method="POST" action="/jobs">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
      <h2 class="text-base/7 font-semibold text-white">Create a New Job</h2>
      <p class="mt-1 text-sm/6 text-gray-400">We just need a handle of details from you.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <x-form-label for="title">Title</x-form-label>
          <div class="mt-2">
            <x-form-input name="title" id="title" placeholder="CEO" required/>
            <x-form-error name="title"/>
          </div>
          <div class="col-span-full">
          <div class="sm:col-span-4">
          <x-form-label for="salary">Salary</x-form-label>

          <div class="mt-2">
              <x-form-input name="salary" id="salary" placeholder="£30,000" required/>
              <x-form-error name="salary"/>
            </div>
            {{-- @error('salary')
                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
              @enderror --}}
          </div>
        </div>
        </div>

        
      </div>
      {{-- <div class="mt-10">
        @if($errors->any())
          <ul>
            @foreach ($errors->all() as $error )
            <li class="text-red-500 italic">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
      </div> --}}
    </div>
  </div>
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
    <x-form-button>Save</x-form-button>
  </div>
</form>
</x-layout>