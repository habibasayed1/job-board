<x-layout>
<div class="max-w-2xl mx-auto mt-10">
  <x-card>
    <form action="{{ route('employer.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <x-label for="company_name" :required="true">Company Name</x-label>
        <x-text-input name="company_name" />
      </div>

      <x-button class="w-full">Create</x-button>
    </form>
  </x-card>
</div>
</x-layout>