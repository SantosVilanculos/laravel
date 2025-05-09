<?php

declare(strict_types=1);

namespace App\Livewire\Components;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Image extends Component
{
    use WithFileUploads;

    public ?TemporaryUploadedFile $image = null;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatedImage(): void
    {
        /** @var User */
        $user = Auth::user();

        $this->authorize('update', $user);

        $this->validate([
            'image' => [
                'required',
                File::types(['image/jpeg', 'image/png'])
                    ->extensions(['jpg', 'jpeg', 'jpe', 'jif', 'jfif', 'jfi', 'png'])
                    ->max(2048),
                Rule::dimensions()
                    ->minWidth(192)
                    ->minHeight(192),
            ],
        ]);

        if ($this->image instanceof TemporaryUploadedFile) {
            /** @var \Illuminate\Filesystem\FilesystemAdapter */
            $disk = Storage::disk('public');

            $path = $this->image->store('users', ['disk' => 'public']);

            if (is_string($path)) {
                $manager = new ImageManager(Driver::class);
                $manager->read($disk->path($path))
                    ->coverDown(256, 256)
                    ->save();

                if (is_string($user->image) && $disk->fileExists($user->image)) {
                    $disk->delete($user->image);
                }

                $user->update(['image' => $path]);

                $this->reset();
                $this->dispatch('message', text: __('Changes saved.'), icon: 'success');
            }
        }
    }

    public function destroy(): void
    {
        /**
         * @var User
         */
        $user = Auth::user();

        $this->authorize('update', $user);

        /** @var \Illuminate\Filesystem\FilesystemAdapter */
        $disk = Storage::disk('public');

        if (is_string($user->image) && $disk->fileExists($user->image)) {
            $disk->delete($user->image);
        }

        $user->update(['image' => null]);
        $this->dispatch('message', text: __('Changes saved.'), icon: 'success');
    }

    public function render(): View
    {
        /** @var User */
        $user = Auth::user();

        return view('livewire.components.image', ['user' => $user]);
    }
}
