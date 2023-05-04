<div>
    <input wire:model="name" type="text">
    <input wire:model="loud"  type="checkbox">
    <select wire:model="greetings" multiple>
        <option>Hello</option>
        <option>Good Bye</option>
        <option>Adios</option>

    </select>

    {{implode(', ', $greetings)}} {{($name)}} @if ($loud) !@endif

    <button wire:click="resetName">Reset</button>
</div>
