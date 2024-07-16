<x-filament-breezy::grid-section md=2 title="{{__('Hapus Akun')}}" description="{{__('Hapus akun Anda secara permanen.')}}">
    <x-filament::card>
        <p class="text-sm">{{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}</p>

        <div class="flex justify-between mt-3">
            {{ $this->deleteAction }}
        </div>
    </x-filament::card>
    <x-filament-actions::modals />
</x-filament-breezy::grid-section>
