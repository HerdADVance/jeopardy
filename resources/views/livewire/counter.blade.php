<div style="text-align:center;">
    <h1>Counter Component</h1>
    <button wire:click="increment" style="width: 50px; height: 50px; cursor:pointer;">+</button>
    <button wire:click="decrement" style="width: 50px; height: 50px; cursor:pointer;">-</button>
    <h2>{{$count}}</h2>
</div>
