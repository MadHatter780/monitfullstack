<div value="{{ $value }}">
    <label class="inline-flex items-center">
        <input type="checkbox" class="sr-only peer" wire:model.live="{{ $value }}">
        <i class="bi bi-caret-up-fill peer-checked:hidden "></i>
        <i class="bi bi-caret-down-fill hidden peer-checked:block "></i>
    </label>
</div>